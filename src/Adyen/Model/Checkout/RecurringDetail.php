<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Checkout;

use \ArrayAccess;
use \Adyen\Model\Checkout\ObjectSerializer;

/**
 * RecurringDetail Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
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
        'funding_source' => 'string',
        'group' => '\Adyen\Model\Checkout\PaymentMethodGroup',
        'input_details' => '\Adyen\Model\Checkout\InputDetail[]',
        'issuers' => '\Adyen\Model\Checkout\PaymentMethodIssuer[]',
        'name' => 'string',
        'recurring_detail_reference' => 'string',
        'stored_details' => '\Adyen\Model\Checkout\StoredDetails',
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
        'funding_source' => null,
        'group' => null,
        'input_details' => null,
        'issuers' => null,
        'name' => null,
        'recurring_detail_reference' => null,
        'stored_details' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'brand' => false,
        'brands' => false,
        'configuration' => false,
        'funding_source' => false,
        'group' => false,
        'input_details' => false,
        'issuers' => false,
        'name' => false,
        'recurring_detail_reference' => false,
        'stored_details' => false,
        'type' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
        'funding_source' => 'fundingSource',
        'group' => 'group',
        'input_details' => 'inputDetails',
        'issuers' => 'issuers',
        'name' => 'name',
        'recurring_detail_reference' => 'recurringDetailReference',
        'stored_details' => 'storedDetails',
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
        'funding_source' => 'setFundingSource',
        'group' => 'setGroup',
        'input_details' => 'setInputDetails',
        'issuers' => 'setIssuers',
        'name' => 'setName',
        'recurring_detail_reference' => 'setRecurringDetailReference',
        'stored_details' => 'setStoredDetails',
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
        'funding_source' => 'getFundingSource',
        'group' => 'getGroup',
        'input_details' => 'getInputDetails',
        'issuers' => 'getIssuers',
        'name' => 'getName',
        'recurring_detail_reference' => 'getRecurringDetailReference',
        'stored_details' => 'getStoredDetails',
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

    public const FUNDING_SOURCE_DEBIT = 'debit';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingSourceAllowableValues()
    {
        return [
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
        $this->setIfExists('funding_source', $data ?? [], null);
        $this->setIfExists('group', $data ?? [], null);
        $this->setIfExists('input_details', $data ?? [], null);
        $this->setIfExists('issuers', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('recurring_detail_reference', $data ?? [], null);
        $this->setIfExists('stored_details', $data ?? [], null);
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
        if (!is_null($this->container['funding_source']) && !in_array($this->container['funding_source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'funding_source', must be one of '%s'",
                $this->container['funding_source'],
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
     * Gets funding_source
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['funding_source'];
    }

    /**
     * Sets funding_source
     *
     * @param string|null $funding_source The funding source of the payment method.
     *
     * @return self
     */
    public function setFundingSource($funding_source)
    {
        if (is_null($funding_source)) {
            throw new \InvalidArgumentException('non-nullable funding_source cannot be null');
        }
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!in_array($funding_source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'funding_source', must be one of '%s'",
                    $funding_source,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['funding_source'] = $funding_source;

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
     * Gets input_details
     *
     * @return \Adyen\Model\Checkout\InputDetail[]|null
     * @deprecated
     */
    public function getInputDetails()
    {
        return $this->container['input_details'];
    }

    /**
     * Sets input_details
     *
     * @param \Adyen\Model\Checkout\InputDetail[]|null $input_details All input details to be provided to complete the payment with this payment method.
     *
     * @return self
     * @deprecated
     */
    public function setInputDetails($input_details)
    {
        if (is_null($input_details)) {
            throw new \InvalidArgumentException('non-nullable input_details cannot be null');
        }
        $this->container['input_details'] = $input_details;

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
     * Gets recurring_detail_reference
     *
     * @return string|null
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurring_detail_reference'];
    }

    /**
     * Sets recurring_detail_reference
     *
     * @param string|null $recurring_detail_reference The reference that uniquely identifies the recurring detail.
     *
     * @return self
     */
    public function setRecurringDetailReference($recurring_detail_reference)
    {
        if (is_null($recurring_detail_reference)) {
            throw new \InvalidArgumentException('non-nullable recurring_detail_reference cannot be null');
        }
        $this->container['recurring_detail_reference'] = $recurring_detail_reference;

        return $this;
    }

    /**
     * Gets stored_details
     *
     * @return \Adyen\Model\Checkout\StoredDetails|null
     */
    public function getStoredDetails()
    {
        return $this->container['stored_details'];
    }

    /**
     * Sets stored_details
     *
     * @param \Adyen\Model\Checkout\StoredDetails|null $stored_details stored_details
     *
     * @return self
     */
    public function setStoredDetails($stored_details)
    {
        if (is_null($stored_details)) {
            throw new \InvalidArgumentException('non-nullable stored_details cannot be null');
        }
        $this->container['stored_details'] = $stored_details;

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

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
