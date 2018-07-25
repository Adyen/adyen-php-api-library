<?php

namespace Adyen\Service\ResourceModel\Notification;

class TestNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'notificationId',
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/cal/services/Notification/' . $service->getClient()->getApiNotificationVersion() . '/testNotificationConfiguration';

        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}