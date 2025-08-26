<?php

namespace Nabil\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {

        $logger = new Logger(ContextTest::class);
        // tampilkan ke console lock
        $logger->pushHandler(new StreamHandler("php://stderr"));

        // method info, kirim data context berupa array pada parameter ke-2
        $logger->info("This is log message", ["username" => "khannedy"]);
        $logger->info("Try login user", ["username" => "khannedy"]);
        $logger->info("Success login user", ["username" => "khannedy"]);
        $logger->info("Tidak ada context");

        self::assertNotNull($logger);
    }
}
