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
 * PaymentMethodsRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentMethodsRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentMethodsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'additionalData' => 'array<string,string>',
        'allowedPaymentMethods' => 'string[]',
        'amount' => '\Adyen\Model\Checkout\Amount',
        'blockedPaymentMethods' => 'string[]',
        'channel' => 'string',
        'countryCode' => 'string',
        'merchantAccount' => 'string',
        'order' => '\Adyen\Model\Checkout\EncryptedOrderData',
        'shopperLocale' => 'string',
        'shopperReference' => 'string',
        'splitCardFundingSources' => 'bool',
        'store' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'additionalData' => null,
        'allowedPaymentMethods' => null,
        'amount' => null,
        'blockedPaymentMethods' => null,
        'channel' => null,
        'countryCode' => null,
        'merchantAccount' => null,
        'order' => null,
        'shopperLocale' => null,
        'shopperReference' => null,
        'splitCardFundingSources' => null,
        'store' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'additionalData' => false,
        'allowedPaymentMethods' => false,
        'amount' => false,
        'blockedPaymentMethods' => false,
        'channel' => false,
        'countryCode' => false,
        'merchantAccount' => false,
        'order' => false,
        'shopperLocale' => false,
        'shopperReference' => false,
        'splitCardFundingSources' => false,
        'store' => false
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
        'additionalData' => 'additionalData',
        'allowedPaymentMethods' => 'allowedPaymentMethods',
        'amount' => 'amount',
        'blockedPaymentMethods' => 'blockedPaymentMethods',
        'channel' => 'channel',
        'countryCode' => 'countryCode',
        'merchantAccount' => 'merchantAccount',
        'order' => 'order',
        'shopperLocale' => 'shopperLocale',
        'shopperReference' => 'shopperReference',
        'splitCardFundingSources' => 'splitCardFundingSources',
        'store' => 'store'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additionalData' => 'setAdditionalData',
        'allowedPaymentMethods' => 'setAllowedPaymentMethods',
        'amount' => 'setAmount',
        'blockedPaymentMethods' => 'setBlockedPaymentMethods',
        'channel' => 'setChannel',
        'countryCode' => 'setCountryCode',
        'merchantAccount' => 'setMerchantAccount',
        'order' => 'setOrder',
        'shopperLocale' => 'setShopperLocale',
        'shopperReference' => 'setShopperReference',
        'splitCardFundingSources' => 'setSplitCardFundingSources',
        'store' => 'setStore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additionalData' => 'getAdditionalData',
        'allowedPaymentMethods' => 'getAllowedPaymentMethods',
        'amount' => 'getAmount',
        'blockedPaymentMethods' => 'getBlockedPaymentMethods',
        'channel' => 'getChannel',
        'countryCode' => 'getCountryCode',
        'merchantAccount' => 'getMerchantAccount',
        'order' => 'getOrder',
        'shopperLocale' => 'getShopperLocale',
        'shopperReference' => 'getShopperReference',
        'splitCardFundingSources' => 'getSplitCardFundingSources',
        'store' => 'getStore'
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

    public const CHANNEL_I_OS = 'iOS';
    public const CHANNEL_ANDROID = 'Android';
    public const CHANNEL_WEB = 'Web';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChannelAllowableValues()
    {
        return [
            self::CHANNEL_I_OS,
            self::CHANNEL_ANDROID,
            self::CHANNEL_WEB,
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
        $this->setIfExists('additionalData', $data ?? [], null);
        $this->setIfExists('allowedPaymentMethods', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('blockedPaymentMethods', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
        $this->setIfExists('countryCode', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('order', $data ?? [], null);
        $this->setIfExists('shopperLocale', $data ?? [], null);
        $this->setIfExists('shopperReference', $data ?? [], null);
        $this->setIfExists('splitCardFundingSources', $data ?? [], null);
        $this->setIfExists('store', $data ?? [], null);
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

        $allowedValues = $this->getChannelAllowableValues();
        if (!is_null($this->container['channel']) && !in_array($this->container['channel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'channel', must be one of '%s'",
                $this->container['channel'],
                implode("', '", $allowedValues)
            );
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
     * @param array<string,string>|null $additionalData This field contains additional data, which may be required for a particular payment request.  The `additionalData` object consists of entries, each of which includes the key and value.
     *
     * @return self
     */
    public function setAdditionalData($additionalData)
    {
        if (is_null($additionalData)) {
            throw new \InvalidArgumentException('non-nullable additionalData cannot be null');
        }
        $this->container['additionalData'] = $additionalData;

        return $this;
    }

    /**
     * Gets allowedPaymentMethods
     *
     * @return string[]|null
     */
    public function getAllowedPaymentMethods()
    {
        return $this->container['allowedPaymentMethods'];
    }

    /**
     * Sets allowedPaymentMethods
     *
     * @param string[]|null $allowedPaymentMethods List of payment methods to be presented to the shopper. To refer to payment methods, use their [payment method type](https://docs.adyen.com/payment-methods/payment-method-types).  Example: `\"allowedPaymentMethods\":[\"ideal\",\"giropay\"]`
     *
     * @return self
     */
    public function setAllowedPaymentMethods($allowedPaymentMethods)
    {
        if (is_null($allowedPaymentMethods)) {
            throw new \InvalidArgumentException('non-nullable allowedPaymentMethods cannot be null');
        }
        $this->container['allowedPaymentMethods'] = $allowedPaymentMethods;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Checkout\Amount|null $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets blockedPaymentMethods
     *
     * @return string[]|null
     */
    public function getBlockedPaymentMethods()
    {
        return $this->container['blockedPaymentMethods'];
    }

    /**
     * Sets blockedPaymentMethods
     *
     * @param string[]|null $blockedPaymentMethods List of payment methods to be hidden from the shopper. To refer to payment methods, use their [payment method type](https://docs.adyen.com/payment-methods/payment-method-types).  Example: `\"blockedPaymentMethods\":[\"ideal\",\"giropay\"]`
     *
     * @return self
     */
    public function setBlockedPaymentMethods($blockedPaymentMethods)
    {
        if (is_null($blockedPaymentMethods)) {
            throw new \InvalidArgumentException('non-nullable blockedPaymentMethods cannot be null');
        }
        $this->container['blockedPaymentMethods'] = $blockedPaymentMethods;

        return $this;
    }

    /**
     * Gets channel
     *
     * @return string|null
     */
    public function getChannel()
    {
        return $this->container['channel'];
    }

    /**
     * Sets channel
     *
     * @param string|null $channel The platform where a payment transaction takes place. This field can be used for filtering out payment methods that are only available on specific platforms. Possible values: * iOS * Android * Web
     *
     * @return self
     */
    public function setChannel($channel)
    {
        if (is_null($channel)) {
            throw new \InvalidArgumentException('non-nullable channel cannot be null');
        }
        $allowedValues = $this->getChannelAllowableValues();
        if (!in_array($channel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'channel', must be one of '%s'",
                    $channel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['channel'] = $channel;

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
     * @param string|null $countryCode The shopper's country code.
     *
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        if (is_null($countryCode)) {
            throw new \InvalidArgumentException('non-nullable countryCode cannot be null');
        }
        $this->container['countryCode'] = $countryCode;

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
        if (is_null($merchantAccount)) {
            throw new \InvalidArgumentException('non-nullable merchantAccount cannot be null');
        }
        $this->container['merchantAccount'] = $merchantAccount;

        return $this;
    }

    /**
     * Gets order
     *
     * @return \Adyen\Model\Checkout\EncryptedOrderData|null
     */
    public function getOrder()
    {
        return $this->container['order'];
    }

    /**
     * Sets order
     *
     * @param \Adyen\Model\Checkout\EncryptedOrderData|null $order order
     *
     * @return self
     */
    public function setOrder($order)
    {
        if (is_null($order)) {
            throw new \InvalidArgumentException('non-nullable order cannot be null');
        }
        $this->container['order'] = $order;

        return $this;
    }

    /**
     * Gets shopperLocale
     *
     * @return string|null
     */
    public function getShopperLocale()
    {
        return $this->container['shopperLocale'];
    }

    /**
     * Sets shopperLocale
     *
     * @param string|null $shopperLocale The combination of a language code and a country code to specify the language to be used in the payment.
     *
     * @return self
     */
    public function setShopperLocale($shopperLocale)
    {
        if (is_null($shopperLocale)) {
            throw new \InvalidArgumentException('non-nullable shopperLocale cannot be null');
        }
        $this->container['shopperLocale'] = $shopperLocale;

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
     * @param string|null $shopperReference Required for recurring payments.  Your reference to uniquely identify this shopper, for example user ID or account ID. Minimum length: 3 characters. > Your reference must not include personally identifiable information (PII), for example name or email address.
     *
     * @return self
     */
    public function setShopperReference($shopperReference)
    {
        if (is_null($shopperReference)) {
            throw new \InvalidArgumentException('non-nullable shopperReference cannot be null');
        }
        $this->container['shopperReference'] = $shopperReference;

        return $this;
    }

    /**
     * Gets splitCardFundingSources
     *
     * @return bool|null
     */
    public function getSplitCardFundingSources()
    {
        return $this->container['splitCardFundingSources'];
    }

    /**
     * Sets splitCardFundingSources
     *
     * @param bool|null $splitCardFundingSources Boolean value indicating whether the card payment method should be split into separate debit and credit options.
     *
     * @return self
     */
    public function setSplitCardFundingSources($splitCardFundingSources)
    {
        if (is_null($splitCardFundingSources)) {
            throw new \InvalidArgumentException('non-nullable splitCardFundingSources cannot be null');
        }
        $this->container['splitCardFundingSources'] = $splitCardFundingSources;

        return $this;
    }

    /**
     * Gets store
     *
     * @return string|null
     */
    public function getStore()
    {
        return $this->container['store'];
    }

    /**
     * Sets store
     *
     * @param string|null $store The ecommerce or point-of-sale store that is processing the payment. Used in:  * [Partner platform integrations](https://docs.adyen.com/marketplaces-and-platforms/classic/platforms-for-partners#route-payments) for the [Classic Platforms integration](https://docs.adyen.com/marketplaces-and-platforms/classic). * [Platform setup integrations](https://docs.adyen.com/marketplaces-and-platforms/additional-for-platform-setup/route-payment-to-store) for the [Balance Platform](https://docs.adyen.com/marketplaces-and-platforms).
     *
     * @return self
     */
    public function setStore($store)
    {
        if (is_null($store)) {
            throw new \InvalidArgumentException('non-nullable store cannot be null');
        }
        $this->container['store'] = $store;

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
