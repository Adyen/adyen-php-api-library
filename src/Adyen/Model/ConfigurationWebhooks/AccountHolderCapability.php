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
 * AccountHolderCapability Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AccountHolderCapability implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AccountHolderCapability';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed' => 'bool',
        'allowedLevel' => 'string',
        'allowedSettings' => '\Adyen\Model\ConfigurationWebhooks\CapabilitySettings',
        'enabled' => 'bool',
        'problems' => 'object[]',
        'requested' => 'bool',
        'requestedLevel' => 'string',
        'requestedSettings' => '\Adyen\Model\ConfigurationWebhooks\CapabilitySettings',
        'transferInstruments' => '\Adyen\Model\ConfigurationWebhooks\AccountSupportingEntityCapability[]',
        'verificationStatus' => 'string'
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
        'allowedLevel' => null,
        'allowedSettings' => null,
        'enabled' => null,
        'problems' => null,
        'requested' => null,
        'requestedLevel' => null,
        'requestedSettings' => null,
        'transferInstruments' => null,
        'verificationStatus' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'allowed' => false,
		'allowedLevel' => false,
		'allowedSettings' => false,
		'enabled' => false,
		'problems' => false,
		'requested' => false,
		'requestedLevel' => false,
		'requestedSettings' => false,
		'transferInstruments' => false,
		'verificationStatus' => false
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
        'allowedLevel' => 'allowedLevel',
        'allowedSettings' => 'allowedSettings',
        'enabled' => 'enabled',
        'problems' => 'problems',
        'requested' => 'requested',
        'requestedLevel' => 'requestedLevel',
        'requestedSettings' => 'requestedSettings',
        'transferInstruments' => 'transferInstruments',
        'verificationStatus' => 'verificationStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed' => 'setAllowed',
        'allowedLevel' => 'setAllowedLevel',
        'allowedSettings' => 'setAllowedSettings',
        'enabled' => 'setEnabled',
        'problems' => 'setProblems',
        'requested' => 'setRequested',
        'requestedLevel' => 'setRequestedLevel',
        'requestedSettings' => 'setRequestedSettings',
        'transferInstruments' => 'setTransferInstruments',
        'verificationStatus' => 'setVerificationStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed' => 'getAllowed',
        'allowedLevel' => 'getAllowedLevel',
        'allowedSettings' => 'getAllowedSettings',
        'enabled' => 'getEnabled',
        'problems' => 'getProblems',
        'requested' => 'getRequested',
        'requestedLevel' => 'getRequestedLevel',
        'requestedSettings' => 'getRequestedSettings',
        'transferInstruments' => 'getTransferInstruments',
        'verificationStatus' => 'getVerificationStatus'
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
    public const VERIFICATION_STATUS_INVALID = 'invalid';
    public const VERIFICATION_STATUS_PENDING = 'pending';
    public const VERIFICATION_STATUS_REJECTED = 'rejected';
    public const VERIFICATION_STATUS_VALID = 'valid';

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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getVerificationStatusAllowableValues()
    {
        return [
            self::VERIFICATION_STATUS_INVALID,
            self::VERIFICATION_STATUS_PENDING,
            self::VERIFICATION_STATUS_REJECTED,
            self::VERIFICATION_STATUS_VALID,
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
        $this->setIfExists('allowedLevel', $data ?? [], null);
        $this->setIfExists('allowedSettings', $data ?? [], null);
        $this->setIfExists('enabled', $data ?? [], null);
        $this->setIfExists('problems', $data ?? [], null);
        $this->setIfExists('requested', $data ?? [], null);
        $this->setIfExists('requestedLevel', $data ?? [], null);
        $this->setIfExists('requestedSettings', $data ?? [], null);
        $this->setIfExists('transferInstruments', $data ?? [], null);
        $this->setIfExists('verificationStatus', $data ?? [], null);
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
        if (!is_null($this->container['allowedLevel']) && !in_array($this->container['allowedLevel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'allowedLevel', must be one of '%s'",
                $this->container['allowedLevel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getRequestedLevelAllowableValues();
        if (!is_null($this->container['requestedLevel']) && !in_array($this->container['requestedLevel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'requestedLevel', must be one of '%s'",
                $this->container['requestedLevel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!is_null($this->container['verificationStatus']) && !in_array($this->container['verificationStatus'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'verificationStatus', must be one of '%s'",
                $this->container['verificationStatus'],
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
     * @param bool|null $allowed Indicates whether the capability is allowed. Adyen sets this to **true** if the verification is successful and the account holder is permitted to use the capability.
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
     * Gets allowedLevel
     *
     * @return string|null
     */
    public function getAllowedLevel()
    {
        return $this->container['allowedLevel'];
    }

    /**
     * Sets allowedLevel
     *
     * @param string|null $allowedLevel The capability level that is allowed for the account holder.  Possible values: **notApplicable**, **low**, **medium**, **high**.
     *
     * @return self
     */
    public function setAllowedLevel($allowedLevel)
    {
        if (is_null($allowedLevel)) {
            throw new \InvalidArgumentException('non-nullable allowedLevel cannot be null');
        }
        $allowedValues = $this->getAllowedLevelAllowableValues();
        if (!in_array($allowedLevel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'allowedLevel', must be one of '%s'",
                    $allowedLevel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['allowedLevel'] = $allowedLevel;

        return $this;
    }

    /**
     * Gets allowedSettings
     *
     * @return \Adyen\Model\ConfigurationWebhooks\CapabilitySettings|null
     */
    public function getAllowedSettings()
    {
        return $this->container['allowedSettings'];
    }

    /**
     * Sets allowedSettings
     *
     * @param \Adyen\Model\ConfigurationWebhooks\CapabilitySettings|null $allowedSettings allowedSettings
     *
     * @return self
     */
    public function setAllowedSettings($allowedSettings)
    {
        if (is_null($allowedSettings)) {
            throw new \InvalidArgumentException('non-nullable allowedSettings cannot be null');
        }
        $this->container['allowedSettings'] = $allowedSettings;

        return $this;
    }

    /**
     * Gets enabled
     *
     * @return bool|null
     */
    public function getEnabled()
    {
        return $this->container['enabled'];
    }

    /**
     * Sets enabled
     *
     * @param bool|null $enabled Indicates whether the capability is enabled. If **false**, the capability is temporarily disabled for the account holder.
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        if (is_null($enabled)) {
            throw new \InvalidArgumentException('non-nullable enabled cannot be null');
        }
        $this->container['enabled'] = $enabled;

        return $this;
    }

    /**
     * Gets problems
     *
     * @return object[]|null
     */
    public function getProblems()
    {
        return $this->container['problems'];
    }

    /**
     * Sets problems
     *
     * @param object[]|null $problems Contains verification errors and the actions that you can take to resolve them.
     *
     * @return self
     */
    public function setProblems($problems)
    {
        if (is_null($problems)) {
            throw new \InvalidArgumentException('non-nullable problems cannot be null');
        }
        $this->container['problems'] = $problems;

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
     * @param bool|null $requested Indicates whether the capability is requested. To check whether the account holder is permitted to use the capability, refer to the `allowed` field.
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
     * Gets requestedLevel
     *
     * @return string|null
     */
    public function getRequestedLevel()
    {
        return $this->container['requestedLevel'];
    }

    /**
     * Sets requestedLevel
     *
     * @param string|null $requestedLevel The requested level of the capability. Some capabilities, such as those used in [card issuing](https://docs.adyen.com/issuing/add-capabilities#capability-levels), have different levels. Levels increase the capability, but also require additional checks and increased monitoring.  Possible values: **notApplicable**, **low**, **medium**, **high**.
     *
     * @return self
     */
    public function setRequestedLevel($requestedLevel)
    {
        if (is_null($requestedLevel)) {
            throw new \InvalidArgumentException('non-nullable requestedLevel cannot be null');
        }
        $allowedValues = $this->getRequestedLevelAllowableValues();
        if (!in_array($requestedLevel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'requestedLevel', must be one of '%s'",
                    $requestedLevel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['requestedLevel'] = $requestedLevel;

        return $this;
    }

    /**
     * Gets requestedSettings
     *
     * @return \Adyen\Model\ConfigurationWebhooks\CapabilitySettings|null
     */
    public function getRequestedSettings()
    {
        return $this->container['requestedSettings'];
    }

    /**
     * Sets requestedSettings
     *
     * @param \Adyen\Model\ConfigurationWebhooks\CapabilitySettings|null $requestedSettings requestedSettings
     *
     * @return self
     */
    public function setRequestedSettings($requestedSettings)
    {
        if (is_null($requestedSettings)) {
            throw new \InvalidArgumentException('non-nullable requestedSettings cannot be null');
        }
        $this->container['requestedSettings'] = $requestedSettings;

        return $this;
    }

    /**
     * Gets transferInstruments
     *
     * @return \Adyen\Model\ConfigurationWebhooks\AccountSupportingEntityCapability[]|null
     */
    public function getTransferInstruments()
    {
        return $this->container['transferInstruments'];
    }

    /**
     * Sets transferInstruments
     *
     * @param \Adyen\Model\ConfigurationWebhooks\AccountSupportingEntityCapability[]|null $transferInstruments Contains the status of the transfer instruments associated with this capability.
     *
     * @return self
     */
    public function setTransferInstruments($transferInstruments)
    {
        if (is_null($transferInstruments)) {
            throw new \InvalidArgumentException('non-nullable transferInstruments cannot be null');
        }
        $this->container['transferInstruments'] = $transferInstruments;

        return $this;
    }

    /**
     * Gets verificationStatus
     *
     * @return string|null
     */
    public function getVerificationStatus()
    {
        return $this->container['verificationStatus'];
    }

    /**
     * Sets verificationStatus
     *
     * @param string|null $verificationStatus The status of the verification checks for the capability.  Possible values:  * **pending**: Adyen is running the verification.  * **invalid**: The verification failed. Check if the `errors` array contains more information.  * **valid**: The verification has been successfully completed.  * **rejected**: Adyen has verified the information, but found reasons to not allow the capability.
     *
     * @return self
     */
    public function setVerificationStatus($verificationStatus)
    {
        if (is_null($verificationStatus)) {
            throw new \InvalidArgumentException('non-nullable verificationStatus cannot be null');
        }
        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!in_array($verificationStatus, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'verificationStatus', must be one of '%s'",
                    $verificationStatus,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['verificationStatus'] = $verificationStatus;

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
