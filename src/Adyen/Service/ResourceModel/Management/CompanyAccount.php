<?php


namespace Adyen\Service\ResourceModel\Management;

class CompanyAccount extends \Adyen\Service\AbstractResource
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
     * CompanyAccount constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $this->endpoint);
    }

    /**
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function list()
    {
        $url = $this->managementEndpoint . "/companies";
        return $this->requestHttp(null, $url, 'get');
    }

    /**
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function retrieve($companyId)
    {
        $url = $this->managementEndpoint . "/companies/" . $companyId;
        return $this->requestHttp(null, $url, 'get');
    }
}
