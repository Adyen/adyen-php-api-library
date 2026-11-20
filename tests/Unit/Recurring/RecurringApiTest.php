<?php

namespace Adyen\Tests\Unit\Recurring;

use Adyen\Exception\AdyenException;
use Adyen\Model\Recurring\Amount;
use Adyen\Model\Recurring\Card;
use Adyen\Model\Recurring\CreatePermitRequest;
use Adyen\Model\Recurring\CreatePermitResult;
use Adyen\Model\Recurring\DisablePermitRequest;
use Adyen\Model\Recurring\DisablePermitResult;
use Adyen\Model\Recurring\DisableRequest;
use Adyen\Model\Recurring\DisableResult;
use Adyen\Model\Recurring\NotifyShopperRequest;
use Adyen\Model\Recurring\NotifyShopperResult;
use Adyen\Model\Recurring\Permit;
use Adyen\Model\Recurring\PermitResult;
use Adyen\Model\Recurring\Recurring;
use Adyen\Model\Recurring\RecurringDetail;
use Adyen\Model\Recurring\RecurringDetailsRequest;
use Adyen\Model\Recurring\RecurringDetailsResult;
use Adyen\Model\Recurring\RecurringDetailWrapper;
use Adyen\Model\Recurring\ScheduleAccountUpdaterRequest;
use Adyen\Model\Recurring\ScheduleAccountUpdaterResult;
use Adyen\Service\Recurring\RecurringApi;
use Adyen\Tests\Unit\BaseTest;
use DateTime;
use GuzzleHttp\Promise\PromiseInterface;

class RecurringApiTest extends BaseTest
{
    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->createPermit(new CreatePermitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/createPermit',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->createPermit(new CreatePermitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/createPermit',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new CreatePermitRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setPermits([(new Permit())
                ->setPartnerId('PARTNER_ID')
                ->setProfileReference('PROFILE_REFERENCE')
                ->setResultKey('permit-1')])
            ->setRecurringDetailReference('8415995487234100')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE');

        $response = $service->createPermit($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->createPermitRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(CreatePermitResult::class, $response);
        self::assertInstanceOf(PermitResult::class, $response->getPermitResultList()[0]);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('permit-1', $response->getPermitResultList()[0]->getResultKey());
        self::assertSame('PERMIT_TOKEN', $response->getPermitResultList()[0]->getToken());
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->createPermitRequestData();

        $response = $service->createPermit(new CreatePermitRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8516167336214570', $response['pspReference']);
        self::assertSame('permit-1', $response['permitResultList'][0]['resultKey']);
        self::assertSame('PERMIT_TOKEN', $response['permitResultList'][0]['token']);
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->createPermit(new CreatePermitRequest($this->createPermitRequestData()))->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8516167336214570', $resultArray['pspReference']);
        self::assertSame('permit-1', $resultArray['permitResultList'][0]['resultKey']);
        self::assertSame('PERMIT_TOKEN', $resultArray['permitResultList'][0]['token']);
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->createPermitWithHttpInfo(
            new CreatePermitRequest($this->createPermitRequestData())
        );

        self::assertInstanceOf(CreatePermitResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->createPermitAsync(new CreatePermitRequest($this->createPermitRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(CreatePermitResult::class, $response);
        self::assertInstanceOf(PermitResult::class, $response->getPermitResultList()[0]);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('permit-1', $response->getPermitResultList()[0]->getResultKey());
        self::assertSame('PERMIT_TOKEN', $response->getPermitResultList()[0]->getToken());
    }

    /**
     * @dataProvider successCreatePermitProvider
     */
    public function testCreatePermitAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->createPermitAsyncWithHttpInfo(
            new CreatePermitRequest($this->createPermitRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(CreatePermitResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    public function testCreatePermitOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->createPermit(new CreatePermitRequest($this->createPermitRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testCreatePermitAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->createPermitAsync(
                new CreatePermitRequest($this->createPermitRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successCreatePermitProvider(): array
    {
        return [
            ['tests/Resources/Recurring/createPermit-success.json', 200],
        ];
    }

    private function createPermitRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'permits' => [
                [
                    'partnerId' => 'PARTNER_ID',
                    'profileReference' => 'PROFILE_REFERENCE',
                    'resultKey' => 'permit-1',
                ],
            ],
            'recurringDetailReference' => '8415995487234100',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
        ];
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->disable(new DisableRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/disable',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->disable(new DisableRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/disable',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new DisableRequest())
            ->setContract('RECURRING')
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setRecurringDetailReference('8415995487234100')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE');

        $response = $service->disable($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->disableRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(DisableResult::class, $response);
        self::assertSame('[detail-successfully-disabled]', $response->getResponse());
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->disableRequestData();

        $response = $service->disable(new DisableRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('[detail-successfully-disabled]', $response['response']);
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->disable(new DisableRequest($this->disableRequestData()))->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('[detail-successfully-disabled]', $resultArray['response']);
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->disableWithHttpInfo(
            new DisableRequest($this->disableRequestData())
        );

        self::assertInstanceOf(DisableResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[detail-successfully-disabled]', $response->getResponse());
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->disableAsync(new DisableRequest($this->disableRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(DisableResult::class, $response);
        self::assertSame('[detail-successfully-disabled]', $response->getResponse());
    }

    /**
     * @dataProvider successDisableProvider
     */
    public function testDisableAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->disableAsyncWithHttpInfo(
            new DisableRequest($this->disableRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(DisableResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('[detail-successfully-disabled]', $response->getResponse());
    }

    public function testDisableOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->disable(new DisableRequest($this->disableRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testDisableAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->disableAsync(
                new DisableRequest($this->disableRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successDisableProvider(): array
    {
        return [
            ['tests/Resources/Recurring/disable-success.json', 200],
        ];
    }

    private function disableRequestData(): array
    {
        return [
            'contract' => 'RECURRING',
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'recurringDetailReference' => '8415995487234100',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
        ];
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->disablePermit(new DisablePermitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/disablePermit',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->disablePermit(new DisablePermitRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/disablePermit',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new DisablePermitRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setToken('PERMIT_TOKEN');

        $response = $service->disablePermit($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->disablePermitRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(DisablePermitResult::class, $response);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('disabled', $response->getStatus());
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->disablePermitRequestData();

        $response = $service->disablePermit(new DisablePermitRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8516167336214570', $response['pspReference']);
        self::assertSame('disabled', $response['status']);
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->disablePermit(new DisablePermitRequest($this->disablePermitRequestData()))->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8516167336214570', $resultArray['pspReference']);
        self::assertSame('disabled', $resultArray['status']);
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->disablePermitWithHttpInfo(
            new DisablePermitRequest($this->disablePermitRequestData())
        );

        self::assertInstanceOf(DisablePermitResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->disablePermitAsync(new DisablePermitRequest($this->disablePermitRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(DisablePermitResult::class, $response);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('disabled', $response->getStatus());
    }

    /**
     * @dataProvider successDisablePermitProvider
     */
    public function testDisablePermitAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->disablePermitAsyncWithHttpInfo(
            new DisablePermitRequest($this->disablePermitRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(DisablePermitResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    public function testDisablePermitOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->disablePermit(new DisablePermitRequest($this->disablePermitRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testDisablePermitAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->disablePermitAsync(
                new DisablePermitRequest($this->disablePermitRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successDisablePermitProvider(): array
    {
        return [
            ['tests/Resources/Recurring/disablePermit-success.json', 200],
        ];
    }

    private function disablePermitRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'token' => 'PERMIT_TOKEN',
        ];
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->listRecurringDetails(new RecurringDetailsRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/listRecurringDetails',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->listRecurringDetails(new RecurringDetailsRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/listRecurringDetails',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new RecurringDetailsRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setRecurring((new Recurring())->setContract(Recurring::CONTRACT_RECURRING))
            ->setShopperReference('YOUR_SHOPPER_REFERENCE');

        $response = $service->listRecurringDetails($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->listRecurringDetailsRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(RecurringDetailsResult::class, $response);
        self::assertInstanceOf(RecurringDetailWrapper::class, $response->getDetails()[0]);
        self::assertInstanceOf(RecurringDetail::class, $response->getDetails()[0]->getRecurringDetail());
        self::assertInstanceOf(Card::class, $response->getDetails()[0]->getRecurringDetail()->getCard());
        self::assertSame('YOUR_SHOPPER_REFERENCE', $response->getShopperReference());
        self::assertSame('shopper@example.com', $response->getLastKnownShopperEmail());
        self::assertEquals(new DateTime('2021-03-16T10:00:00+00:00'), $response->getCreationDate());
        self::assertSame(
            '8415995487234100',
            $response->getDetails()[0]->getRecurringDetail()->getRecurringDetailReference()
        );
        self::assertSame('visa', $response->getDetails()[0]->getRecurringDetail()->getVariant());
        self::assertEquals(
            new DateTime('2021-03-16T10:00:00+00:00'),
            $response->getDetails()[0]->getRecurringDetail()->getCreationDate()
        );
        self::assertSame('RECURRING', $response->getDetails()[0]->getRecurringDetail()->getContractTypes()[0]);
        self::assertSame('03', $response->getDetails()[0]->getRecurringDetail()->getCard()->getExpiryMonth());
        self::assertSame('2030', $response->getDetails()[0]->getRecurringDetail()->getCard()->getExpiryYear());
        self::assertSame('Adyen Test', $response->getDetails()[0]->getRecurringDetail()->getCard()->getHolderName());
        self::assertSame('1111', $response->getDetails()[0]->getRecurringDetail()->getCard()->getNumber());
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->listRecurringDetailsRequestData();

        $response = $service->listRecurringDetails(new RecurringDetailsRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('YOUR_SHOPPER_REFERENCE', $response['shopperReference']);
        self::assertSame('shopper@example.com', $response['lastKnownShopperEmail']);
        self::assertEquals(new DateTime('2021-03-16T10:00:00+00:00'), $response['creationDate']);
        self::assertSame('8415995487234100', $response['details'][0]['recurringDetail']['recurringDetailReference']);
        self::assertSame('visa', $response['details'][0]['recurringDetail']['variant']);
        self::assertEquals(
            new DateTime('2021-03-16T10:00:00+00:00'),
            $response['details'][0]['recurringDetail']['creationDate']
        );
        self::assertSame('RECURRING', $response['details'][0]['recurringDetail']['contractTypes'][0]);
        self::assertSame('03', $response['details'][0]['recurringDetail']['card']['expiryMonth']);
        self::assertSame('2030', $response['details'][0]['recurringDetail']['card']['expiryYear']);
        self::assertSame('Adyen Test', $response['details'][0]['recurringDetail']['card']['holderName']);
        self::assertSame('1111', $response['details'][0]['recurringDetail']['card']['number']);
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->listRecurringDetails(
            new RecurringDetailsRequest($this->listRecurringDetailsRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('YOUR_SHOPPER_REFERENCE', $resultArray['shopperReference']);
        self::assertSame('shopper@example.com', $resultArray['lastKnownShopperEmail']);
        self::assertSame('2021-03-16T10:00:00+00:00', $resultArray['creationDate']);
        self::assertSame('8415995487234100', $resultArray['details'][0]['recurringDetail']['recurringDetailReference']);
        self::assertSame('visa', $resultArray['details'][0]['recurringDetail']['variant']);
        self::assertSame('2021-03-16T10:00:00+00:00', $resultArray['details'][0]['recurringDetail']['creationDate']);
        self::assertSame('RECURRING', $resultArray['details'][0]['recurringDetail']['contractTypes'][0]);
        self::assertSame('03', $resultArray['details'][0]['recurringDetail']['card']['expiryMonth']);
        self::assertSame('2030', $resultArray['details'][0]['recurringDetail']['card']['expiryYear']);
        self::assertSame('Adyen Test', $resultArray['details'][0]['recurringDetail']['card']['holderName']);
        self::assertSame('1111', $resultArray['details'][0]['recurringDetail']['card']['number']);
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->listRecurringDetailsWithHttpInfo(
            new RecurringDetailsRequest($this->listRecurringDetailsRequestData())
        );

        self::assertInstanceOf(RecurringDetailsResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('YOUR_SHOPPER_REFERENCE', $response->getShopperReference());
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->listRecurringDetailsAsync(
            new RecurringDetailsRequest($this->listRecurringDetailsRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(RecurringDetailsResult::class, $response);
        self::assertInstanceOf(RecurringDetailWrapper::class, $response->getDetails()[0]);
        self::assertInstanceOf(RecurringDetail::class, $response->getDetails()[0]->getRecurringDetail());
        self::assertInstanceOf(Card::class, $response->getDetails()[0]->getRecurringDetail()->getCard());
        self::assertSame('YOUR_SHOPPER_REFERENCE', $response->getShopperReference());
        self::assertSame('shopper@example.com', $response->getLastKnownShopperEmail());
        self::assertEquals(new DateTime('2021-03-16T10:00:00+00:00'), $response->getCreationDate());
        self::assertSame(
            '8415995487234100',
            $response->getDetails()[0]->getRecurringDetail()->getRecurringDetailReference()
        );
        self::assertSame('visa', $response->getDetails()[0]->getRecurringDetail()->getVariant());
        self::assertEquals(
            new DateTime('2021-03-16T10:00:00+00:00'),
            $response->getDetails()[0]->getRecurringDetail()->getCreationDate()
        );
        self::assertSame('RECURRING', $response->getDetails()[0]->getRecurringDetail()->getContractTypes()[0]);
        self::assertSame('03', $response->getDetails()[0]->getRecurringDetail()->getCard()->getExpiryMonth());
        self::assertSame('2030', $response->getDetails()[0]->getRecurringDetail()->getCard()->getExpiryYear());
        self::assertSame('Adyen Test', $response->getDetails()[0]->getRecurringDetail()->getCard()->getHolderName());
        self::assertSame('1111', $response->getDetails()[0]->getRecurringDetail()->getCard()->getNumber());
    }

    /**
     * @dataProvider successListRecurringDetailsProvider
     */
    public function testListRecurringDetailsAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->listRecurringDetailsAsyncWithHttpInfo(
            new RecurringDetailsRequest($this->listRecurringDetailsRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(RecurringDetailsResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('YOUR_SHOPPER_REFERENCE', $response->getShopperReference());
    }

    public function testListRecurringDetailsOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->listRecurringDetails(new RecurringDetailsRequest($this->listRecurringDetailsRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testListRecurringDetailsAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->listRecurringDetailsAsync(
                new RecurringDetailsRequest($this->listRecurringDetailsRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successListRecurringDetailsProvider(): array
    {
        return [
            ['tests/Resources/Recurring/listRecurringDetails-success.json', 200],
        ];
    }

    private function listRecurringDetailsRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'recurring' => [
                'contract' => 'RECURRING',
            ],
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
        ];
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->notifyShopper(new NotifyShopperRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/notifyShopper',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->notifyShopper(new NotifyShopperRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/notifyShopper',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new NotifyShopperRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setStoredPaymentMethodId('8415995487234100')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE')
            ->setAmount((new Amount())->setCurrency('INR')->setValue(1000))
            ->setBillingDate('2021-03-16')
            ->setReference('Example reference')
            ->setDisplayedReference('Example displayed reference');

        $response = $service->notifyShopper($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->notifyShopperRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(NotifyShopperResult::class, $response);
        self::assertSame('Example displayed reference', $response->getDisplayedReference());
        self::assertSame('Request processed successfully', $response->getMessage());
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('Example reference', $response->getReference());
        self::assertSame('Success', $response->getResultCode());
        self::assertSame('IA0F7500002462', $response->getShopperNotificationReference());
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->notifyShopperRequestData();

        $response = $service->notifyShopper(new NotifyShopperRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('Example displayed reference', $response['displayedReference']);
        self::assertSame('Request processed successfully', $response['message']);
        self::assertSame('8516167336214570', $response['pspReference']);
        self::assertSame('Example reference', $response['reference']);
        self::assertSame('Success', $response['resultCode']);
        self::assertSame('IA0F7500002462', $response['shopperNotificationReference']);
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->notifyShopper(new NotifyShopperRequest($this->notifyShopperRequestData()))->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('Example displayed reference', $resultArray['displayedReference']);
        self::assertSame('Request processed successfully', $resultArray['message']);
        self::assertSame('8516167336214570', $resultArray['pspReference']);
        self::assertSame('Example reference', $resultArray['reference']);
        self::assertSame('Success', $resultArray['resultCode']);
        self::assertSame('IA0F7500002462', $resultArray['shopperNotificationReference']);
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->notifyShopperWithHttpInfo(
            new NotifyShopperRequest($this->notifyShopperRequestData())
        );

        self::assertInstanceOf(NotifyShopperResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('Example displayed reference', $response->getDisplayedReference());
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->notifyShopperAsync(new NotifyShopperRequest($this->notifyShopperRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(NotifyShopperResult::class, $response);
        self::assertSame('Example displayed reference', $response->getDisplayedReference());
        self::assertSame('Request processed successfully', $response->getMessage());
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('Example reference', $response->getReference());
        self::assertSame('Success', $response->getResultCode());
        self::assertSame('IA0F7500002462', $response->getShopperNotificationReference());
    }

    /**
     * @dataProvider successNotifyShopperProvider
     */
    public function testNotifyShopperAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->notifyShopperAsyncWithHttpInfo(
            new NotifyShopperRequest($this->notifyShopperRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(NotifyShopperResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('Example displayed reference', $response->getDisplayedReference());
    }

    public function testNotifyShopperOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->notifyShopper(new NotifyShopperRequest($this->notifyShopperRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testNotifyShopperAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->notifyShopperAsync(
                new NotifyShopperRequest($this->notifyShopperRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successNotifyShopperProvider(): array
    {
        return [
            ['tests/Resources/Recurring/notifyShopper-success.json', 200],
        ];
    }

    private function notifyShopperRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'storedPaymentMethodId' => '8415995487234100',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
            'amount' => [
                'currency' => 'INR',
                'value' => 1000,
            ],
            'billingDate' => '2021-03-16',
            'reference' => 'Example reference',
            'displayedReference' => 'Example displayed reference',
        ];
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $service->scheduleAccountUpdater(new ScheduleAccountUpdaterRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Recurring/v68/scheduleAccountUpdater',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createLiveConfiguration(), $client);

        $service->scheduleAccountUpdater(new ScheduleAccountUpdaterRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Recurring/v68/scheduleAccountUpdater',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $request = (new ScheduleAccountUpdaterRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setReference('YOUR_REFERENCE')
            ->setCard((new Card())
                ->setExpiryMonth('03')
                ->setExpiryYear('2030')
                ->setHolderName('Adyen Test')
                ->setNumber('4111111111111111'));

        $response = $service->scheduleAccountUpdater($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->scheduleAccountUpdaterRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ScheduleAccountUpdaterResult::class, $response);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('Success', $response->getResult());
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RecurringApi($this->createConfiguration(), $client);
        $params = $this->scheduleAccountUpdaterRequestData();

        $response = $service->scheduleAccountUpdater(new ScheduleAccountUpdaterRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8516167336214570', $response['pspReference']);
        self::assertSame('Success', $response['result']);
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $resultArray = $service->scheduleAccountUpdater(
            new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8516167336214570', $resultArray['pspReference']);
        self::assertSame('Success', $resultArray['result']);
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->scheduleAccountUpdaterWithHttpInfo(
            new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
        );

        self::assertInstanceOf(ScheduleAccountUpdaterResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->scheduleAccountUpdaterAsync(
            new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ScheduleAccountUpdaterResult::class, $response);
        self::assertSame('8516167336214570', $response->getPspReference());
        self::assertSame('Success', $response->getResult());
    }

    /**
     * @dataProvider successScheduleAccountUpdaterProvider
     */
    public function testScheduleAccountUpdaterAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RecurringApi($this->createConfiguration(), $client);

        $promise = $service->scheduleAccountUpdaterAsyncWithHttpInfo(
            new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ScheduleAccountUpdaterResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('8516167336214570', $response->getPspReference());
    }

    public function testScheduleAccountUpdaterOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->scheduleAccountUpdater(
                new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testScheduleAccountUpdaterAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Recurring/recurring-401-error.json', 401);
        $service = new RecurringApi($this->createConfiguration(), $client);

        try {
            $service->scheduleAccountUpdaterAsync(
                new ScheduleAccountUpdaterRequest($this->scheduleAccountUpdaterRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successScheduleAccountUpdaterProvider(): array
    {
        return [
            ['tests/Resources/Recurring/scheduleAccountUpdater-success.json', 200],
        ];
    }

    private function scheduleAccountUpdaterRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'reference' => 'YOUR_REFERENCE',
            'card' => [
                'expiryMonth' => '03',
                'expiryYear' => '2030',
                'holderName' => 'Adyen Test',
                'number' => '4111111111111111',
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
        self::assertSame('8516167336214570', $exception->getError()->getPspReference());
    }
}
