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
class Address
{
    /**
     * @var string
     */
    private static $addressTypeBilling = 'billingAddress';

    /**
     * @var string
     */
    private static $addressTypeDelivery = 'deliveryAddress';

    /**
     * @var string
     */
    private static $defaultStreet = 'N/A';

    /**
     * @var string
     */
    private static $defaultPostalCode = '';

    /**
     * @var string
     */
    private static $defaultCity = 'N/A';

    /**
     * @var string
     */
    private static $defaultHouseNumberOrName = '';

    /**
     * @var string
     */
    private static $defaultCountry = 'ZZ';

    /**
     * @param string $street
     * @param string $houseNumberOrName
     * @param string $postalCode
     * @param string $city
     * @param string $stateOrProvince
     * @param string $country
     * @param array $request
     * @return array
     */
    public function buildBillingAddress(
        $street = '',
        $houseNumberOrName = '',
        $postalCode = '',
        $city = '',
        $stateOrProvince = '',
        $country = '',
        $request = array()
    ) {
        return $this->buildAddress(
            self::$addressTypeBilling,
            $street,
            $houseNumberOrName,
            $postalCode,
            $city,
            $stateOrProvince,
            $country,
            $request
        );
    }

    /**
     * @param string $street
     * @param string $houseNumberOrName
     * @param string $postalCode
     * @param string $city
     * @param string $stateOrProvince
     * @param string $country
     * @param array $request
     * @return array
     */
    public function buildDeliveryAddress(
        $street = '',
        $houseNumberOrName = '',
        $postalCode = '',
        $city = '',
        $stateOrProvince = '',
        $country = '',
        $request = array()
    ) {
        return $this->buildAddress(
            self::$addressTypeDelivery,
            $street,
            $houseNumberOrName,
            $postalCode,
            $city,
            $stateOrProvince,
            $country,
            $request
        );
    }

    /**
     * @param string $addressType self::$addressTypeBilling|self::$addressTypeDelivery
     * @param string $street
     * @param string $houseNumberOrName
     * @param string $postalCode
     * @param string $city
     * @param string $stateOrProvince
     * @param string $country
     * @param array $request
     * @return array
     */
    private function buildAddress(
        $addressType,
        $street,
        $houseNumberOrName,
        $postalCode,
        $city,
        $stateOrProvince,
        $country,
        $request
    ) {
        $address = array();
        if (!empty($street)) {
            $address["street"] = $street;
        } else {
            $address["street"] = self::$defaultStreet;
        }

        if (!empty($houseNumberOrName)) {
            $address["houseNumberOrName"] = $houseNumberOrName;
        } else {
            $address["houseNumberOrName"] = self::$defaultHouseNumberOrName;
        }

        if (!empty($postalCode)) {
            $address["postalCode"] = $postalCode;
        } else {
            $address["postalCode"] = self::$defaultPostalCode;
        }

        if (!empty($city)) {
            $address["city"] = $city;
        } else {
            $address["city"] = self::$defaultCity;
        }

        if (!empty($stateOrProvince)) {
            $address["stateOrProvince"] = $stateOrProvince;
        }

        if (!empty($country)) {
            $address["country"] = $country;
        } else {
            $address["country"] = self::$defaultCountry;
        }

        // Assigns the address to billing or delivery address depends on the $addressType parameter
        $request[$addressType] = $address;

        return $request;
    }
}
