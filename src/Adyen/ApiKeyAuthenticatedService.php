<?php

namespace Adyen;


class ApiKeyAuthenticatedService extends Service
{
    protected $_requiresApiKey;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->_requiresApiKey = true;
    }
}