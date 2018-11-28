<?php

namespace Adyen\Service\ResourceModel\Notification;

class CreateNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * CreateNotificationConfiguration constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/' . $service->getClient()->getApiNotificationVersion() . '/createNotificationConfiguration';
        parent::__construct($service, $this->_endpoint);
    }
}