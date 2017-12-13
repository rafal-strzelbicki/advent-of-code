<?php
declare(strict_types=1);
namespace Advent\Day3;

class Coordinates
{
    private $x;
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function getNeighbourhood(): CoordinateNeighbourhood
    {
        return new CoordinateNeighbourhood([
            new Coordinates($this->x + 1, $this->y),
            new Coordinates($this->x + 1, $this->y + 1),
            new Coordinates($this->x, $this->y + 1),
            new Coordinates($this->x - 1, $this->y + 1),
            new Coordinates($this->x - 1, $this->y),
            new Coordinates($this->x - 1, $this->y - 1),
            new Coordinates($this->x, $this->y - 1),
            new Coordinates($this->x + 1, $this->y - 1),
        ]);
    }
}
