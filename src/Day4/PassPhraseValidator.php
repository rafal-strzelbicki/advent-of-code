<?php
declare(strict_types=1);
namespace Advent\Day4;

class PassPhraseValidator
{
    public function validate(PassPhrase $passPhrase): bool
    {
        $words = explode(' ', (string) $passPhrase);

        return \count($words) === \count(array_unique($words));
    }

    public function extraValidation(PassPhrase $passPhrase): bool
    {
        $index = 0;
        $words = explode(' ', (string) $passPhrase);
        $numOfWords = \count($words);

        while ($index < $numOfWords) {
            foreach ($words as $key => $word) {
                if ($index === $key) {
                    continue;
                }

                if ($this->isAnagram($words[$index], $word)) {
                    return false;
                }
            }

            unset($words[$index++]);
        }

        return true;
    }

    private function isAnagram(string $word1, string $word2): bool
    {
        if (\strlen($word1) !== \strlen($word2)) {
            return false;
        }

        $word2Letters = str_split($word2);

        foreach (str_split($word1) as $letter) {
            if (false !== $key = array_search($letter, $word2Letters, true)) {
                unset($word2Letters[$key]);
            }
        }

        return \count($word2Letters) === 0;
    }
}
