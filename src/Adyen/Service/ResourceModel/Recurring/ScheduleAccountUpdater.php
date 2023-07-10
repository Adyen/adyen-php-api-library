<?php


namespace Adyen\Service\ResourceModel\Recurring;

class ScheduleAccountUpdater extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;
    /**
     * ScheduleAccountUpdater constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpoint') .
            '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/scheduleAccountUpdater';
        parent::__construct($service, $this->endpoint);
    }
}
