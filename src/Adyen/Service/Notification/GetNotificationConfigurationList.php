<?php

namespace Adyen\Service\ResourceModel\Notification;

class GetNotificationConfigurationList extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/cal/services/Notification/' . $service->getClient()->getApiNotificationVersion() . '/getNotificationConfigurationList';

        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}