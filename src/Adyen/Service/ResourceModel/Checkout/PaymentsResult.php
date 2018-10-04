<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentsResult extends \Adyen\Service\AbstractCheckoutResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutVersion() . '/payments/result';
        parent::__construct($service, $this->_endpoint);
    }

}
