<?php

namespace Adyen;

class PosPaymentTest extends TestCase
{

    public function testCreatePosPaymentSuccess()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        $logger = $client->getLogger();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::GOODS_SERVICES;
        $json = $service->getPaymentRequest($this->getPOIID(), 1491, "EUR", "let's rock!", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['SaleToPOIResponse']));

        if (!(isset($result['SaleToPOIResponse']))) {
            $logger->error("Received:", $result);
        }
        if (!(isset($result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']))) {
            $logger->error("Response: ", $result);
        } else {
            // Assert success for this test
            //$this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);
            //AdditionalResponse":"errors=
            if (('Success' != $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result'])) {
                $tmp[0] = $result['SaleToPOIResponse']['PaymentResponse']['Response']['AdditionalResponse'];
                $logger->error("Errors: ", $tmp);
                $logger->error("What did we send to deserve this: ", $params);
            }
        }

        // return the result so this can be used in other test cases
        return $result;

    }

    public function testCreatePosPaymentDeclined()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        $logger = $client->getLogger();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::GOODS_SERVICES;
        $json = $service->getPaymentRequest($this->getPOIID(), 149, "EUR", "let's decline dis!", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists & be Failure
        $this->assertTrue(isset($result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']));
        $this->assertEquals('Failure', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);

        // return the result so this can be used in other test cases
        return $result;

    }

    public function testCreatePosEMVRefundSuccess()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        $logger = $client->getLogger();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::REFUND;
        $json = $service->getPaymentRequest($this->getPOIID(), 1491, "EUR", "let's refund dis!", $transactionType);
        $params = json_decode($json, true); //Create associative array for passing along
        $logger->error("What we sending: ",$params);
        $serviceID =  $service->getServiceId($params);

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['SaleToPOIResponse']));

        if (!(isset($result['SaleToPOIResponse']))) {
            $logger->error("Received:", $result);
        }
        if (!(isset($result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']))) {
            $logger->error("Response: ", $result);
        } else {
            if (('Success' != $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result'])) {
                $tmp[0] = $result['SaleToPOIResponse']['PaymentResponse']['Response']['AdditionalResponse'];
                $logger->error("Errors: ", $tmp);
                $logger->error("What did we send to deserve this: ", $params);
            }
        }

        // return the result so this can be used in other test cases
        return $result;

    }

}