<?php
declare(strict_types=1);
namespace Advent\Day3\CoordinateSystem;

class SpiralCoordinateSystem
{
    public function origin(): Coordinates
    {
        return new Coordinates(0, 0);
    }

    public function nextCoordinates(Coordinates $coordinates): Coordinates
    {
        $x = $coordinates->x();
        $y = $coordinates->y();

        if ($x === 0 && $y === 0) {
            return new Coordinates(++$x, $y);
        }

        if ($x > abs($y)) {
            return new Coordinates($x, ++$y);
        }

        if ($y > abs($x)) {
            return new Coordinates(--$x, $y);
        }

        if ($x === $y && $x > 0) {
            return new Coordinates(--$x, $y);
        }

        if (-1 * $x === $y && $x < 0) {
            return new Coordinates($x, --$y);
        }

        if ($x === $y && $x < 0) {
            return new Coordinates(++$x, $y);
        }

        if ($x === -1 * $y) {
            return new Coordinates(++$x, $y);
        }

        if ($x < $y) {
            return new Coordinates($x, --$y);
        }

        if ($y < 0 && $x > $y) {
            return new Coordinates(++$x, $y);
        }
    }

    public function coordinatesNeighbourhood(Coordinates $coordinates): CoordinatesNeighbourhood
    {
        return new CoordinatesNeighbourhood([
            new Coordinates($coordinates->x() + 1, $coordinates->y()),
            new Coordinates($coordinates->x() + 1, $coordinates->y() + 1),
            new Coordinates($coordinates->x(), $coordinates->y() + 1),
            new Coordinates($coordinates->x() - 1, $coordinates->y() + 1),
            new Coordinates($coordinates->x() - 1, $coordinates->y()),
            new Coordinates($coordinates->x() - 1, $coordinates->y() - 1),
            new Coordinates($coordinates->x(), $coordinates->y() - 1),
            new Coordinates($coordinates->x() + 1, $coordinates->y() - 1),
        ]);
    }
}
