<?php

namespace Nabil\MVC;

use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testLogger()
    {
        $logger = new Logger("NabilFadilahWow");

        self::assertNotNull($logger);
    }

    public function testLoggerWithName()
    {
        // harus saya dengan nama class nya, misal LoggerTest
        $logger = new Logger(LoggerTest::class);

        self::assertNotNull($logger);
    }
}
