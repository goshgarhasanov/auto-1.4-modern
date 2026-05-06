<?php

declare(strict_types=1);

namespace App\Domain\Auth;

final class PasswordHasher
{
    public function hash(string $plain): string
    {
        return password_hash($plain, PASSWORD_BCRYPT);
    }

    /**
     * Verifies against modern bcrypt; falls back to legacy base64 hashes.
     */
    public function verify(string $plain, string $stored): bool
    {
        if ($stored === '') {
            return false;
        }

        if ($this->looksLikeBcrypt($stored) && password_verify($plain, $stored)) {
            return true;
        }

        return $this->verifyLegacy($plain, $stored);
    }

    public function needsRehash(string $stored): bool
    {
        if (!$this->looksLikeBcrypt($stored)) {
            return true;
        }

        return password_needs_rehash($stored, PASSWORD_BCRYPT);
    }

    public function isLegacy(string $stored): bool
    {
        return !$this->looksLikeBcrypt($stored);
    }

    private function looksLikeBcrypt(string $stored): bool
    {
        return (bool) preg_match('/^\$2[aby]\$\d{2}\$/', $stored);
    }

    private function verifyLegacy(string $plain, string $stored): bool
    {
        $decoded = base64_decode($stored, true);
        if ($decoded !== false && hash_equals($plain, $decoded)) {
            return true;
        }

        // Some legacy entries store base64 of the username|password or raw plain.
        if (hash_equals($stored, base64_encode($plain))) {
            return true;
        }

        return false;
    }
}
