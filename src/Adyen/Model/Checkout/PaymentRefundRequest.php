<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 70
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
 * PaymentRefundRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentRefundRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentRefundRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\Checkout\Amount',
        'lineItems' => '\Adyen\Model\Checkout\LineItem[]',
        'merchantAccount' => 'string',
        'merchantRefundReason' => 'string',
        'reference' => 'string',
        'splits' => '\Adyen\Model\Checkout\Split[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'amount' => null,
        'lineItems' => null,
        'merchantAccount' => null,
        'merchantRefundReason' => null,
        'reference' => null,
        'splits' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'lineItems' => false,
        'merchantAccount' => false,
        'merchantRefundReason' => false,
        'reference' => false,
        'splits' => false
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
        'amount' => 'amount',
        'lineItems' => 'lineItems',
        'merchantAccount' => 'merchantAccount',
        'merchantRefundReason' => 'merchantRefundReason',
        'reference' => 'reference',
        'splits' => 'splits'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'lineItems' => 'setLineItems',
        'merchantAccount' => 'setMerchantAccount',
        'merchantRefundReason' => 'setMerchantRefundReason',
        'reference' => 'setReference',
        'splits' => 'setSplits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'lineItems' => 'getLineItems',
        'merchantAccount' => 'getMerchantAccount',
        'merchantRefundReason' => 'getMerchantRefundReason',
        'reference' => 'getReference',
        'splits' => 'getSplits'
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

    public const MERCHANT_REFUND_REASON_FRAUD = 'FRAUD';
    public const MERCHANT_REFUND_REASON_CUSTOMER_REQUEST = 'CUSTOMER REQUEST';
    public const MERCHANT_REFUND_REASON__RETURN = 'RETURN';
    public const MERCHANT_REFUND_REASON_DUPLICATE = 'DUPLICATE';
    public const MERCHANT_REFUND_REASON_OTHER = 'OTHER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMerchantRefundReasonAllowableValues()
    {
        return [
            self::MERCHANT_REFUND_REASON_FRAUD,
            self::MERCHANT_REFUND_REASON_CUSTOMER_REQUEST,
            self::MERCHANT_REFUND_REASON__RETURN,
            self::MERCHANT_REFUND_REASON_DUPLICATE,
            self::MERCHANT_REFUND_REASON_OTHER,
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
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('lineItems', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('merchantRefundReason', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('splits', $data ?? [], null);
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

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
        }
        $allowedValues = $this->getMerchantRefundReasonAllowableValues();
        if (!is_null($this->container['merchantRefundReason']) && !in_array($this->container['merchantRefundReason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'merchantRefundReason', must be one of '%s'",
                $this->container['merchantRefundReason'],
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
     * Gets amount
     *
     * @return \Adyen\Model\Checkout\Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Checkout\Amount $amount amount
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
     * Gets lineItems
     *
     * @return \Adyen\Model\Checkout\LineItem[]|null
     */
    public function getLineItems()
    {
        return $this->container['lineItems'];
    }

    /**
     * Sets lineItems
     *
     * @param \Adyen\Model\Checkout\LineItem[]|null $lineItems Price and product information of the refunded items, required for [partial refunds](https://docs.adyen.com/online-payments/refund#refund-a-payment). > This field is required for partial refunds with 3x 4x Oney, Affirm, Afterpay, Atome, Clearpay, Klarna, Ratepay, Walley, and Zip.
     *
     * @return self
     */
    public function setLineItems($lineItems)
    {
        if (is_null($lineItems)) {
            throw new \InvalidArgumentException('non-nullable lineItems cannot be null');
        }
        $this->container['lineItems'] = $lineItems;

        return $this;
    }

    /**
     * Gets merchantAccount
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchantAccount'];
    }

    /**
     * Sets merchantAccount
     *
     * @param string $merchantAccount The merchant account that is used to process the payment.
     *
     * @return self
     */
    public function setMerchantAccount($merchantAccount)
    {
        if (is_null($merchantAccount)) {
            throw new \InvalidArgumentException('non-nullable merchantAccount cannot be null');
        }
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets merchantRefundReason
     *
     * @return string|null
     */
    public function getMerchantRefundReason()
    {
        return $this->container['merchantRefundReason'];
    }

    /**
     * Sets merchantRefundReason
     *
     * @param string|null $merchantRefundReason Your reason for the refund request
     *
     * @return self
     */
    public function setMerchantRefundReason($merchantRefundReason)
    {
        if (is_null($merchantRefundReason)) {
            throw new \InvalidArgumentException('non-nullable merchantRefundReason cannot be null');
        }
        $allowedValues = $this->getMerchantRefundReasonAllowableValues();
        if (!in_array($merchantRefundReason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'merchantRefundReason', must be one of '%s'",
                    $merchantRefundReason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['merchantRefundReason'] = $merchantRefundReason;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Your reference for the refund request. Maximum length: 80 characters.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets splits
     *
     * @return \Adyen\Model\Checkout\Split[]|null
     */
    public function getSplits()
    {
        return $this->container['splits'];
    }

    /**
     * Sets splits
     *
     * @param \Adyen\Model\Checkout\Split[]|null $splits An array of objects specifying how the amount should be split between accounts when using Adyen for Platforms. For details, refer to [Providing split information](https://docs.adyen.com/marketplaces-and-platforms/processing-payments#providing-split-information).
     *
     * @return self
     */
    public function setSplits($splits)
    {
        if (is_null($splits)) {
            throw new \InvalidArgumentException('non-nullable splits cannot be null');
        }
        $this->container['splits'] = $splits;

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
