<?php

namespace Adyen;

use Adyen\Util\Util;

class PosPaymentTest extends TestCase
{
    public function testCreatePosPaymentSuccess()
    {
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::NORMAL;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauth",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 14.91 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

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
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::NORMAL;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSdeclined",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 1.49 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

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
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::REFUND;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSrefund",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 14.91 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']));
        $this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);
    }

    public function testGetConnectedTerminals()
    {
        // initialize client
        $client = $this->createTerminalCloudAPIClient();

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $json = '{
                    "merchantAccount": "' . $this->settings['merchantAccount'] . '"
                }';

        $params = json_decode($json, true); //Create associative array for passing along

        try {
            $result = $service->getConnectedTerminals($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['uniqueTerminalIds']));
    }

    public function testCreatePosPaymentSuccessWithOneclickQuerystring()
    {
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::NORMAL;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauthWithOneclickQuerystring",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 14.91 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

        $recurringDetails = array(
            'shopperEmail' => "save@oneclick.card",
            'shopperReference' => strval(300),
            'recurringContract' => "ONECLICK"
        );
        $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'] = http_build_query(
            $recurringDetails
        );
        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']));
        $this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);
        try {
            $additionalResponse = json_decode(
                base64_decode($result['SaleToPOIResponse']['PaymentResponse']['Response']['AdditionalResponse']),
                true
            );
            $this->assertNotNull($additionalResponse['additionalData']['recurring.recurringDetailReference']);
        } catch (\Exception $e) {
            $this->fail();
        }
    }

    public function testCreatePosPaymentSuccessWithOneclickBase64()
    {
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        // initialize service
        $service = new Service\PosPayment($client);

        //Set merchantApplication
        $client->setMerchantApplication("merchantPosApplication", "0.0.test");

        //Construct request
        $transactionType = \Adyen\TransactionType::NORMAL;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauthWithOneclickBase64",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 14.91 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

        $recurringDetails = array(
            'shopperEmail' => "save@oneclick.card",
            'shopperReference' => strval(301),
            'recurringContract' => "ONECLICK"
        );
        $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'] = base64_encode(
            json_encode($recurringDetails)
        );
        try {
            $result = $service->runTenderSync($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        $this->assertTrue(isset($result['SaleToPOIResponse']));
        $this->assertEquals('Success', $result['SaleToPOIResponse']['PaymentResponse']['Response']['Result']);
        try {
            $additionalResponse = json_decode(
                base64_decode($result['SaleToPOIResponse']['PaymentResponse']['Response']['AdditionalResponse']),
                true
            );
            $this->assertNotNull($additionalResponse['additionalData']['recurring.recurringDetailReference']);
        } catch (\Exception $e) {
            $this->fail();
        }
    }

    /**
     * After timeout, an Exception will be returned with code: CURLE_OPERATION_TIMEOUTED
     * @covers \Adyen\HttpClient\CurlClient::handleCurlError
     */
    public function testPosPaymentFailTimeout()
    {
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'UNIQUETERMINALID') {
            $this->skipTest("Skipped the test. Configure your POIID in the config");
        }

        // initialize client
        $client = $this->createTerminalCloudAPIClient();
        $client->setTimeout(1);

        // initialize service
        $service = new Service\PosPayment($client);

        //Construct request
        $transactionType = \Adyen\TransactionType::NORMAL;
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . $this->getPOIID() . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POStimeout",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "EUR",
                                    "RequestedAmount": ' . 14.91 . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $transactionType . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

        try {
            $result = $service->runTenderSync($params);
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals(CURLE_OPERATION_TIMEOUTED, $e->getCode());
            $this->validateApiPermission($e);
        }
    }
}
