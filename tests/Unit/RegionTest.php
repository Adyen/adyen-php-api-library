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
            "au",
            "us",
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
            "au" => "https://terminal-api-live-au.adyen.com",
            "us" => "https://terminal-api-live-us.adyen.com",
            "apse" => "https://terminal-api-live-apse.adyen.com",
        ];

        $this->assertEquals(
            $expected,
            Region::TERMINAL_API_ENDPOINTS_MAPPING,
            "TERMINAL_API_ENDPOINTS_MAPPING should match the expected mappings."
        );
    }
}
