<?php
declare(strict_types=1);
namespace Advent\Day4;

class PassPhrase
{
    private $passPhrase;

    public function __construct(string $passPhrase)
    {
        $this->passPhrase = $passPhrase;
    }

    public function __toString(): string
    {
        return $this->passPhrase;
    }
}
