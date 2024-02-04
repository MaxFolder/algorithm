<?php

require_once 'vendor/autoload.php';

$task = new \Classes\Task\PrimeNumbersBruteForce();

$tester = new Tests\Tester('Primes', $task);

$tester->RunTests();

