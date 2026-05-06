<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Support\Csrf;
use App\Support\Flash;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Throwable;

final class AuthController extends Controller
{
    public function __construct(
        Twig $view,
        private readonly AuthService $auth,
    ) {
        parent::__construct($view);
    }

    public function showLogin(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if ($this->auth->check()) {
            return $this->redirect($response, '/');
        }

        return $this->render($response, 'auth/login.twig', [
            'errors' => $this->pullFlash('errors'),
            'old'    => $this->pullFlash('old'),
        ]);
    }

    public function login(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = (array) $request->getParsedBody();

        if (!$this->validCsrf($body)) {
            $this->pushFlash('errors', ['csrf' => 'Invalid form token.']);
            return $this->redirect($response, '/login');
        }

        $username = trim((string) ($body['username'] ?? ''));
        $password = (string) ($body['password'] ?? '');

        $user = null;
        try {
            $user = $this->auth->attempt($username, $password);
        } catch (Throwable) {
            $user = null;
        }

        if ($user === null) {
            $this->pushFlash('errors', ['credentials' => 'Invalid username or password.']);
            $this->pushFlash('old', ['username' => $username]);
            return $this->redirect($response, '/login');
        }

        $intended = $this->pullFlash('intended_url');
        $target   = is_string($intended) && $intended !== '' ? $intended : '/';

        return $this->redirect($response, $target);
    }

    public function showRegister(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if ($this->auth->check()) {
            return $this->redirect($response, '/');
        }

        return $this->render($response, 'auth/register.twig', [
            'errors' => $this->pullFlash('errors'),
            'old'    => $this->pullFlash('old'),
        ]);
    }

    public function register(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = (array) $request->getParsedBody();

        if (!$this->validCsrf($body)) {
            $this->pushFlash('errors', ['csrf' => 'Invalid form token.']);
            return $this->redirect($response, '/register');
        }

        $username = trim((string) ($body['username'] ?? ''));
        $password = (string) ($body['password'] ?? '');
        $confirm  = (string) ($body['password_confirm'] ?? $body['password2'] ?? '');
        $sex      = isset($body['sex']) ? (string) $body['sex'] : null;

        if ($confirm !== '' && $confirm !== $password) {
            $this->pushFlash('errors', ['password' => 'Passwords do not match.']);
            $this->pushFlash('old', ['username' => $username, 'sex' => $sex]);
            return $this->redirect($response, '/register');
        }

        try {
            $this->auth->register($username, $password, $sex);
        } catch (InvalidArgumentException $e) {
            $this->pushFlash('errors', ['form' => $e->getMessage()]);
            $this->pushFlash('old', ['username' => $username, 'sex' => $sex]);
            return $this->redirect($response, '/register');
        } catch (Throwable) {
            $this->pushFlash('errors', ['form' => 'Registration failed. Please try again.']);
            $this->pushFlash('old', ['username' => $username, 'sex' => $sex]);
            return $this->redirect($response, '/register');
        }

        return $this->redirect($response, '/');
    }

    public function logout(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $this->auth->logout();
        return $this->redirect($response, '/');
    }

    private function validCsrf(array $body): bool
    {
        $token = (string) ($body['csrf'] ?? '');

        if (class_exists(Csrf::class) && method_exists(Csrf::class, 'check')) {
            return (bool) Csrf::check($token);
        }

        // Fallback when Support\Csrf has not been wired up yet.
        return $token !== '' && isset($_SESSION['csrf']) && hash_equals((string) $_SESSION['csrf'], $token);
    }

    /**
     * @return mixed
     */
    private function pullFlash(string $key)
    {
        if (class_exists(Flash::class) && method_exists(Flash::class, 'pull')) {
            return Flash::pull($key);
        }

        $value = $_SESSION['_flash'][$key] ?? null;
        if (isset($_SESSION['_flash'][$key])) {
            unset($_SESSION['_flash'][$key]);
        }
        return $value;
    }

    private function pushFlash(string $key, mixed $value): void
    {
        if (class_exists(Flash::class) && method_exists(Flash::class, 'push')) {
            Flash::push($key, $value);
            return;
        }

        if (session_status() === PHP_SESSION_NONE && PHP_SAPI !== 'cli') {
            session_start();
        }
        $_SESSION['_flash'][$key] = $value;
    }
}
