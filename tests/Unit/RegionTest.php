<?php

namespace Adyen\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Adyen\Region;

class RegionTest extends TestCase
{
    public function testValidRegions()
    {
        $expected = [
            "eu",
            "us",
            "au",
            "in",
            "apse",
        ];

        $this->assertEquals(
            $expected, 
            Region::VALID_REGIONS,
            "VALID_REGIONS should match the expected regions."
        );
    }

    public function testTerminalApiEndpointsMapping()
    {
        $expected = [
            "eu" => "https://terminal-api-live.adyen.com",
            "us" => "https://terminal-api-live-us.adyen.com",
            "au" => "https://terminal-api-live-au.adyen.com",
            "in" => "https://terminal-api-live-in.adyen.com",
            "apse" => "https://terminal-api-live-apse.adyen.com",
        ];

        $this->assertEquals(
            $expected, 
            Region::TERMINAL_API_ENDPOINTS_MAPPING, 
            "TERMINAL_API_ENDPOINTS_MAPPING should match the expected mappings.");
    }

    public function testTerminalApiEndpointsExistsForAllRegions()
    {
        $regionsWithEndpoints = array_keys(Region::TERMINAL_API_ENDPOINTS_MAPPING);
        $regions = Region::VALID_REGIONS;

        $expected = array_diff($regions, $regionsWithEndpoints);

        $this->assertEmpty(
            $expected,
            "Every region should be mapped to an endpoint."
        );
    }
}