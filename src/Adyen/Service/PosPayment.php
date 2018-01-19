<?php

namespace Adyen\Service;

class PosPayment extends \Adyen\Service
{

    protected $_runTenderSync;
    protected $_runTenderAsync;
    protected $_supportsXAPIKey = true;
    protected $_txType;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_runTenderSync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, false);
        $this->_runTenderAsync = new \Adyen\Service\ResourceModel\Payment\TerminalCloudAPI($this, true);

    }

    public function runTenderSync($params)
    {
        $result = $this->_runTenderSync->request($params);
        return $result;
    }

    public function runTenderAsync($params)
    {
        $result = $this->_runTenderAsync->request($params);
        return $result;
    }

    private function _getFormattedAmountValue($amountValue)
    {   //Terminal API amountValue requires 42.42 format
        if (strlen($amountValue) > 2) {
            return substr($amountValue, 0, strlen($amountValue) - 2) . '.' . substr($amountValue, strlen($amountValue) - 2);
        } elseif (strlen($amountValue) > 1) {
            return '0.' . $amountValue;
        } else {
            return '0.0' . $amountValue;
        }
    }

    public function getServiceId($request)
    {
        if (isset($request['SaleToPOIRequest']['MessageHeader']['ServiceID'])) {
            return $request['SaleToPOIRequest']['MessageHeader']['ServiceID'];
        }
        return null;
    }

    public function getPaymentRequest($POIID, $amountValue, $amountCurrency, $merchantReference, $transactionType)
    {
        //Set specific dynamic parameters
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        //check for existing '.'
        $_amountValue = $this->_getFormattedAmountValue($amountValue);

        //Convert requested type
        switch ($transactionType) {
            case "GOODS_SERVICES":
                $this->_txType = 'Normal';
                break;
            case "REFUND":
                $this->_txType = 'Refund';
                break;

            default:
                $this->_txType = $transactionType;
        }

        //Provide json as result
        $result = '{
                    "SaleToPOIRequest": {
                        "MessageHeader": {
                            "MessageType": "Request",
                            "MessageClass": "Service",
                            "MessageCategory": "Payment",
                            "SaleID": "MagentoCloudEMV",
                            "POIID": "' . $POIID . '",
                            "ProtocolVersion": "3.0",
                            "ServiceID": "' . $serviceID . '"
                        },
                        "PaymentRequest": {
                            "SaleData": {
                                "SaleTransactionID": {
                                    "TransactionID": "' . $merchantReference . '",
                                    "TimeStamp": "' . $timeStamper . '"
                                },
                                "TokenRequestedType": "Customer",
                                "SaleReferenceID": "SalesRefABC"
                            },
                            "PaymentTransaction": {
                                "AmountsReq": {
                                    "Currency": "' . $amountCurrency . '",
                                    "RequestedAmount": ' . $_amountValue . '
                                }
                            },
                            "PaymentData": {
                                "PaymentType": "' . $this->_txType . '"
                            }
                        }
                    }
                }
            ';
        return $result;
    }
}
