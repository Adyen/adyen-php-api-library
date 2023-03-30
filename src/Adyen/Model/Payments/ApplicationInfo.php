<?php

/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

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
        'adyen_library' => '\Adyen\Model\Payments\CommonField',
        'adyen_payment_source' => '\Adyen\Model\Payments\CommonField',
        'external_platform' => '\Adyen\Model\Payments\ExternalPlatform',
        'merchant_application' => '\Adyen\Model\Payments\CommonField',
        'merchant_device' => '\Adyen\Model\Payments\MerchantDevice',
        'shopper_interaction_device' => '\Adyen\Model\Payments\ShopperInteractionDevice'
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
     * @return \Adyen\Model\Payments\CommonField|null
     */
    public function getAdyenLibrary()
    {
        return $this->container['adyen_library'];
    }

    /**
     * Sets adyen_library
     *
     * @param \Adyen\Model\Payments\CommonField|null $adyen_library adyen_library
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
     * @return \Adyen\Model\Payments\CommonField|null
     */
    public function getAdyenPaymentSource()
    {
        return $this->container['adyen_payment_source'];
    }

    /**
     * Sets adyen_payment_source
     *
     * @param \Adyen\Model\Payments\CommonField|null $adyen_payment_source adyen_payment_source
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
     * @return \Adyen\Model\Payments\ExternalPlatform|null
     */
    public function getExternalPlatform()
    {
        return $this->container['external_platform'];
    }

    /**
     * Sets external_platform
     *
     * @param \Adyen\Model\Payments\ExternalPlatform|null $external_platform external_platform
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
     * @return \Adyen\Model\Payments\CommonField|null
     */
    public function getMerchantApplication()
    {
        return $this->container['merchant_application'];
    }

    /**
     * Sets merchant_application
     *
     * @param \Adyen\Model\Payments\CommonField|null $merchant_application merchant_application
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
     * @return \Adyen\Model\Payments\MerchantDevice|null
     */
    public function getMerchantDevice()
    {
        return $this->container['merchant_device'];
    }

    /**
     * Sets merchant_device
     *
     * @param \Adyen\Model\Payments\MerchantDevice|null $merchant_device merchant_device
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
     * @return \Adyen\Model\Payments\ShopperInteractionDevice|null
     */
    public function getShopperInteractionDevice()
    {
        return $this->container['shopper_interaction_device'];
    }

    /**
     * Sets shopper_interaction_device
     *
     * @param \Adyen\Model\Payments\ShopperInteractionDevice|null $shopper_interaction_device shopper_interaction_device
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
}
