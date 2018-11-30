<?php

namespace Adyen\Service;

class Fund extends \Adyen\Service
{

    /**
     * @var ResourceModel\Fund\PayoutAccountHolder
     */
    protected $_payoutAccountHolder;

    /**
     * @var ResourceModel\Fund\AccountHolderBalance
     */
    protected $_accountHolderBalance;

    /**
     * @var ResourceModel\Fund\AccountHolderTransactionList
     */
    protected $_accountHolderTransactionList;

    /**
     * @var ResourceModel\Fund\RefundNotPaidOutTransfers
     */
    protected $_refundNotPaidOutTransfers;

    /**
     * @var ResourceModel\Fund\SetupBeneficiary
     */
    protected $_setupBeneficiary;

    /**
     * @var ResourceModel\Fund\TransferFunds
     */
    protected $_transferFunds;

    /**
     * Fund constructor.
     * @param \Adyen\Client $client
     * @throws \Adyen\AdyenException
     */
    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_payoutAccountHolder = new \Adyen\Service\ResourceModel\Fund\PayoutAccountHolder($this);
        $this->_accountHolderBalance = new \Adyen\Service\ResourceModel\Fund\AccountHolderBalance($this);
        $this->_accountHolderTransactionList = new \Adyen\Service\ResourceModel\Fund\AccountHolderTransactionList($this);
        $this->_refundNotPaidOutTransfers = new \Adyen\Service\ResourceModel\Fund\RefundNotPaidOutTransfers($this);
        $this->_setupBeneficiary = new \Adyen\Service\ResourceModel\Fund\SetupBeneficiary($this);
        $this->_transferFunds = new \Adyen\Service\ResourceModel\Fund\TransferFunds($this);

    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function payoutAccountHolder($params)
    {
        return $this->_payoutAccountHolder->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function accountHolderBalance($params)
    {
        return $this->_accountHolderBalance->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function accountHolderTransactionList($params)
    {
        return $this->_accountHolderTransactionList->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function refundNotPaidOutTransfers($params)
    {
        return $this->_refundNotPaidOutTransfers->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function setupBeneficiary($params)
    {
        return $this->_setupBeneficiary->request($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Adyen\AdyenException
     */
    public function transferFunds($params)
    {
        return $this->_transferFunds->request($params);
    }
}