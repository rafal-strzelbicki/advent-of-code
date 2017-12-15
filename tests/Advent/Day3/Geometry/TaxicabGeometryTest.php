<?php
namespace Advent\Day3\Geometry;

use Advent\Day3\CoordinateSystem\Coordinates;
use PHPUnit\Framework\TestCase;

class TaxicabGeometryTest extends TestCase
{
    public function testManhattanDistance()
    {
        $this->assertEquals(
            31,
            (new TaxicabGeometry())->manhattanDistance(
                new Coordinates(0, 0),
                new Coordinates(-15, 16))
        );
    }
}
