<?php

namespace Adyen;

use Adyen\Util\Util;

class PosPaymentTest extends TestCase
{

    public function testCreatePosPaymentSuccess()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::GOODS_SERVICES;
        $json =  Util::buildPosPaymentRequest($this->getPOIID(), 14.91, "EUR", "POSauth", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along

        // Needed for async calls
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']));
        $this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);

    }

    public function testCreatePosPaymentDeclined()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::GOODS_SERVICES;
        $json =  Util::buildPosPaymentRequest($this->getPOIID(), 1.49, "EUR", "POSdeclined", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along

        // Needed for async calls
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']));
        $this->assertEquals('Failure', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);

    }

    public function testCreatePosEMVRefundSuccess()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::REFUND;
        $json =  Util::buildPosPaymentRequest($this->getPOIID(), 14.91, "EUR", "POSrefund", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along

        // Needed for async calls
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']));
        $this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);

    }

}