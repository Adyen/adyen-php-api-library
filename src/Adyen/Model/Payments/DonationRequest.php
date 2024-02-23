<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * DonationRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DonationRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DonationRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'donationAccount' => 'string',
        'merchantAccount' => 'string',
        'modificationAmount' => '\Adyen\Model\Payments\Amount',
        'originalReference' => 'string',
        'platformChargebackLogic' => '\Adyen\Model\Payments\PlatformChargebackLogic',
        'reference' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'donationAccount' => null,
        'merchantAccount' => null,
        'modificationAmount' => null,
        'originalReference' => null,
        'platformChargebackLogic' => null,
        'reference' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'donationAccount' => false,
        'merchantAccount' => false,
        'modificationAmount' => false,
        'originalReference' => false,
        'platformChargebackLogic' => false,
        'reference' => false
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
        'donationAccount' => 'donationAccount',
        'merchantAccount' => 'merchantAccount',
        'modificationAmount' => 'modificationAmount',
        'originalReference' => 'originalReference',
        'platformChargebackLogic' => 'platformChargebackLogic',
        'reference' => 'reference'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'donationAccount' => 'setDonationAccount',
        'merchantAccount' => 'setMerchantAccount',
        'modificationAmount' => 'setModificationAmount',
        'originalReference' => 'setOriginalReference',
        'platformChargebackLogic' => 'setPlatformChargebackLogic',
        'reference' => 'setReference'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'donationAccount' => 'getDonationAccount',
        'merchantAccount' => 'getMerchantAccount',
        'modificationAmount' => 'getModificationAmount',
        'originalReference' => 'getOriginalReference',
        'platformChargebackLogic' => 'getPlatformChargebackLogic',
        'reference' => 'getReference'
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
        $this->setIfExists('donationAccount', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('modificationAmount', $data ?? [], null);
        $this->setIfExists('originalReference', $data ?? [], null);
        $this->setIfExists('platformChargebackLogic', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
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

        if ($this->container['donationAccount'] === null) {
            $invalidProperties[] = "'donationAccount' can't be null";
        }
        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
        }
        if ($this->container['modificationAmount'] === null) {
            $invalidProperties[] = "'modificationAmount' can't be null";
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
     * Gets donationAccount
     *
     * @return string
     */
    public function getDonationAccount()
    {
        return $this->container['donationAccount'];
    }

    /**
     * Sets donationAccount
     *
     * @param string $donationAccount The Adyen account name of the charity.
     *
     * @return self
     */
    public function setDonationAccount($donationAccount)
    {
        if (is_null($donationAccount)) {
            throw new \InvalidArgumentException('non-nullable donationAccount cannot be null');
        }
        $this->container['donationAccount'] = $donationAccount;

        return $this;
    }

    /**
     * Gets merchantAccount
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchantAccount'];
    }

    /**
     * Sets merchantAccount
     *
     * @param string $merchantAccount The merchant account that is used to process the payment.
     *
     * @return self
     */
    public function setMerchantAccount($merchantAccount)
    {
        if (is_null($merchantAccount)) {
            throw new \InvalidArgumentException('non-nullable merchantAccount cannot be null');
        }
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets modificationAmount
     *
     * @return \Adyen\Model\Payments\Amount
     */
    public function getModificationAmount()
    {
        return $this->container['modificationAmount'];
    }

    /**
     * Sets modificationAmount
     *
     * @param \Adyen\Model\Payments\Amount $modificationAmount modificationAmount
     *
     * @return self
     */
    public function setModificationAmount($modificationAmount)
    {
        if (is_null($modificationAmount)) {
            throw new \InvalidArgumentException('non-nullable modificationAmount cannot be null');
        }
        $this->container['modificationAmount'] = $modificationAmount;

        return $this;
    }

    /**
     * Gets originalReference
     *
     * @return string|null
     */
    public function getOriginalReference()
    {
        return $this->container['originalReference'];
    }

    /**
     * Sets originalReference
     *
     * @param string|null $originalReference The original pspReference of the payment to modify. This reference is returned in: * authorisation response * authorisation notification
     *
     * @return self
     */
    public function setOriginalReference($originalReference)
    {
        if (is_null($originalReference)) {
            throw new \InvalidArgumentException('non-nullable originalReference cannot be null');
        }
        $this->container['originalReference'] = $originalReference;

        return $this;
    }

    /**
     * Gets platformChargebackLogic
     *
     * @return \Adyen\Model\Payments\PlatformChargebackLogic|null
     */
    public function getPlatformChargebackLogic()
    {
        return $this->container['platformChargebackLogic'];
    }

    /**
     * Sets platformChargebackLogic
     *
     * @param \Adyen\Model\Payments\PlatformChargebackLogic|null $platformChargebackLogic platformChargebackLogic
     *
     * @return self
     */
    public function setPlatformChargebackLogic($platformChargebackLogic)
    {
        if (is_null($platformChargebackLogic)) {
            throw new \InvalidArgumentException('non-nullable platformChargebackLogic cannot be null');
        }
        $this->container['platformChargebackLogic'] = $platformChargebackLogic;

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
     * @param string|null $reference Your reference for the payment modification. This reference is visible in Customer Area and in reports. Maximum length: 80 characters.
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
