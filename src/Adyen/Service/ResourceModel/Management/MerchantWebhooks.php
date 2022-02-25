<?php


namespace Adyen\Service\ResourceModel\Management;

class MerchantWebhooks extends \Adyen\Service\AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    /**
     * @param $merchantId
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function create($merchantId, $params)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks";
        return $this->requestHttp($url, 'post', $params);
    }

    /**
     * @param $merchantId
     * @param $webhookId
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function generateHmac($merchantId, $webhookId, $params)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks/" . $webhookId . "/generateHmac";
        return $this->requestHttp($url, 'post', $params);
    }
}
