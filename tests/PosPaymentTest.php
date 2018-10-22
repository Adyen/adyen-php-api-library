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

    /**
     * After timeout, an Exception will be returned with code: CURLE_OPERATION_TIMEOUTED
     * @covers \Adyen\HttpClient\CurlClient::handleCurlError
     */
    public function testPosPaymentFailTimeout()
    {
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
