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
 * ResponseAdditionalDataBillingAddress Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ResponseAdditionalDataBillingAddress implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ResponseAdditionalDataBillingAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billingAddressCity' => 'string',
        'billingAddressCountry' => 'string',
        'billingAddressHouseNumberOrName' => 'string',
        'billingAddressPostalCode' => 'string',
        'billingAddressStateOrProvince' => 'string',
        'billingAddressStreet' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billingAddressCity' => null,
        'billingAddressCountry' => null,
        'billingAddressHouseNumberOrName' => null,
        'billingAddressPostalCode' => null,
        'billingAddressStateOrProvince' => null,
        'billingAddressStreet' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'billingAddressCity' => false,
        'billingAddressCountry' => false,
        'billingAddressHouseNumberOrName' => false,
        'billingAddressPostalCode' => false,
        'billingAddressStateOrProvince' => false,
        'billingAddressStreet' => false
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
        'billingAddressCity' => 'billingAddress.city',
        'billingAddressCountry' => 'billingAddress.country',
        'billingAddressHouseNumberOrName' => 'billingAddress.houseNumberOrName',
        'billingAddressPostalCode' => 'billingAddress.postalCode',
        'billingAddressStateOrProvince' => 'billingAddress.stateOrProvince',
        'billingAddressStreet' => 'billingAddress.street'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billingAddressCity' => 'setBillingAddressCity',
        'billingAddressCountry' => 'setBillingAddressCountry',
        'billingAddressHouseNumberOrName' => 'setBillingAddressHouseNumberOrName',
        'billingAddressPostalCode' => 'setBillingAddressPostalCode',
        'billingAddressStateOrProvince' => 'setBillingAddressStateOrProvince',
        'billingAddressStreet' => 'setBillingAddressStreet'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billingAddressCity' => 'getBillingAddressCity',
        'billingAddressCountry' => 'getBillingAddressCountry',
        'billingAddressHouseNumberOrName' => 'getBillingAddressHouseNumberOrName',
        'billingAddressPostalCode' => 'getBillingAddressPostalCode',
        'billingAddressStateOrProvince' => 'getBillingAddressStateOrProvince',
        'billingAddressStreet' => 'getBillingAddressStreet'
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
        $this->setIfExists('billingAddressCity', $data ?? [], null);
        $this->setIfExists('billingAddressCountry', $data ?? [], null);
        $this->setIfExists('billingAddressHouseNumberOrName', $data ?? [], null);
        $this->setIfExists('billingAddressPostalCode', $data ?? [], null);
        $this->setIfExists('billingAddressStateOrProvince', $data ?? [], null);
        $this->setIfExists('billingAddressStreet', $data ?? [], null);
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
     * Gets billingAddressCity
     *
     * @return string|null
     */
    public function getBillingAddressCity()
    {
        return $this->container['billingAddressCity'];
    }

    /**
     * Sets billingAddressCity
     *
     * @param string|null $billingAddressCity The billing address city passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressCity($billingAddressCity)
    {
        if (is_null($billingAddressCity)) {
            throw new \InvalidArgumentException('non-nullable billingAddressCity cannot be null');
        }
        $this->container['billingAddressCity'] = $billingAddressCity;

        return $this;
    }

    /**
     * Gets billingAddressCountry
     *
     * @return string|null
     */
    public function getBillingAddressCountry()
    {
        return $this->container['billingAddressCountry'];
    }

    /**
     * Sets billingAddressCountry
     *
     * @param string|null $billingAddressCountry The billing address country passed in the payment request.  Example: NL
     *
     * @return self
     */
    public function setBillingAddressCountry($billingAddressCountry)
    {
        if (is_null($billingAddressCountry)) {
            throw new \InvalidArgumentException('non-nullable billingAddressCountry cannot be null');
        }
        $this->container['billingAddressCountry'] = $billingAddressCountry;

        return $this;
    }

    /**
     * Gets billingAddressHouseNumberOrName
     *
     * @return string|null
     */
    public function getBillingAddressHouseNumberOrName()
    {
        return $this->container['billingAddressHouseNumberOrName'];
    }

    /**
     * Sets billingAddressHouseNumberOrName
     *
     * @param string|null $billingAddressHouseNumberOrName The billing address house number or name passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressHouseNumberOrName($billingAddressHouseNumberOrName)
    {
        if (is_null($billingAddressHouseNumberOrName)) {
            throw new \InvalidArgumentException('non-nullable billingAddressHouseNumberOrName cannot be null');
        }
        $this->container['billingAddressHouseNumberOrName'] = $billingAddressHouseNumberOrName;

        return $this;
    }

    /**
     * Gets billingAddressPostalCode
     *
     * @return string|null
     */
    public function getBillingAddressPostalCode()
    {
        return $this->container['billingAddressPostalCode'];
    }

    /**
     * Sets billingAddressPostalCode
     *
     * @param string|null $billingAddressPostalCode The billing address postal code passed in the payment request.  Example: 1011 DJ
     *
     * @return self
     */
    public function setBillingAddressPostalCode($billingAddressPostalCode)
    {
        if (is_null($billingAddressPostalCode)) {
            throw new \InvalidArgumentException('non-nullable billingAddressPostalCode cannot be null');
        }
        $this->container['billingAddressPostalCode'] = $billingAddressPostalCode;

        return $this;
    }

    /**
     * Gets billingAddressStateOrProvince
     *
     * @return string|null
     */
    public function getBillingAddressStateOrProvince()
    {
        return $this->container['billingAddressStateOrProvince'];
    }

    /**
     * Sets billingAddressStateOrProvince
     *
     * @param string|null $billingAddressStateOrProvince The billing address state or province passed in the payment request.  Example: NH
     *
     * @return self
     */
    public function setBillingAddressStateOrProvince($billingAddressStateOrProvince)
    {
        if (is_null($billingAddressStateOrProvince)) {
            throw new \InvalidArgumentException('non-nullable billingAddressStateOrProvince cannot be null');
        }
        $this->container['billingAddressStateOrProvince'] = $billingAddressStateOrProvince;

        return $this;
    }

    /**
     * Gets billingAddressStreet
     *
     * @return string|null
     */
    public function getBillingAddressStreet()
    {
        return $this->container['billingAddressStreet'];
    }

    /**
     * Sets billingAddressStreet
     *
     * @param string|null $billingAddressStreet The billing address street passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressStreet($billingAddressStreet)
    {
        if (is_null($billingAddressStreet)) {
            throw new \InvalidArgumentException('non-nullable billingAddressStreet cannot be null');
        }
        $this->container['billingAddressStreet'] = $billingAddressStreet;

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
