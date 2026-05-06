<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Domain\Auth\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class LogoutAction
{
    public function __construct(private readonly AuthService $auth)
    {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $this->auth->logout();
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}
