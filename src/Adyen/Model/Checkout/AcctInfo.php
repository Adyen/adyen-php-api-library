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
 * AcctInfo Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class AcctInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AcctInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'chAccAgeInd' => 'string',
        'chAccChange' => 'string',
        'chAccChangeInd' => 'string',
        'chAccPwChange' => 'string',
        'chAccPwChangeInd' => 'string',
        'chAccString' => 'string',
        'nbPurchaseAccount' => 'string',
        'paymentAccAge' => 'string',
        'paymentAccInd' => 'string',
        'provisionAttemptsDay' => 'string',
        'shipAddressUsage' => 'string',
        'shipAddressUsageInd' => 'string',
        'shipNameIndicator' => 'string',
        'suspiciousAccActivity' => 'string',
        'txnActivityDay' => 'string',
        'txnActivityYear' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'chAccAgeInd' => null,
        'chAccChange' => null,
        'chAccChangeInd' => null,
        'chAccPwChange' => null,
        'chAccPwChangeInd' => null,
        'chAccString' => null,
        'nbPurchaseAccount' => null,
        'paymentAccAge' => null,
        'paymentAccInd' => null,
        'provisionAttemptsDay' => null,
        'shipAddressUsage' => null,
        'shipAddressUsageInd' => null,
        'shipNameIndicator' => null,
        'suspiciousAccActivity' => null,
        'txnActivityDay' => null,
        'txnActivityYear' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'chAccAgeInd' => false,
        'chAccChange' => false,
        'chAccChangeInd' => false,
        'chAccPwChange' => false,
        'chAccPwChangeInd' => false,
        'chAccString' => false,
        'nbPurchaseAccount' => false,
        'paymentAccAge' => false,
        'paymentAccInd' => false,
        'provisionAttemptsDay' => false,
        'shipAddressUsage' => false,
        'shipAddressUsageInd' => false,
        'shipNameIndicator' => false,
        'suspiciousAccActivity' => false,
        'txnActivityDay' => false,
        'txnActivityYear' => false
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
        'chAccAgeInd' => 'chAccAgeInd',
        'chAccChange' => 'chAccChange',
        'chAccChangeInd' => 'chAccChangeInd',
        'chAccPwChange' => 'chAccPwChange',
        'chAccPwChangeInd' => 'chAccPwChangeInd',
        'chAccString' => 'chAccString',
        'nbPurchaseAccount' => 'nbPurchaseAccount',
        'paymentAccAge' => 'paymentAccAge',
        'paymentAccInd' => 'paymentAccInd',
        'provisionAttemptsDay' => 'provisionAttemptsDay',
        'shipAddressUsage' => 'shipAddressUsage',
        'shipAddressUsageInd' => 'shipAddressUsageInd',
        'shipNameIndicator' => 'shipNameIndicator',
        'suspiciousAccActivity' => 'suspiciousAccActivity',
        'txnActivityDay' => 'txnActivityDay',
        'txnActivityYear' => 'txnActivityYear'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'chAccAgeInd' => 'setChAccAgeInd',
        'chAccChange' => 'setChAccChange',
        'chAccChangeInd' => 'setChAccChangeInd',
        'chAccPwChange' => 'setChAccPwChange',
        'chAccPwChangeInd' => 'setChAccPwChangeInd',
        'chAccString' => 'setChAccString',
        'nbPurchaseAccount' => 'setNbPurchaseAccount',
        'paymentAccAge' => 'setPaymentAccAge',
        'paymentAccInd' => 'setPaymentAccInd',
        'provisionAttemptsDay' => 'setProvisionAttemptsDay',
        'shipAddressUsage' => 'setShipAddressUsage',
        'shipAddressUsageInd' => 'setShipAddressUsageInd',
        'shipNameIndicator' => 'setShipNameIndicator',
        'suspiciousAccActivity' => 'setSuspiciousAccActivity',
        'txnActivityDay' => 'setTxnActivityDay',
        'txnActivityYear' => 'setTxnActivityYear'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'chAccAgeInd' => 'getChAccAgeInd',
        'chAccChange' => 'getChAccChange',
        'chAccChangeInd' => 'getChAccChangeInd',
        'chAccPwChange' => 'getChAccPwChange',
        'chAccPwChangeInd' => 'getChAccPwChangeInd',
        'chAccString' => 'getChAccString',
        'nbPurchaseAccount' => 'getNbPurchaseAccount',
        'paymentAccAge' => 'getPaymentAccAge',
        'paymentAccInd' => 'getPaymentAccInd',
        'provisionAttemptsDay' => 'getProvisionAttemptsDay',
        'shipAddressUsage' => 'getShipAddressUsage',
        'shipAddressUsageInd' => 'getShipAddressUsageInd',
        'shipNameIndicator' => 'getShipNameIndicator',
        'suspiciousAccActivity' => 'getSuspiciousAccActivity',
        'txnActivityDay' => 'getTxnActivityDay',
        'txnActivityYear' => 'getTxnActivityYear'
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

    public const CH_ACC_AGE_IND__01 = '01';
    public const CH_ACC_AGE_IND__02 = '02';
    public const CH_ACC_AGE_IND__03 = '03';
    public const CH_ACC_AGE_IND__04 = '04';
    public const CH_ACC_AGE_IND__05 = '05';
    public const CH_ACC_CHANGE_IND__01 = '01';
    public const CH_ACC_CHANGE_IND__02 = '02';
    public const CH_ACC_CHANGE_IND__03 = '03';
    public const CH_ACC_CHANGE_IND__04 = '04';
    public const CH_ACC_PW_CHANGE_IND__01 = '01';
    public const CH_ACC_PW_CHANGE_IND__02 = '02';
    public const CH_ACC_PW_CHANGE_IND__03 = '03';
    public const CH_ACC_PW_CHANGE_IND__04 = '04';
    public const CH_ACC_PW_CHANGE_IND__05 = '05';
    public const PAYMENT_ACC_IND__01 = '01';
    public const PAYMENT_ACC_IND__02 = '02';
    public const PAYMENT_ACC_IND__03 = '03';
    public const PAYMENT_ACC_IND__04 = '04';
    public const PAYMENT_ACC_IND__05 = '05';
    public const SHIP_ADDRESS_USAGE_IND__01 = '01';
    public const SHIP_ADDRESS_USAGE_IND__02 = '02';
    public const SHIP_ADDRESS_USAGE_IND__03 = '03';
    public const SHIP_ADDRESS_USAGE_IND__04 = '04';
    public const SHIP_NAME_INDICATOR__01 = '01';
    public const SHIP_NAME_INDICATOR__02 = '02';
    public const SUSPICIOUS_ACC_ACTIVITY__01 = '01';
    public const SUSPICIOUS_ACC_ACTIVITY__02 = '02';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChAccAgeIndAllowableValues()
    {
        return [
            self::CH_ACC_AGE_IND__01,
            self::CH_ACC_AGE_IND__02,
            self::CH_ACC_AGE_IND__03,
            self::CH_ACC_AGE_IND__04,
            self::CH_ACC_AGE_IND__05,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChAccChangeIndAllowableValues()
    {
        return [
            self::CH_ACC_CHANGE_IND__01,
            self::CH_ACC_CHANGE_IND__02,
            self::CH_ACC_CHANGE_IND__03,
            self::CH_ACC_CHANGE_IND__04,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChAccPwChangeIndAllowableValues()
    {
        return [
            self::CH_ACC_PW_CHANGE_IND__01,
            self::CH_ACC_PW_CHANGE_IND__02,
            self::CH_ACC_PW_CHANGE_IND__03,
            self::CH_ACC_PW_CHANGE_IND__04,
            self::CH_ACC_PW_CHANGE_IND__05,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentAccIndAllowableValues()
    {
        return [
            self::PAYMENT_ACC_IND__01,
            self::PAYMENT_ACC_IND__02,
            self::PAYMENT_ACC_IND__03,
            self::PAYMENT_ACC_IND__04,
            self::PAYMENT_ACC_IND__05,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getShipAddressUsageIndAllowableValues()
    {
        return [
            self::SHIP_ADDRESS_USAGE_IND__01,
            self::SHIP_ADDRESS_USAGE_IND__02,
            self::SHIP_ADDRESS_USAGE_IND__03,
            self::SHIP_ADDRESS_USAGE_IND__04,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getShipNameIndicatorAllowableValues()
    {
        return [
            self::SHIP_NAME_INDICATOR__01,
            self::SHIP_NAME_INDICATOR__02,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSuspiciousAccActivityAllowableValues()
    {
        return [
            self::SUSPICIOUS_ACC_ACTIVITY__01,
            self::SUSPICIOUS_ACC_ACTIVITY__02,
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
        $this->setIfExists('chAccAgeInd', $data ?? [], null);
        $this->setIfExists('chAccChange', $data ?? [], null);
        $this->setIfExists('chAccChangeInd', $data ?? [], null);
        $this->setIfExists('chAccPwChange', $data ?? [], null);
        $this->setIfExists('chAccPwChangeInd', $data ?? [], null);
        $this->setIfExists('chAccString', $data ?? [], null);
        $this->setIfExists('nbPurchaseAccount', $data ?? [], null);
        $this->setIfExists('paymentAccAge', $data ?? [], null);
        $this->setIfExists('paymentAccInd', $data ?? [], null);
        $this->setIfExists('provisionAttemptsDay', $data ?? [], null);
        $this->setIfExists('shipAddressUsage', $data ?? [], null);
        $this->setIfExists('shipAddressUsageInd', $data ?? [], null);
        $this->setIfExists('shipNameIndicator', $data ?? [], null);
        $this->setIfExists('suspiciousAccActivity', $data ?? [], null);
        $this->setIfExists('txnActivityDay', $data ?? [], null);
        $this->setIfExists('txnActivityYear', $data ?? [], null);
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

        $allowedValues = $this->getChAccAgeIndAllowableValues();
        if (!is_null($this->container['chAccAgeInd']) && !in_array($this->container['chAccAgeInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'chAccAgeInd', must be one of '%s'",
                $this->container['chAccAgeInd'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getChAccChangeIndAllowableValues();
        if (!is_null($this->container['chAccChangeInd']) && !in_array($this->container['chAccChangeInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'chAccChangeInd', must be one of '%s'",
                $this->container['chAccChangeInd'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getChAccPwChangeIndAllowableValues();
        if (!is_null($this->container['chAccPwChangeInd']) && !in_array($this->container['chAccPwChangeInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'chAccPwChangeInd', must be one of '%s'",
                $this->container['chAccPwChangeInd'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPaymentAccIndAllowableValues();
        if (!is_null($this->container['paymentAccInd']) && !in_array($this->container['paymentAccInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'paymentAccInd', must be one of '%s'",
                $this->container['paymentAccInd'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getShipAddressUsageIndAllowableValues();
        if (!is_null($this->container['shipAddressUsageInd']) && !in_array($this->container['shipAddressUsageInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shipAddressUsageInd', must be one of '%s'",
                $this->container['shipAddressUsageInd'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getShipNameIndicatorAllowableValues();
        if (!is_null($this->container['shipNameIndicator']) && !in_array($this->container['shipNameIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'shipNameIndicator', must be one of '%s'",
                $this->container['shipNameIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getSuspiciousAccActivityAllowableValues();
        if (!is_null($this->container['suspiciousAccActivity']) && !in_array($this->container['suspiciousAccActivity'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'suspiciousAccActivity', must be one of '%s'",
                $this->container['suspiciousAccActivity'],
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
     * Gets chAccAgeInd
     *
     * @return string|null
     */
    public function getChAccAgeInd()
    {
        return $this->container['chAccAgeInd'];
    }

    /**
     * Sets chAccAgeInd
     *
     * @param string|null $chAccAgeInd Length of time that the cardholder has had the account with the 3DS Requestor.  Allowed values: * **01** — No account * **02** — Created during this transaction * **03** — Less than 30 days * **04** — 30–60 days * **05** — More than 60 days
     *
     * @return self
     */
    public function setChAccAgeInd($chAccAgeInd)
    {
        $allowedValues = $this->getChAccAgeIndAllowableValues();
        if (!in_array($chAccAgeInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'chAccAgeInd', must be one of '%s'",
                    $chAccAgeInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['chAccAgeInd'] = $chAccAgeInd;

        return $this;
    }

    /**
     * Gets chAccChange
     *
     * @return string|null
     */
    public function getChAccChange()
    {
        return $this->container['chAccChange'];
    }

    /**
     * Sets chAccChange
     *
     * @param string|null $chAccChange Date that the cardholder’s account with the 3DS Requestor was last changed, including Billing or Shipping address, new payment account, or new user(s) added.  Format: **YYYYMMDD**
     *
     * @return self
     */
    public function setChAccChange($chAccChange)
    {
        $this->container['chAccChange'] = $chAccChange;

        return $this;
    }

    /**
     * Gets chAccChangeInd
     *
     * @return string|null
     */
    public function getChAccChangeInd()
    {
        return $this->container['chAccChangeInd'];
    }

    /**
     * Sets chAccChangeInd
     *
     * @param string|null $chAccChangeInd Length of time since the cardholder’s account information with the 3DS Requestor was last changed, including Billing or Shipping address, new payment account, or new user(s) added.  Allowed values: * **01** — Changed during this transaction * **02** — Less than 30 days * **03** — 30–60 days * **04** — More than 60 days
     *
     * @return self
     */
    public function setChAccChangeInd($chAccChangeInd)
    {
        $allowedValues = $this->getChAccChangeIndAllowableValues();
        if (!in_array($chAccChangeInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'chAccChangeInd', must be one of '%s'",
                    $chAccChangeInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['chAccChangeInd'] = $chAccChangeInd;

        return $this;
    }

    /**
     * Gets chAccPwChange
     *
     * @return string|null
     */
    public function getChAccPwChange()
    {
        return $this->container['chAccPwChange'];
    }

    /**
     * Sets chAccPwChange
     *
     * @param string|null $chAccPwChange Date that cardholder’s account with the 3DS Requestor had a password change or account reset.  Format: **YYYYMMDD**
     *
     * @return self
     */
    public function setChAccPwChange($chAccPwChange)
    {
        $this->container['chAccPwChange'] = $chAccPwChange;

        return $this;
    }

    /**
     * Gets chAccPwChangeInd
     *
     * @return string|null
     */
    public function getChAccPwChangeInd()
    {
        return $this->container['chAccPwChangeInd'];
    }

    /**
     * Sets chAccPwChangeInd
     *
     * @param string|null $chAccPwChangeInd Indicates the length of time since the cardholder’s account with the 3DS Requestor had a password change or account reset.  Allowed values: * **01** — No change * **02** — Changed during this transaction * **03** — Less than 30 days * **04** — 30–60 days * **05** — More than 60 days
     *
     * @return self
     */
    public function setChAccPwChangeInd($chAccPwChangeInd)
    {
        $allowedValues = $this->getChAccPwChangeIndAllowableValues();
        if (!in_array($chAccPwChangeInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'chAccPwChangeInd', must be one of '%s'",
                    $chAccPwChangeInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['chAccPwChangeInd'] = $chAccPwChangeInd;

        return $this;
    }

    /**
     * Gets chAccString
     *
     * @return string|null
     */
    public function getChAccString()
    {
        return $this->container['chAccString'];
    }

    /**
     * Sets chAccString
     *
     * @param string|null $chAccString Date that the cardholder opened the account with the 3DS Requestor.  Format: **YYYYMMDD**
     *
     * @return self
     */
    public function setChAccString($chAccString)
    {
        $this->container['chAccString'] = $chAccString;

        return $this;
    }

    /**
     * Gets nbPurchaseAccount
     *
     * @return string|null
     */
    public function getNbPurchaseAccount()
    {
        return $this->container['nbPurchaseAccount'];
    }

    /**
     * Sets nbPurchaseAccount
     *
     * @param string|null $nbPurchaseAccount Number of purchases with this cardholder account during the previous six months. Max length: 4 characters.
     *
     * @return self
     */
    public function setNbPurchaseAccount($nbPurchaseAccount)
    {
        $this->container['nbPurchaseAccount'] = $nbPurchaseAccount;

        return $this;
    }

    /**
     * Gets paymentAccAge
     *
     * @return string|null
     */
    public function getPaymentAccAge()
    {
        return $this->container['paymentAccAge'];
    }

    /**
     * Sets paymentAccAge
     *
     * @param string|null $paymentAccAge String that the payment account was enrolled in the cardholder’s account with the 3DS Requestor.  Format: **YYYYMMDD**
     *
     * @return self
     */
    public function setPaymentAccAge($paymentAccAge)
    {
        $this->container['paymentAccAge'] = $paymentAccAge;

        return $this;
    }

    /**
     * Gets paymentAccInd
     *
     * @return string|null
     */
    public function getPaymentAccInd()
    {
        return $this->container['paymentAccInd'];
    }

    /**
     * Sets paymentAccInd
     *
     * @param string|null $paymentAccInd Indicates the length of time that the payment account was enrolled in the cardholder’s account with the 3DS Requestor.  Allowed values: * **01** — No account (guest checkout) * **02** — During this transaction * **03** — Less than 30 days * **04** — 30–60 days * **05** — More than 60 days
     *
     * @return self
     */
    public function setPaymentAccInd($paymentAccInd)
    {
        $allowedValues = $this->getPaymentAccIndAllowableValues();
        if (!in_array($paymentAccInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'paymentAccInd', must be one of '%s'",
                    $paymentAccInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['paymentAccInd'] = $paymentAccInd;

        return $this;
    }

    /**
     * Gets provisionAttemptsDay
     *
     * @return string|null
     */
    public function getProvisionAttemptsDay()
    {
        return $this->container['provisionAttemptsDay'];
    }

    /**
     * Sets provisionAttemptsDay
     *
     * @param string|null $provisionAttemptsDay Number of Add Card attempts in the last 24 hours. Max length: 3 characters.
     *
     * @return self
     */
    public function setProvisionAttemptsDay($provisionAttemptsDay)
    {
        $this->container['provisionAttemptsDay'] = $provisionAttemptsDay;

        return $this;
    }

    /**
     * Gets shipAddressUsage
     *
     * @return string|null
     */
    public function getShipAddressUsage()
    {
        return $this->container['shipAddressUsage'];
    }

    /**
     * Sets shipAddressUsage
     *
     * @param string|null $shipAddressUsage String when the shipping address used for this transaction was first used with the 3DS Requestor.  Format: **YYYYMMDD**
     *
     * @return self
     */
    public function setShipAddressUsage($shipAddressUsage)
    {
        $this->container['shipAddressUsage'] = $shipAddressUsage;

        return $this;
    }

    /**
     * Gets shipAddressUsageInd
     *
     * @return string|null
     */
    public function getShipAddressUsageInd()
    {
        return $this->container['shipAddressUsageInd'];
    }

    /**
     * Sets shipAddressUsageInd
     *
     * @param string|null $shipAddressUsageInd Indicates when the shipping address used for this transaction was first used with the 3DS Requestor.  Allowed values: * **01** — This transaction * **02** — Less than 30 days * **03** — 30–60 days * **04** — More than 60 days
     *
     * @return self
     */
    public function setShipAddressUsageInd($shipAddressUsageInd)
    {
        $allowedValues = $this->getShipAddressUsageIndAllowableValues();
        if (!in_array($shipAddressUsageInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'shipAddressUsageInd', must be one of '%s'",
                    $shipAddressUsageInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['shipAddressUsageInd'] = $shipAddressUsageInd;

        return $this;
    }

    /**
     * Gets shipNameIndicator
     *
     * @return string|null
     */
    public function getShipNameIndicator()
    {
        return $this->container['shipNameIndicator'];
    }

    /**
     * Sets shipNameIndicator
     *
     * @param string|null $shipNameIndicator Indicates if the Cardholder Name on the account is identical to the shipping Name used for this transaction.  Allowed values: * **01** — Account Name identical to shipping Name * **02** — Account Name different to shipping Name
     *
     * @return self
     */
    public function setShipNameIndicator($shipNameIndicator)
    {
        $allowedValues = $this->getShipNameIndicatorAllowableValues();
        if (!in_array($shipNameIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'shipNameIndicator', must be one of '%s'",
                    $shipNameIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['shipNameIndicator'] = $shipNameIndicator;

        return $this;
    }

    /**
     * Gets suspiciousAccActivity
     *
     * @return string|null
     */
    public function getSuspiciousAccActivity()
    {
        return $this->container['suspiciousAccActivity'];
    }

    /**
     * Sets suspiciousAccActivity
     *
     * @param string|null $suspiciousAccActivity Indicates whether the 3DS Requestor has experienced suspicious activity (including previous fraud) on the cardholder account.  Allowed values: * **01** — No suspicious activity has been observed * **02** — Suspicious activity has been observed
     *
     * @return self
     */
    public function setSuspiciousAccActivity($suspiciousAccActivity)
    {
        $allowedValues = $this->getSuspiciousAccActivityAllowableValues();
        if (!in_array($suspiciousAccActivity, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'suspiciousAccActivity', must be one of '%s'",
                    $suspiciousAccActivity,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['suspiciousAccActivity'] = $suspiciousAccActivity;

        return $this;
    }

    /**
     * Gets txnActivityDay
     *
     * @return string|null
     */
    public function getTxnActivityDay()
    {
        return $this->container['txnActivityDay'];
    }

    /**
     * Sets txnActivityDay
     *
     * @param string|null $txnActivityDay Number of transactions (successful and abandoned) for this cardholder account with the 3DS Requestor across all payment accounts in the previous 24 hours. Max length: 3 characters.
     *
     * @return self
     */
    public function setTxnActivityDay($txnActivityDay)
    {
        $this->container['txnActivityDay'] = $txnActivityDay;

        return $this;
    }

    /**
     * Gets txnActivityYear
     *
     * @return string|null
     */
    public function getTxnActivityYear()
    {
        return $this->container['txnActivityYear'];
    }

    /**
     * Sets txnActivityYear
     *
     * @param string|null $txnActivityYear Number of transactions (successful and abandoned) for this cardholder account with the 3DS Requestor across all payment accounts in the previous year. Max length: 3 characters.
     *
     * @return self
     */
    public function setTxnActivityYear($txnActivityYear)
    {
        $this->container['txnActivityYear'] = $txnActivityYear;

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
