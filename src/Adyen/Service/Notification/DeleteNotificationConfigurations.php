<?php

namespace Adyen\Service\ResourceModel\Notification;

class DeleteNotificationConfigurations extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'notificationIds',
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/cal/services/Notification/' . $service->getClient()->getApiNotificationVersion() . '/deleteNotificationConfigurations';

        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}