<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

abstract class Controller
{
    public function __construct(protected readonly Twig $view)
    {
    }

    protected function render(ResponseInterface $response, string $template, array $data = []): ResponseInterface
    {
        return $this->view->render($response, $template, $data);
    }

    protected function jsonResponse(ResponseInterface $response, mixed $payload, int $status = 200): ResponseInterface
    {
        $response->getBody()->write(json_encode(
            $payload,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        ) ?: '');

        return $response
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withStatus($status);
    }

    protected function redirect(ResponseInterface $response, string $url, int $status = 302): ResponseInterface
    {
        return $response
            ->withHeader('Location', $url)
            ->withStatus($status);
    }
}
