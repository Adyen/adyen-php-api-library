<?php

/**
 * Transfers API
 *
 * The version of the OpenAPI document: 3
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
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
        'account_holder_id' => 'string',
        'amount' => '\Adyen\Model\Transfers\Amount',
        'balance_account_id' => 'string',
        'balance_platform' => 'string',
        'booking_date' => '\DateTime',
        'category' => 'string',
        'counterparty' => '\Adyen\Model\Transfers\CounterpartyV3',
        'created_at' => '\DateTime',
        'description' => 'string',
        'id' => 'string',
        'instructed_amount' => '\Adyen\Model\Transfers\Amount',
        'payment_instrument_id' => 'string',
        'reference' => 'string',
        'reference_for_beneficiary' => 'string',
        'status' => 'string',
        'transfer_id' => 'string',
        'type' => 'string',
        'value_date' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account_holder_id' => null,
        'amount' => null,
        'balance_account_id' => null,
        'balance_platform' => null,
        'booking_date' => 'date-time',
        'category' => null,
        'counterparty' => null,
        'created_at' => 'date-time',
        'description' => null,
        'id' => null,
        'instructed_amount' => null,
        'payment_instrument_id' => null,
        'reference' => null,
        'reference_for_beneficiary' => null,
        'status' => null,
        'transfer_id' => null,
        'type' => null,
        'value_date' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'account_holder_id' => false,
        'amount' => false,
        'balance_account_id' => false,
        'balance_platform' => false,
        'booking_date' => false,
        'category' => false,
        'counterparty' => false,
        'created_at' => false,
        'description' => false,
        'id' => false,
        'instructed_amount' => false,
        'payment_instrument_id' => false,
        'reference' => false,
        'reference_for_beneficiary' => false,
        'status' => false,
        'transfer_id' => false,
        'type' => false,
        'value_date' => false
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
        'account_holder_id' => 'accountHolderId',
        'amount' => 'amount',
        'balance_account_id' => 'balanceAccountId',
        'balance_platform' => 'balancePlatform',
        'booking_date' => 'bookingDate',
        'category' => 'category',
        'counterparty' => 'counterparty',
        'created_at' => 'createdAt',
        'description' => 'description',
        'id' => 'id',
        'instructed_amount' => 'instructedAmount',
        'payment_instrument_id' => 'paymentInstrumentId',
        'reference' => 'reference',
        'reference_for_beneficiary' => 'referenceForBeneficiary',
        'status' => 'status',
        'transfer_id' => 'transferId',
        'type' => 'type',
        'value_date' => 'valueDate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_holder_id' => 'setAccountHolderId',
        'amount' => 'setAmount',
        'balance_account_id' => 'setBalanceAccountId',
        'balance_platform' => 'setBalancePlatform',
        'booking_date' => 'setBookingDate',
        'category' => 'setCategory',
        'counterparty' => 'setCounterparty',
        'created_at' => 'setCreatedAt',
        'description' => 'setDescription',
        'id' => 'setId',
        'instructed_amount' => 'setInstructedAmount',
        'payment_instrument_id' => 'setPaymentInstrumentId',
        'reference' => 'setReference',
        'reference_for_beneficiary' => 'setReferenceForBeneficiary',
        'status' => 'setStatus',
        'transfer_id' => 'setTransferId',
        'type' => 'setType',
        'value_date' => 'setValueDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_holder_id' => 'getAccountHolderId',
        'amount' => 'getAmount',
        'balance_account_id' => 'getBalanceAccountId',
        'balance_platform' => 'getBalancePlatform',
        'booking_date' => 'getBookingDate',
        'category' => 'getCategory',
        'counterparty' => 'getCounterparty',
        'created_at' => 'getCreatedAt',
        'description' => 'getDescription',
        'id' => 'getId',
        'instructed_amount' => 'getInstructedAmount',
        'payment_instrument_id' => 'getPaymentInstrumentId',
        'reference' => 'getReference',
        'reference_for_beneficiary' => 'getReferenceForBeneficiary',
        'status' => 'getStatus',
        'transfer_id' => 'getTransferId',
        'type' => 'getType',
        'value_date' => 'getValueDate'
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

    public const CATEGORY_BANK = 'bank';
    public const CATEGORY_GRANTS = 'grants';
    public const CATEGORY_INTERNAL = 'internal';
    public const CATEGORY_ISSUED_CARD = 'issuedCard';
    public const CATEGORY_PLATFORM_PAYMENT = 'platformPayment';
    public const STATUS_BOOKED = 'booked';
    public const STATUS_PENDING = 'pending';
    public const TYPE_ATM_WITHDRAWAL = 'atmWithdrawal';
    public const TYPE_ATM_WITHDRAWAL_REVERSAL = 'atmWithdrawalReversal';
    public const TYPE_BALANCE_ADJUSTMENT = 'balanceAdjustment';
    public const TYPE_BALANCE_ROLLOVER = 'balanceRollover';
    public const TYPE_BANK_TRANSFER = 'bankTransfer';
    public const TYPE_CAPTURE = 'capture';
    public const TYPE_CAPTURE_REVERSAL = 'captureReversal';
    public const TYPE_CHARGEBACK = 'chargeback';
    public const TYPE_CHARGEBACK_REVERSAL = 'chargebackReversal';
    public const TYPE_DEPOSIT_CORRECTION = 'depositCorrection';
    public const TYPE_FEE = 'fee';
    public const TYPE_GRANT = 'grant';
    public const TYPE_INSTALLMENT = 'installment';
    public const TYPE_INSTALLMENT_REVERSAL = 'installmentReversal';
    public const TYPE_INTERNAL_TRANSFER = 'internalTransfer';
    public const TYPE_INVOICE_DEDUCTION = 'invoiceDeduction';
    public const TYPE_LEFTOVER = 'leftover';
    public const TYPE_MANUAL_CORRECTION = 'manualCorrection';
    public const TYPE_MISC_COST = 'miscCost';
    public const TYPE_PAYMENT = 'payment';
    public const TYPE_PAYMENT_COST = 'paymentCost';
    public const TYPE_REFUND = 'refund';
    public const TYPE_REFUND_REVERSAL = 'refundReversal';
    public const TYPE_REPAYMENT = 'repayment';
    public const TYPE_RESERVE_ADJUSTMENT = 'reserveAdjustment';
    public const TYPE_SECOND_CHARGEBACK = 'secondChargeback';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_BANK,
            self::CATEGORY_GRANTS,
            self::CATEGORY_INTERNAL,
            self::CATEGORY_ISSUED_CARD,
            self::CATEGORY_PLATFORM_PAYMENT,
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
            self::STATUS_BOOKED,
            self::STATUS_PENDING,
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
            self::TYPE_ATM_WITHDRAWAL,
            self::TYPE_ATM_WITHDRAWAL_REVERSAL,
            self::TYPE_BALANCE_ADJUSTMENT,
            self::TYPE_BALANCE_ROLLOVER,
            self::TYPE_BANK_TRANSFER,
            self::TYPE_CAPTURE,
            self::TYPE_CAPTURE_REVERSAL,
            self::TYPE_CHARGEBACK,
            self::TYPE_CHARGEBACK_REVERSAL,
            self::TYPE_DEPOSIT_CORRECTION,
            self::TYPE_FEE,
            self::TYPE_GRANT,
            self::TYPE_INSTALLMENT,
            self::TYPE_INSTALLMENT_REVERSAL,
            self::TYPE_INTERNAL_TRANSFER,
            self::TYPE_INVOICE_DEDUCTION,
            self::TYPE_LEFTOVER,
            self::TYPE_MANUAL_CORRECTION,
            self::TYPE_MISC_COST,
            self::TYPE_PAYMENT,
            self::TYPE_PAYMENT_COST,
            self::TYPE_REFUND,
            self::TYPE_REFUND_REVERSAL,
            self::TYPE_REPAYMENT,
            self::TYPE_RESERVE_ADJUSTMENT,
            self::TYPE_SECOND_CHARGEBACK,
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
        $this->setIfExists('account_holder_id', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('balance_account_id', $data ?? [], null);
        $this->setIfExists('balance_platform', $data ?? [], null);
        $this->setIfExists('booking_date', $data ?? [], null);
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('counterparty', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('instructed_amount', $data ?? [], null);
        $this->setIfExists('payment_instrument_id', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('reference_for_beneficiary', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('transfer_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('value_date', $data ?? [], null);
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

        if ($this->container['account_holder_id'] === null) {
            $invalidProperties[] = "'account_holder_id' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['balance_account_id'] === null) {
            $invalidProperties[] = "'balance_account_id' can't be null";
        }
        if ($this->container['balance_platform'] === null) {
            $invalidProperties[] = "'balance_platform' can't be null";
        }
        if ($this->container['booking_date'] === null) {
            $invalidProperties[] = "'booking_date' can't be null";
        }
        $allowedValues = $this->getCategoryAllowableValues();
        if (!is_null($this->container['category']) && !in_array($this->container['category'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'category', must be one of '%s'",
                $this->container['category'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['counterparty'] === null) {
            $invalidProperties[] = "'counterparty' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
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

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['value_date'] === null) {
            $invalidProperties[] = "'value_date' can't be null";
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
     * Gets account_holder_id
     *
     * @return string
     */
    public function getAccountHolderId()
    {
        return $this->container['account_holder_id'];
    }

    /**
     * Sets account_holder_id
     *
     * @param string $account_holder_id Unique identifier of the account holder.
     *
     * @return self
     */
    public function setAccountHolderId($account_holder_id)
    {
        if (is_null($account_holder_id)) {
            throw new \InvalidArgumentException('non-nullable account_holder_id cannot be null');
        }
        $this->container['account_holder_id'] = $account_holder_id;

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
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets balance_account_id
     *
     * @return string
     */
    public function getBalanceAccountId()
    {
        return $this->container['balance_account_id'];
    }

    /**
     * Sets balance_account_id
     *
     * @param string $balance_account_id Unique identifier of the balance account.
     *
     * @return self
     */
    public function setBalanceAccountId($balance_account_id)
    {
        if (is_null($balance_account_id)) {
            throw new \InvalidArgumentException('non-nullable balance_account_id cannot be null');
        }
        $this->container['balance_account_id'] = $balance_account_id;

        return $this;
    }

    /**
     * Gets balance_platform
     *
     * @return string
     */
    public function getBalancePlatform()
    {
        return $this->container['balance_platform'];
    }

    /**
     * Sets balance_platform
     *
     * @param string $balance_platform Unique identifier of the balance platform.
     *
     * @return self
     */
    public function setBalancePlatform($balance_platform)
    {
        if (is_null($balance_platform)) {
            throw new \InvalidArgumentException('non-nullable balance_platform cannot be null');
        }
        $this->container['balance_platform'] = $balance_platform;

        return $this;
    }

    /**
     * Gets booking_date
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->container['booking_date'];
    }

    /**
     * Sets booking_date
     *
     * @param \DateTime $booking_date The date the transaction was booked to the balance account.
     *
     * @return self
     */
    public function setBookingDate($booking_date)
    {
        if (is_null($booking_date)) {
            throw new \InvalidArgumentException('non-nullable booking_date cannot be null');
        }
        $this->container['booking_date'] = $booking_date;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string|null $category The category of the transaction indicating the type of activity.   Possible values:  * **platformPayment**: The transaction is a payment or payment modification made with an Adyen merchant account.  * **internal**: The transaction resulted from an internal adjustment such as a deposit correction or invoice deduction.  * **bank**: The transaction is a bank-related activity, such as sending a payout or receiving funds.  * **issuedCard**: The transaction is a card-related activity, such as using an Adyen-issued card to pay online.
     *
     * @return self
     */
    public function setCategory($category)
    {
        if (is_null($category)) {
            throw new \InvalidArgumentException('non-nullable category cannot be null');
        }
        $allowedValues = $this->getCategoryAllowableValues();
        if (!in_array($category, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'category', must be one of '%s'",
                    $category,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets counterparty
     *
     * @return \Adyen\Model\Transfers\CounterpartyV3
     */
    public function getCounterparty()
    {
        return $this->container['counterparty'];
    }

    /**
     * Sets counterparty
     *
     * @param \Adyen\Model\Transfers\CounterpartyV3 $counterparty counterparty
     *
     * @return self
     */
    public function setCounterparty($counterparty)
    {
        if (is_null($counterparty)) {
            throw new \InvalidArgumentException('non-nullable counterparty cannot be null');
        }
        $this->container['counterparty'] = $counterparty;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at The date the transaction was created.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

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
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
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
     * @param string $id Unique identifier of the transaction.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets instructed_amount
     *
     * @return \Adyen\Model\Transfers\Amount|null
     */
    public function getInstructedAmount()
    {
        return $this->container['instructed_amount'];
    }

    /**
     * Sets instructed_amount
     *
     * @param \Adyen\Model\Transfers\Amount|null $instructed_amount instructed_amount
     *
     * @return self
     */
    public function setInstructedAmount($instructed_amount)
    {
        if (is_null($instructed_amount)) {
            throw new \InvalidArgumentException('non-nullable instructed_amount cannot be null');
        }
        $this->container['instructed_amount'] = $instructed_amount;

        return $this;
    }

    /**
     * Gets payment_instrument_id
     *
     * @return string|null
     */
    public function getPaymentInstrumentId()
    {
        return $this->container['payment_instrument_id'];
    }

    /**
     * Sets payment_instrument_id
     *
     * @param string|null $payment_instrument_id Unique identifier of the payment instrument that was used for the transaction.
     *
     * @return self
     */
    public function setPaymentInstrumentId($payment_instrument_id)
    {
        if (is_null($payment_instrument_id)) {
            throw new \InvalidArgumentException('non-nullable payment_instrument_id cannot be null');
        }
        $this->container['payment_instrument_id'] = $payment_instrument_id;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference The [`reference`](https://docs.adyen.com/api-explorer/#/transfers/latest/post/transfers__reqParam_reference) from the `/transfers` request. If you haven't provided any, Adyen generates a unique reference.
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
     * Gets reference_for_beneficiary
     *
     * @return string|null
     */
    public function getReferenceForBeneficiary()
    {
        return $this->container['reference_for_beneficiary'];
    }

    /**
     * Sets reference_for_beneficiary
     *
     * @param string|null $reference_for_beneficiary The reference sent to or received from the counterparty.  * For outgoing funds, this is the [`referenceForBeneficiary`](https://docs.adyen.com/api-explorer/#/transfers/latest/post/transfers__resParam_referenceForBeneficiary) from the  [`/transfers`](https://docs.adyen.com/api-explorer/#/transfers/latest/post/transfers__reqParam_referenceForBeneficiary) request.   * For incoming funds, this is the reference from the sender.
     *
     * @return self
     */
    public function setReferenceForBeneficiary($reference_for_beneficiary)
    {
        if (is_null($reference_for_beneficiary)) {
            throw new \InvalidArgumentException('non-nullable reference_for_beneficiary cannot be null');
        }
        $this->container['reference_for_beneficiary'] = $reference_for_beneficiary;

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
     * Gets transfer_id
     *
     * @return string|null
     */
    public function getTransferId()
    {
        return $this->container['transfer_id'];
    }

    /**
     * Sets transfer_id
     *
     * @param string|null $transfer_id Unique identifier of the related transfer.
     *
     * @return self
     */
    public function setTransferId($transfer_id)
    {
        if (is_null($transfer_id)) {
            throw new \InvalidArgumentException('non-nullable transfer_id cannot be null');
        }
        $this->container['transfer_id'] = $transfer_id;

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
     * @param string|null $type The type of the transaction.   Possible values: **payment**, **capture**, **captureReversal**, **refund** **refundReversal**, **chargeback**, **chargebackReversal**, **secondChargeback**, **atmWithdrawal**, **atmWithdrawalReversal**, **internalTransfer**, **manualCorrection**, **invoiceDeduction**, **depositCorrection**, **bankTransfer**, **miscCost**, **paymentCost**, **fee**
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
     * Gets value_date
     *
     * @return \DateTime
     */
    public function getValueDate()
    {
        return $this->container['value_date'];
    }

    /**
     * Sets value_date
     *
     * @param \DateTime $value_date The date the transfer amount becomes available in the balance account.
     *
     * @return self
     */
    public function setValueDate($value_date)
    {
        if (is_null($value_date)) {
            throw new \InvalidArgumentException('non-nullable value_date cannot be null');
        }
        $this->container['value_date'] = $value_date;

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
