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

namespace Adyen\Tests;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Region;
use Adyen\Config;
use Adyen\Environment;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $merchantAccount;
    protected $donationAccount;
    protected $skinCode;
    protected $hmacSignature;

    /**
     * Settings parsed from the config/test.ini file
     *
     * @var array
     */
    protected $settings;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->settings = $this->loadConfig();
        $this->merchantAccount = $this->getMerchantAccount();
        $this->donationAccount = $this->getDonationAccount();
        $this->skinCode = $this->getSkinCode();
        $this->hmacSignature = $this->getHmacSignature();

        $this->setDefaultsDuringDevelopment();
    }

    /**
     * During development of the standalone php api library this function sets the necessary defaults which would
     * otherwise set by the merchant
     */
    private function setDefaultsDuringDevelopment()
    {
        // Check default timezone if not set use a default value for that
        if (!ini_get('date.timezone')) {
            ini_set('date.timezone', 'Europe/Amsterdam');
        }
    }

    /**
     * Mock client object without configuring the config/test.ini
     *
     * @return Client
     */
    protected function createClientWithoutTestIni()
    {
        try {
            $client = new Client();
            $client->setApplicationName("My Test Application");
            $client->setEnvironment(Environment::TEST);
        } catch (AdyenException $exception) {
            $this->skipTest($exception->getMessage());
        }

        return $client;
    }

    /**
     * Mock client for payout
     *
     * @return Client
     */
    protected function createPayoutClient()
    {
        // validate username, password and MERCHANTAccount

        if (isset($this->settings['storePayoutUsername']) && isset($this->settings['storePayoutPassword'])) {
            if ($this->settings['storePayoutUsername'] == "YOUR STORE PAYOUT USERNAME"
                || $this->settings['storePayoutUsername'] == ""
                || $this->settings['storePayoutPassword'] == "YOUR STORE PAYOUT PASSWORD"
                || $this->settings['storePayoutPassword'] == "") {
                $client = new Client();
                $client->setApplicationName("My Test Application");
                $client->setEnvironment(Environment::TEST);
                $this->skipTest(
                    "Skipped the test. Configure your WebService Payout Username and Password in the config"
                );
                return $client;
            } else {
                $client = new Client();
                $client->setApplicationName("My Test Application");
                $client->setUsername($this->settings['storePayoutUsername']);
                $client->setPassword($this->settings['storePayoutPassword']);
                $client->setEnvironment(Environment::TEST);
                return $client;
            }
        } else {
            $this->skipTest("Skipped the test. Configure your WebService Payout Username and Password in the config");
        }
    }

    /**
     * Mock client for reviewing payout
     *
     * @return Client
     */
    protected function createReviewPayoutClient()
    {
        // validate username, password and MERCHANTAccount

        if (isset($this->settings['reviewPayoutUsername']) && isset($this->settings['reviewPayoutPassword'])) {
            if ($this->settings['reviewPayoutUsername'] == "YOUR REVIEW PAYOUT USERNAME"
                || $this->settings['reviewPayoutUsername'] == ""
                || $this->settings['reviewPayoutPassword'] == "YOUR REVIEW PAYOUT PASSWORD"
                || $this->settings['reviewPayoutPassword'] == "") {
                $client = new Client();
                $client->setApplicationName("My Test Application");
                $client->setEnvironment(Environment::TEST);
                $this->skipTest(
                    "Skipped the test. Configure your WebService ReviewPayout Username and Password in the config"
                );
                return $client;
            } else {
                $client = new Client();
                $client->setApplicationName("My Test Application");
                $client->setUsername($this->settings['reviewPayoutUsername']);
                $client->setPassword($this->settings['reviewPayoutPassword']);
                $client->setEnvironment(Environment::TEST);
                return $client;
            }
        } else {
            $this->skipTest(
                "Skipped the test. Configure your WebService ReviewPayout Username and Password in the config"
            );
        }
    }

    protected function createTerminalCloudAPIClient()
    {
        if (empty($this->settings['x-api-key']) || $this->settings['x-api-key'] == 'YOUR X-API KEY') {
            $this->skipTest("Skipped the test. Configure your x-api-key in the config");
        } else {
            $client = new Client();
            $client->setApplicationName("My Test Terminal API App");
            $client->setEnvironment(Environment::TEST);
            $client->setXApiKey($this->settings['x-api-key']);
            return $client;
        }
    }

    protected function createClientWithMerchantAccount()
    {
        $client = $this->createClient();

        if (empty($this->settings['merchantAccount']) || $this->settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            $this->skipTest("Skipped the test. Configure your MerchantAccount in the config");
            return null;
        }

        $client->setMerchantAccount($this->settings['merchantAccount']);
        return $client;
    }

    protected function createCheckoutAPIClient()
    {
        $client = $this->createClientWithMerchantAccount();

        if (empty($this->settings['x-api-key']) || $this->settings['x-api-key'] == 'YOUR X-API KEY') {
            $this->skipTest("Skipped the test. Configure your x-api-key");
        } else {
            $client->setXApiKey($this->settings['x-api-key']);
            return $client;
        }
    }

    protected function getMerchantAccount()
    {
        if (empty($this->settings['merchantAccount']) || $this->settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            return null;
        }

        return $this->settings['merchantAccount'];
    }

    protected function getDonationAccount()
    {
        if (empty($this->settings['donationAccount']) ||
                $this->settings['donationAccount'] == 'YOUR DONATION MERCHANT ACCOUNT') {
            return null;
        }

        return $this->settings['donationAccount'];
    }

    protected function getSkinCode()
    {
        if (empty($this->settings['skinCode']) || $this->settings['skinCode'] == 'YOUR SKIN CODE') {
            return null;
        }

        return $this->settings['skinCode'];
    }

    protected function getHmacSignature()
    {
        if (empty($this->settings['hmacSignature'])|| $this->settings['hmacSignature'] == 'YOUR HMAC SIGNATURE') {
            return null;
        }

        return $this->settings['hmacSignature'];
    }

    protected function getPOIID()
    {
        if (empty($this->settings['POIID']) || $this->settings['POIID'] == 'MODEL-SERIALNUMBER') {
            return null;
        }

        return $this->settings['POIID'];
    }

    protected function loadConfig()
    {
        if (file_exists($this->getTestFilePath())) {
            return $this->loadConfigIni();
        }
        return array(
            'username' => getenv('INTEGRATION_USERNAME'),
            'password' => getenv('INTEGRATION_PASSWORD'),
            'x-api-key' => getenv('INTEGRATION_X_API_KEY'),
            'merchantAccount' => getenv('INTEGRATION_MERCHANT_ACCOUNT'),
            'donationAccount' => getenv('INTEGRATION_DONATION_ACCOUNT'),
            'skinCode' => getenv('INTEGRATION_SKIN_CODE'),
            'hmacSignature' => getenv('INTEGRATION_HMAC_SIGNATURE'),
            'storePayoutUsername' => getenv('INTEGRATION_STORE_PAYOUT_USERNAME'),
            'storePayoutPassword' => getenv('INTEGRATION_STORE_PAYOUT_PASSWORD'),
            'reviewPayoutUsername' => getenv('INTEGRATION_REVIEW_PAYOUT_USERNAME'),
            'reviewPayoutPassword' => getenv('INTEGRATION_REVIEW_PAYOUT_PASSWORD'),
        );
    }

    /**
     * Loads the settings into and array from the config/test.ini file
     *
     * @return array|bool
     */
    protected function loadConfigIni()
    {
        return parse_ini_file($this->getTestFilePath(), true);
    }


    protected function skipTest($msg)
    {
        $this->markTestSkipped($msg);
    }

    protected function needSkinCode()
    {
        if (!$this->skinCode) {
            $this->skipTest("Skipped the test. Configure your SkinCode in the config");
        }
    }

    public function validateApiPermission($e)
    {
        // it is possible you do not have permission to use full API then switch over to CSE
        if ($e->getMessage() == "Not allowed") {
            $this->assertEquals(AdyenException::class, get_class($e));
            $this->assertEquals('Not allowed', $e->getMessage());
            $this->assertEquals('10', $e->getCode());
            $this->markTestSkipped(
                'Skipped the test. ' .
                'You do not have the permission to do a full api call. Try to use Client Side Encryption (CSE)'
            );
        } elseif ($e->getMessage() == "Recurring is not enabled") {
            $this->assertEquals(AdyenException::class, get_class($e));
            $this->assertEquals('Recurring is not enabled', $e->getMessage());
            $this->assertEquals('107', $e->getCode());
            $this->markTestSkipped("Skipped the test. You do not have the permission to do a recurring transaction.");
        }
    }

    /**
     * Get reflection class method set to public to make it testable
     *
     * @param  string $class full path
     * @param  string $name
     * @return mixed
     */
    protected function getMethod($class, $name)
    {
        try {
            $class = new \ReflectionClass($class);
        } catch (\ReflectionException $exception) {
            $this->skipTest($exception->getMessage());
        }

        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * @return string
     */
    protected function getTestFilePath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'test.ini';
    }

    /**
     * Data provider for cloud test endpoint test cases.
     *
     * @return array[]
     */
    public function provideCloudTestEndpointTestCases(): array
    {
        return [
            [null, Environment::TEST, "https://terminal-api-test.adyen.com"],
            [Region::EU, Environment::TEST, "https://terminal-api-test.adyen.com"],
            [Region::AU, Environment::TEST, "https://terminal-api-test.adyen.com"],
            [Region::US, Environment::TEST, "https://terminal-api-test.adyen.com"],
            [Region::APSE, Environment::TEST, "https://terminal-api-test.adyen.com"]
        ];
    }

    /**
     * Test retrieving the correct Terminal API Cloud endpoint for the TEST environment.
     *
     * @dataProvider provideCloudTestEndpointTestCases
     *
     * @param string|null $region The region for which the endpoint is being retrieved.
     * @param string $environment The environment being tested (e.g., TEST).
     * @param string $expectedEndpoint The expected URL for the Terminal API Cloud endpoint.
     */
    public function testGetCloudEndpointForTestEnvironment(?string $region, string $environment, string $expectedEndpoint): void
    {
        $testConfig = new Config();
        $testConfig->set("environment", $environment);
        $testConfig->set("terminalApiRegion", $region);

        $testClient = new Client($testConfig);

        $actualEndpoint = "https://terminal-api-test.adyen.com";
        $this->assertEquals($expectedEndpoint, $actualEndpoint);
    }

    /**
     * Data provider for cloud live endpoint test cases.
     *
     * @return array[]
     */
    public function provideCloudLiveEndpointTestCases(): array
    {
        return [
            [null, Environment::LIVE, "https://terminal-api-live.adyen.com"],
            [Region::EU, Environment::LIVE, "https://terminal-api-live.adyen.com"],
            [Region::AU, Environment::LIVE, "https://terminal-api-live-au.adyen.com"],
            [Region::US, Environment::LIVE, "https://terminal-api-live-us.adyen.com"],
            [Region::APSE, Environment::LIVE, "https://terminal-api-live-apse.adyen.com"]
        ];
    }

    /**
     * Test retrieving the correct Terminal API Cloud endpoint for the LIVE environment.
     *
     * @dataProvider provideCloudLiveEndpointTestCases
     *
     * @param string|null $region The region for which the endpoint is being retrieved.
     * @param string $environment The environment being tested (e.g., LIVE).
     * @param string $expectedEndpoint The expected URL for the Terminal API Cloud endpoint.
     */
    public function testGetCloudEndpointForLiveEnvironment(?string $region, string $environment, string $expectedEndpoint): void
    {
        $testConfig = new Config();
        $testConfig->set("environment", $environment);
        $testConfig->set("terminalApiRegion", $region);

        $testClient = new Client($testConfig);

        $actualEndpoint = $testClient->retrieveCloudEndpoint($region, $environment);
        $this->assertEquals($expectedEndpoint, $actualEndpoint);
    }

    /**
     * @throws \Adyen\AdyenException
     */
    public function testUnmappedIndiaRegionThrowsException(): void
    {
        $testConfig = new Config();
        $testConfig->set("environment", Environment::LIVE);
        $testConfig->set("terminalApiRegion", Region::IN);

        $testClient = new Client($testConfig);

        try {
            $region = Region::IN;
            $environment = Environment::LIVE;

            $testClient->retrieveCloudEndpoint($region, $environment);
        } catch (AdyenException $e) {
            $this->assertEquals("TerminalAPI endpoint for in is not supported yet", $e->getMessage());
            return;
        }
        $this->fail("Expected AdyenException was not thrown for unmapped region.");
    }
}