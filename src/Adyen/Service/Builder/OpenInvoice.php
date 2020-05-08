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

namespace Adyen\Service\Builder;

use Tools;

class OpenInvoice
{
    /**
     * Build invoice line items for open invoice payment methods
     *
     * @param string $description
     * @param float $itemAmount
     * @param float $itemVatAmount
     * @param float $itemVatPercentage
     * @param int $numberOfItems
     * @param string $vatCategory
     * @param int $itemId
     * @return mixed
     */
    public function buildOpenInvoiceLineItem(
        $description,
        $itemAmount,
        $itemVatAmount,
        $itemVatPercentage,
        $numberOfItems,
        $vatCategory,
        $itemId = 0
    ) {
        $lineItem = array();
        // item id is optional
        if (0 !== $itemId) {
            $lineItem['id'] = $itemId;
            $lineItem['itemId'] = $itemId;
        }

        $lineItem['description'] = $description;
        $lineItem['amountExcludingTax'] = $itemAmount;
        $lineItem['taxAmount'] = $itemVatAmount;
        $lineItem['taxPercentage'] = $itemVatPercentage;
        $lineItem['quantity'] = $numberOfItems;
        $lineItem['taxCategory'] = $vatCategory;

        return $lineItem;
    }

    /**
     * For Klarna And AfterPay use Vat category High others use none
     *
     * @param $paymentMethod
     * @return string 'High'/'None'
     */
    public function getVatCategory($paymentMethod)
    {
        if ($paymentMethod == "klarna" ||
            Tools::strlen($paymentMethod) >= 9 &&
            Tools::substr($paymentMethod, 0, 9) == 'afterpay_'
        ) {
            return 'High';
        }

        return 'None';
    }
}
