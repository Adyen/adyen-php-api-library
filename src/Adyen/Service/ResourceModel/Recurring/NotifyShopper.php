<?php


namespace Adyen\Service\ResourceModel\Recurring;

class NotifyShopper extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;
    /**
     * NotifyShopper constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/notifyShopper';
        parent::__construct($service, $this->endpoint);
    }
}
