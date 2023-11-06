<?php

/**
 * Adyen BinLookup API
 *
 * The version of the OpenAPI document: 54
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BinLookup;

use \ArrayAccess;
use Adyen\Model\BinLookup\ObjectSerializer;

/**
 * DSPublicKeyDetail Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DSPublicKeyDetail implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DSPublicKeyDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'directoryServerId' => 'string',
        'fromSDKVersion' => 'string',
        'publicKey' => 'string',
        'rootCertificates' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'brand' => null,
        'directoryServerId' => null,
        'fromSDKVersion' => null,
        'publicKey' => 'byte',
        'rootCertificates' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'brand' => false,
        'directoryServerId' => false,
        'fromSDKVersion' => false,
        'publicKey' => false,
        'rootCertificates' => false
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
        'brand' => 'brand',
        'directoryServerId' => 'directoryServerId',
        'fromSDKVersion' => 'fromSDKVersion',
        'publicKey' => 'publicKey',
        'rootCertificates' => 'rootCertificates'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'directoryServerId' => 'setDirectoryServerId',
        'fromSDKVersion' => 'setFromSDKVersion',
        'publicKey' => 'setPublicKey',
        'rootCertificates' => 'setRootCertificates'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'directoryServerId' => 'getDirectoryServerId',
        'fromSDKVersion' => 'getFromSDKVersion',
        'publicKey' => 'getPublicKey',
        'rootCertificates' => 'getRootCertificates'
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
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('directoryServerId', $data ?? [], null);
        $this->setIfExists('fromSDKVersion', $data ?? [], null);
        $this->setIfExists('publicKey', $data ?? [], null);
        $this->setIfExists('rootCertificates', $data ?? [], null);
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
     * Gets brand
     *
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand Card brand.
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets directoryServerId
     *
     * @return string|null
     */
    public function getDirectoryServerId()
    {
        return $this->container['directoryServerId'];
    }

    /**
     * Sets directoryServerId
     *
     * @param string|null $directoryServerId Directory Server (DS) identifier.
     *
     * @return self
     */
    public function setDirectoryServerId($directoryServerId)
    {
        if (is_null($directoryServerId)) {
            throw new \InvalidArgumentException('non-nullable directoryServerId cannot be null');
        }
        $this->container['directoryServerId'] = $directoryServerId;

        return $this;
    }

    /**
     * Gets fromSDKVersion
     *
     * @return string|null
     */
    public function getFromSDKVersion()
    {
        return $this->container['fromSDKVersion'];
    }

    /**
     * Sets fromSDKVersion
     *
     * @param string|null $fromSDKVersion The version of the mobile 3D Secure 2 SDK. For the possible values, refer to the versions in [Adyen 3DS2 Android](https://github.com/Adyen/adyen-3ds2-android/releases) and [Adyen 3DS2 iOS](https://github.com/Adyen/adyen-3ds2-ios/releases).
     *
     * @return self
     */
    public function setFromSDKVersion($fromSDKVersion)
    {
        if (is_null($fromSDKVersion)) {
            throw new \InvalidArgumentException('non-nullable fromSDKVersion cannot be null');
        }
        $this->container['fromSDKVersion'] = $fromSDKVersion;

        return $this;
    }

    /**
     * Gets publicKey
     *
     * @return string|null
     */
    public function getPublicKey()
    {
        return $this->container['publicKey'];
    }

    /**
     * Sets publicKey
     *
     * @param string|null $publicKey Public key. The 3D Secure 2 SDK encrypts the device information by using the DS public key.
     *
     * @return self
     */
    public function setPublicKey($publicKey)
    {
        if (is_null($publicKey)) {
            throw new \InvalidArgumentException('non-nullable publicKey cannot be null');
        }
        $this->container['publicKey'] = $publicKey;

        return $this;
    }

    /**
     * Gets rootCertificates
     *
     * @return string|null
     */
    public function getRootCertificates()
    {
        return $this->container['rootCertificates'];
    }

    /**
     * Sets rootCertificates
     *
     * @param string|null $rootCertificates Directory Server root certificates. The 3D Secure 2 SDK verifies the ACS signed content using the rootCertificates.
     *
     * @return self
     */
    public function setRootCertificates($rootCertificates)
    {
        if (is_null($rootCertificates)) {
            throw new \InvalidArgumentException('non-nullable rootCertificates cannot be null');
        }
        $this->container['rootCertificates'] = $rootCertificates;

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
