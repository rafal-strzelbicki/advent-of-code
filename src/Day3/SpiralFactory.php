<?php
declare(strict_types=1);
namespace Advent\Day3;

use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;
use Advent\Day3\Spiral\IncrementalSpiral;
use Advent\Day3\Spiral\NeighbourhoodBasedSpiral;

class SpiralFactory
{
    private $coordinateSystem;

    public function __construct(SpiralCoordinateSystem $coordinateSystem)
    {
        $this->coordinateSystem = $coordinateSystem;
    }

    public function buildIncrementalSpiral(int $numberOfElements): Spiral
    {
        return $this->buildSpiral(new IncrementalSpiral($this->coordinateSystem), $numberOfElements);
    }

    public function buildNeighbourhoodBasedSpiral(int $numberOfElements): Spiral
    {
        return $this->buildSpiral(new NeighbourhoodBasedSpiral($this->coordinateSystem), $numberOfElements);
    }

    private function buildSpiral(Spiral $spiral, int $numberOfElements): Spiral
    {
        while (--$numberOfElements) {
            $spiral->addElement();
        }

        return $spiral;
    }
}
