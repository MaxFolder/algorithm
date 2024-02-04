<?php

declare(strict_types=1);

namespace Classes\Task;

class FibonacciRecursion implements TaskInterface
{

    public function run(string $input): string
    {
        $number = (int) $input;

        $result = $this->process($number);

        return (string) $result;
    }

    private function process(int $number): int
    {
        if ($number <=1) {
            return $number;
        }

        return $this->process($number - 1) + $this->process($number - 2);
    }
}
