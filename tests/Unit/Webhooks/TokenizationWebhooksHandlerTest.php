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

/**
 * Tests the generated TokenizationWebhooksHandler against its webhook payloads.
 */
class TokenizationWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\TokenizationWebhooks\TokenizationWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'recurring.token.created' => [
                'tokenization-webhook-recurring-token-created.json',
                'getTokenizationCreatedDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationCreatedDetailsNotificationRequest',
                'recurring.token.created',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                    'data.operation' => 'created',
                ],
            ],
            'recurring.token.disabled' => [
                'tokenization-webhook-recurring-token-disabled.json',
                'getTokenizationDisabledDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationDisabledDetailsNotificationRequest',
                'recurring.token.disabled',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                ],
            ],
            'recurring.token.alreadyExisting' => [
                'tokenization-webhook-recurring-token-already-existing.json',
                'getTokenizationAlreadyExistingDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationAlreadyExistingDetailsNotificationRequest',
                'recurring.token.alreadyExisting',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.operation' => 'alreadyExisting',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                ],
            ],
            'recurring.token.updated' => [
                'tokenization-webhook-recurring-token-updated.json',
                'getTokenizationUpdatedDetailsNotificationRequest',
                'Adyen\Model\TokenizationWebhooks\TokenizationUpdatedDetailsNotificationRequest',
                'recurring.token.updated',
                [
                    'eventId' => 'QBQQ9DLNRHHKGK38',
                    'data.operation' => 'updated',
                    'data.storedPaymentMethodId' => 'M5N7TQ4TG5PFWR50',
                ],
            ],
        ];
    }
}
