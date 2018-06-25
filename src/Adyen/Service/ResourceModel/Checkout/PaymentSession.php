<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentSession extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'amount.value',
        'amount.currency',
        'countryCode',
        'merchantAccount',
        'returnUrl',
        'reference'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointCheckout') .'/'. $service->getClient()->getApiCheckoutVersion() . '/paymentSession';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}
