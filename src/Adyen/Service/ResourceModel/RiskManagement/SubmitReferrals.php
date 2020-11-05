<?php

namespace Adyen\Service\ResourceModel\RiskManagement;

class SubmitReferrals extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Cancel constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        $this->endpoint = $service->getClient()->getConfig()->get('endpointCustomerArea') .
            '/ca/services/ReferralCAService/uploadReferralsStructured';
        parent::__construct($service, $this->endpoint);
    }
}
