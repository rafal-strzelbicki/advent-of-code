<?php
declare(strict_types=1);
namespace Advent\Day5;

class Process
{
    private $executedInstructions;
    private $instructionsList;

    public function __construct(InstructionsList $instructionsList)
    {
        if ($instructionsList->isEmpty()) {
            throw new \InvalidArgumentException('Process must have at least one instruction');
        }

        $this->executedInstructions = 0;
        $this->instructionsList = $instructionsList;
    }

    public function awaitingInstruction(): Instruction
    {
        if (false === $this->instructionsList->current()) {
            throw new \RuntimeException('There are no more instructions left');
        }

        return $this->instructionsList->current();
    }

    public function executeAwaitingInstruction(): void
    {
        $value = $this->awaitingInstruction()->getValue();
        $this->awaitingInstruction()->increment();
        $this->executedInstructions++;

        if ($value >= 0) {
            while ($value --) {
                $this->instructionsList->next();
            }
        } else {
            $value = abs($value);
            while ($value--) {
                $this->instructionsList->prev();
            }
        }
    }

    public function numberOfExecutedInstructions(): int
    {
        return $this->executedInstructions;
    }
}
