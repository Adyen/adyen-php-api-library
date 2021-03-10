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
    /** @const */
    public static $HOSTNAMES = array(
        'out.adyen.com',
        'outgoing1.adyen.com',
        'outgoing2.adyen.com'
    );

    /**
     * Gets IP addresses for the Adyen webhook hostnames
     *
     * @return string[]
     */
    public function getAdyenIpAddresses()
    {
        $ipAddresses = array();
        foreach (self::$HOSTNAMES as $hostname) {
            $ipAddressesOfHostName = gethostbynamel($hostname);
            
            // gethostbynamel can return false if hostname could not be resolved
            if (false !== $ipAddressesOfHostName) {
                $ipAddresses = array_merge($ipAddresses, $ipAddressesOfHostName);
            }
        }
        return $ipAddresses;
    }
}
