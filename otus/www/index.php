<?php

require_once 'vendor/autoload.php';

$task = new \Classes\Task\LuckyTicket();

$tester = new Tests\Tester('LuckyTicket', $task);

$tester->RunTests();
