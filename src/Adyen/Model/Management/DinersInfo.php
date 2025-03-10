<?php

/**
 * Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * DinersInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DinersInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DinersInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'midNumber' => 'string',
        'reuseMidNumber' => 'bool',
        'serviceLevel' => 'string',
        'transactionDescription' => '\Adyen\Model\Management\TransactionDescriptionInfo'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'midNumber' => null,
        'reuseMidNumber' => null,
        'serviceLevel' => null,
        'transactionDescription' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'midNumber' => false,
        'reuseMidNumber' => false,
        'serviceLevel' => false,
        'transactionDescription' => false
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
        'midNumber' => 'midNumber',
        'reuseMidNumber' => 'reuseMidNumber',
        'serviceLevel' => 'serviceLevel',
        'transactionDescription' => 'transactionDescription'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'midNumber' => 'setMidNumber',
        'reuseMidNumber' => 'setReuseMidNumber',
        'serviceLevel' => 'setServiceLevel',
        'transactionDescription' => 'setTransactionDescription'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'midNumber' => 'getMidNumber',
        'reuseMidNumber' => 'getReuseMidNumber',
        'serviceLevel' => 'getServiceLevel',
        'transactionDescription' => 'getTransactionDescription'
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

    public const SERVICE_LEVEL_NO_CONTRACT = 'noContract';
    public const SERVICE_LEVEL_GATEWAY_CONTRACT = 'gatewayContract';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getServiceLevelAllowableValues()
    {
        return [
            self::SERVICE_LEVEL_NO_CONTRACT,
            self::SERVICE_LEVEL_GATEWAY_CONTRACT,
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('midNumber', $data ?? [], null);
        $this->setIfExists('reuseMidNumber', $data ?? [], null);
        $this->setIfExists('serviceLevel', $data ?? [], null);
        $this->setIfExists('transactionDescription', $data ?? [], null);
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

        if ($this->container['reuseMidNumber'] === null) {
            $invalidProperties[] = "'reuseMidNumber' can't be null";
        }
        $allowedValues = $this->getServiceLevelAllowableValues();
        if (!is_null($this->container['serviceLevel']) && !in_array($this->container['serviceLevel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'serviceLevel', must be one of '%s'",
                $this->container['serviceLevel'],
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
     * Gets midNumber
     *
     * @return string|null
     */
    public function getMidNumber()
    {
        return $this->container['midNumber'];
    }

    /**
     * Sets midNumber
     *
     * @param string|null $midNumber MID (Merchant ID) number. Required for merchants operating in Japan. Format: 14 numeric characters.
     *
     * @return self
     */
    public function setMidNumber($midNumber)
    {
        $this->container['midNumber'] = $midNumber;

        return $this;
    }

    /**
     * Gets reuseMidNumber
     *
     * @return bool
     */
    public function getReuseMidNumber()
    {
        return $this->container['reuseMidNumber'];
    }

    /**
     * Sets reuseMidNumber
     *
     * @param bool $reuseMidNumber Indicates whether the JCB Merchant ID is reused from a previously configured JCB payment method. The default value is **false**. For merchants operating in Japan, this field is required and must be set to **true**.
     *
     * @return self
     */
    public function setReuseMidNumber($reuseMidNumber)
    {
        $this->container['reuseMidNumber'] = $reuseMidNumber;

        return $this;
    }

    /**
     * Gets serviceLevel
     *
     * @return string|null
     */
    public function getServiceLevel()
    {
        return $this->container['serviceLevel'];
    }

    /**
     * Sets serviceLevel
     *
     * @param string|null $serviceLevel Specifies the service level (settlement type) of this payment method. Required for merchants operating in Japan. Possible values:  * **noContract**: Adyen holds the contract with JCB.  * **gatewayContract**: JCB receives the settlement and handles disputes, then pays out to you or your sub-merchant directly.
     *
     * @return self
     */
    public function setServiceLevel($serviceLevel)
    {
        $allowedValues = $this->getServiceLevelAllowableValues();
        if (!in_array($serviceLevel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'serviceLevel', must be one of '%s'",
                    $serviceLevel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['serviceLevel'] = $serviceLevel;

        return $this;
    }

    /**
     * Gets transactionDescription
     *
     * @return \Adyen\Model\Management\TransactionDescriptionInfo|null
     */
    public function getTransactionDescription()
    {
        return $this->container['transactionDescription'];
    }

    /**
     * Sets transactionDescription
     *
     * @param \Adyen\Model\Management\TransactionDescriptionInfo|null $transactionDescription transactionDescription
     *
     * @return self
     */
    public function setTransactionDescription($transactionDescription)
    {
        $this->container['transactionDescription'] = $transactionDescription;

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
