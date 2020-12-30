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

namespace Adyen\Tests\Integration;

use Adyen\Tests\TestCase;

class HopTest extends TestCase
{
    public function testGetOnboardingUrl()
    {
        $client = $this->createClient();
        $accountService = new \Adyen\Service\Account($client);
        $hopService = new \Adyen\Service\Hop($client);

        /* Test account holder for the HOP URL test */
        $params = $this->getTestAccountHolder();

        /*
         * Look for an existing TestAccountHolder
         * Otherwise create a new one for the test
         */
        try {
            $accountService->getAccountHolder($params);
        } catch (\Adyen\AdyenException $exception) {
            $accountService->createAccountHolder($params);
        }


        /*
         * Now we have an account holder, generate a HOP
         * URL using the HopService which we are testing
         */
        $params = json_decode(
            '{
                "accountHolderCode":"TestAccountHolderCode2",
                "returnUrl":"https://your.return-url.com/?submerchant=123",
                "platformName":"MyShop.com"
            }',
            true
        );

        $result = $hopService->getOnboardingUrl($params);

        /* Assert result was successful */
        $this->assertEquals("Success", $result['resultCode']);
    }

    private function getTestAccountHolder()
    {
        return json_decode(
            '
            {
              "accountHolderCode": "TestAccountHolderCode2",
              "accountHolderDetails": {
                "email": "john@doe.com",
                "individualDetails": {
                  "name": {
                    "firstName": "John",
                    "gender": "MALE",
                    "lastName": "Doe"
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
    }
}
