<?php

namespace Adyen;

use DMS\PHPUnitExtensions\ArraySubset\Assert;

class AbstractResourceTest extends TestCase
{
    /**
     * @var string
     */
    private $className = "Adyen\Service\AbstractResource";

    /**
     * If the allowApplicationInfo is true the applicationInfo Adyen Library should be overwritten with the real values
     *
     * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
     */
    public function testHandleApplicationInfoInRequestShouldOverwriteApplicationInfoAdyenLibraryParams()
    {
        $params = array(
            "applicationInfo" => array(
                "adyenLibrary" => array(
                    "name" => "test",
                    "version" => "test"
                )
            )
        );

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));
        $this->assertSame($mockedClient->getLibraryName(), $result['applicationInfo']['adyenLibrary']['name']);
        $this->assertSame($mockedClient->getLibraryVersion(), $result['applicationInfo']['adyenLibrary']['version']);
    }

    /**
     * If the config adyenPaymentSource is set the applicationInfo adyenPaymentSource should be added to the params
     * If the config externalPlatform is not set the applicationInfo externalPlatform should not be added to the params
     *
     * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
     */
    public function testHandleApplicationInfoInRequestShouldAddApplicationInfoAdyenPaymentSourceToParams()
    {
        $params = array();

        $expectedArraySubset = array(
            "applicationInfo" => array(
                "adyenPaymentSource" => array(
                    "name" => "name-test",
                    "version" => "version-test"
                )
            )
        );

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        $mockedClient->setAdyenPaymentSource("name-test", "version-test");

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));

        $this->assertArrayHasKey("applicationInfo", $result);

        Assert::assertArraySubset($expectedArraySubset, $result);
    }

    /**
     * If the config adyenPaymentSource integrator is set, the applicationInfo adyenPaymentSource integrator should be
     * added to the params.
     *
     * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
     */
    public function testHandleApplicationInfoInRequestShouldAddApplicationInfoAdyenPaymentSourceIntegratorToParams()
    {
        $params = array();

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        $mockedClient->setExternalPlatform("name-test", "version-test", "integrator-test");

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));

        $this->assertArrayHasKey("applicationInfo", $result);
        $this->assertArrayHasKey("externalPlatform", $result["applicationInfo"]);
        $this->assertArrayHasKey("integrator", $result["applicationInfo"]["externalPlatform"]);
    }

    /**
     * If the config adyenPaymentSource integrator is not set,
     * the applicationInfo adyenPaymentSource integrator should
     * not be added to the params.
     *
     * @covers \Adyen\Service\AbstractResource::handleApplicationInfoInRequest
     */
    public function testHandleApplicationInfoInRequestShouldNotAddApplicationInfoAdyenPaymentSourceIntegratorToParams()
    {
        $params = array();

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        $mockedClient->setExternalPlatform("name-test", "version-test");

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequest");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));

        $this->assertArrayHasKey("applicationInfo", $result);
        $this->assertArrayHasKey("externalPlatform", $result["applicationInfo"]);
        $this->assertArrayNotHasKey("integrator", $result["applicationInfo"]["externalPlatform"]);
    }

    public function testHandleApplicationInfoInRequestPOSShouldAddBase64EncodedApplicationInfo()
    {
        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . "POS-432123" . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . "serviceID" . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauth",
                                    "TimeStamp": "' . "time" . '"
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
                                "PaymentType": "' . \Adyen\TransactionType::NORMAL . '"
                            }
                        }
                    }
                }
            ';

        $params = json_decode($json, true); //Create associative array for passing along

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequestPOS");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));
        $resultDecoded = base64_decode($result['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData']);
        $resultArray = json_decode($resultDecoded, true);
        $this->assertArrayHasKey("applicationInfo", $resultArray);
        $this->assertArrayHasKey("adyenLibrary", $resultArray['applicationInfo']);
    }

    public function testHandleApplicationInfoInRequestPOSWithQueryStringSaleToAcquirerDataAddBase64EncodedApplicationInfo()
    {
        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . "POS-432123" . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . "serviceID" . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauthWithOneclickQuerystring",
                                    "TimeStamp": "' . "time" . '"
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
                                "PaymentType": "' . \Adyen\TransactionType::NORMAL . '"
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

        // Add RecurringDetails using querystring
        $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'] = http_build_query(
            $recurringDetails
        );

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequestPOS");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));

        // Base64 decode the result and verify if all fields are still present
        $resultDecoded = base64_decode($result['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData']);
        $resultArray = json_decode($resultDecoded, true);
        $this->assertArrayHasKey("recurringContract", $resultArray);
        $this->assertArrayHasKey("shopperEmail", $resultArray);
        $this->assertArrayHasKey("shopperReference", $resultArray);
        $this->assertArrayHasKey("applicationInfo", $resultArray);
        $this->assertArrayHasKey("adyenLibrary", $resultArray['applicationInfo']);
    }

    /**
     * @test
     * @throws AdyenException
     */
    public function handleApplicationInfoInRequestPOSWithBase64AddBase64EncodedApplicationInfo()
    {
        $json = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "PosTestLibrary",
                            "POIID": "' . "POS-432123" . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . "serviceID" . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "POSauthWithOneclickBase64",
                                    "TimeStamp": "' . "time" . '"
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
                                "PaymentType": "' . \Adyen\TransactionType::NORMAL . '"
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

        // Add RecurringDetails using base64
        $params['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData'] = base64_encode(
            json_encode($recurringDetails)
        );

        // Mock client without the Test ini settings
        $mockedClient = $this->createClientWithoutTestIni();

        // Mock abstract class with mocked client and $paramsToFilter parameters
        $mockedClass = $this->getMockForAbstractClass(
            $this->className,
            array((new \Adyen\Service($mockedClient)), "", true)
        );

        // Get private method as testable public method
        $method = $this->getMethod($this->className, "handleApplicationInfoInRequestPOS");

        // Test against function
        $result = $method->invokeArgs($mockedClass, array($params));

        // Base64 decode the result and verify if all fields are still present
        $resultDecoded = base64_decode($result['SaleToPOIRequest']['PaymentRequest']['SaleData']['SaleToAcquirerData']);
        $resultArray = json_decode($resultDecoded, true);
        $this->assertArrayHasKey("recurringContract", $resultArray);
        $this->assertArrayHasKey("shopperEmail", $resultArray);
        $this->assertArrayHasKey("shopperReference", $resultArray);
        $this->assertArrayHasKey("applicationInfo", $resultArray);
        $this->assertArrayHasKey("adyenLibrary", $resultArray['applicationInfo']);
    }
}
