<?php
declare(strict_types=1);
namespace Advent\Day3\Geometry;

use Advent\Day3\CoordinateSystem\Coordinates;

class TaxicabGeometry
{
    public function manhattanDistance(Coordinates $start, Coordinates $end): int
    {
        return abs($end->x() - $start->x()) + abs($end->y() - $start->y());
    }
}
