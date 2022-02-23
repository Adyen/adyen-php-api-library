<?php


namespace Adyen\Service\ResourceModel\Management;

class MerchantWebhooks extends \Adyen\Service\AbstractResource
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
     * MerchantWebhooks constructor.
     *
     * @param \Adyen\Service $service
     */
    public function __construct($service)
    {
        parent::__construct($service, $this->endpoint);
    }

    /**
     * @param $params
     * @param $merchantId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function create($params, $merchantId)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks";
        return $this->requestHttp($params, $url, 'post');
    }

    /**
     * @param $params
     * @param $merchantId
     * @param $webhookId
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function generateHmac($params, $merchantId, $webhookId)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks/" . $webhookId . "/generateHmac";
        return $this->requestHttp($params, $url, 'post');
    }
}
