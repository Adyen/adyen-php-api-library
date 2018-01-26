<?php

namespace Adyen\Util;

class Util
{

    public static function calculateSha256Signature($hmacKey, $params)
    {
        // validate if hmacKey is provided
        if ($hmacKey == "") {
            throw new \Adyen\AdyenException("You did not provide a HMAC key");
        }

        if (empty($params)) {
            throw new \Adyen\AdyenException("You did not provide any parameters");
        }

        // The character escape function
        $escapeval = function ($val) {
            return str_replace(':', '\\:', str_replace('\\', '\\\\', $val));
        };

        // Sort the array by key using SORT_STRING order
        ksort($params, SORT_STRING);

        // Generate the signing data string
        $signData = implode(":", array_map($escapeval, array_merge(array_keys($params), array_values($params))));

        // base64-encode the binary result of the HMAC computation
        $merchantSig = base64_encode(hash_hmac('sha256', $signData, pack("H*", $hmacKey), true));
        return $merchantSig;
    }

    public static function buildPosPaymentRequest(
        $POIID,
        $amountValue,
        $amountCurrency,
        $merchantReference,
        $transactionType
    ) {
        //Set specific dynamic parameters
        $serviceID = date("dHis");
        $timeStamper = date("Y-m-d") . "T" . date("H:i:s+00:00");

        //check for existing '.'
        $_amountValue = self::fromMinorUnits($amountValue, $amountCurrency);

        //Convert requested type
        switch ($transactionType) {
            case "GOODS_SERVICES":
                $txType = 'Normal';
                break;
            case "REFUND":
                $txType = 'Refund';
                break;
            default:
                $txType = $transactionType;
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
                                "PaymentType": "' . $txType . '"
                            }
                        }
                    }
                }
            ';
        return $result;
    }

    public static function getDecimalDigits($currency)
    {
        switch ($currency) {
            case "JPY":
            case "IDR":
            case "KRW":
            case "BYR":
            case "VND":
            case "CVE":
            case "DJF":
            case "GNF":
            case "PYG":
            case "RWF":
            case "UGX":
            case "VUV":
            case "XAF":
            case "XOF":
            case "XPF":
            case "GHC":
            case "KMF":
                $format = 0;
                break;
            case "MRO":
                $format = 1;
                break;
            case "BHD":
            case "JOD":
            case "KWD":
            case "OMR":
            case "LYD":
            case "TND":
                $format = 3;
                break;
            default:
                $format = 2;
                break;
        }
        return $format;
    }

    public static function toMinorUnits($amount, $currency)
    {
        $format = self::getDecimalDigits($currency);

        return (int)number_format($amount, $format, '', '');
    }

    public static function fromMinorUnits($amount, $currency)
    {
        $format = self::getDecimalDigits($currency);

        return number_format($amount / pow(10, $format), $format, '.', '');
    }
}