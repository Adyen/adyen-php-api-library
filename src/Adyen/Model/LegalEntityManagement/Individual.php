<?php

/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\LegalEntityManagement;

use \ArrayAccess;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

/**
 * Individual Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Individual implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Individual';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'birthData' => '\Adyen\Model\LegalEntityManagement\BirthData',
        'email' => 'string',
        'identificationData' => '\Adyen\Model\LegalEntityManagement\IdentificationData',
        'name' => '\Adyen\Model\LegalEntityManagement\Name',
        'nationality' => 'string',
        'phone' => '\Adyen\Model\LegalEntityManagement\PhoneNumber',
        'residentialAddress' => '\Adyen\Model\LegalEntityManagement\Address',
        'taxInformation' => '\Adyen\Model\LegalEntityManagement\TaxInformation[]',
        'webData' => '\Adyen\Model\LegalEntityManagement\WebData'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'birthData' => null,
        'email' => null,
        'identificationData' => null,
        'name' => null,
        'nationality' => null,
        'phone' => null,
        'residentialAddress' => null,
        'taxInformation' => null,
        'webData' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'birthData' => false,
        'email' => false,
        'identificationData' => false,
        'name' => false,
        'nationality' => false,
        'phone' => false,
        'residentialAddress' => false,
        'taxInformation' => false,
        'webData' => false
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
        'birthData' => 'birthData',
        'email' => 'email',
        'identificationData' => 'identificationData',
        'name' => 'name',
        'nationality' => 'nationality',
        'phone' => 'phone',
        'residentialAddress' => 'residentialAddress',
        'taxInformation' => 'taxInformation',
        'webData' => 'webData'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'birthData' => 'setBirthData',
        'email' => 'setEmail',
        'identificationData' => 'setIdentificationData',
        'name' => 'setName',
        'nationality' => 'setNationality',
        'phone' => 'setPhone',
        'residentialAddress' => 'setResidentialAddress',
        'taxInformation' => 'setTaxInformation',
        'webData' => 'setWebData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'birthData' => 'getBirthData',
        'email' => 'getEmail',
        'identificationData' => 'getIdentificationData',
        'name' => 'getName',
        'nationality' => 'getNationality',
        'phone' => 'getPhone',
        'residentialAddress' => 'getResidentialAddress',
        'taxInformation' => 'getTaxInformation',
        'webData' => 'getWebData'
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
        $this->setIfExists('birthData', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('identificationData', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('nationality', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('residentialAddress', $data ?? [], null);
        $this->setIfExists('taxInformation', $data ?? [], null);
        $this->setIfExists('webData', $data ?? [], null);
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['residentialAddress'] === null) {
            $invalidProperties[] = "'residentialAddress' can't be null";
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
     * Gets birthData
     *
     * @return \Adyen\Model\LegalEntityManagement\BirthData|null
     */
    public function getBirthData()
    {
        return $this->container['birthData'];
    }

    /**
     * Sets birthData
     *
     * @param \Adyen\Model\LegalEntityManagement\BirthData|null $birthData birthData
     *
     * @return self
     */
    public function setBirthData($birthData)
    {
        $this->container['birthData'] = $birthData;

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
     * @param string|null $email The email address of the legal entity.
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets identificationData
     *
     * @return \Adyen\Model\LegalEntityManagement\IdentificationData|null
     */
    public function getIdentificationData()
    {
        return $this->container['identificationData'];
    }

    /**
     * Sets identificationData
     *
     * @param \Adyen\Model\LegalEntityManagement\IdentificationData|null $identificationData identificationData
     *
     * @return self
     */
    public function setIdentificationData($identificationData)
    {
        $this->container['identificationData'] = $identificationData;

        return $this;
    }

    /**
     * Gets name
     *
     * @return \Adyen\Model\LegalEntityManagement\Name
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param \Adyen\Model\LegalEntityManagement\Name $name name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets nationality
     *
     * @return string|null
     */
    public function getNationality()
    {
        return $this->container['nationality'];
    }

    /**
     * Sets nationality
     *
     * @param string|null $nationality The individual's nationality.
     *
     * @return self
     */
    public function setNationality($nationality)
    {
        $this->container['nationality'] = $nationality;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return \Adyen\Model\LegalEntityManagement\PhoneNumber|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param \Adyen\Model\LegalEntityManagement\PhoneNumber|null $phone phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets residentialAddress
     *
     * @return \Adyen\Model\LegalEntityManagement\Address
     */
    public function getResidentialAddress()
    {
        return $this->container['residentialAddress'];
    }

    /**
     * Sets residentialAddress
     *
     * @param \Adyen\Model\LegalEntityManagement\Address $residentialAddress residentialAddress
     *
     * @return self
     */
    public function setResidentialAddress($residentialAddress)
    {
        $this->container['residentialAddress'] = $residentialAddress;

        return $this;
    }

    /**
     * Gets taxInformation
     *
     * @return \Adyen\Model\LegalEntityManagement\TaxInformation[]|null
     */
    public function getTaxInformation()
    {
        return $this->container['taxInformation'];
    }

    /**
     * Sets taxInformation
     *
     * @param \Adyen\Model\LegalEntityManagement\TaxInformation[]|null $taxInformation The tax information of the individual.
     *
     * @return self
     */
    public function setTaxInformation($taxInformation)
    {
        $this->container['taxInformation'] = $taxInformation;

        return $this;
    }

    /**
     * Gets webData
     *
     * @return \Adyen\Model\LegalEntityManagement\WebData|null
     */
    public function getWebData()
    {
        return $this->container['webData'];
    }

    /**
     * Sets webData
     *
     * @param \Adyen\Model\LegalEntityManagement\WebData|null $webData webData
     *
     * @return self
     */
    public function setWebData($webData)
    {
        $this->container['webData'] = $webData;

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
