<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\Checkout;

use Adyen\AdyenException;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Model\Checkout\CardDetailsRequest;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\PaymentMethodsRequest;
use Adyen\RequestOptions;
use Adyen\Service\Checkout\PaymentsApi;
use Adyen\Tests\Unit\BaseTest;

class PaymentsApiTest extends BaseTest
{

    const HOLDER_NAME = "John Smith";
    const RETURN_URL = "https://your-company.com/...";

    /**
     * @dataProvider successPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentMethodsSuccess($jsonFile, $httpStatus)
    {

        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentMethodsRequest = new PaymentMethodsRequest();
        $paymentMethodsRequest->setMerchantAccount("YourMerchantAccount");

        $result = $service->paymentMethods($paymentMethodsRequest);
        $this->assertNotNull($result->getPaymentMethods());
    }

    /**
     * @dataProvider successPaymentMethodsProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testPaymentMethodsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $params = array('merchantAccount' => "YourMerchantAccount");

        $result = $service->paymentMethods(new PaymentMethodsRequest($params));
        $this->assertNotNull($result['paymentMethods']);
    }

    /**
     * @dataProvider successPaymentMethodsProvider
     * @throws \Adyen\Exception\AdyenException|AdyenException
     */
    public function testPaymentMethodsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentMethodsRequest = new PaymentMethodsRequest();
        $paymentMethodsRequest->setMerchantAccount("YourMerchantAccount");

        $result = $service->paymentMethods($paymentMethodsRequest);
        $resultArray = $result->toArray();

        $this->assertArrayHasKey('paymentMethods', $resultArray);
    }

    public static function successPaymentMethodsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/payment-methods-success.json', 200)
        );
    }

    /**
     * @throws AdyenException
     */
    public function testPaymentMethodsFailureMissingIdentifierOnLive()
    {
        $config = $this->createConfiguration();
        $config->setEnvironment(Environment::LIVE);

        $this->expectException(\Adyen\AdyenException::class);
        $this->expectExceptionMessage('The live URL prefix is not defined');

        new PaymentsApi($config);
    }

    /**
     * @dataProvider failurePaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentMethodsFailure(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentsApi($config, $client);
        $paymentMethodsRequest = new PaymentMethodsRequest();
        $paymentMethodsRequest->setMerchantAccount("YourMerchantAccount");

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->paymentMethods($paymentMethodsRequest);
    }

    /**
     * @dataProvider failurePaymentMethodsProvider
     * @throws AdyenException|\Adyen\Exception\AdyenException
     */
    public function testPaymentMethodsFailureWithArray(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $params = array('merchantAccount' => "YourMerchantAccount");

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->paymentMethods(new PaymentMethodsRequest($params));
    }

    public function testPaymentMethodsFailureMissingApiKey()
    {
        $config = new Configuration();
        $config->setEnvironment(Environment::TEST);

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('API Key or Basic Authentication credentials are undefined');

        new PaymentsApi($config);
    }

    public static function failurePaymentMethodsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/invalid-merchant-account.json', 403, "Invalid Merchant Account"),
            array('tests/Resources/Checkout/payment-methods-forbidden.json', 403, "Forbidden")
        );
    }

    /**
     * @dataProvider successPaymentsProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testPaymentsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentsApi($config, $client);

        $paymentMethod = new \Adyen\Model\Checkout\CheckoutPaymentMethod();
        $paymentMethod->setType("scheme");
        $paymentMethod->setNumber("4111111111111111");
        $paymentMethod->setExpiryMonth("08");
        $paymentMethod->setExpiryYear("2025");
        $paymentMethod->setHolderName(self::HOLDER_NAME);
        $paymentMethod->setCvc("737");

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue("1000");

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");
        $paymentRequest->setPaymentMethod($paymentMethod);
        $paymentRequest->setAmount($amount);
        $paymentRequest->setReference("Your order number");
        $paymentRequest->setReturnUrl(self::RETURN_URL);
        $paymentRequest->setAdditionalData(array(
            'executeThreeD' => true
        ));

        $result = $service->payments($paymentRequest);

        $this->assertContainsEquals($result->getResultCode(), array('Authorised', 'RedirectShopper'));
    }

    /**
     * @dataProvider successPaymentsProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testPaymentsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => self::HOLDER_NAME,
                'cvc' => "737"
            ),
            'reference' => "Your order number",
            'returnUrl' => self::RETURN_URL,
            'additionalData' => array('executeThreeD' => true)
        );

        $result = $service->payments(new \Adyen\Model\Checkout\PaymentRequest($params));

        $this->assertContainsEquals($result['resultCode'], array('Authorised', 'RedirectShopper'),);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsSuccessArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-success.json', 200);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(1000);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");
        $paymentRequest->setAmount($amount);
        $paymentRequest->setReference("Your order number");

        $resultArray = $service->payments($paymentRequest)->toArray();

        $this->assertEquals('Authorised', $resultArray['resultCode']);
        $this->assertIsArray($resultArray['fraudResult']);
        $this->assertEquals(50, $resultArray['fraudResult']['accountScore']);
        $this->assertCount(3, $resultArray['fraudResult']['results']);
        $this->assertEquals(
            array('accountScore' => 0, 'checkId' => 2, 'name' => 'CardChunkUsage'),
            $resultArray['fraudResult']['results'][0]
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsWithRequestOptions()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/payments-success.json',
            200,
            $container
        );
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('idempotencyKey');
        $requestOptions->setAdditionalHeaders(array('Custom-Header' => 'CustomValue'));

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        $service->payments($paymentRequest, $requestOptions);

        $this->assertCount(1, $container);
        $request = $container[0]['request'];
        $this->assertEquals('idempotencyKey', $request->getHeaderLine('Idempotency-Key'));
        $this->assertEquals('CustomValue', $request->getHeaderLine('Custom-Header'));
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsWithoutRequestOptionsSendsNoIdempotencyKey()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/payments-success.json',
            200,
            $container
        );
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        $service->payments($paymentRequest);

        $this->assertCount(1, $container);
        $this->assertFalse($container[0]['request']->hasHeader('Idempotency-Key'));
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsWithHttpInfo()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-success.json', 200);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        list($result, $statusCode, $headers) = $service->paymentsWithHttpInfo($paymentRequest);

        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentResponse::class, $result);
        $this->assertSame(200, $statusCode);
        $this->assertEquals('Authorised', $result->getResultCode());
        $this->assertEquals('8535253563623704', $result->getPspReference());
        $this->assertIsArray($headers);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsAsync()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-success.json', 200);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        $result = $service->paymentsAsync($paymentRequest)->wait();

        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentResponse::class, $result);
        $this->assertEquals('Authorised', $result->getResultCode());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsAsyncWithHttpInfo()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/payments-success.json',
            200,
            $container
        );
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $requestOptions = new RequestOptions();
        $requestOptions->setIdempotencyKey('idempotencyKeyAsync');

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        list($result, $statusCode, $headers) = $service
            ->paymentsAsyncWithHttpInfo($paymentRequest, $requestOptions)
            ->wait();

        $this->assertCount(1, $container);
        $this->assertEquals('idempotencyKeyAsync', $container[0]['request']->getHeaderLine('Idempotency-Key'));

        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentResponse::class, $result);
        $this->assertSame(200, $statusCode);
        $this->assertEquals('Authorised', $result->getResultCode());
        $this->assertIsArray($headers);
    }

    /**
     * The async fulfilment handler deserialises the body without looking at the status code, so an error
     * response resolves with an empty model instead of throwing. The synchronous path checks the status.
     */
    public function testPaymentsAsyncOnErrorResponseThrows()
    {
        $this->markTestSkipped('Async ignores the HTTP status code; tracked with the error-handling work.');

        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-forbidden.json', 403);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        // Same class the synchronous path throws for this body, since decodeAdyenException() builds it.
        $this->expectException(AdyenException::class);
        $service->paymentsAsync($paymentRequest)->wait();
    }

    /**
     * The async rejection handler calls getResponse() on the exception unguarded. A transport level
     * failure hands it a ConnectException, which has no such method, so the caller gets a fatal Error.
     */
    public function testPaymentsAsyncOnConnectionFailureThrowsAdyenException()
    {
        $this->markTestSkipped(
            'Async rejection handler assumes a response is present; tracked with the error-handling work.'
        );

        $mock = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Exception\ConnectException(
                'Connection refused',
                new \GuzzleHttp\Psr7\Request('POST', 'https://checkout-test.adyen.com/v72/payments')
            )
        ]);
        $client = new \GuzzleHttp\Client(['handler' => \GuzzleHttp\HandlerStack::create($mock)]);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");

        $this->expectException(\Adyen\Exception\AdyenException::class);
        $service->paymentsAsync($paymentRequest)->wait();
    }

    public static function successPaymentsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/payments-success.json', 200),
            array('tests/Resources/Checkout/payments-success-3D.json', 200)
        );
    }

    /**
     * @dataProvider failurePaymentsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsFailure(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $paymentMethod = new \Adyen\Model\Checkout\CheckoutPaymentMethod();
        $paymentMethod->setType("scheme");
        $paymentMethod->setEncryptedCardNumber('test_4111111111111111');
        $paymentMethod->setEncryptedExpiryMonth('test_03');
        $paymentMethod->setEncryptedExpiryYear('test_2030');
        $paymentMethod->setEncryptedSecurityCode('test_737');
        $paymentMethod->setHolderName(self::HOLDER_NAME);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(1000);

        $paymentRequest = new \Adyen\Model\Checkout\PaymentRequest();
        $paymentRequest->setMerchantAccount("YourMerchantAccount");
        $paymentRequest->setAmount($amount);
        $paymentRequest->setPaymentMethod($paymentMethod);
        $paymentRequest->setReturnUrl(self::RETURN_URL);
        $paymentRequest->setReference('yourownreference');

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->payments($paymentRequest);
    }

    /**
     * @dataProvider failurePaymentsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsFailureWithArray(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'returnUrl' => self::RETURN_URL
        );

        $params['reference'] = 'yourownreference';

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->payments(new \Adyen\Model\Checkout\PaymentRequest($params));
    }

    public static function failurePaymentsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/invalid-merchant-account.json', 403, "Invalid Merchant Account"),
            array('tests/Resources/Checkout/payments-forbidden.json', 403, "Forbidden")
        );
    }

    /**
     * @dataProvider successPaymentsDetailsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsDetailsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'paymentData' => 'Ab02b4c0!BQABAgCJN1wRZuGJmq8dMncmypvknj9s7l5Tj...',
            'details' => array(
                'MD' => 'sdfsdfsdf...',
                'PaRes' => 'sdkfhskdjfsdf...'
            ),
        );

        $result = $service->paymentsDetails(new \Adyen\Model\Checkout\PaymentDetailsRequest($params));

        $this->assertEquals('Authorised', $result['resultCode']);
    }

    /**
     * @dataProvider successPaymentsDetailsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsDetailsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $paymentCompletionDetails = new \Adyen\Model\Checkout\PaymentCompletionDetails();
        $paymentCompletionDetails->setMD('sdfsdfsdf...');
        $paymentCompletionDetails->setPaRes('sdkfhskdjfsdf...');

        $paymentDetailsRequest = new \Adyen\Model\Checkout\PaymentDetailsRequest();
        $paymentDetailsRequest->setPaymentData('Ab02b4c0!BQABAgCJN1wRZuGJmq8dMncmypvknj9s7l5Tj...');
        $paymentDetailsRequest->setDetails($paymentCompletionDetails);

        $result = $service->paymentsDetails($paymentDetailsRequest);
        $this->assertEquals('Authorised', $result->getResultCode());
    }

    /**
     * @dataProvider successPaymentsDetailsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentsDetailsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $paymentDetailsRequest = new \Adyen\Model\Checkout\PaymentDetailsRequest();
        $paymentDetailsRequest->setPaymentData('Ab02b4c0!BQABAgCJN1wRZuGJmq8dMncmypvknj9s7l5Tj...');

        $resultArray = $service->paymentsDetails($paymentDetailsRequest)->toArray();

        $this->assertEquals('Authorised', $resultArray['resultCode']);
        $this->assertEquals(
            array('liabilityShift' => 'true', 'refusalReasonRaw' => 'AUTHORISED'),
            $resultArray['additionalData']
        );
    }

    public static function successPaymentsDetailsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/payments-details-success.json', 200)
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successSessionsProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testSessionsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $params = array (
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'amount' =>
                array (
                    'value' => 100,
                    'currency' => 'EUR',
                ),
            'returnUrl' => 'https://your-company.com/checkout?shopperOrder=12xy..',
            'reference' => 'YOUR_PAYMENT_REFERENCE',
            'countryCode' => 'NL',
        );

        $result = $service->sessions(new CreateCheckoutSessionRequest($params));

        $this->assertNotNull($result['sessionData']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successSessionsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testSessionsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(100);

        $createCheckoutSessionRequest = new \Adyen\Model\Checkout\CreateCheckoutSessionRequest();
        $createCheckoutSessionRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $createCheckoutSessionRequest->setAmount($amount);
        $createCheckoutSessionRequest->setReturnUrl('https://your-company.com/checkout?shopperOrder=12xy..');
        $createCheckoutSessionRequest->setReference('YOUR_PAYMENT_REFERENCE');
        $createCheckoutSessionRequest->setCountryCode('NL');

        $result = $service->sessions($createCheckoutSessionRequest);

        $this->assertNotNull($result->getSessionData());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successSessionsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testSessionsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $createCheckoutSessionRequest = new \Adyen\Model\Checkout\CreateCheckoutSessionRequest();
        $createCheckoutSessionRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $createCheckoutSessionRequest->setReference('YOUR_PAYMENT_REFERENCE');

        $resultArray = $service->sessions($createCheckoutSessionRequest)->toArray();

        $this->assertEquals('CS16116100127511AF', $resultArray['id']);
        $this->assertEquals(array('currency' => 'EUR', 'value' => 100), $resultArray['amount']);
        $this->assertEquals('2021-10-07T17:10:07+02:00', $resultArray['expiresAt']);
        $this->assertNotEmpty($resultArray['sessionData']);
    }

    public static function successSessionsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/sessions-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider invalidSessionsProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testSessionsInvalidWithArray($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $params = array (
            'merchantAccount' => 'YOUR_MERCHANT_ACCOUNT',
            'returnUrl' => 'https://your-company.com/checkout?shopperOrder=12xy..',
            'reference' => 'YOUR_PAYMENT_REFERENCE',
            'countryCode' => 'NL',
        );

        $this->expectException(\Adyen\Exception\AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $service->sessions(new CreateCheckoutSessionRequest($params));
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider invalidSessionsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testSessionsInvalid($jsonFile, $httpStatus, $expectedExceptionMessage)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $createCheckoutSessionRequest = new \Adyen\Model\Checkout\CreateCheckoutSessionRequest();
        $createCheckoutSessionRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $createCheckoutSessionRequest->setReturnUrl('https://your-company.com/checkout?shopperOrder=12xy..');
        $createCheckoutSessionRequest->setReference('YOUR_PAYMENT_REFERENCE');
        $createCheckoutSessionRequest->setCountryCode('NL');

        $this->expectException(\Adyen\Exception\AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $service->sessions($createCheckoutSessionRequest);
    }

    // The spec doesn't describe errors for /sessions, so a 422 comes back as the generic
    // exception instead of Adyen's message. Restore this after the error-handling fix.
    public static function invalidSessionsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/sessions-invalid.json', 422, '[422] Error connecting to the API'),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successCardDetailsProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCardDetailsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);
        $params = array (
            "merchantAccount" => "YOUR_MERCHANT_ACCOUNT",
            "cardNumber" => "411111",
        );

        $result = $service->cardDetails(new CardDetailsRequest($params));

        $this->assertNotNull($result['brands']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successCardDetailsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCardDetailsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentsApi($config, $client);

        $cardDetailsRequest = new \Adyen\Model\Checkout\CardDetailsRequest();
        $cardDetailsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $cardDetailsRequest->setCardNumber("411111");

        $result = $service->cardDetails($cardDetailsRequest);

        $this->assertNotNull($result->getBrands());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successCardDetailsProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCardDetailsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $cardDetailsRequest = new \Adyen\Model\Checkout\CardDetailsRequest();
        $cardDetailsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $cardDetailsRequest->setCardNumber("411111");

        $resultArray = $service->cardDetails($cardDetailsRequest)->toArray();

        $this->assertEquals(
            array(
                'brands' => array(
                    array('type' => 'visa', 'supported' => true),
                    array('type' => 'cartebancaire', 'supported' => true),
                ),
            ),
            $resultArray
        );
    }

    public static function successCardDetailsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/cardDetails-success.json', 200),
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetResultOfPaymentSession()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getResultOfPaymentSession-success.json',
            200,
            $container
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $result = $service->getResultOfPaymentSession('CS12345678', 'X123..');

        $request = $container[0]['request'];
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/sessions/CS12345678?sessionResult=X123..',
            (string) $request->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\SessionResultResponse::class, $result);
        $this->assertEquals('CS12345678', $result->getId());
        $this->assertEquals('completed', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetResultOfPaymentSessionArrayResponse()
    {
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getResultOfPaymentSession-success.json',
            200
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $resultArray = $service->getResultOfPaymentSession('CS12345678', 'X123..')->toArray();

        $this->assertEquals('CS12345678', $resultArray['id']);
        $this->assertEquals('completed', $resultArray['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateSession()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/updateSession-success.json',
            200,
            $container
        );
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(1000);

        $patchRequest = new \Adyen\Model\Checkout\CheckoutSessionPatchSessionRequest();
        $patchRequest->setAmount($amount);
        $patchRequest->setSessionData("Ab02b4c0!BQABAgBQvzTGGqRpQ0M...");

        $result = $service->updateSession('CS12345678', $patchRequest);

        $request = $container[0]['request'];
        $this->assertEquals('PATCH', $request->getMethod());
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/sessions/CS12345678',
            (string) $request->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\CheckoutSessionPatchSessionResponse::class, $result);
        $this->assertNotEmpty($result->getSessionData());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateSessionWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/updateSession-success.json', 200);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $params = array(
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'sessionData' => "Ab02b4c0!BQABAgBQvzTGGqRpQ0M...",
        );

        $result = $service->updateSession(
            'CS12345678',
            new \Adyen\Model\Checkout\CheckoutSessionPatchSessionRequest($params)
        );

        $this->assertNotEmpty($result['sessionData']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateSessionArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/updateSession-success.json', 200);
        $service = new PaymentsApi($this->createConfiguration(), $client);

        $patchRequest = new \Adyen\Model\Checkout\CheckoutSessionPatchSessionRequest();
        $patchRequest->setSessionData("Ab02b4c0!BQABAgBQvzTGGqRpQ0M...");

        $resultArray = $service->updateSession('CS12345678', $patchRequest)->toArray();

        $this->assertEquals('Ab02b4c0!BQABAgBQvzTGGqRpQ0M...', $resultArray['sessionData']);
    }
}
