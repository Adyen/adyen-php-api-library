<?php

namespace Adyen\Service\ResourceModel\Checkout;

class Recurring extends \Adyen\Service\AbstractResource
{
    /**
     * @var string
     */
    protected $endpoint;

    const STORED_PAYMENT_METHODS = '/storedPaymentMethods';

    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = true;


    public function delete($recurringId, array $queryParams = [])
    {
        $url = $this->checkoutEndpoint . self::STORED_PAYMENT_METHODS . "/" . $recurringId;
        return $this->requestHttp($url, 'delete', $queryParams);
    }

    public function retrieve(array $queryParams = [])
    {
        $url = $this->checkoutEndpoint . self::STORED_PAYMENT_METHODS;
        return $this->requestHttp($url, 'get', $queryParams);
    }
}
