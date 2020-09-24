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
 * Copyright (c) 2020 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Integration\Builder;

use Adyen\Service\Builder\Customer;
use Adyen\Tests\TestCase;

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
