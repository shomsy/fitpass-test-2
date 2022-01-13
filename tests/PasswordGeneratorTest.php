<?php declare(strict_types=1);

use PasswordGenerator\PasswordGenerator;
use PHPUnit\Framework\TestCase;

class PasswordGeneratorTest extends TestCase
{
    protected PasswordGenerator $passwordGenerator;

    /**
     *
     */
    protected function setUp(): void
    {
        $this->passwordGenerator = new PasswordGenerator();
    }

    public function testGeneratePasswordWithStrengthOnePasses(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('passwoRD123');

        $this->assertTrue($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthOnePassesWhenLengthIsGreaterThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('passwoRD123passwoRD123', 10);

        $this->assertTrue($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthOneFailsWhenLengthIsLessThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('passw', 5);

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthOneFailsWhenUppercaseLettersMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('password123');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthOneFailsWhenNumberOfUppercaseLettersAreLessThanTwo(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('passworD123');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordFailsWithStrengthOneWhenLowercaseLettersMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthOne('$#%!123E');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthTwoPasses(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passwoRD1235');

        $this->assertTrue($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthTwoPassesWhenLengthIsGreaterThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passwoRD123passwoRD123', 10);

        $this->assertTrue($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthTwoFailsWhenLengthIsLessThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passw', 5);

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthTwoFailsWhenUppercaseLettersMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('password123');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthTwoFailsWhenNumberOfUppercaseLettersAreLessThanTwo(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passworD123');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordFailsWithStrengthTwoWhenLowercaseLettersMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('$#%!123E');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordFailsWithStrengthTwoWhenNumberBetweenTwoAndFiveMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passwoRD');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordFailsWithStrengthTwoWhenNumberIsNotBetweenTwoAndFive(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passwoRD19');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthThreePasses(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthThree('passwoRD1235!');

        $this->assertTrue($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthThreeFailsWhenSpecialCharactersMissing(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthThree('password1235');

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthThreePassesWhenLengthIsGreaterThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthThree('passwoRD123passwoRD123', 10);

        $this->assertFalse($generatedPassword);
    }

    public function testGeneratePasswordWithStrengthThreeFailsWhenLengthIsLessThanSix(): void
    {
        $generatedPassword = $this->passwordGenerator->strengthTwo('passw', 5);

        $this->assertFalse($generatedPassword);
    }
}
