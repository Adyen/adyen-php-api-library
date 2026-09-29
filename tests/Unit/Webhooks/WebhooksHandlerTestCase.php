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
 * Base class for the webhook handler tests.
 *
 * The rejection scenarios are identical for every handler (they only
 * exercise the handler template, not any specific webhook model), so they
 * live here once and are inherited by every concrete test.
 *
 * The class name deliberately does not end in "Test": PHPUnit 9 warns
 * about abstract test case classes with a "Test" suffix, and a file not
 * matching "*Test.php" is not picked up as a test class either.
 */
abstract class WebhooksHandlerTestCase extends TestCase
{
    /**
     * Fully qualified class name of the generated handler under test.
     */
    abstract protected static function handlerClass(): string;

    /**
     * Starts a scenario for the handler under test.
     */
    protected function scenario(): WebhookScenario
    {
        return new WebhookScenario($this, static::handlerClass());
    }

    /**
     * Invalid JSON must be rejected: no handler may return a webhook.
     */
    public function testInvalidJsonReturnsNoWebhook(): void
    {
        $this->scenario()->givenPayload('not a webhook')->expectNoWebhook();
    }

    /**
     * An empty payload must be rejected: no handler may return a webhook.
     */
    public function testEmptyPayloadReturnsNoWebhook(): void
    {
        $this->scenario()->givenPayload('{}')->expectNoWebhook();
    }

    /**
     * A payload without a type must be rejected: no handler may
     * return a webhook.
     */
    public function testPayloadWithoutTypeReturnsNoWebhook(): void
    {
        $this->scenario()->givenPayload('{"data": {"id": "some-id"}}')->expectNoWebhook();
    }

    /**
     * A payload with an unknown event type must be rejected: no
     * handler may return a webhook.
     */
    public function testUnknownEventTypeReturnsNoWebhook(): void
    {
        $this->scenario()->givenPayload('{"type": "some.unknown.event"}')->expectNoWebhook();
    }
}
