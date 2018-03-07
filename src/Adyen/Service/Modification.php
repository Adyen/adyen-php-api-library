<?php

namespace Adyen\Service;

class Modification extends \Adyen\Service
{

    protected $_cancel;
    protected $_cancelOrRefund;
    protected $_capture;
    protected $_refund;
    protected $_adjustAuthorisation;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_cancel = new \Adyen\Service\ResourceModel\Modification\Cancel($this);
        $this->_cancelOrRefund = new \Adyen\Service\ResourceModel\Modification\CancelOrRefund($this);
        $this->_capture = new \Adyen\Service\ResourceModel\Modification\Capture($this);
        $this->_refund = new \Adyen\Service\ResourceModel\Modification\Refund($this);
        $this->_adjustAuthorisation = new \Adyen\Service\ResourceModel\Modification\AdjustAuthorisation($this);
    }

    public function cancel($params)
    {
        $result =  $this->_cancel->request($params);
        return $result;
    }

    public function cancelOrRefund($params)
    {
        $result =  $this->_cancelOrRefund->request($params);
        return $result;
    }

    public function capture($params)
    {
        $result =  $this->_capture->request($params);
        return $result;
    }

    public function refund($params)
    {
        $result =  $this->_refund->request($params);
        return $result;
    }

    public function adjustAuthorisation($params)
    {
        $result =  $this->_adjustAuthorisation->request($params);
        return $result;
    }
}