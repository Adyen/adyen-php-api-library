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

use Adyen\Service\Builder\Payment;
use Adyen\Tests\TestCase;

class PaymentTest extends TestCase
{
    public function testBuildPaymentData()
    {
        $expectedResult = array(
            'amount' => array(
                'value' => 1000,
                'currency' => "EUR"
            ),
            'reference' => "12345",
            'merchantAccount' => "TestMerchantAccount",
            'returnUrl' => "http://url"
        );
        $payment = new Payment();
        $result = $payment->buildPaymentData("EUR", 1000, "12345", "TestMerchantAccount", "http://url");
        $this->assertEquals($result, $expectedResult);
    }

    public function testBuildAlternativePaymentMethodData()
    {
        $expectedResult = array(
            'paymentMethod' => array(
                'type' => 'ideal',
                'issuer' => 'testIssuer'
            )
        );
        $payment = new Payment();
        $result = $payment->buildAlternativePaymentMethodData('ideal', 'testIssuer', array());
        $this->assertEquals($result, $expectedResult);
    }
    public function testBuild3DS2Data()
    {
        $expectedResult = array(
            'additionalData' => array(
                'allow3DS2' => true
            ),
            'channel'=>'web',
            'origin'=>'theorigin'
        );
        $payment = new Payment();
        $result = $payment->build3DS2Data('theorigin', array());
        $this->assertEquals($result, $expectedResult);
    }
}
