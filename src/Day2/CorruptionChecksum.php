<?php
declare(strict_types=1);
namespace Advent\Day2;

class CorruptionChecksum
{
    private $input;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function getSum(): int
    {
        $sum = 0;

        foreach ($this->input as $row) {
            $sum += max($row) - min($row);
        }

        return $sum;
    }

    public function getEvenlyDivisibleValuesSUm(): int
    {
        $sum = 0;

        foreach ($this->input as $row) {
            foreach ($row as $digit) {
                foreach ($row as $divisor) {
                    if (\is_int($digit / $divisor) && $digit % $divisor === 0 && $digit / $divisor !== 1) {
                        $sum += $digit / $divisor;
                    }
                }
            }
        }

        return $sum;
    }
}
