<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Service\PosPayment;
use PHPUnit\Framework\TestCase;
use Adyen\Region;

class RegionTest extends TestCase
{
    /**
     * Retrieves all region constants for comparison.
     * Filters out non-string values to exclude mappings.
     *
     * @return array<string> A list of valid regions.
     */
    private function getRegionValues(): array
    {
        $reflection = new \ReflectionClass(Region::class);
        $constants = $reflection->getConstants();

        $enumConstants = array_filter($constants, function ($value) {
            return is_string($value);
        });

        return array_values($enumConstants);
    }

    /**
     * Tests that the list of valid regions matches the expected list.
     * Compares the retrieved region constants with the expected list.
     *
     * @return void
     */
    public function testValidRegions(): void
    {
        $allRegions = $this->getRegionValues();

        $expected = [
            "eu",
            "au",
            "us",
            "in",
            "apse",
        ];

        $this->assertEquals(
            $expected,
            $allRegions,
            "The list of all regions should match the expected values."
        );
    }

    /**
     * Tests that the Terminal API endpoints mapping matches the expected values.
     * Compares the predefined endpoint mappings with the expected mappings.
     *
     * @return void
     */
    public function testTerminalApiEndpointsMapping(): void
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

    /**
     * @throws AdyenException
     */
    public function testSetsUnitedStatesTerminalCloudEndpoint(): void
    {
        $client = new Client();
        $client->setRegion(Region::US);
        $client->setEnvironment(Environment::LIVE);

        new PosPayment($client);

        $this->assertSame(
            Client::ENDPOINT_TERMINAL_CLOUD_US_LIVE,
            $client->getConfig()->get('endpointTerminalCloud')
        );
    }

    public function testRejectsUnsupportedRegion(): void
    {
        $client = new Client();

        $this->expectException(AdyenException::class);
        $this->expectExceptionMessage(
            'TerminalAPI endpoint for in is not supported yet'
        );

        $client->setRegion(Region::IN);
        $client->setEnvironment(Environment::LIVE);
        new PosPayment($client);
    }
}
