<?php

declare(strict_types=1);

use App\Database\Connection;
use App\Database\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\PasswordHasher;
use Slim\Views\Twig;

return [
    Connection::class => DI\factory(static fn (): Connection => new Connection()),

    PDO::class => static fn (): PDO => Connection::pdo(),

    UserRepository::class => DI\autowire(),
    PasswordHasher::class => DI\autowire(),
    AuthService::class    => DI\autowire(),

    Twig::class => static fn (): Twig => Twig::create(
        __DIR__ . '/../views',
        ['cache' => false],
    ),
];
