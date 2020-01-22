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

use Adyen\AdyenException;

class Sha256Signature
{
    /**
     * @param $hmacKey
     * @param $params
     * @return string
     * @throws AdyenException
     */
    public function generate($hmacKey, $params)
    {
        // validate if hmacKey is provided
        if (empty($hmacKey)) {
            throw new AdyenException("You did not provide a HMAC key");
        }

        // validate if hmacKey contains only hexadecimal chars to be packed with H*
        if (!ctype_xdigit($hmacKey)) {
            throw new AdyenException("Invalid HMAC key: $hmacKey");
        }

        if (empty($params)) {
            throw new AdyenException("You did not provide any parameters");
        }

        if (!is_array($params)) {
            throw new AdyenException("Parameters should be an array");
        }

        // The character escape function
        $escapeVal = function ($val) {
            // escapes `:` and `\` to properly sign data
            return str_replace(':', '\\:', str_replace('\\', '\\\\', $val));
        };

        // Sort the array by key using SORT_STRING order
        ksort($params, SORT_STRING);

        // Generate the signing data string
        $signData = implode(":", array_map($escapeVal, array_merge(array_keys($params), array_values($params))));

        // base64-encode the binary result of the HMAC computation
        $merchantSig = base64_encode(hash_hmac('sha256', $signData, pack("H*", $hmacKey), true));
        return $merchantSig;
    }
}
