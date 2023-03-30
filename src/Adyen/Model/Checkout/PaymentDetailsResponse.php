<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * PaymentDetailsResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentDetailsResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentDetailsResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'amount' => '\Adyen\Model\Checkout\Amount',
        'donation_token' => 'string',
        'fraud_result' => '\Adyen\Model\Checkout\FraudResult',
        'merchant_reference' => 'string',
        'order' => '\Adyen\Model\Checkout\CheckoutOrderResponse',
        'payment_method' => '\Adyen\Model\Checkout\ResponsePaymentMethod',
        'psp_reference' => 'string',
        'refusal_reason' => 'string',
        'refusal_reason_code' => 'string',
        'result_code' => 'string',
        'shopper_locale' => 'string',
        'three_ds2_response_data' => '\Adyen\Model\Checkout\ThreeDS2ResponseData',
        'three_ds2_result' => '\Adyen\Model\Checkout\ThreeDS2Result',
        'three_ds_payment_data' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'additional_data' => null,
        'amount' => null,
        'donation_token' => null,
        'fraud_result' => null,
        'merchant_reference' => null,
        'order' => null,
        'payment_method' => null,
        'psp_reference' => null,
        'refusal_reason' => null,
        'refusal_reason_code' => null,
        'result_code' => null,
        'shopper_locale' => null,
        'three_ds2_response_data' => null,
        'three_ds2_result' => null,
        'three_ds_payment_data' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
		'amount' => false,
		'donation_token' => false,
		'fraud_result' => false,
		'merchant_reference' => false,
		'order' => false,
		'payment_method' => false,
		'psp_reference' => false,
		'refusal_reason' => false,
		'refusal_reason_code' => false,
		'result_code' => false,
		'shopper_locale' => false,
		'three_ds2_response_data' => false,
		'three_ds2_result' => false,
		'three_ds_payment_data' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'additional_data' => 'additionalData',
        'amount' => 'amount',
        'donation_token' => 'donationToken',
        'fraud_result' => 'fraudResult',
        'merchant_reference' => 'merchantReference',
        'order' => 'order',
        'payment_method' => 'paymentMethod',
        'psp_reference' => 'pspReference',
        'refusal_reason' => 'refusalReason',
        'refusal_reason_code' => 'refusalReasonCode',
        'result_code' => 'resultCode',
        'shopper_locale' => 'shopperLocale',
        'three_ds2_response_data' => 'threeDS2ResponseData',
        'three_ds2_result' => 'threeDS2Result',
        'three_ds_payment_data' => 'threeDSPaymentData'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'amount' => 'setAmount',
        'donation_token' => 'setDonationToken',
        'fraud_result' => 'setFraudResult',
        'merchant_reference' => 'setMerchantReference',
        'order' => 'setOrder',
        'payment_method' => 'setPaymentMethod',
        'psp_reference' => 'setPspReference',
        'refusal_reason' => 'setRefusalReason',
        'refusal_reason_code' => 'setRefusalReasonCode',
        'result_code' => 'setResultCode',
        'shopper_locale' => 'setShopperLocale',
        'three_ds2_response_data' => 'setThreeDs2ResponseData',
        'three_ds2_result' => 'setThreeDs2Result',
        'three_ds_payment_data' => 'setThreeDsPaymentData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'amount' => 'getAmount',
        'donation_token' => 'getDonationToken',
        'fraud_result' => 'getFraudResult',
        'merchant_reference' => 'getMerchantReference',
        'order' => 'getOrder',
        'payment_method' => 'getPaymentMethod',
        'psp_reference' => 'getPspReference',
        'refusal_reason' => 'getRefusalReason',
        'refusal_reason_code' => 'getRefusalReasonCode',
        'result_code' => 'getResultCode',
        'shopper_locale' => 'getShopperLocale',
        'three_ds2_response_data' => 'getThreeDs2ResponseData',
        'three_ds2_result' => 'getThreeDs2Result',
        'three_ds_payment_data' => 'getThreeDsPaymentData'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const RESULT_CODE_AUTHENTICATION_FINISHED = 'AuthenticationFinished';
    public const RESULT_CODE_AUTHENTICATION_NOT_REQUIRED = 'AuthenticationNotRequired';
    public const RESULT_CODE_AUTHORISED = 'Authorised';
    public const RESULT_CODE_CANCELLED = 'Cancelled';
    public const RESULT_CODE_CHALLENGE_SHOPPER = 'ChallengeShopper';
    public const RESULT_CODE_ERROR = 'Error';
    public const RESULT_CODE_IDENTIFY_SHOPPER = 'IdentifyShopper';
    public const RESULT_CODE_PENDING = 'Pending';
    public const RESULT_CODE_PRESENT_TO_SHOPPER = 'PresentToShopper';
    public const RESULT_CODE_RECEIVED = 'Received';
    public const RESULT_CODE_REDIRECT_SHOPPER = 'RedirectShopper';
    public const RESULT_CODE_REFUSED = 'Refused';
    public const RESULT_CODE_SUCCESS = 'Success';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getResultCodeAllowableValues()
    {
        return [
            self::RESULT_CODE_AUTHENTICATION_FINISHED,
            self::RESULT_CODE_AUTHENTICATION_NOT_REQUIRED,
            self::RESULT_CODE_AUTHORISED,
            self::RESULT_CODE_CANCELLED,
            self::RESULT_CODE_CHALLENGE_SHOPPER,
            self::RESULT_CODE_ERROR,
            self::RESULT_CODE_IDENTIFY_SHOPPER,
            self::RESULT_CODE_PENDING,
            self::RESULT_CODE_PRESENT_TO_SHOPPER,
            self::RESULT_CODE_RECEIVED,
            self::RESULT_CODE_REDIRECT_SHOPPER,
            self::RESULT_CODE_REFUSED,
            self::RESULT_CODE_SUCCESS,
        ];
    }
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('donation_token', $data ?? [], null);
        $this->setIfExists('fraud_result', $data ?? [], null);
        $this->setIfExists('merchant_reference', $data ?? [], null);
        $this->setIfExists('order', $data ?? [], null);
        $this->setIfExists('payment_method', $data ?? [], null);
        $this->setIfExists('psp_reference', $data ?? [], null);
        $this->setIfExists('refusal_reason', $data ?? [], null);
        $this->setIfExists('refusal_reason_code', $data ?? [], null);
        $this->setIfExists('result_code', $data ?? [], null);
        $this->setIfExists('shopper_locale', $data ?? [], null);
        $this->setIfExists('three_ds2_response_data', $data ?? [], null);
        $this->setIfExists('three_ds2_result', $data ?? [], null);
        $this->setIfExists('three_ds_payment_data', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getResultCodeAllowableValues();
        if (!is_null($this->container['result_code']) && !in_array($this->container['result_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'result_code', must be one of '%s'",
                $this->container['result_code'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets additional_data
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additional_data'];
    }

    /**
     * Sets additional_data
     *
     * @param array<string,string>|null $additional_data Contains additional information about the payment. Some data fields are included only if you select them first: Go to **Customer Area** > **Developers** > **Additional data**.
     *
     * @return self
     */
    public function setAdditionalData($additional_data)
    {
        if (is_null($additional_data)) {
            throw new \InvalidArgumentException('non-nullable additional_data cannot be null');
        }
        $this->container['additional_data'] = $additional_data;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Checkout\Amount|null $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets donation_token
     *
     * @return string|null
     */
    public function getDonationToken()
    {
        return $this->container['donation_token'];
    }

    /**
     * Sets donation_token
     *
     * @param string|null $donation_token Donation Token containing payment details for Adyen Giving.
     *
     * @return self
     */
    public function setDonationToken($donation_token)
    {
        if (is_null($donation_token)) {
            throw new \InvalidArgumentException('non-nullable donation_token cannot be null');
        }
        $this->container['donation_token'] = $donation_token;

        return $this;
    }

    /**
     * Gets fraud_result
     *
     * @return \Adyen\Model\Checkout\FraudResult|null
     */
    public function getFraudResult()
    {
        return $this->container['fraud_result'];
    }

    /**
     * Sets fraud_result
     *
     * @param \Adyen\Model\Checkout\FraudResult|null $fraud_result fraud_result
     *
     * @return self
     */
    public function setFraudResult($fraud_result)
    {
        if (is_null($fraud_result)) {
            throw new \InvalidArgumentException('non-nullable fraud_result cannot be null');
        }
        $this->container['fraud_result'] = $fraud_result;

        return $this;
    }

    /**
     * Gets merchant_reference
     *
     * @return string|null
     */
    public function getMerchantReference()
    {
        return $this->container['merchant_reference'];
    }

    /**
     * Sets merchant_reference
     *
     * @param string|null $merchant_reference The reference used during the /payments request.
     *
     * @return self
     */
    public function setMerchantReference($merchant_reference)
    {
        if (is_null($merchant_reference)) {
            throw new \InvalidArgumentException('non-nullable merchant_reference cannot be null');
        }
        $this->container['merchant_reference'] = $merchant_reference;

        return $this;
    }

    /**
     * Gets order
     *
     * @return \Adyen\Model\Checkout\CheckoutOrderResponse|null
     */
    public function getOrder()
    {
        return $this->container['order'];
    }

    /**
     * Sets order
     *
     * @param \Adyen\Model\Checkout\CheckoutOrderResponse|null $order order
     *
     * @return self
     */
    public function setOrder($order)
    {
        if (is_null($order)) {
            throw new \InvalidArgumentException('non-nullable order cannot be null');
        }
        $this->container['order'] = $order;

        return $this;
    }

    /**
     * Gets payment_method
     *
     * @return \Adyen\Model\Checkout\ResponsePaymentMethod|null
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param \Adyen\Model\Checkout\ResponsePaymentMethod|null $payment_method payment_method
     *
     * @return self
     */
    public function setPaymentMethod($payment_method)
    {
        if (is_null($payment_method)) {
            throw new \InvalidArgumentException('non-nullable payment_method cannot be null');
        }
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets psp_reference
     *
     * @return string|null
     */
    public function getPspReference()
    {
        return $this->container['psp_reference'];
    }

    /**
     * Sets psp_reference
     *
     * @param string|null $psp_reference Adyen's 16-character string reference associated with the transaction/request. This value is globally unique; quote it when communicating with us about this request.
     *
     * @return self
     */
    public function setPspReference($psp_reference)
    {
        if (is_null($psp_reference)) {
            throw new \InvalidArgumentException('non-nullable psp_reference cannot be null');
        }
        $this->container['psp_reference'] = $psp_reference;

        return $this;
    }

    /**
     * Gets refusal_reason
     *
     * @return string|null
     */
    public function getRefusalReason()
    {
        return $this->container['refusal_reason'];
    }

    /**
     * Sets refusal_reason
     *
     * @param string|null $refusal_reason If the payment's authorisation is refused or an error occurs during authorisation, this field holds Adyen's mapped reason for the refusal or a description of the error. When a transaction fails, the authorisation response includes `resultCode` and `refusalReason` values.  For more information, see [Refusal reasons](https://docs.adyen.com/development-resources/refusal-reasons).
     *
     * @return self
     */
    public function setRefusalReason($refusal_reason)
    {
        if (is_null($refusal_reason)) {
            throw new \InvalidArgumentException('non-nullable refusal_reason cannot be null');
        }
        $this->container['refusal_reason'] = $refusal_reason;

        return $this;
    }

    /**
     * Gets refusal_reason_code
     *
     * @return string|null
     */
    public function getRefusalReasonCode()
    {
        return $this->container['refusal_reason_code'];
    }

    /**
     * Sets refusal_reason_code
     *
     * @param string|null $refusal_reason_code Code that specifies the refusal reason. For more information, see [Authorisation refusal reasons](https://docs.adyen.com/development-resources/refusal-reasons).
     *
     * @return self
     */
    public function setRefusalReasonCode($refusal_reason_code)
    {
        if (is_null($refusal_reason_code)) {
            throw new \InvalidArgumentException('non-nullable refusal_reason_code cannot be null');
        }
        $this->container['refusal_reason_code'] = $refusal_reason_code;

        return $this;
    }

    /**
     * Gets result_code
     *
     * @return string|null
     */
    public function getResultCode()
    {
        return $this->container['result_code'];
    }

    /**
     * Sets result_code
     *
     * @param string|null $result_code The result of the payment. For more information, see [Result codes](https://docs.adyen.com/online-payments/payment-result-codes).  Possible values:  * **AuthenticationFinished** – The payment has been successfully authenticated with 3D Secure 2. Returned for 3D Secure 2 authentication-only transactions. * **AuthenticationNotRequired** – The transaction does not require 3D Secure authentication. Returned for [standalone authentication-only integrations](https://docs.adyen.com/online-payments/3d-secure/other-3ds-flows/authentication-only). * **Authorised** – The payment was successfully authorised. This state serves as an indicator to proceed with the delivery of goods and services. This is a final state. * **Cancelled** – Indicates the payment has been cancelled (either by the shopper or the merchant) before processing was completed. This is a final state. * **ChallengeShopper** – The issuer requires further shopper interaction before the payment can be authenticated. Returned for 3D Secure 2 transactions. * **Error** – There was an error when the payment was being processed. The reason is given in the `refusalReason` field. This is a final state. * **IdentifyShopper** – The issuer requires the shopper's device fingerprint before the payment can be authenticated. Returned for 3D Secure 2 transactions. * **Pending** – Indicates that it is not possible to obtain the final status of the payment. This can happen if the systems providing final status information for the payment are unavailable, or if the shopper needs to take further action to complete the payment. * **PresentToShopper** – Indicates that the response contains additional information that you need to present to a shopper, so that they can use it to complete a payment. * **Received** – Indicates the payment has successfully been received by Adyen, and will be processed. This is the initial state for all payments. * **RedirectShopper** – Indicates the shopper should be redirected to an external web page or app to complete the authorisation. * **Refused** – Indicates the payment was refused. The reason is given in the `refusalReason` field. This is a final state.
     *
     * @return self
     */
    public function setResultCode($result_code)
    {
        if (is_null($result_code)) {
            throw new \InvalidArgumentException('non-nullable result_code cannot be null');
        }
        $allowedValues = $this->getResultCodeAllowableValues();
        if (!in_array($result_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'result_code', must be one of '%s'",
                    $result_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['result_code'] = $result_code;

        return $this;
    }

    /**
     * Gets shopper_locale
     *
     * @return string|null
     */
    public function getShopperLocale()
    {
        return $this->container['shopper_locale'];
    }

    /**
     * Sets shopper_locale
     *
     * @param string|null $shopper_locale The shopperLocale.
     *
     * @return self
     */
    public function setShopperLocale($shopper_locale)
    {
        if (is_null($shopper_locale)) {
            throw new \InvalidArgumentException('non-nullable shopper_locale cannot be null');
        }
        $this->container['shopper_locale'] = $shopper_locale;

        return $this;
    }

    /**
     * Gets three_ds2_response_data
     *
     * @return \Adyen\Model\Checkout\ThreeDS2ResponseData|null
     */
    public function getThreeDs2ResponseData()
    {
        return $this->container['three_ds2_response_data'];
    }

    /**
     * Sets three_ds2_response_data
     *
     * @param \Adyen\Model\Checkout\ThreeDS2ResponseData|null $three_ds2_response_data three_ds2_response_data
     *
     * @return self
     */
    public function setThreeDs2ResponseData($three_ds2_response_data)
    {
        if (is_null($three_ds2_response_data)) {
            throw new \InvalidArgumentException('non-nullable three_ds2_response_data cannot be null');
        }
        $this->container['three_ds2_response_data'] = $three_ds2_response_data;

        return $this;
    }

    /**
     * Gets three_ds2_result
     *
     * @return \Adyen\Model\Checkout\ThreeDS2Result|null
     */
    public function getThreeDs2Result()
    {
        return $this->container['three_ds2_result'];
    }

    /**
     * Sets three_ds2_result
     *
     * @param \Adyen\Model\Checkout\ThreeDS2Result|null $three_ds2_result three_ds2_result
     *
     * @return self
     */
    public function setThreeDs2Result($three_ds2_result)
    {
        if (is_null($three_ds2_result)) {
            throw new \InvalidArgumentException('non-nullable three_ds2_result cannot be null');
        }
        $this->container['three_ds2_result'] = $three_ds2_result;

        return $this;
    }

    /**
     * Gets three_ds_payment_data
     *
     * @return string|null
     */
    public function getThreeDsPaymentData()
    {
        return $this->container['three_ds_payment_data'];
    }

    /**
     * Sets three_ds_payment_data
     *
     * @param string|null $three_ds_payment_data When non-empty, contains a value that you must submit to the `/payments/details` endpoint as `paymentData`.
     *
     * @return self
     */
    public function setThreeDsPaymentData($three_ds_payment_data)
    {
        if (is_null($three_ds_payment_data)) {
            throw new \InvalidArgumentException('non-nullable three_ds_payment_data cannot be null');
        }
        $this->container['three_ds_payment_data'] = $three_ds_payment_data;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}
