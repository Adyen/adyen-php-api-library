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
    protected function requestHttp($url, $method = 'get', array $bodyParams = null, $requestOptions = null)
    {
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
}
