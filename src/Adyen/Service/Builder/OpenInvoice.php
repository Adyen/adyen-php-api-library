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
     * @param string $itemId
     * @param string $description
     * @param string $itemCategory
     * @param int $amountExcludingTax
     * @param int $amountIncludingTax
     * @param int $taxAmount
     * @param int $taxPercentage
     * @param int $quantity
     * @param string $productUrl
     * @param string|null $imageUrl
     * @return array
     */
    public function buildOpenInvoiceLineItem(
        string $itemId,
        string $description,
        string $itemCategory,
        int $amountExcludingTax,
        int $amountIncludingTax,
        int $taxAmount,
        int $taxPercentage,
        int $quantity,
        string $productUrl,
        string $imageUrl = null
    ): array {
        $lineItem = array();

        $lineItem['id'] = $itemId;
        $lineItem['description'] = $description;
        $lineItem['itemCategory'] = $itemCategory;
        $lineItem['amountExcludingTax'] = $amountExcludingTax;
        $lineItem['amountIncludingTax'] = $amountIncludingTax;
        $lineItem['taxAmount'] = $taxAmount;
        $lineItem['taxPercentage'] = $taxPercentage;
        $lineItem['quantity'] = $quantity;
        $lineItem['productUrl'] = $productUrl;

        if (isset($imageUrl)) {
            $lineItem['imageUrl'] = $imageUrl;
        }

        return $lineItem;
    }
}
