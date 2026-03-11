<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\ConfigurationWebhooks\SweepConfigurationNotificationRequest;
use Adyen\Model\AcsWebhooks\AuthenticationNotificationRequest;
use Adyen\Model\AcsWebhooks\RelayedAuthenticationRequest;
use Adyen\Model\RelayedAuthorizationWebhooks\RelayedAuthorisationRequest;
use Adyen\Model\TransactionWebhooks\TransactionNotificationRequestV4;
use Adyen\Model\BalanceWebhooks\BalanceAccountBalanceNotificationRequest;
use Adyen\Model\BalanceWebhooks\ReleasedBlockedBalanceNotificationRequest;
use Adyen\Service\BankingWebhookParser;

class BankingWebhookParserTest extends TestCaseMock
{
    public function testBankingWebhookParser()
    {
        $jsonString = '{ "data": {"balancePlatform":"YOUR_BALANCE_PLATFORM","accountHolder":{"contactDetails":{"address":{"country":"NL","houseNumberOrName":"274","postalCode":"1020CD","street":"Brannan Street"},"email": "s.hopper@example.com","phone": {"number": "+315551231234","type": "mobile"}},"description": "S.Hopper - Staff 123","id": "AH00000000000000000000001","status": "active"}},"environment": "test","type": "balancePlatform.accountHolder.created"}';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getAccountHolderNotificationRequest();
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testBankingWebhookParserBalanceAccount()
    {
        $jsonString = '{"data":{"balancePlatform":"Integration_tools_test","accountId":"BA32272223222H5HVKTBK4MLB","sweep":{"id":"SWPC42272223222H5HVKV6H8C64DP5","schedule":{"type":"balance"},"status":"active","targetAmount":{"currency":"EUR","value":0},"triggerAmount":{"currency":"EUR","value":0},"type":"pull","counterparty":{"balanceAccountId":"BA3227C223222H5HVKT3H9WLC"},"currency":"EUR"}},"environment":"test","type":"balancePlatform.balanceAccountSweep.updated"}';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(SweepConfigurationNotificationRequest::class, get_class($result));
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testBankingWebhookParserAuthenticationRequest()
    {
        $jsonString = '{
          "data": {
            "authentication": {
              "acsTransId": "6a4c1709-a42e-4c7f-96c7-1043adacfc97",
              "challenge": {
                "flow": "OOB_TRIGGER_FL",
                "lastInteraction": "2022-12-22T15:49:03+01:00"
              },
              "challengeIndicator": "01",
              "createdAt": "2022-12-22T15:45:03+01:00",
              "deviceChannel": "app",
              "dsTransID": "a3b86754-444d-46ca-95a2-ada351d3f42c",
              "exemptionIndicator": "lowValue",
              "inPSD2Scope": true,
              "messageCategory": "payment",
              "messageVersion": "2.2.0",
              "riskScore": 0,
              "threeDSServerTransID": "6edcc246-23ee-4e94-ac5d-8ae620bea7d9",
              "transStatus": "Y",
              "type": "challenge"
            },
            "balancePlatform": "YOUR_BALANCE_PLATFORM",
            "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",
            "paymentInstrumentId": "PI3227C223222B5BPCMFXD2XG",
            "purchase": {
              "date": "2022-12-22T15:49:03+01:00",
              "merchantName": "TeaShop_NL",
              "originalAmount": {
                "currency": "EUR",
                "value": 1000
              }
            },
            "status": "authenticated"
          },
          "environment": "test",
          "type": "balancePlatform.authentication.created"
        }';
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(AuthenticationNotificationRequest::class, get_class($result));
        self::assertEquals($webhookParser->getAuthenticationNotificationRequest(), $result);
        $authenticationRequest = new AuthenticationNotificationRequest();
        self::assertEquals(
            $authenticationRequest->getTypeAllowableValues()[0],
            $webhookParser->getAuthenticationNotificationRequest()->getType()
        );
    }

    public function testBankingWebhookParserTransactionV4Webhook()
    {
        $jsonString = file_get_contents("tests/Resources/Notification/transaction-webhook.json", true);
        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(TransactionNotificationRequestV4::class, get_class($result));
        self::assertEquals($webhookParser->getTransactionNotificationRequestV4(), $result);
        $authenticationRequest = new TransactionNotificationRequestV4();
        self::assertEquals(
            $authenticationRequest->getTypeAllowableValues()[0],
            $webhookParser->getTransactionNotificationRequestV4()->getType()
        );
    }

    public function testBankingWebhookParserBalanceAccountBalanceNotificationRequest()
    {
        $jsonString = '{
                         "data": {
                           "balanceAccountId": "BWHS00000000000000000000000001",
                           "balancePlatform": "YOUR_BALANCE_PLATFORM",
                           "balances": {
                             "available": 499900,
                             "pending": 350000,
                             "reserved": 120000,
                             "balance": 470000
                           },
                           "creationDate": "2025-01-19T13:37:38+02:00",
                           "currency": "USD",
                           "settingIds": ["WK1", "WK2"]
                         },
                         "environment": "test",
                         "type": "balancePlatform.balanceAccount.balance.updated"
                       }';

        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(BalanceAccountBalanceNotificationRequest::class, get_class($result));
        self::assertEquals("balancePlatform.balanceAccount.balance.updated", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testRelayedAuthenticationRequest()
    {
        $jsonString = '{
                          "id": "1ea64f8e-d1e1-4b9d-a3a2-3953e385b2c8",
                          "paymentInstrumentId": "PI123ABCDEFGHIJKLMN45678",
                          "purchase": {
                            "date": "2025-03-06T15:17:55Z",
                            "merchantName": "widgetsInc",
                            "originalAmount": {
                              "currency": "EUR",
                              "value": 14548
                            }
                          },
                          "environment": "test",
                          "timestamp": "2025-07-08T02:01:05+02:00",
                          "type": "balancePlatform.authentication.relayed"
                        }';

        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(RelayedAuthenticationRequest::class, get_class($result));
        self::assertEquals("1ea64f8e-d1e1-4b9d-a3a2-3953e385b2c8", $result->getId());
        self::assertEquals("widgetsInc", $result->getPurchase()->getMerchantName());
    }

    public function testBankingWebhookParserReleasedBlockedBalanceNotificationRequest()
    {
        $jsonString = '{
  "data": {
    "accountHolder": {
      "description": "Account holder for retail operations",
      "id": "AH00000000000000000001",
      "reference": "Store_001"
    },
    "amount": {
      "currency": "EUR",
      "value": 25000
    },
    "balanceAccount": {
      "description": "Main operating account",
      "id": "BA00000000000000000001",
      "reference": "OP_ACCT_MAIN"
    },
    "balancePlatform": "YOUR_BALANCE_PLATFORM",
    "batchReference": "BATCH_REF_20250925",
    "blockedBalanceAfter": {
      "currency": "EUR",
      "value": -75000
    },
    "blockedBalanceBefore": {
      "currency": "EUR",
      "value": -100000
    },
    "creationDate": "2025-09-25T14:30:00Z",
    "valueDate": "2025-09-25T14:35:00Z"
  },
  "environment": "test",
  "timestamp": "2025-09-25T14:35:00Z",
  "type": "balancePlatform.balanceAccount.balance.block.released"
}';

        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getReleasedBlockedBalanceNotificationRequest();
        self::assertEquals(ReleasedBlockedBalanceNotificationRequest::class, get_class($result));
        self::assertEquals("balancePlatform.balanceAccount.balance.block.released", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
        self::assertEquals("AH00000000000000000001", $result->getData()->getAccountHolder()->getId());
        self::assertEquals(25000, $result->getData()->getAmount()->getValue());
    }

    public function testBankingWebhookParserRelayedAuthorisationRequest()
    {
        $jsonString = '{
  "accountHolder": {
    "description": "Account holder description",
    "id": "AH123ABCDEFGHIJKLMN456789"
  },
  "amount": {
    "currency": "EUR",
    "value": -2700
  },
  "authCode": "123456",
  "authorisationDecision": {
    "reasonCode": "APPROVED",
    "status": "Authorised",
    "statusCode": "APPROVED"
  },
  "authorisationType": "finalAuthorisation",
  "balanceAccount": {
    "description": "Balance Account Description",
    "id": "BA123ABCDEFGHIJKLMN456789"
  },
  "balanceMutations": [
    {
      "balanceAfter": {
        "currency": "EUR",
        "value": 221163
      },
      "balanceBefore": {
        "currency": "EUR",
        "value": 221190
      },
      "currency": "EUR",
      "mutationAmount": {
        "currency": "EUR",
        "value": -2700
      },
      "type": "AuthorisedOutgoing"
    }
  ],
  "balancePlatform": "TestBalancePlatform",
  "entryMode": "contactless",
  "id": "2ABCBA13456ABCDE",
  "merchantData": {
    "acquirerId": "012345",
    "mcc": "5813",
    "merchantId": "000123450000123",
    "nameLocation": {
      "city": "Amsterdam",
      "country": "NLD",
      "name": "Tea Shop NLD",
      "rawData": "TeaShop_NLD"
    },
    "postalCode": "3333AB"
  },
  "originalAmount": {
    "currency": "EUR",
    "value": -2700
  },
  "paymentInstrument": {
    "balanceAccountId": "BA123ABCDEFGHIJKLMN456789",
    "description": "PaymentInstrument Description",
    "issuingCountryCode": "NL",
    "paymentInstrumentGroupId": "PG3123ABCDEFGHIJKLMN456789",
    "reference": "123456789",
    "status": "active",
    "type": "card",
    "card": {
      "authentication": {
        "email": "john.doe @provider.com"
      },
      "brand": "mc",
      "brandVariant": "mc_debit_bpd",
      "cardholderName": "John Doe",
      "formFactor": "virtual",
      "bin": "555555",
      "expiration": {
        "month": "09",
        "year": "2027"
      },
      "lastFour": "0000",
      "number": "12345ABCDE"
    },
    "id": "PI123ABCDEFGHIJKLMN456789"
  },
  "processingType": "token",
  "reference": "ABCDEFGHIJ",
  "schemeUniqueTransactionId": "ABCDEFU2B1305",
  "transactionRulesResult": {
    "allHardBlockRulesPassed": true,
    "score": 80
  },
  "validationResult": [
    {
      "result": "valid",
      "type": "TransactionValidation"
    },
    {
      "result": "valid",
      "type": "PaymentInstrumentExpirationCheck"
    },
    {
      "result": "valid",
      "type": "BalanceCheck"
    },
    {
      "result": "valid",
      "type": "Screening"
    },
    {
      "result": "valid",
      "type": "RealBalanceAvailable"
    },
    {
      "result": "notValidated",
      "type": "MITAllowedMerchant"
    },
    {
      "result": "valid",
      "type": "PaymentInstrumentFound"
    },
    {
      "result": "valid",
      "type": "TransactionRules"
    },
    {
      "result": "valid",
      "type": "AccountLookup"
    },
    {
      "result": "valid",
      "type": "PaymentInstrumentActive"
    },
    {
      "result": "valid",
      "type": "CardholderAuthentication"
    },
    {
      "result": "valid",
      "type": "PaymentInstrument"
    },
    {
      "result": "valid",
      "type": "CardAuthentication"
    },
    {
      "result": "valid",
      "type": "PartyScreening"
    },
    {
      "result": "valid",
      "type": "InputExpiryDateCheck"
    }
  ],
  "environment": "test",
  "type": "balancePlatform.authorisation.relayed"
}';

        $webhookParser = new BankingWebhookParser($jsonString);
        $result = $webhookParser->getRelayedAuthorisationRequest();
        self::assertEquals(RelayedAuthorisationRequest::class, get_class($result));
        self::assertEquals("2ABCBA13456ABCDE", $result->getId());
        self::assertEquals("ABCDEFGHIJ", $result->getReference());
        self::assertEquals("Authorised", $result->getAuthorisationDecision()->getStatus());
        self::assertEquals("balancePlatform.authorisation.relayed", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }
}
