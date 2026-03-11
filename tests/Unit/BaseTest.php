<?php

namespace Adyen\Tests\Unit;

use Adyen\Configuration;
use Adyen\Environment;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Adyen\Tests\TestCase;

class BaseTest extends TestCase
{
    /**
     * @param string $jsonFile
     * @param int $httpStatus
     * @return Client
     */
    protected function createMockSerializerClient(string $jsonFile, int $httpStatus, &$container = []): Client
    {
        $json = file_get_contents($jsonFile);
        $mock = new MockHandler([
            new Response($httpStatus, [], $json)
        ]);
        $history = \GuzzleHttp\Middleware::history($container);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);
        return new Client(['handler' => $handlerStack]);
    }

    /**
     * @return Configuration
     */
    protected function createConfiguration(): Configuration
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::TEST);
        $config->setAdyenApiKey("MockAPIKey");
        return $config;
    }
}
