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
class Payment
{
    /**
     * @param $currencyIso
     * @param $formattedValue
     * @param $reference
     * @param $merchantAccount
     * @param $returnUrl
     * @param array $request
     * @return array
     */
    public function buildPaymentData(
        $currencyIso,
        $formattedValue,
        $reference,
        $merchantAccount,
        $returnUrl,
        $request = array()
    ) {
        $request['amount'] = array(
            'currency' => $currencyIso,
            'value' => $formattedValue
        );

        $request["reference"] = $reference;
        $request['merchantAccount'] = $merchantAccount;
        $request['returnUrl'] = $returnUrl;

        return $request;
    }

    /**
     * @param $paymentMethodType
     * @param string $issuer
     * @param array $request
     * @return array
     */
    public function buildAlternativePaymentMethodData($paymentMethodType, $issuer = '', $request = array())
    {
        $request['paymentMethod']['type'] = $paymentMethodType;

        if (!empty($issuer)) {
            $request['paymentMethod']['issuer'] = $issuer;
        }

        return $request;
    }

    /**
     * @param $origin
     * @param array $request
     * @return array
     */
    public function build3DS2Data(
        $origin,
        $request = array()
    ) {
        // 3DS2 required fields
        $request['additionalData']['allow3DS2'] = true;
        $request['channel'] = 'web';
        $request['origin'] = $origin;

        return $request;
    }
}
