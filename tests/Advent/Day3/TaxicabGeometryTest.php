<?php
namespace Advent\Day3;

use PHPUnit\Framework\TestCase;

class TaxicabGeometryTest extends TestCase
{
    public function testManhattanDistance()
    {
        $this->assertEquals(31, TaxicabGeometry::manhattanDistance(new Coordinates(0, 0), new Coordinates(-15, 16)));
    }
}
