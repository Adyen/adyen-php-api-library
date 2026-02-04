<?php

namespace Adyen\Tests\Unit;

use Adyen\Service\TokenizationWebhookParser;
use Adyen\Model\TokenizationWebhooks\TokenizationAlreadyExistingDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationCreatedDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationDisabledDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationUpdatedDetailsNotificationRequest;

class TokenizationWebhookParserTest extends TestCaseMock
{
    public function testTokenizationWebhookRecurringTokenCreated()
    {
        $jsonString = '{
                          "createdAt": "2025-06-30T16:40:23+02:00",
                          "eventId": "QBQQ9DLNRHHKGK38",
                          "environment": "test",
                          "data": {
                            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
                            "storedPaymentMethodId": "M5N7TQ4TG5PFWR50",
                            "type": "visastandarddebit",
                            "operation": "created",
                            "shopperReference": "YOUR_SHOPPER_REFERENCE"
                          },
                          "type": "recurring.token.created"
                        }';

        $webhookParser = new TokenizationWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(TokenizationCreatedDetailsNotificationRequest::class, get_class($result));
        self::assertEquals("recurring.token.created", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testTokenizationWebhookRecurringTokenDisabled()
    {
        $jsonString = '{
                          "createdAt": "2025-06-30T16:40:23+02:00",
                          "eventId": "QBQQ9DLNRHHKGK38",
                          "environment": "test",
                          "data": {
                            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
                            "storedPaymentMethodId": "M5N7TQ4TG5PFWR50",
                            "type": "visastandarddebit",
                            "shopperReference": "YOUR_SHOPPER_REFERENCE"
                          },
                          "type": "recurring.token.disabled"
                        }';

        $webhookParser = new TokenizationWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(TokenizationDisabledDetailsNotificationRequest::class, get_class($result));
        self::assertEquals("recurring.token.disabled", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testTokenizationWebhookRecurringTokenUpdated()
    {
        $jsonString = '{
                          "createdAt": "2025-06-30T16:40:23+02:00",
                          "eventId": "QBQQ9DLNRHHKGK38",
                          "environment": "test",
                          "data": {
                            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
                            "storedPaymentMethodId": "M5N7TQ4TG5PFWR50",
                            "type": "visastandarddebit",
                            "operation": "updated",
                            "shopperReference": "YOUR_SHOPPER_REFERENCE"
                          },
                          "type": "recurring.token.updated"
                        }';

        $webhookParser = new TokenizationWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(TokenizationUpdatedDetailsNotificationRequest::class, get_class($result));
        self::assertEquals("recurring.token.updated", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }

    public function testTokenizationWebhookRecurringTokenAlreadyExisting()
    {
        $jsonString = '{
                          "createdAt": "2025-06-30T16:40:23+02:00",
                          "eventId": "QBQQ9DLNRHHKGK38",
                          "environment": "test",
                          "data": {
                            "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
                            "storedPaymentMethodId": "M5N7TQ4TG5PFWR50",
                            "type": "visastandarddebit",
                            "operation": "alreadyExisting",
                            "shopperReference": "YOUR_SHOPPER_REFERENCE"
                          },
                          "type": "recurring.token.alreadyExisting"
                        }';

        $webhookParser = new TokenizationWebhookParser($jsonString);
        $result = $webhookParser->getGenericWebhook();
        self::assertEquals(TokenizationAlreadyExistingDetailsNotificationRequest::class, get_class($result));
        self::assertEquals("recurring.token.alreadyExisting", $result->getType());
        self::assertEquals("test", $result->getEnvironment());
    }
}
