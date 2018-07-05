<?php

namespace Adyen\Service\ResourceModel\CheckoutUtility;

class OriginKeys extends \Adyen\Service\AbstractResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointCheckout') .'/'. $service->getClient()->getApiCheckoutUtilityVersion() . '/originKeys';
        parent::__construct($service, $this->_endpoint);
    }

}
