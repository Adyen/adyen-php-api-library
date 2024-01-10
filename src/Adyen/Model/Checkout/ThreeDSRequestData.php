<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * ThreeDSRequestData Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDSRequestData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDSRequestData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'challengeWindowSize' => 'string',
        'dataOnly' => 'string',
        'nativeThreeDS' => 'string',
        'threeDSVersion' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'challengeWindowSize' => null,
        'dataOnly' => null,
        'nativeThreeDS' => null,
        'threeDSVersion' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'challengeWindowSize' => false,
        'dataOnly' => false,
        'nativeThreeDS' => false,
        'threeDSVersion' => false
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
        'challengeWindowSize' => 'challengeWindowSize',
        'dataOnly' => 'dataOnly',
        'nativeThreeDS' => 'nativeThreeDS',
        'threeDSVersion' => 'threeDSVersion'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'challengeWindowSize' => 'setChallengeWindowSize',
        'dataOnly' => 'setDataOnly',
        'nativeThreeDS' => 'setNativeThreeDS',
        'threeDSVersion' => 'setThreeDSVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'challengeWindowSize' => 'getChallengeWindowSize',
        'dataOnly' => 'getDataOnly',
        'nativeThreeDS' => 'getNativeThreeDS',
        'threeDSVersion' => 'getThreeDSVersion'
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

    public const CHALLENGE_WINDOW_SIZE__01 = '01';
    public const CHALLENGE_WINDOW_SIZE__02 = '02';
    public const CHALLENGE_WINDOW_SIZE__03 = '03';
    public const CHALLENGE_WINDOW_SIZE__04 = '04';
    public const CHALLENGE_WINDOW_SIZE__05 = '05';
    public const DATA_ONLY_FALSE = 'false';
    public const DATA_ONLY_TRUE = 'true';
    public const NATIVE_THREE_DS_PREFERRED = 'preferred';
    public const THREE_DS_VERSION__1_0 = '2.1.0';
    public const THREE_DS_VERSION__2_0 = '2.2.0';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChallengeWindowSizeAllowableValues()
    {
        return [
            self::CHALLENGE_WINDOW_SIZE__01,
            self::CHALLENGE_WINDOW_SIZE__02,
            self::CHALLENGE_WINDOW_SIZE__03,
            self::CHALLENGE_WINDOW_SIZE__04,
            self::CHALLENGE_WINDOW_SIZE__05,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDataOnlyAllowableValues()
    {
        return [
            self::DATA_ONLY_FALSE,
            self::DATA_ONLY_TRUE,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNativeThreeDSAllowableValues()
    {
        return [
            self::NATIVE_THREE_DS_PREFERRED,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getThreeDSVersionAllowableValues()
    {
        return [
            self::THREE_DS_VERSION__1_0,
            self::THREE_DS_VERSION__2_0,
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
        $this->setIfExists('challengeWindowSize', $data ?? [], null);
        $this->setIfExists('dataOnly', $data ?? [], null);
        $this->setIfExists('nativeThreeDS', $data ?? [], null);
        $this->setIfExists('threeDSVersion', $data ?? [], null);
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

        $allowedValues = $this->getChallengeWindowSizeAllowableValues();
        if (!is_null($this->container['challengeWindowSize']) && !in_array($this->container['challengeWindowSize'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challengeWindowSize', must be one of '%s'",
                $this->container['challengeWindowSize'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDataOnlyAllowableValues();
        if (!is_null($this->container['dataOnly']) && !in_array($this->container['dataOnly'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'dataOnly', must be one of '%s'",
                $this->container['dataOnly'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getNativeThreeDSAllowableValues();
        if (!is_null($this->container['nativeThreeDS']) && !in_array($this->container['nativeThreeDS'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'nativeThreeDS', must be one of '%s'",
                $this->container['nativeThreeDS'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getThreeDSVersionAllowableValues();
        if (!is_null($this->container['threeDSVersion']) && !in_array($this->container['threeDSVersion'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'threeDSVersion', must be one of '%s'",
                $this->container['threeDSVersion'],
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
     * Gets challengeWindowSize
     *
     * @return string|null
     */
    public function getChallengeWindowSize()
    {
        return $this->container['challengeWindowSize'];
    }

    /**
     * Sets challengeWindowSize
     *
     * @param string|null $challengeWindowSize Dimensions of the 3DS2 challenge window to be displayed to the cardholder.  Possible values:  * **01** - size of 250x400  * **02** - size of 390x400 * **03** - size of 500x600 * **04** - size of 600x400 * **05** - Fullscreen
     *
     * @return self
     */
    public function setChallengeWindowSize($challengeWindowSize)
    {
        if (is_null($challengeWindowSize)) {
            throw new \InvalidArgumentException('non-nullable challengeWindowSize cannot be null');
        }
        $allowedValues = $this->getChallengeWindowSizeAllowableValues();
        if (!in_array($challengeWindowSize, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'challengeWindowSize', must be one of '%s'",
                    $challengeWindowSize,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['challengeWindowSize'] = $challengeWindowSize;

        return $this;
    }

    /**
     * Gets dataOnly
     *
     * @return string|null
     */
    public function getDataOnly()
    {
        return $this->container['dataOnly'];
    }

    /**
     * Sets dataOnly
     *
     * @param string|null $dataOnly Flag for data only flow.
     *
     * @return self
     */
    public function setDataOnly($dataOnly)
    {
        if (is_null($dataOnly)) {
            throw new \InvalidArgumentException('non-nullable dataOnly cannot be null');
        }
        $allowedValues = $this->getDataOnlyAllowableValues();
        if (!in_array($dataOnly, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'dataOnly', must be one of '%s'",
                    $dataOnly,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['dataOnly'] = $dataOnly;

        return $this;
    }

    /**
     * Gets nativeThreeDS
     *
     * @return string|null
     */
    public function getNativeThreeDS()
    {
        return $this->container['nativeThreeDS'];
    }

    /**
     * Sets nativeThreeDS
     *
     * @param string|null $nativeThreeDS Indicates if [native 3D Secure authentication](https://docs.adyen.com/online-payments/3d-secure/native-3ds2) should be used when available.  Possible values: * **preferred**: Use native 3D Secure authentication when available.
     *
     * @return self
     */
    public function setNativeThreeDS($nativeThreeDS)
    {
        if (is_null($nativeThreeDS)) {
            throw new \InvalidArgumentException('non-nullable nativeThreeDS cannot be null');
        }
        $allowedValues = $this->getNativeThreeDSAllowableValues();
        if (!in_array($nativeThreeDS, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'nativeThreeDS', must be one of '%s'",
                    $nativeThreeDS,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['nativeThreeDS'] = $nativeThreeDS;

        return $this;
    }

    /**
     * Gets threeDSVersion
     *
     * @return string|null
     */
    public function getThreeDSVersion()
    {
        return $this->container['threeDSVersion'];
    }

    /**
     * Sets threeDSVersion
     *
     * @param string|null $threeDSVersion The version of 3D Secure to use.  Possible values:  * **2.1.0** * **2.2.0**
     *
     * @return self
     */
    public function setThreeDSVersion($threeDSVersion)
    {
        if (is_null($threeDSVersion)) {
            throw new \InvalidArgumentException('non-nullable threeDSVersion cannot be null');
        }
        $allowedValues = $this->getThreeDSVersionAllowableValues();
        if (!in_array($threeDSVersion, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'threeDSVersion', must be one of '%s'",
                    $threeDSVersion,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['threeDSVersion'] = $threeDSVersion;

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
