<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * FundDestination Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FundDestination implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FundDestination';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'iBAN' => 'string',
        'additionalData' => 'array<string,string>',
        'billingAddress' => '\Adyen\Model\Payments\Address',
        'card' => '\Adyen\Model\Payments\Card',
        'selectedRecurringDetailReference' => 'string',
        'shopperEmail' => 'string',
        'shopperName' => '\Adyen\Model\Payments\Name',
        'shopperReference' => 'string',
        'subMerchant' => '\Adyen\Model\Payments\SubMerchant',
        'telephoneNumber' => 'string',
        'walletPurpose' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'iBAN' => null,
        'additionalData' => null,
        'billingAddress' => null,
        'card' => null,
        'selectedRecurringDetailReference' => null,
        'shopperEmail' => null,
        'shopperName' => null,
        'shopperReference' => null,
        'subMerchant' => null,
        'telephoneNumber' => null,
        'walletPurpose' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'iBAN' => false,
        'additionalData' => false,
        'billingAddress' => false,
        'card' => false,
        'selectedRecurringDetailReference' => false,
        'shopperEmail' => false,
        'shopperName' => false,
        'shopperReference' => false,
        'subMerchant' => false,
        'telephoneNumber' => false,
        'walletPurpose' => false
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
        'iBAN' => 'IBAN',
        'additionalData' => 'additionalData',
        'billingAddress' => 'billingAddress',
        'card' => 'card',
        'selectedRecurringDetailReference' => 'selectedRecurringDetailReference',
        'shopperEmail' => 'shopperEmail',
        'shopperName' => 'shopperName',
        'shopperReference' => 'shopperReference',
        'subMerchant' => 'subMerchant',
        'telephoneNumber' => 'telephoneNumber',
        'walletPurpose' => 'walletPurpose'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'iBAN' => 'setIBAN',
        'additionalData' => 'setAdditionalData',
        'billingAddress' => 'setBillingAddress',
        'card' => 'setCard',
        'selectedRecurringDetailReference' => 'setSelectedRecurringDetailReference',
        'shopperEmail' => 'setShopperEmail',
        'shopperName' => 'setShopperName',
        'shopperReference' => 'setShopperReference',
        'subMerchant' => 'setSubMerchant',
        'telephoneNumber' => 'setTelephoneNumber',
        'walletPurpose' => 'setWalletPurpose'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'iBAN' => 'getIBAN',
        'additionalData' => 'getAdditionalData',
        'billingAddress' => 'getBillingAddress',
        'card' => 'getCard',
        'selectedRecurringDetailReference' => 'getSelectedRecurringDetailReference',
        'shopperEmail' => 'getShopperEmail',
        'shopperName' => 'getShopperName',
        'shopperReference' => 'getShopperReference',
        'subMerchant' => 'getSubMerchant',
        'telephoneNumber' => 'getTelephoneNumber',
        'walletPurpose' => 'getWalletPurpose'
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
        $this->setIfExists('iBAN', $data ?? [], null);
        $this->setIfExists('additionalData', $data ?? [], null);
        $this->setIfExists('billingAddress', $data ?? [], null);
        $this->setIfExists('card', $data ?? [], null);
        $this->setIfExists('selectedRecurringDetailReference', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('shopperName', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
        $this->setIfExists('subMerchant', $data ?? [], null);
        $this->setIfExists('telephoneNumber', $data ?? [], null);
        $this->setIfExists('walletPurpose', $data ?? [], null);
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
     * Gets iBAN
     *
     * @return string|null
     */
    public function getIBAN()
    {
        return $this->container['iBAN'];
    }

    /**
     * Sets iBAN
     *
     * @param string|null $iBAN Bank Account Number of the recipient
     *
     * @return self
     */
    public function setIBAN($iBAN)
    {
        $this->container['iBAN'] = $iBAN;

        return $this;
    }

    /**
     * Gets additionalData
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additionalData'];
    }

    /**
     * Sets additionalData
     *
     * @param array<string,string>|null $additionalData a map of name/value pairs for passing in additional/industry-specific data
     *
     * @return self
     */
    public function setAdditionalData($additionalData)
    {
        $this->container['additionalData'] = $additionalData;

        return $this;
    }

    /**
     * Gets billingAddress
     *
     * @return \Adyen\Model\Payments\Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billingAddress'];
    }

    /**
     * Sets billingAddress
     *
     * @param \Adyen\Model\Payments\Address|null $billingAddress billingAddress
     *
     * @return self
     */
    public function setBillingAddress($billingAddress)
    {
        $this->container['billingAddress'] = $billingAddress;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Adyen\Model\Payments\Card|null
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Adyen\Model\Payments\Card|null $card card
     *
     * @return self
     */
    public function setCard($card)
    {
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets selectedRecurringDetailReference
     *
     * @return string|null
     */
    public function getSelectedRecurringDetailReference()
    {
        return $this->container['selectedRecurringDetailReference'];
    }

    /**
     * Sets selectedRecurringDetailReference
     *
     * @param string|null $selectedRecurringDetailReference The `recurringDetailReference` you want to use for this payment. The value `LATEST` can be used to select the most recently stored recurring detail.
     *
     * @return self
     */
    public function setSelectedRecurringDetailReference($selectedRecurringDetailReference)
    {
        $this->container['selectedRecurringDetailReference'] = $selectedRecurringDetailReference;

        return $this;
    }

    /**
     * Gets shopperEmail
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopperEmail'];
    }

    /**
     * Sets shopperEmail
     *
     * @param string|null $shopperEmail the email address of the person
     *
     * @return self
     */
    public function setShopperEmail($shopperEmail)
    {
        $this->container['shopperEmail'] = $shopperEmail;

        return $this;
    }

    /**
     * Gets shopperName
     *
     * @return \Adyen\Model\Payments\Name|null
     */
    public function getShopperName()
    {
        return $this->container['shopperName'];
    }

    /**
     * Sets shopperName
     *
     * @param \Adyen\Model\Payments\Name|null $shopperName shopperName
     *
     * @return self
     */
    public function setShopperName($shopperName)
    {
        $this->container['shopperName'] = $shopperName;

        return $this;
    }

    /**
     * Gets shopperReference
     *
     * @return string|null
     */
    public function getShopperReference()
    {
        return $this->container['shopperReference'];
    }

    /**
     * Sets shopperReference
     *
     * @param string|null $shopperReference Required for recurring payments.  Your reference to uniquely identify this shopper, for example user ID or account ID. The value is case-sensitive and must be at least three characters. > Your reference must not include personally identifiable information (PII) such as name or email address.
     *
     * @return self
     */
    public function setShopperReference($shopperReference)
    {
        $this->container['shopperReference'] = $shopperReference;

        return $this;
    }

    /**
     * Gets subMerchant
     *
     * @return \Adyen\Model\Payments\SubMerchant|null
     */
    public function getSubMerchant()
    {
        return $this->container['subMerchant'];
    }

    /**
     * Sets subMerchant
     *
     * @param \Adyen\Model\Payments\SubMerchant|null $subMerchant subMerchant
     *
     * @return self
     */
    public function setSubMerchant($subMerchant)
    {
        $this->container['subMerchant'] = $subMerchant;

        return $this;
    }

    /**
     * Gets telephoneNumber
     *
     * @return string|null
     */
    public function getTelephoneNumber()
    {
        return $this->container['telephoneNumber'];
    }

    /**
     * Sets telephoneNumber
     *
     * @param string|null $telephoneNumber the telephone number of the person
     *
     * @return self
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        $this->container['telephoneNumber'] = $telephoneNumber;

        return $this;
    }

    /**
     * Gets walletPurpose
     *
     * @return string|null
     */
    public function getWalletPurpose()
    {
        return $this->container['walletPurpose'];
    }

    /**
     * Sets walletPurpose
     *
     * @param string|null $walletPurpose The purpose of a digital wallet transaction.
     *
     * @return self
     */
    public function setWalletPurpose($walletPurpose)
    {
        $this->container['walletPurpose'] = $walletPurpose;

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
