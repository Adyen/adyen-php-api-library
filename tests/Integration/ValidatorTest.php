<?php

namespace Adyen\Tests\Integration;

use Adyen\Service\Validator\CheckoutStateDataValidator;
use Adyen\Tests\TestCase;

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

        $checkoutStateDataValidator = new CheckoutStateDataValidator();
        $result = $checkoutStateDataValidator->getValidatedAdditionalData($params);

        $this->assertTrue(array_key_exists('paymentMethod', $result));
        $this->assertTrue(array_key_exists('billingAddress', $result));
        $this->assertTrue(array_key_exists('shopperName', $result));
        $this->assertTrue(!array_key_exists('WrongData', $result));
    }
}
