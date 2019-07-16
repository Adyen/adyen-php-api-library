<?php
namespace Adyen;

use Adyen\Util\Util;

class CheckoutTest extends TestCase
{
    public function testPaymentMethods()
    {
        $client = $this->createCheckoutAPIClient();

        $service = new Service\Checkout($client);

        $params = array(
            'amount' => 1000,
            'countryCode' => 'NL',
            'shopperLocale' => 'nl_NL',
            'merchantAccount' => $this->merchantAccount,
        );

        $result = $service->paymentMethods($params);

        $this->assertInternalType('array',$result);

        // needs to have Ideal in result because country is netherlands
        $hasIdeal = false;
        foreach($result['paymentMethods'] as $paymentMethod) {
            if($paymentMethod['type'] == 'ideal') {
                $hasIdeal = true;
            }
        }

        $this->assertEquals(true, $hasIdeal);
    }

    public function testBlockedPaymentMethods()
    {
        $client = $this->createCheckoutAPIClient();

        $service = new Service\Checkout($client);

        $params = array(
            'amount' => 1000,
            'countryCode' => 'NL',
            'shopperLocale' => 'nl_NL',
            'merchantAccount' => $this->merchantAccount,
            'blockedPaymentMethods' => array('ideal'),
        );

        $result = $service->paymentMethods($params);

        $this->assertInternalType('array',$result);

        $hasIdeal = false;
        foreach($result['paymentMethods'] as $paymentMethod) {
            if($paymentMethod['type'] == 'ideal') {
                $hasIdeal = true;
            }
        }

        $this->assertFalse($hasIdeal);
    }

    public function testApiCheckoutVersionOverride()
    {
        $overrideApiCheckoutVersion = 'v49';

        $client = $this->createCheckoutAPIClient();

        $service = new Service\Checkout($client);

        // Check that we get the expected default version
        $clientApiCheckoutVersion = $service->getClient()->getApiCheckoutVersion();
        $this->assertEquals($clientApiCheckoutVersion, Client::API_CHECKOUT_VERSION);

        $client->setApiCheckoutVersion($overrideApiCheckoutVersion);

        $service = new Service\Checkout($client);

        // Now check that we get our override version
        $clientApiCheckoutVersion = $service->getClient()->getApiCheckoutVersion();
        $this->assertEquals($clientApiCheckoutVersion, $overrideApiCheckoutVersion);
    }
}
