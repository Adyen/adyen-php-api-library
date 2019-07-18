<?php

namespace Adyen\Tests\Util;

use Adyen\Util\Util;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException        Adyen\AdyenException
     * @expectedExceptionMessage Invalid HMAC key: INVALID
     */
    public function testSha256Invalid() {
        Util::calculateSha256Signature("INVALID", array('key' => 'value'));
    }

    public function testSha256() {
        $signature = Util::calculateSha256Signature("123ABC", array(
            'akey' => 'val\\ue',
            'ckey' => 'val:ue',
            'bkey' => '1'
        ));
        $this->assertEquals("YtbpYcrdbvk0RSVwTwENMzomS0LYtiItMwXhI5tohXs=", $signature);
    }

    public function testFormatAmountThreeDecimals() {
        $amount = 15.021;
        $currency = "TND";
        $formattedAmount = Util::formatAmount($amount, $currency);
        $this->assertEquals(15021, $formattedAmount);
    }

    public function testFormatAmountTwoDecimals() {
        $amount = 15.02;
        $currency = "EUR";
        $formattedAmount = Util::formatAmount($amount, $currency);
        $this->assertEquals(1502, $formattedAmount);
    }

    public function testFormatAmountZeroDecimals() {
        $amount = 15021;
        $currency = "IDR";
        $formattedAmount = Util::formatAmount($amount, $currency);
        $this->assertEquals(15021, $formattedAmount);
    }
}
