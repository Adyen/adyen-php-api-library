<?php

namespace Adyen\Service;


class CheckoutUtility extends \Adyen\ApiKeyAuthenticatedService
{
    protected $_originKeys;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_originKeys = new \Adyen\Service\ResourceModel\CheckoutUtility\OriginKeys($this);

    }

    public function originKeys($params)
    {
        $result = $this->_originKeys->request($params);
        return $result;
    }

}