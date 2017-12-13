<?php
declare(strict_types=1);
namespace Advent\Day1;

class Captcha
{
    private $input;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function getSum(): int
    {
        $index = 0;
        $sum = 0;

        while ($index < \count($this->input) - 1) {
            if ($this->input[$index] === $this->input[$index + 1]) {
                $sum += $this->input[$index];
            }

            $index++;
        }

        if (end($this->input) === reset($this->input)) {
            $sum += reset($this->input);
        }

        return $sum;
    }

    public function getSumHalfwayAround(): int
    {
        $index = 0;
        $sum = 0;
        $length = \count($this->input);
        $half = $length / 2;

        while ($index < $length) {
            if (isset($this->input[$index + $half])) {
                if ($this->input[$index] === $this->input[$index + $half]) {
                    $sum += $this->input[$index];
                }
            } elseif ($this->input[$index] === $this->input[$index + $half - $length]) {
                $sum += $this->input[$index];
            }

            $index++;
        }

        return $sum;
    }
}
