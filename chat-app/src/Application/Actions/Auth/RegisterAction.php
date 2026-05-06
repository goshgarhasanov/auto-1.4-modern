<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Domain\Auth\AuthService;
use App\Domain\User\UserService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class RegisterAction
{
    public function __construct(
        private readonly Twig $twig,
        private readonly UserService $userService,
        private readonly AuthService $auth,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if (strtoupper($request->getMethod()) === 'POST') {
            $body = (array) $request->getParsedBody();

            try {
                $user = $this->userService->register(
                    username: (string) ($body['username'] ?? ''),
                    password: (string) ($body['password'] ?? ''),
                    sex:      isset($body['sex']) ? (string) $body['sex'] : null,
                );
                $this->auth->login($user);
                return $response->withHeader('Location', '/profile')->withStatus(302);
            } catch (\Throwable $e) {
                return $this->twig->render($response->withStatus(422), 'auth/register.html.twig', [
                    'error'    => $e->getMessage(),
                    'username' => (string) ($body['username'] ?? ''),
                ]);
            }
        }

        return $this->twig->render($response, 'auth/register.html.twig', [
            'error'    => null,
            'username' => '',
        ]);
    }
}
