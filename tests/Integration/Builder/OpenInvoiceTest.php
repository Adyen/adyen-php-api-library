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
            'id' => '1',
            'description' => 'item-description',
            'itemCategory' => 'product-category',
            'amountExcludingTax' => 1000,
            'amountIncludingTax' => 1210,
            'taxAmount' => 210,
            'taxPercentage' => 21,
            'quantity' => 10,
            'productUrl' => 'http://localhost/producturl.html',
            'imageUrl' => 'http://localhost/imageurl.jpg'
        );

        $openInvoice = new OpenInvoice();
        $result = $openInvoice->buildOpenInvoiceLineItem(
            '1',
            'item-description',
            'product-category',
            1000,
            1210,
            210,
            21,
            10,
            'http://localhost/producturl.html',
            'http://localhost/imageurl.jpg'
        );

        $this->assertEquals($result, $expectedResult);
    }
}
