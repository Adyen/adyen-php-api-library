<?php


namespace Adyen\Tests\Integration\Builder;


use Adyen\Service\Builder\Customer;
use Adyen\TestCase;

class CustomerTest extends TestCase
{
    public function testBuildCustomerData()
    {
        $request = array();
        $expectedResult = array(
            'shopperEmail' => 'test@test.com',
            'telephoneNumber' => '80123131231',
            'dateOfBirth' => '01-01-1990',
            'shopperName' => array(
                'gender' => 'male',
                'firstName' => 'John',
                'lastName' => 'Smith'
            ),
            'countryCode' => 'NL'
        );
        $customer = new Customer();
        $result = $customer->buildCustomerData(
            false,
            'test@test.com',
            '80123131231',
            'male',
            '01-01-1990',
            'John',
            'Smith',
            'NL',
            '',
            '',
            '',
            $request
        );
        $this->assertEquals($result, $expectedResult);
    }
}