<?php

namespace Adyen\Service\ResourceModel\Checkout;

class PaymentLinks extends \Adyen\Service\AbstractCheckoutResource
{
    /**
     * @var string
     */
    protected $endpoint;

    const PAYMENTLINK = '/paymentLinks';

    /**
     * Include applicationInfo key in the request parameters
     *
     * @var bool
     */
    protected $allowApplicationInfo = true;

    public function create($params, $requestOptions)
    {
        $url = $this->checkoutEndpoint . self::PAYMENTLINK;
        return $this->requestHttp($url, 'post', $params, $requestOptions);
    }

    public function update($linkId, $params)
    {
        $url = $this->checkoutEndpoint . self::PAYMENTLINK . "/" . $linkId;
        return $this->requestHttp($url, 'patch', $params);
    }

    public function retrieve($linkId)
    {
        $url = $this->checkoutEndpoint . self::PAYMENTLINK . '/' .$linkId;
        return $this->requestHttp($url);
    }
}
