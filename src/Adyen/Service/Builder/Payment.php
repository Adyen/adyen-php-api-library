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

class Payment
{
    /**
     * @param $encryptedCardNumber
     * @param $encryptedExpiryMonth
     * @param $encryptedExpiryYear
     * @param $holderName
     * @param $origin
     * @param string $encryptedSecurityCode
     * @param string $paymentMethodType
     * @param bool $storePaymentMethod
     * @param array $request
     * @return array
     */
    public function buildCardData(
        $encryptedCardNumber,
        $encryptedExpiryMonth,
        $encryptedExpiryYear,
        $holderName,
        $origin,
        $encryptedSecurityCode = '',
        $paymentMethodType = 'scheme',
        $storePaymentMethod = false,
        $request = array()
    ) {
        $request['paymentMethod']['type'] = $paymentMethodType;
        $request['paymentMethod']['encryptedCardNumber'] = $encryptedCardNumber;
        $request['paymentMethod']['encryptedExpiryMonth'] = $encryptedExpiryMonth;
        $request['paymentMethod']['encryptedExpiryYear'] = $encryptedExpiryYear;
        $request['paymentMethod']['holderName'] = $holderName;

        // Security code is not required for all card types
        if (!empty($encryptedSecurityCode)) {
            $request['paymentMethod']['encryptedSecurityCode'] = $encryptedSecurityCode;
        }

        // Store card details required fields
        if (true == $storePaymentMethod) {
            $request['storePaymentMethod'] = true;
            $request['shopperInteraction'] = 'Ecommerce';
        }

        $request = $this->build3DS2Data($origin, $request);

        return $request;
    }

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
     * @param $paymentMethodType
     * @param $storedPaymentMethodId
     * @param $origin
     * @param string $encryptedSecurityCode
     * @param array $request
     * @return array
     */
    public function buildStoredPaymentData(
        $paymentMethodType,
        $storedPaymentMethodId,
        $origin,
        $encryptedSecurityCode = '',
        $request = array()
    ) {
        $request['paymentMethod']['type'] = $paymentMethodType;

        $request['paymentMethod']['storedPaymentMethodId'] = $storedPaymentMethodId;

        if (!empty($encryptedSecurityCode)) {
            $request['paymentMethod']['encryptedSecurityCode'] = $encryptedSecurityCode;
        }

        $request = $this->build3DS2Data($origin, $request);

        return $request;
    }

    /**
     * @param $origin
     * @param array $request
     * @return array
     */
    private function build3DS2Data(
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
