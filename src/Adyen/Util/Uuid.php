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
 * Class Uuid
 * @package Adyen\Util
 */
class Uuid
{

    /**
     * Generate a UUID V4
     *
     * @return string
     */
    public static function generateV4()
    {
        $random = openssl_random_pseudo_bytes(32, $isSourceStrong);
        if (false === $isSourceStrong || false === $random) {
            throw new \RuntimeException('openssl_random_pseudo_bytes error');
        }
        $random[6] = chr(ord($random[6]) & 0x0f | 0x40); // set version to 0100
        $random[8] = chr(ord($random[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($random), 4));
    }
}
