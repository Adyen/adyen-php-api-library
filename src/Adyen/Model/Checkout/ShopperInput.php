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
 * ShopperInput Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ShopperInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ShopperInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billing_address' => 'string',
        'delivery_address' => 'string',
        'personal_details' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billing_address' => null,
        'delivery_address' => null,
        'personal_details' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'billing_address' => false,
        'delivery_address' => false,
        'personal_details' => false
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
        'billing_address' => 'billingAddress',
        'delivery_address' => 'deliveryAddress',
        'personal_details' => 'personalDetails'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billing_address' => 'setBillingAddress',
        'delivery_address' => 'setDeliveryAddress',
        'personal_details' => 'setPersonalDetails'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billing_address' => 'getBillingAddress',
        'delivery_address' => 'getDeliveryAddress',
        'personal_details' => 'getPersonalDetails'
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

    public const BILLING_ADDRESS_EDITABLE = 'editable';
    public const BILLING_ADDRESS_HIDDEN = 'hidden';
    public const BILLING_ADDRESS_READ_ONLY = 'readOnly';
    public const DELIVERY_ADDRESS_EDITABLE = 'editable';
    public const DELIVERY_ADDRESS_HIDDEN = 'hidden';
    public const DELIVERY_ADDRESS_READ_ONLY = 'readOnly';
    public const PERSONAL_DETAILS_EDITABLE = 'editable';
    public const PERSONAL_DETAILS_HIDDEN = 'hidden';
    public const PERSONAL_DETAILS_READ_ONLY = 'readOnly';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingAddressAllowableValues()
    {
        return [
            self::BILLING_ADDRESS_EDITABLE,
            self::BILLING_ADDRESS_HIDDEN,
            self::BILLING_ADDRESS_READ_ONLY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryAddressAllowableValues()
    {
        return [
            self::DELIVERY_ADDRESS_EDITABLE,
            self::DELIVERY_ADDRESS_HIDDEN,
            self::DELIVERY_ADDRESS_READ_ONLY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPersonalDetailsAllowableValues()
    {
        return [
            self::PERSONAL_DETAILS_EDITABLE,
            self::PERSONAL_DETAILS_HIDDEN,
            self::PERSONAL_DETAILS_READ_ONLY,
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
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('delivery_address', $data ?? [], null);
        $this->setIfExists('personal_details', $data ?? [], null);
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

        $allowedValues = $this->getBillingAddressAllowableValues();
        if (!is_null($this->container['billing_address']) && !in_array($this->container['billing_address'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_address', must be one of '%s'",
                $this->container['billing_address'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDeliveryAddressAllowableValues();
        if (!is_null($this->container['delivery_address']) && !in_array($this->container['delivery_address'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'delivery_address', must be one of '%s'",
                $this->container['delivery_address'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPersonalDetailsAllowableValues();
        if (!is_null($this->container['personal_details']) && !in_array($this->container['personal_details'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'personal_details', must be one of '%s'",
                $this->container['personal_details'],
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
     * Gets billing_address
     *
     * @return string|null
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param string|null $billing_address Specifies visibility of billing address fields.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setBillingAddress($billing_address)
    {
        if (is_null($billing_address)) {
            throw new \InvalidArgumentException('non-nullable billing_address cannot be null');
        }
        $allowedValues = $this->getBillingAddressAllowableValues();
        if (!in_array($billing_address, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_address', must be one of '%s'",
                    $billing_address,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets delivery_address
     *
     * @return string|null
     */
    public function getDeliveryAddress()
    {
        return $this->container['delivery_address'];
    }

    /**
     * Sets delivery_address
     *
     * @param string|null $delivery_address Specifies visibility of delivery address fields.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setDeliveryAddress($delivery_address)
    {
        if (is_null($delivery_address)) {
            throw new \InvalidArgumentException('non-nullable delivery_address cannot be null');
        }
        $allowedValues = $this->getDeliveryAddressAllowableValues();
        if (!in_array($delivery_address, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'delivery_address', must be one of '%s'",
                    $delivery_address,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['delivery_address'] = $delivery_address;

        return $this;
    }

    /**
     * Gets personal_details
     *
     * @return string|null
     */
    public function getPersonalDetails()
    {
        return $this->container['personal_details'];
    }

    /**
     * Sets personal_details
     *
     * @param string|null $personal_details Specifies visibility of personal details.  Permitted values: * editable * hidden * readOnly
     *
     * @return self
     */
    public function setPersonalDetails($personal_details)
    {
        if (is_null($personal_details)) {
            throw new \InvalidArgumentException('non-nullable personal_details cannot be null');
        }
        $allowedValues = $this->getPersonalDetailsAllowableValues();
        if (!in_array($personal_details, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'personal_details', must be one of '%s'",
                    $personal_details,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['personal_details'] = $personal_details;

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
