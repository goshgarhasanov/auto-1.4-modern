<?php

declare(strict_types=1);

namespace App\Database\Repositories;

use App\Database\Connection;
use PDO;
use PDOException;
use RuntimeException;

final class UserRepository
{
    private const TABLE = 'users';

    public function __construct(private ?PDO $pdo = null)
    {
        $this->pdo ??= Connection::pdo();
    }

    public function findById(int $id): ?array
    {
        try {
            $stmt = $this->pdo->prepare(
                'SELECT * FROM ' . self::TABLE . ' WHERE id = :id LIMIT 1',
            );
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch();

            return $row === false ? null : $row;
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::findById failed.', 0, $e);
        }
    }

    public function findByUsername(string $username): ?array
    {
        try {
            // latuser is the lowercased canonical column — case-insensitive lookup.
            $stmt = $this->pdo->prepare(
                'SELECT * FROM ' . self::TABLE . ' WHERE latuser = :u LIMIT 1',
            );
            $stmt->bindValue(':u', mb_strtolower($username));
            $stmt->execute();
            $row = $stmt->fetch();

            return $row === false ? null : $row;
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::findByUsername failed.', 0, $e);
        }
    }

    public function create(array $data): int
    {
        $now = time();

        $payload = [
            'user'    => (string) ($data['user'] ?? ''),
            'latuser' => mb_strtolower((string) ($data['user'] ?? '')),
            'pass'    => (string) ($data['pass'] ?? ''),
            'email'   => $data['email'] ?? null,
            'sex'     => (int) ($data['sex'] ?? 0),
            'level'   => (int) ($data['level'] ?? 0),
            'banned'  => (int) ($data['banned'] ?? 0),
            'time'    => (int) ($data['time'] ?? $now),
            'date'    => (string) ($data['date'] ?? date('d.m.Y', $now)),
        ];

        try {
            $stmt = $this->pdo->prepare(
                'INSERT INTO ' . self::TABLE . '
                   (user, latuser, pass, email, sex, level, banned, time, date)
                 VALUES
                   (:user, :latuser, :pass, :email, :sex, :level, :banned, :time, :date)',
            );

            $stmt->bindValue(':user',    $payload['user']);
            $stmt->bindValue(':latuser', $payload['latuser']);
            $stmt->bindValue(':pass',    $payload['pass']);
            $stmt->bindValue(':email',   $payload['email'], $payload['email'] === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt->bindValue(':sex',     $payload['sex'],    PDO::PARAM_INT);
            $stmt->bindValue(':level',   $payload['level'],  PDO::PARAM_INT);
            $stmt->bindValue(':banned',  $payload['banned'], PDO::PARAM_INT);
            $stmt->bindValue(':time',    $payload['time'],   PDO::PARAM_INT);
            $stmt->bindValue(':date',    $payload['date']);
            $stmt->execute();

            return (int) $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::create failed.', 0, $e);
        }
    }

    public function updateLastSeen(int $id): void
    {
        try {
            $stmt = $this->pdo->prepare(
                'UPDATE ' . self::TABLE . ' SET time = :t WHERE id = :id',
            );
            $stmt->bindValue(':t',  time(), PDO::PARAM_INT);
            $stmt->bindValue(':id', $id,    PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::updateLastSeen failed.', 0, $e);
        }
    }

    public function existsByUsername(string $username): bool
    {
        try {
            $stmt = $this->pdo->prepare(
                'SELECT 1 FROM ' . self::TABLE . ' WHERE latuser = :u LIMIT 1',
            );
            $stmt->bindValue(':u', mb_strtolower($username));
            $stmt->execute();

            return $stmt->fetchColumn() !== false;
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::existsByUsername failed.', 0, $e);
        }
    }

    public function countOnline(int $sinceTimestamp): int
    {
        try {
            $stmt = $this->pdo->prepare(
                'SELECT COUNT(*) FROM ' . self::TABLE . ' WHERE time >= :t AND banned = 0',
            );
            $stmt->bindValue(':t', $sinceTimestamp, PDO::PARAM_INT);
            $stmt->execute();

            return (int) $stmt->fetchColumn();
        } catch (PDOException $e) {
            throw new RuntimeException('UserRepository::countOnline failed.', 0, $e);
        }
    }
}
