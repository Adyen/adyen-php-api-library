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

namespace Adyen\Tests\Builder;

use Adyen\Service\Builder\OpenInvoice;
use Adyen\Tests\TestCase;

class OpenInvoiceTest extends TestCase
{
    public function testBuildOpenInvoiceLineItem()
    {
        $expectedResult = array(
            'id' => "1",
            'description' => "item-description",
            'amountExcludingTax' => 1000,
            'taxAmount' => 21,
            'taxPercentage' => 10,
            'quantity' => 10,
            'productUrl' => 'product-url',
            'imageUrl' => 'image-url',
            'amountIncludingTax' => 1021,
            'itemCategory' => 'test-category'
        );
        $openInvoice = new OpenInvoice();
        $result = $openInvoice->buildOpenInvoiceLineItem(
            "item-description",
            1000,
            21,
            10,
            10,
            "vat",
            "1",
            'product-url',
            'image-url',
            1021,
            'test-category'
        );
        $this->assertEquals($result, $expectedResult);
    }
}
