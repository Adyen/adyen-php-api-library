<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentSession extends \Adyen\Service\AbstractCheckoutResource

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutVersion() . '/paymentSession';
        parent::__construct($service, $this->_endpoint);
    }
}