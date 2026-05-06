<?php
/**
 * Global helper functions.
 *
 * Loaded via composer.json's "autoload.files" entry so the helpers below are
 * always available — including from legacy/*.php scripts running through the
 * bridge in public/index.php.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

use App\Support\Env;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

if (!function_exists('env')) {
    /**
     * Read an environment variable with a default fallback.
     */
    function env(string $key, mixed $default = null): mixed
    {
        return Env::get($key, $default);
    }
}

if (!function_exists('config')) {
    /**
     * Dot-notation lookup against /config/*.php arrays (cached per request).
     *
     * Example:  config('app.name'), config('database.connections.mysql.host')
     */
    function config(string $key, mixed $default = null): mixed
    {
        static $cache = [];

        if ($key === '') {
            return $default;
        }

        $segments = explode('.', $key);
        $file     = array_shift($segments);

        if (!array_key_exists($file, $cache)) {
            $configRoot = defined('APP_CONFIG_PATH')
                ? APP_CONFIG_PATH
                : dirname(__DIR__, 2) . '/config';
            $path = $configRoot . '/' . $file . '.php';
            $cache[$file] = is_file($path) ? require $path : null;
        }

        $value = $cache[$file];
        foreach ($segments as $segment) {
            if (is_array($value) && array_key_exists($segment, $value)) {
                $value = $value[$segment];
                continue;
            }
            return $default;
        }

        return $value ?? $default;
    }
}

if (!function_exists('asset')) {
    /**
     * Build a URL pointing at /public/assets/<path>.
     */
    function asset(string $path): string
    {
        $base = rtrim((string) env('APP_URL', 'http://localhost:8000'), '/');

        return $base . '/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('url')) {
    /**
     * Build a URL relative to APP_URL.
     */
    function url(string $path = ''): string
    {
        $base = rtrim((string) env('APP_URL', 'http://localhost:8000'), '/');
        $path = ltrim($path, '/');

        return $path === '' ? $base : $base . '/' . $path;
    }
}

if (!function_exists('flash')) {
    /**
     * Setter / getter for one-shot session flash data.
     *
     *   flash('error', 'Bad input');   // set
     *   flash('error');                // read + clear
     */
    function flash(string $key, mixed $value = null): mixed
    {
        if (session_status() === PHP_SESSION_NONE && PHP_SAPI !== 'cli') {
            @session_start();
        }

        if (!isset($_SESSION['_flash']) || !is_array($_SESSION['_flash'])) {
            $_SESSION['_flash'] = [];
        }

        if (func_num_args() === 1) {
            $stored = $_SESSION['_flash'][$key] ?? null;
            unset($_SESSION['_flash'][$key]);
            return $stored;
        }

        $_SESSION['_flash'][$key] = $value;
        return $value;
    }
}

if (!function_exists('old')) {
    /**
     * Read an old-input value flashed by the previous request.
     */
    function old(string $key, mixed $default = ''): mixed
    {
        if (session_status() === PHP_SESSION_NONE && PHP_SAPI !== 'cli') {
            @session_start();
        }

        $bucket = $_SESSION['_old'] ?? [];
        if (!is_array($bucket)) {
            return $default;
        }

        return array_key_exists($key, $bucket) ? $bucket[$key] : $default;
    }
}

if (!function_exists('e')) {
    /**
     * Escape a string for safe HTML output.
     */
    function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('dd')) {
    /**
     * Dev-only: dump and die.
     */
    function dd(mixed ...$args): never
    {
        if (function_exists('dump')) {
            foreach ($args as $arg) {
                dump($arg);
            }
        } else {
            foreach ($args as $arg) {
                var_dump($arg);
            }
        }
        exit(1);
    }
}

if (!function_exists('logger')) {
    /**
     * Process-wide PSR-3 logger instance (Monolog under the hood).
     */
    function logger(): LoggerInterface
    {
        static $instance = null;

        if ($instance instanceof LoggerInterface) {
            return $instance;
        }

        if (!class_exists(Logger::class)) {
            return $instance = new NullLogger();
        }

        $channel = (string) env('LOG_CHANNEL', 'daily');
        $level   = (string) env('LOG_LEVEL', 'debug');

        $logger  = new Logger((string) env('APP_NAME', 'goshgaraz'));
        $logsDir = (string) (config('app.log.path') ?? dirname(__DIR__, 2) . '/storage/logs');

        if (!is_dir($logsDir)) {
            @mkdir($logsDir, 0775, true);
        }

        try {
            $handler = $channel === 'single'
                ? new StreamHandler($logsDir . '/app.log', $level)
                : new RotatingFileHandler($logsDir . '/app.log', 14, $level);
            $logger->pushHandler($handler);
        } catch (\Throwable) {
            return $instance = new NullLogger();
        }

        return $instance = $logger;
    }
}
