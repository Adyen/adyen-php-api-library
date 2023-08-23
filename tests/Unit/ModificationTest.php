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

use Adyen\Service\Modification;

class ModificationTest extends TestCaseMock
{
    /**
     * @dataProvider successRefundWithDataProvider
     */
    public function testRefundWithDataSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new Modification($client);

        $params = json_decode(
            '
            {
              "amount": {
                "value":1500,
                "currency":"GBP"
              },
              "selectedRecurringDetailReference":"8315535507322518",
              "shopperReference":"myshopperreference",
              "reference":"myreference",
              "merchantAccount":"mymerchantaccount",
              "recurring":{
                "contract":"RECURRING"
              },
              "shopperInteraction":"ContAuth"
            }',
            true
        );

        $result = $service->refundWithData($params);

        $this->assertContains($result['resultCode'], array('Received'));
    }

    public static function successRefundWithDataProvider()
    {
        return array(
            array('tests/Resources/Modification/refundWithData-success.json', 200),
        );
    }
}
