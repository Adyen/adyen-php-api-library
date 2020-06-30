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

use Adyen\Util\Currency;

class Refund
{
    /**
     * @param $orderAmount
     * @param string $orderId
     * @param string $originalPspReference
     * @param string $currency
     * @param string $merchantAccount
     *
     * @return array
     */
    public function buildRefundRequest($orderAmount, $orderId, $originalPspReference, $currency, $merchantAccount)
    {
        $currencyConverter = new Currency();
        $amount = $currencyConverter->sanitize($orderAmount, $currency);

        return
            array(
                'originalReference' => $originalPspReference,
                'modificationAmount' => array(
                    'value' => $amount,
                    'currency' => $currency
                ),
                'reference' => $orderId,
                'merchantAccount' => $merchantAccount
            );
    }
}
