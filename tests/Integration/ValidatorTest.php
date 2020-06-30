<?php


namespace Adyen\Tests\Integration;

use Adyen\TestCase;

class ValidatorTest extends TestCase
{
    public function testCheckoutStateDataValidator()
    {
        $params = array(
            'paymentMethod' => 'ideal',
            'billingAddress' => 'Street 1',
            'shopperName' => 'Smith',
            'WrongData' => 'fake data'
        );

        $checkoutStateDataValidator = new \Adyen\Service\Validator\CheckoutStateDataValidator();
        $result = $checkoutStateDataValidator->getValidatedAdditionalData($params);

        $this->assertTrue(array_key_exists('paymentMethod', $result));
        $this->assertTrue(array_key_exists('billingAddress', $result));
        $this->assertTrue(array_key_exists('shopperName', $result));
        $this->assertTrue(!array_key_exists('WrongData', $result));
    }
}
