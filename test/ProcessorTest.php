<?php

namespace Nabil\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor()); // inject cabang Git dan SHA komit Git di semua catatan
        $logger->pushProcessor(new MemoryUsageProcessor()); // Menyisipkan memory_get_usage di semua catatan
        $logger->pushProcessor(new HostnameProcessor()); // inject nilai gethostname ke dalam semua catatan

        // param $record
        $logger->pushProcessor(function ($record) {
            $record["extra"]["pzn"] = [
                "app" => "Belajar PHP Logging",
                "author" => "Mohammad Nabil Fadilah"
            ];
            return $record; // lalu balikan record nya
        });

        $logger->info("Hello World", ["username" => "eko"]);
        $logger->info("Hello World");
        $logger->info("Hello World Lagi");

        self::assertNotNull($logger);
    }
}
