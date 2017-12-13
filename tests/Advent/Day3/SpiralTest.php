<?php
namespace Advent\Day3;

use PHPUnit\Framework\TestCase;

class SpiralTest extends TestCase
{
    public function testItThrowsExceptionWhenNumberDoesNotExistInSpiral()
    {
        $this->expectExceptionMessage('Given number does not exist in spiral');
        $this->expectException(\InvalidArgumentException::class);

        (new Spiral(1))->getCoordinatesByNumber(2);
    }

    public function testItThrowsExceptionWhenCoordinatesDoNotExistInSpiral()
    {
        $this->expectExceptionMessage('Given coordinates do not exist in spiral');
        $this->expectException(\InvalidArgumentException::class);

        (new Spiral(0))->getNumberByCoordinates(new Coordinates(1, 1));
    }

    public function testGetCoordinatesByNumber()
    {
        $this->assertEquals(new Coordinates(0, -2), (new Spiral(23))->getCoordinatesByNumber(23));
    }

    public function testGetNumberByCoordinates()
    {
        $this->assertEquals(23, (new Spiral(23))->getNumberByCoordinates(new Coordinates(0, -2)));
    }
}
