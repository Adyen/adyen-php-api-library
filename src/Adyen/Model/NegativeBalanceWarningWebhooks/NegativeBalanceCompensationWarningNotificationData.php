<?php

/**
 * Negative balance compensation warning
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\NegativeBalanceWarningWebhooks;

use \ArrayAccess;
use Adyen\Model\NegativeBalanceWarningWebhooks\ObjectSerializer;

/**
 * NegativeBalanceCompensationWarningNotificationData Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class NegativeBalanceCompensationWarningNotificationData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'NegativeBalanceCompensationWarningNotificationData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountHolder' => '\Adyen\Model\NegativeBalanceWarningWebhooks\ResourceReference',
        'amount' => '\Adyen\Model\NegativeBalanceWarningWebhooks\Amount',
        'balancePlatform' => 'string',
        'creationDate' => '\DateTime',
        'id' => 'string',
        'liableBalanceAccountId' => 'string',
        'negativeBalanceSince' => '\DateTime',
        'scheduledCompensationAt' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountHolder' => null,
        'amount' => null,
        'balancePlatform' => null,
        'creationDate' => 'date-time',
        'id' => null,
        'liableBalanceAccountId' => null,
        'negativeBalanceSince' => 'date-time',
        'scheduledCompensationAt' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accountHolder' => false,
        'amount' => false,
        'balancePlatform' => false,
        'creationDate' => false,
        'id' => false,
        'liableBalanceAccountId' => false,
        'negativeBalanceSince' => false,
        'scheduledCompensationAt' => false
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
        'accountHolder' => 'accountHolder',
        'amount' => 'amount',
        'balancePlatform' => 'balancePlatform',
        'creationDate' => 'creationDate',
        'id' => 'id',
        'liableBalanceAccountId' => 'liableBalanceAccountId',
        'negativeBalanceSince' => 'negativeBalanceSince',
        'scheduledCompensationAt' => 'scheduledCompensationAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountHolder' => 'setAccountHolder',
        'amount' => 'setAmount',
        'balancePlatform' => 'setBalancePlatform',
        'creationDate' => 'setCreationDate',
        'id' => 'setId',
        'liableBalanceAccountId' => 'setLiableBalanceAccountId',
        'negativeBalanceSince' => 'setNegativeBalanceSince',
        'scheduledCompensationAt' => 'setScheduledCompensationAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountHolder' => 'getAccountHolder',
        'amount' => 'getAmount',
        'balancePlatform' => 'getBalancePlatform',
        'creationDate' => 'getCreationDate',
        'id' => 'getId',
        'liableBalanceAccountId' => 'getLiableBalanceAccountId',
        'negativeBalanceSince' => 'getNegativeBalanceSince',
        'scheduledCompensationAt' => 'getScheduledCompensationAt'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('accountHolder', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('balancePlatform', $data ?? [], null);
        $this->setIfExists('creationDate', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('liableBalanceAccountId', $data ?? [], null);
        $this->setIfExists('negativeBalanceSince', $data ?? [], null);
        $this->setIfExists('scheduledCompensationAt', $data ?? [], null);
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
     * Gets accountHolder
     *
     * @return \Adyen\Model\NegativeBalanceWarningWebhooks\ResourceReference|null
     */
    public function getAccountHolder()
    {
        return $this->container['accountHolder'];
    }

    /**
     * Sets accountHolder
     *
     * @param \Adyen\Model\NegativeBalanceWarningWebhooks\ResourceReference|null $accountHolder accountHolder
     *
     * @return self
     */
    public function setAccountHolder($accountHolder)
    {
        $this->container['accountHolder'] = $accountHolder;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return \Adyen\Model\NegativeBalanceWarningWebhooks\Amount|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\NegativeBalanceWarningWebhooks\Amount|null $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets balancePlatform
     *
     * @return string|null
     */
    public function getBalancePlatform()
    {
        return $this->container['balancePlatform'];
    }

    /**
     * Sets balancePlatform
     *
     * @param string|null $balancePlatform The unique identifier of the balance platform.
     *
     * @return self
     */
    public function setBalancePlatform($balancePlatform)
    {
        $this->container['balancePlatform'] = $balancePlatform;

        return $this;
    }

    /**
     * Gets creationDate
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->container['creationDate'];
    }

    /**
     * Sets creationDate
     *
     * @param \DateTime|null $creationDate The date and time when the event was triggered, in ISO 8601 extended format. For example, **2020-12-18T10:15:30+01:00**.
     *
     * @return self
     */
    public function setCreationDate($creationDate)
    {
        $this->container['creationDate'] = $creationDate;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The ID of the resource.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets liableBalanceAccountId
     *
     * @return string|null
     */
    public function getLiableBalanceAccountId()
    {
        return $this->container['liableBalanceAccountId'];
    }

    /**
     * Sets liableBalanceAccountId
     *
     * @param string|null $liableBalanceAccountId The balance account ID of the account that will be used to compensate the balance account whose balance is negative.
     *
     * @return self
     */
    public function setLiableBalanceAccountId($liableBalanceAccountId)
    {
        $this->container['liableBalanceAccountId'] = $liableBalanceAccountId;

        return $this;
    }

    /**
     * Gets negativeBalanceSince
     *
     * @return \DateTime|null
     */
    public function getNegativeBalanceSince()
    {
        return $this->container['negativeBalanceSince'];
    }

    /**
     * Sets negativeBalanceSince
     *
     * @param \DateTime|null $negativeBalanceSince The date the balance for the account became negative.
     *
     * @return self
     */
    public function setNegativeBalanceSince($negativeBalanceSince)
    {
        $this->container['negativeBalanceSince'] = $negativeBalanceSince;

        return $this;
    }

    /**
     * Gets scheduledCompensationAt
     *
     * @return \DateTime|null
     */
    public function getScheduledCompensationAt()
    {
        return $this->container['scheduledCompensationAt'];
    }

    /**
     * Sets scheduledCompensationAt
     *
     * @param \DateTime|null $scheduledCompensationAt The date when a compensation transfer to the account is scheduled to happen.
     *
     * @return self
     */
    public function setScheduledCompensationAt($scheduledCompensationAt)
    {
        $this->container['scheduledCompensationAt'] = $scheduledCompensationAt;

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
