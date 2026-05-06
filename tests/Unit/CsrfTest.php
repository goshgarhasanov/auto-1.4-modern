<?php
/**
 * Unit tests for App\Support\Csrf.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace Tests\Unit;

use App\Support\Csrf;
use Tests\TestCase;

final class CsrfTest extends TestCase
{
    public function testTokenGeneratesA64CharHexString(): void
    {
        $token = Csrf::token();

        self::assertSame(64, strlen($token));
        self::assertMatchesRegularExpression('/^[a-f0-9]{64}$/', $token);
    }

    public function testTokenIsStableWithinTheSameSession(): void
    {
        $first  = Csrf::token();
        $second = Csrf::token();

        self::assertSame($first, $second);
    }

    public function testCheckReturnsTrueForActiveToken(): void
    {
        $token = Csrf::token();

        self::assertTrue(Csrf::check($token));
    }

    public function testCheckReturnsFalseForUnknownToken(): void
    {
        Csrf::token();

        self::assertFalse(Csrf::check('not-the-real-token'));
    }

    public function testCheckReturnsFalseWhenNoTokenWasIssued(): void
    {
        // setUp() destroyed the previous session — no token exists yet.
        self::assertFalse(Csrf::check('anything'));
    }

    public function testRegenerateProducesADifferentValue(): void
    {
        $original = Csrf::token();
        $rotated  = Csrf::regenerate();

        self::assertNotSame($original, $rotated);
        self::assertFalse(Csrf::check($original));
        self::assertTrue(Csrf::check($rotated));
    }

    public function testFieldRendersAHiddenInput(): void
    {
        $field = Csrf::field();

        self::assertStringStartsWith('<input type="hidden" name="_csrf" value="', $field);
        self::assertStringEndsWith('">', $field);
        self::assertStringContainsString(Csrf::token(), $field);
    }
}
