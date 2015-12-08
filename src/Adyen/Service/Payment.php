<?php

namespace Adyen\Service;

class Payment extends \Adyen\Service
{

    protected $_authorise;
    protected $_authorise3D;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_auhtorise = new \Adyen\Service\Resource\Payment\Authorise($this);
        $this->_authorise3D = new \Adyen\Service\Resource\Payment\Authorise3D($this);

    }

    public function authorise($params)
    {
        $result =  $this->_auhtorise->request($params);
        return $result;
    }

    public function authorise3D($params)
    {
        $result = $this->_authorise3D->request($params);
        return $result;
    }



}