<?php
namespace Advent\Day4;
use PHPUnit\Framework\TestCase;

class PassPhraseValidatorTest extends TestCase
{
    public function testItReturnsFalseIfThereIsDuplicatedWordInPassPhraseAndTrueOtherwise()
    {
        $this->assertFalse((new PassPhraseValidator())->validate(new PassPhrase('aa bb cc dd aa')));
        $this->assertTrue((new PassPhraseValidator())->validate(new PassPhrase('aa bb cc dd aaa')));
    }

    public function testItReturnFalseIfAnyTwoWordsInPassPhraseAreAnagramsAndTrueOtherwise()
    {
        $this->assertFalse((new PassPhraseValidator())->extraValidation(new PassPhrase('abcde xyz ecdab')));
        $this->assertTrue((new PassPhraseValidator())->extraValidation(new PassPhrase('iiii oiii ooii oooi oooo')));
    }
}
