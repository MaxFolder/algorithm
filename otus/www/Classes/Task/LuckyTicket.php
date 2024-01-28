<?php

declare(strict_types=1);

namespace Classes\Task;

class LuckyTicket implements TaskInterface
{
    private int $count = 0;

    public function run(string $input): string
    {
       $this->count = 0;

       $numberTicketDigits  = (int) $input;

       $this->next($numberTicketDigits, 0, 0);

       var_dump($this->count);

       return (string) $this->count;
    }

    private function next(int $n, int $sumA, int $sumB): void
    {
        if ($n === 1) {

            $abs = abs($sumA - $sumB);

            if ($abs <= 9) {
                $this->count += 10 - $abs;
            }

            return;
        }

        for ($a = 0; $a <= 9 ; $a++) {
            for ($b = 0; $b <= 9 ; $b++) {
                $this->next($n - 1, $sumA + $a, $sumB + $b);
            }
        }
    }
}
