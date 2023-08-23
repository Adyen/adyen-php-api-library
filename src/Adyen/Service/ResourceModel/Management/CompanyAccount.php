<?php


namespace Adyen\Service\ResourceModel\Management;

class CompanyAccount extends \Adyen\Service\AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * @param array $queryParams
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function list(array $queryParams = [])
    {
        $url = $this->managementEndpoint . "/companies";
        return $this->requestHttp($url, 'get', $queryParams);
    }

    /**
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function retrieve($companyId)
    {
        $url = $this->managementEndpoint . "/companies/" . $companyId;
        return $this->requestHttp($url, 'get');
    }
}
