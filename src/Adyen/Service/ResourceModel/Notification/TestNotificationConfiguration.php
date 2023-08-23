<?php

namespace Adyen\Service\ResourceModel\Notification;

class TestNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * TestNotificationConfiguration constructor.
     * @param $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointNotification') .
            '/' . $service->getClient()->getApiNotificationVersion() . '/testNotificationConfiguration';
        parent::__construct($service, $this->endpoint);
    }
}
