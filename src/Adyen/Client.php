<?php

namespace Adyen;

use Adyen\HttpClient\ClientInterface;
use Adyen\HttpClient\CurlClient;

class Client
{
    const LIB_VERSION = "15.4.0";
    const LIB_NAME = "adyen-php-api-library";
    const USER_AGENT_SUFFIX = "adyen-php-api-library/";
    const ENDPOINT_TEST = "https://pal-test.adyen.com";
    const ENDPOINT_LIVE = "https://pal-live.adyen.com";
    const ENDPOINT_LIVE_SUFFIX = "-pal-live.adyenpayments.com";
    const ENDPOINT_TEST_DIRECTORY_LOOKUP = "https://test.adyen.com/hpp/directory/v2.shtml";
    const ENDPOINT_LIVE_DIRECTORY_LOOKUP = "https://live.adyen.com/hpp/directory/v2.shtml";
    const API_PAYMENT_VERSION = "v51";
    const API_BIN_LOOKUP_VERSION = "v50";
    const API_PAYOUT_VERSION = "v51";
    const API_RECURRING_VERSION = "v49";
    const API_CHECKOUT_VERSION = "v70";
    const API_CHECKOUT_UTILITY_VERSION = "v1";
    const API_NOTIFICATION_VERSION = "v6";
    const API_ACCOUNT_VERSION = "v6";
    const API_FUND_VERSION = "v6";
    const API_DISPUTE_SERVICE_VERSION = "v30";
    const API_HOP_VERSION = "v6";
    const ENDPOINT_TERMINAL_CLOUD_TEST = "https://terminal-api-test.adyen.com";
    const ENDPOINT_TERMINAL_CLOUD_LIVE = "https://terminal-api-live.adyen.com";
    const ENDPOINT_TERMINAL_CLOUD_US_LIVE = "https://terminal-api-live-us.adyen.com";
    const ENDPOINT_TERMINAL_CLOUD_AU_LIVE = "https://terminal-api-live-au.adyen.com";
    const ENDPOINT_CHECKOUT_TEST = "https://checkout-test.adyen.com";
    const ENDPOINT_CHECKOUT_LIVE_SUFFIX = "-checkout-live.adyenpayments.com/checkout";
    const ENDPOINT_PROTOCOL = "https://";
    const ENDPOINT_NOTIFICATION_TEST = "https://cal-test.adyen.com/cal/services/Notification";
    const ENDPOINT_NOTIFICATION_LIVE = "https://cal-live.adyen.com/cal/services/Notification";
    const ENDPOINT_ACCOUNT_TEST = "https://cal-test.adyen.com/cal/services/Account";
    const ENDPOINT_ACCOUNT_LIVE = "https://cal-live.adyen.com/cal/services/Account";
    const ENDPOINT_FUND_TEST = "https://cal-test.adyen.com/cal/services/Fund";
    const ENDPOINT_FUND_LIVE = "https://cal-live.adyen.com/cal/services/Fund";
    const ENDPOINT_DISPUTE_SERVICE_TEST = "https://ca-test.adyen.com/ca/services/DisputeService";
    const ENDPOINT_DISPUTE_SERVICE_LIVE = "https://ca-live.adyen.com/ca/services/DisputeService";
    const ENDPOINT_CUSTOMER_AREA_TEST = "https://ca-test.adyen.com";
    const ENDPOINT_CUSTOMER_AREA_LIVE = "https://ca-live.adyen.com";
    const ENDPOINT_HOP_TEST = "https://cal-test.adyen.com/cal/services/Hop";
    const ENDPOINT_HOP_LIVE = "https://cal-live.adyen.com/cal/services/Hop";
    const MANAGEMENT_API_TEST = "https://management-test.adyen.com";
    const MANAGEMENT_API_LIVE = "https://management-live.adyen.com";
    const MANAGEMENT_API = "v1";

    /**
     * @var Config
     */
    private $config;

    /**
     * @var ClientInterface|null
     */
    private $httpClient;

    public function __construct(?Config $config = null)
    {
        $this->config = $config ?? new Config();
    }

    public function getConfig(): ?Config
    {
        return $this->config;
    }

    /**
     * Set Username of Web Service User
     *
     * @param $username
     */
    public function setUsername($username)
    {
        $this->config->set('username', $username);
    }

    /**
     * Set Password of Web Service User
     *
     * @param $password
     */
    public function setPassword($password)
    {
        $this->config->set('password', $password);
    }

    /**
     * Set x-api-key for Web Service Client
     *
     * @param $xApiKey
     */
    public function setXApiKey($xApiKey)
    {
        $this->config->set('x-api-key', $xApiKey);
    }

    /**
     * Set HTTP proxy information
     *
     * @param string $proxy
     */
    public function setHttpProxy(string $proxy)
    {
        $this->config->set('http-proxy', $proxy);
    }

    /**
     * Set the path to a CA bundle file that enables verification using a custom certificate
     *
     * @param string $certFilePath
     */
    public function setSslVerify(string $certFilePath)
    {
        $this->config->set('ssl-verify', $certFilePath);
    }

    /**
     * Set environment to connect to test or live platform of Adyen
     * For live please specify the unique identifier.
     *
     * @param string $environment
     * @param string|null $liveEndpointUrlPrefix Provide the unique live url prefix from the "API URLs and Response"
     *                                           menu in the Adyen Customer Area
     * @throws AdyenException
     */
    public function setEnvironment(string $environment, ?string $liveEndpointUrlPrefix = null)
    {
        if ($environment == Environment::TEST) {
            $this->config->set('environment', Environment::TEST);
            $this->config->set('endpoint', self::ENDPOINT_TEST);
            $this->config->set('endpointTerminalCloud', self::ENDPOINT_TERMINAL_CLOUD_TEST);
            $this->config->set('endpointCheckout', self::ENDPOINT_CHECKOUT_TEST);
            $this->config->set('endpointNotification', self::ENDPOINT_NOTIFICATION_TEST);
            $this->config->set('endpointAccount', self::ENDPOINT_ACCOUNT_TEST);
            $this->config->set('endpointFund', self::ENDPOINT_FUND_TEST);
            $this->config->set('endpointDisputeService', self::ENDPOINT_DISPUTE_SERVICE_TEST);
            $this->config->set('endpointCustomerArea', self::ENDPOINT_CUSTOMER_AREA_TEST);
            $this->config->set('endpointHop', self::ENDPOINT_HOP_TEST);
            $this->config->set('endpointManagementApi', self::MANAGEMENT_API_TEST);
        } elseif ($environment == Environment::LIVE) {
            $this->config->set('environment', Environment::LIVE);
            $this->config->set('endpointTerminalCloud', self::ENDPOINT_TERMINAL_CLOUD_LIVE);
            $this->config->set('endpointNotification', self::ENDPOINT_NOTIFICATION_LIVE);
            $this->config->set('endpointAccount', self::ENDPOINT_ACCOUNT_LIVE);
            $this->config->set('endpointFund', self::ENDPOINT_FUND_LIVE);
            $this->config->set('endpointDisputeService', self::ENDPOINT_DISPUTE_SERVICE_LIVE);
            $this->config->set('endpointCustomerArea', self::ENDPOINT_CUSTOMER_AREA_LIVE);
            $this->config->set('endpointHop', self::ENDPOINT_HOP_LIVE);
            $this->config->set('endpointManagementApi', self::MANAGEMENT_API_LIVE);

            if ($liveEndpointUrlPrefix) {
                $this->config->set('prefix', $liveEndpointUrlPrefix);
                $this->config->set(
                    'endpoint',
                    self::ENDPOINT_PROTOCOL . $liveEndpointUrlPrefix . self::ENDPOINT_LIVE_SUFFIX
                );
                $this->config->set(
                    'endpointCheckout',
                    self::ENDPOINT_PROTOCOL . $liveEndpointUrlPrefix . self::ENDPOINT_CHECKOUT_LIVE_SUFFIX
                );
            } else {
                $this->config->set('endpoint', self::ENDPOINT_LIVE);
                $this->config->set('endpointCheckout', null); // not supported please specify unique identifier
            }
        } else {
            // environment does not exist
            $msg = "This environment does not exist, use " . Environment::TEST . ' or ' . Environment::LIVE;
            throw new AdyenException($msg);
        }
    }

    /**
     * Set Request URl
     *
     * @param $url
     */
    public function setRequestUrl($url)
    {
        $this->config->set('endpoint', $url);
    }

    /**
     * @param $merchantAccount
     */
    public function setMerchantAccount($merchantAccount)
    {
        $this->config->set('merchantAccount', $merchantAccount);
    }

    /**
     * @param $applicationName
     */
    public function setApplicationName($applicationName)
    {
        $this->config->set('applicationName', $applicationName);
    }

    /**
     * Set external platform name, version and integrator
     *
     * @param string $name
     * @param string $version
     * @param string $integrator
     */
    public function setExternalPlatform(string $name, string $version, string $integrator = "")
    {
        $this->config->set(
            'externalPlatform',
            array('name' => $name, 'version' => $version, 'integrator' => $integrator)
        );
    }

    /**
     * Set Adyen payment source name and version
     *
     * @param string $name
     * @param string $version
     */
    public function setAdyenPaymentSource(string $name, string $version)
    {
        $this->config->set('adyenPaymentSource', ['name' => $name, 'version' => $version]);
    }

    /**
     * Set merchant application name and version
     *
     * @param string $name
     * @param string $version
     */
    public function setMerchantApplication(string $name, string $version)
    {
        $this->config->set('merchantApplication', ['name' => $name, 'version' => $version]);
    }

    /**
     * Type can be json or array
     *
     * @param $value
     */
    public function setInputType($value)
    {
        $this->config->set('inputType', $value);
    }

    /**
     * Type can be json or array
     *
     * @param $value
     */
    public function setOutputType($value)
    {
        $this->config->set('outputType', $value);
    }

    /**
     * @param $value
     */
    public function setTimeout($value)
    {
        $this->config->set('timeout', $value);
    }

    /**
     * Get the library name
     *
     * @return string
     * @deprecated
     */
    public function getLibraryName(): string
    {
        return self::LIB_NAME;
    }

    /**
     * Get the library version
     *
     * @return string
     * @deprecated
     */
    public function getLibraryVersion(): string
    {
        return self::LIB_VERSION;
    }

    /**
     * Get the version of the API Payment endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiPaymentVersion(): string
    {
        return self::API_PAYMENT_VERSION;
    }

    /**
     * Get the version of the API BinLookUp endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiBinLookupVersion(): string
    {
        return self::API_BIN_LOOKUP_VERSION;
    }

    /**
     * Get the version of the API Payout endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiPayoutVersion(): string
    {
        return self::API_PAYOUT_VERSION;
    }

    /**
     * Get the version of the Recurring API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiRecurringVersion(): string
    {
        return self::API_RECURRING_VERSION;
    }

    /**
     * Get the version of the Checkout API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiCheckoutVersion(): string
    {
        return self::API_CHECKOUT_VERSION;
    }

    /**
     * Get the version of the Checkout Utility API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiCheckoutUtilityVersion(): string
    {
        return self::API_CHECKOUT_UTILITY_VERSION;
    }

    /**
     * Get the version of the Notification API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiNotificationVersion(): string
    {
        return self::API_NOTIFICATION_VERSION;
    }

    /**
     * Get the version of the Account API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiAccountVersion(): string
    {
        return self::API_ACCOUNT_VERSION;
    }

    /**
     * Get the version of the HOP (Hosted Onboarding Page) API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiHopVersion(): string
    {
        return self::API_HOP_VERSION;
    }

    /**
     * Get the version of the Fund API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getApiFundVersion(): string
    {
        return self::API_FUND_VERSION;
    }

    /**
     * Get the disputes service API version
     *
     * @return string
     * @deprecated
     */
    public function getDisputeServiceVersion(): string
    {
        return self::API_DISPUTE_SERVICE_VERSION;
    }

    /**
     * Get the version of the management API endpoint
     *
     * @return string
     * @deprecated
     */
    public function getManagementApiVersion(): string
    {
        return self::MANAGEMENT_API;
    }

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        if ($this->httpClient === null) {
            $this->httpClient = $this->createDefaultHttpClient();
        }
        return $this->httpClient;
    }

    /**
     * @return CurlClient
     */
    protected function createDefaultHttpClient(): CurlClient
    {
        return new CurlClient();
    }

    /**
     * @param string $region
     * @return void
     * @throws AdyenException
     */
    public function setRegion(string $region): void
    {
        if (!in_array($region, Region::VALID_REGIONS)) {
            throw new AdyenException('Trying to set an invalid region!');
        }

        $this->config->set('region', $region);
    }
}
