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
 * TransactionRuleRestrictions Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class TransactionRuleRestrictions implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TransactionRuleRestrictions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'activeNetworkTokens' => '\Adyen\Model\BalancePlatform\ActiveNetworkTokensRestriction',
        'brandVariants' => '\Adyen\Model\BalancePlatform\BrandVariantsRestriction',
        'counterpartyBank' => '\Adyen\Model\BalancePlatform\CounterpartyBankRestriction',
        'countries' => '\Adyen\Model\BalancePlatform\CountriesRestriction',
        'dayOfWeek' => '\Adyen\Model\BalancePlatform\DayOfWeekRestriction',
        'differentCurrencies' => '\Adyen\Model\BalancePlatform\DifferentCurrenciesRestriction',
        'entryModes' => '\Adyen\Model\BalancePlatform\EntryModesRestriction',
        'internationalTransaction' => '\Adyen\Model\BalancePlatform\InternationalTransactionRestriction',
        'matchingTransactions' => '\Adyen\Model\BalancePlatform\MatchingTransactionsRestriction',
        'mccs' => '\Adyen\Model\BalancePlatform\MccsRestriction',
        'merchantNames' => '\Adyen\Model\BalancePlatform\MerchantNamesRestriction',
        'merchants' => '\Adyen\Model\BalancePlatform\MerchantsRestriction',
        'processingTypes' => '\Adyen\Model\BalancePlatform\ProcessingTypesRestriction',
        'sameAmountRestriction' => '\Adyen\Model\BalancePlatform\SameAmountRestriction',
        'sameCounterpartyRestriction' => '\Adyen\Model\BalancePlatform\SameCounterpartyRestriction',
        'timeOfDay' => '\Adyen\Model\BalancePlatform\TimeOfDayRestriction',
        'totalAmount' => '\Adyen\Model\BalancePlatform\TotalAmountRestriction'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'activeNetworkTokens' => null,
        'brandVariants' => null,
        'counterpartyBank' => null,
        'countries' => null,
        'dayOfWeek' => null,
        'differentCurrencies' => null,
        'entryModes' => null,
        'internationalTransaction' => null,
        'matchingTransactions' => null,
        'mccs' => null,
        'merchantNames' => null,
        'merchants' => null,
        'processingTypes' => null,
        'sameAmountRestriction' => null,
        'sameCounterpartyRestriction' => null,
        'timeOfDay' => null,
        'totalAmount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'activeNetworkTokens' => false,
        'brandVariants' => false,
        'counterpartyBank' => false,
        'countries' => false,
        'dayOfWeek' => false,
        'differentCurrencies' => false,
        'entryModes' => false,
        'internationalTransaction' => false,
        'matchingTransactions' => false,
        'mccs' => false,
        'merchantNames' => false,
        'merchants' => false,
        'processingTypes' => false,
        'sameAmountRestriction' => false,
        'sameCounterpartyRestriction' => false,
        'timeOfDay' => false,
        'totalAmount' => false
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
        'activeNetworkTokens' => 'activeNetworkTokens',
        'brandVariants' => 'brandVariants',
        'counterpartyBank' => 'counterpartyBank',
        'countries' => 'countries',
        'dayOfWeek' => 'dayOfWeek',
        'differentCurrencies' => 'differentCurrencies',
        'entryModes' => 'entryModes',
        'internationalTransaction' => 'internationalTransaction',
        'matchingTransactions' => 'matchingTransactions',
        'mccs' => 'mccs',
        'merchantNames' => 'merchantNames',
        'merchants' => 'merchants',
        'processingTypes' => 'processingTypes',
        'sameAmountRestriction' => 'sameAmountRestriction',
        'sameCounterpartyRestriction' => 'sameCounterpartyRestriction',
        'timeOfDay' => 'timeOfDay',
        'totalAmount' => 'totalAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'activeNetworkTokens' => 'setActiveNetworkTokens',
        'brandVariants' => 'setBrandVariants',
        'counterpartyBank' => 'setCounterpartyBank',
        'countries' => 'setCountries',
        'dayOfWeek' => 'setDayOfWeek',
        'differentCurrencies' => 'setDifferentCurrencies',
        'entryModes' => 'setEntryModes',
        'internationalTransaction' => 'setInternationalTransaction',
        'matchingTransactions' => 'setMatchingTransactions',
        'mccs' => 'setMccs',
        'merchantNames' => 'setMerchantNames',
        'merchants' => 'setMerchants',
        'processingTypes' => 'setProcessingTypes',
        'sameAmountRestriction' => 'setSameAmountRestriction',
        'sameCounterpartyRestriction' => 'setSameCounterpartyRestriction',
        'timeOfDay' => 'setTimeOfDay',
        'totalAmount' => 'setTotalAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'activeNetworkTokens' => 'getActiveNetworkTokens',
        'brandVariants' => 'getBrandVariants',
        'counterpartyBank' => 'getCounterpartyBank',
        'countries' => 'getCountries',
        'dayOfWeek' => 'getDayOfWeek',
        'differentCurrencies' => 'getDifferentCurrencies',
        'entryModes' => 'getEntryModes',
        'internationalTransaction' => 'getInternationalTransaction',
        'matchingTransactions' => 'getMatchingTransactions',
        'mccs' => 'getMccs',
        'merchantNames' => 'getMerchantNames',
        'merchants' => 'getMerchants',
        'processingTypes' => 'getProcessingTypes',
        'sameAmountRestriction' => 'getSameAmountRestriction',
        'sameCounterpartyRestriction' => 'getSameCounterpartyRestriction',
        'timeOfDay' => 'getTimeOfDay',
        'totalAmount' => 'getTotalAmount'
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
        $this->setIfExists('activeNetworkTokens', $data ?? [], null);
        $this->setIfExists('brandVariants', $data ?? [], null);
        $this->setIfExists('counterpartyBank', $data ?? [], null);
        $this->setIfExists('countries', $data ?? [], null);
        $this->setIfExists('dayOfWeek', $data ?? [], null);
        $this->setIfExists('differentCurrencies', $data ?? [], null);
        $this->setIfExists('entryModes', $data ?? [], null);
        $this->setIfExists('internationalTransaction', $data ?? [], null);
        $this->setIfExists('matchingTransactions', $data ?? [], null);
        $this->setIfExists('mccs', $data ?? [], null);
        $this->setIfExists('merchantNames', $data ?? [], null);
        $this->setIfExists('merchants', $data ?? [], null);
        $this->setIfExists('processingTypes', $data ?? [], null);
        $this->setIfExists('sameAmountRestriction', $data ?? [], null);
        $this->setIfExists('sameCounterpartyRestriction', $data ?? [], null);
        $this->setIfExists('timeOfDay', $data ?? [], null);
        $this->setIfExists('totalAmount', $data ?? [], null);
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
     * Gets activeNetworkTokens
     *
     * @return \Adyen\Model\BalancePlatform\ActiveNetworkTokensRestriction|null
     */
    public function getActiveNetworkTokens()
    {
        return $this->container['activeNetworkTokens'];
    }

    /**
     * Sets activeNetworkTokens
     *
     * @param \Adyen\Model\BalancePlatform\ActiveNetworkTokensRestriction|null $activeNetworkTokens activeNetworkTokens
     *
     * @return self
     */
    public function setActiveNetworkTokens($activeNetworkTokens)
    {
        if (is_null($activeNetworkTokens)) {
            throw new \InvalidArgumentException('non-nullable activeNetworkTokens cannot be null');
        }
        $this->container['activeNetworkTokens'] = $activeNetworkTokens;

        return $this;
    }

    /**
     * Gets brandVariants
     *
     * @return \Adyen\Model\BalancePlatform\BrandVariantsRestriction|null
     */
    public function getBrandVariants()
    {
        return $this->container['brandVariants'];
    }

    /**
     * Sets brandVariants
     *
     * @param \Adyen\Model\BalancePlatform\BrandVariantsRestriction|null $brandVariants brandVariants
     *
     * @return self
     */
    public function setBrandVariants($brandVariants)
    {
        if (is_null($brandVariants)) {
            throw new \InvalidArgumentException('non-nullable brandVariants cannot be null');
        }
        $this->container['brandVariants'] = $brandVariants;

        return $this;
    }

    /**
     * Gets counterpartyBank
     *
     * @return \Adyen\Model\BalancePlatform\CounterpartyBankRestriction|null
     */
    public function getCounterpartyBank()
    {
        return $this->container['counterpartyBank'];
    }

    /**
     * Sets counterpartyBank
     *
     * @param \Adyen\Model\BalancePlatform\CounterpartyBankRestriction|null $counterpartyBank counterpartyBank
     *
     * @return self
     */
    public function setCounterpartyBank($counterpartyBank)
    {
        if (is_null($counterpartyBank)) {
            throw new \InvalidArgumentException('non-nullable counterpartyBank cannot be null');
        }
        $this->container['counterpartyBank'] = $counterpartyBank;

        return $this;
    }

    /**
     * Gets countries
     *
     * @return \Adyen\Model\BalancePlatform\CountriesRestriction|null
     */
    public function getCountries()
    {
        return $this->container['countries'];
    }

    /**
     * Sets countries
     *
     * @param \Adyen\Model\BalancePlatform\CountriesRestriction|null $countries countries
     *
     * @return self
     */
    public function setCountries($countries)
    {
        if (is_null($countries)) {
            throw new \InvalidArgumentException('non-nullable countries cannot be null');
        }
        $this->container['countries'] = $countries;

        return $this;
    }

    /**
     * Gets dayOfWeek
     *
     * @return \Adyen\Model\BalancePlatform\DayOfWeekRestriction|null
     */
    public function getDayOfWeek()
    {
        return $this->container['dayOfWeek'];
    }

    /**
     * Sets dayOfWeek
     *
     * @param \Adyen\Model\BalancePlatform\DayOfWeekRestriction|null $dayOfWeek dayOfWeek
     *
     * @return self
     */
    public function setDayOfWeek($dayOfWeek)
    {
        if (is_null($dayOfWeek)) {
            throw new \InvalidArgumentException('non-nullable dayOfWeek cannot be null');
        }
        $this->container['dayOfWeek'] = $dayOfWeek;

        return $this;
    }

    /**
     * Gets differentCurrencies
     *
     * @return \Adyen\Model\BalancePlatform\DifferentCurrenciesRestriction|null
     */
    public function getDifferentCurrencies()
    {
        return $this->container['differentCurrencies'];
    }

    /**
     * Sets differentCurrencies
     *
     * @param \Adyen\Model\BalancePlatform\DifferentCurrenciesRestriction|null $differentCurrencies differentCurrencies
     *
     * @return self
     */
    public function setDifferentCurrencies($differentCurrencies)
    {
        if (is_null($differentCurrencies)) {
            throw new \InvalidArgumentException('non-nullable differentCurrencies cannot be null');
        }
        $this->container['differentCurrencies'] = $differentCurrencies;

        return $this;
    }

    /**
     * Gets entryModes
     *
     * @return \Adyen\Model\BalancePlatform\EntryModesRestriction|null
     */
    public function getEntryModes()
    {
        return $this->container['entryModes'];
    }

    /**
     * Sets entryModes
     *
     * @param \Adyen\Model\BalancePlatform\EntryModesRestriction|null $entryModes entryModes
     *
     * @return self
     */
    public function setEntryModes($entryModes)
    {
        if (is_null($entryModes)) {
            throw new \InvalidArgumentException('non-nullable entryModes cannot be null');
        }
        $this->container['entryModes'] = $entryModes;

        return $this;
    }

    /**
     * Gets internationalTransaction
     *
     * @return \Adyen\Model\BalancePlatform\InternationalTransactionRestriction|null
     */
    public function getInternationalTransaction()
    {
        return $this->container['internationalTransaction'];
    }

    /**
     * Sets internationalTransaction
     *
     * @param \Adyen\Model\BalancePlatform\InternationalTransactionRestriction|null $internationalTransaction internationalTransaction
     *
     * @return self
     */
    public function setInternationalTransaction($internationalTransaction)
    {
        if (is_null($internationalTransaction)) {
            throw new \InvalidArgumentException('non-nullable internationalTransaction cannot be null');
        }
        $this->container['internationalTransaction'] = $internationalTransaction;

        return $this;
    }

    /**
     * Gets matchingTransactions
     *
     * @return \Adyen\Model\BalancePlatform\MatchingTransactionsRestriction|null
     */
    public function getMatchingTransactions()
    {
        return $this->container['matchingTransactions'];
    }

    /**
     * Sets matchingTransactions
     *
     * @param \Adyen\Model\BalancePlatform\MatchingTransactionsRestriction|null $matchingTransactions matchingTransactions
     *
     * @return self
     */
    public function setMatchingTransactions($matchingTransactions)
    {
        if (is_null($matchingTransactions)) {
            throw new \InvalidArgumentException('non-nullable matchingTransactions cannot be null');
        }
        $this->container['matchingTransactions'] = $matchingTransactions;

        return $this;
    }

    /**
     * Gets mccs
     *
     * @return \Adyen\Model\BalancePlatform\MccsRestriction|null
     */
    public function getMccs()
    {
        return $this->container['mccs'];
    }

    /**
     * Sets mccs
     *
     * @param \Adyen\Model\BalancePlatform\MccsRestriction|null $mccs mccs
     *
     * @return self
     */
    public function setMccs($mccs)
    {
        if (is_null($mccs)) {
            throw new \InvalidArgumentException('non-nullable mccs cannot be null');
        }
        $this->container['mccs'] = $mccs;

        return $this;
    }

    /**
     * Gets merchantNames
     *
     * @return \Adyen\Model\BalancePlatform\MerchantNamesRestriction|null
     */
    public function getMerchantNames()
    {
        return $this->container['merchantNames'];
    }

    /**
     * Sets merchantNames
     *
     * @param \Adyen\Model\BalancePlatform\MerchantNamesRestriction|null $merchantNames merchantNames
     *
     * @return self
     */
    public function setMerchantNames($merchantNames)
    {
        if (is_null($merchantNames)) {
            throw new \InvalidArgumentException('non-nullable merchantNames cannot be null');
        }
        $this->container['merchantNames'] = $merchantNames;

        return $this;
    }

    /**
     * Gets merchants
     *
     * @return \Adyen\Model\BalancePlatform\MerchantsRestriction|null
     */
    public function getMerchants()
    {
        return $this->container['merchants'];
    }

    /**
     * Sets merchants
     *
     * @param \Adyen\Model\BalancePlatform\MerchantsRestriction|null $merchants merchants
     *
     * @return self
     */
    public function setMerchants($merchants)
    {
        if (is_null($merchants)) {
            throw new \InvalidArgumentException('non-nullable merchants cannot be null');
        }
        $this->container['merchants'] = $merchants;

        return $this;
    }

    /**
     * Gets processingTypes
     *
     * @return \Adyen\Model\BalancePlatform\ProcessingTypesRestriction|null
     */
    public function getProcessingTypes()
    {
        return $this->container['processingTypes'];
    }

    /**
     * Sets processingTypes
     *
     * @param \Adyen\Model\BalancePlatform\ProcessingTypesRestriction|null $processingTypes processingTypes
     *
     * @return self
     */
    public function setProcessingTypes($processingTypes)
    {
        if (is_null($processingTypes)) {
            throw new \InvalidArgumentException('non-nullable processingTypes cannot be null');
        }
        $this->container['processingTypes'] = $processingTypes;

        return $this;
    }

    /**
     * Gets sameAmountRestriction
     *
     * @return \Adyen\Model\BalancePlatform\SameAmountRestriction|null
     */
    public function getSameAmountRestriction()
    {
        return $this->container['sameAmountRestriction'];
    }

    /**
     * Sets sameAmountRestriction
     *
     * @param \Adyen\Model\BalancePlatform\SameAmountRestriction|null $sameAmountRestriction sameAmountRestriction
     *
     * @return self
     */
    public function setSameAmountRestriction($sameAmountRestriction)
    {
        if (is_null($sameAmountRestriction)) {
            throw new \InvalidArgumentException('non-nullable sameAmountRestriction cannot be null');
        }
        $this->container['sameAmountRestriction'] = $sameAmountRestriction;

        return $this;
    }

    /**
     * Gets sameCounterpartyRestriction
     *
     * @return \Adyen\Model\BalancePlatform\SameCounterpartyRestriction|null
     */
    public function getSameCounterpartyRestriction()
    {
        return $this->container['sameCounterpartyRestriction'];
    }

    /**
     * Sets sameCounterpartyRestriction
     *
     * @param \Adyen\Model\BalancePlatform\SameCounterpartyRestriction|null $sameCounterpartyRestriction sameCounterpartyRestriction
     *
     * @return self
     */
    public function setSameCounterpartyRestriction($sameCounterpartyRestriction)
    {
        if (is_null($sameCounterpartyRestriction)) {
            throw new \InvalidArgumentException('non-nullable sameCounterpartyRestriction cannot be null');
        }
        $this->container['sameCounterpartyRestriction'] = $sameCounterpartyRestriction;

        return $this;
    }

    /**
     * Gets timeOfDay
     *
     * @return \Adyen\Model\BalancePlatform\TimeOfDayRestriction|null
     */
    public function getTimeOfDay()
    {
        return $this->container['timeOfDay'];
    }

    /**
     * Sets timeOfDay
     *
     * @param \Adyen\Model\BalancePlatform\TimeOfDayRestriction|null $timeOfDay timeOfDay
     *
     * @return self
     */
    public function setTimeOfDay($timeOfDay)
    {
        if (is_null($timeOfDay)) {
            throw new \InvalidArgumentException('non-nullable timeOfDay cannot be null');
        }
        $this->container['timeOfDay'] = $timeOfDay;

        return $this;
    }

    /**
     * Gets totalAmount
     *
     * @return \Adyen\Model\BalancePlatform\TotalAmountRestriction|null
     */
    public function getTotalAmount()
    {
        return $this->container['totalAmount'];
    }

    /**
     * Sets totalAmount
     *
     * @param \Adyen\Model\BalancePlatform\TotalAmountRestriction|null $totalAmount totalAmount
     *
     * @return self
     */
    public function setTotalAmount($totalAmount)
    {
        if (is_null($totalAmount)) {
            throw new \InvalidArgumentException('non-nullable totalAmount cannot be null');
        }
        $this->container['totalAmount'] = $totalAmount;

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
