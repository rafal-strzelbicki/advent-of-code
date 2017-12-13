<?php
declare(strict_types=1);
namespace Advent\UI;

class Console
{
    public static function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    public static function writeLine(string $output): void
    {
        fwrite(STDOUT, $output);
    }
}
