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

namespace Adyen\Util;

class IpAddress
{
    const HOSTNAMES = array(
        'out.adyen.com',
        'outgoing1.adyen.com',
        'outgoing2.adyen.com'
    );

    /**
     * Validates if any of the Adyen webhook hostnames resolves to the provided IP address
     *
     * @param string $ipAddress
     * @return bool
     */
    public function isAdyenIpAddress($ipAddress)
    {
        if (!empty($ipAddress) && filter_var($ipAddress, FILTER_VALIDATE_IP, [FILTER_FLAG_IPV4, FILTER_FLAG_IPV6])) {
            $name = gethostbyaddr($ipAddress);
            if (in_array($name, self::HOSTNAMES)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Gets IP addresses for the Adyen webhook hostnames
     *
     * @return string[]
     */
    public function getAdyenIpAddresses()
    {
        $ipAddresses = array();
        foreach (self::HOSTNAMES as $hostname) {
            $ipAddresses = array_merge($ipAddresses, gethostbynamel($hostname));
        }
        return $ipAddresses;
    }
}
