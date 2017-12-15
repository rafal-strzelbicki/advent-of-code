<?php
declare(strict_types=1);
namespace Advent\Day3;

use Advent\Day3\CoordinateSystem\SpiralCoordinateSystem;

class SpiralFactory
{
    private $coordinateSystem;

    public function __construct(SpiralCoordinateSystem $coordinateSystem)
    {
        $this->coordinateSystem = $coordinateSystem;
    }

    public function buildSpiral($numberOfElements): Spiral
    {
        $spiral = new Spiral($this->coordinateSystem);

        while (--$numberOfElements) {
            $spiral->addElement();
        }

        return $spiral;
    }
}
