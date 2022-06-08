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
    protected $getSettings;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->getSettings = $this->loadConfig();
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
     * Mock client
     *
     * @return Client
     */
    protected function createClient()
    {
        // load settings from .ini file
        $settings = $this->getSettings;

        // validate username, password and MERCHANTAccount

        if (!empty($settings['username']) &&
            $settings['username'] != "YOUR USERNAME" &&
            !empty($settings['password']) &&
            $settings['password'] != "YOUR PASSWORD"
        ) {
            $client = new Client();
            $client->setApplicationName("My Test Application");
            $client->setUsername($settings['username']);
            $client->setPassword($settings['password']);
            $client->setEnvironment(Environment::TEST);

            return $client;
        } else {
            $this->skipTest("Skipped the test. Configure your WebService Username and Password in the config");
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
        // load settings from .ini file
        $settings = $this->getSettings;

        // validate username, password and MERCHANTAccount

        if (isset($settings['storePayoutUsername']) && isset($settings['storePayoutPassword'])) {
            if ($settings['storePayoutUsername'] == "YOUR STORE PAYOUT USERNAME"
                || $settings['storePayoutUsername'] == ""
                || $settings['storePayoutPassword'] == "YOUR STORE PAYOUT PASSWORD"
                || $settings['storePayoutPassword'] == "") {
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
                $client->setUsername($settings['storePayoutUsername']);
                $client->setPassword($settings['storePayoutPassword']);
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
        // load settings from .ini file
        $settings = $this->getSettings;

        // validate username, password and MERCHANTAccount

        if (isset($settings['reviewPayoutUsername']) && isset($settings['reviewPayoutPassword'])) {
            if ($settings['reviewPayoutUsername'] == "YOUR REVIEW PAYOUT USERNAME"
                || $settings['reviewPayoutUsername'] == ""
                || $settings['reviewPayoutPassword'] == "YOUR REVIEW PAYOUT PASSWORD"
                || $settings['reviewPayoutPassword'] == "") {
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
                $client->setUsername($settings['reviewPayoutUsername']);
                $client->setPassword($settings['reviewPayoutPassword']);
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
        // load settings from .ini file
        $settings = $this->getSettings;

        if (empty($settings['x-api-key']) || $settings['x-api-key'] == 'YOUR X-API KEY') {
            $this->skipTest("Skipped the test. Configure your x-api-key in the config");
        } else {
            $client = new Client();
            $client->setApplicationName("My Test Terminal API App");
            $client->setEnvironment(Environment::TEST);
            $client->setXApiKey($settings['x-api-key']);
            return $client;
        }
    }

    protected function createClientWithMerchantAccount()
    {
        $client = $this->createClient();

        // load settings from .ini file
        $settings = $this->getSettings;

        if (empty($settings['merchantAccount']) || $settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            $this->skipTest("Skipped the test. Configure your MerchantAccount in the config");
            return null;
        }

        $client->setMerchantAccount($settings['merchantAccount']);
        return $client;
    }

    protected function createCheckoutAPIClient()
    {
        $client = $this->createClientWithMerchantAccount();

        // load settings from .ini file
        $settings = $this->getSettings;

        if (empty($settings['x-api-key']) || $settings['x-api-key'] == 'YOUR X-API KEY') {
            $this->skipTest("Skipped the test. Configure your x-api-key");
        } else {
            $client->setXApiKey($settings['x-api-key']);
            return $client;
        }
    }

    protected function getMerchantAccount()
    {
        $settings = $this->getSettings;

        if (empty($settings['merchantAccount']) || $settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            return null;
        }

        return $settings['merchantAccount'];
    }

    protected function getDonationAccount()
    {
        $settings = $this->getSettings;

        if (empty($settings['donationAccount']) || $settings['donationAccount'] == 'YOUR DONATION MERCHANT ACCOUNT') {
            return null;
        }

        return $settings['donationAccount'];
    }

    protected function getSkinCode()
    {
        $settings = $this->getSettings;

        if (empty($settings['skinCode']) || $settings['skinCode'] == 'YOUR SKIN CODE') {
            return null;
        }

        return $settings['skinCode'];
    }

    protected function getHmacSignature()
    {
        $settings = $this->getSettings;

        if (empty($settings['hmacSignature'])|| $settings['hmacSignature'] == 'YOUR HMAC SIGNATURE') {
            return null;
        }

        return $settings['hmacSignature'];
    }

    protected function getPOIID()
    {
        $settings = $this->getSettings;

        if (empty($settings['POIID']) || $settings['POIID'] == 'MODEL-SERIALNUMBER') {
            return null;
        }

        return $settings['POIID'];
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
}
