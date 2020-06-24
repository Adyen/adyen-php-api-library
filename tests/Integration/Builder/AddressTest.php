<?php

namespace Adyen\Tests\Integration\Builder;


use Adyen\Service\Builder\Address;
use Adyen\TestCase;

class AddressTest extends TestCase
{
    public function testBuildBillingAddress()
    {
        $expectedResult = array(
            'billingAddress' => array(
                'street' => "Blauwbrug",
                'houseNumberOrName' => "33",
                'postalCode' => "1334aa",
                'city' => "Amsterdam",
                'country' => "NL"
            )
        );
        $address = new Address();
        $result = $address->buildBillingAddress("Blauwbrug", "33", "1334aa", "Amsterdam", "", "NL");
        $this->assertEquals($result, $expectedResult);
    }

    public function testBuildDeliveryAddress()
    {
        $expectedResult = array(
            'deliveryAddress' => array(
                'street' => "straat",
                'houseNumberOrName' => "33",
                'postalCode' => "1333aa",
                'city' => "Leiden",
                'country' => "NL"
            )
        );
        $address = new Address();
        $result = $address->buildDeliveryAddress("straat", "33", "1333aa", "Leiden", "", "NL");
        $this->assertEquals($result, $expectedResult);
    }
}
