<?php

namespace Adyen\Service;

class Account extends \Adyen\Service
{

    /**
     * @var ResourceModel\Account\CreateAccount
     */
    protected $createAccount;

    /**
     * @var ResourceModel\Account\CreateAccountHolder
     */
    protected $createAccountHolder;

    /**
     * @var ResourceModel\Account\UpdateAccountHolder
     */
    protected $updateAccountHolder;

    /**
     * @var ResourceModel\Account\GetAccountHolder
     */
    protected $getAccountHolder;

    /**
     * @var ResourceModel\Account\UpdateAccount
     */
    protected $updateAccount;

    /**
     * @var ResourceModel\Account\UploadDocument
     */
    protected $uploadDocument;

    /**
     * @var ResourceModel\Account\GetUploadedDocuments
     */
    protected $getUploadedDocuments;

    /**
     * @var ResourceModel\Account\UpdateAccountHolderState
     */
    protected $updateAccountHolderState;

    /**
     * @var ResourceModel\Account\DeleteBankAccounts
     */
    protected $deleteBankAccounts;

    /**
     * @var ResourceModel\Account\DeleteShareholders
     */
    protected $deleteShareholders;

    /**
     * @var ResourceModel\Account\CloseAccount
     */
    protected $closeAccount;

    /**
     * @var ResourceModel\Account\CloseAccountHolder
     */
    protected $closeAccountHolder;

    /**
     * @var ResourceModel\Account\SuspendAccountHolder
     */
    protected $suspendAccountHolder;

    /**
     * @var ResourceModel\Account\UnSuspendAccountHolder
     */
    protected $unSuspendAccountHolder;

    /**
     * Account constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->createAccount = new \Adyen\Service\ResourceModel\Account\CreateAccount($this);
        $this->createAccountHolder = new \Adyen\Service\ResourceModel\Account\CreateAccountHolder($this);
        $this->updateAccountHolder = new \Adyen\Service\ResourceModel\Account\UpdateAccountHolder($this);
        $this->getAccountHolder = new \Adyen\Service\ResourceModel\Account\GetAccountHolder($this);
        $this->updateAccount = new \Adyen\Service\ResourceModel\Account\UpdateAccount($this);
        $this->uploadDocument = new \Adyen\Service\ResourceModel\Account\UploadDocument($this);
        $this->getUploadedDocuments = new \Adyen\Service\ResourceModel\Account\GetUploadedDocuments($this);
        $this->updateAccountHolderState = new \Adyen\Service\ResourceModel\Account\UpdateAccountHolderState($this);
        $this->deleteBankAccounts = new \Adyen\Service\ResourceModel\Account\DeleteBankAccounts($this);
        $this->deleteShareholders = new \Adyen\Service\ResourceModel\Account\DeleteShareholders($this);
        $this->closeAccount = new \Adyen\Service\ResourceModel\Account\CloseAccount($this);
        $this->closeAccountHolder = new \Adyen\Service\ResourceModel\Account\CloseAccountHolder($this);
        $this->suspendAccountHolder = new \Adyen\Service\ResourceModel\Account\SuspendAccountHolder($this);
        $this->unSuspendAccountHolder = new \Adyen\Service\ResourceModel\Account\UnSuspendAccountHolder($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function createAccount($params)
    {
        return $this->createAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function createAccountHolder($params)
    {
        return $this->createAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccountHolder($params)
    {
        return $this->updateAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getAccountHolder($params)
    {
        return $this->getAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccount($params)
    {
        return $this->updateAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function uploadDocument($params)
    {
        return $this->uploadDocument->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getUploadedDocuments($params)
    {
        return $this->getUploadedDocuments->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccountHolderState($params)
    {
        return $this->updateAccountHolderState->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteBankAccounts($params)
    {
        return $this->deleteBankAccounts->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteShareholders($params)
    {
        return $this->deleteShareholders->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function closeAccount($params)
    {
        return $this->closeAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function closeAccountHolder($params)
    {
        return $this->closeAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function suspendAccountHolder($params)
    {
        return $this->suspendAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function unSuspendAccountHolder($params)
    {
        return $this->unSuspendAccountHolder->request($params);
    }
}
