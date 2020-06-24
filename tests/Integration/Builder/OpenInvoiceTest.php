<?php
namespace Adyen\Tests\Integration\Builder;

use Adyen\Service\Builder\OpenInvoice;
use Adyen\TestCase;

class OpenInvoiceTest extends TestCase
{
    public function testBuildOpenInvoiceLineItem()
    {
        $expectedResult = array(
            'id' => "1",
            'itemId' => 1,
            'description' => "item-description",
            'amountExcludingTax' => 1000,
            'taxAmount' => 21,
            'taxPercentage' => 10,
            'quantity' => 10,
            'taxCategory' => "vat"

        );
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->buildOpenInvoiceLineItem("item-description", 1000, 21, 10, 10, "vat", 1);
        $this->assertEquals($result, $expectedResult);
    }
}
