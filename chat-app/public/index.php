<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require dirname(__DIR__) . '/vendor/autoload.php';

$rootDir = dirname(__DIR__);

if (file_exists($rootDir . '/.env')) {
    Dotenv::createImmutable($rootDir)->load();
} elseif (file_exists($rootDir . '/.env.example')) {
    Dotenv::createImmutable($rootDir, '.env.example')->load();
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$containerBuilder = new ContainerBuilder();
(require $rootDir . '/config/dependencies.php')($containerBuilder);
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$settings = $container->get('settings');

$app->addRoutingMiddleware();
$app->add(TwigMiddleware::createFromContainer($app, \Slim\Views\Twig::class));
$app->add(\App\Application\Middleware\CsrfMiddleware::class);

(require $rootDir . '/config/routes.php')($app);

$app->addErrorMiddleware(
    (bool) $settings['displayErrorDetails'],
    (bool) $settings['logError'],
    (bool) $settings['logErrorDetails'],
    $container->get(\Psr\Log\LoggerInterface::class)
);

$app->run();
