<?php

namespace Adyen\Tests\Unit;

use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Model\StoredValue\StoredValueStatusChangeRequest;
use Adyen\Model\StoredValue\StoredValueStatusChangeResponse;
use Adyen\Model\StoredValue\StoredValueVoidRequest;
use Adyen\Model\StoredValue\StoredValueVoidResponse;
use Adyen\RequestOptions;
use Adyen\Service\StoredValue\StoredValueApi as GeneratedStoredValueApi;
use Adyen\Service\StoredValueApi;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions as GuzzleRequestOptions;

class StoredValueTest extends TestCaseMock
{
    /**
     * SDK-created HTTP clients default to 60 seconds for both request and connection timeouts.
     */
    public function testDefaultHttpClientUsesConfiguredDefaults(): void
    {
        $config = new Configuration(['environment' => Environment::TEST, 'adyenApiKey' => 'configured-api-key']);
        [, $client] = $this->createGeneratedService($config);

        self::assertSame(60.0, $client->getConfig(GuzzleRequestOptions::TIMEOUT));
        self::assertSame(60.0, $client->getConfig(GuzzleRequestOptions::CONNECT_TIMEOUT));
    }

    /**
     * Timeout configuration is passed to the HTTP client when the service is constructed.
     */
    public function testDefaultHttpClientUsesConfiguredTimeouts(): void
    {
        $config = new Configuration(['environment' => Environment::TEST, 'adyenApiKey' => 'configured-api-key']);
        $config->setTimeout(12.5)->setConnectionTimeout(3.5);
        [, $client] = $this->createGeneratedService($config);

        self::assertSame(12.5, $client->getConfig(GuzzleRequestOptions::TIMEOUT));
        self::assertSame(3.5, $client->getConfig(GuzzleRequestOptions::CONNECT_TIMEOUT));
    }

    /**
     * Explicit zero values are passed through rather than replaced with SDK defaults.
     */
    public function testDefaultHttpClientAcceptsZeroTimeouts(): void
    {
        $config = new Configuration(['environment' => Environment::TEST, 'adyenApiKey' => 'configured-api-key']);
        $config->setTimeout(0)->setConnectionTimeout(0);
        [, $client] = $this->createGeneratedService($config);

        self::assertSame(0.0, $client->getConfig(GuzzleRequestOptions::TIMEOUT));
        self::assertSame(0.0, $client->getConfig(GuzzleRequestOptions::CONNECT_TIMEOUT));
    }

    /**
     * An injected HTTP client keeps its own timeouts, even when Configuration specifies different values.
     */
    public function testInjectedHttpClientKeepsItsTimeouts(): void
    {
        $config = new Configuration(['environment' => Environment::TEST, 'adyenApiKey' => 'configured-api-key']);
        $config->setTimeout(12.5)->setConnectionTimeout(3.5);
        $history = [];
        $handler = HandlerStack::create(new MockHandler([
            new Response(200, [], '{}'),
            new Response(200, [], '{}'),
        ]));
        $handler->push(Middleware::history($history));
        $customClient = new Client([
            'handler' => $handler,
            GuzzleRequestOptions::TIMEOUT => 9.0,
            GuzzleRequestOptions::CONNECT_TIMEOUT => 2.0,
        ]);
        [$service, $client] = $this->createGeneratedService($config, $customClient);

        $service->changeStatus(new StoredValueStatusChangeRequest());
        $config->setTimeout(0)->setConnectionTimeout(0);
        $service->changeStatusAsync(new StoredValueStatusChangeRequest())->wait();

        self::assertSame($customClient, $client);
        self::assertSame(9.0, $client->getConfig(GuzzleRequestOptions::TIMEOUT));
        self::assertSame(2.0, $client->getConfig(GuzzleRequestOptions::CONNECT_TIMEOUT));
        self::assertCount(2, $history);
        foreach ($history as $transfer) {
            self::assertSame(9.0, $transfer['options'][GuzzleRequestOptions::TIMEOUT]);
            self::assertSame(2.0, $transfer['options'][GuzzleRequestOptions::CONNECT_TIMEOUT]);
        }
    }

    /**
     * Configuration changes reach subsequent sync and async requests, including explicit zero values.
     */
    public function testTimeoutChangesApplyToExistingServiceRequests(): void
    {
        $config = new Configuration(['environment' => Environment::TEST, 'adyenApiKey' => 'configured-api-key']);
        [$service, $client] = $this->createGeneratedService($config);
        $history = [];
        $handler = $client->getConfig('handler');
        $handler->setHandler(new MockHandler([
            new Response(200, [], '{}'),
            new Response(200, [], '{}'),
            new Response(200, [], '{}'),
        ]));
        $handler->push(Middleware::history($history));

        $service->changeStatus(new StoredValueStatusChangeRequest());
        $config->setTimeout(12.5)->setConnectionTimeout(3.5);
        $service->changeStatus(new StoredValueStatusChangeRequest());

        self::assertSame(12.5, $history[1]['options'][GuzzleRequestOptions::TIMEOUT]);
        self::assertSame(3.5, $history[1]['options'][GuzzleRequestOptions::CONNECT_TIMEOUT]);

        $config->setTimeout(0)->setConnectionTimeout(0);
        $service->changeStatusAsync(new StoredValueStatusChangeRequest())->wait();

        self::assertCount(3, $history);
        self::assertSame(60.0, $history[0]['options'][GuzzleRequestOptions::TIMEOUT]);
        self::assertSame(60.0, $history[0]['options'][GuzzleRequestOptions::CONNECT_TIMEOUT]);
        self::assertSame(0.0, $history[2]['options'][GuzzleRequestOptions::TIMEOUT]);
        self::assertSame(0.0, $history[2]['options'][GuzzleRequestOptions::CONNECT_TIMEOUT]);
    }

    /**
     * Explicit API-key authentication uses the configured key when no custom header is provided.
     */
    public function testConfiguredApiKeyIsUsedWhenNoCustomHeaderExists(): void
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::TEST);
        $config->setAdyenApiKey('configured-api-key');
        $service = new GeneratedStoredValueApi($config);

        $request = $service->changeStatusRequest(new StoredValueStatusChangeRequest());

        self::assertSame(['configured-api-key'], $request->getHeader('x-api-key'));
    }

    /**
     * Explicit API-key authentication preserves a custom key regardless of header casing.
     */
    public function testCustomApiKeyOverridesConfiguredKeyRegardlessOfCasing(): void
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::TEST);
        $config->setAdyenApiKey('configured-api-key');
        $service = new GeneratedStoredValueApi($config);

        foreach (['x-api-key', 'X-API-Key', 'X-Api-Key'] as $headerName) {
            $requestOptions = new RequestOptions([
                'additionalHeaders' => [
                    $headerName => 'custom-api-key',
                    'X-Custom-Header' => 'custom-value',
                ],
            ]);
            $request = $service->changeStatusRequest(
                new StoredValueStatusChangeRequest(),
                requestOptions: $requestOptions
            );

            self::assertSame(['custom-api-key'], $request->getHeader('x-api-key'), $headerName);
            self::assertSame('custom-value', $request->getHeaderLine('X-Custom-Header'));
        }
    }

    public function testChangeStatus()
    {
        $client = $this->createMockClientUrl('tests/Resources/StoredValue/change-status.json');
        $service = new StoredValueApi($client);
        $response = $service->changeStatus(new StoredValueStatusChangeRequest());
        self::assertEquals(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $response->getResultCode());
        self::assertEquals(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/changeStatus',
            $this->requestUrl
        );
    }

    public function testVoidTransaction()
    {
        $client = $this->createMockClientUrl('tests/Resources/StoredValue/void-transaction.json');
        $service = new StoredValueApi($client);
        $response = $service->voidTransaction(new StoredValueVoidRequest());
        self::assertEquals(
            StoredValueVoidResponse::RESULT_CODE_NOT_ENOUGH_BALANCE,
            $response->getResultCode()
        );
        self::assertEquals(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/voidTransaction',
            $this->requestUrl
        );
    }

    /**
     * Return the generated service and its HTTP client so tests can inspect options and install mock responses.
     *
     * @return array{GeneratedStoredValueApi, ClientInterface}
     */
    private function createGeneratedService(
        Configuration $config,
        ?ClientInterface $client = null
    ): array {
        $service = new class ($config, $client) extends GeneratedStoredValueApi {
            public function getHttpClient(): ClientInterface
            {
                return $this->client;
            }
        };

        return [$service, $service->getHttpClient()];
    }
}
