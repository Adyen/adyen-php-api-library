<?php

namespace Adyen\Service\ResourceModel\Notification;

class UpdateNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * UpdateNotificationConfiguration constructor.
     * @param $service\
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/' . $service->getClient()->getApiNotificationVersion() . '/updateNotificationConfiguration';
        parent::__construct($service, $this->_endpoint);
    }
}