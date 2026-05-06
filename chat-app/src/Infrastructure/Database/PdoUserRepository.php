<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use PDO;

final class PdoUserRepository implements UserRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function findById(int $id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ? User::fromRow($row) : null;
    }

    public function findByUsername(string $username): ?User
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM users WHERE latuser = :u OR user = :raw LIMIT 1'
        );
        $stmt->execute([
            'u'   => mb_strtolower($username),
            'raw' => $username,
        ]);
        $row = $stmt->fetch();

        return $row ? User::fromRow($row) : null;
    }

    public function create(string $username, string $passwordHash, ?string $sex = null): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO users (user, latuser, pass, sex, time)
             VALUES (:user, :latuser, :pass, :sex, :time)'
        );
        $stmt->execute([
            'user'    => $username,
            'latuser' => mb_strtolower($username),
            'pass'    => $passwordHash,
            'sex'     => $sex,
            'time'    => date('Y-m-d H:i:s'),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function updatePasswordHash(int $userId, string $newHash): void
    {
        $stmt = $this->pdo->prepare('UPDATE users SET pass = :pass WHERE id = :id');
        $stmt->execute(['pass' => $newHash, 'id' => $userId]);
    }

    public function countOnline(int $sinceSeconds = 300): int
    {
        // Legacy schema may not have a heartbeat column; fall back to total users.
        try {
            $stmt = $this->pdo->prepare(
                'SELECT COUNT(*) FROM users
                 WHERE time IS NOT NULL
                   AND time >= (NOW() - INTERVAL :sec SECOND)'
            );
            $stmt->execute(['sec' => $sinceSeconds]);
            return (int) $stmt->fetchColumn();
        } catch (\Throwable) {
            $stmt = $this->pdo->query('SELECT COUNT(*) FROM users');
            return $stmt ? (int) $stmt->fetchColumn() : 0;
        }
    }

    public function exists(string $username): bool
    {
        $stmt = $this->pdo->prepare('SELECT 1 FROM users WHERE latuser = :u LIMIT 1');
        $stmt->execute(['u' => mb_strtolower($username)]);

        return (bool) $stmt->fetchColumn();
    }
}
