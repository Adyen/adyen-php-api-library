<?php

namespace Adyen\Service;

/**
 * @deprecated
 */
class RiskManagement extends \Adyen\Service
{
    /**
     * @var ResourceModel\RiskManagement\SubmitReferrals
     */
    protected $submitReferrals;

    /**
     * RiskManagement constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->submitReferrals = new \Adyen\Service\ResourceModel\RiskManagement\SubmitReferrals($this);
    }

    /**
     * @param $params
     * @param null $requestOptions
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function submitReferrals($params, $requestOptions = null)
    {
        return $this->submitReferrals->request($params, $requestOptions);
    }
}
