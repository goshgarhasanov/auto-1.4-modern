<?php

declare(strict_types=1);

namespace App\Domain\User;

final class User
{
    public function __construct(
        public readonly int $id,
        public readonly string $username,
        public readonly string $usernameLower,
        public readonly string $passwordHash,
        public readonly ?string $sex = null,
        public readonly ?string $time = null,
    ) {
    }

    /**
     * @param array<string, mixed> $row
     */
    public static function fromRow(array $row): self
    {
        return new self(
            id:            (int) $row['id'],
            username:      (string) ($row['user'] ?? ''),
            usernameLower: (string) ($row['latuser'] ?? ''),
            passwordHash:  (string) ($row['pass'] ?? ''),
            sex:           isset($row['sex']) ? (string) $row['sex'] : null,
            time:          isset($row['time']) ? (string) $row['time'] : null,
        );
    }
}
