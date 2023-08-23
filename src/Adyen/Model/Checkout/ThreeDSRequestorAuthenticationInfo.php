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
 * ThreeDSRequestorAuthenticationInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDSRequestorAuthenticationInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDSRequestorAuthenticationInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'threeDSReqAuthData' => 'string',
        'threeDSReqAuthMethod' => 'string',
        'threeDSReqAuthTimestamp' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'threeDSReqAuthData' => null,
        'threeDSReqAuthMethod' => null,
        'threeDSReqAuthTimestamp' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'threeDSReqAuthData' => false,
        'threeDSReqAuthMethod' => false,
        'threeDSReqAuthTimestamp' => false
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
        'threeDSReqAuthData' => 'threeDSReqAuthData',
        'threeDSReqAuthMethod' => 'threeDSReqAuthMethod',
        'threeDSReqAuthTimestamp' => 'threeDSReqAuthTimestamp'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'threeDSReqAuthData' => 'setThreeDSReqAuthData',
        'threeDSReqAuthMethod' => 'setThreeDSReqAuthMethod',
        'threeDSReqAuthTimestamp' => 'setThreeDSReqAuthTimestamp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'threeDSReqAuthData' => 'getThreeDSReqAuthData',
        'threeDSReqAuthMethod' => 'getThreeDSReqAuthMethod',
        'threeDSReqAuthTimestamp' => 'getThreeDSReqAuthTimestamp'
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

    public const THREE_DS_REQ_AUTH_METHOD__01 = '01';
    public const THREE_DS_REQ_AUTH_METHOD__02 = '02';
    public const THREE_DS_REQ_AUTH_METHOD__03 = '03';
    public const THREE_DS_REQ_AUTH_METHOD__04 = '04';
    public const THREE_DS_REQ_AUTH_METHOD__05 = '05';
    public const THREE_DS_REQ_AUTH_METHOD__06 = '06';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getThreeDSReqAuthMethodAllowableValues()
    {
        return [
            self::THREE_DS_REQ_AUTH_METHOD__01,
            self::THREE_DS_REQ_AUTH_METHOD__02,
            self::THREE_DS_REQ_AUTH_METHOD__03,
            self::THREE_DS_REQ_AUTH_METHOD__04,
            self::THREE_DS_REQ_AUTH_METHOD__05,
            self::THREE_DS_REQ_AUTH_METHOD__06,
        ];
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
        $this->setIfExists('threeDSReqAuthData', $data ?? [], null);
        $this->setIfExists('threeDSReqAuthMethod', $data ?? [], null);
        $this->setIfExists('threeDSReqAuthTimestamp', $data ?? [], null);
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

        $allowedValues = $this->getThreeDSReqAuthMethodAllowableValues();
        if (!is_null($this->container['threeDSReqAuthMethod']) && !in_array($this->container['threeDSReqAuthMethod'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'threeDSReqAuthMethod', must be one of '%s'",
                $this->container['threeDSReqAuthMethod'],
                implode("', '", $allowedValues)
            );
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
     * Gets threeDSReqAuthData
     *
     * @return string|null
     */
    public function getThreeDSReqAuthData()
    {
        return $this->container['threeDSReqAuthData'];
    }

    /**
     * Sets threeDSReqAuthData
     *
     * @param string|null $threeDSReqAuthData Data that documents and supports a specific authentication process. Maximum length: 2048 bytes.
     *
     * @return self
     */
    public function setThreeDSReqAuthData($threeDSReqAuthData)
    {
        if (is_null($threeDSReqAuthData)) {
            throw new \InvalidArgumentException('non-nullable threeDSReqAuthData cannot be null');
        }
        $this->container['threeDSReqAuthData'] = $threeDSReqAuthData;

        return $this;
    }

    /**
     * Gets threeDSReqAuthMethod
     *
     * @return string|null
     */
    public function getThreeDSReqAuthMethod()
    {
        return $this->container['threeDSReqAuthMethod'];
    }

    /**
     * Sets threeDSReqAuthMethod
     *
     * @param string|null $threeDSReqAuthMethod Mechanism used by the Cardholder to authenticate to the 3DS Requestor. Allowed values: * **01** — No 3DS Requestor authentication occurred (for example, cardholder “logged in” as guest). * **02** — Login to the cardholder account at the 3DS Requestor system using 3DS Requestor’s own credentials. * **03** — Login to the cardholder account at the 3DS Requestor system using federated ID. * **04** — Login to the cardholder account at the 3DS Requestor system using issuer credentials. * **05** — Login to the cardholder account at the 3DS Requestor system using third-party authentication. * **06** — Login to the cardholder account at the 3DS Requestor system using FIDO Authenticator.
     *
     * @return self
     */
    public function setThreeDSReqAuthMethod($threeDSReqAuthMethod)
    {
        if (is_null($threeDSReqAuthMethod)) {
            throw new \InvalidArgumentException('non-nullable threeDSReqAuthMethod cannot be null');
        }
        $allowedValues = $this->getThreeDSReqAuthMethodAllowableValues();
        if (!in_array($threeDSReqAuthMethod, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'threeDSReqAuthMethod', must be one of '%s'",
                    $threeDSReqAuthMethod,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['threeDSReqAuthMethod'] = $threeDSReqAuthMethod;

        return $this;
    }

    /**
     * Gets threeDSReqAuthTimestamp
     *
     * @return string|null
     */
    public function getThreeDSReqAuthTimestamp()
    {
        return $this->container['threeDSReqAuthTimestamp'];
    }

    /**
     * Sets threeDSReqAuthTimestamp
     *
     * @param string|null $threeDSReqAuthTimestamp Date and time in UTC of the cardholder authentication. Format: YYYYMMDDHHMM
     *
     * @return self
     */
    public function setThreeDSReqAuthTimestamp($threeDSReqAuthTimestamp)
    {
        if (is_null($threeDSReqAuthTimestamp)) {
            throw new \InvalidArgumentException('non-nullable threeDSReqAuthTimestamp cannot be null');
        }
        $this->container['threeDSReqAuthTimestamp'] = $threeDSReqAuthTimestamp;

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
