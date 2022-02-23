<?php


namespace Adyen\Service;

use Adyen\Service\ResourceModel\Management\CompanyAccount;
use Adyen\Service\ResourceModel\Management\CompanyWebhooks;
use Adyen\Service\ResourceModel\Management\Me;
use Adyen\Service\ResourceModel\Management\MerchantAccount;
use Adyen\Service\ResourceModel\Management\MerchantClientKey;
use Adyen\Service\ResourceModel\Management\MerchantWebhooks;

class Management extends \Adyen\Service
{
    /**
     * @var MerchantAccount
     */
    public $merchantAccount;

    /**
     * @var Me
     */
    public $me;

    /**
     * @var CompanyAccount
     */
    public $companyAccount;

    /**
     * @var MerchantClientKey
     */
    public $merchantClientKey;

    /**
     * @var MerchantWebhooks
     */
    public $merchantWebhooks;

    /**
     * @var CompanyWebhooks
     */
    public $companyWebhooks;


    /**
     * Management constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);
        $this->merchantAccount = new MerchantAccount($this);
        $this->me = new Me($this);
        $this->companyAccount = new CompanyAccount($this);
        $this->merchantClientKey = new MerchantClientKey($this);
        $this->merchantWebhooks = new MerchantWebhooks($this);
        $this->companyWebhooks = new CompanyWebhooks($this);
    }
}
