<?php

namespace Adyen;

class Service
{
    private $client;

    public function __construct(\Adyen\Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

}