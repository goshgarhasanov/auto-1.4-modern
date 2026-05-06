<?php

declare(strict_types=1);

/**
 * Legacy compatibility shim — keeps PHP 5.x era functions working on PHP 8.3.
 *
 * The legacy/ chat scripts use functions removed in PHP 7+ (mysql_*, ereg*, split,
 * each, register_globals patterns). Rather than rewrite 5,000+ call sites, this
 * file polyfills them on top of mysqli + preg_*. Loaded once via composer
 * autoload.files BEFORE any legacy script can run.
 *
 * @author Goshgar Hasanzadeh
 */

// ---------------------------------------------------------------------------
//  each() — removed in PHP 8.0
// ---------------------------------------------------------------------------
if (!function_exists('each')) {
    function each(array &$array): array|false
    {
        $key = key($array);
        if ($key === null) {
            return false;
        }
        $value = current($array);
        next($array);
        return [0 => $key, 'key' => $key, 1 => $value, 'value' => $value];
    }
}

// ---------------------------------------------------------------------------
//  ereg / eregi / split — removed in PHP 7
// ---------------------------------------------------------------------------
if (!function_exists('ereg')) {
    function ereg(string $pattern, string $string, ?array &$matches = null): int|false
    {
        $r = @preg_match('/' . str_replace('/', '\\/', $pattern) . '/', $string, $matches);
        return $r === false ? false : ($r > 0 ? max(strlen($matches[0] ?? ''), 1) : false);
    }
}

if (!function_exists('eregi')) {
    function eregi(string $pattern, string $string, ?array &$matches = null): int|false
    {
        $r = @preg_match('/' . str_replace('/', '\\/', $pattern) . '/i', $string, $matches);
        return $r === false ? false : ($r > 0 ? max(strlen($matches[0] ?? ''), 1) : false);
    }
}

if (!function_exists('eregi_replace')) {
    function eregi_replace(string $pattern, string $replacement, string $string): string|false|null
    {
        return @preg_replace('/' . str_replace('/', '\\/', $pattern) . '/i', $replacement, $string);
    }
}

if (!function_exists('ereg_replace')) {
    function ereg_replace(string $pattern, string $replacement, string $string): string|false|null
    {
        return @preg_replace('/' . str_replace('/', '\\/', $pattern) . '/', $replacement, $string);
    }
}

if (!function_exists('split')) {
    function split(string $pattern, string $string, int $limit = -1): array|false
    {
        return @preg_split('/' . str_replace('/', '\\/', $pattern) . '/', $string, $limit);
    }
}

if (!function_exists('spliti')) {
    function spliti(string $pattern, string $string, int $limit = -1): array|false
    {
        return @preg_split('/' . str_replace('/', '\\/', $pattern) . '/i', $string, $limit);
    }
}

// ---------------------------------------------------------------------------
//  mysql_* — removed in PHP 7. Wrap mysqli to keep legacy code alive.
// ---------------------------------------------------------------------------
if (!function_exists('mysql_connect')) {
    /** @var \mysqli|null */
    $GLOBALS['__legacy_mysqli'] = null;

    function mysql_connect(?string $host = null, ?string $user = null, ?string $password = null): \mysqli|false
    {
        $host     = $host     ?? (string) ($_ENV['DB_HOST'] ?? 'localhost');
        $user     = $user     ?? (string) ($_ENV['DB_USER'] ?? 'root');
        $password = $password ?? (string) ($_ENV['DB_PASS'] ?? '');

        try {
            $link = @new \mysqli($host, $user, $password);
            if ($link->connect_errno) {
                return false;
            }
            $link->set_charset('utf8');
            $GLOBALS['__legacy_mysqli'] = $link;
            return $link;
        } catch (\Throwable) {
            return false;
        }
    }

    function mysql_pconnect(?string $host = null, ?string $user = null, ?string $password = null): \mysqli|false
    {
        return mysql_connect($host, $user, $password);
    }

    function mysql_select_db(string $db, ?\mysqli $link = null): bool
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->select_db($db) : false;
    }

    function mysql_query(string $query, ?\mysqli $link = null): \mysqli_result|bool
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        if (!$link instanceof \mysqli) {
            return false;
        }
        return @$link->query($query);
    }

    function mysql_fetch_array(\mysqli_result|false $result, int $type = MYSQLI_BOTH): array|false|null
    {
        return $result instanceof \mysqli_result ? $result->fetch_array($type) : false;
    }

    function mysql_fetch_assoc(\mysqli_result|false $result): array|false|null
    {
        return $result instanceof \mysqli_result ? $result->fetch_assoc() : false;
    }

    function mysql_fetch_row(\mysqli_result|false $result): array|false|null
    {
        return $result instanceof \mysqli_result ? $result->fetch_row() : false;
    }

    function mysql_fetch_object(\mysqli_result|false $result, string $class = 'stdClass'): object|false|null
    {
        return $result instanceof \mysqli_result ? $result->fetch_object($class) : false;
    }

    function mysql_num_rows(\mysqli_result|false $result): int|false
    {
        return $result instanceof \mysqli_result ? (int) $result->num_rows : false;
    }

    function mysql_num_fields(\mysqli_result|false $result): int|false
    {
        return $result instanceof \mysqli_result ? $result->field_count : false;
    }

    function mysql_field_name(\mysqli_result|false $result, int $field): string|false
    {
        if (!$result instanceof \mysqli_result) {
            return false;
        }
        $info = $result->fetch_field_direct($field);
        return $info ? $info->name : false;
    }

    function mysql_affected_rows(?\mysqli $link = null): int
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? max(0, $link->affected_rows) : 0;
    }

    function mysql_insert_id(?\mysqli $link = null): int|string
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->insert_id : 0;
    }

    function mysql_result(\mysqli_result|false $result, int $row, int|string $field = 0): mixed
    {
        if (!$result instanceof \mysqli_result) {
            return false;
        }
        $result->data_seek($row);
        $line = $result->fetch_array();
        if ($line === null || $line === false) {
            return false;
        }
        return is_int($field) ? ($line[$field] ?? false) : ($line[$field] ?? false);
    }

    function mysql_real_escape_string(string $str, ?\mysqli $link = null): string
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->real_escape_string($str) : addslashes($str);
    }

    function mysql_escape_string(string $str): string
    {
        $link = $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->real_escape_string($str) : addslashes($str);
    }

    function mysql_close(?\mysqli $link = null): bool
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        if ($link instanceof \mysqli) {
            $link->close();
            $GLOBALS['__legacy_mysqli'] = null;
            return true;
        }
        return false;
    }

    function mysql_error(?\mysqli $link = null): string
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? (string) $link->error : '';
    }

    function mysql_errno(?\mysqli $link = null): int
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? (int) $link->errno : 0;
    }

    function mysql_data_seek(\mysqli_result|false $result, int $offset): bool
    {
        return $result instanceof \mysqli_result && $result->data_seek($offset);
    }

    function mysql_free_result(\mysqli_result|false $result): bool
    {
        if ($result instanceof \mysqli_result) {
            $result->free();
            return true;
        }
        return false;
    }

    function mysql_get_server_info(?\mysqli $link = null): string|false
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->server_info : false;
    }

    function mysql_get_client_info(): string
    {
        return mysqli_get_client_info();
    }

    function mysql_set_charset(string $charset, ?\mysqli $link = null): bool
    {
        $link = $link ?? $GLOBALS['__legacy_mysqli'] ?? null;
        return $link instanceof \mysqli ? $link->set_charset($charset) : false;
    }
}

// ---------------------------------------------------------------------------
//  Other PHP 5 → 8 quirks
// ---------------------------------------------------------------------------
if (!function_exists('get_magic_quotes_gpc')) {
    function get_magic_quotes_gpc(): bool { return false; }
}
if (!function_exists('get_magic_quotes_runtime')) {
    function get_magic_quotes_runtime(): bool { return false; }
}
if (!function_exists('set_magic_quotes_runtime')) {
    function set_magic_quotes_runtime(bool $enable): bool { return false; }
}
