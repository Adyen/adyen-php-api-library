<?php

namespace Adyen\Service\ResourceModel\Payment;

class TerminalCloudAPI extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'SaleToPOIRequest.MessageHeader.POIID',
        'SaleToPOIRequest.MessageHeader.ServiceID',
        'SaleToPOIRequest.PaymentRequest.SaleData.SaleTransactionID.TransactionID', //reference
        'SaleToPOIRequest.PaymentRequest.PaymentTransaction.AmountsReq.Currency',
        'SaleToPOIRequest.PaymentRequest.PaymentTransaction.AmountsReq.RequestedAmount',
        'SaleToPOIRequest.PaymentRequest.PaymentData.PaymentType',
    );

    protected $_endpoint;

    public function __construct($service, $asynchronous)
    {
        if ($asynchronous) {
            $this->_endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/async';
        } else {
            $this->_endpoint = $service->getClient()->getConfig()->get('endpointTerminalCloud') . '/sync';
        }
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }

}