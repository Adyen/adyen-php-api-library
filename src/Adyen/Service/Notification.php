<?php

namespace Adyen\Service;

class Notification extends \Adyen\Service
{

    protected $_createNotificationConfiguration;
    protected $_updateNotificationConfiguration;
    protected $_getNotificationConfiguration;
    protected $_deleteNotificationConfigurations;
    protected $_getNotificationConfigurationList;
    protected $_testNotificationConfiguration;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_createNotificationConfiguration = new \Adyen\Service\ResourceModel\Notification\CreateNotificationConfiguration($this);
        $this->_updateNotificationConfiguration = new \Adyen\Service\ResourceModel\Notification\UpdateNotificationConfiguration($this);
        $this->_getNotificationConfiguration = new \Adyen\Service\ResourceModel\Notification\GetNotificationConfiguration($this);
        $this->_deleteNotificationConfigurations = new \Adyen\Service\ResourceModel\Notification\DeleteNotificationConfigurations($this);
        $this->_getNotificationConfigurationList = new \Adyen\Service\ResourceModel\Notification\GetNotificationConfigurationList($this);
        $this->_testNotificationConfiguration = new \Adyen\Service\ResourceModel\Notification\TestNotificationConfiguration($this);
    }

    public function createNotificationConfiguration($params)
    {
        $result =  $this->_createNotificationConfiguration->request($params);
        return $result;
    }

    public function updateNotificationConfiguration($params)
    {
        $result =  $this->_updateNotificationConfiguration->request($params);
        return $result;
    }

    public function getNotificationConfiguration($params)
    {
        $result =  $this->_getNotificationConfiguration->request($params);
        return $result;
    }

    public function deleteNotificationConfigurations($params)
    {
        $result =  $this->_deleteNotificationConfigurations->request($params);
        return $result;
    }

    public function getNotificationConfigurationList($params)
    {
        $result =  $this->_getNotificationConfigurationList->request($params);
        return $result;
    }

    public function testNotificationConfiguration($params)
    {
        $result =  $this->_testNotificationConfiguration->request($params);
        return $result;
    }
}