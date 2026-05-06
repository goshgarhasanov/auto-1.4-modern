<?php
/**
 * Database configuration.
 *
 * Default driver is MySQL — the legacy chat schema (database/sql.sql) targets
 * it. PDO options favour real prepared statements and exception-mode errors.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

return [
    'default' => 'mysql',

    'connections' => [
        'mysql' => [
            'driver'   => 'mysql',
            'host'     => $_ENV['DB_HOST']    ?? 'localhost',
            'port'     => (int) ($_ENV['DB_PORT'] ?? 3306),
            'database' => $_ENV['DB_NAME']    ?? 'chat',
            'username' => $_ENV['DB_USER']    ?? 'root',
            'password' => $_ENV['DB_PASS']    ?? '',
            'charset'  => $_ENV['DB_CHARSET'] ?? 'utf8',
            'collation'=> 'utf8_general_ci',
            'options'  => [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ],
        ],
    ],
];
