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

use Adyen\Service\Modification;
use Adyen\Tests\TestCase;

class ModificationTest extends TestCase
{
    public function testCancelModification()
    {
        // create a payment
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Modification($client);
        $params = array('originalReference' => $pspReference, 'merchantAccount' => $this->merchantAccount);
        $result = $service->cancel($params);

        $this->assertEquals('[cancel-received]', $result['response']);
    }

    public function testRefundModification()
    {
        // create a payment
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Modification($client);

        $modificationAmount = array('currency' => 'EUR', 'value' => '750');

        $params = array(
            "merchantAccount" => $this->merchantAccount,
            "modificationAmount" => $modificationAmount,
            "reference" => $pspReference.'_refund',
            "originalReference" => $pspReference
        );

        $result = $service->refund($params);

        $this->assertEquals('[refund-received]', $result['response']);
    }


    public function testAdjustDecreaseModification()
    {
        // create a payment
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Modification($client);

        $params = array(
            "merchantAccount" => $this->merchantAccount,
            "modificationAmount" => array('currency' => 'EUR', 'value' => '750'),
            "reference" => $pspReference.'_adjustAuthorisation',
            "originalReference" => $pspReference
        );
        
        $result = $service->adjustAuthorisation($params);

        $this->assertEquals('[adjustAuthorisation-received]', $result['response']);
    }

    public function testAdjustIncreaseModification()
    {
        // create a payment
        $test = new CreatePaymentRequestTest();
        $result = $test->testCreatePaymentSuccess();

        $pspReference = $result['pspReference'];

        // create modification
        $client = $this->createClient();

        // initialize service
        $service = new Modification($client);

        $params = array(
            "merchantAccount" => $this->merchantAccount,
            "modificationAmount" => array('currency' => 'EUR', 'value' => '1600'),
            "reference" => $pspReference.'_adjustAuthorisation',
            "originalReference" => $pspReference
        );
        
        $result = $service->adjustAuthorisation($params);

        $this->assertEquals('[adjustAuthorisation-received]', $result['response']);
    }
}
