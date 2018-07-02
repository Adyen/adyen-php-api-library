<?php

namespace Adyen\Service\ResourceModel\Payment;

class TerminalCloudAPI extends \Adyen\Service\AbstractResource
{

    protected $_requiredFields = array(
        'SaleToPOIRequest.MessageHeader.POIID',
        'SaleToPOIRequest.MessageHeader.ServiceID'
        // /sync can be a status call, in that case we don't send PaymentRequest
//        'SaleToPOIRequest.PaymentRequest.SaleData.SaleTransactionID.TransactionID', //reference
//        'SaleToPOIRequest.PaymentRequest.PaymentTransaction.AmountsReq.Currency',
//        'SaleToPOIRequest.PaymentRequest.PaymentTransaction.AmountsReq.RequestedAmount',
//        //PaymentData is optional, if not provided it will perform an authorisation(no refunds)
//        'SaleToPOIRequest.PaymentRequest.PaymentData.PaymentType',
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