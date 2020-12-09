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

namespace Adyen\Tests\Unit;

use Adyen\Service\PosPayment;

class PosPaymentTest extends TestCaseMock
{
    /**
    * @dataProvider resultSuccessGetConnectedTerminals
    */
    public function testGetConnectedTerminalsSuccess($jsonFile, $httpStatus)
    {
        // create client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new PosPayment($client);

        $json = '{
            "merchantAccount": "PME_POS"
        }';

        $params = json_decode($json, true);

        $result = $service->getConnectedTerminals($params);

        $this->assertArrayHasKey('uniqueTerminalIds', $result);
    }

    public static function resultSuccessGetConnectedTerminals()
    {
        return array(
            array('tests/Resources/Payment/connected-terminals.json', 200)
        );
    }
}
