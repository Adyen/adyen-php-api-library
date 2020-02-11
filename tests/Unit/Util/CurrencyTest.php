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
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Util;

class CurrencyTest extends \PHPUnit\Framework\TestCase
{
    public function testFormatAmountThreeDecimals()
    {
        $currencySanitizer = new Currency();
        $amount = 15.021;
        $currency = "TND";
        $formattedAmount = $currencySanitizer->sanitize($amount, $currency);
        $this->assertEquals(15021, $formattedAmount);
    }

    public function testFormatAmountTwoDecimals()
    {
        $currencySanitizer = new Currency();
        $amount = 15.02;
        $currency = "EUR";
        $formattedAmount = $currencySanitizer->sanitize($amount, $currency);
        $this->assertEquals(1502, $formattedAmount);
    }

    public function testFormatAmountZeroDecimals()
    {
        $currencySanitizer = new Currency();
        $amount = 15021;
        $currency = "IDR";
        $formattedAmount = $currencySanitizer->sanitize($amount, $currency);
        $this->assertEquals(15021, $formattedAmount);
    }
}
