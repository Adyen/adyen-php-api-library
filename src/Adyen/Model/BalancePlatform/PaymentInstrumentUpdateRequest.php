<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * PaymentInstrumentUpdateRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentInstrumentUpdateRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentInstrumentUpdateRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'balanceAccountId' => 'string',
        'card' => '\Adyen\Model\BalancePlatform\CardInfo',
        'status' => 'string',
        'statusComment' => 'string',
        'statusReason' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'balanceAccountId' => null,
        'card' => null,
        'status' => null,
        'statusComment' => null,
        'statusReason' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'balanceAccountId' => false,
        'card' => false,
        'status' => false,
        'statusComment' => false,
        'statusReason' => false
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
        'balanceAccountId' => 'balanceAccountId',
        'card' => 'card',
        'status' => 'status',
        'statusComment' => 'statusComment',
        'statusReason' => 'statusReason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'balanceAccountId' => 'setBalanceAccountId',
        'card' => 'setCard',
        'status' => 'setStatus',
        'statusComment' => 'setStatusComment',
        'statusReason' => 'setStatusReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'balanceAccountId' => 'getBalanceAccountId',
        'card' => 'getCard',
        'status' => 'getStatus',
        'statusComment' => 'getStatusComment',
        'statusReason' => 'getStatusReason'
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

    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_REASON_ACCOUNT_CLOSURE = 'accountClosure';
    public const STATUS_REASON_DAMAGED = 'damaged';
    public const STATUS_REASON_END_OF_LIFE = 'endOfLife';
    public const STATUS_REASON_EXPIRED = 'expired';
    public const STATUS_REASON_LOST = 'lost';
    public const STATUS_REASON_OTHER = 'other';
    public const STATUS_REASON_STOLEN = 'stolen';
    public const STATUS_REASON_SUSPECTED_FRAUD = 'suspectedFraud';
    public const STATUS_REASON_TRANSACTION_RULE = 'transactionRule';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_CLOSED,
            self::STATUS_INACTIVE,
            self::STATUS_SUSPENDED,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusReasonAllowableValues()
    {
        return [
            self::STATUS_REASON_ACCOUNT_CLOSURE,
            self::STATUS_REASON_DAMAGED,
            self::STATUS_REASON_END_OF_LIFE,
            self::STATUS_REASON_EXPIRED,
            self::STATUS_REASON_LOST,
            self::STATUS_REASON_OTHER,
            self::STATUS_REASON_STOLEN,
            self::STATUS_REASON_SUSPECTED_FRAUD,
            self::STATUS_REASON_TRANSACTION_RULE,
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
        $this->setIfExists('balanceAccountId', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('statusComment', $data ?? [], null);
        $this->setIfExists('statusReason', $data ?? [], null);
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

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusReasonAllowableValues();
        if (!is_null($this->container['statusReason']) && !in_array($this->container['statusReason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'statusReason', must be one of '%s'",
                $this->container['statusReason'],
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
     * Gets balanceAccountId
     *
     * @return string|null
     */
    public function getBalanceAccountId()
    {
        return $this->container['balanceAccountId'];
    }

    /**
     * Sets balanceAccountId
     *
     * @param string|null $balanceAccountId The unique identifier of the balance account associated with this payment instrument. >You can only change the balance account ID if the payment instrument has **inactive** status.
     *
     * @return self
     */
    public function setBalanceAccountId($balanceAccountId)
    {
        if (is_null($balanceAccountId)) {
            throw new \InvalidArgumentException('non-nullable balanceAccountId cannot be null');
        }
        $this->container['balanceAccountId'] = $balanceAccountId;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\BalancePlatform\CardInfo|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\BalancePlatform\CardInfo|null $card card
     *
     * @return self
     */
    public function setCard($card)
    {
        if (is_null($card)) {
            throw new \InvalidArgumentException('non-nullable card cannot be null');
        }
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the payment instrument. If a status is not specified when creating a payment instrument, it is set to **active** by default. However, there can be exceptions for cards based on the `card.formFactor` and the `issuingCountryCode`. For example, when issuing physical cards in the US, the default status is **inactive**.  Possible values:    * **active**:  The payment instrument is active and can be used to make payments.    * **inactive**: The payment instrument is inactive and cannot be used to make payments.    * **suspended**: The payment instrument is suspended, either because it was stolen or lost.    * **closed**: The payment instrument is permanently closed. This action cannot be undone.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets statusComment
     *
     * @return string|null
     */
    public function getStatusComment()
    {
        return $this->container['statusComment'];
    }

    /**
     * Sets statusComment
     *
     * @param string|null $statusComment Comment for the status of the payment instrument.  Required if `statusReason` is **other**.
     *
     * @return self
     */
    public function setStatusComment($statusComment)
    {
        if (is_null($statusComment)) {
            throw new \InvalidArgumentException('non-nullable statusComment cannot be null');
        }
        $this->container['statusComment'] = $statusComment;

        return $this;
    }

    /**
     * Gets statusReason
     *
     * @return string|null
     */
    public function getStatusReason()
    {
        return $this->container['statusReason'];
    }

    /**
     * Sets statusReason
     *
     * @param string|null $statusReason The reason for updating the status of the payment instrument.  Possible values: **lost**, **stolen**, **damaged**, **suspectedFraud**, **expired**, **endOfLife**, **accountClosure**, **other**. If the reason is **other**, you must also send the `statusComment` parameter describing the status change.
     *
     * @return self
     */
    public function setStatusReason($statusReason)
    {
        if (is_null($statusReason)) {
            throw new \InvalidArgumentException('non-nullable statusReason cannot be null');
        }
        $allowedValues = $this->getStatusReasonAllowableValues();
        if (!in_array($statusReason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'statusReason', must be one of '%s'",
                    $statusReason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['statusReason'] = $statusReason;

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
