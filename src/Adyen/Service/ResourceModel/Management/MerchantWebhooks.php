<?php


namespace Adyen\Service\ResourceModel\Management;

use Adyen\AdyenException;

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
     * @return mixed
     * @throws AdyenException
     */
    public function list($merchantId)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks";
        return $this->requestHttp($url, 'get');
    }

    /**
     * @param $merchantId
     * @param $params
     * @return mixed
     * @throws AdyenException
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
     * @throws AdyenException
     */
    public function update($merchantId, $webhookId, $params)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks/" . $webhookId;
        return $this->requestHttp($url, 'patch', $params);
    }

    /**
     * @param $merchantId
     * @param $webhookId
     * @return mixed
     * @throws AdyenException
     */
    public function generateHmac($merchantId, $webhookId)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks/" . $webhookId . "/generateHmac";
        return $this->requestHttp($url, 'post');
    }

    /**
     * @param $merchantId
     * @param $webhookId
     * @param $params
     * @return mixed
     * @throws AdyenException
     */
    public function test($merchantId, $webhookId, $params)
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/webhooks/" . $webhookId . "/test";
        return $this->requestHttp($url, 'post', $params);
    }
}
