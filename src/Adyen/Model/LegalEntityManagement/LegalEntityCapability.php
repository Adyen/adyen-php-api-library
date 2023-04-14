<?php

/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\LegalEntityManagement;

use \ArrayAccess;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

/**
 * LegalEntityCapability Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class LegalEntityCapability implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'LegalEntityCapability';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed' => 'bool',
        'allowed_level' => 'string',
        'allowed_settings' => '\Adyen\Model\LegalEntityManagement\CapabilitySettings',
        'requested' => 'bool',
        'requested_level' => 'string',
        'requested_settings' => '\Adyen\Model\LegalEntityManagement\CapabilitySettings',
        'transfer_instruments' => '\Adyen\Model\LegalEntityManagement\SupportingEntityCapability[]',
        'verification_status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allowed' => null,
        'allowed_level' => null,
        'allowed_settings' => null,
        'requested' => null,
        'requested_level' => null,
        'requested_settings' => null,
        'transfer_instruments' => null,
        'verification_status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'allowed' => false,
        'allowed_level' => false,
        'allowed_settings' => false,
        'requested' => false,
        'requested_level' => false,
        'requested_settings' => false,
        'transfer_instruments' => false,
        'verification_status' => false
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
        'allowed' => 'allowed',
        'allowed_level' => 'allowedLevel',
        'allowed_settings' => 'allowedSettings',
        'requested' => 'requested',
        'requested_level' => 'requestedLevel',
        'requested_settings' => 'requestedSettings',
        'transfer_instruments' => 'transferInstruments',
        'verification_status' => 'verificationStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed' => 'setAllowed',
        'allowed_level' => 'setAllowedLevel',
        'allowed_settings' => 'setAllowedSettings',
        'requested' => 'setRequested',
        'requested_level' => 'setRequestedLevel',
        'requested_settings' => 'setRequestedSettings',
        'transfer_instruments' => 'setTransferInstruments',
        'verification_status' => 'setVerificationStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed' => 'getAllowed',
        'allowed_level' => 'getAllowedLevel',
        'allowed_settings' => 'getAllowedSettings',
        'requested' => 'getRequested',
        'requested_level' => 'getRequestedLevel',
        'requested_settings' => 'getRequestedSettings',
        'transfer_instruments' => 'getTransferInstruments',
        'verification_status' => 'getVerificationStatus'
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

    public const ALLOWED_LEVEL_HIGH = 'high';
    public const ALLOWED_LEVEL_LOW = 'low';
    public const ALLOWED_LEVEL_MEDIUM = 'medium';
    public const ALLOWED_LEVEL_NOT_APPLICABLE = 'notApplicable';
    public const REQUESTED_LEVEL_HIGH = 'high';
    public const REQUESTED_LEVEL_LOW = 'low';
    public const REQUESTED_LEVEL_MEDIUM = 'medium';
    public const REQUESTED_LEVEL_NOT_APPLICABLE = 'notApplicable';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAllowedLevelAllowableValues()
    {
        return [
            self::ALLOWED_LEVEL_HIGH,
            self::ALLOWED_LEVEL_LOW,
            self::ALLOWED_LEVEL_MEDIUM,
            self::ALLOWED_LEVEL_NOT_APPLICABLE,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRequestedLevelAllowableValues()
    {
        return [
            self::REQUESTED_LEVEL_HIGH,
            self::REQUESTED_LEVEL_LOW,
            self::REQUESTED_LEVEL_MEDIUM,
            self::REQUESTED_LEVEL_NOT_APPLICABLE,
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
        $this->setIfExists('allowed', $data ?? [], null);
        $this->setIfExists('allowed_level', $data ?? [], null);
        $this->setIfExists('allowed_settings', $data ?? [], null);
        $this->setIfExists('requested', $data ?? [], null);
        $this->setIfExists('requested_level', $data ?? [], null);
        $this->setIfExists('requested_settings', $data ?? [], null);
        $this->setIfExists('transfer_instruments', $data ?? [], null);
        $this->setIfExists('verification_status', $data ?? [], null);
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

        $allowedValues = $this->getAllowedLevelAllowableValues();
        if (!is_null($this->container['allowed_level']) && !in_array($this->container['allowed_level'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'allowed_level', must be one of '%s'",
                $this->container['allowed_level'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getRequestedLevelAllowableValues();
        if (!is_null($this->container['requested_level']) && !in_array($this->container['requested_level'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'requested_level', must be one of '%s'",
                $this->container['requested_level'],
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
     * Gets allowed
     *
     * @return bool|null
     */
    public function getAllowed()
    {
        return $this->container['allowed'];
    }

    /**
     * Sets allowed
     *
     * @param bool|null $allowed Indicates whether the capability is allowed. Adyen sets this to **true** if the verification is successful
     *
     * @return self
     */
    public function setAllowed($allowed)
    {
        if (is_null($allowed)) {
            throw new \InvalidArgumentException('non-nullable allowed cannot be null');
        }
        $this->container['allowed'] = $allowed;

        return $this;
    }

    /**
     * Gets allowed_level
     *
     * @return string|null
     */
    public function getAllowedLevel()
    {
        return $this->container['allowed_level'];
    }

    /**
     * Sets allowed_level
     *
     * @param string|null $allowed_level The capability level that is allowed for the legal entity.  Possible values: **notApplicable**, **low**, **medium**, **high**.
     *
     * @return self
     */
    public function setAllowedLevel($allowed_level)
    {
        if (is_null($allowed_level)) {
            throw new \InvalidArgumentException('non-nullable allowed_level cannot be null');
        }
        $allowedValues = $this->getAllowedLevelAllowableValues();
        if (!in_array($allowed_level, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'allowed_level', must be one of '%s'",
                    $allowed_level,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['allowed_level'] = $allowed_level;

        return $this;
    }

    /**
     * Gets allowed_settings
     *
     * @return \Adyen\Model\LegalEntityManagement\CapabilitySettings|null
     */
    public function getAllowedSettings()
    {
        return $this->container['allowed_settings'];
    }

    /**
     * Sets allowed_settings
     *
     * @param \Adyen\Model\LegalEntityManagement\CapabilitySettings|null $allowed_settings allowed_settings
     *
     * @return self
     */
    public function setAllowedSettings($allowed_settings)
    {
        if (is_null($allowed_settings)) {
            throw new \InvalidArgumentException('non-nullable allowed_settings cannot be null');
        }
        $this->container['allowed_settings'] = $allowed_settings;

        return $this;
    }

    /**
     * Gets requested
     *
     * @return bool|null
     */
    public function getRequested()
    {
        return $this->container['requested'];
    }

    /**
     * Sets requested
     *
     * @param bool|null $requested Indicates whether the capability is requested. To check whether the Legal Entity is permitted to use the capability,
     *
     * @return self
     */
    public function setRequested($requested)
    {
        if (is_null($requested)) {
            throw new \InvalidArgumentException('non-nullable requested cannot be null');
        }
        $this->container['requested'] = $requested;

        return $this;
    }

    /**
     * Gets requested_level
     *
     * @return string|null
     */
    public function getRequestedLevel()
    {
        return $this->container['requested_level'];
    }

    /**
     * Sets requested_level
     *
     * @param string|null $requested_level The requested level of the capability. Some capabilities, such as those used in [card issuing](https://docs.adyen.com/issuing/add-capabilities#capability-levels), have different levels. Levels increase the capability, but also require additional checks and increased monitoring.  Possible values: **notApplicable**, **low**, **medium**, **high**.
     *
     * @return self
     */
    public function setRequestedLevel($requested_level)
    {
        if (is_null($requested_level)) {
            throw new \InvalidArgumentException('non-nullable requested_level cannot be null');
        }
        $allowedValues = $this->getRequestedLevelAllowableValues();
        if (!in_array($requested_level, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'requested_level', must be one of '%s'",
                    $requested_level,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['requested_level'] = $requested_level;

        return $this;
    }

    /**
     * Gets requested_settings
     *
     * @return \Adyen\Model\LegalEntityManagement\CapabilitySettings|null
     */
    public function getRequestedSettings()
    {
        return $this->container['requested_settings'];
    }

    /**
     * Sets requested_settings
     *
     * @param \Adyen\Model\LegalEntityManagement\CapabilitySettings|null $requested_settings requested_settings
     *
     * @return self
     */
    public function setRequestedSettings($requested_settings)
    {
        if (is_null($requested_settings)) {
            throw new \InvalidArgumentException('non-nullable requested_settings cannot be null');
        }
        $this->container['requested_settings'] = $requested_settings;

        return $this;
    }

    /**
     * Gets transfer_instruments
     *
     * @return \Adyen\Model\LegalEntityManagement\SupportingEntityCapability[]|null
     */
    public function getTransferInstruments()
    {
        return $this->container['transfer_instruments'];
    }

    /**
     * Sets transfer_instruments
     *
     * @param \Adyen\Model\LegalEntityManagement\SupportingEntityCapability[]|null $transfer_instruments Capability status for transfer instruments associated with legal entity
     *
     * @return self
     */
    public function setTransferInstruments($transfer_instruments)
    {
        if (is_null($transfer_instruments)) {
            throw new \InvalidArgumentException('non-nullable transfer_instruments cannot be null');
        }
        $this->container['transfer_instruments'] = $transfer_instruments;

        return $this;
    }

    /**
     * Gets verification_status
     *
     * @return string|null
     */
    public function getVerificationStatus()
    {
        return $this->container['verification_status'];
    }

    /**
     * Sets verification_status
     *
     * @param string|null $verification_status The status of the verification checks for the capability.  Possible values:  * **pending**: Adyen is running the verification.  * **invalid**: The verification failed. Check if the `errors` array contains more information.  * **valid**: The verification has been successfully completed.  * **rejected**: Adyen has verified the information, but found reasons to not allow the capability.
     *
     * @return self
     */
    public function setVerificationStatus($verification_status)
    {
        if (is_null($verification_status)) {
            throw new \InvalidArgumentException('non-nullable verification_status cannot be null');
        }
        $this->container['verification_status'] = $verification_status;

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