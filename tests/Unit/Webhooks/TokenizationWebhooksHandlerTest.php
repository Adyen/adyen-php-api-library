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

namespace Adyen\Tests\Unit\Webhooks;

use Adyen\Model\TokenizationWebhooks\TokenizationAlreadyExistingDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationCreatedDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationDisabledDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationUpdatedDetailsNotificationRequest;
use Adyen\Model\TokenizationWebhooks\TokenizationWebhooksHandler;

/**
 * Tests the generated TokenizationWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class TokenizationWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return TokenizationWebhooksHandler::class;
    }

    public function testRecurringTokenCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'recurring.token.created',
                'tokenization-webhook-recurring-token-created.json'
            )
            ->whenCalling('getTokenizationCreatedDetailsNotificationRequest')
            ->expectModel(TokenizationCreatedDetailsNotificationRequest::class)
            ->expectField('eventId', 'QBQQ9DLNRHHKGK38')
            ->expectField('data.storedPaymentMethodId', 'M5N7TQ4TG5PFWR50')
            ->expectField('data.operation', 'created')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('eventId');
    }

    public function testRecurringTokenDisabled(): void
    {
        $this->scenario()
            ->givenEvent(
                'recurring.token.disabled',
                'tokenization-webhook-recurring-token-disabled.json'
            )
            ->whenCalling('getTokenizationDisabledDetailsNotificationRequest')
            ->expectModel(TokenizationDisabledDetailsNotificationRequest::class)
            ->expectField('eventId', 'QBQQ9DLNRHHKGK38')
            ->expectField('data.storedPaymentMethodId', 'M5N7TQ4TG5PFWR50')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('eventId');
    }

    public function testRecurringTokenAlreadyExisting(): void
    {
        $this->scenario()
            ->givenEvent(
                'recurring.token.alreadyExisting',
                'tokenization-webhook-recurring-token-already-existing.json'
            )
            ->whenCalling('getTokenizationAlreadyExistingDetailsNotificationRequest')
            ->expectModel(TokenizationAlreadyExistingDetailsNotificationRequest::class)
            ->expectField('eventId', 'QBQQ9DLNRHHKGK38')
            ->expectField('data.operation', 'alreadyExisting')
            ->expectField('data.storedPaymentMethodId', 'M5N7TQ4TG5PFWR50')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('eventId');
    }

    public function testRecurringTokenUpdated(): void
    {
        $this->scenario()
            ->givenEvent(
                'recurring.token.updated',
                'tokenization-webhook-recurring-token-updated.json'
            )
            ->whenCalling('getTokenizationUpdatedDetailsNotificationRequest')
            ->expectModel(TokenizationUpdatedDetailsNotificationRequest::class)
            ->expectField('eventId', 'QBQQ9DLNRHHKGK38')
            ->expectField('data.operation', 'updated')
            ->expectField('data.storedPaymentMethodId', 'M5N7TQ4TG5PFWR50')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('eventId');
    }
}
