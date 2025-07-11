<?php declare(strict_types=1);

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\BillingAddress;
use Adyen\Model\Checkout\CardDetailsRequest;
use Adyen\Model\Checkout\CheckoutPaymentMethod;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\DonationPaymentRequest;
use Adyen\Model\Checkout\PaymentDetailsRequest;
use Adyen\Model\Checkout\PaymentLinkRequest;
use Adyen\Model\Checkout\PaymentMethodsRequest;
use Adyen\Model\Checkout\PaymentRequest;
use Adyen\Model\Checkout\PaymentSetupRequest;
use Adyen\Model\Checkout\PaymentVerificationRequest;
use Adyen\Service\Checkout\DonationsApi;
use Adyen\Service\Checkout\PaymentLinksApi;
use Adyen\Service\Checkout\PaymentsApi;
use Adyen\Service\Checkout\RecurringApi;
use Adyen\Model\Checkout\LineItem;

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
     * @dataProvider successPaymentMethodsProvider
     */
    public function testToArrayMethod($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $service = new \Adyen\Service\Checkout\PaymentsApi($client);
        $result = $service->paymentMethods(new PaymentMethodsRequest(null));

        // first function calling to Array
        $func1 = function () use ($result) {
            return $result->toArray();
        };
        // second function calling to json encode + decode
        $func2 = function () use ($result) {
            return json_decode(json_encode($result->jsonSerialize()), true);
        };
        // Assert our to array function is faster
        $this->assertTrue($this->calculateRunTime($func1) < $this->calculateRunTime($func2));
        // And assert that the result is equal to a deep json encode/decode
        $this->assertEquals($result->toArray(), json_decode(json_encode($result->jsonSerialize()), true));
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

    public static function successPaymentSessionProvider()
    {
        return array(
            array('tests/Resources/ModelBasedCheckout/payment-session-success.json', 200)
        );
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

        $service = new DonationsApi($client);

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
     * @throws AdyenException
     */
    public function testDeleteStoredPaymentMethodsSuccess()
    {
        $client = $this->createMockClient(null, 204);

        $service = new RecurringApi($client);

        $service->deleteTokenForStoredPaymentDetails("123");

        $this->assertTrue(true, 'no exception');
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

    public function testNonNullableSettersCanBeNulled()
    {
        $request = new PaymentRequest();
        $request->setChannel('iOS');
        $request->setCheckoutAttemptId('ID');
        $request->setCheckoutAttemptId(null);
        $request->setBillingAddress(new BillingAddress());
        $request->setBillingAddress(null);
        $this->assertEquals($request->getBillingAddress(), null);

        $array = $request->toArray();
        $this->assertFalse(array_key_exists('billingAddress', $array));
        $this->assertFalse(array_key_exists('checkoutAttemptId', $array));

        $jsonString = json_encode($request->jsonSerialize());
        // Assert nulled value is not in serialised string
        $this->assertFalse(strpos($jsonString, 'billingAddress') !== false);
    }

    // test request JSON payload serialization
    public function testJsonSerializationMatchesExpected()
    {
        $amount = new Amount();
        $amount->setCurrency('EUR')->setValue(10000);

        $lineItem1 = new LineItem();
        $lineItem1->setQuantity(1)->setAmountIncludingTax(5000)->setDescription('Sunglasses');
        $lineItem2 = new LineItem();
        $lineItem2->setQuantity(1)->setAmountIncludingTax(5000)->setDescription('Headphones');

        $request = new CreateCheckoutSessionRequest();
        $request
            ->setChannel('Web')
            ->setAmount($amount)
            ->setCountryCode('NL')
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT')
            ->setReference('YOUR_PAYMENT_REFERENCE')
            ->setReturnUrl('https://mycompany.example.org/redirect?orderRef=YOUR_PAYMENT_REFERENCE')
            ->setLineItems([$lineItem1, $lineItem2]);

        $expectedJson = <<<JSON
        {
            "channel": "Web",
            "amount": {
                "currency": "EUR",
                "value": 10000
            },
            "countryCode": "NL",
            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
            "reference": "YOUR_PAYMENT_REFERENCE",
            "returnUrl": "https://mycompany.example.org/redirect?orderRef=YOUR_PAYMENT_REFERENCE",
            "lineItems": [
                {
                    "quantity": 1,
                    "amountIncludingTax": 5000,
                    "description": "Sunglasses"
                },
                {
                    "quantity": 1,
                    "amountIncludingTax": 5000,
                    "description": "Headphones"
                }
            ]
        }
        JSON;

        $actualJson = json_encode($request, JSON_PRETTY_PRINT);

        $this->assertJsonStringEqualsJsonString($expectedJson, $actualJson);
    }
}
