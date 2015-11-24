<?php

namespace Adyen\Util;


class Util
{

    public static function calculateSha256Signature($hmacKey, $params)
    {
        // The character escape function
        $escapeval = function($val) {
            return str_replace(':','\\:',str_replace('\\','\\\\',$val));
        };

        // Sort the array by key using SORT_STRING order
        ksort($params, SORT_STRING);

        // Generate the signing data string
        $signData = implode(":",array_map($escapeval,array_merge(array_keys($params), array_values($params))));

        // base64-encode the binary result of the HMAC computation
        $merchantSig = base64_encode(hash_hmac('sha256',$signData,pack("H*" , $hmacKey),true));
        return $merchantSig;
    }


}
