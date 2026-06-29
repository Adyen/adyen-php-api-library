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
use Adyen\Tests\TestCase;

class ModelTest extends TestCase
{
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
        $this->assertTrue($response->valid());
    }

    public function testStaticMethods()
    {
        $this->assertIsArray(ThreeDSAvailabilityResponse::openAPITypes());
        $this->assertIsArray(ThreeDSAvailabilityResponse::openAPIFormats());
        $this->assertIsArray(ThreeDSAvailabilityResponse::attributeMap());
        $this->assertIsArray(ThreeDSAvailabilityResponse::setters());
        $this->assertIsArray(ThreeDSAvailabilityResponse::getters());
    }

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

    public function testJsonSerialize()
    {
        $response = new ThreeDSAvailabilityResponse();
        $response->setThreeDS1Supported(true);

        $json = json_encode($response);
        $this->assertJson($json);
        $decoded = json_decode($json, true);
        $this->assertEquals(true, $decoded['threeDS1Supported']);
    }

    public function testToString()
    {
        $response = new ThreeDSAvailabilityResponse();
        $this->assertIsString((string)$response);
    }

    public function testToHeaderValue()
    {
        $response = new ThreeDSAvailabilityResponse();
        $this->assertIsString($response->toHeaderValue());
    }
}
