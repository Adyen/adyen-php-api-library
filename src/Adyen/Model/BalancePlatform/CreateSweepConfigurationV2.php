<?php

/**
 * Configuration API
 *
 * The version of the OpenAPI document: 2
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\BalancePlatform;

use \ArrayAccess;
use Adyen\Model\BalancePlatform\ObjectSerializer;

/**
 * CreateSweepConfigurationV2 Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateSweepConfigurationV2 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateSweepConfigurationV2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'category' => 'string',
        'counterparty' => '\Adyen\Model\BalancePlatform\SweepCounterparty',
        'currency' => 'string',
        'description' => 'string',
        'priorities' => 'string[]',
        'reason' => 'string',
        'reference' => 'string',
        'referenceForBeneficiary' => 'string',
        'schedule' => '\Adyen\Model\BalancePlatform\SweepSchedule',
        'status' => 'string',
        'sweepAmount' => '\Adyen\Model\BalancePlatform\Amount',
        'targetAmount' => '\Adyen\Model\BalancePlatform\Amount',
        'triggerAmount' => '\Adyen\Model\BalancePlatform\Amount',
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
        'category' => null,
        'counterparty' => null,
        'currency' => null,
        'description' => null,
        'priorities' => null,
        'reason' => null,
        'reference' => null,
        'referenceForBeneficiary' => null,
        'schedule' => null,
        'status' => null,
        'sweepAmount' => null,
        'targetAmount' => null,
        'triggerAmount' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'category' => false,
        'counterparty' => false,
        'currency' => false,
        'description' => false,
        'priorities' => false,
        'reason' => false,
        'reference' => false,
        'referenceForBeneficiary' => false,
        'schedule' => false,
        'status' => false,
        'sweepAmount' => false,
        'targetAmount' => false,
        'triggerAmount' => false,
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
        'category' => 'category',
        'counterparty' => 'counterparty',
        'currency' => 'currency',
        'description' => 'description',
        'priorities' => 'priorities',
        'reason' => 'reason',
        'reference' => 'reference',
        'referenceForBeneficiary' => 'referenceForBeneficiary',
        'schedule' => 'schedule',
        'status' => 'status',
        'sweepAmount' => 'sweepAmount',
        'targetAmount' => 'targetAmount',
        'triggerAmount' => 'triggerAmount',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'category' => 'setCategory',
        'counterparty' => 'setCounterparty',
        'currency' => 'setCurrency',
        'description' => 'setDescription',
        'priorities' => 'setPriorities',
        'reason' => 'setReason',
        'reference' => 'setReference',
        'referenceForBeneficiary' => 'setReferenceForBeneficiary',
        'schedule' => 'setSchedule',
        'status' => 'setStatus',
        'sweepAmount' => 'setSweepAmount',
        'targetAmount' => 'setTargetAmount',
        'triggerAmount' => 'setTriggerAmount',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'category' => 'getCategory',
        'counterparty' => 'getCounterparty',
        'currency' => 'getCurrency',
        'description' => 'getDescription',
        'priorities' => 'getPriorities',
        'reason' => 'getReason',
        'reference' => 'getReference',
        'referenceForBeneficiary' => 'getReferenceForBeneficiary',
        'schedule' => 'getSchedule',
        'status' => 'getStatus',
        'sweepAmount' => 'getSweepAmount',
        'targetAmount' => 'getTargetAmount',
        'triggerAmount' => 'getTriggerAmount',
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

    public const CATEGORY_BANK = 'bank';
    public const CATEGORY_INTERNAL = 'internal';
    public const CATEGORY_PLATFORM_PAYMENT = 'platformPayment';
    public const PRIORITIES_CROSS_BORDER = 'crossBorder';
    public const PRIORITIES_FAST = 'fast';
    public const PRIORITIES_INSTANT = 'instant';
    public const PRIORITIES_INTERNAL = 'internal';
    public const PRIORITIES_REGULAR = 'regular';
    public const PRIORITIES_WIRE = 'wire';
    public const REASON_ACCOUNT_HIERARCHY_NOT_ACTIVE = 'accountHierarchyNotActive';
    public const REASON_AMOUNT_LIMIT_EXCEEDED = 'amountLimitExceeded';
    public const REASON_APPROVED = 'approved';
    public const REASON_BALANCE_ACCOUNT_TEMPORARILY_BLOCKED_BY_TRANSACTION_RULE = 'balanceAccountTemporarilyBlockedByTransactionRule';
    public const REASON_COUNTERPARTY_ACCOUNT_BLOCKED = 'counterpartyAccountBlocked';
    public const REASON_COUNTERPARTY_ACCOUNT_CLOSED = 'counterpartyAccountClosed';
    public const REASON_COUNTERPARTY_ACCOUNT_NOT_FOUND = 'counterpartyAccountNotFound';
    public const REASON_COUNTERPARTY_ADDRESS_REQUIRED = 'counterpartyAddressRequired';
    public const REASON_COUNTERPARTY_BANK_TIMED_OUT = 'counterpartyBankTimedOut';
    public const REASON_COUNTERPARTY_BANK_UNAVAILABLE = 'counterpartyBankUnavailable';
    public const REASON_DECLINED = 'declined';
    public const REASON_DECLINED_BY_TRANSACTION_RULE = 'declinedByTransactionRule';
    public const REASON_DIRECT_DEBIT_NOT_SUPPORTED = 'directDebitNotSupported';
    public const REASON_ERROR = 'error';
    public const REASON_NOT_ENOUGH_BALANCE = 'notEnoughBalance';
    public const REASON_PENDING_APPROVAL = 'pendingApproval';
    public const REASON_PENDING_EXECUTION = 'pendingExecution';
    public const REASON_REFUSED_BY_COUNTERPARTY_BANK = 'refusedByCounterpartyBank';
    public const REASON_REFUSED_BY_CUSTOMER = 'refusedByCustomer';
    public const REASON_ROUTE_NOT_FOUND = 'routeNotFound';
    public const REASON_SCA_FAILED = 'scaFailed';
    public const REASON_TRANSFER_INSTRUMENT_DOES_NOT_EXIST = 'transferInstrumentDoesNotExist';
    public const REASON_UNKNOWN = 'unknown';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const TYPE_PULL = 'pull';
    public const TYPE_PUSH = 'push';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_BANK,
            self::CATEGORY_INTERNAL,
            self::CATEGORY_PLATFORM_PAYMENT,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPrioritiesAllowableValues()
    {
        return [
            self::PRIORITIES_CROSS_BORDER,
            self::PRIORITIES_FAST,
            self::PRIORITIES_INSTANT,
            self::PRIORITIES_INTERNAL,
            self::PRIORITIES_REGULAR,
            self::PRIORITIES_WIRE,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReasonAllowableValues()
    {
        return [
            self::REASON_ACCOUNT_HIERARCHY_NOT_ACTIVE,
            self::REASON_AMOUNT_LIMIT_EXCEEDED,
            self::REASON_APPROVED,
            self::REASON_BALANCE_ACCOUNT_TEMPORARILY_BLOCKED_BY_TRANSACTION_RULE,
            self::REASON_COUNTERPARTY_ACCOUNT_BLOCKED,
            self::REASON_COUNTERPARTY_ACCOUNT_CLOSED,
            self::REASON_COUNTERPARTY_ACCOUNT_NOT_FOUND,
            self::REASON_COUNTERPARTY_ADDRESS_REQUIRED,
            self::REASON_COUNTERPARTY_BANK_TIMED_OUT,
            self::REASON_COUNTERPARTY_BANK_UNAVAILABLE,
            self::REASON_DECLINED,
            self::REASON_DECLINED_BY_TRANSACTION_RULE,
            self::REASON_DIRECT_DEBIT_NOT_SUPPORTED,
            self::REASON_ERROR,
            self::REASON_NOT_ENOUGH_BALANCE,
            self::REASON_PENDING_APPROVAL,
            self::REASON_PENDING_EXECUTION,
            self::REASON_REFUSED_BY_COUNTERPARTY_BANK,
            self::REASON_REFUSED_BY_CUSTOMER,
            self::REASON_ROUTE_NOT_FOUND,
            self::REASON_SCA_FAILED,
            self::REASON_TRANSFER_INSTRUMENT_DOES_NOT_EXIST,
            self::REASON_UNKNOWN,
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
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
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
            self::TYPE_PULL,
            self::TYPE_PUSH,
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
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('counterparty', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('priorities', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('referenceForBeneficiary', $data ?? [], null);
        $this->setIfExists('schedule', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('sweepAmount', $data ?? [], null);
        $this->setIfExists('targetAmount', $data ?? [], null);
        $this->setIfExists('triggerAmount', $data ?? [], null);
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
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        $allowedValues = $this->getReasonAllowableValues();
        if (!is_null($this->container['reason']) && !in_array($this->container['reason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'reason', must be one of '%s'",
                $this->container['reason'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['schedule'] === null) {
            $invalidProperties[] = "'schedule' can't be null";
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
     * @param string|null $category The type of transfer that results from the sweep.  Possible values:   - **bank**: Sweep to a [transfer instrument](https://docs.adyen.com/api-explorer/#/legalentity/latest/post/transferInstruments__resParam_id).  - **internal**: Transfer to another [balance account](https://docs.adyen.com/api-explorer/#/balanceplatform/latest/post/balanceAccounts__resParam_id) within your platform.  Required when setting `priorities`.
     *
     * @return self
     */
    public function setCategory($category)
    {
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
     * @return \Adyen\Model\BalancePlatform\SweepCounterparty
     */
    public function getCounterparty()
    {
        return $this->container['counterparty'];
    }

    /**
     * Sets counterparty
     *
     * @param \Adyen\Model\BalancePlatform\SweepCounterparty $counterparty counterparty
     *
     * @return self
     */
    public function setCounterparty($counterparty)
    {
        $this->container['counterparty'] = $counterparty;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency The three-character [ISO currency code](https://docs.adyen.com/development-resources/currency-codes) in uppercase. For example, **EUR**.  The sweep currency must match any of the [balances currencies](https://docs.adyen.com/api-explorer/#/balanceplatform/latest/get/balanceAccounts/{id}__resParam_balances).
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

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
     * @param string|null $description The message that will be used in the sweep transfer's description body with a maximum length of 140 characters.  If the message is longer after replacing placeholders, the message will be cut off at 140 characters.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets priorities
     *
     * @return string[]|null
     */
    public function getPriorities()
    {
        return $this->container['priorities'];
    }

    /**
     * Sets priorities
     *
     * @param string[]|null $priorities The list of priorities for the bank transfer. This sets the speed at which the transfer is sent and the fees that you have to pay. You can provide multiple priorities. Adyen will try to pay out using the priority you list first. If that's not possible, it moves on to the next option in the order of your provided priorities.  Possible values:  * **regular**: for normal, low-value transactions.  * **fast**: a faster way to transfer funds, but the fees are higher. Recommended for high-priority, low-value transactions.  * **wire**: the fastest way to transfer funds, but this has the highest fees. Recommended for high-priority, high-value transactions.  * **instant**: for instant funds transfers in [SEPA countries](https://www.ecb.europa.eu/paym/integration/retail/sepa/html/index.en.html).  * **crossBorder**: for high-value transfers to a recipient in a different country.  * **internal**: for transfers to an Adyen-issued business bank account (by bank account number/IBAN).  Set `category` to **bank**. For more details, see optional priorities setup for [marketplaces](https://docs.adyen.com/marketplaces/payout-to-users/scheduled-payouts#optional-priorities-setup) or [platforms](https://docs.adyen.com/platforms/payout-to-users/scheduled-payouts#optional-priorities-setup).
     *
     * @return self
     */
    public function setPriorities($priorities)
    {
        $allowedValues = $this->getPrioritiesAllowableValues();
        if (array_diff($priorities, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'priorities', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['priorities'] = $priorities;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string|null $reason The reason for disabling the sweep.
     *
     * @return self
     */
    public function setReason($reason)
    {
        $allowedValues = $this->getReasonAllowableValues();
        if (!in_array($reason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'reason', must be one of '%s'",
                    $reason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['reason'] = $reason;

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
     * @param string|null $reference Your reference for the sweep configuration.
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

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
     * @param string|null $referenceForBeneficiary The reference sent to or received from the counterparty. Only alphanumeric characters are allowed.
     *
     * @return self
     */
    public function setReferenceForBeneficiary($referenceForBeneficiary)
    {
        $this->container['referenceForBeneficiary'] = $referenceForBeneficiary;

        return $this;
    }

    /**
     * Gets schedule
     *
     * @return \Adyen\Model\BalancePlatform\SweepSchedule
     */
    public function getSchedule()
    {
        return $this->container['schedule'];
    }

    /**
     * Sets schedule
     *
     * @param \Adyen\Model\BalancePlatform\SweepSchedule $schedule schedule
     *
     * @return self
     */
    public function setSchedule($schedule)
    {
        $this->container['schedule'] = $schedule;

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
     * @param string|null $status The status of the sweep. If not provided, by default, this is set to **active**.  Possible values:    * **active**:  the sweep is enabled and funds will be pulled in or pushed out based on the defined configuration.    * **inactive**: the sweep is disabled and cannot be triggered.
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
     * Gets sweepAmount
     *
     * @return \Adyen\Model\BalancePlatform\Amount|null
     */
    public function getSweepAmount()
    {
        return $this->container['sweepAmount'];
    }

    /**
     * Sets sweepAmount
     *
     * @param \Adyen\Model\BalancePlatform\Amount|null $sweepAmount sweepAmount
     *
     * @return self
     */
    public function setSweepAmount($sweepAmount)
    {
        $this->container['sweepAmount'] = $sweepAmount;

        return $this;
    }

    /**
     * Gets targetAmount
     *
     * @return \Adyen\Model\BalancePlatform\Amount|null
     */
    public function getTargetAmount()
    {
        return $this->container['targetAmount'];
    }

    /**
     * Sets targetAmount
     *
     * @param \Adyen\Model\BalancePlatform\Amount|null $targetAmount targetAmount
     *
     * @return self
     */
    public function setTargetAmount($targetAmount)
    {
        $this->container['targetAmount'] = $targetAmount;

        return $this;
    }

    /**
     * Gets triggerAmount
     *
     * @return \Adyen\Model\BalancePlatform\Amount|null
     */
    public function getTriggerAmount()
    {
        return $this->container['triggerAmount'];
    }

    /**
     * Sets triggerAmount
     *
     * @param \Adyen\Model\BalancePlatform\Amount|null $triggerAmount triggerAmount
     *
     * @return self
     */
    public function setTriggerAmount($triggerAmount)
    {
        $this->container['triggerAmount'] = $triggerAmount;

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
     * @param string|null $type The direction of sweep, whether pushing out or pulling in funds to the balance account. If not provided, by default, this is set to **push**.  Possible values:   * **push**: _push out funds_ to a destination balance account or transfer instrument.   * **pull**: _pull in funds_ from a source merchant account, transfer instrument, or balance account.
     *
     * @return self
     */
    public function setType($type)
    {
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
