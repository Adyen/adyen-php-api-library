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

namespace Adyen\Tests\Unit\Util;

use Adyen\Util\OpenInvoice;
use PHPUnit\Framework\TestCase;

class OpenInvoiceTest extends TestCase
{
    public function testGetVatCategory()
    {
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->getVatCategory("klarna");
        $this->assertEquals('High', $result);
        $result = $openInvoice->getVatCategory("ideal");
        $this->assertEquals('None', $result);
    }

    public function testIsOpenInvoicePaymentMethod()
    {
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->isOpenInvoicePaymentMethod("klarna");
        $this->assertTrue($result);
        $result = $openInvoice->isOpenInvoicePaymentMethod("wechat");
        $this->assertFalse($result);
    }

    public function testIsAfterPayTouchPaymentMethod()
    {
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->isAfterPayTouchPaymentMethod("afterpaytouch");
        $this->assertTrue($result);
        $result = $openInvoice->isAfterPayTouchPaymentMethod("alipay");
        $this->assertFalse($result);
    }
}
