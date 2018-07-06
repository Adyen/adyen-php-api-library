<?php

namespace Adyen\Service\ResourceModel\Recurring;

class Disable extends \Adyen\Service\AbstractResource
{
    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/disable';
        parent::__construct($service, $endpoint);
    }

}