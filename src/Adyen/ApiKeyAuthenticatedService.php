<?php
/**
 * Created by PhpStorm.
 * User: alessio
 * Date: 5/8/18
 * Time: 10:34 AM
 */

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