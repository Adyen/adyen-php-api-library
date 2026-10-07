<?php

namespace Adyen\Tests\Unit;

use Adyen\Model\Checkout\CheckoutPaymentMethod;
use Adyen\Model\Checkout\CheckoutRedirectAction;
use Adyen\Model\Checkout\CheckoutThreeDS2Action;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\DonationPaymentMethod;
use Adyen\Model\Checkout\ObjectSerializer as CheckoutObjectSerializer;
use Adyen\Model\Checkout\PaymentDetailsResponseAction;
use Adyen\Model\Checkout\PaymentResponseAction;
use Adyen\Model\Checkout\PayToPaymentMethod;
use Adyen\Model\Checkout\ShopperIdPaymentMethod;
use Adyen\Model\ConfigurationWebhooks\MandateBankAccountAccountIdentification;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer as ConfigurationWebhooksObjectSerializer;
use Adyen\Model\ConfigurationWebhooks\UKLocalMandateAccountIdentification;
use Adyen\Model\TransferWebhooks\BankAccountV3AccountIdentification;
use Adyen\Model\TransferWebhooks\IbanAccountIdentification;
use Adyen\Model\TransferWebhooks\TransferNotificationRequest;
use PHPUnit\Framework\TestCase;

/**
 * Regression tests for discriminator-based deserialization: a payload with a
 * discriminator (`type`) must deserialize into the mapped variant model so
 * that variant fields are preserved, and variant models must default to a
 * valid wire type on construction.
 */
class DiscriminatorDeserializationTest extends TestCase
{
    // allOf subtype: wire type "payTo" dispatches to the mapped subtype.
    public function testDeserializesAllOfSubtypeToPayToPaymentMethod(): void
    {
        $payload = json_decode('{"type":"payTo","shopperReference":"shopper-ref-123"}');

        $result = CheckoutObjectSerializer::deserialize($payload, ShopperIdPaymentMethod::class);

        $this->assertInstanceOf(PayToPaymentMethod::class, $result);
        $this->assertSame('shopper-ref-123', $result->getShopperReference());
        $this->assertSame('payTo', $result->getType());
    }

    // Inline oneOf union: "ukLocal" dispatches to the variant carrying sortCode.
    public function testDeserializesInlineUnionToUkLocalMandateAccountIdentification(): void
    {
        $payload = json_decode(
            '{"type":"ukLocal","accountNumber":"12345678","sortCode":"40-00-04"}'
        );

        $result = ConfigurationWebhooksObjectSerializer::deserialize(
            $payload,
            MandateBankAccountAccountIdentification::class
        );

        $this->assertInstanceOf(UKLocalMandateAccountIdentification::class, $result);
        $this->assertSame('12345678', $result->getAccountNumber());
        $this->assertSame('40-00-04', $result->getSortCode());
        $this->assertSame('ukLocal', $result->getType());
    }

    // oneOf action union: "redirect" dispatches to CheckoutRedirectAction.
    public function testDeserializesActionUnionToRedirectAction(): void
    {
        $payload = json_decode(
            '{"type":"redirect","paymentMethodType":"scheme","method":"GET",'
            . '"url":"https://checkout-test.adyen.com/redirect"}'
        );

        $result = CheckoutObjectSerializer::deserialize($payload, PaymentResponseAction::class);

        $this->assertInstanceOf(CheckoutRedirectAction::class, $result);
        $this->assertSame('https://checkout-test.adyen.com/redirect', $result->getUrl());
        $this->assertSame('redirect', $result->getType());
    }

    // oneOf action union: "threeDS2" dispatches to CheckoutThreeDS2Action.
    public function testDeserializesActionUnionToThreeDs2Action(): void
    {
        $payload = json_decode(
            '{"type":"threeDS2","paymentMethodType":"scheme","token":"three-ds-token"}'
        );

        $result = CheckoutObjectSerializer::deserialize($payload, PaymentDetailsResponseAction::class);

        $this->assertInstanceOf(CheckoutThreeDS2Action::class, $result);
        $this->assertSame('three-ds-token', $result->getToken());
        $this->assertSame('threeDS2', $result->getType());
    }

    // Round-trip: discriminator value and variant fields survive re-serialization.
    public function testRoundTripKeepsDiscriminatorValueAndFields(): void
    {
        $payload = json_decode(
            '{"type":"ukLocal","accountNumber":"12345678","sortCode":"40-00-04"}'
        );

        $result = ConfigurationWebhooksObjectSerializer::deserialize(
            $payload,
            MandateBankAccountAccountIdentification::class
        );

        $json = json_encode(
            ConfigurationWebhooksObjectSerializer::sanitizeForSerialization($result)
        );
        $decoded = json_decode((string) $json, true);

        $this->assertSame('ukLocal', $decoded['type']);
        $this->assertSame('12345678', $decoded['accountNumber']);
        $this->assertSame('40-00-04', $decoded['sortCode']);
    }

    // Unknown wire value: fall back to the declared model (forward compatibility).
    public function testUnknownDiscriminatorValueFallsBackToDeclaredModel(): void
    {
        $payload = json_decode('{"type":"someFutureType","accountNumber":"12345678"}');

        $result = ConfigurationWebhooksObjectSerializer::deserialize(
            $payload,
            MandateBankAccountAccountIdentification::class
        );

        $this->assertInstanceOf(MandateBankAccountAccountIdentification::class, $result);
        $this->assertSame('12345678', $result->getAccountNumber());
    }

    // Missing wire value: stay on the declared model.
    public function testMissingDiscriminatorValueStaysOnDeclaredModel(): void
    {
        $payload = json_decode('{"accountNumber":"12345678"}');

        $result = ConfigurationWebhooksObjectSerializer::deserialize(
            $payload,
            MandateBankAccountAccountIdentification::class
        );

        $this->assertInstanceOf(MandateBankAccountAccountIdentification::class, $result);
        $this->assertSame('12345678', $result->getAccountNumber());
    }

    // Cross-namespace dispatch: nested TransferWebhooks models resolve correctly
    // through a ConfigurationWebhooks serializer.
    public function testNestedCrossNamespaceDispatchPreservesVariantFields(): void
    {
        $payload = json_decode(
            '{"type":"balancePlatform.transfer.created","environment":"test",'
            . '"data":{"id":"2WT1N05XXY7P9XH9","counterparty":{"bankAccount":'
            . '{"accountIdentification":{"type":"iban","iban":"NL91ABNA0417164300"}}}}}'
        );

        $result = ConfigurationWebhooksObjectSerializer::deserialize(
            $payload,
            TransferNotificationRequest::class
        );

        $identification = $result->getData()
            ->getCounterparty()
            ->getBankAccount()
            ->getAccountIdentification();

        $this->assertSame(IbanAccountIdentification::class, get_class($identification));
        $this->assertSame('NL91ABNA0417164300', $identification->getIban());
        $this->assertSame('iban', $identification->getType());
    }

    // allOf subtype constructed without a type: it defaults to its mapped
    // wire value, not to its class name.
    public function testVariantModelDefaultsToMappedWireValue(): void
    {
        $model = new PayToPaymentMethod();

        $this->assertSame('payTo', $model->getType());
    }

    // Standalone variant constructed without a type: the spec default for
    // `type` is honored.
    public function testVariantModelDefaultsToSpecDefaultValue(): void
    {
        $model = new UKLocalMandateAccountIdentification();

        $this->assertSame('ukLocal', $model->getType());
    }

    // Declared unions and allOf base models carry no default type: neither a
    // class name, an internal generator name, nor a default inherited from
    // one of the alternatives.
    public function testUnionModelHasNoDefaultType(): void
    {
        $this->assertNull((new PaymentResponseAction())->getType());
        $this->assertNull((new ShopperIdPaymentMethod())->getType());
        $this->assertNull((new CheckoutPaymentMethod())->getType());
        $this->assertNull((new DonationPaymentMethod())->getType());
    }

    // Explicit null is preserved instead of being replaced by the spec
    // default; the default only applies when the field is omitted.
    public function testExplicitNullOverridesSpecDefault(): void
    {
        $this->assertSame('embedded', (new CreateCheckoutSessionRequest())->getMode());
        $this->assertNull((new CreateCheckoutSessionRequest(['mode' => null]))->getMode());
    }

    // Alternative-derived property defaults must not leak onto the declared
    // union wrapper: the IBAN variant has no `accountType`, so a wrapper built
    // with an IBAN type must not acquire the default owned by other
    // account-identification alternatives.
    public function testUnionWrapperDoesNotInheritAlternativePropertyDefaults(): void
    {
        $model = new BankAccountV3AccountIdentification(
            ['type' => 'iban', 'iban' => 'TEST-IBAN']
        );

        $this->assertNull($model->getAccountType());
        $this->assertSame(
            '{"type":"iban","iban":"TEST-IBAN"}',
            (string) json_encode($model)
        );
    }
}
