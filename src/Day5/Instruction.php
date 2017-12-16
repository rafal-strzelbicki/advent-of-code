<?php
declare(strict_types=1);
namespace Advent\Day5;

class Instruction
{
    private $instruction;

    public function __construct(int $instruction)
    {
        $this->instruction = $instruction;
    }

    public function getValue(): int
    {
        return $this->instruction;
    }

    public function increment(): void
    {
        $this->instruction++;
    }

    public function decrement(): void
    {
        $this->instruction--;
    }
}
