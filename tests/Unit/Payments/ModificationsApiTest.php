<?php

namespace Adyen\Tests\Unit\Payments;

use Adyen\Exception\AdyenException;
use Adyen\Model\Payments\AdjustAuthorisationRequest;
use Adyen\Model\Payments\Amount;
use Adyen\Model\Payments\CancelOrRefundRequest;
use Adyen\Model\Payments\CancelRequest;
use Adyen\Model\Payments\CaptureRequest;
use Adyen\Model\Payments\DonationRequest;
use Adyen\Model\Payments\ModificationResult;
use Adyen\Model\Payments\RefundRequest;
use Adyen\Model\Payments\TechnicalCancelRequest;
use Adyen\Model\Payments\VoidPendingRefundRequest;
use Adyen\Service\Payments\ModificationsApi;
use Adyen\Tests\Unit\BaseTest;
use GuzzleHttp\Promise\PromiseInterface;

class ModificationsApiTest extends BaseTest
{
    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->adjustAuthorisation(new AdjustAuthorisationRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/adjustAuthorisation',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertArrayHasKey('pspReference', (array) $response->jsonSerialize());
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->adjustAuthorisation(new AdjustAuthorisationRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/adjustAuthorisation',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new AdjustAuthorisationRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE')
            ->setModificationAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->adjustAuthorisation($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->adjustAuthorisationRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('851617892360718D', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->adjustAuthorisationRequestData();

        $response = $service->adjustAuthorisation(new AdjustAuthorisationRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('851617892360718D', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->adjustAuthorisation(
            new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('851617892360718D', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->adjustAuthorisationWithHttpInfo(
            new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->adjustAuthorisationAsync(
            new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successAdjustAuthorisationProvider
     */
    public function testAdjustAuthorisationAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->adjustAuthorisationAsyncWithHttpInfo(
            new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_ADJUST_AUTHORISATION_RECEIVED, $response->getResponse());
    }

    public function testAdjustAuthorisationOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->adjustAuthorisation(
                new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testAdjustAuthorisationAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->adjustAuthorisationAsync(
                new AdjustAuthorisationRequest($this->adjustAuthorisationRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successAdjustAuthorisationProvider(): array
    {
        return [
            ['tests/Resources/Payments/adjust-auth.json', 200],
        ];
    }

    private function adjustAuthorisationRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
            'modificationAmount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
        ];
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->cancel(new CancelRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/cancel',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertArrayHasKey('additionalData', (array) $response->jsonSerialize());
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->cancel(new CancelRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/cancel',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new CancelRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE');

        $response = $service->cancel($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->cancelRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('string', $response->getAdditionalData()['additionalProp1']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp2']);
        self::assertSame('string', $response->getAdditionalData()['additionalProp3']);
        self::assertSame('string', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->cancelRequestData();

        $response = $service->cancel(new CancelRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('string', $response['additionalData']['additionalProp1']);
        self::assertSame('string', $response['additionalData']['additionalProp2']);
        self::assertSame('string', $response['additionalData']['additionalProp3']);
        self::assertSame('string', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->cancel(
            new CancelRequest($this->cancelRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('string', $resultArray['additionalData']['additionalProp1']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp2']);
        self::assertSame('string', $resultArray['additionalData']['additionalProp3']);
        self::assertSame('string', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->cancelWithHttpInfo(
            new CancelRequest($this->cancelRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->cancelAsync(
            new CancelRequest($this->cancelRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelProvider
     */
    public function testCancelAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->cancelAsyncWithHttpInfo(
            new CancelRequest($this->cancelRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_RECEIVED, $response->getResponse());
    }

    public function testCancelOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->cancel(
                new CancelRequest($this->cancelRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testCancelAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->cancelAsync(
                new CancelRequest($this->cancelRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successCancelProvider(): array
    {
        return [
            ['tests/Resources/Payments/cancel.json', 200],
        ];
    }

    private function cancelRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
        ];
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->cancelOrRefund(new CancelOrRefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/cancelOrRefund',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->cancelOrRefund(new CancelOrRefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/cancelOrRefund',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new CancelOrRefundRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE');

        $response = $service->cancelOrRefund($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->cancelOrRefundRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613501', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->cancelOrRefundRequestData();

        $response = $service->cancelOrRefund(new CancelOrRefundRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613501', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->cancelOrRefund(
            new CancelOrRefundRequest($this->cancelOrRefundRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613501', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->cancelOrRefundWithHttpInfo(
            new CancelOrRefundRequest($this->cancelOrRefundRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->cancelOrRefundAsync(
            new CancelOrRefundRequest($this->cancelOrRefundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCancelOrRefundProvider
     */
    public function testCancelOrRefundAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->cancelOrRefundAsyncWithHttpInfo(
            new CancelOrRefundRequest($this->cancelOrRefundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CANCEL_OR_REFUND_RECEIVED, $response->getResponse());
    }

    public function testCancelOrRefundOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->cancelOrRefund(
                new CancelOrRefundRequest($this->cancelOrRefundRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testCancelOrRefundAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->cancelOrRefundAsync(
                new CancelOrRefundRequest($this->cancelOrRefundRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successCancelOrRefundProvider(): array
    {
        return [
            ['tests/Resources/Payments/cancel-or-refund-success.json', 200],
        ];
    }

    private function cancelOrRefundRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
        ];
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->capture(new CaptureRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/capture',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->capture(new CaptureRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/capture',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new CaptureRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE')
            ->setModificationAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->capture($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->captureRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613502', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->captureRequestData();

        $response = $service->capture(new CaptureRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613502', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->capture(
            new CaptureRequest($this->captureRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613502', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->captureWithHttpInfo(
            new CaptureRequest($this->captureRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->captureAsync(
            new CaptureRequest($this->captureRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successCaptureProvider
     */
    public function testCaptureAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->captureAsyncWithHttpInfo(
            new CaptureRequest($this->captureRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_CAPTURE_RECEIVED, $response->getResponse());
    }

    public function testCaptureOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->capture(
                new CaptureRequest($this->captureRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testCaptureAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->captureAsync(
                new CaptureRequest($this->captureRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successCaptureProvider(): array
    {
        return [
            ['tests/Resources/Payments/capture-success.json', 200],
        ];
    }

    private function captureRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
            'modificationAmount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
        ];
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->donate(new DonationRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/donate',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->donate(new DonationRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/donate',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new DonationRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE')
            ->setModificationAmount((new Amount())->setCurrency('EUR')->setValue(1500))
            ->setDonationAccount('CHARITY_ACCOUNT');

        $response = $service->donate($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->donateRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613503', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->donateRequestData();

        $response = $service->donate(new DonationRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613503', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->donate(
            new DonationRequest($this->donateRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613503', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->donateWithHttpInfo(
            new DonationRequest($this->donateRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->donateAsync(
            new DonationRequest($this->donateRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successDonateProvider
     */
    public function testDonateAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->donateAsyncWithHttpInfo(
            new DonationRequest($this->donateRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_DONATION_RECEIVED, $response->getResponse());
    }

    public function testDonateOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->donate(
                new DonationRequest($this->donateRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testDonateAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->donateAsync(
                new DonationRequest($this->donateRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successDonateProvider(): array
    {
        return [
            ['tests/Resources/Payments/donate-success.json', 200],
        ];
    }

    private function donateRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
            'modificationAmount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
            'donationAccount' => 'CHARITY_ACCOUNT',
        ];
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->refund(new RefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/refund',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->refund(new RefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/refund',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new RefundRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE')
            ->setModificationAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->refund($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->refundRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613504', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->refundRequestData();

        $response = $service->refund(new RefundRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613504', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->refund(
            new RefundRequest($this->refundRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613504', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->refundWithHttpInfo(
            new RefundRequest($this->refundRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->refundAsync(
            new RefundRequest($this->refundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successRefundProvider
     */
    public function testRefundAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->refundAsyncWithHttpInfo(
            new RefundRequest($this->refundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_REFUND_RECEIVED, $response->getResponse());
    }

    public function testRefundOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->refund(
                new RefundRequest($this->refundRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testRefundAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->refundAsync(
                new RefundRequest($this->refundRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successRefundProvider(): array
    {
        return [
            ['tests/Resources/Payments/refund-success.json', 200],
        ];
    }

    private function refundRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
            'modificationAmount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
        ];
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->technicalCancel(new TechnicalCancelRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/technicalCancel',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->technicalCancel(new TechnicalCancelRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/technicalCancel',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new TechnicalCancelRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalMerchantReference('ORIGINAL_MERCHANT_REFERENCE')
            ->setReference('YOUR_REFERENCE');

        $response = $service->technicalCancel($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->technicalCancelRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613505', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->technicalCancelRequestData();

        $response = $service->technicalCancel(new TechnicalCancelRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613505', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->technicalCancel(
            new TechnicalCancelRequest($this->technicalCancelRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613505', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->technicalCancelWithHttpInfo(
            new TechnicalCancelRequest($this->technicalCancelRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->technicalCancelAsync(
            new TechnicalCancelRequest($this->technicalCancelRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successTechnicalCancelProvider
     */
    public function testTechnicalCancelAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->technicalCancelAsyncWithHttpInfo(
            new TechnicalCancelRequest($this->technicalCancelRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_TECHNICAL_CANCEL_RECEIVED, $response->getResponse());
    }

    public function testTechnicalCancelOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->technicalCancel(
                new TechnicalCancelRequest($this->technicalCancelRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testTechnicalCancelAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->technicalCancelAsync(
                new TechnicalCancelRequest($this->technicalCancelRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successTechnicalCancelProvider(): array
    {
        return [
            ['tests/Resources/Payments/technical-cancel-success.json', 200],
        ];
    }

    private function technicalCancelRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalMerchantReference' => 'ORIGINAL_MERCHANT_REFERENCE',
            'reference' => 'YOUR_REFERENCE',
        ];
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSendsExpectedUrlOnTest(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $response = $service->voidPendingRefund(new VoidPendingRefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v68/voidPendingRefund',
            (string) $request->getUri()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSendsExpectedUrlOnLive(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createLiveConfiguration(), $client);

        $service->voidPendingRefund(new VoidPendingRefundRequest());

        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame(
            'https://mycompany-pal-live.adyenpayments.com/pal/servlet/Payment/v68/voidPendingRefund',
            (string) $request->getUri()
        );
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSuccess(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $request = (new VoidPendingRefundRequest())
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setOriginalReference('8816080397613514')
            ->setReference('YOUR_REFERENCE')
            ->setModificationAmount((new Amount())->setCurrency('EUR')->setValue(1500));

        $response = $service->voidPendingRefund($request);

        self::assertJsonStringEqualsJsonString(
            json_encode($this->voidPendingRefundRequestData(), JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame('8816080397613506', $response->getPspReference());
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSuccessWithArray(string $jsonFile, int $httpStatus): void
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $service = new ModificationsApi($this->createConfiguration(), $client);
        $params = $this->voidPendingRefundRequestData();

        $response = $service->voidPendingRefund(new VoidPendingRefundRequest($params));

        self::assertJsonStringEqualsJsonString(
            json_encode($params, JSON_THROW_ON_ERROR),
            (string) $container[0]['request']->getBody()
        );
        self::assertSame('8816080397613506', $response['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $response['response']);
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSuccessArrayResponse(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $resultArray = $service->voidPendingRefund(
            new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
        )->toArray();

        self::assertIsArray($resultArray);
        self::assertSame('8816080397613506', $resultArray['pspReference']);
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $resultArray['response']);
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        [$response, $statusCode, $headers] = $service->voidPendingRefundWithHttpInfo(
            new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
        );

        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundAsyncSuccessReturnsModel(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->voidPendingRefundAsync(
            new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        $response = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $response->getResponse());
    }

    /**
     * @dataProvider successVoidPendingRefundProvider
     */
    public function testVoidPendingRefundAsyncSuccessWithHttpInfo(string $jsonFile, int $httpStatus): void
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $promise = $service->voidPendingRefundAsyncWithHttpInfo(
            new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
        );

        self::assertInstanceOf(PromiseInterface::class, $promise);
        [$response, $statusCode, $headers] = $promise->wait();
        self::assertInstanceOf(ModificationResult::class, $response);
        self::assertSame($httpStatus, $statusCode);
        self::assertEmpty($headers);
        self::assertSame(ModificationResult::RESPONSE_VOID_PENDING_REFUND_RECEIVED, $response->getResponse());
    }

    public function testVoidPendingRefundOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->voidPendingRefund(
                new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
            );
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public function testVoidPendingRefundAsyncOnErrorResponseThrows(): void
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Payments/invalid-merchant-account.json',
            403
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        try {
            $service->voidPendingRefundAsync(
                new VoidPendingRefundRequest($this->voidPendingRefundRequestData())
            )->wait();
            self::fail('Expected AdyenException to be thrown');
        } catch (AdyenException $exception) {
            $this->assertInvalidMerchantException($exception);
        }
    }

    public static function successVoidPendingRefundProvider(): array
    {
        return [
            ['tests/Resources/Payments/void-pending-refund-success.json', 200],
        ];
    }

    private function voidPendingRefundRequestData(): array
    {
        return [
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'originalReference' => '8816080397613514',
            'reference' => 'YOUR_REFERENCE',
            'modificationAmount' => [
                'currency' => 'EUR',
                'value' => 1500,
            ],
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
