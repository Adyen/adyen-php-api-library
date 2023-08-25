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
class Browser
{
    const BROWSER_INFO = 'browserInfo';

    /**
     * @param string $userAgent
     * @param string $acceptHeader
     * @param int $screenWidth
     * @param int $screenHeight
     * @param int $colorDepth
     * @param int $timeZoneOffset
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
        if (!empty($userAgent)) {
            $request[self::BROWSER_INFO]['userAgent'] = $userAgent;
        }

        if (!empty($acceptHeader)) {
            $request[self::BROWSER_INFO]['acceptHeader'] = $acceptHeader;
        }

        if (!empty($screenWidth)) {
            $request[self::BROWSER_INFO]['screenWidth'] = $screenWidth;
        }

        if (!empty($screenHeight)) {
            $request[self::BROWSER_INFO]['screenHeight'] = $screenHeight;
        }

        if (!empty($colorDepth)) {
            $request[self::BROWSER_INFO]['colorDepth'] = $colorDepth;
        }

        if (!empty($timeZoneOffset)) {
            $request[self::BROWSER_INFO]['timeZoneOffset'] = $timeZoneOffset;
        }

        if (!empty($language)) {
            $request[self::BROWSER_INFO]['language'] = $language;
        }

        $request[self::BROWSER_INFO]['javaEnabled'] = $javaEnabled;

        return $request;
    }
}
