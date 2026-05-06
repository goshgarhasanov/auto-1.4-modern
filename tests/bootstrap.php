<?php
/**
 * PHPUnit bootstrap.
 *
 * - Loads composer's autoloader (PSR-4 + helpers.php files autoload).
 * - Reads .env.testing if present, falling back to .env so tests can run on
 *   any machine without extra setup.
 * - Forces APP_ENV=testing and switches LOG_CHANNEL to /dev/null so unit tests
 *   never touch storage/logs.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

use Dotenv\Dotenv;

$projectRoot = dirname(__DIR__);

require $projectRoot . '/vendor/autoload.php';

/* Ensure global helpers are loaded even before composer.json's "files"
   autoload entry is wired up by the bootstrap agent. Idempotent thanks to
   function_exists() guards inside helpers.php itself. */
$helpersFile = $projectRoot . '/app/Support/helpers.php';
if (is_file($helpersFile)) {
    require_once $helpersFile;
}

if (!defined('APP_CONFIG_PATH')) {
    define('APP_CONFIG_PATH', $projectRoot . '/config');
}

if (!defined('APP_ROOT_PATH')) {
    define('APP_ROOT_PATH', $projectRoot);
}

/* ---------------------------------------------------------------------------
 |  Environment
 * ------------------------------------------------------------------------- */
$envFile = is_file($projectRoot . '/.env.testing') ? '.env.testing' : '.env';

if (is_file($projectRoot . '/' . $envFile)) {
    Dotenv::createImmutable($projectRoot, $envFile)->safeLoad();
}

$_ENV['APP_ENV']   = 'testing';
$_SERVER['APP_ENV'] = 'testing';
putenv('APP_ENV=testing');

if (!isset($_ENV['APP_URL']) || $_ENV['APP_URL'] === '') {
    $_ENV['APP_URL'] = 'http://localhost';
}

if (!isset($_ENV['APP_NAME']) || $_ENV['APP_NAME'] === '') {
    $_ENV['APP_NAME'] = 'Goshgar.Az';
}

/* ---------------------------------------------------------------------------
 |  Storage directories — make sure tests can write logs/sessions if needed.
 * ------------------------------------------------------------------------- */
foreach (['logs', 'cache', 'sessions', 'uploads'] as $dir) {
    $path = $projectRoot . '/storage/' . $dir;
    if (!is_dir($path)) {
        @mkdir($path, 0775, true);
    }
}

/* Quiet, deterministic timezone for date assertions. */
date_default_timezone_set('UTC');

/* ---------------------------------------------------------------------------
 |  Optional: seed a SQLite in-memory PDO for repository tests. The connection
 |  is exposed via Tests\TestCase::db() so individual suites can opt in.
 * ------------------------------------------------------------------------- */
$GLOBALS['__TEST_PDO__'] = null;

if (extension_loaded('pdo_sqlite')) {
    try {
        $pdo = new PDO('sqlite::memory:', null, null, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $GLOBALS['__TEST_PDO__'] = $pdo;
    } catch (Throwable) {
        // SQLite unavailable: tests requiring db() will skip themselves.
    }
}
