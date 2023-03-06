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
 * AdditionalDataWallets Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataWallets implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataWallets';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'androidpay_token' => 'string',
        'masterpass_transaction_id' => 'string',
        'payment_token' => 'string',
        'paywithgoogle_token' => 'string',
        'samsungpay_token' => 'string',
        'visacheckout_call_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'androidpay_token' => null,
        'masterpass_transaction_id' => null,
        'payment_token' => null,
        'paywithgoogle_token' => null,
        'samsungpay_token' => null,
        'visacheckout_call_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'androidpay_token' => false,
        'masterpass_transaction_id' => false,
        'payment_token' => false,
        'paywithgoogle_token' => false,
        'samsungpay_token' => false,
        'visacheckout_call_id' => false
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
        'androidpay_token' => 'androidpay.token',
        'masterpass_transaction_id' => 'masterpass.transactionId',
        'payment_token' => 'payment.token',
        'paywithgoogle_token' => 'paywithgoogle.token',
        'samsungpay_token' => 'samsungpay.token',
        'visacheckout_call_id' => 'visacheckout.callId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'androidpay_token' => 'setAndroidpayToken',
        'masterpass_transaction_id' => 'setMasterpassTransactionId',
        'payment_token' => 'setPaymentToken',
        'paywithgoogle_token' => 'setPaywithgoogleToken',
        'samsungpay_token' => 'setSamsungpayToken',
        'visacheckout_call_id' => 'setVisacheckoutCallId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'androidpay_token' => 'getAndroidpayToken',
        'masterpass_transaction_id' => 'getMasterpassTransactionId',
        'payment_token' => 'getPaymentToken',
        'paywithgoogle_token' => 'getPaywithgoogleToken',
        'samsungpay_token' => 'getSamsungpayToken',
        'visacheckout_call_id' => 'getVisacheckoutCallId'
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
        $this->setIfExists('androidpay_token', $data ?? [], null);
        $this->setIfExists('masterpass_transaction_id', $data ?? [], null);
        $this->setIfExists('payment_token', $data ?? [], null);
        $this->setIfExists('paywithgoogle_token', $data ?? [], null);
        $this->setIfExists('samsungpay_token', $data ?? [], null);
        $this->setIfExists('visacheckout_call_id', $data ?? [], null);
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
     * Gets androidpay_token
     *
     * @return string|null
     */
    public function getAndroidpayToken()
    {
        return $this->container['androidpay_token'];
    }

    /**
     * Sets androidpay_token
     *
     * @param string|null $androidpay_token The Android Pay token retrieved from the SDK.
     *
     * @return self
     */
    public function setAndroidpayToken($androidpay_token)
    {
        if (is_null($androidpay_token)) {
            throw new \InvalidArgumentException('non-nullable androidpay_token cannot be null');
        }
        $this->container['androidpay_token'] = $androidpay_token;

        return $this;
    }

    /**
     * Gets masterpass_transaction_id
     *
     * @return string|null
     */
    public function getMasterpassTransactionId()
    {
        return $this->container['masterpass_transaction_id'];
    }

    /**
     * Sets masterpass_transaction_id
     *
     * @param string|null $masterpass_transaction_id The Mastercard Masterpass Transaction ID retrieved from the SDK.
     *
     * @return self
     */
    public function setMasterpassTransactionId($masterpass_transaction_id)
    {
        if (is_null($masterpass_transaction_id)) {
            throw new \InvalidArgumentException('non-nullable masterpass_transaction_id cannot be null');
        }
        $this->container['masterpass_transaction_id'] = $masterpass_transaction_id;

        return $this;
    }

    /**
     * Gets payment_token
     *
     * @return string|null
     */
    public function getPaymentToken()
    {
        return $this->container['payment_token'];
    }

    /**
     * Sets payment_token
     *
     * @param string|null $payment_token The Apple Pay token retrieved from the SDK.
     *
     * @return self
     */
    public function setPaymentToken($payment_token)
    {
        if (is_null($payment_token)) {
            throw new \InvalidArgumentException('non-nullable payment_token cannot be null');
        }
        $this->container['payment_token'] = $payment_token;

        return $this;
    }

    /**
     * Gets paywithgoogle_token
     *
     * @return string|null
     */
    public function getPaywithgoogleToken()
    {
        return $this->container['paywithgoogle_token'];
    }

    /**
     * Sets paywithgoogle_token
     *
     * @param string|null $paywithgoogle_token The Google Pay token retrieved from the SDK.
     *
     * @return self
     */
    public function setPaywithgoogleToken($paywithgoogle_token)
    {
        if (is_null($paywithgoogle_token)) {
            throw new \InvalidArgumentException('non-nullable paywithgoogle_token cannot be null');
        }
        $this->container['paywithgoogle_token'] = $paywithgoogle_token;

        return $this;
    }

    /**
     * Gets samsungpay_token
     *
     * @return string|null
     */
    public function getSamsungpayToken()
    {
        return $this->container['samsungpay_token'];
    }

    /**
     * Sets samsungpay_token
     *
     * @param string|null $samsungpay_token The Samsung Pay token retrieved from the SDK.
     *
     * @return self
     */
    public function setSamsungpayToken($samsungpay_token)
    {
        if (is_null($samsungpay_token)) {
            throw new \InvalidArgumentException('non-nullable samsungpay_token cannot be null');
        }
        $this->container['samsungpay_token'] = $samsungpay_token;

        return $this;
    }

    /**
     * Gets visacheckout_call_id
     *
     * @return string|null
     */
    public function getVisacheckoutCallId()
    {
        return $this->container['visacheckout_call_id'];
    }

    /**
     * Sets visacheckout_call_id
     *
     * @param string|null $visacheckout_call_id The Visa Checkout Call ID retrieved from the SDK.
     *
     * @return self
     */
    public function setVisacheckoutCallId($visacheckout_call_id)
    {
        if (is_null($visacheckout_call_id)) {
            throw new \InvalidArgumentException('non-nullable visacheckout_call_id cannot be null');
        }
        $this->container['visacheckout_call_id'] = $visacheckout_call_id;

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
