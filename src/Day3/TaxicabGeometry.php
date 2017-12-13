<?php
declare(strict_types=1);
namespace Advent\Day3;

class TaxicabGeometry
{
    public static function manhattanDistance(Coordinates $start, Coordinates $end): int
    {
        return abs($end->x() - $start->x()) + abs($end->y() - $start->y());
    }
}
