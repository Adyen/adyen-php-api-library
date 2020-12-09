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

use Adyen\AdyenException;
use Adyen\Service\Payout;
use Adyen\Tests\TestCase;

class PayoutThirdPartyTest extends TestCase
{
    protected function setUp(): void
    {
        $this->markTestIncomplete('Configure Payout accounts');
    }

    public function testStoreDetailAndSubmitPayoutThirdPartyMissingReference()
    {
        // initialize client
        $client = $this->createPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "bank": {
                "iban": "FR14 2004 1010 0505 0001 3M02 606",
                "ownerName": "John Smith",
                "countryCode": "FR"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);
        $e = null;

        try {
            $result = $service->storeDetailsAndSubmitThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals('Required field \'reference\' is null', $e->getMessage());
    }

    public function testStoreDetailAndSubmitPayoutThirdPartyInvalidIban()
    {
        // initialize client
        $client = $this->createPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "bank": {
                "iban": "4111111111111111",
                "ownerName": "John Smith",
                "countryCode": "FR"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payout-test",
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);
        $e = null;
        try {
            $result = $service->storeDetailsAndSubmitThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }


        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals('Invalid iban', $e->getMessage());
    }
    
    public function testStoreDetailsBankSuccess()
    {
        // initialize client
        $client = $this->createPayoutClient();
    
        // initialize service
        $service = new Payout($client);
    
        $json = '{
              "bank": {
                "iban": "FR14 2004 1010 0505 0001 3M02 606",
                "ownerName": "John Smith",
                "countryCode": "FR"
              },
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';
    
        $params = json_decode($json, true);
    
        try {
            $result = $service->storeDetail($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }
    
        // must exists
        $this->assertTrue(isset($result['resultCode']));
    
        // Assert
        $this->assertEquals('Success', $result['resultCode']);
    
        // return the result so this can be used in other test cases
        return $result;
    }

    public function testStoreDetailAndSubmitPayoutThirdPartySuccess()
    {
        // initialize client
        $client = $this->createPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "bank": {
                "iban": "FR14 2004 1010 0505 0001 3M02 606",
                "ownerName": "John Smith",
                "countryCode": "FR"
              },
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payout-test",
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->storeDetailsAndSubmitThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('[payout-submit-received]', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testSubmitPayoutThirdPartySuccess()
    {
        // initialize client
        $client = $this->createPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payout-test",
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "selectedRecurringDetailReference": "LATEST",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->submitThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['resultCode']));

        // Assert
        $this->assertEquals('[payout-submit-received]', $result['resultCode']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testSubmitPayoutThirdPartyBadRecurringDetailReference()
    {
        // initialize client
        $client = $this->createPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "amount": {
                "value": 1500,
                "currency": "EUR"
              },
              "reference": "payout-test",
              "recurring": {
                "contract": "PAYOUT"
              },
              "shopperEmail": "john.smith@test.com",
              "shopperReference": "johnsmithuniqueid",
              "selectedRecurringDetailReference": "1234",
              "merchantAccount": "' . $this->merchantAccount .'"
            }';

        $params = json_decode($json, true);

        $e = null;
        try {
            $result = $service->submitThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals('PaymentDetail not found', $e->getMessage());
    }

    public function testConfirmPayoutThirdPartySuccess()
    {
        // initialize client
        $client = $this->createReviewPayoutClient();

        $submitted_payout = $this->testSubmitPayoutThirdPartySuccess();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "merchantAccount": "' . $this->merchantAccount .'",
              "originalReference": "'.$submitted_payout['pspReference'].'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->confirmThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['pspReference']));

        // Assert
        $this->assertEquals('[payout-confirm-received]', $result['response']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testConfirmPayoutThirdPartyInvalidReference()
    {
        // initialize client
        $client = $this->createReviewPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "merchantAccount": "' . $this->merchantAccount .'",
              "originalReference": ""
            }';

        $params = json_decode($json, true);
        $e = null;
        try {
            $result = $service->confirmThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // check if exception is correct
        $this->assertEquals(AdyenException::class, get_class($e));
        $this->assertEquals(
            'Original pspReference required for this operation',
            $e->getMessage()
        );
    }

    public function testDeclinePayoutThirdPartySuccess()
    {
        // initialize client
        $client = $this->createReviewPayoutClient();

        $submitted_payout = $this->testSubmitPayoutThirdPartySuccess();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "merchantAccount": "' . $this->merchantAccount .'",
              "originalReference": "'.$submitted_payout['pspReference'].'"
            }';

        $params = json_decode($json, true);

        try {
            $result = $service->declineThirdParty($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['pspReference']));

        // Assert
        $this->assertEquals('[payout-decline-received]', $result['response']);

        // return the result so this can be used in other test cases
        return $result;
    }

    public function testDeclinePayoutThirdPartyInvalidReference()
    {
        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage('Original pspReference required for this operation');
        // initialize client
        $client = $this->createReviewPayoutClient();

        // initialize service
        $service = new Payout($client);

        $json = '{
              "merchantAccount": "' . $this->merchantAccount .'",
              "originalReference": ""
            }';

        $params = json_decode($json, true);
        $service->declineThirdParty($params);
    }
}
