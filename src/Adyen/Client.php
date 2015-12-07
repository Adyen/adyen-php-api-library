<?php

namespace Adyen;

use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Client
{
    const LIBVERSION                    = "0.1.0";
    const USER_AGENT_SUFFIX             = "adyen-php-api-library/";
    const ENDPOINT_TEST                 = "https://pal-test.adyen.com";
    const ENDPOINT_LIVE                 = "https://pal-live.adyen.com";
    const ENPOINT_TEST_DIRECTORY_LOOKUP = "https://test.adyen.com/hpp/directory.shtml";
    const ENPOINT_LIVE_DIRECTORY_LOOKUP = "https://live.adyen.com/hpp/directory.shtml";

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
     * @param $config
     */
    public function __construct($config = null)
    {
        if(!$config) {
            // create config
            $this->_config = new \Adyen\Config();
        }else {
            $this->_config = $config;
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
     * Set modus
     *
     * @param $modus
     */
    public function setModus($modus)
    {
        if($modus == 'test') {
            $this->_config->set('endpoint', self::ENDPOINT_TEST);
            $this->_config->set('endpointDirectorylookup', self::ENPOINT_TEST_DIRECTORY_LOOKUP);
        } elseif($modus == 'live') {
            $this->_config->set('endpoint', self::ENDPOINT_LIVE);
            $this->_config->set('endpointDirectorylookup', self::ENPOINT_LIVE_DIRECTORY_LOOKUP);
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

    public function setMerchantAccount($merchantAccount)
    {
        $this->_config->set('merchantAccount', $merchantAccount);
    }

    public function setApplicationName($applicationName) {
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


    /**
     * Get the library version
     *
     * @return string
     */
    public function getLibraryVersion()
    {
        return self::LIBVERSION;
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