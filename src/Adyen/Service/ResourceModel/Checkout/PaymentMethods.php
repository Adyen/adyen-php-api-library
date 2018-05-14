<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentMethods extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'merchantAccount'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointCheckout') .'/'. $service->getClient()->getApiCheckoutVersion() . '/paymentMethods';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}
