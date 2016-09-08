<?php

namespace Adyen\Service;

class Recurring extends \Adyen\Service
{

    protected $_listRecurringDetails;
    protected $_disable;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_listRecurringDetails = new \Adyen\Service\ResourceModel\Recurring\ListRecurringDetails(
            $this);

        $this->_disable = new \Adyen\Service\ResourceModel\Recurring\Disable(
            $this,
            $this->getClient()->getConfig()->get('endpoint') . '/disable',
            array('merchantAccount', 'shopperReference'));
    }

    public function listRecurringDetails($params)
    {
        $result =  $this->_listRecurringDetails->request($params);
        return $result;
    }

    public function disable($params)
    {
        $result =  $this->_disable->request($params);
        return $result;
    }

}