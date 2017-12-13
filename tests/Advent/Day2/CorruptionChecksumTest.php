<?php
namespace Advent\Day2;

use PHPUnit\Framework\TestCase;

class CorruptionChecksumTest extends TestCase
{
    public function testGetSum()
    {
        $this->assertEquals(
            18,
            (new CorruptionChecksum([
                [5, 1, 9, 5],
                [7, 5, 3],
                [2, 4, 6, 8]
            ]))->getSum()
        );
    }

    public function testGetEvenlyDivisibleValuesSum()
    {
        $this->assertEquals(
            9,
            (new CorruptionChecksum([
                [5, 9, 2, 8],
                [9, 4, 7, 3],
                [3, 8, 6 ,5]
            ]))->getEvenlyDivisibleValuesSUm()
        );
    }
}
