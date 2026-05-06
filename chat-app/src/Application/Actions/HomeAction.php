<?php

declare(strict_types=1);

namespace App\Application\Actions;

use App\Domain\Auth\AuthService;
use App\Domain\User\UserService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

final class HomeAction
{
    public function __construct(
        private readonly Twig $twig,
        private readonly UserService $users,
        private readonly AuthService $auth,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $online = 0;
        $dbOk = true;
        try {
            $online = $this->users->onlineCount();
        } catch (\Throwable $e) {
            $dbOk = false;
            $this->logger->error('Failed to query online users', ['error' => $e->getMessage()]);
        }

        return $this->twig->render($response, 'home.html.twig', [
            'online_count' => $online,
            'db_ok'        => $dbOk,
            'user'         => $this->auth->user(),
            'news'         => [
                ['title' => 'Welcome to chat-app', 'body' => 'A modern rewrite of the legacy chat is in progress.'],
            ],
        ]);
    }
}
