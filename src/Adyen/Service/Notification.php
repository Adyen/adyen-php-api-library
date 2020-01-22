<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Service;
use Adyen\Service\ResourceModel\Notification\CreateNotificationConfiguration;
use Adyen\Service\ResourceModel\Notification\DeleteNotificationConfigurations;
use Adyen\Service\ResourceModel\Notification\GetNotificationConfiguration;
use Adyen\Service\ResourceModel\Notification\GetNotificationConfigurationList;
use Adyen\Service\ResourceModel\Notification\TestNotificationConfiguration;
use Adyen\Service\ResourceModel\Notification\UpdateNotificationConfiguration;

class Notification extends Service
{

    /**
     * @var ResourceModel\Notification\CreateNotificationConfiguration
     */
    protected $createNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\UpdateNotificationConfiguration
     */
    protected $updateNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\GetNotificationConfiguration
     */
    protected $getNotificationConfiguration;

    /**
     * @var ResourceModel\Notification\DeleteNotificationConfigurations
     */
    protected $deleteNotificationConfigurations;

    /**
     * @var ResourceModel\Notification\GetNotificationConfigurationList
     */
    protected $getNotificationConfigurationList;

    /**
     * @var ResourceModel\Notification\TestNotificationConfiguration
     */
    protected $testNotificationConfiguration;

    /**
     * Notification constructor.
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->createNotificationConfiguration = new CreateNotificationConfiguration($this);
        $this->updateNotificationConfiguration = new UpdateNotificationConfiguration($this);
        $this->getNotificationConfiguration = new GetNotificationConfiguration($this);
        $this->deleteNotificationConfigurations = new DeleteNotificationConfigurations($this);
        $this->getNotificationConfigurationList = new GetNotificationConfigurationList($this);
        $this->testNotificationConfiguration = new TestNotificationConfiguration($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function createNotificationConfiguration($params)
    {
        return $this->createNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateNotificationConfiguration($params)
    {
        return $this->updateNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function getNotificationConfiguration($params)
    {
        return $this->getNotificationConfiguration->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function deleteNotificationConfigurations($params)
    {
        return $this->deleteNotificationConfigurations->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function getNotificationConfigurationList($params)
    {
        return $this->getNotificationConfigurationList->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function testNotificationConfiguration($params)
    {
        return $this->testNotificationConfiguration->request($params);
    }
}
