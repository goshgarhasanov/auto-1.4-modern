<?php

declare(strict_types=1);

namespace App\Services;

use App\Database\Connection;
use App\Database\Repositories\UserRepository;
use App\Models\User;
use InvalidArgumentException;
use PDO;
use RuntimeException;

final class AuthService
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly PasswordHasher $hasher,
    ) {
    }

    public function attempt(string $username, string $password): ?User
    {
        $username = trim($username);
        if ($username === '' || $password === '') {
            return null;
        }

        $row = $this->users->findByUsername($username);
        if ($row === null) {
            return null;
        }

        if ((int) ($row['banned'] ?? 0) === 1) {
            return null;
        }

        $stored = (string) ($row['pass'] ?? '');
        if (!$this->hasher->verify($password, $stored)) {
            return null;
        }

        $user = User::fromArray($row);

        // Transparent migration: re-hash legacy base64 records on first valid login.
        if ($this->hasher->isLegacy($stored)) {
            $this->migratePassword($user->id, $password);
        }

        $this->users->updateLastSeen($user->id);
        $this->establishSession($user->id);

        return $user;
    }

    public function register(string $username, string $password, ?string $sex = null): User
    {
        $username = trim($username);

        if ($username === '' || mb_strlen($username) < 3 || mb_strlen($username) > 30) {
            throw new InvalidArgumentException('Username must be between 3 and 30 characters.');
        }

        if (!preg_match('/^[A-Za-z0-9_\-\.]+$/', $username)) {
            throw new InvalidArgumentException('Username contains invalid characters.');
        }

        if (mb_strlen($password) < 4) {
            throw new InvalidArgumentException('Password must be at least 4 characters.');
        }

        if ($this->users->existsByUsername($username)) {
            throw new InvalidArgumentException('Username is already taken.');
        }

        $sexInt = match ($sex) {
            '1', 1, 'female', 'f' => 1,
            '0', 0, 'male', 'm'   => 0,
            default               => 0,
        };

        $id = $this->users->create([
            'user'  => $username,
            'pass'  => $this->hasher->hash($password),
            'sex'   => $sexInt,
            'level' => 0,
            'time'  => time(),
        ]);

        $row = $this->users->findById($id);
        if ($row === null) {
            throw new RuntimeException('User creation succeeded but lookup failed.');
        }

        $user = User::fromArray($row);
        $this->establishSession($user->id);

        return $user;
    }

    public function logout(): void
    {
        $this->ensureSession();
        unset($_SESSION['user_id']);
        $_SESSION = [];

        if (PHP_SAPI !== 'cli') {
            session_destroy();
        }
    }

    public function check(): bool
    {
        $this->ensureSession();
        return isset($_SESSION['user_id']);
    }

    public function user(): ?User
    {
        if (!$this->check()) {
            return null;
        }

        $row = $this->users->findById((int) $_SESSION['user_id']);
        return $row === null ? null : User::fromArray($row);
    }

    private function migratePassword(int $userId, string $plain): void
    {
        try {
            $pdo = Connection::pdo();
            $stmt = $pdo->prepare('UPDATE users SET pass = :p WHERE id = :id');
            $stmt->bindValue(':p',  $this->hasher->hash($plain));
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\Throwable) {
            // Migration failure must not block login.
        }
    }

    private function establishSession(int $userId): void
    {
        $this->ensureSession();
        // Prevent session fixation on auth boundary changes.
        if (PHP_SAPI !== 'cli' && session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
        $_SESSION['user_id'] = $userId;
    }

    private function ensureSession(): void
    {
        if (PHP_SAPI === 'cli') {
            if (!isset($_SESSION) || !is_array($_SESSION)) {
                $_SESSION = [];
            }
            return;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}
