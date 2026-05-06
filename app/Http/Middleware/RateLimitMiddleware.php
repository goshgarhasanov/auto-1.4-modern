<?php

/**
 * Goshgar.Az — Rate Limit Middleware
 *
 * Simple file-backed IP rate limiter. Allows up to
 * `MAX_REQUESTS` per `WINDOW_SECONDS` window per client IP.
 *
 * Storage: storage/cache/ratelimit.json
 *
 * NOTE: file-based locking is fine for the first version.
 * Production will swap this for a Redis-backed implementation
 * exposing the same `process()` contract.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

final class RateLimitMiddleware implements MiddlewareInterface
{
    private const MAX_REQUESTS   = 60;
    private const WINDOW_SECONDS = 60;

    private string $storagePath;

    public function __construct(?string $storagePath = null)
    {
        $this->storagePath = $storagePath
            ?? dirname(__DIR__, 3) . '/storage/cache/ratelimit.json';
    }

    public function process(ServerRequestInterface $req, RequestHandlerInterface $handler): ResponseInterface
    {
        $ip  = $this->resolveClientIp($req);
        $now = time();

        $dir = dirname($this->storagePath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $fp = @fopen($this->storagePath, 'c+');
        if ($fp === false) {
            // Storage unavailable — fail open rather than block all traffic.
            return $handler->handle($req);
        }

        try {
            flock($fp, LOCK_EX);

            $raw  = stream_get_contents($fp) ?: '';
            $data = $raw === '' ? [] : (json_decode($raw, true) ?: []);

            $bucket = $data[$ip] ?? ['count' => 0, 'reset' => $now + self::WINDOW_SECONDS];
            if ($now >= ($bucket['reset'] ?? 0)) {
                $bucket = ['count' => 0, 'reset' => $now + self::WINDOW_SECONDS];
            }

            $bucket['count']++;
            $data[$ip] = $bucket;

            // Garbage-collect expired buckets to keep the file small.
            foreach ($data as $key => $entry) {
                if (($entry['reset'] ?? 0) < $now - self::WINDOW_SECONDS) {
                    unset($data[$key]);
                }
            }

            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($data, JSON_UNESCAPED_SLASHES) ?: '[]');
            fflush($fp);

            $remaining = max(0, self::MAX_REQUESTS - (int) $bucket['count']);
            $reset     = (int) $bucket['reset'];

            if ($bucket['count'] > self::MAX_REQUESTS) {
                $response = new Response(429);
                $response->getBody()->write('Too Many Requests');
                return $response
                    ->withHeader('Content-Type', 'text/plain; charset=utf-8')
                    ->withHeader('Retry-After', (string) max(1, $reset - $now))
                    ->withHeader('X-RateLimit-Limit', (string) self::MAX_REQUESTS)
                    ->withHeader('X-RateLimit-Remaining', '0')
                    ->withHeader('X-RateLimit-Reset', (string) $reset);
            }
        } finally {
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        $response = $handler->handle($req);

        return $response
            ->withHeader('X-RateLimit-Limit', (string) self::MAX_REQUESTS)
            ->withHeader('X-RateLimit-Remaining', (string) ($remaining ?? 0))
            ->withHeader('X-RateLimit-Reset', (string) ($reset ?? $now));
    }

    private function resolveClientIp(ServerRequestInterface $req): string
    {
        $server = $req->getServerParams();

        $forwarded = $req->getHeaderLine('X-Forwarded-For');
        if ($forwarded !== '') {
            $first = trim(explode(',', $forwarded)[0]);
            if ($first !== '') {
                return $first;
            }
        }

        $real = $req->getHeaderLine('X-Real-IP');
        if ($real !== '') {
            return $real;
        }

        return (string) ($server['REMOTE_ADDR'] ?? '0.0.0.0');
    }
}
