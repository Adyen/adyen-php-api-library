<?php

namespace Adyen\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Adyen\Client;
use Adyen\Environment;

class ClientTest extends TestCase
{

    public function testCreate(): void
    {
        $client = new Client();
        $client->setApplicationName("My Test Application");
        $client->setEnvironment(Environment::TEST);
        $client->setXApiKey("MockAPIKey");
        $client->setTimeout(60);
        $client->setConnectionTimeout(30);

        $this->assertEquals(
            "test",
            $client->getConfig()->getEnvironment()
        );
    }

    public function testCreateWithLivePrefix(): void
    {
        $client = new Client();
        $client->setEnvironment(Environment::LIVE);
        $client->setXApiKey("MockAPIKey");

        // check LIVE Terminal API url
        $this->assertEquals(
            "https://terminal-api-live.adyen.com",
            $client->getConfig()->get('endpointTerminalCloud')
        );

    }

    public function testCreateWithInvalidPrefix(): void
    {
        // check an exception is thrown
        $this->expectException(\Adyen\AdyenException::class);

        $client = new Client();
        $client->setEnvironment("Invalid");
        $client->setXApiKey("MockAPIKey");
    }

}
