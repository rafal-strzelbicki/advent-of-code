<?php
namespace Advent\Day3;

use Advent\Day3\CoordinateSystem\Coordinates;
use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;
use PHPUnit\Framework\TestCase;

class SpiralTest extends TestCase
{
    public function testItStartsFromOne()
    {
        $this->assertEquals(
            1,
            (new Spiral(new SpiralCoordinateSystem()))->getLastElement()
        );
    }

    public function testItsFirstElementCoordinatesIsCoordinateSystemOrigin()
    {
        $this->assertEquals(
            new Coordinates(0, 0),
            (new Spiral(new SpiralCoordinateSystem()))->getCoordinatesOfLastElement()
        );
    }

     public function testItAllowAddingNextElement()
     {
         $spiral = new Spiral(new SpiralCoordinateSystem());
         $spiral->addElement();

         $this->assertEquals(
             2,
             $spiral->getLastElement()
         );
     }

    public function testItReturnsElementCoordinatesIfThisElementExistsInside()
    {
        $this->assertEquals(
            new Coordinates(0, 0),
            (new Spiral(new SpiralCoordinateSystem()))->getCoordinatesOfElement(1)
        );
    }

    public function testItThrowsExceptionWhenElementDoesNotExistInside()
    {
        $this->expectExceptionMessage('Given element does not exist in spiral');
        $this->expectException(\InvalidArgumentException::class);

        (new Spiral(new SpiralCoordinateSystem()))->getCoordinatesOfElement(100);
    }
}
