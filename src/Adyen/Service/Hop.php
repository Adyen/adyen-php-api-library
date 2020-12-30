<?php

namespace Adyen\Service;

class Hop extends \Adyen\Service
{

    /**
     * @var ResourceModel\Hop\GetOnboardingUrl
     */
    protected $getOnboardingUrl;

    /**
     * Hop constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->getOnboardingUrl = new \Adyen\Service\ResourceModel\Hop\GetOnboardingUrl($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getOnboardingUrl($params)
    {
        return $this->getOnboardingUrl->request($params);
    }
}
