<?php

declare(strict_types=1);

namespace App\Domain\Auth;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

final class AuthService
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly PasswordHasher $hasher,
        private readonly LoggerInterface $logger,
    ) {
    }

    /**
     * Attempts authentication. On success, returns the User and migrates legacy
     * base64 password storage to bcrypt transparently.
     */
    public function attempt(string $username, string $password): ?User
    {
        $user = $this->users->findByUsername($username);
        if ($user === null) {
            return null;
        }

        if (!$this->hasher->verify($password, $user->passwordHash)) {
            return null;
        }

        if ($this->hasher->needsRehash($user->passwordHash)) {
            try {
                $this->users->updatePasswordHash($user->id, $this->hasher->hash($password));
                $this->logger->info('Migrated legacy password to bcrypt', ['userId' => $user->id]);
            } catch (\Throwable $e) {
                $this->logger->warning('Password rehash failed', [
                    'userId' => $user->id,
                    'error'  => $e->getMessage(),
                ]);
            }
        }

        return $user;
    }

    public function login(User $user): void
    {
        $_SESSION['user_id']       = $user->id;
        $_SESSION['user_name']     = $user->username;
        $_SESSION['authenticated'] = true;
        session_regenerate_id(true);
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                (bool) $params['secure'],
                (bool) $params['httponly']
            );
        }
        session_destroy();
    }

    public function user(): ?User
    {
        $id = $_SESSION['user_id'] ?? null;
        if (!is_int($id) && !ctype_digit((string) $id)) {
            return null;
        }
        return $this->users->findById((int) $id);
    }

    public function check(): bool
    {
        return !empty($_SESSION['authenticated']);
    }
}
