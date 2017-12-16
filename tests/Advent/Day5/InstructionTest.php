<?php
namespace Advent\Day5;

use PHPUnit\Framework\TestCase;

class InstructionTest extends TestCase
{
    public function testItReturnsItsValue()
    {
        $this->assertEquals(1, (new Instruction(1))->getValue());
    }

    public function testItsValueCanBeIncremented()
    {
        $instruction = new Instruction(1);
        $instruction->increment();

        $this->assertEquals(2, $instruction->getValue());
    }

    public function testItsValueCanBeDecremented()
    {
        $instruction = new Instruction(1);
        $instruction->decrement();

        $this->assertEquals(0, $instruction->getValue());
    }
}
