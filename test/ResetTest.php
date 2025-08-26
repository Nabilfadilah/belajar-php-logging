<?php

namespace Nabil\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ResetTest extends TestCase
{
    public function testReset()
    {
        $logger = new Logger(ResetTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        // kalau udah 100 kali, maka akan reset
        for ($i = 0; $i < 10000; $i++) {
            $logger->info("Perulangan ke-$i");
            if ($i % 100 == 0) {
                $logger->reset(); // reset data, method reset
            }
        }

        self::assertNotNull($logger);
    }
}
