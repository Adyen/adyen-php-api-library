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
 * Copyright (c) 2019 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Util;

/**
 * Class Util
 * @package Adyen\Util
 * @deprecated
 */
class Util
{
    /**
     * @param $hmacKey
     * @param $params
     * @return string
     * @throws \Adyen\AdyenException
     * @deprecated
     */
    public static function calculateSha256Signature($hmacKey, $params)
    {
        // validate if hmacKey is provided
        if (empty($hmacKey)) {
            throw new \Adyen\AdyenException("You did not provide a HMAC key");
        }

        // validate if hmacKey contains only hexadecimal chars to be packed with H*
        if (!ctype_xdigit($hmacKey)) {
            throw new \Adyen\AdyenException("Invalid HMAC key: $hmacKey");
        }

        if (empty($params)) {
            throw new \Adyen\AdyenException("You did not provide any parameters");
        }

        // The character escape function
        $escapeval = function ($val) {
            return str_replace(':', '\\:', str_replace('\\', '\\\\', $val));
        };

        // Sort the array by key using SORT_STRING order
        ksort($params, SORT_STRING);

        // Generate the signing data string
        $signData = implode(":", array_map($escapeval, array_merge(array_keys($params), array_values($params))));

        // base64-encode the binary result of the HMAC computation
        $merchantSig = base64_encode(hash_hmac('sha256', $signData, pack("H*", $hmacKey), true));
        return $merchantSig;
    }

    /**
     * Return the formatted currency. Adyen accepts the currency in multiple formats.
     * @param $amount
     * @param $currency
     * @return int
     * @deprecated
     */
    public static function formatAmount($amount, $currency)
    {
        switch ($currency) {
            case "CVE":
            case "DJF":
            case "GNF":
            case "IDR":
            case "JPY":
            case "KMF":
            case "KRW":
            case "PYG":
            case "RWF":
            case "UGX":
            case "VND":
            case "VUV":
            case "XAF":
            case "XOF":
            case "XPF":
                $format = 0;
                break;
            case "BHD":
            case "IQD":
            case "JOD":
            case "KWD":
            case "LYD":
            case "OMR":
            case "TND":
                $format = 3;
                break;
            default:
                $format = 2;
        }

        return (int)number_format($amount, $format, '', '');
    }

    /**
     * @param $params
     * @param $hmacKey
     * @return string
     * @throws \Adyen\AdyenException
     * @deprecated
     */
    public static function calculateNotificationHMAC($params, $hmacKey)
    {
        // validate if hmacKey is provided
        if (empty($hmacKey)) {
            throw new \Adyen\AdyenException("You did not provide a HMAC key");
        }

        // validate if hmacKey contains only hexadecimal chars to be packed with H*
        if (!ctype_xdigit($hmacKey)) {
            throw new \Adyen\AdyenException("Invalid HMAC key: $hmacKey");
        }

        if (empty($params)) {
            throw new \Adyen\AdyenException("You did not provide any parameters");
        }

        $dataToSign = self::getNotificationDataToSign($params);

        // base64-encode the binary result of the HMAC computation
        $merchantSig = base64_encode(hash_hmac('sha256', $dataToSign, pack("H*", $hmacKey), true));
        return $merchantSig;
    }

    /**
     * @param $params
     * @return array|string
     * @deprecated
     */
    public static function getNotificationDataToSign($params)
    {
        $pspReference = (!empty($params['pspReference'])) ? $params['pspReference'] : "";
        $originalReference = (!empty($params['originalReference'])) ? $params['originalReference'] : "";
        $merchantAccountCode = (!empty($params['merchantAccountCode'])) ? $params['merchantAccountCode'] : "";
        $merchantReference = (!empty($params['merchantReference'])) ? $params['merchantReference'] : "";
        $value = (!empty($params['amount']['value'])) ? $params['amount']['value'] : "";
        $currency = (!empty($params['amount']['currency'])) ? $params['amount']['currency'] : "";
        $eventCode = (!empty($params['eventCode'])) ? $params['eventCode'] : "";
        $success = (!empty($params['success'])) ? $params['success'] : "";

        $dataToSign = array(
            $pspReference,
            $originalReference,
            $merchantAccountCode,
            $merchantReference,
            $value,
            $currency,
            $eventCode,
            $success
        );

        // The character escape function
        $escapeval = function ($val) {
            return str_replace(':', '\\:', str_replace('\\', '\\\\', $val));
        };

        $dataToSign = implode(":", array_map($escapeval, array_values($dataToSign)));

        return $dataToSign;
    }

    /**
     * @param $params
     * @param $hmacKey
     * @return bool
     * @throws \Adyen\AdyenException
     * @deprecated
     */
    public static function isValidNotificationHMAC($params, $hmacKey)
    {
        if (empty($params["additionalData"]) || empty($params["additionalData"]["hmacSignature"])) {
            throw new \Adyen\AdyenException("You did not provide hmacSignature in additionalData");
        }
        $merchantSign = $params["additionalData"]["hmacSignature"];
        unset($params["additionalData"]);
        $expectedSign = Util::calculateNotificationHMAC($params, $hmacKey);

        return $expectedSign == $merchantSign;
    }
}
