<?php

declare(strict_types=1);

namespace Classes\Task;

class DegreeBinary implements TaskInterface
{

    public function run(string $input): string
    {
        $data = $this->getData($input);

        $result = $this->process((float)$data[0], (int)$data[1]);

        return (string) $result;
    }

    private function process(float $number, int $degree): float
    {
        if ($degree === 0) {
            return 1;
        }

        if ($degree === 1) {
            return $number;
        }

        if  ($degree % 2 == 0) {
            $func = $this->process($number, $degree / 2);

            return $func * $func;
        }

        return $number * $this->process($number, $degree - 1);
    }

    private function getData(string $input): array
    {
        $data= explode(' ', trim(preg_replace('/\s+/', ' ', $input)));

        if (count($data) !== 2) {
            throw new \Exception('invalid data');
        }

        return $data;
    }
}
