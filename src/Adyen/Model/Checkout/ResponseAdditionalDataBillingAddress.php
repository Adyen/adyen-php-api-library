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
 * ResponseAdditionalDataBillingAddress Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ResponseAdditionalDataBillingAddress implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ResponseAdditionalDataBillingAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billing_address_city' => 'string',
        'billing_address_country' => 'string',
        'billing_address_house_number_or_name' => 'string',
        'billing_address_postal_code' => 'string',
        'billing_address_state_or_province' => 'string',
        'billing_address_street' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billing_address_city' => null,
        'billing_address_country' => null,
        'billing_address_house_number_or_name' => null,
        'billing_address_postal_code' => null,
        'billing_address_state_or_province' => null,
        'billing_address_street' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'billing_address_city' => false,
        'billing_address_country' => false,
        'billing_address_house_number_or_name' => false,
        'billing_address_postal_code' => false,
        'billing_address_state_or_province' => false,
        'billing_address_street' => false
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
        'billing_address_city' => 'billingAddress.city',
        'billing_address_country' => 'billingAddress.country',
        'billing_address_house_number_or_name' => 'billingAddress.houseNumberOrName',
        'billing_address_postal_code' => 'billingAddress.postalCode',
        'billing_address_state_or_province' => 'billingAddress.stateOrProvince',
        'billing_address_street' => 'billingAddress.street'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billing_address_city' => 'setBillingAddressCity',
        'billing_address_country' => 'setBillingAddressCountry',
        'billing_address_house_number_or_name' => 'setBillingAddressHouseNumberOrName',
        'billing_address_postal_code' => 'setBillingAddressPostalCode',
        'billing_address_state_or_province' => 'setBillingAddressStateOrProvince',
        'billing_address_street' => 'setBillingAddressStreet'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billing_address_city' => 'getBillingAddressCity',
        'billing_address_country' => 'getBillingAddressCountry',
        'billing_address_house_number_or_name' => 'getBillingAddressHouseNumberOrName',
        'billing_address_postal_code' => 'getBillingAddressPostalCode',
        'billing_address_state_or_province' => 'getBillingAddressStateOrProvince',
        'billing_address_street' => 'getBillingAddressStreet'
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
        $this->setIfExists('billing_address_city', $data ?? [], null);
        $this->setIfExists('billing_address_country', $data ?? [], null);
        $this->setIfExists('billing_address_house_number_or_name', $data ?? [], null);
        $this->setIfExists('billing_address_postal_code', $data ?? [], null);
        $this->setIfExists('billing_address_state_or_province', $data ?? [], null);
        $this->setIfExists('billing_address_street', $data ?? [], null);
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
     * Gets billing_address_city
     *
     * @return string|null
     */
    public function getBillingAddressCity()
    {
        return $this->container['billing_address_city'];
    }

    /**
     * Sets billing_address_city
     *
     * @param string|null $billing_address_city The billing address city passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressCity($billing_address_city)
    {
        if (is_null($billing_address_city)) {
            throw new \InvalidArgumentException('non-nullable billing_address_city cannot be null');
        }
        $this->container['billing_address_city'] = $billing_address_city;

        return $this;
    }

    /**
     * Gets billing_address_country
     *
     * @return string|null
     */
    public function getBillingAddressCountry()
    {
        return $this->container['billing_address_country'];
    }

    /**
     * Sets billing_address_country
     *
     * @param string|null $billing_address_country The billing address country passed in the payment request.  Example: NL
     *
     * @return self
     */
    public function setBillingAddressCountry($billing_address_country)
    {
        if (is_null($billing_address_country)) {
            throw new \InvalidArgumentException('non-nullable billing_address_country cannot be null');
        }
        $this->container['billing_address_country'] = $billing_address_country;

        return $this;
    }

    /**
     * Gets billing_address_house_number_or_name
     *
     * @return string|null
     */
    public function getBillingAddressHouseNumberOrName()
    {
        return $this->container['billing_address_house_number_or_name'];
    }

    /**
     * Sets billing_address_house_number_or_name
     *
     * @param string|null $billing_address_house_number_or_name The billing address house number or name passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressHouseNumberOrName($billing_address_house_number_or_name)
    {
        if (is_null($billing_address_house_number_or_name)) {
            throw new \InvalidArgumentException('non-nullable billing_address_house_number_or_name cannot be null');
        }
        $this->container['billing_address_house_number_or_name'] = $billing_address_house_number_or_name;

        return $this;
    }

    /**
     * Gets billing_address_postal_code
     *
     * @return string|null
     */
    public function getBillingAddressPostalCode()
    {
        return $this->container['billing_address_postal_code'];
    }

    /**
     * Sets billing_address_postal_code
     *
     * @param string|null $billing_address_postal_code The billing address postal code passed in the payment request.  Example: 1011 DJ
     *
     * @return self
     */
    public function setBillingAddressPostalCode($billing_address_postal_code)
    {
        if (is_null($billing_address_postal_code)) {
            throw new \InvalidArgumentException('non-nullable billing_address_postal_code cannot be null');
        }
        $this->container['billing_address_postal_code'] = $billing_address_postal_code;

        return $this;
    }

    /**
     * Gets billing_address_state_or_province
     *
     * @return string|null
     */
    public function getBillingAddressStateOrProvince()
    {
        return $this->container['billing_address_state_or_province'];
    }

    /**
     * Sets billing_address_state_or_province
     *
     * @param string|null $billing_address_state_or_province The billing address state or province passed in the payment request.  Example: NH
     *
     * @return self
     */
    public function setBillingAddressStateOrProvince($billing_address_state_or_province)
    {
        if (is_null($billing_address_state_or_province)) {
            throw new \InvalidArgumentException('non-nullable billing_address_state_or_province cannot be null');
        }
        $this->container['billing_address_state_or_province'] = $billing_address_state_or_province;

        return $this;
    }

    /**
     * Gets billing_address_street
     *
     * @return string|null
     */
    public function getBillingAddressStreet()
    {
        return $this->container['billing_address_street'];
    }

    /**
     * Sets billing_address_street
     *
     * @param string|null $billing_address_street The billing address street passed in the payment request.
     *
     * @return self
     */
    public function setBillingAddressStreet($billing_address_street)
    {
        if (is_null($billing_address_street)) {
            throw new \InvalidArgumentException('non-nullable billing_address_street cannot be null');
        }
        $this->container['billing_address_street'] = $billing_address_street;

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
