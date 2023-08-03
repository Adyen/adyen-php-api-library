<?php

namespace Adyen\Service;

/**
 * @deprecated Please consider using the model based services instead (suffix -Api.php)
 * @see \Adyen\Service\Checkout\UtilityApi
 */
class CheckoutUtility extends \Adyen\ApiKeyAuthenticatedService
{
    /**
     * @var ResourceModel\CheckoutUtility\OriginKeys
     */
    protected $originKeys;

    /**
     * CheckoutUtility constructor.
     *
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->originKeys = new \Adyen\Service\ResourceModel\CheckoutUtility\OriginKeys($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function originKeys($params)
    {
        $result = $this->originKeys->request($params);
        return $result;
    }
}
