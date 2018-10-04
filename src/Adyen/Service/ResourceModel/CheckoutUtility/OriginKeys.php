<?php

namespace Adyen\Service\ResourceModel\CheckoutUtility;

class OriginKeys extends \Adyen\Service\AbstractCheckoutResource
{
    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $this->getCheckoutEndpoint($service) .'/'. $service->getClient()->getApiCheckoutUtilityVersion() . '/originKeys';
        parent::__construct($service, $this->_endpoint);
    }

}
