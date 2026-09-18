<?php declare(strict_types=1);

namespace Adyen\Tests\Unit\Checkout;

use Adyen\AdyenException;
use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\BillingAddress;
use Adyen\Model\Checkout\CheckoutPaymentMethod;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\PaymentRequest;
use Adyen\Service\Checkout\PaymentsApi;
use Adyen\Model\Checkout\LineItem;
use Adyen\Model\Checkout\DeliveryAddress;
use Adyen\Tests\Unit\BaseTest;

class ModelBasedCheckoutTest extends BaseTest
{
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
        $this->assertEquals("directEbanking", $paymentRequest->getPaymentMethod()->getType());
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
     * @throws \Adyen\Exception\AdyenException
     * @throws AdyenException
     */
    public function testPaymentResponseAction($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockSerializerClient($jsonFile, $httpStatus);
        $config = $this->createConfiguration();
        $service = new PaymentsApi($config, $client);

        $result = $service->payments(new PaymentRequest());
        $action = $result->getAction();

        $this->assertNotNull($action);
        $this->assertEquals("url", $action->getUrl());
        $this->assertEquals("ideal", $action->getPaymentMethodType());
        $this->assertEquals("redirect", $action->getType());
        $this->assertEquals("GET", $action->getMethod());
    }

    public static function successPaymentsProviderAction(): array
    {
        return array(
            array('tests/Resources/Checkout/payments-action.json', 200)
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

    # verify usage with strictly typed objects

    /**
     * Test setting and getting DeliveryAddress as an object.
     *
     * @covers \Adyen\Model\Checkout\PaymentRequest::setDeliveryAddress
     * @covers \Adyen\Model\Checkout\PaymentRequest::getDeliveryAddress
     */
    public function testPaymentRequestWithDeliveryAddressObject()
    {
        $paymentRequest = new PaymentRequest();
        $address = new DeliveryAddress();
        $address->setCity("Amsterdam");
        $paymentRequest->setDeliveryAddress($address);
        $deliveryAddress = $paymentRequest->getDeliveryAddress();
        $this->assertInstanceOf(DeliveryAddress::class, $deliveryAddress);
        $this->assertEquals('Amsterdam', $deliveryAddress->getCity());
    }


    /**
     * Test setting and getting DeliveryAddress as an array.
     *
     * @covers \Adyen\Model\Checkout\PaymentRequest::getDeliveryAddress
     */
    public function testPaymentRequestWithDeliveryAddressAsArray()
    {
        $paymentRequest = new PaymentRequest([
            "deliveryAddress" => [
                "city" => "Amsterdam"
            ]
        ]);
        $deliveryAddress = $paymentRequest->getDeliveryAddress();
        $this->assertIsArray($deliveryAddress);
        $this->assertEquals('Amsterdam', $deliveryAddress['city']);
    }
}
