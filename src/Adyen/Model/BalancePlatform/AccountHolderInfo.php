<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * AccountHolderInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AccountHolderInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AccountHolderInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'balancePlatform' => 'string',
        'capabilities' => 'array<string,\Adyen\Model\BalancePlatform\AccountHolderCapability>',
        'contactDetails' => '\Adyen\Model\BalancePlatform\ContactDetails',
        'description' => 'string',
        'legalEntityId' => 'string',
        'metadata' => 'array<string,string>',
        'migratedAccountHolderCode' => 'string',
        'reference' => 'string',
        'timeZone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'balancePlatform' => null,
        'capabilities' => null,
        'contactDetails' => null,
        'description' => null,
        'legalEntityId' => null,
        'metadata' => null,
        'migratedAccountHolderCode' => null,
        'reference' => null,
        'timeZone' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'balancePlatform' => false,
        'capabilities' => false,
        'contactDetails' => false,
        'description' => false,
        'legalEntityId' => false,
        'metadata' => false,
        'migratedAccountHolderCode' => false,
        'reference' => false,
        'timeZone' => false
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
        'balancePlatform' => 'balancePlatform',
        'capabilities' => 'capabilities',
        'contactDetails' => 'contactDetails',
        'description' => 'description',
        'legalEntityId' => 'legalEntityId',
        'metadata' => 'metadata',
        'migratedAccountHolderCode' => 'migratedAccountHolderCode',
        'reference' => 'reference',
        'timeZone' => 'timeZone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'balancePlatform' => 'setBalancePlatform',
        'capabilities' => 'setCapabilities',
        'contactDetails' => 'setContactDetails',
        'description' => 'setDescription',
        'legalEntityId' => 'setLegalEntityId',
        'metadata' => 'setMetadata',
        'migratedAccountHolderCode' => 'setMigratedAccountHolderCode',
        'reference' => 'setReference',
        'timeZone' => 'setTimeZone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'balancePlatform' => 'getBalancePlatform',
        'capabilities' => 'getCapabilities',
        'contactDetails' => 'getContactDetails',
        'description' => 'getDescription',
        'legalEntityId' => 'getLegalEntityId',
        'metadata' => 'getMetadata',
        'migratedAccountHolderCode' => 'getMigratedAccountHolderCode',
        'reference' => 'getReference',
        'timeZone' => 'getTimeZone'
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
        $this->setIfExists('balancePlatform', $data ?? [], null);
        $this->setIfExists('capabilities', $data ?? [], null);
        $this->setIfExists('contactDetails', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('legalEntityId', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('migratedAccountHolderCode', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('timeZone', $data ?? [], null);
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

        if ($this->container['legalEntityId'] === null) {
            $invalidProperties[] = "'legalEntityId' can't be null";
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
     * @param string|null $balancePlatform The unique identifier of the [balance platform](https://docs.adyen.com/api-explorer/#/balanceplatform/latest/get/balancePlatforms/{id}__queryParam_id) to which the account holder belongs. Required in the request if your API credentials can be used for multiple balance platforms.
     *
     * @return self
     */
    public function setBalancePlatform($balancePlatform)
    {
        if (is_null($balancePlatform)) {
            throw new \InvalidArgumentException('non-nullable balancePlatform cannot be null');
        }
        $this->container['balancePlatform'] = $balancePlatform;

        return $this;
    }

    /**
     * Gets capabilities
     *
     * @return array<string,\Adyen\Model\BalancePlatform\AccountHolderCapability>|null
     */
    public function getCapabilities()
    {
        return $this->container['capabilities'];
    }

    /**
     * Sets capabilities
     *
     * @param array<string,\Adyen\Model\BalancePlatform\AccountHolderCapability>|null $capabilities Contains key-value pairs that specify the actions that an account holder can do in your platform. The key is a capability required for your integration. For example, **issueCard** for Issuing. The value is an object containing the settings for the capability.
     *
     * @return self
     */
    public function setCapabilities($capabilities)
    {
        if (is_null($capabilities)) {
            throw new \InvalidArgumentException('non-nullable capabilities cannot be null');
        }
        $this->container['capabilities'] = $capabilities;

        return $this;
    }

    /**
     * Gets contactDetails
     *
     * @return \Adyen\Model\BalancePlatform\ContactDetails|null
     */
    public function getContactDetails()
    {
        return $this->container['contactDetails'];
    }

    /**
     * Sets contactDetails
     *
     * @param \Adyen\Model\BalancePlatform\ContactDetails|null $contactDetails contactDetails
     *
     * @return self
     */
    public function setContactDetails($contactDetails)
    {
        if (is_null($contactDetails)) {
            throw new \InvalidArgumentException('non-nullable contactDetails cannot be null');
        }
        $this->container['contactDetails'] = $contactDetails;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Your description for the account holder.
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets legalEntityId
     *
     * @return string
     */
    public function getLegalEntityId()
    {
        return $this->container['legalEntityId'];
    }

    /**
     * Sets legalEntityId
     *
     * @param string $legalEntityId The unique identifier of the [legal entity](https://docs.adyen.com/api-explorer/legalentity/latest/post/legalEntities#responses-200-id) associated with the account holder. Adyen performs a verification process against the legal entity of the account holder.
     *
     * @return self
     */
    public function setLegalEntityId($legalEntityId)
    {
        if (is_null($legalEntityId)) {
            throw new \InvalidArgumentException('non-nullable legalEntityId cannot be null');
        }
        $this->container['legalEntityId'] = $legalEntityId;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,string>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,string>|null $metadata A set of key and value pairs for general use. The keys do not have specific names and may be used for storing miscellaneous data as desired. > Note that during an update of metadata, the omission of existing key-value pairs will result in the deletion of those key-value pairs.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets migratedAccountHolderCode
     *
     * @return string|null
     */
    public function getMigratedAccountHolderCode()
    {
        return $this->container['migratedAccountHolderCode'];
    }

    /**
     * Sets migratedAccountHolderCode
     *
     * @param string|null $migratedAccountHolderCode The unique identifier of the migrated account holder in the classic integration.
     *
     * @return self
     */
    public function setMigratedAccountHolderCode($migratedAccountHolderCode)
    {
        if (is_null($migratedAccountHolderCode)) {
            throw new \InvalidArgumentException('non-nullable migratedAccountHolderCode cannot be null');
        }
        $this->container['migratedAccountHolderCode'] = $migratedAccountHolderCode;

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
     * @param string|null $reference Your reference for the account holder.
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
     * Gets timeZone
     *
     * @return string|null
     */
    public function getTimeZone()
    {
        return $this->container['timeZone'];
    }

    /**
     * Sets timeZone
     *
     * @param string|null $timeZone The time zone of the account holder. For example, **Europe/Amsterdam**. Defaults to the time zone of the balance platform if no time zone is set. For possible values, see the [list of time zone codes](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones).
     *
     * @return self
     */
    public function setTimeZone($timeZone)
    {
        if (is_null($timeZone)) {
            throw new \InvalidArgumentException('non-nullable timeZone cannot be null');
        }
        $this->container['timeZone'] = $timeZone;

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
