<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Slim\Views\Twig;

final class CsrfMiddleware implements MiddlewareInterface
{
    public function __construct(private readonly Twig $twig)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $token = (string) $_SESSION['csrf_token'];
        $this->twig->getEnvironment()->addGlobal('csrf_token', $token);
        $this->twig->getEnvironment()->addGlobal('current_user', $_SESSION['user_name'] ?? null);

        if (in_array(strtoupper($request->getMethod()), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
            $body = (array) $request->getParsedBody();
            $sent = (string) ($body['csrf_token'] ?? $request->getHeaderLine('X-CSRF-Token'));

            if (!hash_equals($token, $sent)) {
                $response = new Response(419);
                $response->getBody()->write('CSRF token mismatch.');
                return $response->withHeader('Content-Type', 'text/plain');
            }
        }

        return $handler->handle($request);
    }
}
