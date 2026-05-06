<?php

/**
 * Goshgar.Az — CSRF Middleware
 *
 * Validates the CSRF token on state-changing requests
 * (POST / PUT / PATCH / DELETE). Reads the token from the
 * request body field `csrf` or the `X-CSRF-Token` header.
 *
 * Always exposes a fresh token to Twig as the global
 * `csrf_token`, so templates can embed it in forms.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Support\Csrf;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Slim\Views\Twig;

final class CsrfMiddleware implements MiddlewareInterface
{
    /** @var array<int, string> */
    private const PROTECTED_METHODS = ['POST', 'PUT', 'PATCH', 'DELETE'];

    public function __construct(private Twig $twig)
    {
    }

    public function process(ServerRequestInterface $req, RequestHandlerInterface $handler): ResponseInterface
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $method = strtoupper($req->getMethod());

        if (in_array($method, self::PROTECTED_METHODS, true)) {
            $parsed = $req->getParsedBody();
            $token  = is_array($parsed) && isset($parsed['csrf'])
                ? (string) $parsed['csrf']
                : $req->getHeaderLine('X-CSRF-Token');

            if (!Csrf::check($token)) {
                $response = new Response(419);
                $response->getBody()->write('CSRF token mismatch');
                return $response->withHeader('Content-Type', 'text/plain; charset=utf-8');
            }
        }

        // Refresh token + expose to all Twig templates
        $current = Csrf::token();
        $this->twig->getEnvironment()->addGlobal('csrf_token', $current);

        return $handler->handle($req);
    }
}
