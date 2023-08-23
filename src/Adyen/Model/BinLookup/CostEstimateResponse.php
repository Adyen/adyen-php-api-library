<?php

/**
 * Adyen BinLookup API
 *
 * The version of the OpenAPI document: 54
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\BinLookup;

use \ArrayAccess;
use Adyen\Model\BinLookup\ObjectSerializer;

/**
 * CostEstimateResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CostEstimateResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CostEstimateResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cardBin' => '\Adyen\Model\BinLookup\CardBin',
        'costEstimateAmount' => '\Adyen\Model\BinLookup\Amount',
        'costEstimateReference' => 'string',
        'resultCode' => 'string',
        'surchargeType' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cardBin' => null,
        'costEstimateAmount' => null,
        'costEstimateReference' => null,
        'resultCode' => null,
        'surchargeType' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cardBin' => false,
        'costEstimateAmount' => false,
        'costEstimateReference' => false,
        'resultCode' => false,
        'surchargeType' => false
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
        'cardBin' => 'cardBin',
        'costEstimateAmount' => 'costEstimateAmount',
        'costEstimateReference' => 'costEstimateReference',
        'resultCode' => 'resultCode',
        'surchargeType' => 'surchargeType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cardBin' => 'setCardBin',
        'costEstimateAmount' => 'setCostEstimateAmount',
        'costEstimateReference' => 'setCostEstimateReference',
        'resultCode' => 'setResultCode',
        'surchargeType' => 'setSurchargeType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cardBin' => 'getCardBin',
        'costEstimateAmount' => 'getCostEstimateAmount',
        'costEstimateReference' => 'getCostEstimateReference',
        'resultCode' => 'getResultCode',
        'surchargeType' => 'getSurchargeType'
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
    public function __construct(array $data = null)
    {
        $this->setIfExists('cardBin', $data ?? [], null);
        $this->setIfExists('costEstimateAmount', $data ?? [], null);
        $this->setIfExists('costEstimateReference', $data ?? [], null);
        $this->setIfExists('resultCode', $data ?? [], null);
        $this->setIfExists('surchargeType', $data ?? [], null);
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
     * Gets cardBin
     *
     * @return \Adyen\Model\BinLookup\CardBin|null
     */
    public function getCardBin()
    {
        return $this->container['cardBin'];
    }

    /**
     * Sets cardBin
     *
     * @param \Adyen\Model\BinLookup\CardBin|null $cardBin cardBin
     *
     * @return self
     */
    public function setCardBin($cardBin)
    {
        if (is_null($cardBin)) {
            throw new \InvalidArgumentException('non-nullable cardBin cannot be null');
        }
        $this->container['cardBin'] = $cardBin;

        return $this;
    }

    /**
     * Gets costEstimateAmount
     *
     * @return \Adyen\Model\BinLookup\Amount|null
     */
    public function getCostEstimateAmount()
    {
        return $this->container['costEstimateAmount'];
    }

    /**
     * Sets costEstimateAmount
     *
     * @param \Adyen\Model\BinLookup\Amount|null $costEstimateAmount costEstimateAmount
     *
     * @return self
     */
    public function setCostEstimateAmount($costEstimateAmount)
    {
        if (is_null($costEstimateAmount)) {
            throw new \InvalidArgumentException('non-nullable costEstimateAmount cannot be null');
        }
        $this->container['costEstimateAmount'] = $costEstimateAmount;

        return $this;
    }

    /**
     * Gets costEstimateReference
     *
     * @return string|null
     */
    public function getCostEstimateReference()
    {
        return $this->container['costEstimateReference'];
    }

    /**
     * Sets costEstimateReference
     *
     * @param string|null $costEstimateReference Adyen's 16-character reference associated with the request.
     *
     * @return self
     */
    public function setCostEstimateReference($costEstimateReference)
    {
        if (is_null($costEstimateReference)) {
            throw new \InvalidArgumentException('non-nullable costEstimateReference cannot be null');
        }
        $this->container['costEstimateReference'] = $costEstimateReference;

        return $this;
    }

    /**
     * Gets resultCode
     *
     * @return string|null
     */
    public function getResultCode()
    {
        return $this->container['resultCode'];
    }

    /**
     * Sets resultCode
     *
     * @param string|null $resultCode The result of the cost estimation.
     *
     * @return self
     */
    public function setResultCode($resultCode)
    {
        if (is_null($resultCode)) {
            throw new \InvalidArgumentException('non-nullable resultCode cannot be null');
        }
        $this->container['resultCode'] = $resultCode;

        return $this;
    }

    /**
     * Gets surchargeType
     *
     * @return string|null
     */
    public function getSurchargeType()
    {
        return $this->container['surchargeType'];
    }

    /**
     * Sets surchargeType
     *
     * @param string|null $surchargeType Indicates the way the charges can be passed on to the cardholder. The following values are possible: * `ZERO` - the charges are not allowed to pass on * `PASSTHROUGH` - the charges can be passed on * `UNLIMITED` - there is no limit on how much surcharge is passed on
     *
     * @return self
     */
    public function setSurchargeType($surchargeType)
    {
        if (is_null($surchargeType)) {
            throw new \InvalidArgumentException('non-nullable surchargeType cannot be null');
        }
        $this->container['surchargeType'] = $surchargeType;

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
