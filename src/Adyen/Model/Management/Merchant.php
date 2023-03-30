<?php

/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * Merchant Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Merchant implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Merchant';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        '_links' => '\Adyen\Model\Management\MerchantLinks',
        'capture_delay' => 'string',
        'company_id' => 'string',
        'data_centers' => '\Adyen\Model\Management\DataCenter[]',
        'default_shopper_interaction' => 'string',
        'description' => 'string',
        'id' => 'string',
        'merchant_city' => 'string',
        'name' => 'string',
        'pricing_plan' => 'string',
        'primary_settlement_currency' => 'string',
        'reference' => 'string',
        'shop_web_address' => 'string',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_links' => null,
        'capture_delay' => null,
        'company_id' => null,
        'data_centers' => null,
        'default_shopper_interaction' => null,
        'description' => null,
        'id' => null,
        'merchant_city' => null,
        'name' => null,
        'pricing_plan' => null,
        'primary_settlement_currency' => null,
        'reference' => null,
        'shop_web_address' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        '_links' => false,
		'capture_delay' => false,
		'company_id' => false,
		'data_centers' => false,
		'default_shopper_interaction' => false,
		'description' => false,
		'id' => false,
		'merchant_city' => false,
		'name' => false,
		'pricing_plan' => false,
		'primary_settlement_currency' => false,
		'reference' => false,
		'shop_web_address' => false,
		'status' => false
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
        '_links' => '_links',
        'capture_delay' => 'captureDelay',
        'company_id' => 'companyId',
        'data_centers' => 'dataCenters',
        'default_shopper_interaction' => 'defaultShopperInteraction',
        'description' => 'description',
        'id' => 'id',
        'merchant_city' => 'merchantCity',
        'name' => 'name',
        'pricing_plan' => 'pricingPlan',
        'primary_settlement_currency' => 'primarySettlementCurrency',
        'reference' => 'reference',
        'shop_web_address' => 'shopWebAddress',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_links' => 'setLinks',
        'capture_delay' => 'setCaptureDelay',
        'company_id' => 'setCompanyId',
        'data_centers' => 'setDataCenters',
        'default_shopper_interaction' => 'setDefaultShopperInteraction',
        'description' => 'setDescription',
        'id' => 'setId',
        'merchant_city' => 'setMerchantCity',
        'name' => 'setName',
        'pricing_plan' => 'setPricingPlan',
        'primary_settlement_currency' => 'setPrimarySettlementCurrency',
        'reference' => 'setReference',
        'shop_web_address' => 'setShopWebAddress',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_links' => 'getLinks',
        'capture_delay' => 'getCaptureDelay',
        'company_id' => 'getCompanyId',
        'data_centers' => 'getDataCenters',
        'default_shopper_interaction' => 'getDefaultShopperInteraction',
        'description' => 'getDescription',
        'id' => 'getId',
        'merchant_city' => 'getMerchantCity',
        'name' => 'getName',
        'pricing_plan' => 'getPricingPlan',
        'primary_settlement_currency' => 'getPrimarySettlementCurrency',
        'reference' => 'getReference',
        'shop_web_address' => 'getShopWebAddress',
        'status' => 'getStatus'
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
        $this->setIfExists('_links', $data ?? [], null);
        $this->setIfExists('capture_delay', $data ?? [], null);
        $this->setIfExists('company_id', $data ?? [], null);
        $this->setIfExists('data_centers', $data ?? [], null);
        $this->setIfExists('default_shopper_interaction', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('merchant_city', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('pricing_plan', $data ?? [], null);
        $this->setIfExists('primary_settlement_currency', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shop_web_address', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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
     * Gets _links
     *
     * @return \Adyen\Model\Management\MerchantLinks|null
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param \Adyen\Model\Management\MerchantLinks|null $_links _links
     *
     * @return self
     */
    public function setLinks($_links)
    {
        if (is_null($_links)) {
            throw new \InvalidArgumentException('non-nullable _links cannot be null');
        }
        $this->container['_links'] = $_links;

        return $this;
    }

    /**
     * Gets capture_delay
     *
     * @return string|null
     */
    public function getCaptureDelay()
    {
        return $this->container['capture_delay'];
    }

    /**
     * Sets capture_delay
     *
     * @param string|null $capture_delay The [capture delay](https://docs.adyen.com/online-payments/capture#capture-delay) set for the merchant account.  Possible values: * **Immediate** * **Manual** * Number of days from **1** to **29**
     *
     * @return self
     */
    public function setCaptureDelay($capture_delay)
    {
        if (is_null($capture_delay)) {
            throw new \InvalidArgumentException('non-nullable capture_delay cannot be null');
        }
        $this->container['capture_delay'] = $capture_delay;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return string|null
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param string|null $company_id The unique identifier of the company account this merchant belongs to
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {
        if (is_null($company_id)) {
            throw new \InvalidArgumentException('non-nullable company_id cannot be null');
        }
        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets data_centers
     *
     * @return \Adyen\Model\Management\DataCenter[]|null
     */
    public function getDataCenters()
    {
        return $this->container['data_centers'];
    }

    /**
     * Sets data_centers
     *
     * @param \Adyen\Model\Management\DataCenter[]|null $data_centers List of available data centers.  Adyen has several data centers around the world.In the URL that you use for making API requests, we recommend you use the live URL prefix from the data center closest to your shoppers.
     *
     * @return self
     */
    public function setDataCenters($data_centers)
    {
        if (is_null($data_centers)) {
            throw new \InvalidArgumentException('non-nullable data_centers cannot be null');
        }
        $this->container['data_centers'] = $data_centers;

        return $this;
    }

    /**
     * Gets default_shopper_interaction
     *
     * @return string|null
     */
    public function getDefaultShopperInteraction()
    {
        return $this->container['default_shopper_interaction'];
    }

    /**
     * Sets default_shopper_interaction
     *
     * @param string|null $default_shopper_interaction The default [`shopperInteraction`](https://docs.adyen.com/api-explorer/#/CheckoutService/v68/post/payments__reqParam_shopperInteraction) value used when processing payments through this merchant account.
     *
     * @return self
     */
    public function setDefaultShopperInteraction($default_shopper_interaction)
    {
        if (is_null($default_shopper_interaction)) {
            throw new \InvalidArgumentException('non-nullable default_shopper_interaction cannot be null');
        }
        $this->container['default_shopper_interaction'] = $default_shopper_interaction;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Your description for the merchant account, maximum 300 characters
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The unique identifier of the merchant account.
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
     * Gets merchant_city
     *
     * @return string|null
     */
    public function getMerchantCity()
    {
        return $this->container['merchant_city'];
    }

    /**
     * Sets merchant_city
     *
     * @param string|null $merchant_city The city where the legal entity of this merchant account is registered.
     *
     * @return self
     */
    public function setMerchantCity($merchant_city)
    {
        if (is_null($merchant_city)) {
            throw new \InvalidArgumentException('non-nullable merchant_city cannot be null');
        }
        $this->container['merchant_city'] = $merchant_city;

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
     * @param string|null $name The name of the legal entity associated with the merchant account.
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
     * Gets pricing_plan
     *
     * @return string|null
     */
    public function getPricingPlan()
    {
        return $this->container['pricing_plan'];
    }

    /**
     * Sets pricing_plan
     *
     * @param string|null $pricing_plan Only applies to merchant accounts managed by Adyen's partners. The name of the pricing plan assigned to the merchant account.
     *
     * @return self
     */
    public function setPricingPlan($pricing_plan)
    {
        if (is_null($pricing_plan)) {
            throw new \InvalidArgumentException('non-nullable pricing_plan cannot be null');
        }
        $this->container['pricing_plan'] = $pricing_plan;

        return $this;
    }

    /**
     * Gets primary_settlement_currency
     *
     * @return string|null
     */
    public function getPrimarySettlementCurrency()
    {
        return $this->container['primary_settlement_currency'];
    }

    /**
     * Sets primary_settlement_currency
     *
     * @param string|null $primary_settlement_currency The currency of the country where the legal entity of this merchant account is registered. Format: [ISO currency code](https://docs.adyen.com/development-resources/currency-codes). For example, a legal entity based in the United States has USD as the primary settlement currency.
     *
     * @return self
     */
    public function setPrimarySettlementCurrency($primary_settlement_currency)
    {
        if (is_null($primary_settlement_currency)) {
            throw new \InvalidArgumentException('non-nullable primary_settlement_currency cannot be null');
        }
        $this->container['primary_settlement_currency'] = $primary_settlement_currency;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Reference of the merchant account.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets shop_web_address
     *
     * @return string|null
     */
    public function getShopWebAddress()
    {
        return $this->container['shop_web_address'];
    }

    /**
     * Sets shop_web_address
     *
     * @param string|null $shop_web_address The URL for the ecommerce website used with this merchant account.
     *
     * @return self
     */
    public function setShopWebAddress($shop_web_address)
    {
        if (is_null($shop_web_address)) {
            throw new \InvalidArgumentException('non-nullable shop_web_address cannot be null');
        }
        $this->container['shop_web_address'] = $shop_web_address;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the merchant account.  Possible values:  * **PreActive**: The merchant account has been created. Users cannot access the merchant account in the Customer Area. The account cannot process payments. * **Active**: Users can access the merchant account in the Customer Area. If the company account is also **Active**, then payment processing and payouts are enabled. * **InactiveWithModifications**: Users can access the merchant account in the Customer Area. You cannot process new payments but you can still modify payments, for example issue refunds. You can still receive payouts. * **Inactive**: Users can access the merchant account in the Customer Area. Payment processing and payouts are disabled. * **Closed**: The account is closed and this cannot be reversed. Users cannot log in. Payment processing and payouts are disabled.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

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
