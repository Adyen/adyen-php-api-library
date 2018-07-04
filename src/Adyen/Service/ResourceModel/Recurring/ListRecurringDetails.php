<?php

namespace Adyen\Service\ResourceModel\Recurring;

class ListRecurringDetails extends \Adyen\Service\AbstractResource
{
    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/listRecurringDetails';
        parent::__construct($service, $endpoint);
    }

}