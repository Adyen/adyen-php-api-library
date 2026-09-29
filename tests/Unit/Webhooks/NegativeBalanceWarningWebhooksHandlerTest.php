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

use Adyen\Model\NegativeBalanceWarningWebhooks\NegativeBalanceCompensationWarningNotificationRequest;
use Adyen\Model\NegativeBalanceWarningWebhooks\NegativeBalanceWarningWebhooksHandler;

/**
 * Tests the generated NegativeBalanceWarningWebhooksHandler against its
 * webhook payloads.
 *
 * Each webhook gets one test method that reads as a scenario: given the
 * event, when deserializing it, then expect the model, its fields and
 * the resilience guarantees. The rejection scenarios live in the shared
 * base class.
 */
class NegativeBalanceWarningWebhooksHandlerTest extends WebhooksHandlerTestCase
{
    protected static function handlerClass(): string
    {
        return NegativeBalanceWarningWebhooksHandler::class;
    }

    public function testNegativeBalanceCompensationWarningScheduled(): void
    {
        $this->scenario()
            ->givenEvent(
                'balancePlatform.negativeBalanceCompensationWarning.scheduled',
                'negative-balance-compensation-warning-scheduled.json'
            )
            ->whenCalling('getNegativeBalanceCompensationWarningNotificationRequest')
            ->expectModel(NegativeBalanceCompensationWarningNotificationRequest::class)
            ->expectField('data.id', 'BR322KT5S4PB5GZ6V')
            ->expectField('data.amount.currency', 'EUR')
            ->expectField('data.amount.value', 1000)
            ->expectField('data.liableBalanceAccountId', 'BA00000000000000000000001')
            ->expectUnknownFieldsAreIgnored()
            ->expectOtherTypedGettersReturnNull()
            ->expectMissingFieldYieldsNull('data.id');
    }
}
