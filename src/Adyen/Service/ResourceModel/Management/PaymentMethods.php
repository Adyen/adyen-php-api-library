<?php


namespace Adyen\Service\ResourceModel\Management;

use Adyen\AdyenException;
use Adyen\Service\AbstractResource;

class PaymentMethods extends AbstractResource
{
    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = false;

    public function list($merchantId, array $queryParams = [])
    {
        $url = $this->managementEndpoint . "/merchants/" . $merchantId . "/paymentMethodSettings";
        return $this->requestHttp($url, 'get', $queryParams);
    }
}
