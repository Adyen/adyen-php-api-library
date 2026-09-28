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
 * Tests the generated BalanceWebhooksHandler against its webhook payloads.
 */
class BalanceWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\BalanceWebhooks\BalanceWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.balanceAccount.balance.updated' => [
                'balance-account-balance-updated.json',
                'getBalanceAccountBalanceNotificationRequest',
                'Adyen\Model\BalanceWebhooks\BalanceAccountBalanceNotificationRequest',
                'balancePlatform.balanceAccount.balance.updated',
                [
                    'data.id' => 'BR322KT5S4PB5GZ6V',
                    'data.currency' => 'EUR',
                    'data.balances.balance' => 1000,
                    'data.settingIds.0' => 'PS00000000000000000000001',
                ],
            ],
            'balancePlatform.balanceAccount.balance.block.released' => [
                'balance-account-balance-block-released.json',
                'getReleasedBlockedBalanceNotificationRequest',
                'Adyen\Model\BalanceWebhooks\ReleasedBlockedBalanceNotificationRequest',
                'balancePlatform.balanceAccount.balance.block.released',
                [
                    'data.id' => 'BR322KT5S4PB5GZ6V',
                    'data.batchReference' => 'BR322KT5S4PB5GZ6V',
                    'data.accountHolder.id' => 'AH00000000000000000000001',
                    'data.balanceAccount.id' => 'BA00000000000000000000001',
                ],
            ],
        ];
    }
}
