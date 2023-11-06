<?php

/**
 * Management API
 *
 * The version of the OpenAPI document: 1
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
 * StoreCreationWithMerchantCodeRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoreCreationWithMerchantCodeRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoreCreationWithMerchantCodeRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'address' => '\Adyen\Model\Management\StoreLocation',
        'businessLineIds' => 'string[]',
        'description' => 'string',
        'externalReferenceId' => 'string',
        'merchantId' => 'string',
        'phoneNumber' => 'string',
        'reference' => 'string',
        'shopperStatement' => 'string',
        'splitConfiguration' => '\Adyen\Model\Management\StoreSplitConfiguration'
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
        'businessLineIds' => null,
        'description' => null,
        'externalReferenceId' => null,
        'merchantId' => null,
        'phoneNumber' => null,
        'reference' => null,
        'shopperStatement' => null,
        'splitConfiguration' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'address' => false,
        'businessLineIds' => false,
        'description' => false,
        'externalReferenceId' => false,
        'merchantId' => false,
        'phoneNumber' => false,
        'reference' => false,
        'shopperStatement' => false,
        'splitConfiguration' => false
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
        'businessLineIds' => 'businessLineIds',
        'description' => 'description',
        'externalReferenceId' => 'externalReferenceId',
        'merchantId' => 'merchantId',
        'phoneNumber' => 'phoneNumber',
        'reference' => 'reference',
        'shopperStatement' => 'shopperStatement',
        'splitConfiguration' => 'splitConfiguration'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address' => 'setAddress',
        'businessLineIds' => 'setBusinessLineIds',
        'description' => 'setDescription',
        'externalReferenceId' => 'setExternalReferenceId',
        'merchantId' => 'setMerchantId',
        'phoneNumber' => 'setPhoneNumber',
        'reference' => 'setReference',
        'shopperStatement' => 'setShopperStatement',
        'splitConfiguration' => 'setSplitConfiguration'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address' => 'getAddress',
        'businessLineIds' => 'getBusinessLineIds',
        'description' => 'getDescription',
        'externalReferenceId' => 'getExternalReferenceId',
        'merchantId' => 'getMerchantId',
        'phoneNumber' => 'getPhoneNumber',
        'reference' => 'getReference',
        'shopperStatement' => 'getShopperStatement',
        'splitConfiguration' => 'getSplitConfiguration'
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
        $this->setIfExists('businessLineIds', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('externalReferenceId', $data ?? [], null);
        $this->setIfExists('merchantId', $data ?? [], null);
        $this->setIfExists('phoneNumber', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopperStatement', $data ?? [], null);
        $this->setIfExists('splitConfiguration', $data ?? [], null);
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

        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['merchantId'] === null) {
            $invalidProperties[] = "'merchantId' can't be null";
        }
        if ($this->container['phoneNumber'] === null) {
            $invalidProperties[] = "'phoneNumber' can't be null";
        }
        if ($this->container['shopperStatement'] === null) {
            $invalidProperties[] = "'shopperStatement' can't be null";
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
     * Gets address
     *
     * @return \Adyen\Model\Management\StoreLocation
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \Adyen\Model\Management\StoreLocation $address address
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
     * Gets businessLineIds
     *
     * @return string[]|null
     */
    public function getBusinessLineIds()
    {
        return $this->container['businessLineIds'];
    }

    /**
     * Sets businessLineIds
     *
     * @param string[]|null $businessLineIds The unique identifiers of the [business lines](https://docs.adyen.com/api-explorer/legalentity/latest/post/businessLines#responses-200-id) that the store is associated with. If not specified, the business line of the merchant account is used. Required when there are multiple business lines under the merchant account.
     *
     * @return self
     */
    public function setBusinessLineIds($businessLineIds)
    {
        if (is_null($businessLineIds)) {
            throw new \InvalidArgumentException('non-nullable businessLineIds cannot be null');
        }
        $this->container['businessLineIds'] = $businessLineIds;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Your description of the store.
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
     * Gets externalReferenceId
     *
     * @return string|null
     */
    public function getExternalReferenceId()
    {
        return $this->container['externalReferenceId'];
    }

    /**
     * Sets externalReferenceId
     *
     * @param string|null $externalReferenceId The unique identifier of the store, used by certain payment methods and tax authorities. Accepts up to 14 digits.  Required for CNPJ in Brazil, in the format 00.000.000/00git00-00 separated by dots, slashes, hyphens, or without separators.  Optional for Zip in Australia and SIRET in France, required except for nonprofit organizations and incorporated associations.
     *
     * @return self
     */
    public function setExternalReferenceId($externalReferenceId)
    {
        if (is_null($externalReferenceId)) {
            throw new \InvalidArgumentException('non-nullable externalReferenceId cannot be null');
        }
        $this->container['externalReferenceId'] = $externalReferenceId;

        return $this;
    }

    /**
     * Gets merchantId
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->container['merchantId'];
    }

    /**
     * Sets merchantId
     *
     * @param string $merchantId The unique identifier of the merchant account that the store belongs to.
     *
     * @return self
     */
    public function setMerchantId($merchantId)
    {
        if (is_null($merchantId)) {
            throw new \InvalidArgumentException('non-nullable merchantId cannot be null');
        }
        $this->container['merchantId'] = $merchantId;

        return $this;
    }

    /**
     * Gets phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phoneNumber'];
    }

    /**
     * Sets phoneNumber
     *
     * @param string $phoneNumber The phone number of the store, including '+' and country code.
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
     * @param string|null $reference Your reference to recognize the store by. Also known as the store code.  Allowed characters: lowercase and uppercase letters without diacritics, numbers 0 through 9, hyphen (-), and underscore (_).  If you do not provide a reference in your POST request, it is populated with the Adyen-generated [id](https://docs.adyen.com/api-explorer/Management/latest/post/stores#responses-200-id).
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
     * Gets shopperStatement
     *
     * @return string
     */
    public function getShopperStatement()
    {
        return $this->container['shopperStatement'];
    }

    /**
     * Sets shopperStatement
     *
     * @param string $shopperStatement The store name to be shown on the shopper's bank or credit card statement and on the shopper receipt. Maximum length: 22 characters; can't be all numbers.
     *
     * @return self
     */
    public function setShopperStatement($shopperStatement)
    {
        if (is_null($shopperStatement)) {
            throw new \InvalidArgumentException('non-nullable shopperStatement cannot be null');
        }
        $this->container['shopperStatement'] = $shopperStatement;

        return $this;
    }

    /**
     * Gets splitConfiguration
     *
     * @return \Adyen\Model\Management\StoreSplitConfiguration|null
     */
    public function getSplitConfiguration()
    {
        return $this->container['splitConfiguration'];
    }

    /**
     * Sets splitConfiguration
     *
     * @param \Adyen\Model\Management\StoreSplitConfiguration|null $splitConfiguration splitConfiguration
     *
     * @return self
     */
    public function setSplitConfiguration($splitConfiguration)
    {
        if (is_null($splitConfiguration)) {
            throw new \InvalidArgumentException('non-nullable splitConfiguration cannot be null');
        }
        $this->container['splitConfiguration'] = $splitConfiguration;

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
