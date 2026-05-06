<?php

declare(strict_types=1);

namespace App\Models;

final class User
{
    public function __construct(
        public readonly int $id,
        public readonly string $username,
        public readonly ?string $email,
        public readonly int $level,
        public readonly bool $banned,
        public readonly ?int $lastSeen,
    ) {
    }

    public static function fromArray(array $row): self
    {
        return new self(
            id:       (int) ($row['id'] ?? 0),
            username: (string) ($row['user'] ?? ''),
            email:    isset($row['email']) && $row['email'] !== '' ? (string) $row['email'] : null,
            level:    (int) ($row['level'] ?? 0),
            banned:   (int) ($row['banned'] ?? 0) === 1,
            lastSeen: isset($row['time']) ? (int) $row['time'] : null,
        );
    }

    public function isOnline(int $threshold = 300): bool
    {
        if ($this->lastSeen === null) {
            return false;
        }

        return (time() - $this->lastSeen) <= $threshold;
    }
}
