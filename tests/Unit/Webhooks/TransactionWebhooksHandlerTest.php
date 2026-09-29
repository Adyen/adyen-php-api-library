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

use Adyen\Model\TransactionWebhooks\TransactionNotificationRequestV4;
use Adyen\Model\TransactionWebhooks\TransactionWebhooksHandler;

/**
 * Tests the generated TransactionWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class TransactionWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return TransactionWebhooksHandler::class;
    }

    public function testTransactionCreated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.transaction.created',
                'transaction-created.json'
            )
            ->whenCalling('getTransactionNotificationRequestV4')
            ->expectModel(TransactionNotificationRequestV4::class)
            ->expectField('data.id', 'TBQQR6G5RQ7P9XH9')
            ->expectField('data.status', 'booked')
            ->expectField('data.amount.value', 1000)
            ->expectField('data.paymentInstrument.id', 'PI00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }
}
