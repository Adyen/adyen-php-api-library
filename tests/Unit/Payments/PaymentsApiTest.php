<?php

namespace Adyen\Tests\Unit\Payments;

use Adyen\Configuration;
use Adyen\Exception\AdyenException;
use Adyen\Model\Payments\Amount;
use Adyen\Model\Payments\AuthenticationResultRequest;
use Adyen\Model\Payments\AuthenticationResultResponse;
use Adyen\Model\Payments\Card;
use Adyen\Model\Payments\FraudCheckResult;
use Adyen\Model\Payments\FraudCheckResultWrapper;
use Adyen\Model\Payments\FraudResult;
use Adyen\Model\Payments\PaymentRequest;
use Adyen\Model\Payments\PaymentRequest3d;
use Adyen\Model\Payments\PaymentRequest3ds2;
use Adyen\Model\Payments\PaymentResult;
use Adyen\Model\Payments\ThreeDS1Result;
use Adyen\Model\Payments\ThreeDS2Result;
use Adyen\Model\Payments\ThreeDS2ResultRequest;
use Adyen\Model\Payments\ThreeDS2ResultResponse;
use Adyen\Service\Payments\PaymentsApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class PaymentsApiTest extends BaseTest
{
    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $response = $service->authorise(new PaymentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise',
            (string) $request->getUri()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertArrayHasKey('resultCode', (array) $response->jsonSerialize());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
        self::assertSame('string', $response->getAuthCode());
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createLiveConfiguration(), $client);

        $service->authorise(new PaymentRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $request = (new PaymentRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setReference('YOUR_REFERENCE')
            ->setShopperInteraction(PaymentRequest::SHOPPER_INTERACTION_ECOMMERCE)
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1500))
            ->setCard(
                (new Card())
                    ->setNumber('4111111111111111')
                    ->setExpiryMonth('03')
                    ->setExpiryYear('2030')
                    ->setHolderName('Adyen Test')
            );

        $response = $service->authorise($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->authoriseRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame('string', $response->getAdditionalData()['additionalProp1']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp2']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp3']);
        self::assertSame('string', $response->getAuthCode());
        self::assertInstanceOf(Amount::class, $response->getDccAmount());
        self::assertSame('str', $response->getDccAmount()->getCurrency());
        self::assertSame(0, $response->getDccAmount()->getValue());
        self::assertSame('string', $response->getDccSignature());
        self::assertInstanceOf(FraudResult::class, $response->getFraudResult());
        self::assertSame(0, $response->getFraudResult()->getAccountScore());
        self::assertCount(1, $response->getFraudResult()->getResults());
        self::assertInstanceOf(FraudCheckResultWrapper::class, $response->getFraudResult()->getResults()[0]);
        self::assertInstanceOf(
            FraudCheckResult::class,
            $response->getFraudResult()->getResults()[0]->getFraudCheckResult()
        );
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getAccountScore());
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getCheckId());
        self::assertSame('string', $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getName());
        self::assertSame('string', $response->getIssuerUrl());
        self::assertSame('string', $response->getMd());
        self::assertSame('string', $response->getPaRequest());
        self::assertSame('string', $response->getPspReference());
        self::assertSame('string', $response->getRefusalReason());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $params = $this->authoriseRequestData();

        $response = $service->authorise(new PaymentRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('string', $response['additionalData']['additionalProp1']);
        self::assertSame('string', $response['additionalData']['additionalProp2']);
        self::assertSame('string', $response['additionalData']['additionalProp3']);
        self::assertSame('string', $response['authCode']);
        self::assertSame('str', $response['dccAmount']['currency']);
        self::assertSame(0, $response['dccAmount']['value']);
        self::assertSame('string', $response['dccSignature']);
        self::assertSame(0, $response['fraudResult']['accountScore']);
        self::assertCount(1, $response['fraudResult']['results']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $response['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $response['issuerUrl']);
        self::assertSame('string', $response['md']);
        self::assertSame('string', $response['paRequest']);
        self::assertSame('string', $response['pspReference']);
        self::assertSame('string', $response['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response['resultCode']);
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->authorise(
            new PaymentRequest($this->authoriseRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('string', $resultArray['additionalData']['additionalProp1']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp2']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp3']);
        self::assertSame('string', $resultArray['authCode']);
        self::assertSame('str', $resultArray['dccAmount']['currency']);
        self::assertSame(0, $resultArray['dccAmount']['value']);
        self::assertSame('string', $resultArray['dccSignature']);
        self::assertSame(0, $resultArray['fraudResult']['accountScore']);
        self::assertCount(1, $resultArray['fraudResult']['results']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $resultArray['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $resultArray['issuerUrl']);
        self::assertSame('string', $resultArray['md']);
        self::assertSame('string', $resultArray['paRequest']);
        self::assertSame('string', $resultArray['pspReference']);
        self::assertSame('string', $resultArray['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $resultArray['resultCode']);
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->authoriseWithHttpInfo(
            new PaymentRequest($this->authoriseRequestData())
        );

        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authoriseAsync(
            new PaymentRequest($this->authoriseRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthoriseProvider
     */
    public function testAuthoriseAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authoriseAsyncWithHttpInfo(
            new PaymentRequest($this->authoriseRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    public function testAuthoriseOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authorise(
                new PaymentRequest($this->authoriseRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testAuthoriseAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authoriseAsync(
                new PaymentRequest($this->authoriseRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successAuthoriseProvider(): array
    {
        return [
            ['tests/Resources/Payments/authorise-success.json', 200],
        ];
    }

    private function authoriseRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'reference' => 'YOUR_REFERENCE',
            'shopperInteraction' => 'Ecommerce',
            'amount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'card' => [
                'number' => '4111111111111111',
                'expiryMonth' => '03',
                'expiryYear' => '2030',
                'holderName' => 'Adyen Test',
            ],
            'threeDSAuthenticationOnly' => false,
            'applicationInfo' => [
                'adyenLibrary' => [
                    'name' => Configuration::LIB_NAME,
                    'version' => Configuration::LIB_VERSION,
                ],
            ],
        ];
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $response = $service->authorise3d(new PaymentRequest3d());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise3d',
            (string) $request->getUri()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertArrayHasKey('resultCode', (array) $response->jsonSerialize());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createLiveConfiguration(), $client);

        $service->authorise3d(new PaymentRequest3d());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise3d',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $request = (new PaymentRequest3d())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setMd('test-md')
            ->setPaResponse('test-pa-response')
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->authorise3d($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->authorise3dRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame('string', $response->getAdditionalData()['additionalProp1']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp2']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp3']);
        self::assertSame('string', $response->getAuthCode());
        self::assertInstanceOf(Amount::class, $response->getDccAmount());
        self::assertSame('str', $response->getDccAmount()->getCurrency());
        self::assertSame(0, $response->getDccAmount()->getValue());
        self::assertSame('string', $response->getDccSignature());
        self::assertInstanceOf(FraudResult::class, $response->getFraudResult());
        self::assertSame(0, $response->getFraudResult()->getAccountScore());
        self::assertCount(1, $response->getFraudResult()->getResults());
        self::assertInstanceOf(FraudCheckResultWrapper::class, $response->getFraudResult()->getResults()[0]);
        self::assertInstanceOf(
            FraudCheckResult::class,
            $response->getFraudResult()->getResults()[0]->getFraudCheckResult()
        );
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getAccountScore());
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getCheckId());
        self::assertSame('string', $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getName());
        self::assertSame('string', $response->getIssuerUrl());
        self::assertSame('string', $response->getMd());
        self::assertSame('string', $response->getPaRequest());
        self::assertSame('string', $response->getPspReference());
        self::assertSame('string', $response->getRefusalReason());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $params = $this->authorise3dRequestData();

        $response = $service->authorise3d(new PaymentRequest3d($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('string', $response['additionalData']['additionalProp1']);
        self::assertSame('string', $response['additionalData']['additionalProp2']);
        self::assertSame('string', $response['additionalData']['additionalProp3']);
        self::assertSame('string', $response['authCode']);
        self::assertSame('str', $response['dccAmount']['currency']);
        self::assertSame(0, $response['dccAmount']['value']);
        self::assertSame('string', $response['dccSignature']);
        self::assertSame(0, $response['fraudResult']['accountScore']);
        self::assertCount(1, $response['fraudResult']['results']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $response['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $response['issuerUrl']);
        self::assertSame('string', $response['md']);
        self::assertSame('string', $response['paRequest']);
        self::assertSame('string', $response['pspReference']);
        self::assertSame('string', $response['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response['resultCode']);
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->authorise3d(
            new PaymentRequest3d($this->authorise3dRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('string', $resultArray['additionalData']['additionalProp1']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp2']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp3']);
        self::assertSame('string', $resultArray['authCode']);
        self::assertSame('str', $resultArray['dccAmount']['currency']);
        self::assertSame(0, $resultArray['dccAmount']['value']);
        self::assertSame('string', $resultArray['dccSignature']);
        self::assertSame(0, $resultArray['fraudResult']['accountScore']);
        self::assertCount(1, $resultArray['fraudResult']['results']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $resultArray['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $resultArray['issuerUrl']);
        self::assertSame('string', $resultArray['md']);
        self::assertSame('string', $resultArray['paRequest']);
        self::assertSame('string', $resultArray['pspReference']);
        self::assertSame('string', $resultArray['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $resultArray['resultCode']);
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->authorise3dWithHttpInfo(
            new PaymentRequest3d($this->authorise3dRequestData())
        );

        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authorise3dAsync(
            new PaymentRequest3d($this->authorise3dRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3dProvider
     */
    public function testAuthorise3dAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authorise3dAsyncWithHttpInfo(
            new PaymentRequest3d($this->authorise3dRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    public function testAuthorise3dOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authorise3d(
                new PaymentRequest3d($this->authorise3dRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testAuthorise3dAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authorise3dAsync(
                new PaymentRequest3d($this->authorise3dRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successAuthorise3dProvider(): array
    {
        return [
            ['tests/Resources/Payments/authorise3d-success.json', 200],
        ];
    }

    private function authorise3dRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'md' => 'test-md',
            'paResponse' => 'test-pa-response',
            'amount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'threeDSAuthenticationOnly' => false,
            'applicationInfo' => [
                'adyenLibrary' => [
                    'name' => Configuration::LIB_NAME,
                    'version' => Configuration::LIB_VERSION,
                ],
            ],
        ];
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2SendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $response = $service->authorise3ds2(new PaymentRequest3ds2());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise3ds2',
            (string) $request->getUri()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertArrayHasKey('resultCode', (array) $response->jsonSerialize());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2SendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createLiveConfiguration(), $client);

        $service->authorise3ds2(new PaymentRequest3ds2());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise3ds2',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2Success(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $request = (new PaymentRequest3ds2())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setThreeDS2Token('test-three-ds2-token')
            ->setThreeDS2Result(
                (new ThreeDS2Result())
                    ->setAuthenticationValue('test-authentication-value')
                    ->setEci('05')
                    ->setMessageVersion('2.2.0')
                    ->setTransStatus('Y')
            )
            ->setAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->authorise3ds2($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->authorise3ds2RequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame('string', $response->getAdditionalData()['additionalProp1']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp2']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp3']);
        self::assertSame('string', $response->getAuthCode());
        self::assertInstanceOf(Amount::class, $response->getDccAmount());
        self::assertSame('str', $response->getDccAmount()->getCurrency());
        self::assertSame(0, $response->getDccAmount()->getValue());
        self::assertSame('string', $response->getDccSignature());
        self::assertInstanceOf(FraudResult::class, $response->getFraudResult());
        self::assertSame(0, $response->getFraudResult()->getAccountScore());
        self::assertCount(1, $response->getFraudResult()->getResults());
        self::assertInstanceOf(FraudCheckResultWrapper::class, $response->getFraudResult()->getResults()[0]);
        self::assertInstanceOf(
            FraudCheckResult::class,
            $response->getFraudResult()->getResults()[0]->getFraudCheckResult()
        );
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getAccountScore());
        self::assertSame(0, $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getCheckId());
        self::assertSame('string', $response->getFraudResult()->getResults()[0]->getFraudCheckResult()->getName());
        self::assertSame('string', $response->getIssuerUrl());
        self::assertSame('string', $response->getMd());
        self::assertSame('string', $response->getPaRequest());
        self::assertSame('string', $response->getPspReference());
        self::assertSame('string', $response->getRefusalReason());
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2SuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $params = $this->authorise3ds2RequestData();

        $response = $service->authorise3ds2(new PaymentRequest3ds2($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('string', $response['additionalData']['additionalProp1']);
        self::assertSame('string', $response['additionalData']['additionalProp2']);
        self::assertSame('string', $response['additionalData']['additionalProp3']);
        self::assertSame('string', $response['authCode']);
        self::assertSame('str', $response['dccAmount']['currency']);
        self::assertSame(0, $response['dccAmount']['value']);
        self::assertSame('string', $response['dccSignature']);
        self::assertSame(0, $response['fraudResult']['accountScore']);
        self::assertCount(1, $response['fraudResult']['results']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $response['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $response['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $response['issuerUrl']);
        self::assertSame('string', $response['md']);
        self::assertSame('string', $response['paRequest']);
        self::assertSame('string', $response['pspReference']);
        self::assertSame('string', $response['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response['resultCode']);
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2SuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->authorise3ds2(
            new PaymentRequest3ds2($this->authorise3ds2RequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('string', $resultArray['additionalData']['additionalProp1']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp2']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp3']);
        self::assertSame('string', $resultArray['authCode']);
        self::assertSame('str', $resultArray['dccAmount']['currency']);
        self::assertSame(0, $resultArray['dccAmount']['value']);
        self::assertSame('string', $resultArray['dccSignature']);
        self::assertSame(0, $resultArray['fraudResult']['accountScore']);
        self::assertCount(1, $resultArray['fraudResult']['results']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['accountScore']);
        self::assertSame(0, $resultArray['fraudResult']['results'][0]['fraudCheckResult']['checkId']);
        self::assertSame('string', $resultArray['fraudResult']['results'][0]['fraudCheckResult']['name']);
        self::assertSame('string', $resultArray['issuerUrl']);
        self::assertSame('string', $resultArray['md']);
        self::assertSame('string', $resultArray['paRequest']);
        self::assertSame('string', $resultArray['pspReference']);
        self::assertSame('string', $resultArray['refusalReason']);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $resultArray['resultCode']);
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2SuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->authorise3ds2WithHttpInfo(
            new PaymentRequest3ds2($this->authorise3ds2RequestData())
        );

        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2AsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authorise3ds2Async(
            new PaymentRequest3ds2($this->authorise3ds2RequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    /**
     * @dataProvider successAuthorise3ds2Provider
     */
    public function testAuthorise3ds2AsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->authorise3ds2AsyncWithHttpInfo(
            new PaymentRequest3ds2($this->authorise3ds2RequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(PaymentResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(PaymentResult::RESULT_CODE_AUTHENTICATION_FINISHED, $response->getResultCode());
    }

    public function testAuthorise3ds2OnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authorise3ds2(
                new PaymentRequest3ds2($this->authorise3ds2RequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testAuthorise3ds2AsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->authorise3ds2Async(
                new PaymentRequest3ds2($this->authorise3ds2RequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successAuthorise3ds2Provider(): array
    {
        return [
            ['tests/Resources/Payments/authorise3ds2-success.json', 200],
        ];
    }

    private function authorise3ds2RequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'threeDS2Token' => 'test-three-ds2-token',
            'threeDS2Result' => [
                'authenticationValue' => 'test-authentication-value',
                'eci' => '05',
                'messageVersion' => '2.2.0',
                'transStatus' => 'Y',
            ],
            'amount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'threeDSAuthenticationOnly' => false,
            'applicationInfo' => [
                'adyenLibrary' => [
                    'name' => Configuration::LIB_NAME,
                    'version' => Configuration::LIB_VERSION,
                ],
            ],
        ];
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $response = $service->getAuthenticationResult(new AuthenticationResultRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/getAuthenticationResult',
            (string) $request->getUri()
        );
        self::assertInstanceOf(AuthenticationResultResponse::class, $response);
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createLiveConfiguration(), $client);

        $service->getAuthenticationResult(new AuthenticationResultRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/getAuthenticationResult',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $request = (new AuthenticationResultRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setPspReference('8816080397613514');

        $response = $service->getAuthenticationResult($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->getAuthenticationResultRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(AuthenticationResultResponse::class, $response);
        self::assertInstanceOf(ThreeDS1Result::class, $response->getThreeDS1Result());
        self::assertSame('test-cavv', $response->getThreeDS1Result()->getCavv());
        self::assertSame('2', $response->getThreeDS1Result()->getCavvAlgorithm());
        self::assertSame('05', $response->getThreeDS1Result()->getEci());
        self::assertSame('Y', $response->getThreeDS1Result()->getThreeDAuthenticatedResponse());
        self::assertSame('Y', $response->getThreeDS1Result()->getThreeDOfferedResponse());
        self::assertSame('test-xid', $response->getThreeDS1Result()->getXid());
        self::assertInstanceOf(ThreeDS2Result::class, $response->getThreeDS2Result());
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
        self::assertSame('2', $response->getThreeDS2Result()->getCavvAlgorithm());
        self::assertSame('11111111-1111-4111-8111-111111111111', $response->getThreeDS2Result()->getDsTransID());
        self::assertSame('05', $response->getThreeDS2Result()->getEci());
        self::assertSame('2.2.0', $response->getThreeDS2Result()->getMessageVersion());
        self::assertSame(
            '22222222-2222-4222-8222-222222222222',
            $response->getThreeDS2Result()->getThreeDSServerTransID()
        );
        self::assertSame('2025-01-01T12:00:00Z', $response->getThreeDS2Result()->getTimestamp());
        self::assertSame('Y', $response->getThreeDS2Result()->getTransStatus());
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $params = $this->getAuthenticationResultRequestData();

        $response = $service->getAuthenticationResult(new AuthenticationResultRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('test-cavv', $response['threeDS1Result']['cavv']);
        self::assertSame('2', $response['threeDS1Result']['cavvAlgorithm']);
        self::assertSame('05', $response['threeDS1Result']['eci']);
        self::assertSame('Y', $response['threeDS1Result']['threeDAuthenticatedResponse']);
        self::assertSame('Y', $response['threeDS1Result']['threeDOfferedResponse']);
        self::assertSame('test-xid', $response['threeDS1Result']['xid']);
        self::assertSame('test-authentication-value', $response['threeDS2Result']['authenticationValue']);
        self::assertSame('2', $response['threeDS2Result']['cavvAlgorithm']);
        self::assertSame('11111111-1111-4111-8111-111111111111', $response['threeDS2Result']['dsTransID']);
        self::assertSame('05', $response['threeDS2Result']['eci']);
        self::assertSame('2.2.0', $response['threeDS2Result']['messageVersion']);
        self::assertSame('22222222-2222-4222-8222-222222222222', $response['threeDS2Result']['threeDSServerTransID']);
        self::assertSame('2025-01-01T12:00:00Z', $response['threeDS2Result']['timestamp']);
        self::assertSame('Y', $response['threeDS2Result']['transStatus']);
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->getAuthenticationResult(
            new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('test-cavv', $resultArray['threeDS1Result']['cavv']);
        self::assertSame('2', $resultArray['threeDS1Result']['cavvAlgorithm']);
        self::assertSame('05', $resultArray['threeDS1Result']['eci']);
        self::assertSame('Y', $resultArray['threeDS1Result']['threeDAuthenticatedResponse']);
        self::assertSame('Y', $resultArray['threeDS1Result']['threeDOfferedResponse']);
        self::assertSame('test-xid', $resultArray['threeDS1Result']['xid']);
        self::assertSame('test-authentication-value', $resultArray['threeDS2Result']['authenticationValue']);
        self::assertSame('2', $resultArray['threeDS2Result']['cavvAlgorithm']);
        self::assertSame('11111111-1111-4111-8111-111111111111', $resultArray['threeDS2Result']['dsTransID']);
        self::assertSame('05', $resultArray['threeDS2Result']['eci']);
        self::assertSame('2.2.0', $resultArray['threeDS2Result']['messageVersion']);
        self::assertSame(
            '22222222-2222-4222-8222-222222222222',
            $resultArray['threeDS2Result']['threeDSServerTransID']
        );
        self::assertSame('2025-01-01T12:00:00Z', $resultArray['threeDS2Result']['timestamp']);
        self::assertSame('Y', $resultArray['threeDS2Result']['transStatus']);
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->getAuthenticationResultWithHttpInfo(
            new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
        );

        self::assertInstanceOf(AuthenticationResultResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->getAuthenticationResultAsync(
            new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(AuthenticationResultResponse::class, $response);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    /**
     * @dataProvider successGetAuthenticationResultProvider
     */
    public function testGetAuthenticationResultAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->getAuthenticationResultAsyncWithHttpInfo(
            new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(AuthenticationResultResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    public function testGetAuthenticationResultOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->getAuthenticationResult(
                new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testGetAuthenticationResultAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->getAuthenticationResultAsync(
                new AuthenticationResultRequest($this->getAuthenticationResultRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successGetAuthenticationResultProvider(): array
    {
        return [
            ['tests/Resources/Payments/authentication-result-success.json', 200],
        ];
    }

    private function getAuthenticationResultRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'pspReference' => '8816080397613514',
        ];
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $response = $service->retrieve3ds2Result(new ThreeDS2ResultRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/retrieve3ds2Result',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ThreeDS2ResultResponse::class, $response);
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createLiveConfiguration(), $client);

        $service->retrieve3ds2Result(new ThreeDS2ResultRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/retrieve3ds2Result',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $request = (new ThreeDS2ResultRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setPspReference('8816080397613514');

        $response = $service->retrieve3ds2Result($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->retrieve3ds2ResultRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ThreeDS2ResultResponse::class, $response);
        self::assertInstanceOf(ThreeDS2Result::class, $response->getThreeDS2Result());
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
        self::assertSame('2', $response->getThreeDS2Result()->getCavvAlgorithm());
        self::assertSame('11111111-1111-4111-8111-111111111111', $response->getThreeDS2Result()->getDsTransID());
        self::assertSame('05', $response->getThreeDS2Result()->getEci());
        self::assertSame('2.2.0', $response->getThreeDS2Result()->getMessageVersion());
        self::assertSame(
            '22222222-2222-4222-8222-222222222222',
            $response->getThreeDS2Result()->getThreeDSServerTransID()
        );
        self::assertSame('2025-01-01T12:00:00Z', $response->getThreeDS2Result()->getTimestamp());
        self::assertSame('Y', $response->getThreeDS2Result()->getTransStatus());
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new PaymentsApi($this->createConfiguration(), $client);
        $params = $this->retrieve3ds2ResultRequestData();

        $response = $service->retrieve3ds2Result(new ThreeDS2ResultRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('test-authentication-value', $response['threeDS2Result']['authenticationValue']);
        self::assertSame('2', $response['threeDS2Result']['cavvAlgorithm']);
        self::assertSame('11111111-1111-4111-8111-111111111111', $response['threeDS2Result']['dsTransID']);
        self::assertSame('05', $response['threeDS2Result']['eci']);
        self::assertSame('2.2.0', $response['threeDS2Result']['messageVersion']);
        self::assertSame('22222222-2222-4222-8222-222222222222', $response['threeDS2Result']['threeDSServerTransID']);
        self::assertSame('2025-01-01T12:00:00Z', $response['threeDS2Result']['timestamp']);
        self::assertSame('Y', $response['threeDS2Result']['transStatus']);
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->retrieve3ds2Result(
            new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('test-authentication-value', $resultArray['threeDS2Result']['authenticationValue']);
        self::assertSame('2', $resultArray['threeDS2Result']['cavvAlgorithm']);
        self::assertSame('11111111-1111-4111-8111-111111111111', $resultArray['threeDS2Result']['dsTransID']);
        self::assertSame('05', $resultArray['threeDS2Result']['eci']);
        self::assertSame('2.2.0', $resultArray['threeDS2Result']['messageVersion']);
        self::assertSame(
            '22222222-2222-4222-8222-222222222222',
            $resultArray['threeDS2Result']['threeDSServerTransID']
        );
        self::assertSame('2025-01-01T12:00:00Z', $resultArray['threeDS2Result']['timestamp']);
        self::assertSame('Y', $resultArray['threeDS2Result']['transStatus']);
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->retrieve3ds2ResultWithHttpInfo(
            new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
        );

        self::assertInstanceOf(ThreeDS2ResultResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->retrieve3ds2ResultAsync(
            new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ThreeDS2ResultResponse::class, $response);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    /**
     * @dataProvider successRetrieve3ds2ResultProvider
     */
    public function testRetrieve3ds2ResultAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $promise = $service->retrieve3ds2ResultAsyncWithHttpInfo(
            new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ThreeDS2ResultResponse::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame('test-authentication-value', $response->getThreeDS2Result()->getAuthenticationValue());
    }

    public function testRetrieve3ds2ResultOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->retrieve3ds2Result(
                new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testRetrieve3ds2ResultAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        try {
            $service->retrieve3ds2ResultAsync(
                new ThreeDS2ResultRequest($this->retrieve3ds2ResultRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successRetrieve3ds2ResultProvider(): array
    {
        return [
            ['tests/Resources/Payments/retrieve-3ds2-result-success.json', 200],
        ];
    }

    private function retrieve3ds2ResultRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'pspReference' => '8816080397613514',
        ];
    }

    private function assertInvalidMerchantException(AdyenException $exception): void
    {
        self::assertSame(403, $exception->getStatusCode());
        self::assertSame('Invalid Merchant Account', $exception->getMessage());
        self::assertNotNull($exception->getError());
        self::assertSame(403, $exception->getError()->getStatus());
        self::assertSame('901', $exception->getError()->getErrorCode());
        self::assertSame('security', $exception->getError()->getErrorType());
    }
}
