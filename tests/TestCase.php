<?php

namespace Adyen;

class TestCase extends \PHPUnit_Framework_TestCase
{

    protected $_merchantAccount;
    protected $_skinCode;
    protected $_hmacSignature;

	/**
	 * Settings parsed from the config/test.ini file
	 *
	 * @var array
	 */
    protected $settings;

    public function __construct()
    {
        $this->_merchantAccount = $this->getMerchantAccount();
        $this->_skinCode = $this->getSkinCode();
        $this->_hmacSignature = $this->getHmacSignature();
		$this->settings = $this->_loadConfigIni();

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
	 * @return \Adyen\Client
	 */
	protected function createClient()
	{
		// load settings from .ini file
		$settings = $this->settings;

		// validate username, password and MERCHANTAccount

		if(isset($settings['username']) && isset($settings['password'])) {

			if($settings['username'] == "YOUR USERNAME"
				|| $settings['username'] == ""
				|| $settings['password'] == "YOUR PASSWORD"
				|| $settings['password'] == "")
			{
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setEnvironment(\Adyen\Environment::TEST);
				$this->_skipTest("Skipped the test. Configure your WebService Username and Password in the config");
				return $client;
			} else {
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setUsername($settings['username']);
				$client->setPassword($settings['password']);
				$client->setEnvironment(\Adyen\Environment::TEST);
				return $client;
			}
		} else {
			$this->_skipTest("Skipped the test. Configure your WebService Username and Password in the config");
		}
	}

	/**
	 * Mock client object without configuring the config/test.ini
	 *
	 * @return \Adyen\Client
	 */
	protected function createClientWithoutTestIni()
	{
		try	{
			$client = new \Adyen\Client();
			$client->setApplicationName("My Test Application");
			$client->setEnvironment(\Adyen\Environment::TEST);
		} catch (\Adyen\AdyenException $exception) {
			$this->_skipTest($exception->getMessage());
		}

		return $client;
	}

	/**
	 * Mock client for payout
	 *
	 * @return \Adyen\Client
	 */
	protected function createPayoutClient()
	{
		// load settings from .ini file
		$settings = $this->settings;

		// validate username, password and MERCHANTAccount

		if(isset($settings['storePayoutUsername']) && isset($settings['storePayoutPassword'])) {

			if($settings['storePayoutUsername'] == "YOUR STORE PAYOUT USERNAME"
				|| $settings['storePayoutUsername'] == ""
				|| $settings['storePayoutPassword'] == "YOUR STORE PAYOUT PASSWORD"
				|| $settings['storePayoutPassword'] == "")
			{
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setEnvironment(\Adyen\Environment::TEST);
				$this->_skipTest("Skipped the test. Configure your WebService Payout Username and Password in the config");
				return $client;
			} else {
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setUsername($settings['storePayoutUsername']);
				$client->setPassword($settings['storePayoutPassword']);
				$client->setEnvironment(\Adyen\Environment::TEST);
				return $client;
			}
		} else {
			$this->_skipTest("Skipped the test. Configure your WebService Payout Username and Password in the config");
		}
	}

	/**
	 * Mock client for reviewing payout
	 *
	 * @return \Adyen\Client
	 */
	protected function createReviewPayoutClient()
	{
		// load settings from .ini file
		$settings = $this->settings;

		// validate username, password and MERCHANTAccount

		if(isset($settings['reviewPayoutUsername']) && isset($settings['reviewPayoutPassword'])) {

			if($settings['reviewPayoutUsername'] == "YOUR REVIEW PAYOUT USERNAME"
				|| $settings['reviewPayoutUsername'] == ""
				|| $settings['reviewPayoutPassword'] == "YOUR REVIEW PAYOUT PASSWORD"
				|| $settings['reviewPayoutPassword'] == "")
			{
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setEnvironment(\Adyen\Environment::TEST);
				$this->_skipTest("Skipped the test. Configure your WebService ReviewPayout Username and Password in the config");
				return $client;
			} else {
				$client = new \Adyen\Client();
				$client->setApplicationName("My Test Application");
				$client->setUsername($settings['reviewPayoutUsername']);
				$client->setPassword($settings['reviewPayoutPassword']);
				$client->setEnvironment(\Adyen\Environment::TEST);
				return $client;
			}
		} else {
			$this->_skipTest("Skipped the test. Configure your WebService ReviewPayout Username and Password in the config");
		}
	}

	protected function createTerminalCloudAPIClient()
    {
        // load settings from .ini file
        $settings = $this->settings;

        if(!isset($settings['x-api-key']) || !isset($settings['POIID']) || $settings['x-api-key'] == 'YOUR X-API KEY' || $settings['POIID'] == 'UNIQUETERMINALID'){
            $this->_skipTest("Skipped the test. Configure your x-api-key and POIID in the config");
        }else{

            $client = new \Adyen\Client();
            $client->setApplicationName("My Test Terminal API App");
            $client->setEnvironment(\Adyen\Environment::TEST);
            $client->setXApiKey($settings['x-api-key']);
            return $client;

        }
    }

    protected function createClientWithMerchantAccount()
    {
        $client = $this->createClient();

        // load settings from .ini file
        $settings = $this->settings;

        if(!isset($settings['merchantAccount']) || $settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            $this->_skipTest("Skipped the test. Configure your MerchantAccount in the config");
            return null;
        }

        $client->setMerchantAccount($settings['merchantAccount']);
        return $client;
    }

    protected function getMerchantAccount()
    {
        $settings = $this->settings;

        if(!isset($settings['merchantAccount']) || $settings['merchantAccount'] == 'YOUR MERCHANTACCOUNT') {
            return null;
        }

        return $settings['merchantAccount'];
    }

    protected function getSkinCode()
    {
        $settings = $this->settings;

        if(!isset($settings['skinCode']) || $settings['skinCode'] == 'YOUR SKIN CODE') {
            return null;
        }

        return $settings['skinCode'];
    }

    protected function getHmacSignature()
    {
        $settings = $this->settings;

        if(!isset($settings['hmacSignature'])|| $settings['hmacSignature'] == 'YOUR HMAC SIGNATURE') {
            return null;
        }

        return $settings['hmacSignature'];
    }

    protected function getPOIID()
    {
        $settings = $this->settings;

        if(!isset($settings['POIID']) || $settings['POIID'] == 'MODEL-SERIALNUMBER') {
            return null;
        }

        return $settings['POIID'];
    }

	/**
	 * Loads the settings into and array from the config/test.ini file
	 *
	 * @return array|bool
	 */
    protected function _loadConfigIni()
    {
        return parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'test.ini', true);
    }


    protected function _skipTest($msg)
    {
        $this->markTestSkipped($msg);
    }

	protected function _needSkinCode() {
		if (!$this->_skinCode) {
			$this->_skipTest("Skipped the test. Configure your SkinCode in the config");
		}
	}
	
    public function validateApiPermission($e)
    {
        // it is possible you do not have permission to use full API then switch over to CSE
        if($e->getMessage() == "Not allowed") {
            $this->assertEquals('Adyen\AdyenException', get_class($e));
            $this->assertEquals('Not allowed', $e->getMessage());
            $this->assertEquals('10', $e->getCode());
            $this->markTestSkipped("Skipped the test. You do not have the permission to do a full api call. Try to use Client Side Encryption (CSE)");
        } elseif($e->getMessage() == "Recurring is not enabled") {
            $this->assertEquals('Adyen\AdyenException', get_class($e));
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
	protected function getMethod($class, $name) {
		try {
			$class = new \ReflectionClass($class);
		} catch (\ReflectionException $exception) {
			$this->_skipTest($exception->getMessage());
		}

		$method = $class->getMethod($name);
		$method->setAccessible(true);
		return $method;
	}
}
