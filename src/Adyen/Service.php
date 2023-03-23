<?php

namespace Adyen;

use PHPUnit\Util\Exception;

class Service
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var bool
     */
    protected $requiresApiKey = false;

    /**
     * Service constructor.
     *
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        $msg = null;

        // validate if client has all the configuration we need
        if (!$client->getConfig()->get('environment')) {
            // throw exception
            $msg = 'The Client does not have a correct environment, use ' .
                \Adyen\Environment::TEST . ' or ' . \Adyen\Environment::LIVE;
            throw new \Adyen\AdyenException($msg);
        }

        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @throws AdyenException
     */
    protected function requestHttp(
        string $url,
        string $method = 'get',
        array $bodyParams = null,
        array $requestOptions = null
    ): array {
        // check if rest api method has a value
        if (!$method) {
            $msg = 'The REST API method is empty';
            $this->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }
        // check if rest api method has a value
        if (!$url) {
            $msg = 'The REST API endpoint is empty';
            $this->getClient()->getLogger()->error($msg);
            throw new AdyenException($msg);
        }
        $curlClient = $this->getClient()->getHttpClient();
        return $curlClient->requestHttpRest($this, $url, $bodyParams, $method, $requestOptions);
    }

    /**
     * @return bool
     */
    public function requiresApiKey()
    {
        return $this->requiresApiKey;
    }

    /**
     * @param string $url
     * @return string
     * @throws AdyenException
     */
    protected function createBaseUrl(string $url): string
    {
        $config = $this->getClient()->getConfig();
        if ($this->getClient()->getConfig()->getEnvironment() === \Adyen\Environment::LIVE) {
            // Replace 'test' in string with 'live'
            $url = str_replace('-test', '-live', $url);


            // Add live url prefix if needed (that is url contains pal/checkout)
            if (strpos($url, "checkout-") !== false || strpos($url, "pal-") !== false) {
                // Check prefix is not empty and if so throw error
                if ($config->get('prefix') == null) {
                    throw new \Adyen\AdyenException("Please add your live URL prefix from CA under Developers > API URLs > Prefix");
                }
                // We inject the prefix formatted like "https://{PREFIX}-"
                $url = str_replace("https://", "https://" . $config->get('prefix') . '-', $url);
                // Replaces the adyen in url with adyenpayments
                $url = str_replace(".adyen.com/", ".adyenpayments.com/", $url);
            }
        }
        return $url;
    }
}
