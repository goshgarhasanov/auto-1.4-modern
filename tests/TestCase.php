<?php
/**
 * Base PHPUnit test case.
 *
 * Provides a small set of shared helpers (db(), assertJsonHas(), session
 * isolation) so individual tests stay focused on the behaviour under test.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace Tests;

use PDO;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Tests run sequentially in a single process; reset session state between cases.
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            @session_destroy();
        }
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            @session_destroy();
        }
        $_SESSION = [];

        parent::tearDown();
    }

    /**
     * Shared in-memory SQLite PDO; the suite is skipped if pdo_sqlite is missing.
     */
    protected function db(): PDO
    {
        $pdo = $GLOBALS['__TEST_PDO__'] ?? null;
        if (!$pdo instanceof PDO) {
            $this->markTestSkipped('pdo_sqlite extension is not available.');
        }

        return $pdo;
    }

    /**
     * Assert that decoded JSON contains the given key/value pairs.
     *
     * @param array<string,mixed> $expected
     */
    protected function assertJsonHas(array $expected, string $json, string $message = ''): void
    {
        $decoded = json_decode($json, true);
        self::assertIsArray($decoded, $message ?: 'Response is not valid JSON.');

        foreach ($expected as $key => $value) {
            self::assertArrayHasKey($key, $decoded, $message ?: sprintf('Missing JSON key "%s".', $key));
            self::assertSame($value, $decoded[$key], $message ?: sprintf('Unexpected value for "%s".', $key));
        }
    }

    /**
     * Helper for tests that need to assert against a substring inside HTML.
     */
    protected function assertHtmlContains(string $needle, string $haystack, string $message = ''): void
    {
        self::assertStringContainsString($needle, $haystack, $message);
    }
}
