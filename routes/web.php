<?php

declare(strict_types=1);

/**
 * Goshgar.Az — Web Routes
 *
 * Currently empty: all traffic flows through the legacy/ bridge in
 * public/index.php so the original 181 PHP scripts keep serving every URL
 * untouched. Modern MVC routes will be reintroduced incrementally.
 *
 * @author Goshgar Hasanzadeh
 */

use Slim\App;

return function (App $app): void {
    // Intentionally empty. Legacy bridge in public/index.php handles all URLs.
};
