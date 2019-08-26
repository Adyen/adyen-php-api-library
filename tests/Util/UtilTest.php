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

    public function testNotificationRequestItemHmac()
    {
        $params = json_decode('{
	            "pspReference": "pspReference",
	            "originalReference": "originalReference",
	            "merchantAccount": "merchantAccount",
	            "amount": {
	                "value": 100000,
	                "currency": "EUR"
	            },
	            "eventCode": "EVENT",
	            "Success": "true"
	        }', true);
        $key = "DFB1EB5485895CFA84146406857104ABB4CBCABDC8AAF103A624C8F6A3EAAB00";
        $hmacCalculation = Util::calculateSha256Signature($key, $params);
        $expectedHmac = "BI5nfzzHjgJ2RNFbM5wyxWpmJYLwdl7RVFJ8SfXeoZc=";
        $this->assertTrue($hmacCalculation != "");
        $this->assertEquals($hmacCalculation, $expectedHmac);
        $params['additionalData'] = array(
            'hmacSignature' => $hmacCalculation
        );
        $hmacValidate = Util::isValidHmac($params, $key);
        $this->assertTrue($hmacValidate);
    }
}
