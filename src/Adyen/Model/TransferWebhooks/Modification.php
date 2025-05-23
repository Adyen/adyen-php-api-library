<?php

/**
 * Transfer webhooks
 *
 * The version of the OpenAPI document: 4
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\TransferWebhooks;

use \ArrayAccess;
use Adyen\Model\TransferWebhooks\ObjectSerializer;

/**
 * Modification Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class Modification implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Modification';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'direction' => 'string',
        'id' => 'string',
        'reference' => 'string',
        'status' => 'string',
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
        'direction' => null,
        'id' => null,
        'reference' => null,
        'status' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'direction' => false,
        'id' => false,
        'reference' => false,
        'status' => false,
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
        'direction' => 'direction',
        'id' => 'id',
        'reference' => 'reference',
        'status' => 'status',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'direction' => 'setDirection',
        'id' => 'setId',
        'reference' => 'setReference',
        'status' => 'setStatus',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'direction' => 'getDirection',
        'id' => 'getId',
        'reference' => 'getReference',
        'status' => 'getStatus',
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

    public const STATUS_APPROVAL_PENDING = 'approvalPending';
    public const STATUS_ATM_WITHDRAWAL = 'atmWithdrawal';
    public const STATUS_ATM_WITHDRAWAL_REVERSAL_PENDING = 'atmWithdrawalReversalPending';
    public const STATUS_ATM_WITHDRAWAL_REVERSED = 'atmWithdrawalReversed';
    public const STATUS_AUTH_ADJUSTMENT_AUTHORISED = 'authAdjustmentAuthorised';
    public const STATUS_AUTH_ADJUSTMENT_ERROR = 'authAdjustmentError';
    public const STATUS_AUTH_ADJUSTMENT_REFUSED = 'authAdjustmentRefused';
    public const STATUS_AUTHORISED = 'authorised';
    public const STATUS_BANK_TRANSFER = 'bankTransfer';
    public const STATUS_BANK_TRANSFER_PENDING = 'bankTransferPending';
    public const STATUS_BOOKED = 'booked';
    public const STATUS_BOOKING_PENDING = 'bookingPending';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_CAPTURE_PENDING = 'capturePending';
    public const STATUS_CAPTURE_REVERSAL_PENDING = 'captureReversalPending';
    public const STATUS_CAPTURE_REVERSED = 'captureReversed';
    public const STATUS_CAPTURED = 'captured';
    public const STATUS_CAPTURED_EXTERNALLY = 'capturedExternally';
    public const STATUS_CHARGEBACK = 'chargeback';
    public const STATUS_CHARGEBACK_EXTERNALLY = 'chargebackExternally';
    public const STATUS_CHARGEBACK_PENDING = 'chargebackPending';
    public const STATUS_CHARGEBACK_REVERSAL_PENDING = 'chargebackReversalPending';
    public const STATUS_CHARGEBACK_REVERSED = 'chargebackReversed';
    public const STATUS_CREDITED = 'credited';
    public const STATUS_DEPOSIT_CORRECTION = 'depositCorrection';
    public const STATUS_DEPOSIT_CORRECTION_PENDING = 'depositCorrectionPending';
    public const STATUS_DISPUTE = 'dispute';
    public const STATUS_DISPUTE_CLOSED = 'disputeClosed';
    public const STATUS_DISPUTE_EXPIRED = 'disputeExpired';
    public const STATUS_DISPUTE_NEEDS_REVIEW = 'disputeNeedsReview';
    public const STATUS_ERROR = 'error';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_FAILED = 'failed';
    public const STATUS_FEE = 'fee';
    public const STATUS_FEE_PENDING = 'feePending';
    public const STATUS_INTERNAL_TRANSFER = 'internalTransfer';
    public const STATUS_INTERNAL_TRANSFER_PENDING = 'internalTransferPending';
    public const STATUS_INVOICE_DEDUCTION = 'invoiceDeduction';
    public const STATUS_INVOICE_DEDUCTION_PENDING = 'invoiceDeductionPending';
    public const STATUS_MANUAL_CORRECTION_PENDING = 'manualCorrectionPending';
    public const STATUS_MANUALLY_CORRECTED = 'manuallyCorrected';
    public const STATUS_MATCHED_STATEMENT = 'matchedStatement';
    public const STATUS_MATCHED_STATEMENT_PENDING = 'matchedStatementPending';
    public const STATUS_MERCHANT_PAYIN = 'merchantPayin';
    public const STATUS_MERCHANT_PAYIN_PENDING = 'merchantPayinPending';
    public const STATUS_MERCHANT_PAYIN_REVERSED = 'merchantPayinReversed';
    public const STATUS_MERCHANT_PAYIN_REVERSED_PENDING = 'merchantPayinReversedPending';
    public const STATUS_MISC_COST = 'miscCost';
    public const STATUS_MISC_COST_PENDING = 'miscCostPending';
    public const STATUS_PAYMENT_COST = 'paymentCost';
    public const STATUS_PAYMENT_COST_PENDING = 'paymentCostPending';
    public const STATUS_PENDING_APPROVAL = 'pendingApproval';
    public const STATUS_PENDING_EXECUTION = 'pendingExecution';
    public const STATUS_RECEIVED = 'received';
    public const STATUS_REFUND_PENDING = 'refundPending';
    public const STATUS_REFUND_REVERSAL_PENDING = 'refundReversalPending';
    public const STATUS_REFUND_REVERSED = 'refundReversed';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_REFUNDED_EXTERNALLY = 'refundedExternally';
    public const STATUS_REFUSED = 'refused';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_RESERVE_ADJUSTMENT = 'reserveAdjustment';
    public const STATUS_RESERVE_ADJUSTMENT_PENDING = 'reserveAdjustmentPending';
    public const STATUS_RETURNED = 'returned';
    public const STATUS_SECOND_CHARGEBACK = 'secondChargeback';
    public const STATUS_SECOND_CHARGEBACK_PENDING = 'secondChargebackPending';
    public const STATUS_UNDEFINED = 'undefined';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_APPROVAL_PENDING,
            self::STATUS_ATM_WITHDRAWAL,
            self::STATUS_ATM_WITHDRAWAL_REVERSAL_PENDING,
            self::STATUS_ATM_WITHDRAWAL_REVERSED,
            self::STATUS_AUTH_ADJUSTMENT_AUTHORISED,
            self::STATUS_AUTH_ADJUSTMENT_ERROR,
            self::STATUS_AUTH_ADJUSTMENT_REFUSED,
            self::STATUS_AUTHORISED,
            self::STATUS_BANK_TRANSFER,
            self::STATUS_BANK_TRANSFER_PENDING,
            self::STATUS_BOOKED,
            self::STATUS_BOOKING_PENDING,
            self::STATUS_CANCELLED,
            self::STATUS_CAPTURE_PENDING,
            self::STATUS_CAPTURE_REVERSAL_PENDING,
            self::STATUS_CAPTURE_REVERSED,
            self::STATUS_CAPTURED,
            self::STATUS_CAPTURED_EXTERNALLY,
            self::STATUS_CHARGEBACK,
            self::STATUS_CHARGEBACK_EXTERNALLY,
            self::STATUS_CHARGEBACK_PENDING,
            self::STATUS_CHARGEBACK_REVERSAL_PENDING,
            self::STATUS_CHARGEBACK_REVERSED,
            self::STATUS_CREDITED,
            self::STATUS_DEPOSIT_CORRECTION,
            self::STATUS_DEPOSIT_CORRECTION_PENDING,
            self::STATUS_DISPUTE,
            self::STATUS_DISPUTE_CLOSED,
            self::STATUS_DISPUTE_EXPIRED,
            self::STATUS_DISPUTE_NEEDS_REVIEW,
            self::STATUS_ERROR,
            self::STATUS_EXPIRED,
            self::STATUS_FAILED,
            self::STATUS_FEE,
            self::STATUS_FEE_PENDING,
            self::STATUS_INTERNAL_TRANSFER,
            self::STATUS_INTERNAL_TRANSFER_PENDING,
            self::STATUS_INVOICE_DEDUCTION,
            self::STATUS_INVOICE_DEDUCTION_PENDING,
            self::STATUS_MANUAL_CORRECTION_PENDING,
            self::STATUS_MANUALLY_CORRECTED,
            self::STATUS_MATCHED_STATEMENT,
            self::STATUS_MATCHED_STATEMENT_PENDING,
            self::STATUS_MERCHANT_PAYIN,
            self::STATUS_MERCHANT_PAYIN_PENDING,
            self::STATUS_MERCHANT_PAYIN_REVERSED,
            self::STATUS_MERCHANT_PAYIN_REVERSED_PENDING,
            self::STATUS_MISC_COST,
            self::STATUS_MISC_COST_PENDING,
            self::STATUS_PAYMENT_COST,
            self::STATUS_PAYMENT_COST_PENDING,
            self::STATUS_PENDING_APPROVAL,
            self::STATUS_PENDING_EXECUTION,
            self::STATUS_RECEIVED,
            self::STATUS_REFUND_PENDING,
            self::STATUS_REFUND_REVERSAL_PENDING,
            self::STATUS_REFUND_REVERSED,
            self::STATUS_REFUNDED,
            self::STATUS_REFUNDED_EXTERNALLY,
            self::STATUS_REFUSED,
            self::STATUS_REJECTED,
            self::STATUS_RESERVE_ADJUSTMENT,
            self::STATUS_RESERVE_ADJUSTMENT_PENDING,
            self::STATUS_RETURNED,
            self::STATUS_SECOND_CHARGEBACK,
            self::STATUS_SECOND_CHARGEBACK_PENDING,
            self::STATUS_UNDEFINED,
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
        $this->setIfExists('direction', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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
     * Gets direction
     *
     * @return string|null
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction
     *
     * @param string|null $direction The direction of the money movement.
     *
     * @return self
     */
    public function setDirection($direction)
    {
        $this->container['direction'] = $direction;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id Our reference for the modification.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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
     * @param string|null $reference Your reference for the modification, used internally within your platform.
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the transfer event.
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
     * @param string|null $type The type of transfer modification.
     *
     * @return self
     */
    public function setType($type)
    {
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
