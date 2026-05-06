<?php

declare(strict_types=1);

use App\Domain\Auth\AuthService;
use App\Domain\Auth\PasswordHasher;
use App\Domain\User\UserRepository;
use App\Domain\User\UserService;
use App\Infrastructure\Database\Connection;
use App\Infrastructure\Database\PdoUserRepository;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;
use Twig\Extension\DebugExtension;

return static function (ContainerBuilder $builder): void {
    $builder->addDefinitions([
        'settings' => static function (): array {
            $factory = require __DIR__ . '/settings.php';
            return $factory();
        },

        LoggerInterface::class => static function (ContainerInterface $c): LoggerInterface {
            $cfg = $c->get('settings')['logger'];
            $logger = new Logger($cfg['name']);
            $logger->pushHandler(new StreamHandler($cfg['path'], $cfg['level']));
            return $logger;
        },

        Twig::class => static function (ContainerInterface $c): Twig {
            $cfg = $c->get('settings')['twig'];
            $twig = Twig::create($cfg['templates'], [
                'cache' => $cfg['cache'],
                'debug' => $cfg['debug'],
            ]);
            if ($cfg['debug']) {
                $twig->addExtension(new DebugExtension());
            }
            return $twig;
        },

        Connection::class => static function (ContainerInterface $c): Connection {
            return new Connection($c->get('settings')['db']);
        },

        \PDO::class => static function (ContainerInterface $c): \PDO {
            return $c->get(Connection::class)->pdo();
        },

        UserRepository::class => \DI\autowire(PdoUserRepository::class),
        PasswordHasher::class => \DI\autowire(),
        UserService::class    => \DI\autowire(),
        AuthService::class    => \DI\autowire(),
    ]);
};
