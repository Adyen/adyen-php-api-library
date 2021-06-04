<?php

namespace Adyen\Service\ResourceModel\Notification;

class UpdateNotificationConfiguration extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * UpdateNotificationConfiguration constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointNotification') .
            '/' . $service->getClient()->getApiNotificationVersion() . '/updateNotificationConfiguration';
        parent::__construct($service, $this->endpoint);
    }
}
