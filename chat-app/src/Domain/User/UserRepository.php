<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    public function findById(int $id): ?User;

    public function findByUsername(string $username): ?User;

    public function create(string $username, string $passwordHash, ?string $sex = null): int;

    public function updatePasswordHash(int $userId, string $newHash): void;

    public function countOnline(int $sinceSeconds = 300): int;

    public function exists(string $username): bool;
}
