<?php

namespace Adyen;

use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Client
{
    const LIB_VERSION = "1.5.0";
    const USER_AGENT_SUFFIX = "adyen-php-api-library/";
    const ENDPOINT_TEST = "https://pal-test.adyen.com";
    const ENDPOINT_LIVE = "https://pal-live.adyen.com";
    const ENDPOINT_TEST_DIRECTORY_LOOKUP = "https://test.adyen.com/hpp/directory/v2.shtml";
    const ENDPOINT_LIVE_DIRECTORY_LOOKUP = "https://live.adyen.com/hpp/directory/v2.shtml";
    const API_VERSION = "v30";
    const API_RECURRING_VERSION = "v25";
    const API_CHECKOUT_VERSION = "v32";
    const API_CHECKOUT_UTILITY_VERSION = "v1";
    const API_NOTIFICATION_VERSION = "v1";
    const TERMINAL_CLOUD_TEST = "https://terminal-api-test.adyen.com";
    const TERMINAL_CLOUD_LIVE = "https://terminal-api-live.adyen.com";
    const ENDPOINT_CHECKOUT_TEST = "https://checkout-test.adyen.com";
    const ENDPOINT_CHECKOUT_LIVE = "https://checkout-live.adyen.com";
    const ENPOINT_NOTIFICATION_TEST = "https://cal-test.adyen.com";
    const ENPOINT_NOTIFICATION_LIVE = "https://cal-live.adyen.com";

    /**
     * @var Adyen_Config $config
     */
    private $_config;
    private $_httpClient;

    /**
     * @var Adyen_Logger_Abstract $logger
     */
    private $logger;

    /**
     * Client constructor.
     * @param null $config
     * @throws AdyenException
     */
    public function __construct($config = null)
    {
        if (!$config) {
            // create config
            $this->_config = new \Adyen\Config();
        } elseif ($config instanceof \Adyen\ConfigInterface) {
            $this->_config = $config;
        } else {
            throw new \Adyen\AdyenException("This config object is not supported, you need to implement the ConfigInterface");
        }
    }

    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Set Username of Web Service User
     *
     * @param $username
     */
    public function setUsername($username)
    {
        $this->_config->set('username', $username);
    }


    /**
     * Set Password of Web Service User
     *
     * @param $password
     */
    public function setPassword($password)
    {
        $this->_config->set('password', $password);
    }

    /**
     * Set x-api-key for Web Service Client
     *
     * @param $xapikey
     */
    public function setXApiKey($xApiKey)
    {
        $this->_config->set('x-api-key', $xApiKey);
    }

    /**
     * Set environment to connect to test or live platform of Adyen
     *
     * @param $environment
     * @throws AdyenException
     */
    public function setEnvironment($environment)
    {
        if ($environment == \Adyen\Environment::TEST) {
            $this->_config->set('environment', \Adyen\Environment::TEST);
            $this->_config->set('endpoint', self::ENDPOINT_TEST);
            $this->_config->set('endpointDirectorylookup', self::ENDPOINT_TEST_DIRECTORY_LOOKUP);
            $this->_config->set('endpointTerminalCloud', self::TERMINAL_CLOUD_TEST);
            $this->_config->set('endpointCheckout', self::ENDPOINT_CHECKOUT_TEST);
            $this->_config->set('endpointNotification', self::ENPOINT_NOTIFICATION_TEST);
        } elseif ($environment == \Adyen\Environment::LIVE) {
            $this->_config->set('environment', \Adyen\Environment::LIVE);
            $this->_config->set('endpoint', self::ENDPOINT_LIVE);
            $this->_config->set('endpointDirectorylookup', self::ENDPOINT_LIVE_DIRECTORY_LOOKUP);
            $this->_config->set('endpointTerminalCloud', self::TERMINAL_CLOUD_LIVE);
            $this->_config->set('endpointCheckout', self::ENDPOINT_CHECKOUT_LIVE);
            $this->_config->set('endpointNotification', self::ENPOINT_NOTIFICATION_LIVE);
        } else {
            // environment does not exist
            $msg = "This environment does not exist, use " . \Adyen\Environment::TEST . ' or ' . \Adyen\Environment::LIVE;
            throw new \Adyen\AdyenException($msg);
        }
    }

    /**
     * Set Request URl
     *
     * @param $url
     */
    public function setRequestUrl($url)
    {
        $this->_config->set('endpoint', $url);
    }

    /**
     * Set directory lookup URL
     *
     * @param $url
     */
    public function setDirectoryLookupUrl($url)
    {
        $this->_config->set('endpointDirectorylookup', $url);
    }

    public function setMerchantAccount($merchantAccount)
    {
        $this->_config->set('merchantAccount', $merchantAccount);
    }

    public function setApplicationName($applicationName)
    {
        $this->_config->set('applicationName', $applicationName);
    }

    /**
     * Type can be json or array
     *
     * @param $value
     */
    public function setInputType($value)
    {
        $this->_config->set('inputType', $value);
    }

    /**
     * Type can be json or array
     *
     * @param $value
     */
    public function setOutputType($value)
    {
        $this->_config->set('outputType', $value);
    }

    public function setTimeout($value)
    {
        $this->_config->set('timeout', $value);
    }


    /**
     * Get the library version
     *
     * @return string
     */
    public function getLibraryVersion()
    {
        return self::LIB_VERSION;
    }

    /**
     * Get the version of the API endpoint
     *
     * @return string
     */
    public function getApiVersion()
    {
        return self::API_VERSION;
    }

    /**
     * Get the version of the Recurring API endpoint
     *
     * @return string
     */
    public function getApiRecurringVersion()
    {
        return self::API_RECURRING_VERSION;
    }

    /**
     * Get the version of the Checkout API endpoint
     *
     * @return string
     */
    public function getApiCheckoutVersion()
    {
        return self::API_CHECKOUT_VERSION;
    }

    /**
     * Get the version of the Checkout Utility API endpoint
     *
     * @return string
     */
    public function getApiCheckoutUtilityVersion()
    {
        return self::API_CHECKOUT_UTILITY_VERSION;
    }

    /**
     * Get the version of the Notification API endpoint
     *
     * @return string
     */
    public function getApiNotificationVersion()
    {
        return self::API_NOTIFICATION_VERSION;
    }

    /**
     * @param HttpClient\ClientInterface $httpClient
     */
    public function setHttpClient(\Adyen\HttpClient\ClientInterface $httpClient)
    {
        $this->_httpClient = $httpClient;
    }

    /**
     * @return mixed
     */
    public function getHttpClient()
    {
        if (is_null($this->_httpClient)) {
            $this->_httpClient = $this->_createDefaultHttpClient();
        }
        return $this->_httpClient;
    }

    protected function _createDefaultHttpClient()
    {
        return new \Adyen\HttpClient\CurlClient();
    }

    /**
     * Set the Logger object
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return \Psr\Log\LoggerInterface implementation
     */
    public function getLogger()
    {
        if (!isset($this->logger)) {
            $this->logger = $this->createDefaultLogger();
        }

        return $this->logger;
    }

    protected function createDefaultLogger()
    {
        $logger = new Logger('adyen-php-api-library');
        $logger->pushHandler(new StreamHandler('php://stderr', Logger::NOTICE));

        return $logger;
    }
}
