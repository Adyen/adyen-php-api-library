<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * CardDetailsRequest Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class CardDetailsRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CardDetailsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cardNumber' => 'string',
        'countryCode' => 'string',
        'encryptedCardNumber' => 'string',
        'merchantAccount' => 'string',
        'supportedBrands' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cardNumber' => null,
        'countryCode' => null,
        'encryptedCardNumber' => null,
        'merchantAccount' => null,
        'supportedBrands' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cardNumber' => false,
        'countryCode' => false,
        'encryptedCardNumber' => false,
        'merchantAccount' => false,
        'supportedBrands' => false
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
        'cardNumber' => 'cardNumber',
        'countryCode' => 'countryCode',
        'encryptedCardNumber' => 'encryptedCardNumber',
        'merchantAccount' => 'merchantAccount',
        'supportedBrands' => 'supportedBrands'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cardNumber' => 'setCardNumber',
        'countryCode' => 'setCountryCode',
        'encryptedCardNumber' => 'setEncryptedCardNumber',
        'merchantAccount' => 'setMerchantAccount',
        'supportedBrands' => 'setSupportedBrands'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cardNumber' => 'getCardNumber',
        'countryCode' => 'getCountryCode',
        'encryptedCardNumber' => 'getEncryptedCardNumber',
        'merchantAccount' => 'getMerchantAccount',
        'supportedBrands' => 'getSupportedBrands'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('cardNumber', $data ?? [], null);
        $this->setIfExists('countryCode', $data ?? [], null);
        $this->setIfExists('encryptedCardNumber', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('supportedBrands', $data ?? [], null);
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

        if ($this->container['cardNumber'] === null) {
            $invalidProperties[] = "'cardNumber' can't be null";
        }
        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
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
     * Gets cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->container['cardNumber'];
    }

    /**
     * Sets cardNumber
     *
     * @param string $cardNumber A minimum of the first eight digits of the card number. The full card number gives the best result.   You must be [fully PCI compliant](https://docs.adyen.com/development-resources/pci-dss-compliance-guide) to collect raw card data. Alternatively, you can use the `encryptedCardNumber` field.
     *
     * @return self
     */
    public function setCardNumber($cardNumber)
    {
        $this->container['cardNumber'] = $cardNumber;

        return $this;
    }

    /**
     * Gets countryCode
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['countryCode'];
    }

    /**
     * Sets countryCode
     *
     * @param string|null $countryCode The shopper country.  Format: [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) Example: NL or DE
     *
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        $this->container['countryCode'] = $countryCode;

        return $this;
    }

    /**
     * Gets encryptedCardNumber
     *
     * @return string|null
     */
    public function getEncryptedCardNumber()
    {
        return $this->container['encryptedCardNumber'];
    }

    /**
     * Sets encryptedCardNumber
     *
     * @param string|null $encryptedCardNumber The encrypted card number.
     *
     * @return self
     */
    public function setEncryptedCardNumber($encryptedCardNumber)
    {
        $this->container['encryptedCardNumber'] = $encryptedCardNumber;

        return $this;
    }

    /**
     * Gets merchantAccount
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchantAccount'];
    }

    /**
     * Sets merchantAccount
     *
     * @param string $merchantAccount The merchant account identifier, with which you want to process the transaction.
     *
     * @return self
     */
    public function setMerchantAccount($merchantAccount)
    {
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets supportedBrands
     *
     * @return string[]|null
     */
    public function getSupportedBrands()
    {
        return $this->container['supportedBrands'];
    }

    /**
     * Sets supportedBrands
     *
     * @param string[]|null $supportedBrands The card brands you support. This is the [`brands`](https://docs.adyen.com/api-explorer/#/CheckoutService/latest/post/paymentMethods__resParam_paymentMethods-brands) array from your [`/paymentMethods`](https://docs.adyen.com/api-explorer/#/CheckoutService/latest/post/paymentMethods) response.   If not included, our API uses the ones configured for your merchant account and, if provided, the country code.
     *
     * @return self
     */
    public function setSupportedBrands($supportedBrands)
    {
        $this->container['supportedBrands'] = $supportedBrands;

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

    public function toArray(): array
    {
        $array = [];
        foreach (self::$openAPITypes as $propertyName => $propertyType) {
            $propertyValue = $this[$propertyName];
            if ($propertyValue !== null) {
                // Check if the property value is an object and has a toArray() method
                if (is_object($propertyValue) && method_exists($propertyValue, 'toArray')) {
                    $array[$propertyName] = $propertyValue->toArray();
                // Check if it's type datetime
                } elseif ($propertyValue instanceof \DateTime) {
                    $array[$propertyName] = $propertyValue->format(DATE_ATOM);
                // If it's an array type we should check whether it contains objects and if so call toArray method
                } elseif (is_array($propertyValue)) {
                    $array[$propertyName] = array_map(function ($item) {
                        return $item instanceof ModelInterface ? $item->toArray() : $item;
                    }, $propertyValue);
                } else {
                    // Otherwise, directly assign the property value to the array
                    $array[$propertyName] = $propertyValue;
                }
            }
        }
        return $array;
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
