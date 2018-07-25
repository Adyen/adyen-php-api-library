<?php

namespace Adyen\Service\ResourceModel\Notification;

class UpdateNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'configurationDetails',
        'configurationDetails.eventConfigs',
        'configurationDetails.notifyURL',
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/cal/services/Notification/' . $service->getClient()->getApiNotificationVersion() . '/updateNotificationConfiguration';

        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}