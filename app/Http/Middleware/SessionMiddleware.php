<?php

/**
 * Goshgar.Az — Session Middleware
 *
 * Boots the PHP session at the very top of the pipeline with
 * hardened cookie params (HttpOnly, SameSite=Lax, Secure when
 * APP_URL is HTTPS). Must run before any middleware that
 * touches `$_SESSION`.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class SessionMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $req, RequestHandlerInterface $handler): ResponseInterface
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return $handler->handle($req);
        }

        $appUrl = (string) ($_ENV['APP_URL'] ?? getenv('APP_URL') ?: '');
        $secure = str_starts_with(strtolower($appUrl), 'https://');

        $sessionsPath = dirname(__DIR__, 3) . '/storage/sessions';
        if (is_dir($sessionsPath) && is_writable($sessionsPath)) {
            session_save_path($sessionsPath);
        }

        session_set_cookie_params([
            'lifetime' => 0,
            'path'     => '/',
            'domain'   => '',
            'secure'   => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        session_name('GOSHGARAZSESSID');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $handler->handle($req);
    }
}
