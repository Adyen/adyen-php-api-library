<?php

namespace Adyen\Tests\Unit\ForeignExchange;

use Adyen\Exception\AdyenException;
use Adyen\Model\ForeignExchange\Amount;
use Adyen\Model\ForeignExchange\CalculateRateRequest;
use Adyen\Model\ForeignExchange\CalculateRateRequestItem;
use Adyen\Model\ForeignExchange\CalculateRateResponse;
use Adyen\Model\ForeignExchange\CalculateRateResponseItem;
use Adyen\Model\ForeignExchange\ExchangeSide;
use Adyen\Model\ForeignExchange\RateType;
use Adyen\Service\ForeignExchange\RatesApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class RatesApiTest extends BaseTest
{
    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RatesApi($this->createConfiguration(), $client);

        $service->calculate(new CalculateRateRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-test.adyen.com/fx/api/v1/rates/calculate',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RatesApi($this->createLiveConfiguration(), $client);

        $service->calculate(new CalculateRateRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://balanceplatform-api-live.adyen.com/fx/api/v1/rates/calculate',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RatesApi($this->createConfiguration(), $client);
        $request = (new CalculateRateRequest())->setExchangeCalculations([
            (new CalculateRateRequestItem())
                ->setType(RateType::SPLIT_PAYMENT)
                ->setSourceAmount((new Amount())->setCurrency('CZK')->setValue(112300))
                ->setTargetCurrency('EUR')
                ->setExchangeSide(ExchangeSide::BUY),
            (new CalculateRateRequestItem())
                ->setType(RateType::SPLIT_REFUND)
                ->setSourceAmount((new Amount())->setCurrency('CZK')->setValue(24000))
                ->setTargetCurrency('USD')
                ->setExchangeSide(ExchangeSide::SELL),
        ]);

        $response = $service->calculate($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->calculateRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        $this->assertCalculateResponse($response);
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new RatesApi($this->createConfiguration(), $client);
        $params = $this->calculateRequestData();

        $response = $service->calculate(new CalculateRateRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(CalculateRateResponse::class, $response);
        self::assertCount(2, $response['exchangeCalculations']);
        $first = $response['exchangeCalculations'][0];
        self::assertSame(0.039893143366, $first['appliedExchangeRate']);
        self::assertSame(ExchangeSide::BUY, $first['exchangeSide']);
        self::assertSame('CZK', $first['sourceAmount']['currency']);
        self::assertSame(112300, $first['sourceAmount']['value']);
        self::assertSame('EUR', $first['targetAmount']['currency']);
        self::assertSame(4480, $first['targetAmount']['value']);
        self::assertSame(RateType::SPLIT_PAYMENT, $first['type']);

        $second = $response['exchangeCalculations'][1];
        self::assertSame(0.0413333333333, $second['appliedExchangeRate']);
        self::assertSame(ExchangeSide::SELL, $second['exchangeSide']);
        self::assertSame('CZK', $second['sourceAmount']['currency']);
        self::assertSame(24000, $second['sourceAmount']['value']);
        self::assertSame('USD', $second['targetAmount']['currency']);
        self::assertSame(992, $second['targetAmount']['value']);
        self::assertSame(RateType::SPLIT_REFUND, $second['type']);
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RatesApi($this->createConfiguration(), $client);

        $resultArray = $service->calculate(new CalculateRateRequest($this->calculateRequestData()))->toArray();

        self::assertIsArray($resultArray);
        self::assertCount(2, $resultArray['exchangeCalculations']);
        $first = $resultArray['exchangeCalculations'][0];
        self::assertIsArray($first);
        self::assertIsArray($first['sourceAmount']);
        self::assertIsArray($first['targetAmount']);
        self::assertSame(0.039893143366, $first['appliedExchangeRate']);
        self::assertSame(ExchangeSide::BUY, $first['exchangeSide']);
        self::assertSame('CZK', $first['sourceAmount']['currency']);
        self::assertSame(112300, $first['sourceAmount']['value']);
        self::assertSame('EUR', $first['targetAmount']['currency']);
        self::assertSame(4480, $first['targetAmount']['value']);
        self::assertSame(RateType::SPLIT_PAYMENT, $first['type']);

        $second = $resultArray['exchangeCalculations'][1];
        self::assertIsArray($second);
        self::assertIsArray($second['sourceAmount']);
        self::assertIsArray($second['targetAmount']);
        self::assertSame(0.0413333333333, $second['appliedExchangeRate']);
        self::assertSame(ExchangeSide::SELL, $second['exchangeSide']);
        self::assertSame('CZK', $second['sourceAmount']['currency']);
        self::assertSame(24000, $second['sourceAmount']['value']);
        self::assertSame('USD', $second['targetAmount']['currency']);
        self::assertSame(992, $second['targetAmount']['value']);
        self::assertSame(RateType::SPLIT_REFUND, $second['type']);
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RatesApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->calculateWithHttpInfo(
            new CalculateRateRequest($this->calculateRequestData())
        );

        $this->assertCalculateResponse($response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RatesApi($this->createConfiguration(), $client);

        $promise = $service->calculateAsync(new CalculateRateRequest($this->calculateRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertCalculateResponse($promise->wait());
    }

    /**
     * @dataProvider successCalculateProvider
     */
    public function testCalculateAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new RatesApi($this->createConfiguration(), $client);

        $promise = $service->calculateAsyncWithHttpInfo(new CalculateRateRequest($this->calculateRequestData()));

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        $this->assertCalculateResponse($response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
    }

    public function testCalculateOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/ForeignExchange/calculate-rate-error-422.json',
            422
        );
        $service = new RatesApi($this->createConfiguration(), $client);

        try {
            $service->calculate(new CalculateRateRequest($this->invalidCalculateRequestData()));
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertValidationException($exception);
        }
    }

    public function testCalculateAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/ForeignExchange/calculate-rate-error-422.json',
            422
        );
        $service = new RatesApi($this->createConfiguration(), $client);

        try {
            $service->calculateAsync(new CalculateRateRequest($this->invalidCalculateRequestData()))->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertValidationException($exception);
        }
    }

    public static function successCalculateProvider(): array
    {
        return [
            ['tests/Resources/ForeignExchange/calculate-rate-success.json', 200],
        ];
    }

    private function calculateRequestData(): array
    {
        return [
            'exchangeCalculations' => [
                [
                    'type' => RateType::SPLIT_PAYMENT,
                    'sourceAmount' => ['currency' => 'CZK', 'value' => 112300],
                    'targetCurrency' => 'EUR',
                    'exchangeSide' => ExchangeSide::BUY,
                ],
                [
                    'type' => RateType::SPLIT_REFUND,
                    'sourceAmount' => ['currency' => 'CZK', 'value' => 24000],
                    'targetCurrency' => 'USD',
                    'exchangeSide' => ExchangeSide::SELL,
                ],
            ],
        ];
    }

    private function invalidCalculateRequestData(): array
    {
        $data = $this->calculateRequestData();
        $data['exchangeCalculations'][0]['targetCurrency'] = 'XYZ';
        return $data;
    }

    private function assertCalculateResponse(CalculateRateResponse $response): void
    {
        self::assertInstanceOf(CalculateRateResponse::class, $response);
        self::assertCount(2, $response->getExchangeCalculations());

        $first = $response->getExchangeCalculations()[0];
        self::assertInstanceOf(CalculateRateResponseItem::class, $first);
        self::assertInstanceOf(Amount::class, $first->getSourceAmount());
        self::assertInstanceOf(Amount::class, $first->getTargetAmount());
        self::assertSame(0.039893143366, $first->getAppliedExchangeRate());
        self::assertSame(ExchangeSide::BUY, $first->getExchangeSide());
        self::assertSame('CZK', $first->getSourceAmount()->getCurrency());
        self::assertSame(112300, $first->getSourceAmount()->getValue());
        self::assertSame('EUR', $first->getTargetAmount()->getCurrency());
        self::assertSame(4480, $first->getTargetAmount()->getValue());
        self::assertSame(RateType::SPLIT_PAYMENT, $first->getType());

        $second = $response->getExchangeCalculations()[1];
        self::assertInstanceOf(CalculateRateResponseItem::class, $second);
        self::assertInstanceOf(Amount::class, $second->getSourceAmount());
        self::assertInstanceOf(Amount::class, $second->getTargetAmount());
        self::assertSame(0.0413333333333, $second->getAppliedExchangeRate());
        self::assertSame(ExchangeSide::SELL, $second->getExchangeSide());
        self::assertSame('CZK', $second->getSourceAmount()->getCurrency());
        self::assertSame(24000, $second->getSourceAmount()->getValue());
        self::assertSame('USD', $second->getTargetAmount()->getCurrency());
        self::assertSame(992, $second->getTargetAmount()->getValue());
        self::assertSame(RateType::SPLIT_REFUND, $second->getType());
    }

    private function assertValidationException(AdyenException $exception): void
    {
        self::assertSame(422, $exception->getStatusCode());
        self::assertSame(
            'A request validation error: The targetCurrency is not supported',
            $exception->getMessage()
        );
        $error = $exception->getError();
        self::assertNotNull($error);
        self::assertSame('010', $error->getErrorCode());
        self::assertSame('https://docs.adyen.com/errors/validation', $error->getErrorType());
        self::assertSame(422, $error->getStatus());
        self::assertSame('A request validation error', $error->getTitle());
        self::assertSame('The targetCurrency is not supported', $error->getDetail());
        self::assertSame('https://docs.adyen.com/errors/validation', $error->getType());
        self::assertSame('/fx/api/v1/rates/calculate', $error->getInstance());
        self::assertSame('8816080397613514', $error->getRequestId());
        self::assertCount(1, $error->getInvalidFields());
        self::assertSame('targetCurrency', $error->getInvalidFields()[0]['name']);
        self::assertSame('XYZ', $error->getInvalidFields()[0]['value']);
        self::assertSame('Unsupported currency', $error->getInvalidFields()[0]['message']);
    }
}
