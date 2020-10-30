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

use Adyen\Service\Builder\OpenInvoice;
use Adyen\Tests\TestCase;

class OpenInvoiceTest extends TestCase
{
    public function testBuildOpenInvoiceLineItem()
    {
        $expectedResult = array(
            'id' => "1",
            'itemId' => "1",
            'description' => "item-description",
            'amountExcludingTax' => 1000,
            'taxAmount' => 21,
            'taxPercentage' => 10,
            'quantity' => 10,
            'taxCategory' => "vat"

        );
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->buildOpenInvoiceLineItem("item-description", 1000, 21, 10, 10, "vat", "1");
        $this->assertEquals($result, $expectedResult);
    }
}
