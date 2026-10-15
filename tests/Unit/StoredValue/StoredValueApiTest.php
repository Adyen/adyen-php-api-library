<?php

namespace Adyen\Tests\Unit\StoredValue;

use Adyen\Configuration;
use Adyen\Model\StoredValue\StoredValueStatusChangeRequest;
use Adyen\Model\StoredValue\StoredValueStatusChangeResponse;
use Adyen\Model\StoredValue\StoredValueVoidRequest;
use Adyen\Model\StoredValue\StoredValueVoidResponse;
use Adyen\RequestOptions;
use Adyen\Service\StoredValue\StoredValueApi;
use Adyen\Tests\Unit\ApiExceptionScenario;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions as GuzzleRequestOptions;

class StoredValueApiTest extends BaseTest
{
    /**
     * @dataProvider emptyModelResponseProvider
     */
    public function testChangeStatusRejectsEmptyModelResponse(int $statusCode, string $body): void
    {
        $this->apiExceptionScenario()
            ->givenResponse($statusCode, [], $body)
            ->whenCalling('changeStatus', new StoredValueStatusChangeRequest())
            ->expectStatus($statusCode)
            ->expectMessageContains('Error JSON decoding server response');
    }

    /**
     * @dataProvider emptyModelResponseProvider
     */
    public function testChangeStatusAsyncRejectsEmptyModelResponse(int $statusCode, string $body): void
    {
        $this->apiExceptionScenario()
            ->givenResponse($statusCode, [], $body)
            ->whenCallingAsync('changeStatusAsync', new StoredValueStatusChangeRequest())
            ->expectStatus($statusCode)
            ->expectMessageContains('Error JSON decoding server response');
    }

    public static function emptyModelResponseProvider(): array
    {
        return [
            'empty 200' => [200, ''],
            'whitespace 200' => [200, " \n"],
            'undocumented empty 204' => [204, ''],
        ];
    }

    /**
     * @dataProvider successChangeStatusProvider
     */
    public function testChangeStatusAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new StoredValueApi($this->createConfiguration(), $client);

        $response = $service->changeStatusAsync(new StoredValueStatusChangeRequest())->wait();

        self::assertInstanceOf(StoredValueStatusChangeResponse::class, $response);
        self::assertSame(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $response->getResultCode());
    }

    /**
     * SDK-created HTTP clients default to 60 seconds for both request and connection timeouts.
     */
    public function testDefaultHttpClientUsesConfiguredDefaults(): void
    {
        $config = $this->createConfiguration();
        [, $client] = $this->createGeneratedService($config);

        self::assertSame(60.0, $client->getConfig(GuzzleRequestOptions::TIMEOUT));
        self::assertSame(60.0, $client->getConfig(GuzzleRequestOptions::CONNECT_TIMEOUT));
    }

    /**
     * Timeout configuration is passed to the HTTP client when the service is constructed.
     */
    public function testDefaultHttpClientUsesConfiguredTimeouts(): void
    {
        $config = $this->createConfiguration();
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
        $config = $this->createConfiguration();
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
        $config = $this->createConfiguration();
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
        $config = $this->createConfiguration();
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
        $config = $this->createConfiguration();
        $config->setAdyenApiKey('configured-api-key');
        $service = new StoredValueApi($config);

        $request = $service->changeStatusRequest(new StoredValueStatusChangeRequest());

        self::assertSame(['configured-api-key'], $request->getHeader('x-api-key'));
    }

    /**
     * Explicit API-key authentication preserves a custom key regardless of header casing.
     */
    public function testCustomApiKeyOverridesConfiguredKeyRegardlessOfCasing(): void
    {
        $config = $this->createConfiguration();
        $config->setAdyenApiKey('configured-api-key');
        $service = new StoredValueApi($config);

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

    /**
     * A non-JSON Content-Type override controls both the final header and body handling.
     */
    public function testContentTypeOverrideControlsRequestBodyRegardlessOfCasing(): void
    {
        $config = $this->createConfiguration();
        $service = new StoredValueApi($config);
        $model = new StoredValueStatusChangeRequest(['merchantAccount' => 'test-merchant']);

        foreach (['Content-Type', 'content-type', 'cOnTeNt-TyPe'] as $headerName) {
            $options = new RequestOptions(['additionalHeaders' => [$headerName => 'text/plain']]);
            $request = $service->changeStatusRequest($model, requestOptions: $options);

            self::assertSame(['text/plain'], $request->getHeader('Content-Type'), $headerName);
            self::assertSame((string) $model, (string) $request->getBody());
        }
    }

    /**
     * The final request contains only the custom idempotency key, regardless of header casing.
     */
    public function testIdempotencyKeyOverrideIsNotDuplicatedRegardlessOfCasing(): void
    {
        $config = $this->createConfiguration();
        $service = new StoredValueApi($config);

        foreach (['Idempotency-Key', 'idempotency-key', 'iDeMpOtEnCy-KeY'] as $headerName) {
            $options = new RequestOptions([
                'idempotencyKey' => 'default-key',
                'additionalHeaders' => [$headerName => 'custom-key', 'X-Custom-Header' => 'custom-value'],
            ]);
            $request = $service->changeStatusRequest(new StoredValueStatusChangeRequest(), requestOptions: $options);

            self::assertSame(['custom-key'], $request->getHeader('Idempotency-Key'), $headerName);
            self::assertSame('custom-value', $request->getHeaderLine('X-Custom-Header'));
        }
    }

    /**
     * Merging SDK defaults with selected headers also respects case-insensitive overrides.
     */
    public function testUserAgentOverrideIsNotDuplicated(): void
    {
        $config = $this->createConfiguration();
        $service = new StoredValueApi($config);
        $options = new RequestOptions(['additionalHeaders' => ['user-agent' => 'custom-agent']]);

        $request = $service->changeStatusRequest(new StoredValueStatusChangeRequest(), requestOptions: $options);

        self::assertSame(['custom-agent'], $request->getHeader('User-Agent'));
    }

    /**
     * @dataProvider successChangeStatusProvider
     */
    public function testChangeStatusSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new StoredValueApi($this->createConfiguration(), $client);
        $response = $service->changeStatus(new StoredValueStatusChangeRequest());
        self::assertSame(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $response->getResultCode());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/changeStatus',
            (string) $container[0]['request']->getUri()
        );
    }

    /**
     * @dataProvider successChangeStatusProvider
     */
    public function testChangeStatusSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new StoredValueApi($this->createConfiguration(), $client);
        $params = [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'status' => StoredValueStatusChangeRequest::STATUS_ACTIVE,
        ];

        $result = $service->changeStatus(new StoredValueStatusChangeRequest($params));

        self::assertSame(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $result['resultCode']);
        self::assertSame(
            $params,
            json_decode((string) $container[0]['request']->getBody(), true, 512, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider successChangeStatusProvider
     */
    public function testChangeStatusSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new StoredValueApi($this->createConfiguration(), $client);

        $resultArray = $service->changeStatus(new StoredValueStatusChangeRequest())->toArray();

        self::assertSame(StoredValueStatusChangeResponse::RESULT_CODE_SUCCESS, $resultArray['resultCode']);
        self::assertSame(['currency' => 'str', 'value' => 0], $resultArray['currentBalance']);
    }

    public static function successChangeStatusProvider(): array
    {
        return [
            ['tests/Resources/StoredValue/change-status.json', 200],
        ];
    }

    /**
     * @dataProvider successVoidTransactionProvider
     */
    public function testVoidTransactionSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new StoredValueApi($this->createConfiguration(), $client);
        $response = $service->voidTransaction(new StoredValueVoidRequest());
        self::assertSame(
            StoredValueVoidResponse::RESULT_CODE_NOT_ENOUGH_BALANCE,
            $response->getResultCode()
        );
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/voidTransaction',
            (string) $container[0]['request']->getUri()
        );
    }

    /**
     * @dataProvider successVoidTransactionProvider
     */
    public function testVoidTransactionSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new StoredValueApi($this->createConfiguration(), $client);
        $params = [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => 'original-psp-reference',
            'reference' => 'void-reference',
        ];

        $result = $service->voidTransaction(new StoredValueVoidRequest($params));

        self::assertSame(StoredValueVoidResponse::RESULT_CODE_NOT_ENOUGH_BALANCE, $result['resultCode']);
        self::assertSame(
            $params,
            json_decode((string) $container[0]['request']->getBody(), true, 512, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider successVoidTransactionProvider
     */
    public function testVoidTransactionSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new StoredValueApi($this->createConfiguration(), $client);

        $resultArray = $service->voidTransaction(new StoredValueVoidRequest())->toArray();

        self::assertSame(StoredValueVoidResponse::RESULT_CODE_NOT_ENOUGH_BALANCE, $resultArray['resultCode']);
        self::assertSame(['currency' => 'str', 'value' => 0], $resultArray['currentBalance']);
    }

    public static function successVoidTransactionProvider(): array
    {
        return [
            ['tests/Resources/StoredValue/void-transaction.json', 200],
        ];
    }

    private function apiExceptionScenario(): ApiExceptionScenario
    {
        return new ApiExceptionScenario(
            $this,
            'POST',
            'https://pal-test.adyen.com/pal/servlet/StoredValue/v46/changeStatus',
            fn (Client $client): StoredValueApi => new StoredValueApi($this->createConfiguration(), $client)
        );
    }

    /**
     * Return the generated service and its HTTP client so tests can inspect options and install mock responses.
     *
     * @return array{StoredValueApi, ClientInterface}
     */
    private function createGeneratedService(
        Configuration $config,
        ?ClientInterface $client = null
    ): array {
        $service = new class ($config, $client) extends StoredValueApi {
            public function getHttpClient(): ClientInterface
            {
                return $this->client;
            }
        };

        return [$service, $service->getHttpClient()];
    }
}
