<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentMethods extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * PaymentMethods constructor.
     *
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/paymentMethods';
        parent::__construct($service, $this->endpoint);
    }
}
