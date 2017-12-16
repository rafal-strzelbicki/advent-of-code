<?php
namespace Advent\Day5;

use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    public function testItMustHaveAtLeastOneInstruction()
    {
        $this->expectExceptionMessage('Process must have at least one instruction');
        $this->expectException(\InvalidArgumentException::class);

        new Process(new InstructionsList());
    }

    public function testItDoesNotStartAutomatically()
    {
        $this->assertEquals(
            new Instruction(0),
            (new Process(new InstructionsList([new Instruction(0)])))->awaitingInstruction()
        );
    }

    public function testItJumpsForwardToInstructions()
    {
        $process = new Process(new InstructionsList([
            new Instruction(2),
            new Instruction(0),
            new Instruction(10),
        ]));
        $process->executeAwaitingInstruction();

        $this->assertEquals(new Instruction(10), $process->awaitingInstruction());
    }

    public function testItJumpsBackwardsToInstructions()
    {
        $process = new Process(new InstructionsList([
            new Instruction(2),
            new Instruction(0),
            new Instruction(-1),
        ]));
        $process->executeAwaitingInstruction();
        $process->executeAwaitingInstruction();

        $this->assertEquals(new Instruction(0), $process->awaitingInstruction());
    }

    public function testItCountsExecutedInstructions()
    {
        $process = new Process(new InstructionsList([
            new Instruction(0),
        ]));
        $process->executeAwaitingInstruction();

        $this->assertEquals(1, $process->numberOfExecutedInstructions());
    }

    public function testItIncrementsValueOfEveryExecutedInstruction()
    {
        $process = new Process(new InstructionsList([
            new Instruction(1),
            new Instruction(-1),
        ]));
        $process->executeAwaitingInstruction();
        $process->executeAwaitingInstruction();

        $this->assertEquals(new Instruction(2), $process->awaitingInstruction());
    }

    public function testItStopsExecutingIfThereAreNoMoreInstructionsLeft()
    {
        $this->expectExceptionMessage('There are no more instructions left');
        $this->expectException(\RuntimeException::class);

        $process = new Process(new InstructionsList([new Instruction(1)]));

        $process->executeAwaitingInstruction();
        $process->executeAwaitingInstruction();
    }
}
