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
 * Tests the generated TransferWebhooksHandler against its webhook payloads.
 */
class TransferWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\TransferWebhooks\TransferWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.transfer.created' => [
                'transfer-created.json',
                'getTransferNotificationRequest',
                'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
                'balancePlatform.transfer.created',
                [
                    'data.id' => '2WT1N05XXY7P9XH9',
                    'data.status' => 'received',
                    'data.balances.0.currency' => 'EUR',
                    'data.balances.0.received' => 1000,
                    'data.events.0.id' => 'JDRF00000000000000000000000001',
                    'data.events.0.type' => 'accounting',
                ],
            ],
            'balancePlatform.transfer.updated' => [
                'transfer-updated.json',
                'getTransferNotificationRequest',
                'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
                'balancePlatform.transfer.updated',
                [
                    'data.id' => '01234',
                    'data.status' => 'authorised',
                ],
            ],
        ];
    }
}
