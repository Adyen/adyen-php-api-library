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

namespace Adyen\Unit;

class AccountTest extends TestCaseMock
{
    /**
     * @param $jsonFile
     * @param $httpStatus
     * @dataProvider successAccountCreateProvider
     * @throws \Adyen\AdyenException
     */
    public function testAccountCreateSuccess($jsonFile, $httpStatus)
    {
        // create Checkout client
        $client = $this->createMockClient($jsonFile, $httpStatus);

        // initialize service
        $service = new \Adyen\Service\Account($client);

        $params = json_decode(
            '
            {
              "accountHolderCode": "TestAccountHolderCode",
              "accountHolderDetails": {
                "email": "tim@green.com",
                "individualDetails": {
                  "name": {
                    "firstName": "Tim",
                    "gender": "MALE",
                    "lastName": "Green"
                  }
                },
                "address": {
                  "country": "US"
                }
              },
              "legalEntity": "Individual"
            }',
            true
        );

        $result = $service->createAccount($params);

        $this->assertStringContainsString(
            $result['accountHolderStatus']['status'],
            'Active'
        );
    }

    /**
     * @return array
     */
    public static function successAccountCreateProvider()
    {
        return array(
            array('tests/Resources/Account/create-account-success.json', 200),
        );
    }
}
