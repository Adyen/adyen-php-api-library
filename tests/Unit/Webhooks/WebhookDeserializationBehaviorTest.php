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

use PHPUnit\Framework\TestCase;

/**
 * Tests deserialization behavior that all webhook models share through the
 * generated ObjectSerializer. A single representative payload is enough,
 * because every handler deserializes through the same code.
 */
class WebhookDeserializationBehaviorTest extends TestCase
{
    /**
     * An enum value the model does not know yet must not fail parsing: the
     * raw value is stored and returned as-is by the getter.
     */
    public function testUnknownEnumValueIsKeptAsIs(): void
    {
        $payload = json_encode([
            'type' => 'balancePlatform.transfer.created',
            'data' => [
                'id' => '2WT1N05XXY7P9XH9',
                'status' => 'brandNewEnumValue',
            ],
        ]);

        $handlerClass = 'Adyen\Model\TransferWebhooks\TransferWebhooksHandler';
        $handler = new $handlerClass($payload);

        $webhook = $handler->getTransferNotificationRequest();
        $this->assertInstanceOf(
            'Adyen\Model\TransferWebhooks\TransferNotificationRequest',
            $webhook
        );
        $this->assertSame('brandNewEnumValue', $webhook->getData()->getStatus());
    }
}
