<?php
declare(strict_types=1);
namespace Advent\Day3\CoordinateSystem;

use Doctrine\Common\Collections\ArrayCollection;

class CoordinatesNeighbourhood extends ArrayCollection
{
    public function __construct(array $neighbourhood)
    {
        parent::__construct($neighbourhood);
    }
}
