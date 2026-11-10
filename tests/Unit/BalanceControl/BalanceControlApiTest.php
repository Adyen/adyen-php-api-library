<?php

namespace Adyen\Tests\Unit\BalanceControl;

use Adyen\Exception\AdyenException;
use Adyen\Model\BalanceControl\Amount;
use Adyen\Model\BalanceControl\BalanceTransferRequest;
use Adyen\Model\BalanceControl\BalanceTransferResponse;
use Adyen\Service\BalanceControl\BalanceControlApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class BalanceControlApiTest extends BaseTest
{
    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        $service->balanceTransfer(new BalanceTransferRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/BalanceControl/v1/balanceTransfer',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new BalanceControlApi($this->createLiveConfiguration(), $client);

        $service->balanceTransfer(new BalanceTransferRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/BalanceControl/v1/balanceTransfer',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        $amount = new Amount();
        $amount->setValue(50000);
        $amount->setCurrency('EUR');

        $request = new BalanceTransferRequest();
        $request->setAmount($amount);
        $request->setDescription('Your description for the transfer');
        $request->setFromMerchant('MerchantAccount_NL');
        $request->setToMerchant('MerchantAccount_DE');
        $request->setReference('Unique reference for the transfer');
        $request->setType(BalanceTransferRequest::TYPE_DEBIT);

        $response = $service->balanceTransfer($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->balanceTransferRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(BalanceTransferResponse::class, $response);
        self::assertInstanceOf(Amount::class, $response->getAmount());
        self::assertSame(50000, $response->getAmount()->getValue());
        self::assertSame('EUR', $response->getAmount()->getCurrency());
        self::assertEquals(new \DateTime('2022-01-24T14:59:11+01:00'), $response->getCreatedAt());
        self::assertSame('Your description for the transfer', $response->getDescription());
        self::assertSame('MerchantAccount_NL', $response->getFromMerchant());
        self::assertSame('MerchantAccount_DE', $response->getToMerchant());
        self::assertSame('Unique reference for the transfer', $response->getReference());
        self::assertSame('8816080397613514', $response->getPspReference());
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $response->getStatus());
        self::assertSame(BalanceTransferResponse::TYPE_DEBIT, $response->getType());
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new BalanceControlApi($this->createConfiguration(), $client);
        $params = $this->balanceTransferRequestData();

        $result = $service->balanceTransfer(new BalanceTransferRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame(50000, $result['amount']['value']);
        self::assertSame('EUR', $result['amount']['currency']);
        self::assertSame('8816080397613514', $result['pspReference']);
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $result['status']);
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        $resultArray = $service->balanceTransfer(new BalanceTransferRequest())->toArray();

        self::assertIsArray($resultArray);
        self::assertSame(50000, $resultArray['amount']['value']);
        self::assertSame('EUR', $resultArray['amount']['currency']);
        self::assertSame('MerchantAccount_NL', $resultArray['fromMerchant']);
        self::assertSame('MerchantAccount_DE', $resultArray['toMerchant']);
        self::assertSame('8816080397613514', $resultArray['pspReference']);
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $resultArray['status']);
        self::assertSame(BalanceTransferResponse::TYPE_DEBIT, $resultArray['type']);
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->balanceTransferWithHttpInfo(
            new BalanceTransferRequest()
        );

        self::assertInstanceOf(BalanceTransferResponse::class, $response);
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $response->getStatus());
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        $promise = $service->balanceTransferAsync(new BalanceTransferRequest());

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(BalanceTransferResponse::class, $response);
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $response->getStatus());
        self::assertSame('8816080397613514', $response->getPspReference());
    }

    /**
     * @dataProvider successBalanceTransferProvider
     */
    public function testBalanceTransferAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        $promise = $service->balanceTransferAsyncWithHttpInfo(new BalanceTransferRequest());

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(BalanceTransferResponse::class, $response);
        self::assertSame(BalanceTransferResponse::STATUS_TRANSFERRED, $response->getStatus());
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    public function testBalanceTransferOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/BalanceControl/balance-transfer-401-error.json',
            401
        );
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        try {
            $service->balanceTransfer(new BalanceTransferRequest());
            self::fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testBalanceTransferAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/BalanceControl/balance-transfer-401-error.json',
            401
        );
        $service = new BalanceControlApi($this->createConfiguration(), $client);

        try {
            $service->balanceTransferAsync(new BalanceTransferRequest())->wait();
            self::fail('Expected an AdyenException for HTTP 401');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successBalanceTransferProvider(): array
    {
        return [
            ['tests/Resources/BalanceControl/balance.json', 200],
        ];
    }

    private function balanceTransferRequestData(): array
    {
        return [
            'amount' => ['value' => 50000, 'currency' => 'EUR'],
            'description' => 'Your description for the transfer',
            'fromMerchant' => 'MerchantAccount_NL',
            'reference' => 'Unique reference for the transfer',
            'toMerchant' => 'MerchantAccount_DE',
            'type' => BalanceTransferRequest::TYPE_DEBIT,
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
        self::assertNull($error->getPspReference());
    }
}
