<?php

namespace Adyen\Service\ResourceModel\Notification;

class GetNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $_endpoint;

    /**
     * GetNotificationConfiguration constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointNotification') . '/' . $service->getClient()->getApiNotificationVersion() . '/getNotificationConfiguration';
        parent::__construct($service, $this->_endpoint);
    }
}