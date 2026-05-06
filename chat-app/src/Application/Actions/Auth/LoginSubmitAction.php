<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Domain\Auth\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class LoginSubmitAction
{
    public function __construct(private readonly AuthService $auth)
    {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = (array) $request->getParsedBody();
        $username = trim((string) ($body['username'] ?? ''));
        $password = (string) ($body['password'] ?? '');

        $user = $this->auth->attempt($username, $password);
        if ($user === null) {
            $_SESSION['flash_error'] = 'Invalid username or password.';
            return $response->withHeader('Location', '/login')->withStatus(302);
        }

        $this->auth->login($user);
        return $response->withHeader('Location', '/profile')->withStatus(302);
    }
}
