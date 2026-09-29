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

use Adyen\Model\TransferWebhooks\TransferNotificationRequest;
use Adyen\Model\TransferWebhooks\TransferWebhooksHandler;

/**
 * Tests the generated TransferWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The Transfer payloads also exercise the
 * dotted paths with numeric segments (e.g. 'data.balances.0.currency').
 * The rejection scenarios live in the shared base class.
 */
class TransferWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return TransferWebhooksHandler::class;
    }

    public function testTransferCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.transfer.created',
                'transfer-created.json'
            )
            ->whenCalling('getTransferNotificationRequest')
            ->expectModel(TransferNotificationRequest::class)
            ->expectField('data.id', '2WT1N05XXY7P9XH9')
            ->expectField('data.status', 'received')
            ->expectField('data.balances.0.currency', 'EUR')
            ->expectField('data.balances.0.received', 1000)
            ->expectField('data.events.0.id', 'JDRF00000000000000000000000001')
            ->expectField('data.events.0.type', 'accounting')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testTransferUpdated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.transfer.updated',
                'transfer-updated.json'
            )
            ->whenCalling('getTransferNotificationRequest')
            ->expectModel(TransferNotificationRequest::class)
            ->expectField('data.id', '01234')
            ->expectField('data.status', 'authorised')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }
}
