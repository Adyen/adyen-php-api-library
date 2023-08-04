<?php

namespace Adyen\Service;

/**
 * @deprecated Please consider using the LegalEntityManagement services instead
 * @see \Adyen\Service\LegalEntityManagement\
 */
class Hop extends \Adyen\Service
{
    /**
     * @var ResourceModel\Hop\GetOnboardingUrl
     */
    protected $getOnboardingUrl;

    /**
     * @var ResourceModel\Hop\GetPciQuestionnaireUrl
     */
    protected $getPciQuestionnaireUrl;

    /**
     * Hop constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->getOnboardingUrl = new \Adyen\Service\ResourceModel\Hop\GetOnboardingUrl($this);
        $this->getPciQuestionnaireUrl = new \Adyen\Service\ResourceModel\Hop\GetPciQuestionnaireUrl($this);
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

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getPciQuestionnaireUrl($params)
    {
        return $this->getPciQuestionnaireUrl->request($params);
    }
}
