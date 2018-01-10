<?php

namespace Adyen\Service\ResourceModel\Recurring;

class ListRecurringDetails extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'merchantAccount',
        'shopperReference'
    );

    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/' . $service->getClient()->getApiRecurringVersion() . '/listRecurringDetails';
        parent::__construct($service, $endpoint, $this->_requiredFields);
    }

}