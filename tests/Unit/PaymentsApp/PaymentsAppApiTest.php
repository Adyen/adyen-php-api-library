<?php

namespace Adyen\Tests\Unit\PaymentsApp;

use Adyen\Exception\AdyenException;
use Adyen\Model\PaymentsApp\BoardingTokenRequest;
use Adyen\Model\PaymentsApp\BoardingTokenResponse;
use Adyen\Model\PaymentsApp\PaymentsAppDto;
use Adyen\Model\PaymentsApp\PaymentsAppResponse;
use Adyen\Service\PaymentsApp\PaymentsAppApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class PaymentsAppApiTest extends BaseTest
{
    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSendsExpectedUrlOnTest(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->generatePaymentsAppBoardingTokenForMerchant(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-test.adyen.com/v1'
            . '/merchants/MerchantAccount123/generatePaymentsAppBoardingToken',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSendsExpectedUrlOnLive(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createLiveConfiguration(), $client);

        $service->generatePaymentsAppBoardingTokenForMerchant(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-live.adyen.com/v1'
            . '/merchants/MerchantAccount123/generatePaymentsAppBoardingToken',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $request = (new BoardingTokenRequest())->setBoardingRequestToken('mockedRequestToken');

        $response = $service->generatePaymentsAppBoardingTokenForMerchant(
            'MerchantAccount123',
            $request
        );

        self::assertJsonStringEqualsJsonString(
            json_encode($this->boardingTokenRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSuccessWithArray(
        string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);
        $params = $this->boardingTokenRequestData();

        $response = $service->generatePaymentsAppBoardingTokenForMerchant(
            'MerchantAccount123',
            new BoardingTokenRequest($params)
        );

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response['boardingToken']);
        self::assertSame('mockedInstallationId', $response['installationId']);
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSuccessArrayResponse(
        string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $resultArray = $service->generatePaymentsAppBoardingTokenForMerchant(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $resultArray['boardingToken']);
        self::assertSame('mockedInstallationId', $resultArray['installationId']);
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSuccessWithHttpInfo(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->generatePaymentsAppBoardingTokenForMerchantWithHttpInfo(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantAsyncSuccessReturnsModel(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->generatePaymentsAppBoardingTokenForMerchantAsync(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantAsyncSuccessWithHttpInfo(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->generatePaymentsAppBoardingTokenForMerchantAsyncWithHttpInfo(
            'MerchantAccount123',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    public function testGeneratePaymentsAppBoardingTokenForMerchantOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->generatePaymentsAppBoardingTokenForMerchant(
                'MerchantAccount123',
                new BoardingTokenRequest($this->boardingTokenRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testGeneratePaymentsAppBoardingTokenForMerchantAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->generatePaymentsAppBoardingTokenForMerchantAsync(
                'MerchantAccount123',
                new BoardingTokenRequest($this->boardingTokenRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSendsExpectedUrlOnTest(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->generatePaymentsAppBoardingTokenForStore(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-test.adyen.com/v1'
            . '/merchants/MerchantAccount123/stores/StoreEU/generatePaymentsAppBoardingToken',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSendsExpectedUrlOnLive(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createLiveConfiguration(), $client);

        $service->generatePaymentsAppBoardingTokenForStore(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-live.adyen.com/v1'
            . '/merchants/MerchantAccount123/stores/StoreEU/generatePaymentsAppBoardingToken',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $request = (new BoardingTokenRequest())->setBoardingRequestToken('mockedRequestToken');

        $response = $service->generatePaymentsAppBoardingTokenForStore(
            'MerchantAccount123',
            'StoreEU',
            $request
        );

        self::assertJsonStringEqualsJsonString(
            json_encode($this->boardingTokenRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSuccessWithArray(
        string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);
        $params = $this->boardingTokenRequestData();

        $response = $service->generatePaymentsAppBoardingTokenForStore(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($params)
        );

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response['boardingToken']);
        self::assertSame('mockedInstallationId', $response['installationId']);
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSuccessArrayResponse(
        string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $resultArray = $service->generatePaymentsAppBoardingTokenForStore(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $resultArray['boardingToken']);
        self::assertSame('mockedInstallationId', $resultArray['installationId']);
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSuccessWithHttpInfo(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->generatePaymentsAppBoardingTokenForStoreWithHttpInfo(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreAsyncSuccessReturnsModel(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->generatePaymentsAppBoardingTokenForStoreAsync(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    /**
     * @dataProvider successBoardingTokenProvider
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreAsyncSuccessWithHttpInfo(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->generatePaymentsAppBoardingTokenForStoreAsyncWithHttpInfo(
            'MerchantAccount123',
            'StoreEU',
            new BoardingTokenRequest($this->boardingTokenRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(BoardingTokenResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame($this->boardingTokenResponseData()['boardingToken'], $response->getBoardingToken());
        self::assertSame('mockedInstallationId', $response->getInstallationId());
    }

    public function testGeneratePaymentsAppBoardingTokenForStoreOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->generatePaymentsAppBoardingTokenForStore(
                'MerchantAccount123',
                'StoreEU',
                new BoardingTokenRequest($this->boardingTokenRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testGeneratePaymentsAppBoardingTokenForStoreAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->generatePaymentsAppBoardingTokenForStoreAsync(
                'MerchantAccount123',
                'StoreEU',
                new BoardingTokenRequest($this->boardingTokenRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSendsExpectedUrlOnTest(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->listPaymentsAppForMerchant(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://management-test.adyen.com/v1/merchants/MerchantAccount123/paymentsApps'
            . '?statuses=BOARDED%2CBOARDING&limit=20&offset=5',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSendsExpectedUrlOnLive(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createLiveConfiguration(), $client);

        $service->listPaymentsAppForMerchant(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://management-live.adyen.com/v1/merchants/MerchantAccount123/paymentsApps'
            . '?statuses=BOARDED%2CBOARDING&limit=20&offset=5',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $response = $service->listPaymentsAppForMerchant(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertCount(2, $response->getPaymentsApps());
        self::assertInstanceOf(PaymentsAppDto::class, $response->getPaymentsApps()[0]);
        self::assertInstanceOf(PaymentsAppDto::class, $response->getPaymentsApps()[1]);
        self::assertSame('app1', $response->getPaymentsApps()[0]->getInstallationId());
        self::assertSame('merchantAccountCode', $response->getPaymentsApps()[0]->getMerchantAccountCode());
        self::assertSame('BOARDED', $response->getPaymentsApps()[0]->getStatus());
        self::assertSame('app2', $response->getPaymentsApps()[1]->getInstallationId());
        self::assertSame('merchantAccountCode', $response->getPaymentsApps()[1]->getMerchantAccountCode());
        self::assertSame('BOARDING', $response->getPaymentsApps()[1]->getStatus());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $resultArray = $service->listPaymentsAppForMerchant(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertArrayHasKey('paymentsApps', $resultArray);
        self::assertCount(2, $resultArray['paymentsApps']);
        self::assertSame('app1', $resultArray['paymentsApps'][0]['installationId']);
        self::assertSame('merchantAccountCode', $resultArray['paymentsApps'][0]['merchantAccountCode']);
        self::assertSame('BOARDED', $resultArray['paymentsApps'][0]['status']);
        self::assertSame('app2', $resultArray['paymentsApps'][1]['installationId']);
        self::assertSame('merchantAccountCode', $resultArray['paymentsApps'][1]['merchantAccountCode']);
        self::assertSame('BOARDING', $resultArray['paymentsApps'][1]['status']);
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->listPaymentsAppForMerchantWithHttpInfo(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertCount(2, $response->getPaymentsApps());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantAsyncSuccessReturnsModel(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->listPaymentsAppForMerchantAsync(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertCount(2, $response->getPaymentsApps());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantAsyncSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->listPaymentsAppForMerchantAsyncWithHttpInfo(
            'MerchantAccount123',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertCount(2, $response->getPaymentsApps());
    }

    public function testListPaymentsAppForMerchantOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/paymentsAppList-error-500.json',
            500
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->listPaymentsAppForMerchant(
                'MerchantAccount123',
                'BOARDED,BOARDING',
                20,
                5
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInternalServerErrorException($exception);
        }
    }

    public function testListPaymentsAppForMerchantAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/paymentsAppList-error-500.json',
            500
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->listPaymentsAppForMerchantAsync(
                'MerchantAccount123',
                'BOARDED,BOARDING',
                20,
                5
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInternalServerErrorException($exception);
        }
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForMerchantSendsDefaultPagination(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->listPaymentsAppForMerchant('MerchantAccount123');

        self::assertSame('limit=10&offset=0', $container[0]['request']->getUri()->getQuery());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSendsExpectedUrlOnTest(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->listPaymentsAppForStore(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://management-test.adyen.com/v1/merchants/MerchantAccount123/stores/StoreEU/paymentsApps'
            . '?statuses=BOARDED%2CBOARDING&limit=20&offset=5',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSendsExpectedUrlOnLive(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createLiveConfiguration(), $client);

        $service->listPaymentsAppForStore(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        $request = $container[0]['request'];
        self::assertSame('GET', $request->getMethod());
        self::assertSame(
            'https://management-live.adyen.com/v1/merchants/MerchantAccount123/stores/StoreEU/paymentsApps'
            . '?statuses=BOARDED%2CBOARDING&limit=20&offset=5',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $response = $service->listPaymentsAppForStore(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertCount(2, $response->getPaymentsApps());
        self::assertInstanceOf(PaymentsAppDto::class, $response->getPaymentsApps()[0]);
        self::assertInstanceOf(PaymentsAppDto::class, $response->getPaymentsApps()[1]);
        self::assertSame('app1', $response->getPaymentsApps()[0]->getInstallationId());
        self::assertSame('merchantAccountCode', $response->getPaymentsApps()[0]->getMerchantAccountCode());
        self::assertSame('BOARDED', $response->getPaymentsApps()[0]->getStatus());
        self::assertSame('app2', $response->getPaymentsApps()[1]->getInstallationId());
        self::assertSame('merchantAccountCode', $response->getPaymentsApps()[1]->getMerchantAccountCode());
        self::assertSame('BOARDING', $response->getPaymentsApps()[1]->getStatus());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $resultArray = $service->listPaymentsAppForStore(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertArrayHasKey('paymentsApps', $resultArray);
        self::assertCount(2, $resultArray['paymentsApps']);
        self::assertSame('app1', $resultArray['paymentsApps'][0]['installationId']);
        self::assertSame('merchantAccountCode', $resultArray['paymentsApps'][0]['merchantAccountCode']);
        self::assertSame('BOARDED', $resultArray['paymentsApps'][0]['status']);
        self::assertSame('app2', $resultArray['paymentsApps'][1]['installationId']);
        self::assertSame('merchantAccountCode', $resultArray['paymentsApps'][1]['merchantAccountCode']);
        self::assertSame('BOARDING', $resultArray['paymentsApps'][1]['status']);
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->listPaymentsAppForStoreWithHttpInfo(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertCount(2, $response->getPaymentsApps());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreAsyncSuccessReturnsModel(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->listPaymentsAppForStoreAsync(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertCount(2, $response->getPaymentsApps());
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreAsyncSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->listPaymentsAppForStoreAsyncWithHttpInfo(
            'MerchantAccount123',
            'StoreEU',
            'BOARDED,BOARDING',
            20,
            5
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PaymentsAppResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertCount(2, $response->getPaymentsApps());
    }

    public function testListPaymentsAppForStoreOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/paymentsAppList-error-500.json',
            500
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->listPaymentsAppForStore(
                'MerchantAccount123',
                'StoreEU',
                'BOARDED,BOARDING',
                20,
                5
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInternalServerErrorException($exception);
        }
    }

    public function testListPaymentsAppForStoreAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/paymentsAppList-error-500.json',
            500
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->listPaymentsAppForStoreAsync(
                'MerchantAccount123',
                'StoreEU',
                'BOARDED,BOARDING',
                20,
                5
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInternalServerErrorException($exception);
        }
    }

    /**
     * @dataProvider successPaymentsAppListProvider
     */
    public function testListPaymentsAppForStoreSendsDefaultPagination(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->listPaymentsAppForStore('MerchantAccount123', 'StoreEU');

        self::assertSame('limit=10&offset=0', $container[0]['request']->getUri()->getQuery());
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppSendsExpectedUrlOnTest(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $service->revokePaymentsApp(
            'MerchantAccount123',
            'StoreEU'
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-test.adyen.com/v1/merchants/MerchantAccount123/paymentsApps/StoreEU/revoke',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppSendsExpectedUrlOnLive(
        ?string $jsonFile,
        int $httpStatus
    ): void {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsAppApi($this->createLiveConfiguration(), $client);

        $service->revokePaymentsApp(
            'MerchantAccount123',
            'StoreEU'
        );

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://management-live.adyen.com/v1/merchants/MerchantAccount123/paymentsApps/StoreEU/revoke',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppSuccess(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        self::assertNull($service->revokePaymentsApp('MerchantAccount123', 'StoreEU'));
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->revokePaymentsAppWithHttpInfo(
            'MerchantAccount123',
            'StoreEU'
        );

        self::assertNull($response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppAsyncSuccessReturnsNull(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->revokePaymentsAppAsync(
            'MerchantAccount123',
            'StoreEU'
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertNull($response);
    }

    /**
     * @dataProvider successRevokePaymentsAppProvider
     */
    public function testRevokePaymentsAppAsyncSuccessWithHttpInfo(?string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        $promise = $service->revokePaymentsAppAsyncWithHttpInfo(
            'MerchantAccount123',
            'StoreEU'
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertNull($response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    public function testRevokePaymentsAppOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->revokePaymentsApp(
                'MerchantAccount123',
                'StoreEU'
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public function testRevokePaymentsAppAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/PaymentsApp/boardingToken-error-403.json',
            403
        );
        $service = new PaymentsAppApi($this->createConfiguration(), $client);

        try {
            $service->revokePaymentsAppAsync(
                'MerchantAccount123',
                'StoreEU'
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertForbiddenException($exception);
        }
    }

    public static function successBoardingTokenProvider(): array
    {
        return [
            ['tests/Resources/PaymentsApp/authorise-success.json', 200],
        ];
    }

    public static function successPaymentsAppListProvider(): array
    {
        return [
            ['tests/Resources/PaymentsApp/paymentsAppList-success.json', 200],
        ];
    }

    public static function successRevokePaymentsAppProvider(): array
    {
        return [
            [null, 204],
        ];
    }

    private function boardingTokenRequestData(): array
    {
        return [
            'boardingRequestToken' => 'mockedRequestToken',
        ];
    }

    private function boardingTokenResponseData(): array
    {
        return json_decode(
            file_get_contents('tests/Resources/PaymentsApp/authorise-success.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    private function assertForbiddenException(AdyenException $exception): void
    {
        self::assertSame(403, $exception->getStatusCode());
        self::assertSame('Merchant not permitted for this action.', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame('PA001', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
    }

    private function assertInternalServerErrorException(AdyenException $exception): void
    {
        self::assertSame(500, $exception->getStatusCode());
        self::assertSame('An internal server error occurred.', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame('PA002', $exception->getError()->getErrorCode());
        self::assertSame('api', $exception->getError()->getErrorType());
    }
}
