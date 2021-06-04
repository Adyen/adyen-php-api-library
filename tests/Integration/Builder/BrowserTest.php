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

namespace Adyen\Tests\Integration\Builder;

use Adyen\Service\Builder\Browser;
use Adyen\Tests\TestCase;

class BrowserTest extends TestCase
{
    public function testBuildBrowserData()
    {

        $expectedResult = array(
            'browserInfo' => array(
                'userAgent' => 'Mozilla/5.0',
                'acceptHeader' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'screenWidth' => '1536',
                'screenHeight' => '723',
                'colorDepth' => '24',
                'timeZoneOffset' => '2',
                'language' => 'nl-NL',
                'javaEnabled'=>true
            )
        );
        $request = array();

        $browser = new Browser();
        $result = $browser->buildBrowserData(
            'Mozilla/5.0',
            'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            '1536',
            '723',
            '24',
            '2',
            'nl-NL',
            true,
            $request
        );
        $this->assertEquals($result, $expectedResult);
    }
}
