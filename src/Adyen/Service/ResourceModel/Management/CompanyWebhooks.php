<?php

namespace Adyen\Service\ResourceModel\Management;

class CompanyWebhooks extends \Adyen\Service\AbstractResource
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
    protected $allowApplicationInfo = false;

    /**
     * CompanyWebhooks constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $this->endpoint);
    }

    /**
     * @param $companyId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function retrieve($companyId)
    {
        $url = $this->managementEndpoint . "/companies/" . $companyId . "/webhooks";
        return $this->requestHttp(null, $url, 'get');
    }
}
