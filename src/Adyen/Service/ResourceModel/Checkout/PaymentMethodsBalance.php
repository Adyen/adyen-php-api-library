<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentMethodsBalance extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * PaymentMethodsBalance constructor.
     *
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/paymentMethods/balance';
        parent::__construct($service, $this->endpoint);
    }
}
