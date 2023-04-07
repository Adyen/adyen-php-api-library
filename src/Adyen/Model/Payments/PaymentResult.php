<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * PaymentResult Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentResult implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentResult';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'auth_code' => 'string',
        'dcc_amount' => '\Adyen\Model\Payments\Amount',
        'dcc_signature' => 'string',
        'fraud_result' => '\Adyen\Model\Payments\FraudResult',
        'issuer_url' => 'string',
        'md' => 'string',
        'pa_request' => 'string',
        'psp_reference' => 'string',
        'refusal_reason' => 'string',
        'result_code' => 'string'
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
        'auth_code' => null,
        'dcc_amount' => null,
        'dcc_signature' => null,
        'fraud_result' => null,
        'issuer_url' => null,
        'md' => null,
        'pa_request' => null,
        'psp_reference' => null,
        'refusal_reason' => null,
        'result_code' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'auth_code' => false,
        'dcc_amount' => false,
        'dcc_signature' => false,
        'fraud_result' => false,
        'issuer_url' => false,
        'md' => false,
        'pa_request' => false,
        'psp_reference' => false,
        'refusal_reason' => false,
        'result_code' => false
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
        'auth_code' => 'authCode',
        'dcc_amount' => 'dccAmount',
        'dcc_signature' => 'dccSignature',
        'fraud_result' => 'fraudResult',
        'issuer_url' => 'issuerUrl',
        'md' => 'md',
        'pa_request' => 'paRequest',
        'psp_reference' => 'pspReference',
        'refusal_reason' => 'refusalReason',
        'result_code' => 'resultCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'auth_code' => 'setAuthCode',
        'dcc_amount' => 'setDccAmount',
        'dcc_signature' => 'setDccSignature',
        'fraud_result' => 'setFraudResult',
        'issuer_url' => 'setIssuerUrl',
        'md' => 'setMd',
        'pa_request' => 'setPaRequest',
        'psp_reference' => 'setPspReference',
        'refusal_reason' => 'setRefusalReason',
        'result_code' => 'setResultCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'auth_code' => 'getAuthCode',
        'dcc_amount' => 'getDccAmount',
        'dcc_signature' => 'getDccSignature',
        'fraud_result' => 'getFraudResult',
        'issuer_url' => 'getIssuerUrl',
        'md' => 'getMd',
        'pa_request' => 'getPaRequest',
        'psp_reference' => 'getPspReference',
        'refusal_reason' => 'getRefusalReason',
        'result_code' => 'getResultCode'
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
        $this->setIfExists('auth_code', $data ?? [], null);
        $this->setIfExists('dcc_amount', $data ?? [], null);
        $this->setIfExists('dcc_signature', $data ?? [], null);
        $this->setIfExists('fraud_result', $data ?? [], null);
        $this->setIfExists('issuer_url', $data ?? [], null);
        $this->setIfExists('md', $data ?? [], null);
        $this->setIfExists('pa_request', $data ?? [], null);
        $this->setIfExists('psp_reference', $data ?? [], null);
        $this->setIfExists('refusal_reason', $data ?? [], null);
        $this->setIfExists('result_code', $data ?? [], null);
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
     * Gets auth_code
     *
     * @return string|null
     */
    public function getAuthCode()
    {
        return $this->container['auth_code'];
    }

    /**
     * Sets auth_code
     *
     * @param string|null $auth_code Authorisation code: * When the payment is authorised successfully, this field holds the authorisation code for the payment. * When the payment is not authorised, this field is empty.
     *
     * @return self
     */
    public function setAuthCode($auth_code)
    {
        if (is_null($auth_code)) {
            throw new \InvalidArgumentException('non-nullable auth_code cannot be null');
        }
        $this->container['auth_code'] = $auth_code;

        return $this;
    }

    /**
     * Gets dcc_amount
     *
     * @return \Adyen\Model\Payments\Amount|null
     */
    public function getDccAmount()
    {
        return $this->container['dcc_amount'];
    }

    /**
     * Sets dcc_amount
     *
     * @param \Adyen\Model\Payments\Amount|null $dcc_amount dcc_amount
     *
     * @return self
     */
    public function setDccAmount($dcc_amount)
    {
        if (is_null($dcc_amount)) {
            throw new \InvalidArgumentException('non-nullable dcc_amount cannot be null');
        }
        $this->container['dcc_amount'] = $dcc_amount;

        return $this;
    }

    /**
     * Gets dcc_signature
     *
     * @return string|null
     */
    public function getDccSignature()
    {
        return $this->container['dcc_signature'];
    }

    /**
     * Sets dcc_signature
     *
     * @param string|null $dcc_signature Cryptographic signature used to verify `dccQuote`. > This value only applies if you have implemented Dynamic Currency Conversion. For more information, [contact Support](https://www.adyen.help/hc/en-us/requests/new).
     *
     * @return self
     */
    public function setDccSignature($dcc_signature)
    {
        if (is_null($dcc_signature)) {
            throw new \InvalidArgumentException('non-nullable dcc_signature cannot be null');
        }
        $this->container['dcc_signature'] = $dcc_signature;

        return $this;
    }

    /**
     * Gets fraud_result
     *
     * @return \Adyen\Model\Payments\FraudResult|null
     */
    public function getFraudResult()
    {
        return $this->container['fraud_result'];
    }

    /**
     * Sets fraud_result
     *
     * @param \Adyen\Model\Payments\FraudResult|null $fraud_result fraud_result
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
     * Gets issuer_url
     *
     * @return string|null
     */
    public function getIssuerUrl()
    {
        return $this->container['issuer_url'];
    }

    /**
     * Sets issuer_url
     *
     * @param string|null $issuer_url The URL to direct the shopper to. > In case of SecurePlus, do not redirect a shopper to this URL.
     *
     * @return self
     */
    public function setIssuerUrl($issuer_url)
    {
        if (is_null($issuer_url)) {
            throw new \InvalidArgumentException('non-nullable issuer_url cannot be null');
        }
        $this->container['issuer_url'] = $issuer_url;

        return $this;
    }

    /**
     * Gets md
     *
     * @return string|null
     */
    public function getMd()
    {
        return $this->container['md'];
    }

    /**
     * Sets md
     *
     * @param string|null $md The payment session.
     *
     * @return self
     */
    public function setMd($md)
    {
        if (is_null($md)) {
            throw new \InvalidArgumentException('non-nullable md cannot be null');
        }
        $this->container['md'] = $md;

        return $this;
    }

    /**
     * Gets pa_request
     *
     * @return string|null
     */
    public function getPaRequest()
    {
        return $this->container['pa_request'];
    }

    /**
     * Sets pa_request
     *
     * @param string|null $pa_request The 3D request data for the issuer.  If the value is **CUPSecurePlus-CollectSMSVerificationCode**, collect an SMS code from the shopper and pass it in the `/authorise3D` request. For more information, see [3D Secure](https://docs.adyen.com/classic-integration/3d-secure).
     *
     * @return self
     */
    public function setPaRequest($pa_request)
    {
        if (is_null($pa_request)) {
            throw new \InvalidArgumentException('non-nullable pa_request cannot be null');
        }
        $this->container['pa_request'] = $pa_request;

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
     * @param string|null $psp_reference Adyen's 16-character reference associated with the transaction/request. This value is globally unique; quote it when communicating with us about this request.
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
