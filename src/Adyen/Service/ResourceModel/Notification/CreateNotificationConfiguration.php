<?php

namespace Adyen\Service\ResourceModel\Notification;

class CreateNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * CreateNotificationConfiguration constructor.
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointNotification') .
            '/' . $service->getClient()->getApiNotificationVersion() . '/createNotificationConfiguration';
        parent::__construct($service, $this->endpoint);
    }
}
