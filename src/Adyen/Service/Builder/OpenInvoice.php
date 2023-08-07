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

/**
 * @deprecated
 */
class OpenInvoice
{
    /**
     * Build invoice line items for open invoice payment methods
     *
     * Deprecation warning!
     * `taxCategory` parameter was deprecated in Checkout API v69.
     * Argument $vatCategory was kept in order to preserve backward compatibility,
     * but will be removed in the next major release.
     *
     * @param string $description
     * @param int $itemAmount
     * @param int $itemVatAmount
     * @param int $itemVatPercentage
     * @param int $numberOfItems
     * @param string $vatCategory
     * @param string $itemId
     * @param string|null $productUrl
     * @param string|null $imageUrl
     * @param int|null $amountIncludingTax
     * @param int|null $itemCategory
     *
     * @return array
     */
    public function buildOpenInvoiceLineItem(
        $description,
        $itemAmount,
        $itemVatAmount,
        $itemVatPercentage,
        $numberOfItems,
        $vatCategory,
        $itemId,
        $productUrl = null,
        $imageUrl = null,
        $amountIncludingTax = null,
        $itemCategory = null
    ): array {
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

        if (isset($productUrl)) {
            $lineItem['productUrl'] = $productUrl;
        }

        if (isset($imageUrl)) {
            $lineItem['imageUrl'] = $imageUrl;
        }

        if (isset($amountIncludingTax)) {
            $lineItem['amountIncludingTax'] = $amountIncludingTax;
        }

        if (isset($itemCategory)) {
            $lineItem['itemCategory'] = $itemCategory;
        }

        return $lineItem;
    }
}
