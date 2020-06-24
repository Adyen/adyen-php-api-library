<?php


namespace Adyen\Service\Builder;


class Browser
{
    /**
     * @var string
     */
    private static $browserInfo = 'browserInfo';

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
            $request[self::$browserInfo]['userAgent'] = $userAgent;
        }

        if (!empty($acceptHeader)) {
            $request[self::$browserInfo]['acceptHeader'] = $acceptHeader;
        }

        if (!empty($screenWidth)) {
            $request[self::$browserInfo]['screenWidth'] = $screenWidth;
        }

        if (!empty($screenHeight)) {
            $request[self::$browserInfo]['screenHeight'] = $screenHeight;
        }

        if (!empty($colorDepth)) {
            $request[self::$browserInfo]['colorDepth'] = $colorDepth;
        }

        if (!empty($timeZoneOffset)) {
            $request[self::$browserInfo]['timeZoneOffset'] = $timeZoneOffset;
        }

        if (!empty($language)) {
            $request[self::$browserInfo]['language'] = $language;
        }

        $request[self::$browserInfo]['javaEnabled'] = $javaEnabled;

        return $request;
    }
}