<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\CardDetailsRequest;
use Adyen\Model\Checkout\CheckoutPaymentMethod;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\CreatePaymentLinkRequest;
use Adyen\Model\Checkout\DetailsRequest;
use Adyen\Model\Checkout\DonationPaymentRequest;
use Adyen\Model\Checkout\PaymentDetailsRequest;
use Adyen\Model\Checkout\PaymentDonationRequest;
use Adyen\Model\Checkout\PaymentDonationRequestPaymentMethod;
use Adyen\Model\Checkout\PaymentLinkRequest;
use Adyen\Model\Checkout\PaymentMethodsRequest;
use Adyen\Model\Checkout\PaymentRequest;
use Adyen\Model\Checkout\PaymentSetupRequest;
use Adyen\Model\Checkout\PaymentVerificationRequest;
use Adyen\Service\Checkout\ClassicCheckoutSDKApi;
use Adyen\Service\Checkout\PaymentLinksApi;
use Adyen\Service\Checkout\PaymentsApi;
use Adyen\Service\Checkout\RecurringApi;

class ModelBasedCheckoutTest extends TestCaseMock
{
    const HOLDER_NAME = "John Smith";
    const RETURN_URL = "https://your-company.com/...";
    /**
     * @dataProvider successPaymentMethodsProvider
     */
    public function testPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Checkout\PaymentsApi($client);

        $params = array('merchant_account' => "YourMerchantAccount");
        $paymentMethodsRequest = new PaymentMethodsRequest($params);

        $result = $service->paymentMethods($paymentMethodsRequest);
        $this->assertEquals('AliPay', $result->getPaymentMethods()[0]->getName());
    }

    public static function successPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payment-methods-success.json', 200)
        );
    }

    /**
     * @dataProvider successPaymentsProvider
     */
    public function testPaymentsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient(__DIR__ . '/../../' . $jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);

        $params = array(
            'merchant_account' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'payment_method' => array(
                'type' => "scheme",
                'number' => "4111111111111111",
                'expiryMonth' => "08",
                'expiryYear' => "2018",
                'holderName' => self::HOLDER_NAME,
                'cvc' => "737"
            ),
            'reference' => "Your order number",
            'return_url' => self::RETURN_URL,
            'additional_data' => array(
                'execute_three_d' => true
            )
        );
        $result = $service->payments(new PaymentRequest($params));

        $this->assertContains($result->getResultCode(), array('RedirectShopper', 'Authorised'));
    }

    public static function successPaymentsProvider()
    {
        return array(
            array('tests/Resources/Checkout/payments-success.json', 200),
            array('tests/Resources/Checkout/payments-success-3D.json', 200)
        );
    }

    /**
     * @dataProvider successPaymentsDetailsProvider
     */
    public function testPaymentsDetailsSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);

        $params = array(
            'merchant_account' => "YourMerchantAccount",
            'payment_data' => 'Ab02b4c0!BQABAgCJN1wRZuGJmq8dMncmypvknj9s7l5Tj...',
            'details' => array(
                'MD' => 'sdfsdfsdf...',
                'PaRes' => 'sdkfhskdjfsdf...'
            ),
        );

        $result = $service->paymentsDetails(new PaymentDetailsRequest($params));

        $this->assertContains($result->getResultCode(), array('Authorised'));
    }

    public static function successPaymentsDetailsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payments-details-success.json', 200)
        );
    }

    /**
     * @dataProvider successPaymentSessionProvider
     */
    public function testPaymentSessionSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new ClassicCheckoutSDKApi($client);

        $params = array(
            'merchant_account' => "YourMerchantAccount",
            'amount' => array('currency' => "EUR", 'value' => 1000),
            'country_code' => "NL",
            'reference' => "Your order number",
            'return_url' => self::RETURN_URL,
            "sdk_version" => "1.3.0"
        );

        $result = $service->paymentSession(new PaymentSetupRequest($params));

        $this->assertNotNull($result->getPaymentSession());
    }

    public static function successPaymentSessionProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payment-session-success.json', 200)
        );
    }

    /**
     * @dataProvider successPaymentsResultProvider
     */
    public function testPaymentsResultSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new ClassicCheckoutSDKApi($client);

        $params = array(
            'payload' => "YourPayload"
        );

        $result = $service->verifyPaymentResult(new PaymentVerificationRequest($params));

        $this->assertContains($result->getResultCode(), array('Authorised'));
    }

    public static function successPaymentsResultProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payments-result-success.json', 200)
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successPaymentsLinkProvider
     */
    public function testPaymentLinksSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new PaymentLinksApi($client);

        $result = $service->paymentLinks(new PaymentLinkRequest());

        $this->assertEquals(
            'https://checkoutshopper-test.adyen.com/checkoutshopper/payByLink.shtml?d=PL0A6D6846DB347E59',
            $result->getUrl()
        );
    }

    public static function successPaymentsLinkProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payment-links-success.json', 200)
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDonationsProvider
     */
    public function testDonationsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new PaymentsApi($client);

        $result = $service->donations(new DonationPaymentRequest());
        $this->assertStringContainsString($result->getReference(), 'YOUR_DONATION_REFERENCE');
        $this->assertStringContainsString($result->getId(), 'UNIQUE_RESOURCE_ID');
        $this->assertStringContainsString($result->getDonationAccount(), 'CHARITY_ACCOUNT');
    }

    public static function successDonationsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/donations-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successSessionsProvider
     */
    public function testSessionsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new PaymentsApi($client);

        $result = $service->sessions(new CreateCheckoutSessionRequest());

        $this->assertNotNull($result->getSessionData());
        $this->assertEquals("CS16116100127511AF", $result->getId());
    }
    public static function successSessionsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/sessions-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successCardDetailsProvider
     */
    public function testCardDetailsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new PaymentsApi($client);

        $result = $service->cardDetails(new CardDetailsRequest());

        $this->assertNotNull($result->getBrands());
    }

    public static function successCardDetailsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/cardDetails-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successGetStoredPaymentMethodsProvider
     */
    public function testGetStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new RecurringApi($client);

        $result = $service->getTokensForStoredPaymentDetails();

        $this->assertNotNull($result->getStoredPaymentMethods());
        $this->assertEquals("merchantAccount", $result->getMerchantAccount());
    }

    public static function successGetStoredPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/getStoredPaymentMethods-success.json', 200),
        );
    }

    /**
     * @param string $jsonFile
     * @param int $httpStatus
     *
     * @dataProvider successDeleteStoredPaymentMethodsProvider
     */
    public function testDeleteStoredPaymentMethodsSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $service = new RecurringApi($client);

        $service->deleteTokenForStoredPaymentDetails("123");
    }

    public static function successDeleteStoredPaymentMethodsProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/deleteStoredPaymentMethods-success.json', 200),
        );
    }

    public function testPaymentMethodSerialization()
    {
        $amount = new Amount();
        $amount->setValue(100)->setCurrency("EUR");

        $paymentMethod = new CheckoutPaymentMethod();
        $paymentMethod->setType("directEbanking");
        $paymentRequest = new PaymentRequest();
        $paymentRequest->setAmount($amount)
            ->setPaymentMethod($paymentMethod);

        // removed the type checks for oneOf models, as they were not complete. Thus type can be anything that the
        // merchant choose (improvements here would be nice)
        $this->assertEquals($paymentRequest->getPaymentMethod()->getType(), "directEbanking");
    }

    public function testPaymentMethodOverload()
    {
        $amount = new Amount();
        $amount->setValue(100)->setCurrency("EUR");

        $paymentMethod = new CheckoutPaymentMethod();
        $paymentMethod->setType("applepay");
        $paymentMethod->setApplePayToken("applepaytoken");
        $paymentMethod->setGooglePayToken("googlepay");
        $paymentMethod->setAmazonPayToken("token");
        $paymentMethod->setBlikCode("blik");
        // Merchants are able to set all kinds of specific paymentmethod params all in the same paymentMethod class,
        // which means they need to rely on the API/docs/explorer to tell them the correct format.
        $paymentRequest = new PaymentRequest();
        $paymentRequest->setAmount($amount)
            ->setPaymentMethod($paymentMethod);

        $this->assertEquals("applepay", $paymentRequest->getPaymentMethod()->getType());
    }

    /**
     * @dataProvider successPaymentsProviderAction
     */
    public function testPaymentResponseAction($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PaymentsApi($client);
        $result = $service->payments(new PaymentRequest());
        $action = $result->getAction();

        $this->assertNotNull($action);
        $this->assertEquals("url", $action->getUrl());
        $this->assertEquals("ideal", $action->getPaymentMethodType());
        $this->assertEquals("redirect", $action->getType());
        $this->assertEquals("GET", $action->getMethod());
    }

    public static function successPaymentsProviderAction()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payments-action.json', 200)
        );
    }
}
