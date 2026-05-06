<?php
error_reporting(0);
define('hostname','localhost');
define('username','root');
define('password','');
define('dbname','chat');
$site = 'Goshgar.Az';                    // Saytın görünən adı (browser title-da çıxır)
$site_url   = 'localhost:8000';          // Saytın əsas URL-i
$site_url_2 = 'localhost:8000';          // Chat-in URL-i (eyni domen olarsa eyni qoy)

// Modern PDO connection — runs in parallel with legacy mysql_*
if (!isset($GLOBALS['pdo'])) {
    try {
        $GLOBALS['pdo'] = new PDO(
            'mysql:host='.hostname.';dbname='.dbname.';charset=utf8',
            username, password,
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            )
        );
    } catch (Exception $e) { /* legacy mysql_* fallback below */ }
}

// Bcrypt password helper — verifies legacy base64(plain) and bcrypt hashes
if (!function_exists('chat_verify_password')) {
    function chat_verify_password($plain, $stored) {
        // Modern bcrypt
        if (is_string($stored) && strlen($stored) > 50 && preg_match('/^\$2[ayb]\$/', $stored)) {
            return password_verify($plain, $stored);
        }
        // Legacy: stored == base64(plain) per inc.php line 14
        return base64_encode($plain) === $stored;
    }
    function chat_hash_password($plain) {
        return password_hash($plain, PASSWORD_BCRYPT);
    }
    // Migrate plaintext-base64 to bcrypt for given user id
    function chat_upgrade_password($id, $plain) {
        if (!isset($GLOBALS['pdo'])) return false;
        $hash = chat_hash_password($plain);
        $stmt = $GLOBALS['pdo']->prepare('UPDATE users SET pass = ? WHERE id = ?');
        return $stmt->execute(array($hash, $id));
    }
}

include('data_post.php');
?>