<?php

/**
 * Configuration webhooks
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\ConfigurationWebhooks;

use \ArrayAccess;
use Adyen\Model\ConfigurationWebhooks\ObjectSerializer;

/**
 * Contact Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Contact implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Contact';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'address' => '\Adyen\Model\ConfigurationWebhooks\Address',
        'email' => 'string',
        'fullPhoneNumber' => 'string',
        'name' => '\Adyen\Model\ConfigurationWebhooks\Name',
        'personalData' => '\Adyen\Model\ConfigurationWebhooks\PersonalData',
        'phoneNumber' => '\Adyen\Model\ConfigurationWebhooks\PhoneNumber',
        'webAddress' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'address' => null,
        'email' => null,
        'fullPhoneNumber' => null,
        'name' => null,
        'personalData' => null,
        'phoneNumber' => null,
        'webAddress' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'address' => false,
        'email' => false,
        'fullPhoneNumber' => false,
        'name' => false,
        'personalData' => false,
        'phoneNumber' => false,
        'webAddress' => false
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
        'address' => 'address',
        'email' => 'email',
        'fullPhoneNumber' => 'fullPhoneNumber',
        'name' => 'name',
        'personalData' => 'personalData',
        'phoneNumber' => 'phoneNumber',
        'webAddress' => 'webAddress'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address' => 'setAddress',
        'email' => 'setEmail',
        'fullPhoneNumber' => 'setFullPhoneNumber',
        'name' => 'setName',
        'personalData' => 'setPersonalData',
        'phoneNumber' => 'setPhoneNumber',
        'webAddress' => 'setWebAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address' => 'getAddress',
        'email' => 'getEmail',
        'fullPhoneNumber' => 'getFullPhoneNumber',
        'name' => 'getName',
        'personalData' => 'getPersonalData',
        'phoneNumber' => 'getPhoneNumber',
        'webAddress' => 'getWebAddress'
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
        $this->setIfExists('address', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('fullPhoneNumber', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('personalData', $data ?? [], null);
        $this->setIfExists('phoneNumber', $data ?? [], null);
        $this->setIfExists('webAddress', $data ?? [], null);
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
     * Gets address
     *
     * @return \Adyen\Model\ConfigurationWebhooks\Address|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \Adyen\Model\ConfigurationWebhooks\Address|null $address address
     *
     * @return self
     */
    public function setAddress($address)
    {
        if (is_null($address)) {
            throw new \InvalidArgumentException('non-nullable address cannot be null');
        }
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email The e-mail address of the contact.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets fullPhoneNumber
     *
     * @return string|null
     */
    public function getFullPhoneNumber()
    {
        return $this->container['fullPhoneNumber'];
    }

    /**
     * Sets fullPhoneNumber
     *
     * @param string|null $fullPhoneNumber The phone number of the contact provided as a single string.  It will be handled as a landline phone. **Examples:** \"0031 6 11 22 33 44\", \"+316/1122-3344\", \"(0031) 611223344\"
     *
     * @return self
     */
    public function setFullPhoneNumber($fullPhoneNumber)
    {
        if (is_null($fullPhoneNumber)) {
            throw new \InvalidArgumentException('non-nullable fullPhoneNumber cannot be null');
        }
        $this->container['fullPhoneNumber'] = $fullPhoneNumber;

        return $this;
    }

    /**
     * Gets name
     *
     * @return \Adyen\Model\ConfigurationWebhooks\Name|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param \Adyen\Model\ConfigurationWebhooks\Name|null $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets personalData
     *
     * @return \Adyen\Model\ConfigurationWebhooks\PersonalData|null
     */
    public function getPersonalData()
    {
        return $this->container['personalData'];
    }

    /**
     * Sets personalData
     *
     * @param \Adyen\Model\ConfigurationWebhooks\PersonalData|null $personalData personalData
     *
     * @return self
     */
    public function setPersonalData($personalData)
    {
        if (is_null($personalData)) {
            throw new \InvalidArgumentException('non-nullable personalData cannot be null');
        }
        $this->container['personalData'] = $personalData;

        return $this;
    }

    /**
     * Gets phoneNumber
     *
     * @return \Adyen\Model\ConfigurationWebhooks\PhoneNumber|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phoneNumber'];
    }

    /**
     * Sets phoneNumber
     *
     * @param \Adyen\Model\ConfigurationWebhooks\PhoneNumber|null $phoneNumber phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        if (is_null($phoneNumber)) {
            throw new \InvalidArgumentException('non-nullable phoneNumber cannot be null');
        }
        $this->container['phoneNumber'] = $phoneNumber;

        return $this;
    }

    /**
     * Gets webAddress
     *
     * @return string|null
     */
    public function getWebAddress()
    {
        return $this->container['webAddress'];
    }

    /**
     * Sets webAddress
     *
     * @param string|null $webAddress The URL of the website of the contact.
     *
     * @return self
     */
    public function setWebAddress($webAddress)
    {
        if (is_null($webAddress)) {
            throw new \InvalidArgumentException('non-nullable webAddress cannot be null');
        }
        $this->container['webAddress'] = $webAddress;

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
