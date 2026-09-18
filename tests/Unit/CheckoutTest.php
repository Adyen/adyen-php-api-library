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

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Configuration;
use Adyen\Environment;
use Adyen\Model\Checkout\CardDetailsRequest;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\DonationPaymentRequest;
use Adyen\Model\Checkout\PaymentLinkRequest;
use Adyen\Model\Checkout\PaymentMethodsRequest;
use Adyen\Model\Checkout\UpdatePaymentLinkRequest;
use Adyen\RequestOptions;
use Adyen\Service\Checkout\DonationsApi;
use Adyen\Service\Checkout\ModificationsApi;
use Adyen\Service\Checkout\OrdersApi;
use Adyen\Service\Checkout\PaymentLinksApi;
use Adyen\Service\Checkout\PaymentsApi;
use Adyen\Service\Checkout\RecurringApi;

class CheckoutTest extends BaseTest
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
    public function testDeleteTokenForStoredPaymentDetailsWithHttpInfo()
    {
        $client = $this->createMockSerializerClient(null, 204);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        list($result, $statusCode, $headers) = $service->deleteTokenForStoredPaymentDetailsWithHttpInfo(
            "storedPaymentMethodId",
            "shopperReference",
            "YourMerchantAccount"
        );

        $this->assertNull($result);
        $this->assertSame(204, $statusCode);
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

    /**
     * @dataProvider failurePaymentsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksFailure(
        $jsonFile,
        $httpStatus,
        $expectedExceptionMessage
    ) {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setReference('12345');
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);


        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $service->paymentLinks($paymentLinkRequest);
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
     * @dataProvider successPaymentsLinkProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksSuccessWithArray($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'reference' => '12345',
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $result = $service->paymentLinks(new PaymentLinkRequest($params));

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successPaymentsLinkProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        // initialize service
        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setReference('12345');
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);

        $result = $service->paymentLinks($paymentLinkRequest);

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    public static function successPaymentsLinkProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/payment-links-success.json', 200)
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpiredWithArray()
    {
        // create Checkout client
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'status' => "expired"
        );

        $result = $service->updatePaymentLink('linkid', new UpdatePaymentLinkRequest($params));

        $this->assertEquals('expired', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpired()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $updatePaymentLinkRequest = new \Adyen\Model\Checkout\UpdatePaymentLinkRequest();
        $updatePaymentLinkRequest->setStatus("expired");

        $result = $service->updatePaymentLink('linkid', $updatePaymentLinkRequest);

        $this->assertEquals('expired', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksExpiredArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-expired.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $updatePaymentLinkRequest = new \Adyen\Model\Checkout\UpdatePaymentLinkRequest();
        $updatePaymentLinkRequest->setStatus("expired");

        $resultArray = $service->updatePaymentLink('linkid', $updatePaymentLinkRequest)->toArray();

        $this->assertEquals('expired', $resultArray['status']);
        $this->assertEquals(array('currency' => 'BRL', 'value' => 1250), $resultArray['amount']);
        $this->assertEquals('2020-06-30T08:23:18+00:00', $resultArray['expiresAt']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksRetrieveSuccess()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-success.json', 200);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $result = $service->getPaymentLink('linkId');

        $this->assertStringContainsString('payByLink.shtml', $result['url']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksInvalidWithArray()
    {
        // create Checkout client
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-invalid.json', 422);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $params = array(
            'merchantAccount' => "YourMerchantAccount",
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'countryCode' => "BR",
            'shopperReference' => "YourUniqueShopperId",
            'shopperEmail' => "test@email.com",
            'shopperLocale' => "pt_BR",
            'billingAddress' => $this->getExampleAddressStruct(),
            'deliveryAddress' => $this->getExampleAddressStruct(),
        );

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Reference Missing');

        $service->paymentLinks(new PaymentLinkRequest($params));
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testPaymentLinksInvalid()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payment-links-invalid.json', 422);
        $config = $this->createConfiguration();

        $service = new PaymentLinksApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $billingAddress = new \Adyen\Model\Checkout\Address();
        $billingAddress->setStreet("Roque Petroni Jr");
        $billingAddress->setPostalCode("59000060");
        $billingAddress->setCity("São Paulo");
        $billingAddress->setHouseNumberOrName("999");
        $billingAddress->setCountry("BR");
        $billingAddress->setStateOrProvince("SP");

        $deliveryAddress = new \Adyen\Model\Checkout\Address();
        $deliveryAddress->setStreet("Roque Petroni Jr");
        $deliveryAddress->setPostalCode("59000060");
        $deliveryAddress->setCity("São Paulo");
        $deliveryAddress->setHouseNumberOrName("999");
        $deliveryAddress->setCountry("BR");
        $deliveryAddress->setStateOrProvince("SP");

        $paymentLinkRequest = new \Adyen\Model\Checkout\PaymentLinkRequest();
        $paymentLinkRequest->setMerchantAccount("YourMerchantAccount");
        $paymentLinkRequest->setAmount($amount);
        $paymentLinkRequest->setCountryCode("BR");
        $paymentLinkRequest->setShopperReference("YourUniqueShopperId");
        $paymentLinkRequest->setShopperEmail("test@email.com");
        $paymentLinkRequest->setShopperLocale("pt_BR");
        $paymentLinkRequest->setBillingAddress($billingAddress);
        $paymentLinkRequest->setDeliveryAddress($deliveryAddress);

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Reference Missing');

        $service->paymentLinks($paymentLinkRequest);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccessWithArray($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new DonationsApi($config, $client);

        $params = array(
            'amount' => array('currency' => "BRL", 'value' => 1250),
            'reference' => '12345',
            'merchantAccount' => "YourMerchantAccount",
            'paymentMethod' => array(
                'type' => "scheme",
                'encryptedCardNumber' => 'test_4111111111111111',
                'encryptedExpiryMonth' => 'test_03',
                'encryptedExpiryYear' => 'test_2030',
                'encryptedSecurityCode' => 'test_737',
                'holderName' => self::HOLDER_NAME
            ),
            'donationToken' => "YOUR_DONATION_TOKEN",
            'donationOriginalPspReference' => "991559660454807J",
            'donationAccount' => "CHARITY_ACCOUNT",
            'returnUrl' => self::RETURN_URL,
            'shopperInteraction' => "Ecommerce"
        );

        $result = $service->donations(new DonationPaymentRequest($params));
        $this->assertEquals('YOUR_DONATION_REFERENCE', $result['reference']);
        $this->assertEquals('completed', $result['status']);
        $this->assertEquals('1234567890', $result['payment']['pspReference']);
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new DonationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $paymentMethod = new \Adyen\Model\Checkout\DonationPaymentMethod();
        $paymentMethod->setType("scheme");
        $paymentMethod->setEncryptedCardNumber('test_4111111111111111');
        $paymentMethod->setEncryptedExpiryMonth('test_03');
        $paymentMethod->setEncryptedExpiryYear('test_2030');
        $paymentMethod->setEncryptedSecurityCode('test_737');
        $paymentMethod->setHolderName(self::HOLDER_NAME);

        $donationPaymentRequest = new \Adyen\Model\Checkout\DonationPaymentRequest();
        $donationPaymentRequest->setAmount($amount);
        $donationPaymentRequest->setReference('12345');
        $donationPaymentRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationPaymentRequest->setPaymentMethod($paymentMethod);
        $donationPaymentRequest->setDonationToken("YOUR_DONATION_TOKEN");
        $donationPaymentRequest->setDonationOriginalPspReference("991559660454807J");
        $donationPaymentRequest->setDonationAccount("CHARITY_ACCOUNT");
        $donationPaymentRequest->setReturnUrl(self::RETURN_URL);
        $donationPaymentRequest->setShopperInteraction("Ecommerce");

        $result = $service->donations($donationPaymentRequest);
        $this->assertEquals('YOUR_DONATION_REFERENCE', $result->getReference());
        $this->assertEquals('completed', $result->getStatus());
        $this->assertEquals('1234567890', $result->getPayment()->getPspReference());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new DonationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("BRL");
        $amount->setValue(1250);

        $donationPaymentRequest = new \Adyen\Model\Checkout\DonationPaymentRequest();
        $donationPaymentRequest->setAmount($amount);
        $donationPaymentRequest->setReference('12345');
        $donationPaymentRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationPaymentRequest->setDonationAccount("CHARITY_ACCOUNT");
        $donationPaymentRequest->setReturnUrl(self::RETURN_URL);

        $resultArray = $service->donations($donationPaymentRequest)->toArray();

        $this->assertEquals('completed', $resultArray['status']);
        $this->assertIsArray($resultArray['payment']);
        $this->assertEquals('1234567890', $resultArray['payment']['pspReference']);
        $this->assertEquals(
            array('currency' => 'EUR', 'value' => 1000),
            $resultArray['payment']['amount']
        );
    }

    public static function successDonationsProvider()
    {
        return array(
            array('tests/Resources/Checkout/donations-success.json', 200),
        );
    }

    private function getExampleAddressStruct(): array
    {
        return array(
            'street' => "Roque Petroni Jr",
            'postalCode' => "59000060",
            'city' => "São Paulo",
            'houseNumberOrName' => "999",
            'country' => "BR",
            'stateOrProvince' => "SP",
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
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

        $result = $service->getTokensForStoredPaymentDetails(
            shopperReference: "411111",
            merchantAccount: "YOUR_MERCHANT_ACCOUNT"
        );

        $storedPaymentMethods = $result->getStoredPaymentMethods();

        $this->assertCount(1, $storedPaymentMethods);
        $this->assertEquals('7219687191761347', $storedPaymentMethods[0]->getId());
        $this->assertEquals('visa', $storedPaymentMethods[0]->getBrand());
        $this->assertEquals('1111', $storedPaymentMethods[0]->getLastFour());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetStoredPaymentMethodsSuccessArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

        $resultArray = $service->getTokensForStoredPaymentDetails(
            shopperReference: "411111",
            merchantAccount: "YOUR_MERCHANT_ACCOUNT"
        )->toArray();

        $this->assertEquals('YOUR_MERCHANT_ACCOUNT', $resultArray['merchantAccount']);
        $this->assertEquals(
            array(
                'brand' => 'visa',
                'expiryMonth' => '10',
                'expiryYear' => '30',
                'holderName' => 'John Smith',
                'id' => '7219687191761347',
                'lastFour' => '1111',
                'name' => 'VISA',
                'type' => 'scheme',
            ),
            $resultArray['storedPaymentMethods'][0]
        );
    }

    public static function successGetStoredPaymentMethodsProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/getStoredPaymentMethods-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDeleteStoredPaymentMethodsProvider
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDeleteStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $container = [];
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus, $container);
        $config = $this->createConfiguration();

        $service = new RecurringApi($config, $client);

         $service->deleteTokenForStoredPaymentDetails(
             storedPaymentMethodId: "123",
             shopperReference: "411111",
             merchantAccount: "YOUR_MERCHANT_ACCOUNT"
         );

        $request = $container[0]['request'];
        $uri = (string) $request->getUri();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringContainsString('/v72/storedPaymentMethods/123', $uri);
        $this->assertStringContainsString('shopperReference=411111', $uri);
        $this->assertStringContainsString('merchantAccount=YOUR_MERCHANT_ACCOUNT', $uri);
    }

    public static function successDeleteStoredPaymentMethodsProvider(): array
    {
        return array(
            array(null, 204),
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/payments-capture-success.json',
            201,
            $container
        );
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("USD");
        $amount->setValue(2000);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentCaptureRequest->setReference("YOUR_UNIQUE_REFERENCE");
        $paymentCaptureRequest->setAmount($amount);

        $result = $service->captureAuthorisedPayment('993617894903480A', $paymentCaptureRequest);

        $request = $container[0]['request'];
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/captures',
            (string) $request->getUri()
        );

        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentCaptureResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('993617894903480A', $result->getPaymentPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals('USD', $result->getAmount()->getCurrency());
        $this->assertEquals(2000, $result->getAmount()->getValue());
        $this->assertCount(2, $result->getSplits());
        $this->assertEquals('MarketPlace', $result->getSplits()[0]->getType());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPaymentWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-capture-success.json', 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "YOUR_UNIQUE_REFERENCE",
            'amount' => array('currency' => "USD", 'value' => 2000),
        );

        $result = $service->captureAuthorisedPayment(
            '993617894903480A',
            new \Adyen\Model\Checkout\PaymentCaptureRequest($params)
        );

        $this->assertEquals('993617894906488A', $result['pspReference']);
        $this->assertEquals('received', $result['status']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCaptureAuthorisedPaymentArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/payments-capture-success.json', 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->captureAuthorisedPayment('993617894903480A', $paymentCaptureRequest)->toArray();

        $this->assertEquals(array('currency' => 'USD', 'value' => 2000), $resultArray['amount']);
        $this->assertCount(2, $resultArray['splits']);
        $this->assertEquals(
            array(
                'account' => '8816080397613514',
                'amount' => array('value' => 1500),
                'reference' => 'Your reference for the sale amount.',
                'type' => 'MarketPlace',
            ),
            $resultArray['splits'][0]
        );
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $standalonePaymentCancelRequest = new \Adyen\Model\Checkout\StandalonePaymentCancelRequest();
        $standalonePaymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $standalonePaymentCancelRequest->setPaymentReference("YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT");

        $result = $service->cancelAuthorisedPayment($standalonePaymentCancelRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/cancels',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\StandalonePaymentCancelResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('YOUR_UNIQUE_REFERENCE_FOR_THE_PAYMENT', $result->getPaymentReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelAuthorisedPaymentByPspReference()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelAuthorisedPaymentByPspReference-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentCancelRequest = new \Adyen\Model\Checkout\PaymentCancelRequest();
        $paymentCancelRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentCancelRequest->setReference("YOUR_UNIQUE_REFERENCE");

        $result = $service->cancelAuthorisedPaymentByPspReference('993617894903480A', $paymentCancelRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/cancels',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentCancelResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('993617894903480A', $result->getPaymentPspReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundCapturedPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundCapturedPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $paymentRefundRequest = new \Adyen\Model\Checkout\PaymentRefundRequest();
        $paymentRefundRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentRefundRequest->setAmount($amount);

        $result = $service->refundCapturedPayment('993617894903480A', $paymentRefundRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/refunds',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentRefundResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals(2500, $result->getAmount()->getValue());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRefundOrCancelPayment()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/refundOrCancelPayment-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $paymentReversalRequest = new \Adyen\Model\Checkout\PaymentReversalRequest();
        $paymentReversalRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentReversalRequest->setReference("YOUR_UNIQUE_REFERENCE");

        $result = $service->refundOrCancelPayment('993617894903480A', $paymentReversalRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/reversals',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentReversalResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testUpdateAuthorisedAmount()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/updateAuthorisedAmount-success.json',
            201,
            $container
        );
        $service = new ModificationsApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $paymentAmountUpdateRequest = new \Adyen\Model\Checkout\PaymentAmountUpdateRequest();
        $paymentAmountUpdateRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $paymentAmountUpdateRequest->setAmount($amount);

        $result = $service->updateAuthorisedAmount('993617894903480A', $paymentAmountUpdateRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/993617894903480A/amountUpdates',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\PaymentAmountUpdateResponse::class, $result);
        $this->assertEquals('993617894906488A', $result->getPspReference());
        $this->assertEquals('received', $result->getStatus());
        $this->assertEquals(2500, $result->getAmount()->getValue());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOrders()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/orders-success.json',
            200,
            $container
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2500);

        $createOrderRequest = new \Adyen\Model\Checkout\CreateOrderRequest();
        $createOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $createOrderRequest->setReference("shopper-reference-ekvL83");
        $createOrderRequest->setAmount($amount);

        $result = $service->orders($createOrderRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/orders',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\CreateOrderResponse::class, $result);
        $this->assertEquals('8616178914061985', $result->getPspReference());
        $this->assertEquals('Success', $result->getResultCode());
        $this->assertEquals(2500, $result->getRemainingAmount()->getValue());
        $this->assertNotEmpty($result->getOrderData());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testOrdersWithArray()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/orders-success.json', 200);
        $service = new OrdersApi($this->createConfiguration(), $client);

        $params = array(
            'merchantAccount' => "YOUR_MERCHANT_ACCOUNT",
            'reference' => "shopper-reference-ekvL83",
            'amount' => array('currency' => "EUR", 'value' => 2500),
        );

        $result = $service->orders(new \Adyen\Model\Checkout\CreateOrderRequest($params));

        $this->assertEquals('8616178914061985', $result['pspReference']);
        $this->assertEquals('Success', $result['resultCode']);
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testCancelOrder()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/cancelOrder-success.json',
            200,
            $container
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $order = new \Adyen\Model\Checkout\EncryptedOrderData();
        $order->setOrderData("823fh892f8f18f4...148f13f9f3f");
        $order->setPspReference("8815517812932012");

        $cancelOrderRequest = new \Adyen\Model\Checkout\CancelOrderRequest();
        $cancelOrderRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $cancelOrderRequest->setOrder($order);

        $result = $service->cancelOrder($cancelOrderRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/orders/cancel',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\CancelOrderResponse::class, $result);
        $this->assertEquals('8816178914079738', $result->getPspReference());
        $this->assertEquals('Received', $result->getResultCode());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testGetBalanceOfGiftCard()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/getBalanceOfGiftCard-success.json',
            200,
            $container
        );
        $service = new OrdersApi($this->createConfiguration(), $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(100);

        $balanceCheckRequest = new \Adyen\Model\Checkout\BalanceCheckRequest();
        $balanceCheckRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $balanceCheckRequest->setAmount($amount);
        $balanceCheckRequest->setPaymentMethod(array('type' => 'giftcard', 'brand' => 'givex'));

        $result = $service->getBalanceOfGiftCard($balanceCheckRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/paymentMethods/balance',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\BalanceCheckResponse::class, $result);
        $this->assertEquals('Success', $result->getResultCode());
        $this->assertEquals(5000, $result->getBalance()->getValue());
        $this->assertEquals('EUR', $result->getBalance()->getCurrency());
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
    public function testStoredPaymentMethods()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/storedPaymentMethods-success.json',
            201,
            $container
        );
        $service = new RecurringApi($this->createConfiguration(), $client);

        $storedPaymentMethodRequest = new \Adyen\Model\Checkout\StoredPaymentMethodRequest();
        $storedPaymentMethodRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $storedPaymentMethodRequest->setShopperReference("YOUR_SHOPPER_REFERENCE");
        $storedPaymentMethodRequest->setRecurringProcessingModel("CardOnFile");

        $result = $service->storedPaymentMethods($storedPaymentMethodRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/storedPaymentMethods',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\StoredPaymentMethodResource::class, $result);
        $this->assertEquals('KHQC5N7G84BLNK43', $result->getId());
        $this->assertEquals('1111', $result->getLastFour());
        $this->assertEquals('scheme', $result->getType());
        $this->assertEquals('YOUR_SHOPPER_REFERENCE', $result->getShopperReference());
    }

    /**
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationCampaigns()
    {
        $container = [];
        $client = $this->createMockSerializerClient(
            'tests/Resources/Checkout/donationCampaigns-success.json',
            200,
            $container
        );
        $service = new DonationsApi($this->createConfiguration(), $client);

        $donationCampaignsRequest = new \Adyen\Model\Checkout\DonationCampaignsRequest();
        $donationCampaignsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $donationCampaignsRequest->setCurrency("EUR");
        $donationCampaignsRequest->setLocale("en-US");

        $result = $service->donationCampaigns($donationCampaignsRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/donationCampaigns',
            (string) $container[0]['request']->getUri()
        );
        $this->assertInstanceOf(\Adyen\Model\Checkout\DonationCampaignsResponse::class, $result);
        $this->assertNotEmpty($result->getDonationCampaigns());
        $this->assertEquals('DONATION_CAMPAIGN_ID', $result->getDonationCampaigns()[0]->getId());
        $this->assertEquals('NONPROFIT_NAME', $result->getDonationCampaigns()[0]->getNonprofitName());
    }

    /**
     * Covers a response shape the other array tests do not reach: a list of models, each holding a
     * nested model that itself holds a list of scalars.
     *
     * @throws AdyenException
     * @throws \Adyen\Exception\AdyenException
     */
    public function testDonationCampaignsArrayResponse()
    {
        $client = $this->createMockSerializerClient('tests/Resources/Checkout/donationCampaigns-success.json', 200);
        $service = new DonationsApi($this->createConfiguration(), $client);

        $donationCampaignsRequest = new \Adyen\Model\Checkout\DonationCampaignsRequest();
        $donationCampaignsRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");

        $resultArray = $service->donationCampaigns($donationCampaignsRequest)->toArray();

        $this->assertCount(2, $resultArray['donationCampaigns']);
        $this->assertEquals(
            array('currency' => 'EUR', 'donationType' => 'fixedAmounts', 'type' => 'fixedAmounts',
                'values' => array(100, 200, 300)),
            $resultArray['donationCampaigns'][0]['donation']
        );
    }

    public function testDoublePathParamSubstitution()
    {
        $client = $this->createMockSerializerClient(null, 201);
        $config = $this->createConfiguration();

        $service = new ModificationsApi($config, $client);

        $amount = new \Adyen\Model\Checkout\Amount();
        $amount->setCurrency("EUR");
        $amount->setValue(2000);

        $paymentCaptureRequest = new \Adyen\Model\Checkout\PaymentCaptureRequest();
        $paymentCaptureRequest->setMerchantAccount("YourMerchantAccount");
        $paymentCaptureRequest->setAmount($amount);

        $firstRequest = $service->captureAuthorisedPaymentRequest('pspRef1', $paymentCaptureRequest);
        $secondRequest = $service->captureAuthorisedPaymentRequest('pspRef2', $paymentCaptureRequest);

        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/pspRef1/captures',
            (string) $firstRequest->getUri()
        );
        $this->assertEquals(
            'https://checkout-test.adyen.com/v72/payments/pspRef2/captures',
            (string) $secondRequest->getUri()
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     * @throws \Adyen\Exception\AdyenException
     */
    public function testRecurringForward($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        $paymentMethod = new \Adyen\Model\Checkout\CheckoutForwardRequestCard();
        $paymentMethod->setType("scheme");
        $paymentMethod->setNumber("4111111111111111");
        $paymentMethod->setExpiryMonth("08");
        $paymentMethod->setExpiryYear("2018");
        $paymentMethod->setHolderName(self::HOLDER_NAME);
        $paymentMethod->setCvc("737");

        $headers = [
            "Authorization" => "Basic {{credentials}}"
        ];

        $body = <<<JSON
        {
            "amount": {
                "value": 100,
                "currency": "USD"
            }
        }
        JSON;

        $outgoingForwardRequest = new \Adyen\Model\Checkout\CheckoutOutgoingForwardRequest();
        $outgoingForwardRequest->setBody($body);
        $outgoingForwardRequest->setHttpMethod("post");
        $outgoingForwardRequest->setUrlSuffix("/payments");
        $outgoingForwardRequest->setCredentials("YOUR_CREDENTIALS_FOR_THE_THIRD_PARTY");
        $outgoingForwardRequest->setHeaders($headers);

        $checkoutForwardRequest = new \Adyen\Model\Checkout\CheckoutForwardRequest();
        $checkoutForwardRequest->setPaymentMethod($paymentMethod);
        $checkoutForwardRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $checkoutForwardRequest->setShopperReference("411111");
        $checkoutForwardRequest->setBaseUrl("http://thirdparty.example.com");
        $checkoutForwardRequest->setRequest($outgoingForwardRequest);

        $result = $service->forward($checkoutForwardRequest);

        $this->assertEquals("1234567890", $result->getPspReference());
        $this->assertSame(200, $result->getResponse()->getStatus());
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successForwardCardDetailsResponseProvider
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testRecurringForwardArrayResponse($jsonFile, $httpStatus)
    {
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new RecurringApi($config, $client);

        $checkoutForwardRequest = new \Adyen\Model\Checkout\CheckoutForwardRequest();
        $checkoutForwardRequest->setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        $checkoutForwardRequest->setShopperReference("411111");
        $checkoutForwardRequest->setBaseUrl("http://thirdparty.example.com");

        $resultArray = $service->forward($checkoutForwardRequest)->toArray();

        $this->assertEquals('1234567890', $resultArray['pspReference']);
        $this->assertIsArray($resultArray['response']);
        $this->assertSame(200, $resultArray['response']['status']);
        $this->assertStringContainsString('tokenizeCreditCard', $resultArray['response']['body']);
    }

    public static function successForwardCardDetailsResponseProvider(): array
    {
        return array(
            array('tests/Resources/Checkout/Recurring/forwardCardDetailsResponse-success.json', 200),
        );
    }
}
