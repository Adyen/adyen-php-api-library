<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * CheckoutBalanceCheckResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CheckoutBalanceCheckResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CheckoutBalanceCheckResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'balance' => '\Adyen\Model\Checkout\Amount',
        'fraud_result' => '\Adyen\Model\Checkout\FraudResult',
        'psp_reference' => 'string',
        'refusal_reason' => 'string',
        'result_code' => 'string',
        'transaction_limit' => '\Adyen\Model\Checkout\Amount'
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
        'balance' => null,
        'fraud_result' => null,
        'psp_reference' => null,
        'refusal_reason' => null,
        'result_code' => null,
        'transaction_limit' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'balance' => false,
        'fraud_result' => false,
        'psp_reference' => false,
        'refusal_reason' => false,
        'result_code' => false,
        'transaction_limit' => false
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
        'balance' => 'balance',
        'fraud_result' => 'fraudResult',
        'psp_reference' => 'pspReference',
        'refusal_reason' => 'refusalReason',
        'result_code' => 'resultCode',
        'transaction_limit' => 'transactionLimit'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'balance' => 'setBalance',
        'fraud_result' => 'setFraudResult',
        'psp_reference' => 'setPspReference',
        'refusal_reason' => 'setRefusalReason',
        'result_code' => 'setResultCode',
        'transaction_limit' => 'setTransactionLimit'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'balance' => 'getBalance',
        'fraud_result' => 'getFraudResult',
        'psp_reference' => 'getPspReference',
        'refusal_reason' => 'getRefusalReason',
        'result_code' => 'getResultCode',
        'transaction_limit' => 'getTransactionLimit'
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

    public const RESULT_CODE_SUCCESS = 'Success';
    public const RESULT_CODE_NOT_ENOUGH_BALANCE = 'NotEnoughBalance';
    public const RESULT_CODE_FAILED = 'Failed';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getResultCodeAllowableValues()
    {
        return [
            self::RESULT_CODE_SUCCESS,
            self::RESULT_CODE_NOT_ENOUGH_BALANCE,
            self::RESULT_CODE_FAILED,
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
        $this->setIfExists('balance', $data ?? [], null);
        $this->setIfExists('fraud_result', $data ?? [], null);
        $this->setIfExists('psp_reference', $data ?? [], null);
        $this->setIfExists('refusal_reason', $data ?? [], null);
        $this->setIfExists('result_code', $data ?? [], null);
        $this->setIfExists('transaction_limit', $data ?? [], null);
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

        if ($this->container['balance'] === null) {
            $invalidProperties[] = "'balance' can't be null";
        }
        if ($this->container['result_code'] === null) {
            $invalidProperties[] = "'result_code' can't be null";
        }
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
     * Gets balance
     *
     * @return \Adyen\Model\Checkout\Amount
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param \Adyen\Model\Checkout\Amount $balance balance
     *
     * @return self
     */
    public function setBalance($balance)
    {
        if (is_null($balance)) {
            throw new \InvalidArgumentException('non-nullable balance cannot be null');
        }
        $this->container['balance'] = $balance;

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
     * @return string
     */
    public function getResultCode()
    {
        return $this->container['result_code'];
    }

    /**
     * Sets result_code
     *
     * @param string $result_code The result of the cancellation request.  Possible values:  * **Success** – Indicates that the balance check was successful. * **NotEnoughBalance** – Commonly indicates that the card did not have enough balance to pay the amount in the request, or that the currency of the balance on the card did not match the currency of the requested amount. * **Failed** – Indicates that the balance check failed.
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
     * Gets transaction_limit
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getTransactionLimit()
    {
        return $this->container['transaction_limit'];
    }

    /**
     * Sets transaction_limit
     *
     * @param \Adyen\Model\Checkout\Amount|null $transaction_limit transaction_limit
     *
     * @return self
     */
    public function setTransactionLimit($transaction_limit)
    {
        if (is_null($transaction_limit)) {
            throw new \InvalidArgumentException('non-nullable transaction_limit cannot be null');
        }
        $this->container['transaction_limit'] = $transaction_limit;

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

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
