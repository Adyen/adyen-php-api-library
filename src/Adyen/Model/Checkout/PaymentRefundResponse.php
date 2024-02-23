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
 * PaymentRefundResponse Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentRefundResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentRefundResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'amount' => '\Adyen\Model\Checkout\Amount',
        'lineItems' => '\Adyen\Model\Checkout\LineItem[]',
        'merchantAccount' => 'string',
        'merchantRefundReason' => 'string',
        'paymentPspReference' => 'string',
        'pspReference' => 'string',
        'reference' => 'string',
        'splits' => '\Adyen\Model\Checkout\Split[]',
        'status' => 'string',
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
        'amount' => null,
        'lineItems' => null,
        'merchantAccount' => null,
        'merchantRefundReason' => null,
        'paymentPspReference' => null,
        'pspReference' => null,
        'reference' => null,
        'splits' => null,
        'status' => null,
        'store' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'amount' => false,
        'lineItems' => false,
        'merchantAccount' => false,
        'merchantRefundReason' => false,
        'paymentPspReference' => false,
        'pspReference' => false,
        'reference' => false,
        'splits' => false,
        'status' => false,
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
        'amount' => 'amount',
        'lineItems' => 'lineItems',
        'merchantAccount' => 'merchantAccount',
        'merchantRefundReason' => 'merchantRefundReason',
        'paymentPspReference' => 'paymentPspReference',
        'pspReference' => 'pspReference',
        'reference' => 'reference',
        'splits' => 'splits',
        'status' => 'status',
        'store' => 'store'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'lineItems' => 'setLineItems',
        'merchantAccount' => 'setMerchantAccount',
        'merchantRefundReason' => 'setMerchantRefundReason',
        'paymentPspReference' => 'setPaymentPspReference',
        'pspReference' => 'setPspReference',
        'reference' => 'setReference',
        'splits' => 'setSplits',
        'status' => 'setStatus',
        'store' => 'setStore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'lineItems' => 'getLineItems',
        'merchantAccount' => 'getMerchantAccount',
        'merchantRefundReason' => 'getMerchantRefundReason',
        'paymentPspReference' => 'getPaymentPspReference',
        'pspReference' => 'getPspReference',
        'reference' => 'getReference',
        'splits' => 'getSplits',
        'status' => 'getStatus',
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

    public const MERCHANT_REFUND_REASON_FRAUD = 'FRAUD';
    public const MERCHANT_REFUND_REASON_CUSTOMER_REQUEST = 'CUSTOMER REQUEST';
    public const MERCHANT_REFUND_REASON__RETURN = 'RETURN';
    public const MERCHANT_REFUND_REASON_DUPLICATE = 'DUPLICATE';
    public const MERCHANT_REFUND_REASON_OTHER = 'OTHER';
    public const STATUS_RECEIVED = 'received';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMerchantRefundReasonAllowableValues()
    {
        return [
            self::MERCHANT_REFUND_REASON_FRAUD,
            self::MERCHANT_REFUND_REASON_CUSTOMER_REQUEST,
            self::MERCHANT_REFUND_REASON__RETURN,
            self::MERCHANT_REFUND_REASON_DUPLICATE,
            self::MERCHANT_REFUND_REASON_OTHER,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_RECEIVED,
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
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('lineItems', $data ?? [], null);
        $this->setIfExists('merchantAccount', $data ?? [], null);
        $this->setIfExists('merchantRefundReason', $data ?? [], null);
        $this->setIfExists('paymentPspReference', $data ?? [], null);
        $this->setIfExists('pspReference', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('splits', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['merchantAccount'] === null) {
            $invalidProperties[] = "'merchantAccount' can't be null";
        }
        $allowedValues = $this->getMerchantRefundReasonAllowableValues();
        if (!is_null($this->container['merchantRefundReason']) && !in_array($this->container['merchantRefundReason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'merchantRefundReason', must be one of '%s'",
                $this->container['merchantRefundReason'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['paymentPspReference'] === null) {
            $invalidProperties[] = "'paymentPspReference' can't be null";
        }
        if ($this->container['pspReference'] === null) {
            $invalidProperties[] = "'pspReference' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
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
     * Gets amount
     *
     * @return \Adyen\Model\Checkout\Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Checkout\Amount $amount amount
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
     * Gets lineItems
     *
     * @return \Adyen\Model\Checkout\LineItem[]|null
     */
    public function getLineItems()
    {
        return $this->container['lineItems'];
    }

    /**
     * Sets lineItems
     *
     * @param \Adyen\Model\Checkout\LineItem[]|null $lineItems Price and product information of the refunded items, required for [partial refunds](https://docs.adyen.com/online-payments/refund#refund-a-payment). > This field is required for partial refunds with 3x 4x Oney, Affirm, Afterpay, Atome, Clearpay, Klarna, Ratepay, Walley, and Zip.
     *
     * @return self
     */
    public function setLineItems($lineItems)
    {
        if (is_null($lineItems)) {
            throw new \InvalidArgumentException('non-nullable lineItems cannot be null');
        }
        $this->container['lineItems'] = $lineItems;

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
     * @param string $merchantAccount The merchant account that is used to process the payment.
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
     * Gets merchantRefundReason
     *
     * @return string|null
     */
    public function getMerchantRefundReason()
    {
        return $this->container['merchantRefundReason'];
    }

    /**
     * Sets merchantRefundReason
     *
     * @param string|null $merchantRefundReason Your reason for the refund request.
     *
     * @return self
     */
    public function setMerchantRefundReason($merchantRefundReason)
    {
        if (is_null($merchantRefundReason)) {
            throw new \InvalidArgumentException('non-nullable merchantRefundReason cannot be null');
        }
        $allowedValues = $this->getMerchantRefundReasonAllowableValues();
        if (!in_array($merchantRefundReason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'merchantRefundReason', must be one of '%s'",
                    $merchantRefundReason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['merchantRefundReason'] = $merchantRefundReason;

        return $this;
    }

    /**
     * Gets paymentPspReference
     *
     * @return string
     */
    public function getPaymentPspReference()
    {
        return $this->container['paymentPspReference'];
    }

    /**
     * Sets paymentPspReference
     *
     * @param string $paymentPspReference The [`pspReference`](https://docs.adyen.com/api-explorer/#/CheckoutService/latest/post/payments__resParam_pspReference) of the payment to refund.
     *
     * @return self
     */
    public function setPaymentPspReference($paymentPspReference)
    {
        if (is_null($paymentPspReference)) {
            throw new \InvalidArgumentException('non-nullable paymentPspReference cannot be null');
        }
        $this->container['paymentPspReference'] = $paymentPspReference;

        return $this;
    }

    /**
     * Gets pspReference
     *
     * @return string
     */
    public function getPspReference()
    {
        return $this->container['pspReference'];
    }

    /**
     * Sets pspReference
     *
     * @param string $pspReference Adyen's 16-character reference associated with the refund request.
     *
     * @return self
     */
    public function setPspReference($pspReference)
    {
        if (is_null($pspReference)) {
            throw new \InvalidArgumentException('non-nullable pspReference cannot be null');
        }
        $this->container['pspReference'] = $pspReference;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Your reference for the refund request.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets splits
     *
     * @return \Adyen\Model\Checkout\Split[]|null
     */
    public function getSplits()
    {
        return $this->container['splits'];
    }

    /**
     * Sets splits
     *
     * @param \Adyen\Model\Checkout\Split[]|null $splits An array of objects specifying how the amount should be split between accounts when using Adyen for Platforms. For details, refer to [Providing split information](https://docs.adyen.com/marketplaces-and-platforms/processing-payments#providing-split-information).
     *
     * @return self
     */
    public function setSplits($splits)
    {
        if (is_null($splits)) {
            throw new \InvalidArgumentException('non-nullable splits cannot be null');
        }
        $this->container['splits'] = $splits;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status The status of your request. This will always have the value **received**.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

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
     * @param string|null $store The online store or [physical store](https://docs.adyen.com/point-of-sale/design-your-integration/determine-account-structure/#create-stores) that is processing the refund. This must be the same as the store name configured in your Customer Area.  Otherwise, you get an error and the refund fails.
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
