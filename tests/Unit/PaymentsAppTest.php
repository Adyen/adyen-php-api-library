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
 * Copyright (c) 2023 Adyen N.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit;

use Adyen\Service\PaymentsApp\PaymentsAppApi;
use Adyen\Model\PaymentsApp\BoardingTokenRequest;
use Adyen\AdyenException;

class PaymentsAppTest extends TestCaseMock
{
    /**
     * @dataProvider boardingTokenSuccess
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);

        $paymentsAppApi = new PaymentsAppApi($client);

        $json = '{[
            "boardingRequestToken": "mockedRequestToken"
            ]}';
        $params = new BoardingTokenRequest(json_decode($json, true));

        $response = $paymentsAppApi->generatePaymentsAppBoardingTokenForMerchant(
            "MerchantAccount123",
            $params
        );

        $this->assertNotNull($response);
        $this->assertEquals("eyJhYmMxMjMiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c", $response['boardingToken']);
        $this->assertEquals("mockedInstallationId", $response['installationId']);
    }

    /**
     * @dataProvider boardingTokenError
     */
    public function testGeneratePaymentsAppBoardingTokenForMerchantError($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        $json = '{[
            "boardingRequestToken": "mockedRequestToken"
            ]}';
        $params = new BoardingTokenRequest(json_decode($json, true));

        try {
            $paymentsAppApi->generatePaymentsAppBoardingTokenForMerchant(
                "MerchantAccount123",
                $params
            );
            $this->fail(AdyenException::class . " expected");
        } catch (AdyenException $e) {
            $this->assertEquals(403, $e->getStatus()); // Assuming AdyenException has getStatus() or public status $status
            // Assumes the error message from boardingToken-error-403.json contains "PA001"
            $this->assertStringContainsString("PA001", $e->getAdyenErrorCode());
        }
    }

    /**
     * @dataProvider boardingTokenSuccess
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        $json = '{[
            "boardingRequestToken": "mockedRequestToken"
            ]}';
        $params = new BoardingTokenRequest(json_decode($json, true));

        $response = $paymentsAppApi->generatePaymentsAppBoardingTokenForStore(
            "MerchantAccount123",
            "StoreEU",
            $params
        );

        $this->assertNotNull($response);
        $this->assertEquals("eyJhYmMxMjMiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c", $response['boardingToken']);
        $this->assertEquals("mockedInstallationId", $response['installationId']);
    }

    /**
     * @dataProvider boardingTokenError
     */
    public function testGeneratePaymentsAppBoardingTokenForStoreError($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        $json = '{[
            "boardingRequestToken": "mockedRequestToken"
            ]}';
        $params = new BoardingTokenRequest(json_decode($json, true));

        try {
            $paymentsAppApi->generatePaymentsAppBoardingTokenForStore(
                "MerchantAccount123",
                "StoreEU",
                $params
            );
            $this->fail(AdyenException::class . " expected");
        } catch (AdyenException $e) {
            $this->assertEquals(403, $e->getStatus());
            $this->assertStringContainsString("Merchant not permitted for this action.", $e->getMessage());
        }
    }

    /**
     * @dataProvider appListSuccess
     */
    public function testListPaymentsAppForMerchantSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        $response = $paymentsAppApi->listPaymentsAppForMerchant("MerchantAccount123");

        $this->assertNotNull($response);
        $this->assertArrayHasKey('paymentsApps', $response);
        $this->assertNotNull($response['paymentsApps']);
        $this->assertCount(2, $response['paymentsApps']);
    }

    /**
     * @dataProvider appListError
     */
    public function testListPaymentsAppForMerchantError($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        try {
            $paymentsAppApi->listPaymentsAppForMerchant("MerchantAccount123");
            $this->fail(AdyenException::class . " expected");
        } catch (AdyenException $e) {
            $this->assertEquals(500, $e->getStatus());
            // Assumes the error message from paymentsAppList-error-500.json contains "PA002"
            $this->assertStringContainsString("PA002", $e->getAdyenErrorCode());
        }
    }

    /**
     * @dataProvider appListSuccess
     */
    public function testListPaymentsAppForStoreSuccess($jsonFile, $httpStatus)
    {
        $client = $this->createMockClient($jsonFile, $httpStatus);
        $paymentsAppApi = new PaymentsAppApi($client);

        // Assuming the PHP method signature is:
        // listPaymentsAppForStore($merchantId, $storeId, array $queryParameters = null, array $requestOptions = null)
        // For this test, no queryParameters or requestOptions are passed beyond the required ones.
        $response = $paymentsAppApi->listPaymentsAppForStore("MerchantAccount123", "StoreEU");

        $this->assertNotNull($response);
        $this->assertArrayHasKey('paymentsApps', $response);
        $this->assertNotNull($response['paymentsApps']);
        $this->assertCount(2, $response['paymentsApps']);
    }

    public function testRevokePaymentsAppSuccess()
    {
        // Mocking a successful response with no content (HTTP 204)
        $client = $this->createMockClient(
            null, // No response body
            204   // HTTP 204 No Content status
        );
        $paymentsAppApi = new PaymentsAppApi($client);

        // The Adyen PHP client's request method typically returns null if the response body is empty
        // and successfully decoded (json_decode('') === null).
        // The service method for a void operation might return null.
        $result = $paymentsAppApi->revokePaymentsApp("MerchantAccount123", "StoreEU");

        // Assert that no exception was thrown (implicit by reaching this line)
        // and optionally assert the result if a specific return value (like null) is expected.
        $this->assertNull($result);
    }

    public static function boardingTokenSuccess()
    {
        return array(
            array('tests/Resources/PaymentsApp/authorise-success.json', 200),
        );
    }

    public static function boardingTokenError()
    {
        return array(
            array('tests/Resources/PaymentsApp/boardingToken-error-403.json', 403, "Invalid Merchant Account")
        );
    }

    public static function appListSuccess()
    {
        return array(
            array('tests/Resources/PaymentsApp/paymentsAppList-success.json', 200),
        );
    }

    public static function appListError()
    {
        return array(
            array('tests/Resources/PaymentsApp/paymentsAppList-error-500.json', 500, "Error")
        );
    }
}
