<?php
/**
 * Front controller for Goshgar.Az.
 *
 * Boots the Slim 4 application, loads the DI container and route map, then
 * delegates anything unmatched to the legacy chat scripts in /legacy so the
 * original URLs (/index.php, /reg.php, /license.php, ...) keep working
 * untouched while the new MVC layer grows around them.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

use DI\Container;
use Dotenv\Dotenv;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

/* ---------------------------------------------------------------------------
 |  Static asset short-circuit
 |  When the dev server (php -S) is hit for a real file under public/ it serves
 |  the file itself. But static assets that historically lived next to legacy
 |  scripts (chat/css/*, /img/*, etc.) must still resolve. We let the legacy
 |  bridge below handle those paths because they all end in .css/.png/.js/...
 |  and the legacy folder mirrors the original web-root layout.
 * ------------------------------------------------------------------------- */

$projectRoot = dirname(__DIR__);
$legacyRoot  = $projectRoot . '/legacy';
$publicRoot  = __DIR__;

/* Built-in PHP server: pass through real files in /public unchanged. */
if (PHP_SAPI === 'cli-server') {
    $requestedPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $candidate     = $publicRoot . $requestedPath;
    if ($requestedPath !== '/' && is_file($candidate)) {
        return false;
    }
}

/* ---------------------------------------------------------------------------
 |  Environment
 * ------------------------------------------------------------------------- */

$dotenv = Dotenv::createImmutable($projectRoot);
$dotenv->safeLoad();

$debug = filter_var($_ENV['APP_DEBUG'] ?? 'false', FILTER_VALIDATE_BOOLEAN);

/* ---------------------------------------------------------------------------
 |  DI container
 * ------------------------------------------------------------------------- */

$container = new Container();

$container->set('config.app', static function (): array {
    return require __DIR__ . '/../config/app.php';
});

$container->set('config.database', static function (): array {
    return require __DIR__ . '/../config/database.php';
});

/* Optional dependency wiring (added by the services layer later). */
$dependenciesFile = $projectRoot . '/config/dependencies.php';
if (is_file($dependenciesFile)) {
    $register = require $dependenciesFile;
    if (is_callable($register)) {
        $register($container);
    } elseif (is_array($register)) {
        foreach ($register as $key => $value) {
            $container->set($key, $value);
        }
    }
}

/* ---------------------------------------------------------------------------
 |  Slim app
 * ------------------------------------------------------------------------- */

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware($debug, true, true);

/* Application routes (added by the routing layer later). */
$routesFile = $projectRoot . '/routes/web.php';
if (is_file($routesFile)) {
    $registerRoutes = require $routesFile;
    if (is_callable($registerRoutes)) {
        $registerRoutes($app);
    }
}

/* ---------------------------------------------------------------------------
 |  Legacy bridge — must be the last thing registered so real routes win.
 * ------------------------------------------------------------------------- */

$legacyExecutor = static function (
    ResponseInterface $response,
    string $absoluteFile,
    string $legacyRoot
): ResponseInterface {
    $previousCwd                    = getcwd();
    $previousDocumentRoot           = $_SERVER['DOCUMENT_ROOT'] ?? null;
    $previousScriptFilename         = $_SERVER['SCRIPT_FILENAME'] ?? null;
    $previousScriptName             = $_SERVER['SCRIPT_NAME'] ?? null;
    $previousPhpSelf                = $_SERVER['PHP_SELF'] ?? null;

    $_SERVER['DOCUMENT_ROOT']   = $legacyRoot;
    $_SERVER['SCRIPT_FILENAME'] = $absoluteFile;
    $relative                   = '/' . ltrim(str_replace('\\', '/', substr($absoluteFile, strlen($legacyRoot))), '/');
    $_SERVER['SCRIPT_NAME']     = $relative;
    $_SERVER['PHP_SELF']        = $relative;

    chdir($legacyRoot);

    ob_start();
    try {
        (static function (string $__legacyFile): void {
            require $__legacyFile;
        })($absoluteFile);
    } finally {
        $body = ob_get_clean() ?: '';
        if ($previousCwd !== false) {
            chdir($previousCwd);
        }
        if ($previousDocumentRoot !== null) {
            $_SERVER['DOCUMENT_ROOT'] = $previousDocumentRoot;
        }
        if ($previousScriptFilename !== null) {
            $_SERVER['SCRIPT_FILENAME'] = $previousScriptFilename;
        }
        if ($previousScriptName !== null) {
            $_SERVER['SCRIPT_NAME'] = $previousScriptName;
        }
        if ($previousPhpSelf !== null) {
            $_SERVER['PHP_SELF'] = $previousPhpSelf;
        }
    }

    $response->getBody()->write($body);

    return $response;
};

/* Static assets that live inside legacy/ (or under public/assets). */
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot', 'map'];

$staticHandler = function (
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args
) use ($staticExtensions, $legacyRoot, $publicRoot): ResponseInterface {
    $path = ltrim($args['path'] ?? '', '/');
    $ext  = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if (!in_array($ext, $staticExtensions, true)) {
        return $response->withStatus(404);
    }

    foreach ([$publicRoot . '/assets/' . $path, $publicRoot . '/' . $path, $legacyRoot . '/' . $path] as $candidate) {
        $real = realpath($candidate);
        if ($real === false || !is_file($real)) {
            continue;
        }

        $mime = match ($ext) {
            'css'                  => 'text/css',
            'js'                   => 'application/javascript',
            'png'                  => 'image/png',
            'jpg', 'jpeg'          => 'image/jpeg',
            'gif'                  => 'image/gif',
            'ico'                  => 'image/x-icon',
            'svg'                  => 'image/svg+xml',
            'woff'                 => 'font/woff',
            'woff2'                => 'font/woff2',
            'ttf'                  => 'font/ttf',
            'eot'                  => 'application/vnd.ms-fontobject',
            default                => 'application/octet-stream',
        };

        $response->getBody()->write((string) file_get_contents($real));

        return $response->withHeader('Content-Type', $mime);
    }

    return $response->withStatus(404);
};

$app->get('/{path:.+\.(?:css|js|png|jpe?g|gif|ico|svg|woff2?|ttf|eot|map)}', $staticHandler);

/* Legacy PHP scripts: /<anything>.php (including subdirectories). */
$app->any('/{path:.+\.php}', function (
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args
) use ($legacyRoot, $legacyExecutor): ResponseInterface {
    $relative = ltrim($args['path'] ?? '', '/');
    if ($relative === '' || str_contains($relative, '..')) {
        return $response->withStatus(404);
    }

    $file = $legacyRoot . '/' . $relative;
    $real = realpath($file);
    if ($real === false || !is_file($real) || !str_starts_with($real, realpath($legacyRoot) ?: $legacyRoot)) {
        return $response->withStatus(404);
    }

    return $legacyExecutor($response, $real, $legacyRoot);
});

/* Root URL → legacy/index.php (the chat home page). */
$app->any('/', function (
    ServerRequestInterface $request,
    ResponseInterface $response
) use ($legacyRoot, $legacyExecutor): ResponseInterface {
    $file = $legacyRoot . '/index.php';
    if (!is_file($file)) {
        $response->getBody()->write('Goshgar.Az — bootstrap up. (legacy/index.php not found)');

        return $response;
    }

    return $legacyExecutor($response, $file, $legacyRoot);
});

$app->run();
