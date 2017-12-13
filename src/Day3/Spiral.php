<?php
declare(strict_types=1);
namespace Advent\Day3;

class Spiral
{
    private $index = [];

    public function __construct(int $limit)
    {
        $this->initialize($limit);
    }

    public function getCoordinatesByNumber(int $number): Coordinates
    {
        if (false === isset($this->index[$number - 1])) {
            throw new \InvalidArgumentException('Given number does not exist in spiral');
        }

        return $this->index[$number - 1];
    }

    public function getNumberByCoordinates(Coordinates $coordinates): int
    {
        if ($key = array_search($coordinates, $this->index)) {
            return $key + 1;
        }

        throw new \InvalidArgumentException('Given coordinates do not exist in spiral');
    }

    protected function initialize($limit): void
    {
        $x = 0;
        $y = 0;

        //ain't nobody got time for refactor
        while ($limit --) {
            if ($x === 0 && $y === 0) {
                $this->index[] = new Coordinates($x++, $y);
            } elseif ($x > abs($y)) {
                $this->index[] = new Coordinates($x, $y++);
            } elseif ($y > abs($x)) {
                $this->index[] = new Coordinates($x--, $y);
            } elseif ($x === $y && $x > 0) {
                $this->index[] = new Coordinates($x--, $y);
            } elseif (-1 * $x === $y && $x < 0) {
                $this->index[] = new Coordinates($x, $y--);
            } elseif ($x === $y && $x < 0) {
                $this->index[] = new Coordinates($x++, $y);
            } elseif ($x === -1 * $y) {
                $this->index[] = new Coordinates($x++, $y);
            } elseif ($x < $y) {
                $this->index[] = new Coordinates($x, $y--);
            } elseif ($y < 0 && $x > $y) {
                $this->index[] = new Coordinates($x++, $y);
            }
        }
    }
}
