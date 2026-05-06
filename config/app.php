<?php
/**
 * Application configuration.
 *
 * Reads from $_ENV (populated by vlucas/phpdotenv) and exposes a normalised
 * array consumed by the DI container and bootstrap layer.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

$bool = static fn (mixed $value, bool $default = false): bool
    => $value === null ? $default : filter_var($value, FILTER_VALIDATE_BOOLEAN);

return [
    'name'     => $_ENV['APP_NAME']  ?? 'Goshgar.Az',
    'env'      => $_ENV['APP_ENV']   ?? 'production',
    'debug'    => $bool($_ENV['APP_DEBUG'] ?? null, false),
    'url'      => $_ENV['APP_URL']   ?? 'http://localhost:8000',
    'timezone' => 'Asia/Baku',
    'locale'   => 'az',

    'paths' => [
        'root'    => dirname(__DIR__),
        'app'     => dirname(__DIR__) . '/app',
        'views'   => dirname(__DIR__) . '/views',
        'public'  => dirname(__DIR__) . '/public',
        'storage' => dirname(__DIR__) . '/storage',
        'legacy'  => dirname(__DIR__) . '/legacy',
    ],

    'session' => [
        'name'     => $_ENV['SESSION_NAME']     ?? 'goshgaraz_session',
        'lifetime' => (int) ($_ENV['SESSION_LIFETIME'] ?? 86400),
        'path'     => '/',
        'secure'   => false,
        'httponly' => true,
        'samesite' => 'Lax',
    ],

    'log' => [
        'channel' => $_ENV['LOG_CHANNEL'] ?? 'daily',
        'level'   => $_ENV['LOG_LEVEL']   ?? 'debug',
        'path'    => dirname(__DIR__) . '/storage/logs',
    ],
];
