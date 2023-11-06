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
 * BusinessLineInfoUpdate Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BusinessLineInfoUpdate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BusinessLineInfoUpdate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'capability' => 'string',
        'industryCode' => 'string',
        'legalEntityId' => 'string',
        'salesChannels' => 'string[]',
        'service' => 'string',
        'sourceOfFunds' => '\Adyen\Model\LegalEntityManagement\SourceOfFunds',
        'webData' => '\Adyen\Model\LegalEntityManagement\WebData[]',
        'webDataExemption' => '\Adyen\Model\LegalEntityManagement\WebDataExemption'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'capability' => null,
        'industryCode' => null,
        'legalEntityId' => null,
        'salesChannels' => null,
        'service' => null,
        'sourceOfFunds' => null,
        'webData' => null,
        'webDataExemption' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'capability' => false,
        'industryCode' => false,
        'legalEntityId' => false,
        'salesChannels' => false,
        'service' => false,
        'sourceOfFunds' => false,
        'webData' => false,
        'webDataExemption' => false
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
        'capability' => 'capability',
        'industryCode' => 'industryCode',
        'legalEntityId' => 'legalEntityId',
        'salesChannels' => 'salesChannels',
        'service' => 'service',
        'sourceOfFunds' => 'sourceOfFunds',
        'webData' => 'webData',
        'webDataExemption' => 'webDataExemption'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'capability' => 'setCapability',
        'industryCode' => 'setIndustryCode',
        'legalEntityId' => 'setLegalEntityId',
        'salesChannels' => 'setSalesChannels',
        'service' => 'setService',
        'sourceOfFunds' => 'setSourceOfFunds',
        'webData' => 'setWebData',
        'webDataExemption' => 'setWebDataExemption'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'capability' => 'getCapability',
        'industryCode' => 'getIndustryCode',
        'legalEntityId' => 'getLegalEntityId',
        'salesChannels' => 'getSalesChannels',
        'service' => 'getService',
        'sourceOfFunds' => 'getSourceOfFunds',
        'webData' => 'getWebData',
        'webDataExemption' => 'getWebDataExemption'
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

    public const CAPABILITY_RECEIVE_PAYMENTS = 'receivePayments';
    public const CAPABILITY_RECEIVE_FROM_PLATFORM_PAYMENTS = 'receiveFromPlatformPayments';
    public const CAPABILITY_ISSUE_BANK_ACCOUNT = 'issueBankAccount';
    public const SERVICE_PAYMENT_PROCESSING = 'paymentProcessing';
    public const SERVICE_ISSUING = 'issuing';
    public const SERVICE_BANKING = 'banking';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCapabilityAllowableValues()
    {
        return [
            self::CAPABILITY_RECEIVE_PAYMENTS,
            self::CAPABILITY_RECEIVE_FROM_PLATFORM_PAYMENTS,
            self::CAPABILITY_ISSUE_BANK_ACCOUNT,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getServiceAllowableValues()
    {
        return [
            self::SERVICE_PAYMENT_PROCESSING,
            self::SERVICE_ISSUING,
            self::SERVICE_BANKING,
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
        $this->setIfExists('capability', $data ?? [], null);
        $this->setIfExists('industryCode', $data ?? [], null);
        $this->setIfExists('legalEntityId', $data ?? [], null);
        $this->setIfExists('salesChannels', $data ?? [], null);
        $this->setIfExists('service', $data ?? [], null);
        $this->setIfExists('sourceOfFunds', $data ?? [], null);
        $this->setIfExists('webData', $data ?? [], null);
        $this->setIfExists('webDataExemption', $data ?? [], null);
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

        $allowedValues = $this->getCapabilityAllowableValues();
        if (!is_null($this->container['capability']) && !in_array($this->container['capability'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'capability', must be one of '%s'",
                $this->container['capability'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getServiceAllowableValues();
        if (!is_null($this->container['service']) && !in_array($this->container['service'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'service', must be one of '%s'",
                $this->container['service'],
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
     * Gets capability
     *
     * @return string|null
     * @deprecated
     */
    public function getCapability()
    {
        return $this->container['capability'];
    }

    /**
     * Sets capability
     *
     * @param string|null $capability The capability for which you are creating the business line. For example, **receivePayments**.
     *
     * @return self
     * @deprecated
     */
    public function setCapability($capability)
    {
        if (is_null($capability)) {
            throw new \InvalidArgumentException('non-nullable capability cannot be null');
        }
        $allowedValues = $this->getCapabilityAllowableValues();
        if (!in_array($capability, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'capability', must be one of '%s'",
                    $capability,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['capability'] = $capability;

        return $this;
    }

    /**
     * Gets industryCode
     *
     * @return string|null
     */
    public function getIndustryCode()
    {
        return $this->container['industryCode'];
    }

    /**
     * Sets industryCode
     *
     * @param string|null $industryCode A code that represents the industry of your legal entity. For example, **4431A** for computer software stores.
     *
     * @return self
     */
    public function setIndustryCode($industryCode)
    {
        if (is_null($industryCode)) {
            throw new \InvalidArgumentException('non-nullable industryCode cannot be null');
        }
        $this->container['industryCode'] = $industryCode;

        return $this;
    }

    /**
     * Gets legalEntityId
     *
     * @return string|null
     */
    public function getLegalEntityId()
    {
        return $this->container['legalEntityId'];
    }

    /**
     * Sets legalEntityId
     *
     * @param string|null $legalEntityId Unique identifier of the [legal entity](https://docs.adyen.com/api-explorer/#/legalentity/latest/post/legalEntities__resParam_id) that owns the business line.
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
     * Gets salesChannels
     *
     * @return string[]|null
     */
    public function getSalesChannels()
    {
        return $this->container['salesChannels'];
    }

    /**
     * Sets salesChannels
     *
     * @param string[]|null $salesChannels A list of channels where goods or services are sold.  Possible values: **pos**, **posMoto**, **eCommerce**, **ecomMoto**, **payByLink**.  Required only in combination with the `service` **paymentProcessing**.
     *
     * @return self
     */
    public function setSalesChannels($salesChannels)
    {
        if (is_null($salesChannels)) {
            throw new \InvalidArgumentException('non-nullable salesChannels cannot be null');
        }
        $this->container['salesChannels'] = $salesChannels;

        return $this;
    }

    /**
     * Gets service
     *
     * @return string|null
     */
    public function getService()
    {
        return $this->container['service'];
    }

    /**
     * Sets service
     *
     * @param string|null $service The service for which you are creating the business line.  Possible values: **paymentProcessing**, **issuing**, **banking**
     *
     * @return self
     */
    public function setService($service)
    {
        if (is_null($service)) {
            throw new \InvalidArgumentException('non-nullable service cannot be null');
        }
        $allowedValues = $this->getServiceAllowableValues();
        if (!in_array($service, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'service', must be one of '%s'",
                    $service,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['service'] = $service;

        return $this;
    }

    /**
     * Gets sourceOfFunds
     *
     * @return \Adyen\Model\LegalEntityManagement\SourceOfFunds|null
     */
    public function getSourceOfFunds()
    {
        return $this->container['sourceOfFunds'];
    }

    /**
     * Sets sourceOfFunds
     *
     * @param \Adyen\Model\LegalEntityManagement\SourceOfFunds|null $sourceOfFunds sourceOfFunds
     *
     * @return self
     */
    public function setSourceOfFunds($sourceOfFunds)
    {
        if (is_null($sourceOfFunds)) {
            throw new \InvalidArgumentException('non-nullable sourceOfFunds cannot be null');
        }
        $this->container['sourceOfFunds'] = $sourceOfFunds;

        return $this;
    }

    /**
     * Gets webData
     *
     * @return \Adyen\Model\LegalEntityManagement\WebData[]|null
     */
    public function getWebData()
    {
        return $this->container['webData'];
    }

    /**
     * Sets webData
     *
     * @param \Adyen\Model\LegalEntityManagement\WebData[]|null $webData List of website URLs where your user's goods or services are sold. When this is required for a service but your user does not have an online presence, provide the reason in the `webDataExemption` object.
     *
     * @return self
     */
    public function setWebData($webData)
    {
        if (is_null($webData)) {
            throw new \InvalidArgumentException('non-nullable webData cannot be null');
        }
        $this->container['webData'] = $webData;

        return $this;
    }

    /**
     * Gets webDataExemption
     *
     * @return \Adyen\Model\LegalEntityManagement\WebDataExemption|null
     */
    public function getWebDataExemption()
    {
        return $this->container['webDataExemption'];
    }

    /**
     * Sets webDataExemption
     *
     * @param \Adyen\Model\LegalEntityManagement\WebDataExemption|null $webDataExemption webDataExemption
     *
     * @return self
     */
    public function setWebDataExemption($webDataExemption)
    {
        if (is_null($webDataExemption)) {
            throw new \InvalidArgumentException('non-nullable webDataExemption cannot be null');
        }
        $this->container['webDataExemption'] = $webDataExemption;

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
