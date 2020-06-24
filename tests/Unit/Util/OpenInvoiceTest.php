<?php

namespace Adyen\Util;

class OpenInvoiceTest extends \PHPUnit\Framework\TestCase
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
