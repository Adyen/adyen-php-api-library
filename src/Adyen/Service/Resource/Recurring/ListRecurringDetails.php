<?php

namespace Adyen\Service\Resource\Recurring;

class ListRecurringDetails extends \Adyen\Service\Resource
{

    protected $_requiredFields = array(
        'merchantAccount',
        'shopperReference',
        'recurring',
        'recurring.contract'
    );

    public function __construct($service)
    {
        $endpoint = $service->getClient()->getConfig()->get('endpoint') . '/pal/servlet/Recurring/v12/listRecurringDetails';
        parent::__construct($service, $endpoint, $this->_requiredFields);
    }

}