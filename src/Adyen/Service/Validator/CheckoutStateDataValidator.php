<?php

namespace Adyen\Service\Validator;

class CheckoutStateDataValidator
{
    protected $stateDataRootKeys = array(
        'paymentMethod',
        'billingAddress',
        'deliveryAddress',
        'riskData',
        'shopperName',
        'dateOfBirth',
        'telephoneNumber',
        'shopperEmail',
        'countryCode',
        'socialSecurityNumber',
        'browserInfo',
        'installments',
        'storePaymentMethod',
        'conversionId',
        'paymentData',
        'details'
    );

    /**
     * @param array $stateData
     * @return array
     */
    public function getValidatedAdditionalData($stateData)
    {
        // Get validated state data array
        if (!empty($stateData)) {
            $stateData = DataArrayValidator::getArrayOnlyWithApprovedKeys($stateData, $this->stateDataRootKeys);
        }
        return $stateData;
    }
}
