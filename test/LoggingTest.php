<?php

namespace Nabil\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        // akan di kirim/masuk ke handler di console dan applikasi lock
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        // cara logging, cukup gunakan method info, lalu masukan informasi lagi loggernya
        $logger->info("Belajar Pemrograman PHP Logging");
        $logger->info("Selamat Datang di Programmer Zaman Now");
        $logger->info("Ini Informasi Aplikasi Logging");

        self::assertNotNull($logger);
    }
}
