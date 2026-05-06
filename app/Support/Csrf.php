<?php
/**
 * CSRF token helper.
 *
 * Stores a per-session token under $_SESSION['_csrf']. The session is started
 * lazily so the helper is safe to call from controllers, middleware or views
 * regardless of whether bootstrap has already opened the session.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Support;

final class Csrf
{
    /** Session key used to persist the active CSRF token. */
    public const SESSION_KEY = '_csrf';

    /**
     * Return the current CSRF token, generating one on first use.
     */
    public static function token(): string
    {
        self::ensureSession();

        if (empty($_SESSION[self::SESSION_KEY]) || !is_string($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = bin2hex(random_bytes(32));
        }

        return $_SESSION[self::SESSION_KEY];
    }

    /**
     * Constant-time comparison between the stored token and a submitted value.
     */
    public static function check(string $token): bool
    {
        self::ensureSession();

        if (empty($_SESSION[self::SESSION_KEY]) || !is_string($_SESSION[self::SESSION_KEY])) {
            return false;
        }

        return hash_equals($_SESSION[self::SESSION_KEY], $token);
    }

    /**
     * Force-rotate the token (call after login / privilege changes).
     */
    public static function regenerate(): string
    {
        self::ensureSession();

        $_SESSION[self::SESSION_KEY] = bin2hex(random_bytes(32));

        return $_SESSION[self::SESSION_KEY];
    }

    /**
     * Hidden <input> snippet for HTML forms.
     */
    public static function field(): string
    {
        return '<input type="hidden" name="_csrf" value="' . htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8') . '">';
    }

    private static function ensureSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            // Tests run under CLI where headers cannot be sent — guard the call.
            if (PHP_SAPI === 'cli' || PHP_SAPI === 'cli-server' || !headers_sent()) {
                @session_start();
            } else {
                session_start();
            }
        }
    }
}
