<?php


namespace Adyen\Service\ResourceModel\Management;

class Me extends \Adyen\Service\AbstractResource
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
     * Me constructor.
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
    public function retrieve()
    {
        $url = $this->managementEndpoint . "/me";
        return $this->requestHttp(null, $url, 'get');
    }
}
