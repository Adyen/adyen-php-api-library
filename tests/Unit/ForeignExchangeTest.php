<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Environment;
use Adyen\Model\ForeignExchange\Amount;
use Adyen\Model\ForeignExchange\CalculateRateRequest;
use Adyen\Model\ForeignExchange\CalculateRateRequestItem;
use Adyen\Model\ForeignExchange\ExchangeSide;
use Adyen\Model\ForeignExchange\RateType;
use Adyen\Service\ForeignExchange\RatesApi;

class ForeignExchangeTest extends TestCaseMock
{
    /**
     * @throws AdyenException
     */
    public function testCalculateSuccess()
    {
        $client = $this->createMockClientUrl('tests/Resources/ForeignExchange/calculate-rate-success.json');
        $service = new RatesApi($client);

        $request = new CalculateRateRequest([
            'exchangeCalculations' => [
                new CalculateRateRequestItem([
                    'type' => RateType::SPLIT_PAYMENT,
                    'sourceAmount' => new Amount([
                        'currency' => 'CZK',
                        'value' => 112300
                    ]),
                    'targetCurrency' => 'EUR',
                    'exchangeSide' => ExchangeSide::BUY
                ]),
                new CalculateRateRequestItem([
                    'type' => RateType::SPLIT_REFUND,
                    'sourceAmount' => new Amount([
                        'currency' => 'CZK',
                        'value' => 24000
                    ]),
                    'targetCurrency' => 'USD',
                    'exchangeSide' => ExchangeSide::SELL
                ])
            ]
        ]);

        $response = $service->calculate($request);

        $this->assertEquals(
            'https://balanceplatform-api-test.adyen.com/fx/api/v1/rates/calculate',
            $this->requestUrl
        );
        $this->assertCount(2, $response->getExchangeCalculations());

        $firstCalculation = $response->getExchangeCalculations()[0];
        $this->assertEquals(0.039893143366, $firstCalculation->getAppliedExchangeRate());
        $this->assertEquals(ExchangeSide::BUY, $firstCalculation->getExchangeSide());
        $this->assertEquals('CZK', $firstCalculation->getSourceAmount()->getCurrency());
        $this->assertEquals(112300, $firstCalculation->getSourceAmount()->getValue());
        $this->assertEquals('EUR', $firstCalculation->getTargetAmount()->getCurrency());
        $this->assertEquals(4480, $firstCalculation->getTargetAmount()->getValue());
        $this->assertEquals(RateType::SPLIT_PAYMENT, $firstCalculation->getType());

        $secondCalculation = $response->getExchangeCalculations()[1];
        $this->assertEquals(0.0413333333333, $secondCalculation->getAppliedExchangeRate());
        $this->assertEquals(ExchangeSide::SELL, $secondCalculation->getExchangeSide());
        $this->assertEquals('CZK', $secondCalculation->getSourceAmount()->getCurrency());
        $this->assertEquals(24000, $secondCalculation->getSourceAmount()->getValue());
        $this->assertEquals('USD', $secondCalculation->getTargetAmount()->getCurrency());
        $this->assertEquals(992, $secondCalculation->getTargetAmount()->getValue());
        $this->assertEquals(RateType::SPLIT_REFUND, $secondCalculation->getType());
    }

    /**
     * @throws AdyenException
     */
    public function testCalculateUrlCheckLive()
    {
        $client = $this->createMockClientUrl(
            'tests/Resources/ForeignExchange/calculate-rate-success.json',
            Environment::LIVE
        );
        $service = new RatesApi($client);

        $service->calculate(new CalculateRateRequest());

        $this->assertEquals(
            'https://balanceplatform-api-live.adyen.com/fx/api/v1/rates/calculate',
            $this->requestUrl
        );
    }

    /**
     * @throws AdyenException
     */
    public function testCalculateError()
    {
        $client = $this->createMockClient(
            'tests/Resources/ForeignExchange/calculate-rate-error-422.json',
            422
        );
        $service = new RatesApi($client);

        $this->expectException(AdyenException::class);

        $service->calculate(new CalculateRateRequest());
    }
}
