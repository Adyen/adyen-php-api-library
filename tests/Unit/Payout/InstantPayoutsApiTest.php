<?php

namespace Adyen\Tests\Unit\Payout;

use Adyen\Exception\AdyenException;
use Adyen\Model\Payout\Amount;
use Adyen\Model\Payout\Card;
use Adyen\Model\Payout\FraudCheckResult;
use Adyen\Model\Payout\FraudCheckResultWrapper;
use Adyen\Model\Payout\FraudResult;
use Adyen\Model\Payout\PayoutRequest;
use Adyen\Model\Payout\PayoutResponse;
use Adyen\Service\Payout\InstantPayoutsApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class InstantPayoutsApiTest extends BaseTest
{
    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        $service->payout(new PayoutRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payout/v68/payout',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InstantPayoutsApi($this->createLiveConfiguration(), $client);

        $service->payout(new PayoutRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payout/v68/payout',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);
        $request = (new PayoutRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setReference('YOUR_REFERENCE')
            ->setShopperReference('YOUR_SHOPPER_REFERENCE')
            ->setShopperInteraction(PayoutRequest::SHOPPER_INTERACTION_ECOMMERCE)
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1000))
            ->setCard((new Card())
                ->setNumber('4111111111111111')
                ->setExpiryMonth('03')
                ->setExpiryYear('2030')
                ->setHolderName('Adyen Test'));

        $response = $service->payout($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->payoutRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(PayoutResponse::class, $response);
        self::assertInstanceOf(Amount::class, $response->getDccAmount());
        self::assertInstanceOf(FraudResult::class, $response->getFraudResult());
        self::assertInstanceOf(FraudCheckResultWrapper::class, $response->getFraudResult()->getResults()[0]);
        self::assertInstanceOf(
            FraudCheckResult::class,
            $response->getFraudResult()->getResults()[0]->getFraudCheckResult()
        );
        self::assertCount(1, $response->getFraudResult()->getResults());
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
        self::assertSame('string', $response->getAdditionalData()['additionalProp1']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp2']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp3']);
        self::assertSame('string', $response->getAuthCode());
        self::assertSame('str', $response->getDccAmount()->getCurrency());
        self::assertSame(0, $response->getDccAmount()->getValue());
        self::assertSame('string', $response->getDccSignature());
        self::assertSame(0, $response->getFraudResult()->getAccountScore());
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getAccountScore());
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getCheckId());
        self::assertSame('string', $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getName());
        self::assertSame('string', $response->getIssuerUrl());
        self::assertSame('string', $response->getMd());
        self::assertSame('string', $response->getPaRequest());
        self::assertSame('string', $response->getPspReference());
        self::assertSame('string', $response->getRefusalReason());
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);
        $params = $this->payoutRequestData();

        $response = $service->payout(new PayoutRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertCount(1, $response['fraudResult']['results']);
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $response['resultCode']);
        self::assertSame('string', $response['additionalData']['additionalProp1']);
        self::assertSame('string', $response['additionalData']['additionalProp2']);
        self::assertSame('string', $response['additionalData']['additionalProp3']);
        self::assertSame('string', $response['authCode']);
        self::assertSame('str', $response['dccAmount']['currency']);
        self::assertSame(0, $response['dccAmount']['value']);
        self::assertSame('string', $response['dccSignature']);
        self::assertSame(0, $response['fraudResult']['accountScore']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $response['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $response['issuerUrl']);
        self::assertSame('string', $response['md']);
        self::assertSame('string', $response['paRequest']);
        self::assertSame('string', $response['pspReference']);
        self::assertSame('string', $response['refusalReason']);
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        $resultArray = $service->payout(
            new PayoutRequest($this->payoutRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertCount(1, $resultArray['fraudResult']['results']);
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $resultArray['resultCode']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp1']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp2']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp3']);
        self::assertSame('string', $resultArray['authCode']);
        self::assertSame('str', $resultArray['dccAmount']['currency']);
        self::assertSame(0, $resultArray['dccAmount']['value']);
        self::assertSame('string', $resultArray['dccSignature']);
        self::assertSame(0, $resultArray['fraudResult']['accountScore']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $resultArray['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $resultArray['issuerUrl']);
        self::assertSame('string', $resultArray['md']);
        self::assertSame('string', $resultArray['paRequest']);
        self::assertSame('string', $resultArray['pspReference']);
        self::assertSame('string', $resultArray['refusalReason']);
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->payoutWithHttpInfo(
            new PayoutRequest($this->payoutRequestData())
        );

        self::assertInstanceOf(PayoutResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        $promise = $service->payoutAsync(
            new PayoutRequest($this->payoutRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PayoutResponse::class, $response);
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successPayoutProvider
     */
    public function testPayoutAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        $promise = $service->payoutAsyncWithHttpInfo(
            new PayoutRequest($this->payoutRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PayoutResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PayoutResponse::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    public function testPayoutOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        try {
            $service->payout(
                new PayoutRequest($this->payoutRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public function testPayoutAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient('tests/Resources/Payouts/payout-401-error.json', 401);
        $service = new InstantPayoutsApi($this->createConfiguration(), $client);

        try {
            $service->payoutAsync(
                new PayoutRequest($this->payoutRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertUnauthorizedException($exception);
        }
    }

    public static function successPayoutProvider(): array
    {
        return [
            ['tests/Resources/Payouts/instant-payout.json', 200],
        ];
    }

    private function payoutRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'reference' => 'YOUR_REFERENCE',
            'shopperReference' => 'YOUR_SHOPPER_REFERENCE',
            'shopperInteraction' => 'Ecommerce',
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
