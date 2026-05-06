<?php
/**
 * Unit tests for App\Services\PasswordHasher.
 *
 * The hasher must accept legacy base64-encoded passwords (the original chat
 * stored them that way) while issuing modern bcrypt hashes for fresh writes.
 *
 * @author Goshgar Hasanzadeh
 */

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\PasswordHasher;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

final class PasswordHasherTest extends TestCase
{
    private PasswordHasher $hasher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->hasher = new PasswordHasher();
    }

    public function testFreshBcryptHashVerifiesAgainstThePlain(): void
    {
        $hash = $this->hasher->hash('s3cret!');

        self::assertNotSame('s3cret!', $hash);
        self::assertMatchesRegularExpression('/^\$2[aby]\$\d{2}\$.{53}$/', $hash);
        self::assertTrue($this->hasher->verify('s3cret!', $hash));
    }

    public function testLegacyBase64StoredPasswordVerifiesForBackwardCompat(): void
    {
        $legacy = base64_encode('hunter2');

        self::assertTrue($this->hasher->verify('hunter2', $legacy));
    }

    public function testWrongPasswordFailsAgainstBcryptHash(): void
    {
        $hash = $this->hasher->hash('correct-horse');

        self::assertFalse($this->hasher->verify('wrong-horse', $hash));
    }

    public function testWrongPasswordFailsAgainstLegacyHash(): void
    {
        $legacy = base64_encode('topsecret');

        self::assertFalse($this->hasher->verify('not-it', $legacy));
    }

    public function testEmptyStoredHashAlwaysFails(): void
    {
        self::assertFalse($this->hasher->verify('anything', ''));
    }

    public function testIsLegacyClassifiesBase64Strings(): void
    {
        self::assertTrue($this->hasher->isLegacy(base64_encode('legacy-pass')));
    }

    public function testIsLegacyRejectsBcryptHashes(): void
    {
        $hash = $this->hasher->hash('modern-pass');

        self::assertFalse($this->hasher->isLegacy($hash));
    }

    public function testIsLegacyRejectsEmptyString(): void
    {
        self::assertFalse($this->hasher->isLegacy(''));
    }

    #[DataProvider('plainPasswords')]
    public function testHashAndVerifyRoundtrip(string $plain): void
    {
        $hash = $this->hasher->hash($plain);

        self::assertTrue($this->hasher->verify($plain, $hash), sprintf('Failed for "%s".', $plain));
        self::assertFalse($this->hasher->verify($plain . 'x', $hash));
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function plainPasswords(): iterable
    {
        yield 'short ASCII'        => ['abc'];
        yield 'mixed printable'    => ['Aa1!Aa1!'];
        yield 'azerbaijani chars'  => ['ŞşĞğÜüÖöÇçƏə'];
        yield 'long passphrase'    => ['correct horse battery staple 2026'];
        yield 'unicode with space' => ['parol 12 ə '];
    }
}
