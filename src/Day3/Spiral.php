<?php
declare(strict_types=1);
namespace Advent\Day3;

use Advent\Day3\CoordinateSystem\Coordinates;
use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;

class Spiral
{
    private $coordinateSystem;
    private $elements = [];

    public function __construct(SpiralCoordinateSystem $coordinateSystem)
    {
        $this->coordinateSystem = $coordinateSystem;
        $this->elements[] = $this->coordinateSystem->origin();
    }

    public function addElement(): void
    {
        $this->elements[] = $this->coordinateSystem->nextCoordinates(end($this->elements));
    }

    public function getLastElement(): int
    {
        return \count($this->elements);
    }

    public function getCoordinatesOfElement($element): Coordinates
    {
        if (false === isset($this->elements[$element - 1])) {
            throw new \InvalidArgumentException('Given element does not exist in spiral');
        }

        return $this->elements[$element - 1];
    }

    public function getCoordinatesOfLastElement(): Coordinates
    {
        return end($this->elements);
    }
}
