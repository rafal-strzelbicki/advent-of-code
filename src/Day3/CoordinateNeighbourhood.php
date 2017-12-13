<?php
declare(strict_types=1);
namespace Advent\Day3;

use Doctrine\Common\Collections\ArrayCollection;

class CoordinateNeighbourhood extends ArrayCollection
{
    public function __construct(array $neighbourhood)
    {
        parent::__construct($neighbourhood);
    }
}
