<?php
/**
 * Environment variable accessor.
 *
 * Wraps $_ENV / getenv() with normalisation for booleans, integers and "null"
 * sentinels. The procedural env() helper in helpers.php delegates here so the
 * lookup logic stays in a single, easily testable class.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Support;

final class Env
{
    /**
     * Fetch and normalise an environment value.
     *
     * Recognised string sentinels (case-insensitive):
     *   true / false          → bool
     *   null / (null) / empty → null
     *   "value" / 'value'     → unquoted string
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $_ENV)) {
            return self::normalise($_ENV[$key], $default);
        }

        if (array_key_exists($key, $_SERVER)) {
            return self::normalise($_SERVER[$key], $default);
        }

        $value = getenv($key);
        if ($value !== false) {
            return self::normalise($value, $default);
        }

        return $default;
    }

    /**
     * Set a runtime override (used mainly by tests).
     */
    public static function set(string $key, mixed $value): void
    {
        $_ENV[$key]    = $value;
        $_SERVER[$key] = $value;
        if (is_scalar($value) || $value === null) {
            putenv($key . '=' . ($value === null ? '' : (string) $value));
        }
    }

    private static function normalise(mixed $value, mixed $default): mixed
    {
        if (!is_string($value)) {
            return $value;
        }

        $trimmed = trim($value);
        $lower   = strtolower($trimmed);

        return match (true) {
            $lower === 'true', $lower === '(true)'   => true,
            $lower === 'false', $lower === '(false)' => false,
            $lower === 'null', $lower === '(null)'   => null,
            $lower === 'empty', $lower === '(empty)' => '',
            str_starts_with($trimmed, '"') && str_ends_with($trimmed, '"')
                => substr($trimmed, 1, -1),
            str_starts_with($trimmed, "'") && str_ends_with($trimmed, "'")
                => substr($trimmed, 1, -1),
            default => $value,
        };
    }
}
