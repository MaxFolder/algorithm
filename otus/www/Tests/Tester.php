<?php

declare(strict_types=1);

namespace Tests;

use Classes\Task\TaskInterface;

class Tester
{
    private const BASE_PATH = '/var/www/html/Tests/data/';

    public function __construct(private string $folderName, private TaskInterface $task)
    {
    }

    public function RunTests(): void
    {
        $testFilesCount = count(scandir(self::BASE_PATH . $this->folderName));

        if ($testFilesCount === 0) {
            return;
        }

        for ($i = 0; $i < ($testFilesCount / 2) - 1; $i++) {
            $inFile = self::BASE_PATH . $this->folderName . '/test.' . $i . '.in';
            $outFile = self::BASE_PATH . $this->folderName . '/test.' . $i . '.out';

            if (!file_exists($inFile) || !file_exists($outFile)) {
                echo $inFile . 'or' . $outFile . 'does not exist';
                return;
            }

            $result = $this->runTest($inFile, $outFile);

            echo false === $result ? "test " . $i . " failed \r\n" : "test " . $i . " passed\r\n";
        }

    }

    private function runTest(string $inFile, string $outFile): bool
    {
        try {
            $input = file_get_contents($inFile);
            $expected = file_get_contents($outFile);

            $actual = $this->task->run($input);

            return $expected == $actual;

        } catch (\Throwable $exception) {
            return false;
        }
    }

}
