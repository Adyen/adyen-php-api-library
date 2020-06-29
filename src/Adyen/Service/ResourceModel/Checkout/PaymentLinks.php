<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentLinks extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = true;

    /**
     * @param \Adyen\Service $service
     * @throws \Adyen\AdyenException
     */
    public function __construct($service)
    {
        $this->endpoint = $this->getCheckoutEndpoint($service) .
            '/' . $service->getClient()->getApiCheckoutVersion() . '/paymentLinks';
        parent::__construct($service, $this->endpoint, $this->allowApplicationInfo);
    }
}
