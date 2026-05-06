<?php

declare(strict_types=1);

namespace App\Services;

final class PasswordHasher
{
    private const BCRYPT_PATTERN = '/^\$2[aby]\$\d{2}\$.{53}$/';

    public function hash(string $plain): string
    {
        return password_hash($plain, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    public function verify(string $plain, string $stored): bool
    {
        if ($stored === '') {
            return false;
        }

        if ($this->isBcrypt($stored)) {
            return password_verify($plain, $stored);
        }

        // Legacy fallback: original chat stored base64(plain).
        return hash_equals($stored, base64_encode($plain));
    }

    public function isLegacy(string $stored): bool
    {
        return $stored !== '' && !$this->isBcrypt($stored);
    }

    private function isBcrypt(string $stored): bool
    {
        return (bool) preg_match(self::BCRYPT_PATTERN, $stored);
    }
}
