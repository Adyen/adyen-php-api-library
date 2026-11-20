<?php

namespace Adyen\Tests\Unit\Payout;

use Adyen\Exception\AdyenException;
use Adyen\Model\Payout\Amount;
use Adyen\Model\Payout\Card;
use Adyen\Model\Payout\StoreDetailAndSubmitRequest;
use Adyen\Model\Payout\StoreDetailAndSubmitResponse;
use Adyen\Model\Payout\StoreDetailRequest;
use Adyen\Model\Payout\StoreDetailResponse;
use Adyen\Model\Payout\SubmitRequest;
use Adyen\Model\Payout\SubmitResponse;
use Adyen\Service\Payout\InitializationApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class InitializationApiTest extends BaseTest
{
    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $service->storeDetail(new StoreDetailRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/storeDetail',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createLiveConfiguration(), $client);

        $service->storeDetail(new StoreDetailRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/storeDetail',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $request = (new StoreDetailRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE')
            ->setShopperEmail('shopper@example.com')
            ->setCard((new Card())
                ->setNumber('4111111111111111')
                ->setExpiryMonth('03')
                ->setExpiryYear('2030')
                ->setHolderName('Adyen Test'));

        $response = $service->storeDetail($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->storeDetailRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(StoreDetailResponse::class, $response);
        self::assertSame('Success', $response->getResultCode());
        self::assertSame('991617894326362D', $response->getPspReference());
        self::assertSame('9916178936754752', $response->getRecurringDetailReference());
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $params = $this->storeDetailRequestData();

        $response = $service->storeDetail(new StoreDetailRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('Success', $response['resultCode']);
        self::assertSame('991617894326362D', $response['pspReference']);
        self::assertSame('9916178936754752', $response['recurringDetailReference']);
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $resultArray = $service->storeDetail(
            new StoreDetailRequest($this->storeDetailRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('Success', $resultArray['resultCode']);
        self::assertSame('991617894326362D', $resultArray['pspReference']);
        self::assertSame('9916178936754752', $resultArray['recurringDetailReference']);
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->storeDetailWithHttpInfo(
            new StoreDetailRequest($this->storeDetailRequestData())
        );

        self::assertInstanceOf(StoreDetailResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('Success', $response->getResultCode());
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->storeDetailAsync(
            new StoreDetailRequest($this->storeDetailRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(StoreDetailResponse::class, $response);
        self::assertSame('Success', $response->getResultCode());
    }

    /**
     * @dataProvider successStoreDetailProvider
     */
    public function testStoreDetailAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->storeDetailAsyncWithHttpInfo(
            new StoreDetailRequest($this->storeDetailRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(StoreDetailResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('Success', $response->getResultCode());
    }

    public function testStoreDetailOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->storeDetail(
                new StoreDetailRequest($this->storeDetailRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testStoreDetailAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->storeDetailAsync(
                new StoreDetailRequest($this->storeDetailRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successStoreDetailProvider(): array
    {
        return [
            ['tests/Resources/Payouts/store-detail.json', 200],
        ];
    }

    private function storeDetailRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
            'shopperEmail' => 'shopper@example.com',
            'card' => [
                'number' => '4111111111111111',
                'expiryMonth' => '03',
                'expiryYear' => '2030',
                'holderName' => 'Adyen Test',
            ],
        ];
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $service->storeDetailAndSubmitThirdParty(new StoreDetailAndSubmitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/storeDetailAndSubmitThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createLiveConfiguration(), $client);

        $service->storeDetailAndSubmitThirdParty(new StoreDetailAndSubmitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/storeDetailAndSubmitThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $request = (new StoreDetailAndSubmitRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE')
            ->setShopperEmail('shopper@example.com')
            ->setReference('YOUR_REFERENCE')
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1000))
            ->setCard((new Card())
                ->setNumber('4111111111111111')
                ->setExpiryMonth('03')
                ->setExpiryYear('2030')
                ->setHolderName('Adyen Test'));

        $response = $service->storeDetailAndSubmitThirdParty($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->storeDetailAndSubmitThirdPartyRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(StoreDetailAndSubmitResponse::class, $response);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
        self::assertSame('8816080397613514', $response->getPspReference());
        self::assertSame('9916178936754752', $response->getAdditionalData()['recurringDetailReference']);
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $params = $this->storeDetailAndSubmitThirdPartyRequestData();

        $response = $service->storeDetailAndSubmitThirdParty(new StoreDetailAndSubmitRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('[payout-submit-received]', $response['resultCode']);
        self::assertSame('8816080397613514', $response['pspReference']);
        self::assertSame('9916178936754752', $response['additionalData']['recurringDetailReference']);
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $resultArray = $service->storeDetailAndSubmitThirdParty(
            new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('[payout-submit-received]', $resultArray['resultCode']);
        self::assertSame('8816080397613514', $resultArray['pspReference']);
        self::assertSame('9916178936754752', $resultArray['additionalData']['recurringDetailReference']);
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartySuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->storeDetailAndSubmitThirdPartyWithHttpInfo(
            new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
        );

        self::assertInstanceOf(StoreDetailAndSubmitResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartyAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->storeDetailAndSubmitThirdPartyAsync(
            new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(StoreDetailAndSubmitResponse::class, $response);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    /**
     * @dataProvider successStoreDetailAndSubmitThirdPartyProvider
     */
    public function testStoreDetailAndSubmitThirdPartyAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->storeDetailAndSubmitThirdPartyAsyncWithHttpInfo(
            new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(StoreDetailAndSubmitResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    public function testStoreDetailAndSubmitThirdPartyOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->storeDetailAndSubmitThirdParty(
                new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testStoreDetailAndSubmitThirdPartyAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->storeDetailAndSubmitThirdPartyAsync(
                new StoreDetailAndSubmitRequest($this->storeDetailAndSubmitThirdPartyRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successStoreDetailAndSubmitThirdPartyProvider(): array
    {
        return [
            ['tests/Resources/Payouts/store-detail-and-submit-third-party.json', 200],
        ];
    }

    private function storeDetailAndSubmitThirdPartyRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
            'shopperEmail' => 'shopper@example.com',
            'reference' => 'YOUR_REFERENCE',
            'amount' => [
                'currency' => 'EUR',
                'value' => 1000,
            ],
            'card' => [
                'number' => '4111111111111111',
                'expiryMonth' => '03',
                'expiryYear' => '2030',
                'holderName' => 'Adyen Test',
            ],
        ];
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $service->submitThirdParty(new SubmitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/submitThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createLiveConfiguration(), $client);

        $service->submitThirdParty(new SubmitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/submitThirdParty',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $request = (new SubmitRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE')
            ->setSelectedRecurringDetailReference('9916178936754752')
            ->setReference('YOUR_REFERENCE')
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1000));

        $response = $service->submitThirdParty($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->submitThirdPartyRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(SubmitResponse::class, $response);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
        self::assertSame('8816080397613515', $response->getPspReference());
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InitializationApi($this->createConfiguration(), $client);
        $params = $this->submitThirdPartyRequestData();

        $response = $service->submitThirdParty(new SubmitRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('[payout-submit-received]', $response['resultCode']);
        self::assertSame('8816080397613515', $response['pspReference']);
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $resultArray = $service->submitThirdParty(
            new SubmitRequest($this->submitThirdPartyRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('[payout-submit-received]', $resultArray['resultCode']);
        self::assertSame('8816080397613515', $resultArray['pspReference']);
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartySuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->submitThirdPartyWithHttpInfo(
            new SubmitRequest($this->submitThirdPartyRequestData())
        );

        self::assertInstanceOf(SubmitResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartyAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->submitThirdPartyAsync(
            new SubmitRequest($this->submitThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(SubmitResponse::class, $response);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    /**
     * @dataProvider successSubmitThirdPartyProvider
     */
    public function testSubmitThirdPartyAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InitializationApi($this->createConfiguration(), $client);

        $promise = $service->submitThirdPartyAsyncWithHttpInfo(
            new SubmitRequest($this->submitThirdPartyRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(SubmitResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[payout-submit-received]', $response->getResultCode());
    }

    public function testSubmitThirdPartyOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->submitThirdParty(
                new SubmitRequest($this->submitThirdPartyRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testSubmitThirdPartyAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InitializationApi($this->createConfiguration(), $client);

        try {
            $service->submitThirdPartyAsync(
                new SubmitRequest($this->submitThirdPartyRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successSubmitThirdPartyProvider(): array
    {
        return [
            ['tests/Resources/Payouts/submit-third-party.json', 200],
        ];
    }

    private function submitThirdPartyRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
            'selectedRecurringDetailReference' => '9916178936754752',
            'reference' => 'YOUR_REFERENCE',
            'amount' => [
                'currency' => 'EUR',
                'value' => 1000,
            ],
        ];
    }

    private function assertUnauthorizedException(AdyenException $exception): void
    {
        self::assertSame(401, $exception->getStatusCode());
        self::assertSame('Unauthorized client error', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame('000', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
        self::assertSame('8816080397613514', $exception->getError()->getPspReference());
    }
}
