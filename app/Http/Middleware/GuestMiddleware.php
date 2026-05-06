<?php

/**
 * Goshgar.Az — Guest Middleware
 *
 * Redirects already-authenticated users away from guest-only
 * routes (login / register) back to the home page.
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

final class GuestMiddleware implements MiddlewareInterface
{
    public function __construct(private AuthService $auth)
    {
    }

    public function process(ServerRequestInterface $req, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($this->auth->check()) {
            $response = new Response(302);
            return $response->withHeader('Location', '/');
        }

        return $handler->handle($req);
    }
}
