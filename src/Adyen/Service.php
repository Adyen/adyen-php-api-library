<?php

namespace Adyen;

class Service
{
    private $client;
    protected $_requiresApiKey = false;

    public function __construct(\Adyen\Client $client)
    {
        $msg = null;

        // validate if client has all the configuration we need
        if(!$client->getConfig()->get('environment')) {
            // throw exception
            $msg = "The Client does not have a correct environment, use " . \Adyen\Environment::TEST . ' or ' . \Adyen\Environment::LIVE;
            throw new \Adyen\AdyenException($msg);
        }

        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function requiresApiKey()
    {
        return $this->_requiresApiKey;
    }

}