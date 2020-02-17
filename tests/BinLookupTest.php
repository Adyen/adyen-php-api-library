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

namespace Adyen;

use Adyen\Util\Util;

class BinLookupTest extends TestCase
{
    public function testValid3dsCard()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\BinLookup($client);

        $json = '{
              "cardNumber": "5454545454545454",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';


        $params = json_decode($json, true);

        $result = $service->get3dsAvailability($params);


        // 4111111111111111 is a valid 3ds card so the result should be true
        $this->assertEquals(true, $result['threeDS2supported']);
    }

    public function testInvalid3dsCard()
    {
        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\BinLookup($client);

        $json = '{
              "cardNumber": "1111111111111111",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';


        $params = json_decode($json, true);

        $result = $service->get3dsAvailability($params);


        // 1111111111111111 is a invalid 3ds card so the result should be false
        $this->assertEquals(false, $result['threeDS2supported']);
    }
}
