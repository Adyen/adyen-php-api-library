<?php

namespace Adyen\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\PlatformsService;
use Adyen\Service\ResourceModel\Configuration\AccountHolders;
use Adyen\Service\ResourceModel\Configuration\BalanceAccounts;
use Adyen\Service\ResourceModel\Configuration\BalancePlatforms;

class Configuration extends PlatformsService
{
    /** @var BalancePlatforms $balancePlatforms */
    private $balancePlatforms;

    /** @var AccountHolders $balancePlatforms */
    private $accountHolders;

    /** @var BalanceAccounts $balanceAccounts */
    private $balanceAccounts;

    /**
     * LegalEntityManagement constructor.
     *
     * @param Client $client
     * @throws AdyenException
     */
    public function __construct(Client $client)
    {
        parent::__construct(
            $client,
            $client->getConfig()->get('endpointPlatformsConfiguration')
        );

        $this->balancePlatforms = new BalancePlatforms($this);
        $this->accountHolders = new AccountHolders($this);
        $this->balanceAccounts = new BalanceAccounts($this);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findBalancePlatform($params)
    {
        return $this->balancePlatforms->findBalancePlatform($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findBalancePlatformAccountHolders($params)
    {
        return $this->balancePlatforms->findBalancePlatformAccountHolders($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createAccountHolder($params)
    {
        return $this->accountHolders->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateAccountHolder($params)
    {
        return $this->accountHolders->update($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findAccountHolder($params)
    {
        return $this->accountHolders->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findAccountHolderBalanceAccounts($params)
    {
        return $this->accountHolders->findBalanceAccounts($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function createBalanceAcccount($params)
    {
        return $this->balanceAccounts->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function updateBalanceAcccount($params)
    {
        return $this->balanceAccounts->update($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findBalanceAcccount($params)
    {
        return $this->balanceAccounts->find($params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws AdyenException
     */
    public function findBalanceAccountPaymentInstruments($params)
    {
        return $this->balanceAccounts->findPaymentInstruments($params);
    }
}
