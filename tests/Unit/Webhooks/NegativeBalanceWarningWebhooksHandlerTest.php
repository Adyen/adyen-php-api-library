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
 * Tests the generated NegativeBalanceWarningWebhooksHandler against its
 * webhook payloads.
 */
class NegativeBalanceWarningWebhooksHandlerTest extends AbstractWebhooksHandlerTest
{
    protected static function handlerClass(): string
    {
        return 'Adyen\Model\NegativeBalanceWarningWebhooks\NegativeBalanceWarningWebhooksHandler';
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function validWebhookProvider(): array
    {
        return [
            'balancePlatform.negativeBalanceCompensationWarning.scheduled' => [
                'negative-balance-compensation-warning-scheduled.json',
                'getNegativeBalanceCompensationWarningNotificationRequest',
                'Adyen\Model\NegativeBalanceWarningWebhooks\NegativeBalanceCompensationWarningNotificationRequest',
                'balancePlatform.negativeBalanceCompensationWarning.scheduled',
                [
                    'data.id' => 'BR322KT5S4PB5GZ6V',
                    'data.amount.currency' => 'EUR',
                    'data.amount.value' => 1000,
                    'data.liableBalanceAccountId' => 'BA00000000000000000000001',
                ],
            ],
        ];
    }
}
