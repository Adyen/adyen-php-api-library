<?php

/**
 * Transfers API
 *
 * The version of the OpenAPI document: 4
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Transfers;

use \ArrayAccess;
use Adyen\Model\Transfers\ObjectSerializer;

/**
 * CapitalGrant Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CapitalGrant implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CapitalGrant';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\Transfers\Amount',
        'balances' => '\Adyen\Model\Transfers\CapitalBalance',
        'counterparty' => '\Adyen\Model\Transfers\Counterparty',
        'fee' => '\Adyen\Model\Transfers\Fee',
        'grantAccountId' => 'string',
        'grantOfferId' => 'string',
        'id' => 'string',
        'repayment' => '\Adyen\Model\Transfers\Repayment',
        'status' => 'string'
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
        'balances' => null,
        'counterparty' => null,
        'fee' => null,
        'grantAccountId' => null,
        'grantOfferId' => null,
        'id' => null,
        'repayment' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'balances' => false,
        'counterparty' => false,
        'fee' => false,
        'grantAccountId' => false,
        'grantOfferId' => false,
        'id' => false,
        'repayment' => false,
        'status' => false
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
        'balances' => 'balances',
        'counterparty' => 'counterparty',
        'fee' => 'fee',
        'grantAccountId' => 'grantAccountId',
        'grantOfferId' => 'grantOfferId',
        'id' => 'id',
        'repayment' => 'repayment',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'balances' => 'setBalances',
        'counterparty' => 'setCounterparty',
        'fee' => 'setFee',
        'grantAccountId' => 'setGrantAccountId',
        'grantOfferId' => 'setGrantOfferId',
        'id' => 'setId',
        'repayment' => 'setRepayment',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'balances' => 'getBalances',
        'counterparty' => 'getCounterparty',
        'fee' => 'getFee',
        'grantAccountId' => 'getGrantAccountId',
        'grantOfferId' => 'getGrantOfferId',
        'id' => 'getId',
        'repayment' => 'getRepayment',
        'status' => 'getStatus'
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

    public const STATUS_PENDING = 'Pending';
    public const STATUS_ACTIVE = 'Active';
    public const STATUS_REPAID = 'Repaid';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_ACTIVE,
            self::STATUS_REPAID,
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
        $this->setIfExists('balances', $data ?? [], null);
        $this->setIfExists('counterparty', $data ?? [], null);
        $this->setIfExists('fee', $data ?? [], null);
        $this->setIfExists('grantAccountId', $data ?? [], null);
        $this->setIfExists('grantOfferId', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('repayment', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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

        if ($this->container['balances'] === null) {
            $invalidProperties[] = "'balances' can't be null";
        }
        if ($this->container['grantAccountId'] === null) {
            $invalidProperties[] = "'grantAccountId' can't be null";
        }
        if ($this->container['grantOfferId'] === null) {
            $invalidProperties[] = "'grantOfferId' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
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
     * @return \Adyen\Model\Transfers\Amount|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Transfers\Amount|null $amount amount
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
     * Gets balances
     *
     * @return \Adyen\Model\Transfers\CapitalBalance
     */
    public function getBalances()
    {
        return $this->container['balances'];
    }

    /**
     * Sets balances
     *
     * @param \Adyen\Model\Transfers\CapitalBalance $balances balances
     *
     * @return self
     */
    public function setBalances($balances)
    {
        if (is_null($balances)) {
            throw new \InvalidArgumentException('non-nullable balances cannot be null');
        }
        $this->container['balances'] = $balances;

        return $this;
    }

    /**
     * Gets counterparty
     *
     * @return \Adyen\Model\Transfers\Counterparty|null
     */
    public function getCounterparty()
    {
        return $this->container['counterparty'];
    }

    /**
     * Sets counterparty
     *
     * @param \Adyen\Model\Transfers\Counterparty|null $counterparty counterparty
     *
     * @return self
     */
    public function setCounterparty($counterparty)
    {
        if (is_null($counterparty)) {
            throw new \InvalidArgumentException('non-nullable counterparty cannot be null');
        }
        $this->container['counterparty'] = $counterparty;

        return $this;
    }

    /**
     * Gets fee
     *
     * @return \Adyen\Model\Transfers\Fee|null
     */
    public function getFee()
    {
        return $this->container['fee'];
    }

    /**
     * Sets fee
     *
     * @param \Adyen\Model\Transfers\Fee|null $fee fee
     *
     * @return self
     */
    public function setFee($fee)
    {
        if (is_null($fee)) {
            throw new \InvalidArgumentException('non-nullable fee cannot be null');
        }
        $this->container['fee'] = $fee;

        return $this;
    }

    /**
     * Gets grantAccountId
     *
     * @return string
     */
    public function getGrantAccountId()
    {
        return $this->container['grantAccountId'];
    }

    /**
     * Sets grantAccountId
     *
     * @param string $grantAccountId The identifier of the grant account used for the grant.
     *
     * @return self
     */
    public function setGrantAccountId($grantAccountId)
    {
        if (is_null($grantAccountId)) {
            throw new \InvalidArgumentException('non-nullable grantAccountId cannot be null');
        }
        $this->container['grantAccountId'] = $grantAccountId;

        return $this;
    }

    /**
     * Gets grantOfferId
     *
     * @return string
     */
    public function getGrantOfferId()
    {
        return $this->container['grantOfferId'];
    }

    /**
     * Sets grantOfferId
     *
     * @param string $grantOfferId The identifier of the grant offer that has been selected and from which the grant details will be used.
     *
     * @return self
     */
    public function setGrantOfferId($grantOfferId)
    {
        if (is_null($grantOfferId)) {
            throw new \InvalidArgumentException('non-nullable grantOfferId cannot be null');
        }
        $this->container['grantOfferId'] = $grantOfferId;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The identifier of the grant reference.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets repayment
     *
     * @return \Adyen\Model\Transfers\Repayment|null
     */
    public function getRepayment()
    {
        return $this->container['repayment'];
    }

    /**
     * Sets repayment
     *
     * @param \Adyen\Model\Transfers\Repayment|null $repayment repayment
     *
     * @return self
     */
    public function setRepayment($repayment)
    {
        if (is_null($repayment)) {
            throw new \InvalidArgumentException('non-nullable repayment cannot be null');
        }
        $this->container['repayment'] = $repayment;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status The current status of the grant. Possible values: **Pending**, **Active**, **Repaid**.
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

    public function toArray(): array
    {
        $array = [];
        foreach (self::$openAPITypes as $propertyName => $propertyType) {
            $propertyValue = $this[$propertyName];
            if ($propertyValue !== null) {
                // Check if the property value is an object and has a toArray() method
                if (is_object($propertyValue) && method_exists($propertyValue, 'toArray')) {
                    $array[$propertyName] = $propertyValue->toArray();
                // Check if it's type datetime
                } elseif ($propertyValue instanceof \DateTime) {
                    $array[$propertyName] = $propertyValue->format(DATE_ATOM);
                // If it's an array type we should check whether it contains objects and if so call toArray method
                } elseif (is_array($propertyValue)) {
                    $array[$propertyName] = array_map(function ($item) {
                        return $item instanceof ModelInterface ? $item->toArray() : $item;
                    }, $propertyValue);
                } else {
                    // Otherwise, directly assign the property value to the array
                    $array[$propertyName] = $propertyValue;
                }
            }
        }
        return $array;
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
