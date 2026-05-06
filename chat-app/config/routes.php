<?php

declare(strict_types=1);

use App\Application\Actions\Auth\LoginAction;
use App\Application\Actions\Auth\LoginSubmitAction;
use App\Application\Actions\Auth\LogoutAction;
use App\Application\Actions\Auth\RegisterAction;
use App\Application\Actions\HomeAction;
use App\Application\Actions\Profile\ProfileAction;
use App\Application\Middleware\AuthMiddleware;
use Slim\App;

return static function (App $app): void {
    $app->get('/', HomeAction::class)->setName('home');

    $app->get('/login', LoginAction::class)->setName('login');
    $app->post('/login', LoginSubmitAction::class);

    $app->get('/register', RegisterAction::class)->setName('register');
    $app->post('/register', RegisterAction::class);

    $app->get('/logout', LogoutAction::class)->setName('logout');

    $app->get('/profile', ProfileAction::class)
        ->add(AuthMiddleware::class)
        ->setName('profile');
};
