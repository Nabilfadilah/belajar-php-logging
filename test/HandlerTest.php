<?php

namespace Nabil\MVC;

use Monolog\Handler\ElasticsearchHandler;
use Monolog\Handler\SlackHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class HandlerTest extends TestCase
{
    public function testHandler()
    {
        $logger = new Logger(HandlerTest::class);

        // kirim handler ke console
        $logger->pushHandler(new StreamHandler("php://stderr"));

        // kirim handler ke file
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        // $logger->pushHandler(new SlackHandler())
        // $logger->pushHandler(new ElasticsearchHandler())

        self::assertNotNull($logger);
        self::assertEquals(2, sizeof($logger->getHandlers()));
    }
}
