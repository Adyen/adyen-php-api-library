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
 * GooglePayDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GooglePayDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'GooglePayDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'checkoutAttemptId' => 'string',
        'fundingSource' => 'string',
        'googlePayCardNetwork' => 'string',
        'googlePayToken' => 'string',
        'recurringDetailReference' => 'string',
        'storedPaymentMethodId' => 'string',
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
        'checkoutAttemptId' => null,
        'fundingSource' => null,
        'googlePayCardNetwork' => null,
        'googlePayToken' => null,
        'recurringDetailReference' => null,
        'storedPaymentMethodId' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'checkoutAttemptId' => false,
        'fundingSource' => false,
        'googlePayCardNetwork' => false,
        'googlePayToken' => false,
        'recurringDetailReference' => false,
        'storedPaymentMethodId' => false,
        'type' => false
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
        'checkoutAttemptId' => 'checkoutAttemptId',
        'fundingSource' => 'fundingSource',
        'googlePayCardNetwork' => 'googlePayCardNetwork',
        'googlePayToken' => 'googlePayToken',
        'recurringDetailReference' => 'recurringDetailReference',
        'storedPaymentMethodId' => 'storedPaymentMethodId',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'checkoutAttemptId' => 'setCheckoutAttemptId',
        'fundingSource' => 'setFundingSource',
        'googlePayCardNetwork' => 'setGooglePayCardNetwork',
        'googlePayToken' => 'setGooglePayToken',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'storedPaymentMethodId' => 'setStoredPaymentMethodId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'checkoutAttemptId' => 'getCheckoutAttemptId',
        'fundingSource' => 'getFundingSource',
        'googlePayCardNetwork' => 'getGooglePayCardNetwork',
        'googlePayToken' => 'getGooglePayToken',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'storedPaymentMethodId' => 'getStoredPaymentMethodId',
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

    public const FUNDING_SOURCE_CREDIT = 'credit';
    public const FUNDING_SOURCE_DEBIT = 'debit';
    public const TYPE_GOOGLEPAY = 'googlepay';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingSourceAllowableValues()
    {
        return [
            self::FUNDING_SOURCE_CREDIT,
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
            self::TYPE_GOOGLEPAY,
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
        $this->setIfExists('checkoutAttemptId', $data ?? [], null);
        $this->setIfExists('fundingSource', $data ?? [], null);
        $this->setIfExists('googlePayCardNetwork', $data ?? [], null);
        $this->setIfExists('googlePayToken', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('storedPaymentMethodId', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!is_null($this->container['fundingSource']) && !in_array($this->container['fundingSource'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'fundingSource', must be one of '%s'",
                $this->container['fundingSource'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['googlePayToken'] === null) {
            $invalidProperties[] = "'googlePayToken' can't be null";
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
     * Gets checkoutAttemptId
     *
     * @return string|null
     */
    public function getCheckoutAttemptId()
    {
        return $this->container['checkoutAttemptId'];
    }

    /**
     * Sets checkoutAttemptId
     *
     * @param string|null $checkoutAttemptId The checkout attempt identifier.
     *
     * @return self
     */
    public function setCheckoutAttemptId($checkoutAttemptId)
    {
        if (is_null($checkoutAttemptId)) {
            throw new \InvalidArgumentException('non-nullable checkoutAttemptId cannot be null');
        }
        $this->container['checkoutAttemptId'] = $checkoutAttemptId;

        return $this;
    }

    /**
     * Gets fundingSource
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['fundingSource'];
    }

    /**
     * Sets fundingSource
     *
     * @param string|null $fundingSource The funding source that should be used when multiple sources are available. For Brazilian combo cards, by default the funding source is credit. To use debit, set this value to **debit**.
     *
     * @return self
     */
    public function setFundingSource($fundingSource)
    {
        if (is_null($fundingSource)) {
            throw new \InvalidArgumentException('non-nullable fundingSource cannot be null');
        }
        $allowedValues = $this->getFundingSourceAllowableValues();
        if (!in_array($fundingSource, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'fundingSource', must be one of '%s'",
                    $fundingSource,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fundingSource'] = $fundingSource;

        return $this;
    }

    /**
     * Gets googlePayCardNetwork
     *
     * @return string|null
     */
    public function getGooglePayCardNetwork()
    {
        return $this->container['googlePayCardNetwork'];
    }

    /**
     * Sets googlePayCardNetwork
     *
     * @param string|null $googlePayCardNetwork The selected payment card network.
     *
     * @return self
     */
    public function setGooglePayCardNetwork($googlePayCardNetwork)
    {
        if (is_null($googlePayCardNetwork)) {
            throw new \InvalidArgumentException('non-nullable googlePayCardNetwork cannot be null');
        }
        $this->container['googlePayCardNetwork'] = $googlePayCardNetwork;

        return $this;
    }

    /**
     * Gets googlePayToken
     *
     * @return string
     */
    public function getGooglePayToken()
    {
        return $this->container['googlePayToken'];
    }

    /**
     * Sets googlePayToken
     *
     * @param string $googlePayToken The `token` that you obtained from the [Google Pay API](https://developers.google.com/pay/api/web/reference/response-objects#PaymentData) `PaymentData` response.
     *
     * @return self
     */
    public function setGooglePayToken($googlePayToken)
    {
        if (is_null($googlePayToken)) {
            throw new \InvalidArgumentException('non-nullable googlePayToken cannot be null');
        }
        $this->container['googlePayToken'] = $googlePayToken;

        return $this;
    }

    /**
     * Gets recurringDetailReference
     *
     * @return string|null
     * @deprecated
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurringDetailReference'];
    }

    /**
     * Sets recurringDetailReference
     *
     * @param string|null $recurringDetailReference This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     * @deprecated
     */
    public function setRecurringDetailReference($recurringDetailReference)
    {
        if (is_null($recurringDetailReference)) {
            throw new \InvalidArgumentException('non-nullable recurringDetailReference cannot be null');
        }
        $this->container['recurringDetailReference'] = $recurringDetailReference;

        return $this;
    }

    /**
     * Gets storedPaymentMethodId
     *
     * @return string|null
     */
    public function getStoredPaymentMethodId()
    {
        return $this->container['storedPaymentMethodId'];
    }

    /**
     * Sets storedPaymentMethodId
     *
     * @param string|null $storedPaymentMethodId This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     */
    public function setStoredPaymentMethodId($storedPaymentMethodId)
    {
        if (is_null($storedPaymentMethodId)) {
            throw new \InvalidArgumentException('non-nullable storedPaymentMethodId cannot be null');
        }
        $this->container['storedPaymentMethodId'] = $storedPaymentMethodId;

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
     * @param string|null $type **googlepay**, **paywithgoogle**
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
}
