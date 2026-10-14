<?php
/**
 * Adyen API Library for PHP
 *
 * Copyright (c) 2020 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 */

namespace Adyen\Tests\Unit;

use Adyen\Model\BinLookup\BinDetail;
use Adyen\Model\BinLookup\DSPublicKeyDetail;
use Adyen\Model\BinLookup\ThreeDS2CardRangeDetail;
use Adyen\Model\BinLookup\ThreeDSAvailabilityResponse;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Model\Checkout\DeviceRenderOptions;
use Adyen\Model\Checkout\ObjectSerializer as CheckoutObjectSerializer;
use Adyen\Model\Checkout\PaymentRefundRequest;
use Adyen\Model\Checkout\PayToPaymentMethod;
use Adyen\Model\Checkout\Result;
use Adyen\Model\Checkout\ValidateShopperIdResponse;
use Adyen\Tests\TestCase;

/**
 * Checks shared behavior of Mustache-generated models.
 *
 * BinLookup and Checkout provide representative models for these checks.
 */
class ModelTest extends TestCase
{
    /**
     * BinLookup getters must return the scalar values, nested models, and lists assigned by setters.
     */
    public function testSettersAndGetters()
    {
        $response = new ThreeDSAvailabilityResponse();

        $binDetails = new BinDetail();
        $binDetails->setIssuerCountry("NL");
        $response->setBinDetails($binDetails);
        $this->assertEquals($binDetails, $response->getBinDetails());

        $dsPublicKey = new DSPublicKeyDetail();
        $dsPublicKey->setBrand("visa");
        $response->setDsPublicKeys([$dsPublicKey]);
        $this->assertEquals([$dsPublicKey], $response->getDsPublicKeys());

        $response->setThreeDS1Supported(true);
        $this->assertTrue($response->getThreeDS1Supported());

        $cardRangeDetail = new ThreeDS2CardRangeDetail();
        $cardRangeDetail->setBrandCode("visa");
        $response->setThreeDS2CardRangeDetails([$cardRangeDetail]);
        $this->assertEquals([$cardRangeDetail], $response->getThreeDS2CardRangeDetails());

        $response->setThreeDS2supported(false);
        $this->assertFalse($response->getThreeDS2supported());

        $this->assertEquals('ThreeDSAvailabilityResponse', $response->getModelName());
    }

    /**
     * A generated model exposes the type, format, and property maps used by the serializer.
     */
    public function testStaticMethods()
    {
        $this->assertIsArray(ThreeDSAvailabilityResponse::openAPITypes());
        $this->assertIsArray(ThreeDSAvailabilityResponse::openAPIFormats());
        $this->assertIsArray(ThreeDSAvailabilityResponse::attributeMap());
        $this->assertIsArray(ThreeDSAvailabilityResponse::setters());
        $this->assertIsArray(ThreeDSAvailabilityResponse::getters());
    }

    /**
     * A BinLookup model supports reading, updating, and removing fields through array access.
     */
    public function testArrayAccess()
    {
        $response = new ThreeDSAvailabilityResponse();
        $response->setThreeDS1Supported(true);

        $this->assertTrue(isset($response['threeDS1Supported']));
        $this->assertTrue($response['threeDS1Supported']);

        $response['threeDS1Supported'] = false;
        $this->assertFalse($response['threeDS1Supported']);

        unset($response['threeDS1Supported']);
        $this->assertFalse(isset($response['threeDS1Supported']));
    }

    /**
     * Converting a model to an array includes its scalar fields and nested model fields.
     */
    public function testToArray()
    {
        $response = new ThreeDSAvailabilityResponse();
        $response->setThreeDS1Supported(true);
        $binDetails = new BinDetail();
        $binDetails->setIssuerCountry("NL");
        $response->setBinDetails($binDetails);

        $array = $response->toArray();
        $this->assertIsArray($array);
        $this->assertEquals(true, $array['threeDS1Supported']);
        $this->assertIsArray($array['binDetails']);
        $this->assertEquals("NL", $array['binDetails']['issuerCountry']);
    }

    /**
     * JSON serialization produces valid JSON and preserves the model's field values.
     */
    public function testJsonSerialize()
    {
        $response = new ThreeDSAvailabilityResponse();
        $response->setThreeDS1Supported(true);

        $json = json_encode($response);
        $this->assertJson($json);
        $decoded = json_decode($json, true);
        $this->assertEquals(true, $decoded['threeDS1Supported']);
    }

    /**
     * A BinLookup model can be converted to a string.
     */
    public function testToString()
    {
        $response = new ThreeDSAvailabilityResponse();
        $this->assertIsString((string)$response);
    }

    /**
     * A model's header representation is returned as a string.
     */
    public function testToHeaderValue()
    {
        $response = new ThreeDSAvailabilityResponse();
        $this->assertIsString($response->toHeaderValue());
    }

    /**
     * A child model's array must include its own fields and the inherited payment type.
     */
    public function testInheritedFieldsAreIncludedInTheArray(): void
    {
        $model = new PayToPaymentMethod(['shopperReference' => 'test-shopper']);

        self::assertSame(
            ['shopperReference' => 'test-shopper', 'type' => 'payTo'],
            $model->toArray()
        );
    }

    /**
     * Missing fields stay omitted, while explicit nulls survive construction and deserialization.
     */
    public function testMissingAndExplicitNullStayDistinct(): void
    {
        $missing = new PaymentRefundRequest();
        $explicitNull = new PaymentRefundRequest(['merchantRefundReason' => null]);

        self::assertSame([], (array) CheckoutObjectSerializer::sanitizeForSerialization($missing));
        self::assertSame(
            ['merchantRefundReason' => null],
            (array) CheckoutObjectSerializer::sanitizeForSerialization($explicitNull)
        );

        $receivedMissing = CheckoutObjectSerializer::deserialize((object) [], PaymentRefundRequest::class);
        $receivedNull = CheckoutObjectSerializer::deserialize(
            (object) ['merchantRefundReason' => null],
            PaymentRefundRequest::class
        );

        self::assertSame([], (array) CheckoutObjectSerializer::sanitizeForSerialization($receivedMissing));
        self::assertSame(
            ['merchantRefundReason' => null],
            (array) CheckoutObjectSerializer::sanitizeForSerialization($receivedNull)
        );
    }

    /**
     * Explicit null survives array conversion until the field is removed.
     */
    public function testExplicitNullSurvivesArrayRoundTrip(): void
    {
        $model = new PaymentRefundRequest(['merchantRefundReason' => null]);

        self::assertSame(
            ['merchantRefundReason' => null],
            $model->toArray()
        );

        $rebuilt = new PaymentRefundRequest($model->toArray());

        self::assertSame(json_encode($model), json_encode($rebuilt));

        unset($model['merchantRefundReason']);

        self::assertSame([], $model->toArray());
    }

    /**
     * A setter can replace repeated null assignments with a value and clear null tracking.
     */
    public function testSetterCanReplaceRepeatedNullsWithAValue(): void
    {
        $model = new PaymentRefundRequest(['merchantRefundReason' => null]);
        $model->setMerchantRefundReason(null);
        $model->setMerchantRefundReason(null);
        $model->setMerchantRefundReason(PaymentRefundRequest::MERCHANT_REFUND_REASON_OTHER);

        self::assertFalse($model->isNullableSetToNull('merchantRefundReason'));
        self::assertSame(
            ['merchantRefundReason' => PaymentRefundRequest::MERCHANT_REFUND_REASON_OTHER],
            (array) CheckoutObjectSerializer::sanitizeForSerialization($model)
        );
    }

    /**
     * Array assignment can store an explicit null and then replace it with a value.
     */
    public function testArrayAccessCanUpdateANullableField(): void
    {
        $model = new PaymentRefundRequest();
        $model['merchantRefundReason'] = null;

        self::assertSame(
            ['merchantRefundReason' => null],
            (array) CheckoutObjectSerializer::sanitizeForSerialization($model)
        );

        $model['merchantRefundReason'] = PaymentRefundRequest::MERCHANT_REFUND_REASON_OTHER;

        self::assertFalse($model->isNullableSetToNull('merchantRefundReason'));
        self::assertSame(
            ['merchantRefundReason' => PaymentRefundRequest::MERCHANT_REFUND_REASON_OTHER],
            (array) CheckoutObjectSerializer::sanitizeForSerialization($model)
        );
    }

    /**
     * Removing a field keeps its getter usable and omits the field from the request.
     */
    public function testUnsetKeepsTheModelReadable(): void
    {
        $model = new PaymentRefundRequest(['merchantRefundReason' => null]);

        unset($model['merchantRefundReason']);

        self::assertNull($model->getMerchantRefundReason());
        self::assertSame([], (array) CheckoutObjectSerializer::sanitizeForSerialization($model));
    }

    /**
     * A known scalar enum keeps its value through serialization and deserialization.
     */
    public function testKnownScalarEnumValueIsPreserved(): void
    {
        $model = new CreateCheckoutSessionRequest();
        $model->setMode(CreateCheckoutSessionRequest::MODE_HOSTED);
        $serialized = CheckoutObjectSerializer::sanitizeForSerialization($model);
        $received = CheckoutObjectSerializer::deserialize($serialized, CreateCheckoutSessionRequest::class);

        self::assertSame(CreateCheckoutSessionRequest::MODE_HOSTED, $serialized->mode);
        self::assertSame(CreateCheckoutSessionRequest::MODE_HOSTED, $received->getMode());
    }

    /**
     * An array of known enum values keeps every entry through serialization and deserialization.
     */
    public function testKnownArrayEnumValuesArePreserved(): void
    {
        $values = [DeviceRenderOptions::SDK_UI_TYPE_TEXT, DeviceRenderOptions::SDK_UI_TYPE_SINGLE_SELECT];
        $model = new DeviceRenderOptions();
        $model->setSdkUiType($values);
        $serialized = CheckoutObjectSerializer::sanitizeForSerialization($model);
        $received = CheckoutObjectSerializer::deserialize($serialized, DeviceRenderOptions::class);

        self::assertSame($values, $serialized->sdkUiType);
        self::assertSame($values, $received->getSdkUiType());
    }

    /**
     * A received known standalone enum value is preserved when serialized.
     */
    public function testKnownStandaloneEnumValueIsPreserved(): void
    {
        $received = CheckoutObjectSerializer::deserialize(
            (object) ['result' => Result::VALID],
            ValidateShopperIdResponse::class
        );

        self::assertSame(Result::VALID, $received->getResult());
        self::assertSame(Result::VALID, CheckoutObjectSerializer::sanitizeForSerialization($received)->result);
    }

    /**
     * An unknown scalar enum value is preserved by setters and deserialization, with warnings.
     */
    public function testUnknownScalarEnumIsPreservedAndWarns(): void
    {
        $warnings = $this->captureEnumWarnings(function (): void {
            $model = new CreateCheckoutSessionRequest();
            $model->setMode('future-mode');
            $serialized = CheckoutObjectSerializer::sanitizeForSerialization($model);
            $received = CheckoutObjectSerializer::deserialize($serialized, CreateCheckoutSessionRequest::class);

            self::assertSame('future-mode', $serialized->mode);
            self::assertSame('future-mode', $received->getMode());
        });

        self::assertStringContainsString('mode: unexpected enum value', $warnings);
        self::assertSame(2, substr_count($warnings, 'unexpected enum value'));
    }

    /**
     * An enum array preserves known and unknown values, warning only for unknown entries.
     */
    public function testUnknownArrayEnumIsPreservedAndWarns(): void
    {
        $values = [DeviceRenderOptions::SDK_UI_TYPE_TEXT, 'future-ui-type'];
        $warnings = $this->captureEnumWarnings(function () use ($values): void {
            $model = new DeviceRenderOptions();
            $model->setSdkUiType($values);
            $serialized = CheckoutObjectSerializer::sanitizeForSerialization($model);
            $received = CheckoutObjectSerializer::deserialize($serialized, DeviceRenderOptions::class);

            self::assertSame($values, $serialized->sdkUiType);
            self::assertSame($values, $received->getSdkUiType());
        });

        self::assertStringContainsString('sdkUiType: unexpected enum value', $warnings);
        self::assertSame(2, substr_count($warnings, 'unexpected enum value'));
    }

    /**
     * An unknown standalone enum value is preserved during deserialization and serialization, with warnings.
     */
    public function testUnknownStandaloneEnumIsPreservedAndWarns(): void
    {
        $warnings = $this->captureEnumWarnings(function (): void {
            $received = CheckoutObjectSerializer::deserialize(
                (object) ['result' => 'FUTURE_RESULT'],
                ValidateShopperIdResponse::class
            );
            $serialized = CheckoutObjectSerializer::sanitizeForSerialization($received);

            self::assertSame('FUTURE_RESULT', $received->getResult());
            self::assertSame('FUTURE_RESULT', $serialized->result);
        });

        self::assertStringContainsString(Result::class . ': unexpected enum value', $warnings);
        self::assertSame(2, substr_count($warnings, 'unexpected enum value'));
    }

    /**
     * Capture enum warnings while restoring the error log and removing the temporary file.
     */
    private function captureEnumWarnings(callable $operation): string
    {
        $originalErrorLog = (string) ini_get('error_log');
        $warningLog = tempnam(sys_get_temp_dir(), 'adyen-enum-');
        self::assertIsString($warningLog);

        try {
            ini_set('error_log', $warningLog);
            $operation();

            return (string) file_get_contents($warningLog);
        } finally {
            ini_set('error_log', $originalErrorLog);
            unlink($warningLog);
        }
    }
}
