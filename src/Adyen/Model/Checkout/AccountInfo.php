<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 70
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
 * AccountInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AccountInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AccountInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountAgeIndicator' => 'string',
        'accountChangeDate' => '\DateTime',
        'accountChangeIndicator' => 'string',
        'accountCreationDate' => '\DateTime',
        'accountType' => 'string',
        'addCardAttemptsDay' => 'int',
        'deliveryAddressUsageDate' => '\DateTime',
        'deliveryAddressUsageIndicator' => 'string',
        'homePhone' => 'string',
        'mobilePhone' => 'string',
        'passwordChangeDate' => '\DateTime',
        'passwordChangeIndicator' => 'string',
        'pastTransactionsDay' => 'int',
        'pastTransactionsYear' => 'int',
        'paymentAccountAge' => '\DateTime',
        'paymentAccountIndicator' => 'string',
        'purchasesLast6Months' => 'int',
        'suspiciousActivity' => 'bool',
        'workPhone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountAgeIndicator' => null,
        'accountChangeDate' => 'date-time',
        'accountChangeIndicator' => null,
        'accountCreationDate' => 'date-time',
        'accountType' => null,
        'addCardAttemptsDay' => 'int32',
        'deliveryAddressUsageDate' => 'date-time',
        'deliveryAddressUsageIndicator' => null,
        'homePhone' => null,
        'mobilePhone' => null,
        'passwordChangeDate' => 'date-time',
        'passwordChangeIndicator' => null,
        'pastTransactionsDay' => 'int32',
        'pastTransactionsYear' => 'int32',
        'paymentAccountAge' => 'date-time',
        'paymentAccountIndicator' => null,
        'purchasesLast6Months' => 'int32',
        'suspiciousActivity' => null,
        'workPhone' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'accountAgeIndicator' => false,
        'accountChangeDate' => false,
        'accountChangeIndicator' => false,
        'accountCreationDate' => false,
        'accountType' => false,
        'addCardAttemptsDay' => true,
        'deliveryAddressUsageDate' => false,
        'deliveryAddressUsageIndicator' => false,
        'homePhone' => false,
        'mobilePhone' => false,
        'passwordChangeDate' => false,
        'passwordChangeIndicator' => false,
        'pastTransactionsDay' => true,
        'pastTransactionsYear' => true,
        'paymentAccountAge' => false,
        'paymentAccountIndicator' => false,
        'purchasesLast6Months' => true,
        'suspiciousActivity' => false,
        'workPhone' => false
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
        'accountAgeIndicator' => 'accountAgeIndicator',
        'accountChangeDate' => 'accountChangeDate',
        'accountChangeIndicator' => 'accountChangeIndicator',
        'accountCreationDate' => 'accountCreationDate',
        'accountType' => 'accountType',
        'addCardAttemptsDay' => 'addCardAttemptsDay',
        'deliveryAddressUsageDate' => 'deliveryAddressUsageDate',
        'deliveryAddressUsageIndicator' => 'deliveryAddressUsageIndicator',
        'homePhone' => 'homePhone',
        'mobilePhone' => 'mobilePhone',
        'passwordChangeDate' => 'passwordChangeDate',
        'passwordChangeIndicator' => 'passwordChangeIndicator',
        'pastTransactionsDay' => 'pastTransactionsDay',
        'pastTransactionsYear' => 'pastTransactionsYear',
        'paymentAccountAge' => 'paymentAccountAge',
        'paymentAccountIndicator' => 'paymentAccountIndicator',
        'purchasesLast6Months' => 'purchasesLast6Months',
        'suspiciousActivity' => 'suspiciousActivity',
        'workPhone' => 'workPhone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountAgeIndicator' => 'setAccountAgeIndicator',
        'accountChangeDate' => 'setAccountChangeDate',
        'accountChangeIndicator' => 'setAccountChangeIndicator',
        'accountCreationDate' => 'setAccountCreationDate',
        'accountType' => 'setAccountType',
        'addCardAttemptsDay' => 'setAddCardAttemptsDay',
        'deliveryAddressUsageDate' => 'setDeliveryAddressUsageDate',
        'deliveryAddressUsageIndicator' => 'setDeliveryAddressUsageIndicator',
        'homePhone' => 'setHomePhone',
        'mobilePhone' => 'setMobilePhone',
        'passwordChangeDate' => 'setPasswordChangeDate',
        'passwordChangeIndicator' => 'setPasswordChangeIndicator',
        'pastTransactionsDay' => 'setPastTransactionsDay',
        'pastTransactionsYear' => 'setPastTransactionsYear',
        'paymentAccountAge' => 'setPaymentAccountAge',
        'paymentAccountIndicator' => 'setPaymentAccountIndicator',
        'purchasesLast6Months' => 'setPurchasesLast6Months',
        'suspiciousActivity' => 'setSuspiciousActivity',
        'workPhone' => 'setWorkPhone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountAgeIndicator' => 'getAccountAgeIndicator',
        'accountChangeDate' => 'getAccountChangeDate',
        'accountChangeIndicator' => 'getAccountChangeIndicator',
        'accountCreationDate' => 'getAccountCreationDate',
        'accountType' => 'getAccountType',
        'addCardAttemptsDay' => 'getAddCardAttemptsDay',
        'deliveryAddressUsageDate' => 'getDeliveryAddressUsageDate',
        'deliveryAddressUsageIndicator' => 'getDeliveryAddressUsageIndicator',
        'homePhone' => 'getHomePhone',
        'mobilePhone' => 'getMobilePhone',
        'passwordChangeDate' => 'getPasswordChangeDate',
        'passwordChangeIndicator' => 'getPasswordChangeIndicator',
        'pastTransactionsDay' => 'getPastTransactionsDay',
        'pastTransactionsYear' => 'getPastTransactionsYear',
        'paymentAccountAge' => 'getPaymentAccountAge',
        'paymentAccountIndicator' => 'getPaymentAccountIndicator',
        'purchasesLast6Months' => 'getPurchasesLast6Months',
        'suspiciousActivity' => 'getSuspiciousActivity',
        'workPhone' => 'getWorkPhone'
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

    public const ACCOUNT_AGE_INDICATOR_NOT_APPLICABLE = 'notApplicable';
    public const ACCOUNT_AGE_INDICATOR_THIS_TRANSACTION = 'thisTransaction';
    public const ACCOUNT_AGE_INDICATOR_LESS_THAN30_DAYS = 'lessThan30Days';
    public const ACCOUNT_AGE_INDICATOR_FROM30_TO60_DAYS = 'from30To60Days';
    public const ACCOUNT_AGE_INDICATOR_MORE_THAN60_DAYS = 'moreThan60Days';
    public const ACCOUNT_CHANGE_INDICATOR_THIS_TRANSACTION = 'thisTransaction';
    public const ACCOUNT_CHANGE_INDICATOR_LESS_THAN30_DAYS = 'lessThan30Days';
    public const ACCOUNT_CHANGE_INDICATOR_FROM30_TO60_DAYS = 'from30To60Days';
    public const ACCOUNT_CHANGE_INDICATOR_MORE_THAN60_DAYS = 'moreThan60Days';
    public const ACCOUNT_TYPE_NOT_APPLICABLE = 'notApplicable';
    public const ACCOUNT_TYPE_CREDIT = 'credit';
    public const ACCOUNT_TYPE_DEBIT = 'debit';
    public const DELIVERY_ADDRESS_USAGE_INDICATOR_THIS_TRANSACTION = 'thisTransaction';
    public const DELIVERY_ADDRESS_USAGE_INDICATOR_LESS_THAN30_DAYS = 'lessThan30Days';
    public const DELIVERY_ADDRESS_USAGE_INDICATOR_FROM30_TO60_DAYS = 'from30To60Days';
    public const DELIVERY_ADDRESS_USAGE_INDICATOR_MORE_THAN60_DAYS = 'moreThan60Days';
    public const PASSWORD_CHANGE_INDICATOR_NOT_APPLICABLE = 'notApplicable';
    public const PASSWORD_CHANGE_INDICATOR_THIS_TRANSACTION = 'thisTransaction';
    public const PASSWORD_CHANGE_INDICATOR_LESS_THAN30_DAYS = 'lessThan30Days';
    public const PASSWORD_CHANGE_INDICATOR_FROM30_TO60_DAYS = 'from30To60Days';
    public const PASSWORD_CHANGE_INDICATOR_MORE_THAN60_DAYS = 'moreThan60Days';
    public const PAYMENT_ACCOUNT_INDICATOR_NOT_APPLICABLE = 'notApplicable';
    public const PAYMENT_ACCOUNT_INDICATOR_THIS_TRANSACTION = 'thisTransaction';
    public const PAYMENT_ACCOUNT_INDICATOR_LESS_THAN30_DAYS = 'lessThan30Days';
    public const PAYMENT_ACCOUNT_INDICATOR_FROM30_TO60_DAYS = 'from30To60Days';
    public const PAYMENT_ACCOUNT_INDICATOR_MORE_THAN60_DAYS = 'moreThan60Days';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAccountAgeIndicatorAllowableValues()
    {
        return [
            self::ACCOUNT_AGE_INDICATOR_NOT_APPLICABLE,
            self::ACCOUNT_AGE_INDICATOR_THIS_TRANSACTION,
            self::ACCOUNT_AGE_INDICATOR_LESS_THAN30_DAYS,
            self::ACCOUNT_AGE_INDICATOR_FROM30_TO60_DAYS,
            self::ACCOUNT_AGE_INDICATOR_MORE_THAN60_DAYS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAccountChangeIndicatorAllowableValues()
    {
        return [
            self::ACCOUNT_CHANGE_INDICATOR_THIS_TRANSACTION,
            self::ACCOUNT_CHANGE_INDICATOR_LESS_THAN30_DAYS,
            self::ACCOUNT_CHANGE_INDICATOR_FROM30_TO60_DAYS,
            self::ACCOUNT_CHANGE_INDICATOR_MORE_THAN60_DAYS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAccountTypeAllowableValues()
    {
        return [
            self::ACCOUNT_TYPE_NOT_APPLICABLE,
            self::ACCOUNT_TYPE_CREDIT,
            self::ACCOUNT_TYPE_DEBIT,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryAddressUsageIndicatorAllowableValues()
    {
        return [
            self::DELIVERY_ADDRESS_USAGE_INDICATOR_THIS_TRANSACTION,
            self::DELIVERY_ADDRESS_USAGE_INDICATOR_LESS_THAN30_DAYS,
            self::DELIVERY_ADDRESS_USAGE_INDICATOR_FROM30_TO60_DAYS,
            self::DELIVERY_ADDRESS_USAGE_INDICATOR_MORE_THAN60_DAYS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPasswordChangeIndicatorAllowableValues()
    {
        return [
            self::PASSWORD_CHANGE_INDICATOR_NOT_APPLICABLE,
            self::PASSWORD_CHANGE_INDICATOR_THIS_TRANSACTION,
            self::PASSWORD_CHANGE_INDICATOR_LESS_THAN30_DAYS,
            self::PASSWORD_CHANGE_INDICATOR_FROM30_TO60_DAYS,
            self::PASSWORD_CHANGE_INDICATOR_MORE_THAN60_DAYS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentAccountIndicatorAllowableValues()
    {
        return [
            self::PAYMENT_ACCOUNT_INDICATOR_NOT_APPLICABLE,
            self::PAYMENT_ACCOUNT_INDICATOR_THIS_TRANSACTION,
            self::PAYMENT_ACCOUNT_INDICATOR_LESS_THAN30_DAYS,
            self::PAYMENT_ACCOUNT_INDICATOR_FROM30_TO60_DAYS,
            self::PAYMENT_ACCOUNT_INDICATOR_MORE_THAN60_DAYS,
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
        $this->setIfExists('accountAgeIndicator', $data ?? [], null);
        $this->setIfExists('accountChangeDate', $data ?? [], null);
        $this->setIfExists('accountChangeIndicator', $data ?? [], null);
        $this->setIfExists('accountCreationDate', $data ?? [], null);
        $this->setIfExists('accountType', $data ?? [], null);
        $this->setIfExists('addCardAttemptsDay', $data ?? [], null);
        $this->setIfExists('deliveryAddressUsageDate', $data ?? [], null);
        $this->setIfExists('deliveryAddressUsageIndicator', $data ?? [], null);
        $this->setIfExists('homePhone', $data ?? [], null);
        $this->setIfExists('mobilePhone', $data ?? [], null);
        $this->setIfExists('passwordChangeDate', $data ?? [], null);
        $this->setIfExists('passwordChangeIndicator', $data ?? [], null);
        $this->setIfExists('pastTransactionsDay', $data ?? [], null);
        $this->setIfExists('pastTransactionsYear', $data ?? [], null);
        $this->setIfExists('paymentAccountAge', $data ?? [], null);
        $this->setIfExists('paymentAccountIndicator', $data ?? [], null);
        $this->setIfExists('purchasesLast6Months', $data ?? [], null);
        $this->setIfExists('suspiciousActivity', $data ?? [], null);
        $this->setIfExists('workPhone', $data ?? [], null);
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

        $allowedValues = $this->getAccountAgeIndicatorAllowableValues();
        if (!is_null($this->container['accountAgeIndicator']) && !in_array($this->container['accountAgeIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'accountAgeIndicator', must be one of '%s'",
                $this->container['accountAgeIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAccountChangeIndicatorAllowableValues();
        if (!is_null($this->container['accountChangeIndicator']) && !in_array($this->container['accountChangeIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'accountChangeIndicator', must be one of '%s'",
                $this->container['accountChangeIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAccountTypeAllowableValues();
        if (!is_null($this->container['accountType']) && !in_array($this->container['accountType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'accountType', must be one of '%s'",
                $this->container['accountType'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDeliveryAddressUsageIndicatorAllowableValues();
        if (!is_null($this->container['deliveryAddressUsageIndicator']) && !in_array($this->container['deliveryAddressUsageIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'deliveryAddressUsageIndicator', must be one of '%s'",
                $this->container['deliveryAddressUsageIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPasswordChangeIndicatorAllowableValues();
        if (!is_null($this->container['passwordChangeIndicator']) && !in_array($this->container['passwordChangeIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'passwordChangeIndicator', must be one of '%s'",
                $this->container['passwordChangeIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPaymentAccountIndicatorAllowableValues();
        if (!is_null($this->container['paymentAccountIndicator']) && !in_array($this->container['paymentAccountIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'paymentAccountIndicator', must be one of '%s'",
                $this->container['paymentAccountIndicator'],
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
     * Gets accountAgeIndicator
     *
     * @return string|null
     */
    public function getAccountAgeIndicator()
    {
        return $this->container['accountAgeIndicator'];
    }

    /**
     * Sets accountAgeIndicator
     *
     * @param string|null $accountAgeIndicator Indicator for the length of time since this shopper account was created in the merchant's environment. Allowed values: * notApplicable * thisTransaction * lessThan30Days * from30To60Days * moreThan60Days
     *
     * @return self
     */
    public function setAccountAgeIndicator($accountAgeIndicator)
    {
        if (is_null($accountAgeIndicator)) {
            throw new \InvalidArgumentException('non-nullable accountAgeIndicator cannot be null');
        }
        $allowedValues = $this->getAccountAgeIndicatorAllowableValues();
        if (!in_array($accountAgeIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'accountAgeIndicator', must be one of '%s'",
                    $accountAgeIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['accountAgeIndicator'] = $accountAgeIndicator;

        return $this;
    }

    /**
     * Gets accountChangeDate
     *
     * @return \DateTime|null
     */
    public function getAccountChangeDate()
    {
        return $this->container['accountChangeDate'];
    }

    /**
     * Sets accountChangeDate
     *
     * @param \DateTime|null $accountChangeDate Date when the shopper's account was last changed.
     *
     * @return self
     */
    public function setAccountChangeDate($accountChangeDate)
    {
        if (is_null($accountChangeDate)) {
            throw new \InvalidArgumentException('non-nullable accountChangeDate cannot be null');
        }
        $this->container['accountChangeDate'] = $accountChangeDate;

        return $this;
    }

    /**
     * Gets accountChangeIndicator
     *
     * @return string|null
     */
    public function getAccountChangeIndicator()
    {
        return $this->container['accountChangeIndicator'];
    }

    /**
     * Sets accountChangeIndicator
     *
     * @param string|null $accountChangeIndicator Indicator for the length of time since the shopper's account was last updated. Allowed values: * thisTransaction * lessThan30Days * from30To60Days * moreThan60Days
     *
     * @return self
     */
    public function setAccountChangeIndicator($accountChangeIndicator)
    {
        if (is_null($accountChangeIndicator)) {
            throw new \InvalidArgumentException('non-nullable accountChangeIndicator cannot be null');
        }
        $allowedValues = $this->getAccountChangeIndicatorAllowableValues();
        if (!in_array($accountChangeIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'accountChangeIndicator', must be one of '%s'",
                    $accountChangeIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['accountChangeIndicator'] = $accountChangeIndicator;

        return $this;
    }

    /**
     * Gets accountCreationDate
     *
     * @return \DateTime|null
     */
    public function getAccountCreationDate()
    {
        return $this->container['accountCreationDate'];
    }

    /**
     * Sets accountCreationDate
     *
     * @param \DateTime|null $accountCreationDate Date when the shopper's account was created.
     *
     * @return self
     */
    public function setAccountCreationDate($accountCreationDate)
    {
        if (is_null($accountCreationDate)) {
            throw new \InvalidArgumentException('non-nullable accountCreationDate cannot be null');
        }
        $this->container['accountCreationDate'] = $accountCreationDate;

        return $this;
    }

    /**
     * Gets accountType
     *
     * @return string|null
     */
    public function getAccountType()
    {
        return $this->container['accountType'];
    }

    /**
     * Sets accountType
     *
     * @param string|null $accountType Indicates the type of account. For example, for a multi-account card product. Allowed values: * notApplicable * credit * debit
     *
     * @return self
     */
    public function setAccountType($accountType)
    {
        if (is_null($accountType)) {
            throw new \InvalidArgumentException('non-nullable accountType cannot be null');
        }
        $allowedValues = $this->getAccountTypeAllowableValues();
        if (!in_array($accountType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'accountType', must be one of '%s'",
                    $accountType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['accountType'] = $accountType;

        return $this;
    }

    /**
     * Gets addCardAttemptsDay
     *
     * @return int|null
     */
    public function getAddCardAttemptsDay()
    {
        return $this->container['addCardAttemptsDay'];
    }

    /**
     * Sets addCardAttemptsDay
     *
     * @param int|null $addCardAttemptsDay Number of attempts the shopper tried to add a card to their account in the last day.
     *
     * @return self
     */
    public function setAddCardAttemptsDay($addCardAttemptsDay)
    {
        // Do nothing for nullable integers
        $this->container['addCardAttemptsDay'] = $addCardAttemptsDay;

        return $this;
    }

    /**
     * Gets deliveryAddressUsageDate
     *
     * @return \DateTime|null
     */
    public function getDeliveryAddressUsageDate()
    {
        return $this->container['deliveryAddressUsageDate'];
    }

    /**
     * Sets deliveryAddressUsageDate
     *
     * @param \DateTime|null $deliveryAddressUsageDate Date the selected delivery address was first used.
     *
     * @return self
     */
    public function setDeliveryAddressUsageDate($deliveryAddressUsageDate)
    {
        if (is_null($deliveryAddressUsageDate)) {
            throw new \InvalidArgumentException('non-nullable deliveryAddressUsageDate cannot be null');
        }
        $this->container['deliveryAddressUsageDate'] = $deliveryAddressUsageDate;

        return $this;
    }

    /**
     * Gets deliveryAddressUsageIndicator
     *
     * @return string|null
     */
    public function getDeliveryAddressUsageIndicator()
    {
        return $this->container['deliveryAddressUsageIndicator'];
    }

    /**
     * Sets deliveryAddressUsageIndicator
     *
     * @param string|null $deliveryAddressUsageIndicator Indicator for the length of time since this delivery address was first used. Allowed values: * thisTransaction * lessThan30Days * from30To60Days * moreThan60Days
     *
     * @return self
     */
    public function setDeliveryAddressUsageIndicator($deliveryAddressUsageIndicator)
    {
        if (is_null($deliveryAddressUsageIndicator)) {
            throw new \InvalidArgumentException('non-nullable deliveryAddressUsageIndicator cannot be null');
        }
        $allowedValues = $this->getDeliveryAddressUsageIndicatorAllowableValues();
        if (!in_array($deliveryAddressUsageIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'deliveryAddressUsageIndicator', must be one of '%s'",
                    $deliveryAddressUsageIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['deliveryAddressUsageIndicator'] = $deliveryAddressUsageIndicator;

        return $this;
    }

    /**
     * Gets homePhone
     *
     * @return string|null
     * @deprecated
     */
    public function getHomePhone()
    {
        return $this->container['homePhone'];
    }

    /**
     * Sets homePhone
     *
     * @param string|null $homePhone Shopper's home phone number (including the country code).
     *
     * @return self
     * @deprecated
     */
    public function setHomePhone($homePhone)
    {
        if (is_null($homePhone)) {
            throw new \InvalidArgumentException('non-nullable homePhone cannot be null');
        }
        $this->container['homePhone'] = $homePhone;

        return $this;
    }

    /**
     * Gets mobilePhone
     *
     * @return string|null
     * @deprecated
     */
    public function getMobilePhone()
    {
        return $this->container['mobilePhone'];
    }

    /**
     * Sets mobilePhone
     *
     * @param string|null $mobilePhone Shopper's mobile phone number (including the country code).
     *
     * @return self
     * @deprecated
     */
    public function setMobilePhone($mobilePhone)
    {
        if (is_null($mobilePhone)) {
            throw new \InvalidArgumentException('non-nullable mobilePhone cannot be null');
        }
        $this->container['mobilePhone'] = $mobilePhone;

        return $this;
    }

    /**
     * Gets passwordChangeDate
     *
     * @return \DateTime|null
     */
    public function getPasswordChangeDate()
    {
        return $this->container['passwordChangeDate'];
    }

    /**
     * Sets passwordChangeDate
     *
     * @param \DateTime|null $passwordChangeDate Date when the shopper last changed their password.
     *
     * @return self
     */
    public function setPasswordChangeDate($passwordChangeDate)
    {
        if (is_null($passwordChangeDate)) {
            throw new \InvalidArgumentException('non-nullable passwordChangeDate cannot be null');
        }
        $this->container['passwordChangeDate'] = $passwordChangeDate;

        return $this;
    }

    /**
     * Gets passwordChangeIndicator
     *
     * @return string|null
     */
    public function getPasswordChangeIndicator()
    {
        return $this->container['passwordChangeIndicator'];
    }

    /**
     * Sets passwordChangeIndicator
     *
     * @param string|null $passwordChangeIndicator Indicator when the shopper has changed their password. Allowed values: * notApplicable * thisTransaction * lessThan30Days * from30To60Days * moreThan60Days
     *
     * @return self
     */
    public function setPasswordChangeIndicator($passwordChangeIndicator)
    {
        if (is_null($passwordChangeIndicator)) {
            throw new \InvalidArgumentException('non-nullable passwordChangeIndicator cannot be null');
        }
        $allowedValues = $this->getPasswordChangeIndicatorAllowableValues();
        if (!in_array($passwordChangeIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'passwordChangeIndicator', must be one of '%s'",
                    $passwordChangeIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['passwordChangeIndicator'] = $passwordChangeIndicator;

        return $this;
    }

    /**
     * Gets pastTransactionsDay
     *
     * @return int|null
     */
    public function getPastTransactionsDay()
    {
        return $this->container['pastTransactionsDay'];
    }

    /**
     * Sets pastTransactionsDay
     *
     * @param int|null $pastTransactionsDay Number of all transactions (successful and abandoned) from this shopper in the past 24 hours.
     *
     * @return self
     */
    public function setPastTransactionsDay($pastTransactionsDay)
    {
        // Do nothing for nullable integers
        $this->container['pastTransactionsDay'] = $pastTransactionsDay;

        return $this;
    }

    /**
     * Gets pastTransactionsYear
     *
     * @return int|null
     */
    public function getPastTransactionsYear()
    {
        return $this->container['pastTransactionsYear'];
    }

    /**
     * Sets pastTransactionsYear
     *
     * @param int|null $pastTransactionsYear Number of all transactions (successful and abandoned) from this shopper in the past year.
     *
     * @return self
     */
    public function setPastTransactionsYear($pastTransactionsYear)
    {
        // Do nothing for nullable integers
        $this->container['pastTransactionsYear'] = $pastTransactionsYear;

        return $this;
    }

    /**
     * Gets paymentAccountAge
     *
     * @return \DateTime|null
     */
    public function getPaymentAccountAge()
    {
        return $this->container['paymentAccountAge'];
    }

    /**
     * Sets paymentAccountAge
     *
     * @param \DateTime|null $paymentAccountAge Date this payment method was added to the shopper's account.
     *
     * @return self
     */
    public function setPaymentAccountAge($paymentAccountAge)
    {
        if (is_null($paymentAccountAge)) {
            throw new \InvalidArgumentException('non-nullable paymentAccountAge cannot be null');
        }
        $this->container['paymentAccountAge'] = $paymentAccountAge;

        return $this;
    }

    /**
     * Gets paymentAccountIndicator
     *
     * @return string|null
     */
    public function getPaymentAccountIndicator()
    {
        return $this->container['paymentAccountIndicator'];
    }

    /**
     * Sets paymentAccountIndicator
     *
     * @param string|null $paymentAccountIndicator Indicator for the length of time since this payment method was added to this shopper's account. Allowed values: * notApplicable * thisTransaction * lessThan30Days * from30To60Days * moreThan60Days
     *
     * @return self
     */
    public function setPaymentAccountIndicator($paymentAccountIndicator)
    {
        if (is_null($paymentAccountIndicator)) {
            throw new \InvalidArgumentException('non-nullable paymentAccountIndicator cannot be null');
        }
        $allowedValues = $this->getPaymentAccountIndicatorAllowableValues();
        if (!in_array($paymentAccountIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'paymentAccountIndicator', must be one of '%s'",
                    $paymentAccountIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['paymentAccountIndicator'] = $paymentAccountIndicator;

        return $this;
    }

    /**
     * Gets purchasesLast6Months
     *
     * @return int|null
     */
    public function getPurchasesLast6Months()
    {
        return $this->container['purchasesLast6Months'];
    }

    /**
     * Sets purchasesLast6Months
     *
     * @param int|null $purchasesLast6Months Number of successful purchases in the last six months.
     *
     * @return self
     */
    public function setPurchasesLast6Months($purchasesLast6Months)
    {
        // Do nothing for nullable integers
        $this->container['purchasesLast6Months'] = $purchasesLast6Months;

        return $this;
    }

    /**
     * Gets suspiciousActivity
     *
     * @return bool|null
     */
    public function getSuspiciousActivity()
    {
        return $this->container['suspiciousActivity'];
    }

    /**
     * Sets suspiciousActivity
     *
     * @param bool|null $suspiciousActivity Whether suspicious activity was recorded on this account.
     *
     * @return self
     */
    public function setSuspiciousActivity($suspiciousActivity)
    {
        if (is_null($suspiciousActivity)) {
            throw new \InvalidArgumentException('non-nullable suspiciousActivity cannot be null');
        }
        $this->container['suspiciousActivity'] = $suspiciousActivity;

        return $this;
    }

    /**
     * Gets workPhone
     *
     * @return string|null
     * @deprecated
     */
    public function getWorkPhone()
    {
        return $this->container['workPhone'];
    }

    /**
     * Sets workPhone
     *
     * @param string|null $workPhone Shopper's work phone number (including the country code).
     *
     * @return self
     * @deprecated
     */
    public function setWorkPhone($workPhone)
    {
        if (is_null($workPhone)) {
            throw new \InvalidArgumentException('non-nullable workPhone cannot be null');
        }
        $this->container['workPhone'] = $workPhone;

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
