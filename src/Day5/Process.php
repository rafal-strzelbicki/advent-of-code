<?php
declare(strict_types=1);
namespace Advent\Day5;

class Process
{
    private $instructionsList;

    public function __construct(InstructionsList $instructionsList)
    {
        $this->instructionsList = $instructionsList;
    }

    public function start(): int
    {
        $steps = 0;

        while (true) {
            if (false === $this->instructionsList->current()) {
                return $steps;
            }

            $value = $this->instructionsList->current()->getValue();

            if ($value >= 3) {
                $this->instructionsList->current()->decrement();
            } else {
                $this->instructionsList->current()->increment();
            }

            if ($value >= 0) {
                $this->jumpForward($value);
            } else {
                $this->jumpBackward(abs($value));
            }

            $steps++;
        }
    }

    private function jumpForward($steps): void
    {
        for ($i = 0; $i < $steps; $i++) {
            $this->instructionsList->next();
        }
    }

    private function jumpBackward($steps): void
    {
        for ($i = 0; $i < $steps; $i++) {
            $this->instructionsList->prev();
        }
    }
}
