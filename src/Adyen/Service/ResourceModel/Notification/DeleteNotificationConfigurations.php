<?php

namespace Adyen\Service\ResourceModel\Notification;

class DeleteNotificationConfigurations extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * DeleteNotificationConfigurations constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/' . $service->getClient()->getApiNotificationVersion() . '/deleteNotificationConfigurations';
        parent::__construct($service, $this->_endpoint);
    }
}