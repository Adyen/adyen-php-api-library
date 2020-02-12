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

use Adyen\AdyenException;

class Sha256SignatureTest extends \PHPUnit\Framework\TestCase
{
    public function testSha256Invalid()
    {
        $this->expectException('\Adyen\AdyenException');
        $this->expectExceptionMessage('Invalid HMAC key: INVALID');
        $signature = new Sha256Signature();
        $signature->generate("INVALID", array('key' => 'value'));
    }

    public function testSha256()
    {
        $signatureGenerator = new Sha256Signature();
        try {
            $signature = $signatureGenerator->generate("123ABC", array(
                'akey' => 'val\\ue',
                'ckey' => 'val:ue',
                'bkey' => '1'
            ));
            $this->assertEquals("YtbpYcrdbvk0RSVwTwENMzomS0LYtiItMwXhI5tohXs=", $signature);
        } catch (AdyenException $e) {
            $this->fail('Unexpected exception');
        }
    }
}
