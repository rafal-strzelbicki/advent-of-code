<?php
declare(strict_types=1);
namespace Advent\Day3\Spiral;

use Advent\Day3\CoordinateSystem\Coordinates;
use Advent\Day3\CoordinateSystem\CoordinatesNeighbourhood;
use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;
use Advent\Day3\Spiral;

class NeighbourhoodBasedSpiral implements Spiral
{
    private $coordinateSystem;
    private $coordinates = [];
    private $elements = [];

    public function __construct(SpiralCoordinateSystem $coordinateSystem)
    {
        $this->coordinateSystem = $coordinateSystem;
        $this->coordinates[] = $this->coordinateSystem->origin();
        $this->elements[] = 1;
    }

    public function addElement(): void
    {
        $this->coordinates[] = $this->coordinateSystem->nextCoordinates(end($this->coordinates));
        $this->elements[] = $this->calculateNextElementValueFromItsNeighbourhood(
            $this->coordinateSystem->coordinatesNeighbourhood(end($this->coordinates))
        );
    }

    private function findElementByItsCoordinates(Coordinates $coordinates): int
    {
        if (false !== $key = array_search($coordinates, $this->coordinates)) {
            return $this->elements[$key];
        }

        return 0;
    }

    private function calculateNextElementValueFromItsNeighbourhood(CoordinatesNeighbourhood $neighbourhood): int
    {
        $value = 0;

        foreach ($neighbourhood as $coordinates) {
            $value += $this->findElementByItsCoordinates($coordinates);
        }

        return $value;
    }
}
