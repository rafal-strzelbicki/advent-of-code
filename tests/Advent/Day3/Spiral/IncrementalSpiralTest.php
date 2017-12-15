<?php
namespace Advent\Day3\Spiral;

use Advent\Day3\CoordinateSystem\Coordinates;
use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;
use PHPUnit\Framework\TestCase;

class IncrementalSpiralTest extends TestCase
{
    public function testItStartsFromOne()
    {
        $this->assertEquals(
            1,
            (new IncrementalSpiral(new SpiralCoordinateSystem()))->getLastElement()
        );
    }

    public function testItsFirstElementCoordinatesIsCoordinateSystemOrigin()
    {
        $this->assertEquals(
            new Coordinates(0, 0),
            (new IncrementalSpiral(new SpiralCoordinateSystem()))->getCoordinatesOfLastElement()
        );
    }

     public function testItAllowAddingNextElement()
     {
         $spiral = new IncrementalSpiral(new SpiralCoordinateSystem());
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
            (new IncrementalSpiral(new SpiralCoordinateSystem()))->getCoordinatesOfElement(1)
        );
    }

    public function testItThrowsExceptionWhenElementDoesNotExistInside()
    {
        $this->expectExceptionMessage('Given element does not exist in spiral');
        $this->expectException(\InvalidArgumentException::class);

        (new IncrementalSpiral(new SpiralCoordinateSystem()))->getCoordinatesOfElement(100);
    }
}
