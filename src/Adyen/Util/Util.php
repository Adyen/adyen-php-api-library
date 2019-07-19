<?php

namespace Adyen\Util;

class Util
{
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
}
