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
 * Tests the generated TransactionWebhooksHandler against its webhook payloads.
 */
class TransactionWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\TransactionWebhooks\TransactionWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.transaction.created' => [
                'transaction-created.json',
                'getTransactionNotificationRequestV4',
                'Adyen\Model\TransactionWebhooks\TransactionNotificationRequestV4',
                'balancePlatform.transaction.created',
                [
                    'data.id' => 'TBQQR6G5RQ7P9XH9',
                    'data.status' => 'booked',
                    'data.amount.value' => 1000,
                    'data.paymentInstrument.id' => 'PI00000000000000000000001',
                ],
            ],
        ];
    }
}
