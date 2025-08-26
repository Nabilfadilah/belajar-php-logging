<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);

        // kirim handler 1, semua akan tampil
        $logger->pushHandler(new StreamHandler("php://stderr"));

        // kirim handler 2, ke aplication lock dan semua akan tampil
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        // bisa kita batasi level nya, misalnya ini mulai dari ERROR
        // jadi yang level warning, notice, info, dan debug tidak akan dikirim 
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));

        // semakin keatas, semakin penting!!!
        $logger->debug("This is debug");
        $logger->info("This is info");
        $logger->notice("This is notice");
        $logger->warning("This is warning");
        $logger->error("This is error");
        $logger->critical("This is critical");
        $logger->alert("This is alert");
        $logger->emergency("This is emergency");

        self::assertNotNull($logger);
    }
}
