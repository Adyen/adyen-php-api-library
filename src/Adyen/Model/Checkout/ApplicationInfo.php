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
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * ApplicationInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ApplicationInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ApplicationInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'adyen_library' => '\Adyen\Model\Checkout\CommonField',
        'adyen_payment_source' => '\Adyen\Model\Checkout\CommonField',
        'external_platform' => '\Adyen\Model\Checkout\ExternalPlatform',
        'merchant_application' => '\Adyen\Model\Checkout\CommonField',
        'merchant_device' => '\Adyen\Model\Checkout\MerchantDevice',
        'shopper_interaction_device' => '\Adyen\Model\Checkout\ShopperInteractionDevice'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'adyen_library' => null,
        'adyen_payment_source' => null,
        'external_platform' => null,
        'merchant_application' => null,
        'merchant_device' => null,
        'shopper_interaction_device' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'adyen_library' => false,
        'adyen_payment_source' => false,
        'external_platform' => false,
        'merchant_application' => false,
        'merchant_device' => false,
        'shopper_interaction_device' => false
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
        'adyen_library' => 'adyenLibrary',
        'adyen_payment_source' => 'adyenPaymentSource',
        'external_platform' => 'externalPlatform',
        'merchant_application' => 'merchantApplication',
        'merchant_device' => 'merchantDevice',
        'shopper_interaction_device' => 'shopperInteractionDevice'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'adyen_library' => 'setAdyenLibrary',
        'adyen_payment_source' => 'setAdyenPaymentSource',
        'external_platform' => 'setExternalPlatform',
        'merchant_application' => 'setMerchantApplication',
        'merchant_device' => 'setMerchantDevice',
        'shopper_interaction_device' => 'setShopperInteractionDevice'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'adyen_library' => 'getAdyenLibrary',
        'adyen_payment_source' => 'getAdyenPaymentSource',
        'external_platform' => 'getExternalPlatform',
        'merchant_application' => 'getMerchantApplication',
        'merchant_device' => 'getMerchantDevice',
        'shopper_interaction_device' => 'getShopperInteractionDevice'
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
        $this->setIfExists('adyen_library', $data ?? [], null);
        $this->setIfExists('adyen_payment_source', $data ?? [], null);
        $this->setIfExists('external_platform', $data ?? [], null);
        $this->setIfExists('merchant_application', $data ?? [], null);
        $this->setIfExists('merchant_device', $data ?? [], null);
        $this->setIfExists('shopper_interaction_device', $data ?? [], null);
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
     * Gets adyen_library
     *
     * @return \Adyen\Model\Checkout\CommonField|null
     */
    public function getAdyenLibrary()
    {
        return $this->container['adyen_library'];
    }

    /**
     * Sets adyen_library
     *
     * @param \Adyen\Model\Checkout\CommonField|null $adyen_library adyen_library
     *
     * @return self
     */
    public function setAdyenLibrary($adyen_library)
    {
        if (is_null($adyen_library)) {
            throw new \InvalidArgumentException('non-nullable adyen_library cannot be null');
        }
        $this->container['adyen_library'] = $adyen_library;

        return $this;
    }

    /**
     * Gets adyen_payment_source
     *
     * @return \Adyen\Model\Checkout\CommonField|null
     */
    public function getAdyenPaymentSource()
    {
        return $this->container['adyen_payment_source'];
    }

    /**
     * Sets adyen_payment_source
     *
     * @param \Adyen\Model\Checkout\CommonField|null $adyen_payment_source adyen_payment_source
     *
     * @return self
     */
    public function setAdyenPaymentSource($adyen_payment_source)
    {
        if (is_null($adyen_payment_source)) {
            throw new \InvalidArgumentException('non-nullable adyen_payment_source cannot be null');
        }
        $this->container['adyen_payment_source'] = $adyen_payment_source;

        return $this;
    }

    /**
     * Gets external_platform
     *
     * @return \Adyen\Model\Checkout\ExternalPlatform|null
     */
    public function getExternalPlatform()
    {
        return $this->container['external_platform'];
    }

    /**
     * Sets external_platform
     *
     * @param \Adyen\Model\Checkout\ExternalPlatform|null $external_platform external_platform
     *
     * @return self
     */
    public function setExternalPlatform($external_platform)
    {
        if (is_null($external_platform)) {
            throw new \InvalidArgumentException('non-nullable external_platform cannot be null');
        }
        $this->container['external_platform'] = $external_platform;

        return $this;
    }

    /**
     * Gets merchant_application
     *
     * @return \Adyen\Model\Checkout\CommonField|null
     */
    public function getMerchantApplication()
    {
        return $this->container['merchant_application'];
    }

    /**
     * Sets merchant_application
     *
     * @param \Adyen\Model\Checkout\CommonField|null $merchant_application merchant_application
     *
     * @return self
     */
    public function setMerchantApplication($merchant_application)
    {
        if (is_null($merchant_application)) {
            throw new \InvalidArgumentException('non-nullable merchant_application cannot be null');
        }
        $this->container['merchant_application'] = $merchant_application;

        return $this;
    }

    /**
     * Gets merchant_device
     *
     * @return \Adyen\Model\Checkout\MerchantDevice|null
     */
    public function getMerchantDevice()
    {
        return $this->container['merchant_device'];
    }

    /**
     * Sets merchant_device
     *
     * @param \Adyen\Model\Checkout\MerchantDevice|null $merchant_device merchant_device
     *
     * @return self
     */
    public function setMerchantDevice($merchant_device)
    {
        if (is_null($merchant_device)) {
            throw new \InvalidArgumentException('non-nullable merchant_device cannot be null');
        }
        $this->container['merchant_device'] = $merchant_device;

        return $this;
    }

    /**
     * Gets shopper_interaction_device
     *
     * @return \Adyen\Model\Checkout\ShopperInteractionDevice|null
     */
    public function getShopperInteractionDevice()
    {
        return $this->container['shopper_interaction_device'];
    }

    /**
     * Sets shopper_interaction_device
     *
     * @param \Adyen\Model\Checkout\ShopperInteractionDevice|null $shopper_interaction_device shopper_interaction_device
     *
     * @return self
     */
    public function setShopperInteractionDevice($shopper_interaction_device)
    {
        if (is_null($shopper_interaction_device)) {
            throw new \InvalidArgumentException('non-nullable shopper_interaction_device cannot be null');
        }
        $this->container['shopper_interaction_device'] = $shopper_interaction_device;

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
