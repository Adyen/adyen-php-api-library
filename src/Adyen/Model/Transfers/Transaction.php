<?php

/**
 * Transfers API
 *
 * The version of the OpenAPI document: 4
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Transfers;

use \ArrayAccess;
use Adyen\Model\Transfers\ObjectSerializer;

/**
 * Transaction Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Transaction implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Transaction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountHolder' => '\Adyen\Model\Transfers\ResourceReference',
        'amount' => '\Adyen\Model\Transfers\Amount',
        'balanceAccount' => '\Adyen\Model\Transfers\ResourceReference',
        'balancePlatform' => 'string',
        'bookingDate' => '\DateTime',
        'creationDate' => '\DateTime',
        'description' => 'string',
        'id' => 'string',
        'paymentInstrument' => '\Adyen\Model\Transfers\PaymentInstrument',
        'referenceForBeneficiary' => 'string',
        'status' => 'string',
        'transfer' => '\Adyen\Model\Transfers\TransferView',
        'valueDate' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountHolder' => null,
        'amount' => null,
        'balanceAccount' => null,
        'balancePlatform' => null,
        'bookingDate' => 'date-time',
        'creationDate' => 'date-time',
        'description' => null,
        'id' => null,
        'paymentInstrument' => null,
        'referenceForBeneficiary' => null,
        'status' => null,
        'transfer' => null,
        'valueDate' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accountHolder' => false,
        'amount' => false,
        'balanceAccount' => false,
        'balancePlatform' => false,
        'bookingDate' => false,
        'creationDate' => false,
        'description' => false,
        'id' => false,
        'paymentInstrument' => false,
        'referenceForBeneficiary' => false,
        'status' => false,
        'transfer' => false,
        'valueDate' => false
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
        'accountHolder' => 'accountHolder',
        'amount' => 'amount',
        'balanceAccount' => 'balanceAccount',
        'balancePlatform' => 'balancePlatform',
        'bookingDate' => 'bookingDate',
        'creationDate' => 'creationDate',
        'description' => 'description',
        'id' => 'id',
        'paymentInstrument' => 'paymentInstrument',
        'referenceForBeneficiary' => 'referenceForBeneficiary',
        'status' => 'status',
        'transfer' => 'transfer',
        'valueDate' => 'valueDate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountHolder' => 'setAccountHolder',
        'amount' => 'setAmount',
        'balanceAccount' => 'setBalanceAccount',
        'balancePlatform' => 'setBalancePlatform',
        'bookingDate' => 'setBookingDate',
        'creationDate' => 'setCreationDate',
        'description' => 'setDescription',
        'id' => 'setId',
        'paymentInstrument' => 'setPaymentInstrument',
        'referenceForBeneficiary' => 'setReferenceForBeneficiary',
        'status' => 'setStatus',
        'transfer' => 'setTransfer',
        'valueDate' => 'setValueDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountHolder' => 'getAccountHolder',
        'amount' => 'getAmount',
        'balanceAccount' => 'getBalanceAccount',
        'balancePlatform' => 'getBalancePlatform',
        'bookingDate' => 'getBookingDate',
        'creationDate' => 'getCreationDate',
        'description' => 'getDescription',
        'id' => 'getId',
        'paymentInstrument' => 'getPaymentInstrument',
        'referenceForBeneficiary' => 'getReferenceForBeneficiary',
        'status' => 'getStatus',
        'transfer' => 'getTransfer',
        'valueDate' => 'getValueDate'
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

    public const STATUS_BOOKED = 'booked';
    public const STATUS_PENDING = 'pending';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_BOOKED,
            self::STATUS_PENDING,
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('accountHolder', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('balanceAccount', $data ?? [], null);
        $this->setIfExists('balancePlatform', $data ?? [], null);
        $this->setIfExists('bookingDate', $data ?? [], null);
        $this->setIfExists('creationDate', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('paymentInstrument', $data ?? [], null);
        $this->setIfExists('referenceForBeneficiary', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('transfer', $data ?? [], null);
        $this->setIfExists('valueDate', $data ?? [], null);
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

        if ($this->container['accountHolder'] === null) {
            $invalidProperties[] = "'accountHolder' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['balanceAccount'] === null) {
            $invalidProperties[] = "'balanceAccount' can't be null";
        }
        if ($this->container['balancePlatform'] === null) {
            $invalidProperties[] = "'balancePlatform' can't be null";
        }
        if ($this->container['bookingDate'] === null) {
            $invalidProperties[] = "'bookingDate' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
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

        if ($this->container['valueDate'] === null) {
            $invalidProperties[] = "'valueDate' can't be null";
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
     * Gets accountHolder
     *
     * @return \Adyen\Model\Transfers\ResourceReference
     */
    public function getAccountHolder()
    {
        return $this->container['accountHolder'];
    }

    /**
     * Sets accountHolder
     *
     * @param \Adyen\Model\Transfers\ResourceReference $accountHolder accountHolder
     *
     * @return self
     */
    public function setAccountHolder($accountHolder)
    {
        $this->container['accountHolder'] = $accountHolder;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return \Adyen\Model\Transfers\Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param \Adyen\Model\Transfers\Amount $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets balanceAccount
     *
     * @return \Adyen\Model\Transfers\ResourceReference
     */
    public function getBalanceAccount()
    {
        return $this->container['balanceAccount'];
    }

    /**
     * Sets balanceAccount
     *
     * @param \Adyen\Model\Transfers\ResourceReference $balanceAccount balanceAccount
     *
     * @return self
     */
    public function setBalanceAccount($balanceAccount)
    {
        $this->container['balanceAccount'] = $balanceAccount;

        return $this;
    }

    /**
     * Gets balancePlatform
     *
     * @return string
     */
    public function getBalancePlatform()
    {
        return $this->container['balancePlatform'];
    }

    /**
     * Sets balancePlatform
     *
     * @param string $balancePlatform The unique identifier of the balance platform.
     *
     * @return self
     */
    public function setBalancePlatform($balancePlatform)
    {
        $this->container['balancePlatform'] = $balancePlatform;

        return $this;
    }

    /**
     * Gets bookingDate
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->container['bookingDate'];
    }

    /**
     * Sets bookingDate
     *
     * @param \DateTime $bookingDate The date the transaction was booked into the balance account.
     *
     * @return self
     */
    public function setBookingDate($bookingDate)
    {
        $this->container['bookingDate'] = $bookingDate;

        return $this;
    }

    /**
     * Gets creationDate
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->container['creationDate'];
    }

    /**
     * Sets creationDate
     *
     * @param \DateTime|null $creationDate The date and time when the event was triggered, in ISO 8601 extended format. For example, **2020-12-18T10:15:30+01:00**.
     *
     * @return self
     */
    public function setCreationDate($creationDate)
    {
        $this->container['creationDate'] = $creationDate;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description The `description` from the `/transfers` request.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The unique identifier of the transaction.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets paymentInstrument
     *
     * @return \Adyen\Model\Transfers\PaymentInstrument|null
     */
    public function getPaymentInstrument()
    {
        return $this->container['paymentInstrument'];
    }

    /**
     * Sets paymentInstrument
     *
     * @param \Adyen\Model\Transfers\PaymentInstrument|null $paymentInstrument paymentInstrument
     *
     * @return self
     */
    public function setPaymentInstrument($paymentInstrument)
    {
        $this->container['paymentInstrument'] = $paymentInstrument;

        return $this;
    }

    /**
     * Gets referenceForBeneficiary
     *
     * @return string|null
     */
    public function getReferenceForBeneficiary()
    {
        return $this->container['referenceForBeneficiary'];
    }

    /**
     * Sets referenceForBeneficiary
     *
     * @param string|null $referenceForBeneficiary The reference sent to or received from the counterparty.  * For outgoing funds, this is the [`referenceForBeneficiary`](https://docs.adyen.com/api-explorer/#/transfers/latest/post/transfers__resParam_referenceForBeneficiary) from the  [`/transfers`](https://docs.adyen.com/api-explorer/#/transfers/latest/post/transfers__reqParam_referenceForBeneficiary) request.   * For incoming funds, this is the reference from the sender.
     *
     * @return self
     */
    public function setReferenceForBeneficiary($referenceForBeneficiary)
    {
        $this->container['referenceForBeneficiary'] = $referenceForBeneficiary;

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
     * @param string $status The status of the transaction.   Possible values:  * **pending**: The transaction is still pending.  * **booked**: The transaction has been booked to the balance account.
     *
     * @return self
     */
    public function setStatus($status)
    {
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
     * Gets transfer
     *
     * @return \Adyen\Model\Transfers\TransferView|null
     */
    public function getTransfer()
    {
        return $this->container['transfer'];
    }

    /**
     * Sets transfer
     *
     * @param \Adyen\Model\Transfers\TransferView|null $transfer transfer
     *
     * @return self
     */
    public function setTransfer($transfer)
    {
        $this->container['transfer'] = $transfer;

        return $this;
    }

    /**
     * Gets valueDate
     *
     * @return \DateTime
     */
    public function getValueDate()
    {
        return $this->container['valueDate'];
    }

    /**
     * Sets valueDate
     *
     * @param \DateTime $valueDate The date the transfer amount becomes available in the balance account.
     *
     * @return self
     */
    public function setValueDate($valueDate)
    {
        $this->container['valueDate'] = $valueDate;

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
