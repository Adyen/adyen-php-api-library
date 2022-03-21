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
 * Copyright (c) 2022 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit\Util;


use Adyen\Util\ManualCapture;
use PHPUnit\Framework\TestCase;

class ManualCaptureTest extends TestCase
{
    public function paymentMethodsDataProvider()
    {
        return [
            ['boleto', true],
            ['boletobancario_bancodobrazil', true],
            ['boletobancario_santander', true],
            ['boletobancario_hsbc', true],
            ['clearpay', true],
            ['clearpay', true],
            ['clearpay_ES', true],
            ['clearpay_FR', true],
            ['clearpay_GB', true],
            ['clearpay_IT', true],
            ['afterpay', true],
            ['afterpay_b2b', true],
            ['afterpay_DE', true],
            ['afterpay_NL', true],
            ['afterpaytouch', true],
            ['afterpaytouch_US', true],
            ['ratepay', true],
            ['ratepay_AT', true],
            ['ratepay_CH', true],
            ['ratepay_directdebit', true],
            ['ratepay_directdebit_AT', true],
            ['ratepay_directdebit_NL', true],
            ['zip', true],
            ['zip_AU', true],
            ['zip_CA', true]
        ];
    }

    /**
     * @dataProvider paymentMethodsDataProvider
     */
    public function testIsManualCaptureSupported($paymentMethod, $expectedResult)
    {
        $manualCapture = new ManualCapture();
        $actualResult = $manualCapture->isManualCaptureSupported($paymentMethod);
        $this->assertEquals($expectedResult, $actualResult);
    }
}