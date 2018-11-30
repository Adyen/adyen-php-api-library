<?php

namespace Adyen\Service;

class Account extends \Adyen\Service
{

    /**
     * @var ResourceModel\Account\CreateAccount
     */
    protected $_createAccount;

    /**
     * @var ResourceModel\Account\CreateAccountHolder
     */
    protected $_createAccountHolder;

    /**
     * @var ResourceModel\Account\UpdateAccountHolder
     */
    protected $_updateAccountHolder;

    /**
     * @var ResourceModel\Account\GetAccountHolder
     */
    protected $_getAccountHolder;

    /**
     * @var ResourceModel\Account\UpdateAccount
     */
    protected $_updateAccount;

    /**
     * @var ResourceModel\Account\UploadDocument
     */
    protected $_uploadDocument;

    /**
     * @var ResourceModel\Account\GetUploadedDocuments
     */
    protected $_getUploadedDocuments;

    /**
     * @var ResourceModel\Account\UpdateAccountHolderState
     */
    protected $_updateAccountHolderState;

    /**
     * @var ResourceModel\Account\DeleteBankAccounts
     */
    protected $_deleteBankAccounts;

    /**
     * @var ResourceModel\Account\DeleteShareholders
     */
    protected $_deleteShareholders;

    /**
     * @var ResourceModel\Account\CloseAccount
     */
    protected $_closeAccount;

    /**
     * @var ResourceModel\Account\CloseAccountHolder
     */
    protected $_closeAccountHolder;

    /**
     * @var ResourceModel\Account\SuspendAccountHolder
     */
    protected $_suspendAccountHolder;

    /**
     * @var ResourceModel\Account\UnSuspendAccountHolder
     */
    protected $_unSuspendAccountHolder;

    /**
     * Account constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_createAccount = new \Adyen\Service\ResourceModel\Account\CreateAccount($this);
        $this->_createAccountHolder = new \Adyen\Service\ResourceModel\Account\CreateAccountHolder($this);
        $this->_updateAccountHolder = new \Adyen\Service\ResourceModel\Account\UpdateAccountHolder($this);
        $this->_getAccountHolder = new \Adyen\Service\ResourceModel\Account\GetAccountHolder($this);
        $this->_updateAccount = new \Adyen\Service\ResourceModel\Account\UpdateAccount($this);
        $this->_uploadDocument = new \Adyen\Service\ResourceModel\Account\UploadDocument($this);
        $this->_getUploadedDocuments = new \Adyen\Service\ResourceModel\Account\GetUploadedDocuments($this);
        $this->_updateAccountHolderState = new \Adyen\Service\ResourceModel\Account\UpdateAccountHolderState($this);
        $this->_deleteBankAccounts = new \Adyen\Service\ResourceModel\Account\DeleteBankAccounts($this);
        $this->_deleteShareholders = new \Adyen\Service\ResourceModel\Account\DeleteShareholders($this);
        $this->_closeAccount = new \Adyen\Service\ResourceModel\Account\CloseAccount($this);
        $this->_closeAccountHolder = new \Adyen\Service\ResourceModel\Account\CloseAccountHolder($this);
        $this->_suspendAccountHolder = new \Adyen\Service\ResourceModel\Account\SuspendAccountHolder($this);
        $this->_unSuspendAccountHolder = new \Adyen\Service\ResourceModel\Account\UnSuspendAccountHolder($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function createAccount($params)
    {
        return $this->_createAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function createAccountHolder($params)
    {
        return $this->_createAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccountHolder($params)
    {
        return $this->_updateAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getAccountHolder($params)
    {
        return $this->_getAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccount($params)
    {
        return $this->_updateAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function uploadDocument($params)
    {
        return $this->_uploadDocument->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function getUploadedDocuments($params)
    {
        return $this->_getUploadedDocuments->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function updateAccountHolderState($params)
    {
        return $this->_updateAccountHolderState->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteBankAccounts($params)
    {
        return $this->_deleteBankAccounts->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function deleteShareholders($params)
    {
        return $this->_deleteShareholders->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function closeAccount($params)
    {
        return $this->_closeAccount->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function closeAccountHolder($params)
    {
        return $this->_closeAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function suspendAccountHolder($params)
    {
        return $this->_suspendAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function unSuspendAccountHolder($params)
    {
        return $this->_unSuspendAccountHolder->request($params);
    }
}