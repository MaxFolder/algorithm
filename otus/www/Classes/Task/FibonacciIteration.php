<?php

declare(strict_types=1);

namespace Classes\Task;

class FibonacciIteration implements TaskInterface
{

    public function run(string $input): string
    {
        $number = (int) $input;

        $result = $this->process($number);

        return (string) $result;
    }

    private function process(int $number): int
    {
        $result = 0;

        $prev1 = 1;
        $prev2 = 1;
        for ($i = 3; $i <= $number; $i++) {
            $result = $prev1 + $prev2;

            $prev2 = $prev1;
            $prev1 = $result;
        }

        return $result;
    }
}
