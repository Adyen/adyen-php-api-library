<?php

namespace Adyen\Service;

class Notification extends \Adyen\Service
{

    /**
     * @var ResourceModel\Notification\CreateNotificationConfiguration
     */
    protected $_createNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\UpdateNotificationConfiguration
     */
    protected $_updateNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\GetNotificationConfiguration
     */
    protected $_getNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\DeleteNotificationConfigurations
     */
    protected $_deleteNotificationConfigurations;

    /**
     * @var ResourceModel\Notification\GetNotificationConfigurationList
     */
    protected $_getNotificationConfigurationList;

    /**
     * @var ResourceModel\Notification\TestNotificationConfiguration
     */
    protected $_testNotificationConfiguration;

    /**
     * Notification constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
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

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function createNotificationConfiguration($params)
    {
        return $this->_createNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateNotificationConfiguration($params)
    {
        return $this->_updateNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getNotificationConfiguration($params)
    {
        return $this->_getNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteNotificationConfigurations($params)
    {
        return $this->_deleteNotificationConfigurations->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getNotificationConfigurationList($params)
    {
        return $this->_getNotificationConfigurationList->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function testNotificationConfiguration($params)
    {
        return $this->_testNotificationConfiguration->request($params);
    }
}