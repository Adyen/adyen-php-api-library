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
     * @param stirng $orderId
     * @param stirng $pspReference
     * @param string $currency
     * @param string $merchantAccount
     *
     * @return array
     */
    public function buildRefundRequest($orderAmount, $orderId, $pspReference, $currency, $merchantAccount)
    {
        $currencyConverter = new Currency();
        $amount = $currencyConverter->sanitize($orderAmount, $currency);

        return
            array(
                'originalReference' => $pspReference,
                'modificationAmount' => array(
                    'value' => $amount,
                    'currency' => $currency
                ),
                'reference' => $orderId,
                'merchantAccount' => $merchantAccount
            );
    }
}
