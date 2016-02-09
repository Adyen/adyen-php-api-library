<?php
/**
 * Created by PhpStorm.
 * User: rikt
 * Date: 11/6/15
 * Time: 2:39 PM
 */

namespace Adyen;


class ModificationTest extends TestCase
{

    public function testCancelModification()
    {
        // create a payment
        require_once __DIR__ . '/CreatePaymentRequestTest.php';
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Service\Modification($client);
        $params = array('originalReference' => $pspReference, 'merchantAccount' => $this->_merchantAccount);
        $result = $service->cancel($params);

        $this->assertEquals('[cancel-received]', $result['response']);

    }

    public function testRefundModification()
    {
        // create a payment
        require_once __DIR__ . '/CreatePaymentRequestTest.php';
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Service\Modification($client);

        $modificationAmount = array('currency' => 'EUR', 'value' => '750');

        $params = array(
            "merchantAccount" => $this->_merchantAccount,
            "modificationAmount" => $modificationAmount,
            "reference" => $pspReference . '_refund',
            "originalReference" => $pspReference
        );

        $result = $service->refund($params);

        $this->assertEquals('[refund-received]', $result['response']);

    }


}
