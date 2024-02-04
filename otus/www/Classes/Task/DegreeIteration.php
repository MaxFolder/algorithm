<?php

declare(strict_types=1);

namespace Classes\Task;

class DegreeIteration implements TaskInterface
{
    public function run(string $input): string
    {
        $data = $this->getData($input);

        $result = $this->process((float)$data[0], (int)$data[1]);

        return (string)$result;
    }

    private function process(float $number, int $degree): float
    {
        $result = 1.0;

        for ($i = 0; $i < $degree; $i++) {
            $result = $result * $number;
        }

        return $result;
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
