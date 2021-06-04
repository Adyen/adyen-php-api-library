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

use Adyen\Contract;
use Adyen\Service\Recurring;
use Adyen\Tests\TestCase;

class RecurringTest extends TestCase
{
    public function testListRecurringContracts()
    {
        // create a payment with a recurring contract
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentWithRecurringSuccess();

        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Recurring($client);

        $recurring = array('contract' => Contract::RECURRING);
        $params = array(
            'merchantAccount' => $this->getMerchantAccount(),
            'recurring' => $recurring,
            'shopperReference' => '1'
        );

        $result = $service->listRecurringDetails($params);

        // last email is the one used in the request
        $this->assertEquals($result['lastKnownShopperEmail'], 'test@test.nl');

        $cardInResults = false;
        foreach ($result['details'] as $detail) {
            if (isset($detail['RecurringDetail']['card']['number'])
                && $detail['RecurringDetail']['card']['number'] == '1111'
            ) {
                $cardInResults = true;
            }
        }

        $this->assertTrue($cardInResults);
    }
}
