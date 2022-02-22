<?php


namespace Adyen\Service;

use Adyen\Service\ResourceModel\Management\MerchantAccount;

class Management extends \Adyen\Service
{

    public $merchantAccount;

    /**
     * Management constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->merchantAccount = new MerchantAccount($client);
    }
}
