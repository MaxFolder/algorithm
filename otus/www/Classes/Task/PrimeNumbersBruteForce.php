<?php

declare(strict_types=1);

namespace Classes\Task;

class PrimeNumbersBruteForce implements TaskInterface
{

    public function run(string $input): string
    {
        $number = (int) $input;

        $result = $this->process($number);

        return (string) $result;
    }

    private function process(int $number): int
    {
        $cnt = 0;
        for($i = 1; $i <= $number; $i++) {
            if ($this->isPrime($i)) {
                ++$cnt;
            }
        }

        return $cnt;
    }

    private function isPrime(int $number): bool
    {
        $count = 0;
        for ($i = 1; $i <= $number; $i++) {
            if ($number % $i === 0) {
                 ++$count;
            }

            if ($count > 2) {
                return false;
            }
        }

        return $count === 2;
    }
}
