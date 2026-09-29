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

use Adyen\Model\BalanceWebhooks\BalanceAccountBalanceNotificationRequest;
use Adyen\Model\BalanceWebhooks\BalanceWebhooksHandler;
use Adyen\Model\BalanceWebhooks\ReleasedBlockedBalanceNotificationRequest;

/**
 * Tests the generated BalanceWebhooksHandler against its webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class BalanceWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return BalanceWebhooksHandler::class;
    }

    public function testBalanceAccountBalanceUpdated(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.balance.updated',
                'balance-account-balance-updated.json'
            )
            ->whenCalling('getBalanceAccountBalanceNotificationRequest')
            ->expectModel(BalanceAccountBalanceNotificationRequest::class)
            ->expectField('data.id', 'BR322KT5S4PB5GZ6V')
            ->expectField('data.currency', 'EUR')
            ->expectField('data.balances.balance', 1000)
            ->expectField('data.settingIds.0', 'PS00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }

    public function testBalanceAccountBalanceBlockReleased(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.balanceAccount.balance.block.released',
                'balance-account-balance-block-released.json'
            )
            ->whenCalling('getReleasedBlockedBalanceNotificationRequest')
            ->expectModel(ReleasedBlockedBalanceNotificationRequest::class)
            ->expectField('data.id', 'BR322KT5S4PB5GZ6V')
            ->expectField('data.batchReference', 'BR322KT5S4PB5GZ6V')
            ->expectField('data.accountHolder.id', 'AH00000000000000000000001')
            ->expectField('data.balanceAccount.id', 'BA00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }
}
