<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentsResult extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'payload'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointCheckout') .'/'. $service->getClient()->getApiCheckoutVersion() . '/payments/result';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}
