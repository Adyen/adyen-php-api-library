<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * DeviceInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DeviceInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DeviceInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cardCaptureTechnology' => 'string',
        'deviceName' => 'string',
        'formFactor' => 'string',
        'imei' => 'string',
        'isoDeviceType' => 'string',
        'msisdn' => 'string',
        'osName' => 'string',
        'osVersion' => 'string',
        'paymentTypes' => 'string[]',
        'serialNumber' => 'string',
        'storageTechnology' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cardCaptureTechnology' => null,
        'deviceName' => null,
        'formFactor' => null,
        'imei' => null,
        'isoDeviceType' => null,
        'msisdn' => null,
        'osName' => null,
        'osVersion' => null,
        'paymentTypes' => null,
        'serialNumber' => null,
        'storageTechnology' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cardCaptureTechnology' => false,
		'deviceName' => false,
		'formFactor' => false,
		'imei' => false,
		'isoDeviceType' => false,
		'msisdn' => false,
		'osName' => false,
		'osVersion' => false,
		'paymentTypes' => false,
		'serialNumber' => false,
		'storageTechnology' => false
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
        'cardCaptureTechnology' => 'cardCaptureTechnology',
        'deviceName' => 'deviceName',
        'formFactor' => 'formFactor',
        'imei' => 'imei',
        'isoDeviceType' => 'isoDeviceType',
        'msisdn' => 'msisdn',
        'osName' => 'osName',
        'osVersion' => 'osVersion',
        'paymentTypes' => 'paymentTypes',
        'serialNumber' => 'serialNumber',
        'storageTechnology' => 'storageTechnology'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cardCaptureTechnology' => 'setCardCaptureTechnology',
        'deviceName' => 'setDeviceName',
        'formFactor' => 'setFormFactor',
        'imei' => 'setImei',
        'isoDeviceType' => 'setIsoDeviceType',
        'msisdn' => 'setMsisdn',
        'osName' => 'setOsName',
        'osVersion' => 'setOsVersion',
        'paymentTypes' => 'setPaymentTypes',
        'serialNumber' => 'setSerialNumber',
        'storageTechnology' => 'setStorageTechnology'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cardCaptureTechnology' => 'getCardCaptureTechnology',
        'deviceName' => 'getDeviceName',
        'formFactor' => 'getFormFactor',
        'imei' => 'getImei',
        'isoDeviceType' => 'getIsoDeviceType',
        'msisdn' => 'getMsisdn',
        'osName' => 'getOsName',
        'osVersion' => 'getOsVersion',
        'paymentTypes' => 'getPaymentTypes',
        'serialNumber' => 'getSerialNumber',
        'storageTechnology' => 'getStorageTechnology'
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
        $this->setIfExists('cardCaptureTechnology', $data ?? [], null);
        $this->setIfExists('deviceName', $data ?? [], null);
        $this->setIfExists('formFactor', $data ?? [], null);
        $this->setIfExists('imei', $data ?? [], null);
        $this->setIfExists('isoDeviceType', $data ?? [], null);
        $this->setIfExists('msisdn', $data ?? [], null);
        $this->setIfExists('osName', $data ?? [], null);
        $this->setIfExists('osVersion', $data ?? [], null);
        $this->setIfExists('paymentTypes', $data ?? [], null);
        $this->setIfExists('serialNumber', $data ?? [], null);
        $this->setIfExists('storageTechnology', $data ?? [], null);
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
     * Gets cardCaptureTechnology
     *
     * @return string|null
     */
    public function getCardCaptureTechnology()
    {
        return $this->container['cardCaptureTechnology'];
    }

    /**
     * Sets cardCaptureTechnology
     *
     * @param string|null $cardCaptureTechnology The technology used to capture the card details.
     *
     * @return self
     */
    public function setCardCaptureTechnology($cardCaptureTechnology)
    {
        if (is_null($cardCaptureTechnology)) {
            throw new \InvalidArgumentException('non-nullable cardCaptureTechnology cannot be null');
        }
        $this->container['cardCaptureTechnology'] = $cardCaptureTechnology;

        return $this;
    }

    /**
     * Gets deviceName
     *
     * @return string|null
     */
    public function getDeviceName()
    {
        return $this->container['deviceName'];
    }

    /**
     * Sets deviceName
     *
     * @param string|null $deviceName The name of the device.
     *
     * @return self
     */
    public function setDeviceName($deviceName)
    {
        if (is_null($deviceName)) {
            throw new \InvalidArgumentException('non-nullable deviceName cannot be null');
        }
        $this->container['deviceName'] = $deviceName;

        return $this;
    }

    /**
     * Gets formFactor
     *
     * @return string|null
     */
    public function getFormFactor()
    {
        return $this->container['formFactor'];
    }

    /**
     * Sets formFactor
     *
     * @param string|null $formFactor The form factor of the device to be provisioned.
     *
     * @return self
     */
    public function setFormFactor($formFactor)
    {
        if (is_null($formFactor)) {
            throw new \InvalidArgumentException('non-nullable formFactor cannot be null');
        }
        $this->container['formFactor'] = $formFactor;

        return $this;
    }

    /**
     * Gets imei
     *
     * @return string|null
     */
    public function getImei()
    {
        return $this->container['imei'];
    }

    /**
     * Sets imei
     *
     * @param string|null $imei The IMEI number of the device being provisioned.
     *
     * @return self
     */
    public function setImei($imei)
    {
        if (is_null($imei)) {
            throw new \InvalidArgumentException('non-nullable imei cannot be null');
        }
        $this->container['imei'] = $imei;

        return $this;
    }

    /**
     * Gets isoDeviceType
     *
     * @return string|null
     */
    public function getIsoDeviceType()
    {
        return $this->container['isoDeviceType'];
    }

    /**
     * Sets isoDeviceType
     *
     * @param string|null $isoDeviceType The 2-digit device type provided on the ISO messages that the token is being provisioned to.
     *
     * @return self
     */
    public function setIsoDeviceType($isoDeviceType)
    {
        if (is_null($isoDeviceType)) {
            throw new \InvalidArgumentException('non-nullable isoDeviceType cannot be null');
        }
        $this->container['isoDeviceType'] = $isoDeviceType;

        return $this;
    }

    /**
     * Gets msisdn
     *
     * @return string|null
     */
    public function getMsisdn()
    {
        return $this->container['msisdn'];
    }

    /**
     * Sets msisdn
     *
     * @param string|null $msisdn The MSISDN of the device being provisioned.
     *
     * @return self
     */
    public function setMsisdn($msisdn)
    {
        if (is_null($msisdn)) {
            throw new \InvalidArgumentException('non-nullable msisdn cannot be null');
        }
        $this->container['msisdn'] = $msisdn;

        return $this;
    }

    /**
     * Gets osName
     *
     * @return string|null
     */
    public function getOsName()
    {
        return $this->container['osName'];
    }

    /**
     * Sets osName
     *
     * @param string|null $osName The name of the device operating system.
     *
     * @return self
     */
    public function setOsName($osName)
    {
        if (is_null($osName)) {
            throw new \InvalidArgumentException('non-nullable osName cannot be null');
        }
        $this->container['osName'] = $osName;

        return $this;
    }

    /**
     * Gets osVersion
     *
     * @return string|null
     */
    public function getOsVersion()
    {
        return $this->container['osVersion'];
    }

    /**
     * Sets osVersion
     *
     * @param string|null $osVersion The version of the device operating system.
     *
     * @return self
     */
    public function setOsVersion($osVersion)
    {
        if (is_null($osVersion)) {
            throw new \InvalidArgumentException('non-nullable osVersion cannot be null');
        }
        $this->container['osVersion'] = $osVersion;

        return $this;
    }

    /**
     * Gets paymentTypes
     *
     * @return string[]|null
     */
    public function getPaymentTypes()
    {
        return $this->container['paymentTypes'];
    }

    /**
     * Sets paymentTypes
     *
     * @param string[]|null $paymentTypes Different types of payments supported for the network token.
     *
     * @return self
     */
    public function setPaymentTypes($paymentTypes)
    {
        if (is_null($paymentTypes)) {
            throw new \InvalidArgumentException('non-nullable paymentTypes cannot be null');
        }
        $this->container['paymentTypes'] = $paymentTypes;

        return $this;
    }

    /**
     * Gets serialNumber
     *
     * @return string|null
     */
    public function getSerialNumber()
    {
        return $this->container['serialNumber'];
    }

    /**
     * Sets serialNumber
     *
     * @param string|null $serialNumber The serial number of the device.
     *
     * @return self
     */
    public function setSerialNumber($serialNumber)
    {
        if (is_null($serialNumber)) {
            throw new \InvalidArgumentException('non-nullable serialNumber cannot be null');
        }
        $this->container['serialNumber'] = $serialNumber;

        return $this;
    }

    /**
     * Gets storageTechnology
     *
     * @return string|null
     */
    public function getStorageTechnology()
    {
        return $this->container['storageTechnology'];
    }

    /**
     * Sets storageTechnology
     *
     * @param string|null $storageTechnology The architecture or technology used for network token storage.
     *
     * @return self
     */
    public function setStorageTechnology($storageTechnology)
    {
        if (is_null($storageTechnology)) {
            throw new \InvalidArgumentException('non-nullable storageTechnology cannot be null');
        }
        $this->container['storageTechnology'] = $storageTechnology;

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
