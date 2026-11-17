<?php

namespace Adyen\Tests\Unit\PosMobile;

use Adyen\Exception\AdyenException;
use Adyen\Model\PosMobile\CreateSessionRequest;
use Adyen\Model\PosMobile\CreateSessionResponse;
use Adyen\Service\PosMobile\PosMobileApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class PosMobileApiTest extends BaseTest
{
    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        $service->createCommunicationSession(new CreateSessionRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://checkout-test.adyen.com/checkout/possdk/v68/sessions',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PosMobileApi($this->createLiveConfiguration(), $client);

        $service->createCommunicationSession(new CreateSessionRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-checkout-live.adyenpayments.com/checkout/possdk/v68/sessions',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        $request = (new CreateSessionRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setSetupToken('SETUP_TOKEN')
            ->setStore('YOUR_STORE_ID');

        $response = $service->createCommunicationSession($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->createCommunicationSessionRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(CreateSessionResponse::class, $response);
        self::assertSame('APP_SESSION_ID', $response->getId());
        self::assertSame('INSTALLATION_ID', $response->getInstallationId());
        self::assertSame('YOUR_MERCHANT_ACCOUNT', $response->getMerchantAccount());
        self::assertSame('YOUR_STORE_ID', $response->getStore());
        self::assertSame('SDK_DATA_BLOB', $response->getSdkData());
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PosMobileApi($this->createConfiguration(), $client);
        $params = $this->createCommunicationSessionRequestData();

        $response = $service->createCommunicationSession(new CreateSessionRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('APP_SESSION_ID', $response['id']);
        self::assertSame('INSTALLATION_ID', $response['installationId']);
        self::assertSame('YOUR_MERCHANT_ACCOUNT', $response['merchantAccount']);
        self::assertSame('YOUR_STORE_ID', $response['store']);
        self::assertSame('SDK_DATA_BLOB', $response['sdkData']);
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        $resultArray = $service->createCommunicationSession(
            new CreateSessionRequest($this->createCommunicationSessionRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('APP_SESSION_ID', $resultArray['id']);
        self::assertSame('INSTALLATION_ID', $resultArray['installationId']);
        self::assertSame('YOUR_MERCHANT_ACCOUNT', $resultArray['merchantAccount']);
        self::assertSame('YOUR_STORE_ID', $resultArray['store']);
        self::assertSame('SDK_DATA_BLOB', $resultArray['sdkData']);
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->createCommunicationSessionWithHttpInfo(
            new CreateSessionRequest($this->createCommunicationSessionRequestData())
        );

        self::assertInstanceOf(CreateSessionResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('APP_SESSION_ID', $response->getId());
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        $promise = $service->createCommunicationSessionAsync(
            new CreateSessionRequest($this->createCommunicationSessionRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(CreateSessionResponse::class, $response);
        self::assertSame('APP_SESSION_ID', $response->getId());
        self::assertSame('INSTALLATION_ID', $response->getInstallationId());
        self::assertSame('YOUR_MERCHANT_ACCOUNT', $response->getMerchantAccount());
        self::assertSame('YOUR_STORE_ID', $response->getStore());
        self::assertSame('SDK_DATA_BLOB', $response->getSdkData());
    }

    /**
     * @dataProvider successCreateCommunicationSessionProvider
     */
    public function testCreateCommunicationSessionAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PosMobileApi($this->createConfiguration(), $client);

        $promise = $service->createCommunicationSessionAsyncWithHttpInfo(
            new CreateSessionRequest($this->createCommunicationSessionRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(CreateSessionResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('APP_SESSION_ID', $response->getId());
    }

    public function testCreateCommunicationSessionOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PosMobile/create-session-401-error.json',
            401
        );
        $service = new PosMobileApi($this->createConfiguration(), $client);

        try {
            $service->createCommunicationSession(
                new CreateSessionRequest($this->createCommunicationSessionRequestData())
            );
            self::fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testCreateCommunicationSessionAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PosMobile/create-session-401-error.json',
            401
        );
        $service = new PosMobileApi($this->createConfiguration(), $client);

        try {
            $service->createCommunicationSessionAsync(
                new CreateSessionRequest($this->createCommunicationSessionRequestData())
            )->wait();
            self::fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successCreateCommunicationSessionProvider(): array
    {
        return [
            ['tests/Resources/PosMobile/create-session-success.json', 201],
        ];
    }

    private function createCommunicationSessionRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'setupToken' => 'SETUP_TOKEN',
            'store' => 'YOUR_STORE_ID',
        ];
    }

    private function assertUnauthorizedException(AdyenException $exception): void
    {
        self::assertSame(401, $exception->getStatusCode());
        self::assertSame('Unauthorized client error', $exception->getMessage());
        $error = $exception->getError();
        self::assertNotNull($error);
        self::assertSame('000', $error->getErrorCode());
        self::assertSame('security', $error->getErrorType());
    }
}
