<?php

namespace Adyen\Service;

class Payment extends \Adyen\Service
{

    protected $_authorise;
    protected $_authorise3D;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_authorise = new \Adyen\Service\ResourceModel\Payment\Authorise($this);
        $this->_authorise3D = new \Adyen\Service\ResourceModel\Payment\Authorise3D($this);

    }

    public function authorise($params)
    {
        $result =  $this->_authorise->request($params);
        return $result;
    }

    public function authorise3D($params)
    {
        $result = $this->_authorise3D->request($params);
        return $result;
    }



}
