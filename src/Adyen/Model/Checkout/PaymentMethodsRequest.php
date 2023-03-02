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
 * PaymentMethodsRequest Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
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
        'additional_data' => 'array<string,string>',
        'allowed_payment_methods' => 'string[]',
        'amount' => '\Adyen\Model\Checkout\Amount',
        'blocked_payment_methods' => 'string[]',
        'channel' => 'string',
        'country_code' => 'string',
        'merchant_account' => 'string',
        'order' => '\Adyen\Model\Checkout\CheckoutOrder',
        'shopper_locale' => 'string',
        'shopper_reference' => 'string',
        'split_card_funding_sources' => 'bool',
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
        'additional_data' => null,
        'allowed_payment_methods' => null,
        'amount' => null,
        'blocked_payment_methods' => null,
        'channel' => null,
        'country_code' => null,
        'merchant_account' => null,
        'order' => null,
        'shopper_locale' => null,
        'shopper_reference' => null,
        'split_card_funding_sources' => null,
        'store' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'additional_data' => false,
        'allowed_payment_methods' => false,
        'amount' => false,
        'blocked_payment_methods' => false,
        'channel' => false,
        'country_code' => false,
        'merchant_account' => false,
        'order' => false,
        'shopper_locale' => false,
        'shopper_reference' => false,
        'split_card_funding_sources' => false,
        'store' => false
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
        'additional_data' => 'additionalData',
        'allowed_payment_methods' => 'allowedPaymentMethods',
        'amount' => 'amount',
        'blocked_payment_methods' => 'blockedPaymentMethods',
        'channel' => 'channel',
        'country_code' => 'countryCode',
        'merchant_account' => 'merchantAccount',
        'order' => 'order',
        'shopper_locale' => 'shopperLocale',
        'shopper_reference' => 'shopperReference',
        'split_card_funding_sources' => 'splitCardFundingSources',
        'store' => 'store'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_data' => 'setAdditionalData',
        'allowed_payment_methods' => 'setAllowedPaymentMethods',
        'amount' => 'setAmount',
        'blocked_payment_methods' => 'setBlockedPaymentMethods',
        'channel' => 'setChannel',
        'country_code' => 'setCountryCode',
        'merchant_account' => 'setMerchantAccount',
        'order' => 'setOrder',
        'shopper_locale' => 'setShopperLocale',
        'shopper_reference' => 'setShopperReference',
        'split_card_funding_sources' => 'setSplitCardFundingSources',
        'store' => 'setStore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_data' => 'getAdditionalData',
        'allowed_payment_methods' => 'getAllowedPaymentMethods',
        'amount' => 'getAmount',
        'blocked_payment_methods' => 'getBlockedPaymentMethods',
        'channel' => 'getChannel',
        'country_code' => 'getCountryCode',
        'merchant_account' => 'getMerchantAccount',
        'order' => 'getOrder',
        'shopper_locale' => 'getShopperLocale',
        'shopper_reference' => 'getShopperReference',
        'split_card_funding_sources' => 'getSplitCardFundingSources',
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
        $this->setIfExists('additional_data', $data ?? [], null);
        $this->setIfExists('allowed_payment_methods', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('blocked_payment_methods', $data ?? [], null);
        $this->setIfExists('channel', $data ?? [], null);
        $this->setIfExists('country_code', $data ?? [], null);
        $this->setIfExists('merchant_account', $data ?? [], null);
        $this->setIfExists('order', $data ?? [], null);
        $this->setIfExists('shopper_locale', $data ?? [], null);
        $this->setIfExists('shopper_reference', $data ?? [], null);
        $this->setIfExists('split_card_funding_sources', $data ?? [], false);
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

        if ($this->container['merchant_account'] === null) {
            $invalidProperties[] = "'merchant_account' can't be null";
        }
        if (!is_null($this->container['store']) && (mb_strlen($this->container['store']) > 16)) {
            $invalidProperties[] = "invalid value for 'store', the character length must be smaller than or equal to 16.";
        }

        if (!is_null($this->container['store']) && (mb_strlen($this->container['store']) < 1)) {
            $invalidProperties[] = "invalid value for 'store', the character length must be bigger than or equal to 1.";
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
     * Gets additional_data
     *
     * @return array<string,string>|null
     */
    public function getAdditionalData()
    {
        return $this->container['additional_data'];
    }

    /**
     * Sets additional_data
     *
     * @param array<string,string>|null $additional_data This field contains additional data, which may be required for a particular payment request.  The `additionalData` object consists of entries, each of which includes the key and value.
     *
     * @return self
     */
    public function setAdditionalData($additional_data)
    {
        if (is_null($additional_data)) {
            throw new \InvalidArgumentException('non-nullable additional_data cannot be null');
        }
        $this->container['additional_data'] = $additional_data;

        return $this;
    }

    /**
     * Gets allowed_payment_methods
     *
     * @return string[]|null
     */
    public function getAllowedPaymentMethods()
    {
        return $this->container['allowed_payment_methods'];
    }

    /**
     * Sets allowed_payment_methods
     *
     * @param string[]|null $allowed_payment_methods List of payment methods to be presented to the shopper. To refer to payment methods, use their `paymentMethod.type` from [Payment methods overview](https://docs.adyen.com/payment-methods).  Example: `\"allowedPaymentMethods\":[\"ideal\",\"giropay\"]`
     *
     * @return self
     */
    public function setAllowedPaymentMethods($allowed_payment_methods)
    {
        if (is_null($allowed_payment_methods)) {
            throw new \InvalidArgumentException('non-nullable allowed_payment_methods cannot be null');
        }
        $this->container['allowed_payment_methods'] = $allowed_payment_methods;

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
     * Gets blocked_payment_methods
     *
     * @return string[]|null
     */
    public function getBlockedPaymentMethods()
    {
        return $this->container['blocked_payment_methods'];
    }

    /**
     * Sets blocked_payment_methods
     *
     * @param string[]|null $blocked_payment_methods List of payment methods to be hidden from the shopper. To refer to payment methods, use their `paymentMethod.type` from [Payment methods overview](https://docs.adyen.com/payment-methods).  Example: `\"blockedPaymentMethods\":[\"ideal\",\"giropay\"]`
     *
     * @return self
     */
    public function setBlockedPaymentMethods($blocked_payment_methods)
    {
        if (is_null($blocked_payment_methods)) {
            throw new \InvalidArgumentException('non-nullable blocked_payment_methods cannot be null');
        }
        $this->container['blocked_payment_methods'] = $blocked_payment_methods;

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
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code The shopper's country code.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        if (is_null($country_code)) {
            throw new \InvalidArgumentException('non-nullable country_code cannot be null');
        }
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets merchant_account
     *
     * @return string
     */
    public function getMerchantAccount()
    {
        return $this->container['merchant_account'];
    }

    /**
     * Sets merchant_account
     *
     * @param string $merchant_account The merchant account identifier, with which you want to process the transaction.
     *
     * @return self
     */
    public function setMerchantAccount($merchant_account)
    {
        if (is_null($merchant_account)) {
            throw new \InvalidArgumentException('non-nullable merchant_account cannot be null');
        }
        $this->container['merchant_account'] = $merchant_account;

        return $this;
    }

    /**
     * Gets order
     *
     * @return \Adyen\Model\Checkout\CheckoutOrder|null
     */
    public function getOrder()
    {
        return $this->container['order'];
    }

    /**
     * Sets order
     *
     * @param \Adyen\Model\Checkout\CheckoutOrder|null $order order
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
     * Gets shopper_locale
     *
     * @return string|null
     */
    public function getShopperLocale()
    {
        return $this->container['shopper_locale'];
    }

    /**
     * Sets shopper_locale
     *
     * @param string|null $shopper_locale The combination of a language code and a country code to specify the language to be used in the payment.
     *
     * @return self
     */
    public function setShopperLocale($shopper_locale)
    {
        if (is_null($shopper_locale)) {
            throw new \InvalidArgumentException('non-nullable shopper_locale cannot be null');
        }
        $this->container['shopper_locale'] = $shopper_locale;

        return $this;
    }

    /**
     * Gets shopper_reference
     *
     * @return string|null
     */
    public function getShopperReference()
    {
        return $this->container['shopper_reference'];
    }

    /**
     * Sets shopper_reference
     *
     * @param string|null $shopper_reference Required for recurring payments.  Your reference to uniquely identify this shopper, for example user ID or account ID. Minimum length: 3 characters. > Your reference must not include personally identifiable information (PII), for example name or email address.
     *
     * @return self
     */
    public function setShopperReference($shopper_reference)
    {
        if (is_null($shopper_reference)) {
            throw new \InvalidArgumentException('non-nullable shopper_reference cannot be null');
        }
        $this->container['shopper_reference'] = $shopper_reference;

        return $this;
    }

    /**
     * Gets split_card_funding_sources
     *
     * @return bool|null
     */
    public function getSplitCardFundingSources()
    {
        return $this->container['split_card_funding_sources'];
    }

    /**
     * Sets split_card_funding_sources
     *
     * @param bool|null $split_card_funding_sources Boolean value indicating whether the card payment method should be split into separate debit and credit options.
     *
     * @return self
     */
    public function setSplitCardFundingSources($split_card_funding_sources)
    {
        if (is_null($split_card_funding_sources)) {
            throw new \InvalidArgumentException('non-nullable split_card_funding_sources cannot be null');
        }
        $this->container['split_card_funding_sources'] = $split_card_funding_sources;

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
     * @param string|null $store The ecommerce or point-of-sale store that is processing the payment. Used in [partner model integrations](https://docs.adyen.com/marketplaces-and-platforms/classic/platforms-for-partners#route-payments) for Adyen for Platforms.
     *
     * @return self
     */
    public function setStore($store)
    {
        if (is_null($store)) {
            throw new \InvalidArgumentException('non-nullable store cannot be null');
        }
        if ((mb_strlen($store) > 16)) {
            throw new \InvalidArgumentException('invalid length for $store when calling PaymentMethodsRequest., must be smaller than or equal to 16.');
        }
        if ((mb_strlen($store) < 1)) {
            throw new \InvalidArgumentException('invalid length for $store when calling PaymentMethodsRequest., must be bigger than or equal to 1.');
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
