<?php

declare(strict_types=1);

use Monolog\Logger;

return static function (): array {
    $debug = filter_var($_ENV['APP_DEBUG'] ?? 'false', FILTER_VALIDATE_BOOLEAN);

    return [
        'app' => [
            'env'   => $_ENV['APP_ENV'] ?? 'prod',
            'debug' => $debug,
        ],
        'displayErrorDetails'    => $debug,
        'logError'               => true,
        'logErrorDetails'        => true,
        'db' => [
            'host'    => $_ENV['DB_HOST'] ?? 'localhost',
            'port'    => (int) ($_ENV['DB_PORT'] ?? 3306),
            'name'    => $_ENV['DB_NAME'] ?? 'chat',
            'user'    => $_ENV['DB_USER'] ?? 'root',
            'pass'    => $_ENV['DB_PASS'] ?? '',
            'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
        ],
        'twig' => [
            'templates' => dirname(__DIR__) . '/templates',
            'cache'     => $debug ? false : dirname(__DIR__) . '/var/cache/twig',
            'debug'     => $debug,
        ],
        'logger' => [
            'name'  => 'app',
            'path'  => dirname(__DIR__) . '/var/log/app.log',
            'level' => $debug ? Logger::DEBUG : Logger::INFO,
        ],
    ];
};
