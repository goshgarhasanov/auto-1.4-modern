<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Auth\PasswordHasher;
use InvalidArgumentException;
use RuntimeException;

final class UserService
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly PasswordHasher $hasher,
    ) {
    }

    public function register(string $username, string $password, ?string $sex = null): User
    {
        $username = trim($username);

        if ($username === '' || mb_strlen($username) < 3 || mb_strlen($username) > 32) {
            throw new InvalidArgumentException('Username must be between 3 and 32 characters.');
        }
        if (!preg_match('/^[A-Za-z0-9_.\\- ]+$/u', $username)) {
            throw new InvalidArgumentException('Username contains invalid characters.');
        }
        if (mb_strlen($password) < 4) {
            throw new InvalidArgumentException('Password must be at least 4 characters.');
        }
        if ($this->users->exists($username)) {
            throw new RuntimeException('That username is already taken.');
        }

        $id = $this->users->create($username, $this->hasher->hash($password), $sex);
        $user = $this->users->findById($id);
        if ($user === null) {
            throw new RuntimeException('User created but could not be loaded.');
        }
        return $user;
    }

    public function onlineCount(): int
    {
        return $this->users->countOnline();
    }
}
