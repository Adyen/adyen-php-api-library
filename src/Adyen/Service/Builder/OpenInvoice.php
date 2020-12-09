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
     * @param string $itemId
     * @return mixed
     */
    public function buildOpenInvoiceLineItem(
        $description,
        $itemAmount,
        $itemVatAmount,
        $itemVatPercentage,
        $numberOfItems,
        $vatCategory,
        $itemId
    ) {
        $lineItem = array();
        // item id is optional
        if (!empty($itemId)) {
            $lineItem['id'] = $itemId;
        }

        $lineItem['description'] = $description;
        $lineItem['amountExcludingTax'] = $itemAmount;
        $lineItem['taxAmount'] = $itemVatAmount;
        $lineItem['taxPercentage'] = $itemVatPercentage;
        $lineItem['quantity'] = $numberOfItems;
        $lineItem['taxCategory'] = $vatCategory;

        return $lineItem;
    }
}
