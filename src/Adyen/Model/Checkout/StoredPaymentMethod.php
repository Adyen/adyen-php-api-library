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
 * StoredPaymentMethod Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class StoredPaymentMethod implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StoredPaymentMethod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'expiry_month' => 'string',
        'expiry_year' => 'string',
        'holder_name' => 'string',
        'iban' => 'string',
        'id' => 'string',
        'last_four' => 'string',
        'name' => 'string',
        'network_tx_reference' => 'string',
        'owner_name' => 'string',
        'shopper_email' => 'string',
        'supported_recurring_processing_models' => 'string[]',
        'supported_shopper_interactions' => 'string[]',
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
        'expiry_month' => null,
        'expiry_year' => null,
        'holder_name' => null,
        'iban' => null,
        'id' => null,
        'last_four' => null,
        'name' => null,
        'network_tx_reference' => null,
        'owner_name' => null,
        'shopper_email' => null,
        'supported_recurring_processing_models' => null,
        'supported_shopper_interactions' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'brand' => false,
        'expiry_month' => false,
        'expiry_year' => false,
        'holder_name' => false,
        'iban' => false,
        'id' => false,
        'last_four' => false,
        'name' => false,
        'network_tx_reference' => false,
        'owner_name' => false,
        'shopper_email' => false,
        'supported_recurring_processing_models' => false,
        'supported_shopper_interactions' => false,
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
        'expiry_month' => 'expiryMonth',
        'expiry_year' => 'expiryYear',
        'holder_name' => 'holderName',
        'iban' => 'iban',
        'id' => 'id',
        'last_four' => 'lastFour',
        'name' => 'name',
        'network_tx_reference' => 'networkTxReference',
        'owner_name' => 'ownerName',
        'shopper_email' => 'shopperEmail',
        'supported_recurring_processing_models' => 'supportedRecurringProcessingModels',
        'supported_shopper_interactions' => 'supportedShopperInteractions',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'expiry_month' => 'setExpiryMonth',
        'expiry_year' => 'setExpiryYear',
        'holder_name' => 'setHolderName',
        'iban' => 'setIban',
        'id' => 'setId',
        'last_four' => 'setLastFour',
        'name' => 'setName',
        'network_tx_reference' => 'setNetworkTxReference',
        'owner_name' => 'setOwnerName',
        'shopper_email' => 'setShopperEmail',
        'supported_recurring_processing_models' => 'setSupportedRecurringProcessingModels',
        'supported_shopper_interactions' => 'setSupportedShopperInteractions',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'expiry_month' => 'getExpiryMonth',
        'expiry_year' => 'getExpiryYear',
        'holder_name' => 'getHolderName',
        'iban' => 'getIban',
        'id' => 'getId',
        'last_four' => 'getLastFour',
        'name' => 'getName',
        'network_tx_reference' => 'getNetworkTxReference',
        'owner_name' => 'getOwnerName',
        'shopper_email' => 'getShopperEmail',
        'supported_recurring_processing_models' => 'getSupportedRecurringProcessingModels',
        'supported_shopper_interactions' => 'getSupportedShopperInteractions',
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
        $this->setIfExists('expiry_month', $data ?? [], null);
        $this->setIfExists('expiry_year', $data ?? [], null);
        $this->setIfExists('holder_name', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('last_four', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('network_tx_reference', $data ?? [], null);
        $this->setIfExists('owner_name', $data ?? [], null);
        $this->setIfExists('shopper_email', $data ?? [], null);
        $this->setIfExists('supported_recurring_processing_models', $data ?? [], null);
        $this->setIfExists('supported_shopper_interactions', $data ?? [], null);
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
     * @param string|null $brand The brand of the card.
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
     * Gets expiry_month
     *
     * @return string|null
     */
    public function getExpiryMonth()
    {
        return $this->container['expiry_month'];
    }

    /**
     * Sets expiry_month
     *
     * @param string|null $expiry_month The month the card expires.
     *
     * @return self
     */
    public function setExpiryMonth($expiry_month)
    {
        if (is_null($expiry_month)) {
            throw new \InvalidArgumentException('non-nullable expiry_month cannot be null');
        }
        $this->container['expiry_month'] = $expiry_month;

        return $this;
    }

    /**
     * Gets expiry_year
     *
     * @return string|null
     */
    public function getExpiryYear()
    {
        return $this->container['expiry_year'];
    }

    /**
     * Sets expiry_year
     *
     * @param string|null $expiry_year The last two digits of the year the card expires. For example, **22** for the year 2022.
     *
     * @return self
     */
    public function setExpiryYear($expiry_year)
    {
        if (is_null($expiry_year)) {
            throw new \InvalidArgumentException('non-nullable expiry_year cannot be null');
        }
        $this->container['expiry_year'] = $expiry_year;

        return $this;
    }

    /**
     * Gets holder_name
     *
     * @return string|null
     */
    public function getHolderName()
    {
        return $this->container['holder_name'];
    }

    /**
     * Sets holder_name
     *
     * @param string|null $holder_name The unique payment method code.
     *
     * @return self
     */
    public function setHolderName($holder_name)
    {
        if (is_null($holder_name)) {
            throw new \InvalidArgumentException('non-nullable holder_name cannot be null');
        }
        $this->container['holder_name'] = $holder_name;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string|null $iban The IBAN of the bank account.
     *
     * @return self
     */
    public function setIban($iban)
    {
        if (is_null($iban)) {
            throw new \InvalidArgumentException('non-nullable iban cannot be null');
        }
        $this->container['iban'] = $iban;

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
     * @param string|null $id A unique identifier of this stored payment method.
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
     * Gets last_four
     *
     * @return string|null
     */
    public function getLastFour()
    {
        return $this->container['last_four'];
    }

    /**
     * Sets last_four
     *
     * @param string|null $last_four The last four digits of the PAN.
     *
     * @return self
     */
    public function setLastFour($last_four)
    {
        if (is_null($last_four)) {
            throw new \InvalidArgumentException('non-nullable last_four cannot be null');
        }
        $this->container['last_four'] = $last_four;

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
     * @param string|null $name The display name of the stored payment method.
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
     * Gets network_tx_reference
     *
     * @return string|null
     */
    public function getNetworkTxReference()
    {
        return $this->container['network_tx_reference'];
    }

    /**
     * Sets network_tx_reference
     *
     * @param string|null $network_tx_reference Returned in the response if you are not tokenizing with Adyen and are using the Merchant-initiated transactions (MIT) framework from Mastercard or Visa.  This contains either the Mastercard Trace ID or the Visa Transaction ID.
     *
     * @return self
     */
    public function setNetworkTxReference($network_tx_reference)
    {
        if (is_null($network_tx_reference)) {
            throw new \InvalidArgumentException('non-nullable network_tx_reference cannot be null');
        }
        $this->container['network_tx_reference'] = $network_tx_reference;

        return $this;
    }

    /**
     * Gets owner_name
     *
     * @return string|null
     */
    public function getOwnerName()
    {
        return $this->container['owner_name'];
    }

    /**
     * Sets owner_name
     *
     * @param string|null $owner_name The name of the bank account holder.
     *
     * @return self
     */
    public function setOwnerName($owner_name)
    {
        if (is_null($owner_name)) {
            throw new \InvalidArgumentException('non-nullable owner_name cannot be null');
        }
        $this->container['owner_name'] = $owner_name;

        return $this;
    }

    /**
     * Gets shopper_email
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopper_email'];
    }

    /**
     * Sets shopper_email
     *
     * @param string|null $shopper_email The shopper’s email address.
     *
     * @return self
     */
    public function setShopperEmail($shopper_email)
    {
        if (is_null($shopper_email)) {
            throw new \InvalidArgumentException('non-nullable shopper_email cannot be null');
        }
        $this->container['shopper_email'] = $shopper_email;

        return $this;
    }

    /**
     * Gets supported_recurring_processing_models
     *
     * @return string[]|null
     */
    public function getSupportedRecurringProcessingModels()
    {
        return $this->container['supported_recurring_processing_models'];
    }

    /**
     * Sets supported_recurring_processing_models
     *
     * @param string[]|null $supported_recurring_processing_models The supported recurring processing models for this stored payment method.
     *
     * @return self
     */
    public function setSupportedRecurringProcessingModels($supported_recurring_processing_models)
    {
        if (is_null($supported_recurring_processing_models)) {
            throw new \InvalidArgumentException('non-nullable supported_recurring_processing_models cannot be null');
        }
        $this->container['supported_recurring_processing_models'] = $supported_recurring_processing_models;

        return $this;
    }

    /**
     * Gets supported_shopper_interactions
     *
     * @return string[]|null
     */
    public function getSupportedShopperInteractions()
    {
        return $this->container['supported_shopper_interactions'];
    }

    /**
     * Sets supported_shopper_interactions
     *
     * @param string[]|null $supported_shopper_interactions The supported shopper interactions for this stored payment method.
     *
     * @return self
     */
    public function setSupportedShopperInteractions($supported_shopper_interactions)
    {
        if (is_null($supported_shopper_interactions)) {
            throw new \InvalidArgumentException('non-nullable supported_shopper_interactions cannot be null');
        }
        $this->container['supported_shopper_interactions'] = $supported_shopper_interactions;

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
     * @param string|null $type The type of payment method.
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
