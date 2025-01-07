<?php

namespace Adyen\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Adyen\Region;

class RegionTest extends TestCase
{

    private function getRegionValues(): array
    {
        $reflection = new \ReflectionClass(Region::class);
        $constants = $reflection->getConstants();
    
        // Filter constants to include only string values (exclude mappings)
        $enumConstants = array_filter($constants, function ($value) {
            return is_string($value);
        });

        return array_values($enumConstants); // Return an indexed array of region values
    }

    public function testValidRegions(): void
    {
        // Dynamically fetch all region values
        $allRegions = $this->getRegionValues();

        // Define the expected list of valid regions
        $expected = [
            "eu",
            "au",
            "us",
            "in",
            "apse",
        ];

        // Assert that the dynamically retrieved regions match the expected list
        $this->assertEquals(
            $expected,
            $allRegions,
            "The list of all regions should match the expected values."
        );
    }

    public function testTerminalApiEndpointsMapping(): void
    {
        // Define the expected map of region to endpoint mappings
        $expected = [
            "eu" => "https://terminal-api-live.adyen.com",
            "au" => "https://terminal-api-live-au.adyen.com",
            "us" => "https://terminal-api-live-us.adyen.com",
            "apse" => "https://terminal-api-live-apse.adyen.com",
        ];

        // Assert that the TERMINAL_API_ENDPOINTS_MAPPING matches the expected mappings
        $this->assertEquals(
            $expected,
            Region::TERMINAL_API_ENDPOINTS_MAPPING,
            "TERMINAL_API_ENDPOINTS_MAPPING should match the expected mappings."
        );
    }
}
