<?php

/**
 * Adyen Payout API
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


namespace Adyen\Model\Payout;

use \ArrayAccess;
use Adyen\Model\Payout\ObjectSerializer;

/**
 * FundSource Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FundSource implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FundSource';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additional_data' => 'array<string,string>',
        'billing_address' => '\Adyen\Model\Payout\Address',
        'card' => '\Adyen\Model\Payout\Card',
        'shopper_email' => 'string',
        'shopper_name' => '\Adyen\Model\Payout\Name',
        'telephone_number' => 'string'
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
        'billing_address' => null,
        'card' => null,
        'shopper_email' => null,
        'shopper_name' => null,
        'telephone_number' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additional_data' => false,
        'billing_address' => false,
        'card' => false,
        'shopper_email' => false,
        'shopper_name' => false,
        'telephone_number' => false
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
        'billing_address' => 'billingAddress',
        'card' => 'card',
        'shopper_email' => 'shopperEmail',
        'shopper_name' => 'shopperName',
        'telephone_number' => 'telephoneNumber'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'billing_address' => 'setBillingAddress',
        'card' => 'setCard',
        'shopper_email' => 'setShopperEmail',
        'shopper_name' => 'setShopperName',
        'telephone_number' => 'setTelephoneNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'billing_address' => 'getBillingAddress',
        'card' => 'getCard',
        'shopper_email' => 'getShopperEmail',
        'shopper_name' => 'getShopperName',
        'telephone_number' => 'getTelephoneNumber'
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
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('shopper_email', $data ?? [], null);
        $this->setIfExists('shopper_name', $data ?? [], null);
        $this->setIfExists('telephone_number', $data ?? [], null);
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
     * @param array<string,string>|null $additional_data A map of name-value pairs for passing additional or industry-specific data.
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
     * Gets billing_address
     *
     * @return \Adyen\Model\Payout\Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param \Adyen\Model\Payout\Address|null $billing_address billing_address
     *
     * @return self
     */
    public function setBillingAddress($billing_address)
    {
        if (is_null($billing_address)) {
            throw new \InvalidArgumentException('non-nullable billing_address cannot be null');
        }
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\Payout\Card|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\Payout\Card|null $card card
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
     * Gets shopper_email
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopper_email'];
    }

    /**
     * Sets shopper_email
     *
     * @param string|null $shopper_email Email address of the person.
     *
     * @return self
     */
    public function setShopperEmail($shopper_email)
    {
        if (is_null($shopper_email)) {
            throw new \InvalidArgumentException('non-nullable shopper_email cannot be null');
        }
        $this->container['shopper_email'] = $shopper_email;

        return $this;
    }

    /**
     * Gets shopper_name
     *
     * @return \Adyen\Model\Payout\Name|null
     */
    public function getShopperName()
    {
        return $this->container['shopper_name'];
    }

    /**
     * Sets shopper_name
     *
     * @param \Adyen\Model\Payout\Name|null $shopper_name shopper_name
     *
     * @return self
     */
    public function setShopperName($shopper_name)
    {
        if (is_null($shopper_name)) {
            throw new \InvalidArgumentException('non-nullable shopper_name cannot be null');
        }
        $this->container['shopper_name'] = $shopper_name;

        return $this;
    }

    /**
     * Gets telephone_number
     *
     * @return string|null
     */
    public function getTelephoneNumber()
    {
        return $this->container['telephone_number'];
    }

    /**
     * Sets telephone_number
     *
     * @param string|null $telephone_number Phone number of the person
     *
     * @return self
     */
    public function setTelephoneNumber($telephone_number)
    {
        if (is_null($telephone_number)) {
            throw new \InvalidArgumentException('non-nullable telephone_number cannot be null');
        }
        $this->container['telephone_number'] = $telephone_number;

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