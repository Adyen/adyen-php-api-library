<?php

namespace Adyen\Service\ResourceModel\Checkout;

class OrdersCancel extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * OrdersCancel constructor.
     *
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/orders/cancel';
        parent::__construct($service, $this->endpoint);
    }
}
