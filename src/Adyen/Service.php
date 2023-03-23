<?php

namespace Adyen;

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
     */
    protected function createBaseUrl(string $url): string
    {
        $config = $this->getClient()->getConfig();
        if ($this->getClient()->getConfig()->getEnvironment() === \Adyen\Environment::LIVE) {
            // Replace test in string with live
            $url = str_replace('test', 'live', $url);

            // Add live url prefix if needed (that is url contains pal/checkout
            if (strpos($url, "checkout") !== false || strpos($url, "pal") !== false) {
                // We inject (length = 0) a string (=prefix) in the url (on position/offset 8), which is directly after
                // the "https://"
                $url = substr_replace($url, $config->get('prefix') . '-', 8, 0);
            }
        }
        return $url;
    }
}
