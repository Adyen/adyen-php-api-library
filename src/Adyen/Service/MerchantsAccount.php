<?php


namespace Adyen\Service;

class MerchantsAccount extends \Adyen\Service
{
    /**
     * @var ResourceModel\ManagementApi\MerchantsAccount
     */
    protected $merchantsAccount;

    /**
     * MerchantsAccount constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function merchantsAccount(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->merchantsAccount = new \Adyen\Service\ResourceModel\ManagementApi\MerchantsAccount($this);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function list($params)
    {
        return $this->merchantsAccount->requestHttp($params, 'get');
    }
}
