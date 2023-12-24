<?php

declare(strict_types=1);

namespace Classes\Task;

interface TaskInterface
{
    public function run(string $input): string;
}
