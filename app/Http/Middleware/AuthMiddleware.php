<?php

/**
 * Goshgar.Az — Auth Middleware
 *
 * Redirects unauthenticated users to /login and stores the
 * originally requested URI in the session as `intended`.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Slim\Routing\RouteParser;

final class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        private AuthService $auth,
        private RouteParser $routeParser
    ) {
    }

    public function process(ServerRequestInterface $req, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$this->auth->check()) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['intended'] = (string) $req->getUri();

            $response = new Response(302);
            return $response->withHeader('Location', '/login');
        }

        return $handler->handle($req);
    }
}
