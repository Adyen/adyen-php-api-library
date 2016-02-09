<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/6/15
 * Time: 1:07 PM
 */

namespace Adyen;


class RecurringTest extends TestCase
{

    public function testListRecurringContracts()
    {
        // create a payment with a recurring contract
        require_once __DIR__ . '/CreatePaymentRequestTest.php';
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentWithRecurringSuccess();

        // initialize client
        $client = $this->createClient();

        // initialize service
        $service = new Service\Recurring($client);

        $recurring = array('contract' => \Adyen\Contract::RECURRING);
        $params = array('merchantAccount' => $this->getMerchantAccount(), 'recurring' => $recurring, 'shopperReference' => '1');

        $result = $service->listRecurringDetails($params);

        // last email is the one used in the request
        $this->assertEquals($result['lastKnownShopperEmail'], "test@test.nl");

        $cardInResults = false;
        foreach($result['details'] as $detail) {

            if(isset($detail['RecurringDetail']['card']['number']) && $detail['RecurringDetail']['card']['number'] == '1111') {
                $cardInResults = true;
            }
        }

        $this->assertTrue($cardInResults);
    }

}
