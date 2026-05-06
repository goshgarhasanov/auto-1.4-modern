<?php

declare(strict_types=1);

namespace App\Application\Actions\Profile;

use App\Domain\Auth\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class ProfileAction
{
    public function __construct(
        private readonly Twig $twig,
        private readonly AuthService $auth,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->twig->render($response, 'profile.html.twig', [
            'user' => $this->auth->user(),
        ]);
    }
}
