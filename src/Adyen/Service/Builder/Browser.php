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

class Browser
{
    /**
     * @param string $userAgent
     * @param string $acceptHeader
     * @param int $screenWidth
     * @param int $screenHeight
     * @param int $colorDepth
     * @param int $timeZoneOffsetß
     * @param string $language
     * @param bool $javaEnabled
     * @param array $request
     * @return array
     * @SuppressWarnings:php:S107
     */
    public function buildBrowserData(
        $userAgent = '',
        $acceptHeader = '',
        $screenWidth = 0,
        $screenHeight = 0,
        $colorDepth = 0,
        $timeZoneOffset = 0,
        $language = '',
        $javaEnabled = false,
        $request = array()
    ) {
        $browserInfo = 'browserInfo';
        if (!empty($userAgent)) {
            $request[$browserInfo]['userAgent'] = $userAgent;
        }

        if (!empty($acceptHeader)) {
            $request[$browserInfo]['acceptHeader'] = $acceptHeader;
        }

        if (!empty($screenWidth)) {
            $request[$browserInfo]['screenWidth'] = $screenWidth;
        }

        if (!empty($screenHeight)) {
            $request[$browserInfo]['screenHeight'] = $screenHeight;
        }

        if (!empty($colorDepth)) {
            $request[$browserInfo]['colorDepth'] = $colorDepth;
        }

        if (!empty($timeZoneOffset)) {
            $request[$browserInfo]['timeZoneOffset'] = $timeZoneOffset;
        }

        if (!empty($language)) {
            $request[$browserInfo]['language'] = $language;
        }

        $request[$browserInfo]['javaEnabled'] = $javaEnabled;

        return $request;
    }
}