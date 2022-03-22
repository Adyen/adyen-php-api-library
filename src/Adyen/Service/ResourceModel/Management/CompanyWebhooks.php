<?php

namespace Adyen\Service\ResourceModel\Management;

class CompanyWebhooks extends \Adyen\Service\AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * @param $companyId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function retrieve($companyId)
    {
        $url = $this->managementEndpoint . "/companies/" . $companyId . "/webhooks";
        return $this->requestHttp($url, 'get');
    }
}
