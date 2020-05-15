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
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Util;

class IpAddressTest extends \PHPUnit\Framework\TestCase
{

    public function testIsAdyenIpAddress()
    {
        $ipAddress = new IpAddress();
        $this->assertFalse($ipAddress->isAdyenIpAddress('127.0.0.1'));
        foreach (\Adyen\Util\IpAddress::HOSTNAMES as $hostname) {
            $this->assertTrue(
                $ipAddress->isAdyenIpAddress(gethostbyname($hostname)),
                sprintf('%s didn\'t resolve to an Adyen server', gethostbyname($hostname))
            );
        }
    }

    public function testGetAdyenIpAddresses(){
        $ipAddress = new IpAddress();
        $this->assertIsArray($ipAddress->getAdyenIpAddresses());
    }

}
