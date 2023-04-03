<?php

/**
 * Legal Entity Management API
 *
 * The Legal Entity Management API enables you to manage legal entities that contain information required for verification.  ## Authentication To connect to the Legal Entity Management API, you must use the basic authentication credentials of your web service user. If you don't have one, contact the [Adyen Support Team](https://www.adyen.help/hc/en-us/requests/new). Use the web service user credentials to authenticate your request, for example:  ``` curl -U \"ws_123456@Scope.BalancePlatform_YourBalancePlatform\":\"YourWsPassword\" \\ -H \"Content-Type: application/json\" \\ ... ``` Note that when going live, you need to generate new web service user credentials to access the [live endpoints](https://docs.adyen.com/development-resources/live-endpoints).  ## Versioning The Legal Entity Management API supports versioning of its endpoints through a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://kyc-test.adyen.com/lem/v3/legalEntities ``` ## Going live When going live, your Adyen contact will provide your API credential for the live environment. You can then use the username and password to send requests to `https://kyc-live.adyen.com/lem/v3`.
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
 * BusinessLine Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BusinessLine implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BusinessLine';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'capability' => 'string',
        'id' => 'string',
        'industry_code' => 'string',
        'legal_entity_id' => 'string',
        'problems' => '\Adyen\Model\LegalEntityManagement\CapabilityProblem[]',
        'sales_channels' => 'string[]',
        'service' => 'string',
        'source_of_funds' => '\Adyen\Model\LegalEntityManagement\SourceOfFunds',
        'web_data' => '\Adyen\Model\LegalEntityManagement\WebData[]',
        'web_data_exemption' => '\Adyen\Model\LegalEntityManagement\WebDataExemption'
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
        'id' => null,
        'industry_code' => null,
        'legal_entity_id' => null,
        'problems' => null,
        'sales_channels' => null,
        'service' => null,
        'source_of_funds' => null,
        'web_data' => null,
        'web_data_exemption' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'capability' => false,
		'id' => false,
		'industry_code' => false,
		'legal_entity_id' => false,
		'problems' => false,
		'sales_channels' => false,
		'service' => false,
		'source_of_funds' => false,
		'web_data' => false,
		'web_data_exemption' => false
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
        'id' => 'id',
        'industry_code' => 'industryCode',
        'legal_entity_id' => 'legalEntityId',
        'problems' => 'problems',
        'sales_channels' => 'salesChannels',
        'service' => 'service',
        'source_of_funds' => 'sourceOfFunds',
        'web_data' => 'webData',
        'web_data_exemption' => 'webDataExemption'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'capability' => 'setCapability',
        'id' => 'setId',
        'industry_code' => 'setIndustryCode',
        'legal_entity_id' => 'setLegalEntityId',
        'problems' => 'setProblems',
        'sales_channels' => 'setSalesChannels',
        'service' => 'setService',
        'source_of_funds' => 'setSourceOfFunds',
        'web_data' => 'setWebData',
        'web_data_exemption' => 'setWebDataExemption'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'capability' => 'getCapability',
        'id' => 'getId',
        'industry_code' => 'getIndustryCode',
        'legal_entity_id' => 'getLegalEntityId',
        'problems' => 'getProblems',
        'sales_channels' => 'getSalesChannels',
        'service' => 'getService',
        'source_of_funds' => 'getSourceOfFunds',
        'web_data' => 'getWebData',
        'web_data_exemption' => 'getWebDataExemption'
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

    public const SERVICE_PAYMENT_PROCESSING = 'paymentProcessing';
    public const SERVICE_ISSUING = 'issuing';
    public const SERVICE_BANKING = 'banking';

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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('industry_code', $data ?? [], null);
        $this->setIfExists('legal_entity_id', $data ?? [], null);
        $this->setIfExists('problems', $data ?? [], null);
        $this->setIfExists('sales_channels', $data ?? [], null);
        $this->setIfExists('service', $data ?? [], null);
        $this->setIfExists('source_of_funds', $data ?? [], null);
        $this->setIfExists('web_data', $data ?? [], null);
        $this->setIfExists('web_data_exemption', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['industry_code'] === null) {
            $invalidProperties[] = "'industry_code' can't be null";
        }
        if ($this->container['legal_entity_id'] === null) {
            $invalidProperties[] = "'legal_entity_id' can't be null";
        }
        if ($this->container['service'] === null) {
            $invalidProperties[] = "'service' can't be null";
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
        $this->container['capability'] = $capability;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The unique identifier of the business line.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets industry_code
     *
     * @return string
     */
    public function getIndustryCode()
    {
        return $this->container['industry_code'];
    }

    /**
     * Sets industry_code
     *
     * @param string $industry_code A code that represents the industry of the legal entity. For example, **4431A** for computer software stores.
     *
     * @return self
     */
    public function setIndustryCode($industry_code)
    {
        if (is_null($industry_code)) {
            throw new \InvalidArgumentException('non-nullable industry_code cannot be null');
        }
        $this->container['industry_code'] = $industry_code;

        return $this;
    }

    /**
     * Gets legal_entity_id
     *
     * @return string
     */
    public function getLegalEntityId()
    {
        return $this->container['legal_entity_id'];
    }

    /**
     * Sets legal_entity_id
     *
     * @param string $legal_entity_id Unique identifier of the [legal entity](https://docs.adyen.com/api-explorer/#/legalentity/latest/post/legalEntities__resParam_id) that owns the business line.
     *
     * @return self
     */
    public function setLegalEntityId($legal_entity_id)
    {
        if (is_null($legal_entity_id)) {
            throw new \InvalidArgumentException('non-nullable legal_entity_id cannot be null');
        }
        $this->container['legal_entity_id'] = $legal_entity_id;

        return $this;
    }

    /**
     * Gets problems
     *
     * @return \Adyen\Model\LegalEntityManagement\CapabilityProblem[]|null
     */
    public function getProblems()
    {
        return $this->container['problems'];
    }

    /**
     * Sets problems
     *
     * @param \Adyen\Model\LegalEntityManagement\CapabilityProblem[]|null $problems List of the verification errors from capabilities for this supporting entity.
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
     * Gets sales_channels
     *
     * @return string[]|null
     */
    public function getSalesChannels()
    {
        return $this->container['sales_channels'];
    }

    /**
     * Sets sales_channels
     *
     * @param string[]|null $sales_channels A list of channels where goods or services are sold.  Possible values: **pos**, **posMoto**, **eCommerce**, **ecomMoto**, **payByLink**.  Required only in combination with the `service` **paymentProcessing**.
     *
     * @return self
     */
    public function setSalesChannels($sales_channels)
    {
        if (is_null($sales_channels)) {
            throw new \InvalidArgumentException('non-nullable sales_channels cannot be null');
        }
        $this->container['sales_channels'] = $sales_channels;

        return $this;
    }

    /**
     * Gets service
     *
     * @return string
     */
    public function getService()
    {
        return $this->container['service'];
    }

    /**
     * Sets service
     *
     * @param string $service The service for which you are creating the business line.  Possible values:**paymentProcessing**, **issuing**, **banking**
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
     * Gets source_of_funds
     *
     * @return \Adyen\Model\LegalEntityManagement\SourceOfFunds|null
     */
    public function getSourceOfFunds()
    {
        return $this->container['source_of_funds'];
    }

    /**
     * Sets source_of_funds
     *
     * @param \Adyen\Model\LegalEntityManagement\SourceOfFunds|null $source_of_funds source_of_funds
     *
     * @return self
     */
    public function setSourceOfFunds($source_of_funds)
    {
        if (is_null($source_of_funds)) {
            throw new \InvalidArgumentException('non-nullable source_of_funds cannot be null');
        }
        $this->container['source_of_funds'] = $source_of_funds;

        return $this;
    }

    /**
     * Gets web_data
     *
     * @return \Adyen\Model\LegalEntityManagement\WebData[]|null
     */
    public function getWebData()
    {
        return $this->container['web_data'];
    }

    /**
     * Sets web_data
     *
     * @param \Adyen\Model\LegalEntityManagement\WebData[]|null $web_data List of website URLs where your user's goods or services are sold. When this is required for a service but your user does not have an online presence, provide the reason in the `webDataExemption` object.
     *
     * @return self
     */
    public function setWebData($web_data)
    {
        if (is_null($web_data)) {
            throw new \InvalidArgumentException('non-nullable web_data cannot be null');
        }
        $this->container['web_data'] = $web_data;

        return $this;
    }

    /**
     * Gets web_data_exemption
     *
     * @return \Adyen\Model\LegalEntityManagement\WebDataExemption|null
     */
    public function getWebDataExemption()
    {
        return $this->container['web_data_exemption'];
    }

    /**
     * Sets web_data_exemption
     *
     * @param \Adyen\Model\LegalEntityManagement\WebDataExemption|null $web_data_exemption web_data_exemption
     *
     * @return self
     */
    public function setWebDataExemption($web_data_exemption)
    {
        if (is_null($web_data_exemption)) {
            throw new \InvalidArgumentException('non-nullable web_data_exemption cannot be null');
        }
        $this->container['web_data_exemption'] = $web_data_exemption;

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
