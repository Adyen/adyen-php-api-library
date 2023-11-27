<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
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
 * RecurringDetail Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RecurringDetail implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RecurringDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'brands' => 'string[]',
        'configuration' => 'array<string,string>',
        'fundingSource' => 'string',
        'group' => '\Adyen\Model\Checkout\PaymentMethodGroup',
        'inputDetails' => '\Adyen\Model\Checkout\InputDetail[]',
        'issuers' => '\Adyen\Model\Checkout\PaymentMethodIssuer[]',
        'name' => 'string',
        'recurringDetailReference' => 'string',
        'storedDetails' => '\Adyen\Model\Checkout\StoredDetails',
        'type' => 'string'
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
        'brands' => null,
        'configuration' => null,
        'fundingSource' => null,
        'group' => null,
        'inputDetails' => null,
        'issuers' => null,
        'name' => null,
        'recurringDetailReference' => null,
        'storedDetails' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'brand' => false,
        'brands' => false,
        'configuration' => false,
        'fundingSource' => false,
        'group' => false,
        'inputDetails' => false,
        'issuers' => false,
        'name' => false,
        'recurringDetailReference' => false,
        'storedDetails' => false,
        'type' => false
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
        'brands' => 'brands',
        'configuration' => 'configuration',
        'fundingSource' => 'fundingSource',
        'group' => 'group',
        'inputDetails' => 'inputDetails',
        'issuers' => 'issuers',
        'name' => 'name',
        'recurringDetailReference' => 'recurringDetailReference',
        'storedDetails' => 'storedDetails',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'brands' => 'setBrands',
        'configuration' => 'setConfiguration',
        'fundingSource' => 'setFundingSource',
        'group' => 'setGroup',
        'inputDetails' => 'setInputDetails',
        'issuers' => 'setIssuers',
        'name' => 'setName',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'storedDetails' => 'setStoredDetails',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'brands' => 'getBrands',
        'configuration' => 'getConfiguration',
        'fundingSource' => 'getFundingSource',
        'group' => 'getGroup',
        'inputDetails' => 'getInputDetails',
        'issuers' => 'getIssuers',
        'name' => 'getName',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'storedDetails' => 'getStoredDetails',
        'type' => 'getType'
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

    public const FUNDING_SOURCE_CREDIT = 'credit';
    public const FUNDING_SOURCE_DEBIT = 'debit';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingSourceAllowableValues()
    {
        return [
            self::FUNDING_SOURCE_CREDIT,
            self::FUNDING_SOURCE_DEBIT,
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
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('brands', $data ?? [], null);
        $this->setIfExists('configuration', $data ?? [], null);
        $this->setIfExists('fundingSource', $data ?? [], null);
        $this->setIfExists('group', $data ?? [], null);
        $this->setIfExists('inputDetails', $data ?? [], null);
        $this->setIfExists('issuers', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('storedDetails', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!is_null($this->container['fundingSource']) && !in_array($this->container['fundingSource'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'fundingSource', must be one of '%s'",
                $this->container['fundingSource'],
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
     * @param string|null $brand Brand for the selected gift card. For example: plastix, hmclub.
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
     * Gets brands
     *
     * @return string[]|null
     */
    public function getBrands()
    {
        return $this->container['brands'];
    }

    /**
     * Sets brands
     *
     * @param string[]|null $brands List of possible brands. For example: visa, mc.
     *
     * @return self
     */
    public function setBrands($brands)
    {
        if (is_null($brands)) {
            throw new \InvalidArgumentException('non-nullable brands cannot be null');
        }
        $this->container['brands'] = $brands;

        return $this;
    }

    /**
     * Gets configuration
     *
     * @return array<string,string>|null
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param array<string,string>|null $configuration The configuration of the payment method.
     *
     * @return self
     */
    public function setConfiguration($configuration)
    {
        if (is_null($configuration)) {
            throw new \InvalidArgumentException('non-nullable configuration cannot be null');
        }
        $this->container['configuration'] = $configuration;

        return $this;
    }

    /**
     * Gets fundingSource
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['fundingSource'];
    }

    /**
     * Sets fundingSource
     *
     * @param string|null $fundingSource The funding source of the payment method.
     *
     * @return self
     */
    public function setFundingSource($fundingSource)
    {
        if (is_null($fundingSource)) {
            throw new \InvalidArgumentException('non-nullable fundingSource cannot be null');
        }
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!in_array($fundingSource, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'fundingSource', must be one of '%s'",
                    $fundingSource,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fundingSource'] = $fundingSource;

        return $this;
    }

    /**
     * Gets group
     *
     * @return \Adyen\Model\Checkout\PaymentMethodGroup|null
     */
    public function getGroup()
    {
        return $this->container['group'];
    }

    /**
     * Sets group
     *
     * @param \Adyen\Model\Checkout\PaymentMethodGroup|null $group group
     *
     * @return self
     */
    public function setGroup($group)
    {
        if (is_null($group)) {
            throw new \InvalidArgumentException('non-nullable group cannot be null');
        }
        $this->container['group'] = $group;

        return $this;
    }

    /**
     * Gets inputDetails
     *
     * @return \Adyen\Model\Checkout\InputDetail[]|null
     * @deprecated
     */
    public function getInputDetails()
    {
        return $this->container['inputDetails'];
    }

    /**
     * Sets inputDetails
     *
     * @param \Adyen\Model\Checkout\InputDetail[]|null $inputDetails All input details to be provided to complete the payment with this payment method.
     *
     * @return self
     * @deprecated
     */
    public function setInputDetails($inputDetails)
    {
        if (is_null($inputDetails)) {
            throw new \InvalidArgumentException('non-nullable inputDetails cannot be null');
        }
        $this->container['inputDetails'] = $inputDetails;

        return $this;
    }

    /**
     * Gets issuers
     *
     * @return \Adyen\Model\Checkout\PaymentMethodIssuer[]|null
     */
    public function getIssuers()
    {
        return $this->container['issuers'];
    }

    /**
     * Sets issuers
     *
     * @param \Adyen\Model\Checkout\PaymentMethodIssuer[]|null $issuers A list of issuers for this payment method.
     *
     * @return self
     */
    public function setIssuers($issuers)
    {
        if (is_null($issuers)) {
            throw new \InvalidArgumentException('non-nullable issuers cannot be null');
        }
        $this->container['issuers'] = $issuers;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The displayable name of this payment method.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets recurringDetailReference
     *
     * @return string|null
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurringDetailReference'];
    }

    /**
     * Sets recurringDetailReference
     *
     * @param string|null $recurringDetailReference The reference that uniquely identifies the recurring detail.
     *
     * @return self
     */
    public function setRecurringDetailReference($recurringDetailReference)
    {
        if (is_null($recurringDetailReference)) {
            throw new \InvalidArgumentException('non-nullable recurringDetailReference cannot be null');
        }
        $this->container['recurringDetailReference'] = $recurringDetailReference;

        return $this;
    }

    /**
     * Gets storedDetails
     *
     * @return \Adyen\Model\Checkout\StoredDetails|null
     */
    public function getStoredDetails()
    {
        return $this->container['storedDetails'];
    }

    /**
     * Sets storedDetails
     *
     * @param \Adyen\Model\Checkout\StoredDetails|null $storedDetails storedDetails
     *
     * @return self
     */
    public function setStoredDetails($storedDetails)
    {
        if (is_null($storedDetails)) {
            throw new \InvalidArgumentException('non-nullable storedDetails cannot be null');
        }
        $this->container['storedDetails'] = $storedDetails;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type The unique payment method code.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

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
