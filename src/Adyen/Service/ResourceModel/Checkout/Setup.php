<?php

namespace Adyen\Service\ResourceModel\Checkout;

class Setup extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'amount.value',
        'amount.currency',
        'countryCode',
        'merchantAccount'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointCheckout') .'/'. $service->getClient()->getApiCheckoutVersion() . '/setup';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}
