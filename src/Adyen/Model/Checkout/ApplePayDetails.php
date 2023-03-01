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
 * ApplePayDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ApplePayDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ApplePayDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'apple_pay_token' => 'string',
        'checkout_attempt_id' => 'string',
        'funding_source' => 'string',
        'recurring_detail_reference' => 'string',
        'stored_payment_method_id' => 'string',
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
        'apple_pay_token' => null,
        'checkout_attempt_id' => null,
        'funding_source' => null,
        'recurring_detail_reference' => null,
        'stored_payment_method_id' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'apple_pay_token' => false,
		'checkout_attempt_id' => false,
		'funding_source' => false,
		'recurring_detail_reference' => false,
		'stored_payment_method_id' => false,
		'type' => false
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
        'apple_pay_token' => 'applePayToken',
        'checkout_attempt_id' => 'checkoutAttemptId',
        'funding_source' => 'fundingSource',
        'recurring_detail_reference' => 'recurringDetailReference',
        'stored_payment_method_id' => 'storedPaymentMethodId',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'apple_pay_token' => 'setApplePayToken',
        'checkout_attempt_id' => 'setCheckoutAttemptId',
        'funding_source' => 'setFundingSource',
        'recurring_detail_reference' => 'setRecurringDetailReference',
        'stored_payment_method_id' => 'setStoredPaymentMethodId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'apple_pay_token' => 'getApplePayToken',
        'checkout_attempt_id' => 'getCheckoutAttemptId',
        'funding_source' => 'getFundingSource',
        'recurring_detail_reference' => 'getRecurringDetailReference',
        'stored_payment_method_id' => 'getStoredPaymentMethodId',
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

    public const FUNDING_SOURCE_DEBIT = 'debit';
    public const TYPE_APPLEPAY = 'applepay';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingSourceAllowableValues()
    {
        return [
            self::FUNDING_SOURCE_DEBIT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_APPLEPAY,
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
        $this->setIfExists('apple_pay_token', $data ?? [], null);
        $this->setIfExists('checkout_attempt_id', $data ?? [], null);
        $this->setIfExists('funding_source', $data ?? [], null);
        $this->setIfExists('recurring_detail_reference', $data ?? [], null);
        $this->setIfExists('stored_payment_method_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'applepay');
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

        if ($this->container['apple_pay_token'] === null) {
            $invalidProperties[] = "'apple_pay_token' can't be null";
        }
        if ((mb_strlen($this->container['apple_pay_token']) > 10000)) {
            $invalidProperties[] = "invalid value for 'apple_pay_token', the character length must be smaller than or equal to 10000.";
        }

        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!is_null($this->container['funding_source']) && !in_array($this->container['funding_source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'funding_source', must be one of '%s'",
                $this->container['funding_source'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
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
     * Gets apple_pay_token
     *
     * @return string
     */
    public function getApplePayToken()
    {
        return $this->container['apple_pay_token'];
    }

    /**
     * Sets apple_pay_token
     *
     * @param string $apple_pay_token The stringified and base64 encoded `paymentData` you retrieved from the Apple framework.
     *
     * @return self
     */
    public function setApplePayToken($apple_pay_token)
    {
        if (is_null($apple_pay_token)) {
            throw new \InvalidArgumentException('non-nullable apple_pay_token cannot be null');
        }
        if ((mb_strlen($apple_pay_token) > 10000)) {
            throw new \InvalidArgumentException('invalid length for $apple_pay_token when calling ApplePayDetails., must be smaller than or equal to 10000.');
        }

        $this->container['apple_pay_token'] = $apple_pay_token;

        return $this;
    }

    /**
     * Gets checkout_attempt_id
     *
     * @return string|null
     */
    public function getCheckoutAttemptId()
    {
        return $this->container['checkout_attempt_id'];
    }

    /**
     * Sets checkout_attempt_id
     *
     * @param string|null $checkout_attempt_id The checkout attempt identifier.
     *
     * @return self
     */
    public function setCheckoutAttemptId($checkout_attempt_id)
    {
        if (is_null($checkout_attempt_id)) {
            throw new \InvalidArgumentException('non-nullable checkout_attempt_id cannot be null');
        }
        $this->container['checkout_attempt_id'] = $checkout_attempt_id;

        return $this;
    }

    /**
     * Gets funding_source
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['funding_source'];
    }

    /**
     * Sets funding_source
     *
     * @param string|null $funding_source The funding source that should be used when multiple sources are available. For Brazilian combo cards, by default the funding source is credit. To use debit, set this value to **debit**.
     *
     * @return self
     */
    public function setFundingSource($funding_source)
    {
        if (is_null($funding_source)) {
            throw new \InvalidArgumentException('non-nullable funding_source cannot be null');
        }
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!in_array($funding_source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'funding_source', must be one of '%s'",
                    $funding_source,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['funding_source'] = $funding_source;

        return $this;
    }

    /**
     * Gets recurring_detail_reference
     *
     * @return string|null
     * @deprecated
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurring_detail_reference'];
    }

    /**
     * Sets recurring_detail_reference
     *
     * @param string|null $recurring_detail_reference This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     * @deprecated
     */
    public function setRecurringDetailReference($recurring_detail_reference)
    {
        if (is_null($recurring_detail_reference)) {
            throw new \InvalidArgumentException('non-nullable recurring_detail_reference cannot be null');
        }
        $this->container['recurring_detail_reference'] = $recurring_detail_reference;

        return $this;
    }

    /**
     * Gets stored_payment_method_id
     *
     * @return string|null
     */
    public function getStoredPaymentMethodId()
    {
        return $this->container['stored_payment_method_id'];
    }

    /**
     * Sets stored_payment_method_id
     *
     * @param string|null $stored_payment_method_id This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     */
    public function setStoredPaymentMethodId($stored_payment_method_id)
    {
        if (is_null($stored_payment_method_id)) {
            throw new \InvalidArgumentException('non-nullable stored_payment_method_id cannot be null');
        }
        $this->container['stored_payment_method_id'] = $stored_payment_method_id;

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
     * @param string|null $type **applepay**
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
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


