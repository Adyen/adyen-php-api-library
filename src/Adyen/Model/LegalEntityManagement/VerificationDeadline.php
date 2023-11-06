<?php

/**
 * Legal Entity Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\LegalEntityManagement;

use \ArrayAccess;
use Adyen\Model\LegalEntityManagement\ObjectSerializer;

/**
 * VerificationDeadline Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class VerificationDeadline implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'VerificationDeadline';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'capabilities' => 'string[]',
        'entityIds' => 'string[]',
        'expiresAt' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'capabilities' => null,
        'entityIds' => null,
        'expiresAt' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'capabilities' => false,
        'entityIds' => false,
        'expiresAt' => false
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
        'capabilities' => 'capabilities',
        'entityIds' => 'entityIds',
        'expiresAt' => 'expiresAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'capabilities' => 'setCapabilities',
        'entityIds' => 'setEntityIds',
        'expiresAt' => 'setExpiresAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'capabilities' => 'getCapabilities',
        'entityIds' => 'getEntityIds',
        'expiresAt' => 'getExpiresAt'
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

    public const CAPABILITIES_ACCEPT_EXTERNAL_FUNDING = 'acceptExternalFunding';
    public const CAPABILITIES_ACCEPT_PSP_FUNDING = 'acceptPspFunding';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES = 'acceptTransactionInRestrictedCountries';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES_COMMERCIAL = 'acceptTransactionInRestrictedCountriesCommercial';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES_CONSUMER = 'acceptTransactionInRestrictedCountriesConsumer';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES = 'acceptTransactionInRestrictedIndustries';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES_COMMERCIAL = 'acceptTransactionInRestrictedIndustriesCommercial';
    public const CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES_CONSUMER = 'acceptTransactionInRestrictedIndustriesConsumer';
    public const CAPABILITIES_ACQUIRING = 'acquiring';
    public const CAPABILITIES_ATM_WITHDRAWAL = 'atmWithdrawal';
    public const CAPABILITIES_ATM_WITHDRAWAL_COMMERCIAL = 'atmWithdrawalCommercial';
    public const CAPABILITIES_ATM_WITHDRAWAL_CONSUMER = 'atmWithdrawalConsumer';
    public const CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES = 'atmWithdrawalInRestrictedCountries';
    public const CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES_COMMERCIAL = 'atmWithdrawalInRestrictedCountriesCommercial';
    public const CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES_CONSUMER = 'atmWithdrawalInRestrictedCountriesConsumer';
    public const CAPABILITIES_AUTHORISED_PAYMENT_INSTRUMENT_USER = 'authorisedPaymentInstrumentUser';
    public const CAPABILITIES_GET_GRANT_OFFERS = 'getGrantOffers';
    public const CAPABILITIES_ISSUE_BANK_ACCOUNT = 'issueBankAccount';
    public const CAPABILITIES_ISSUE_CARD = 'issueCard';
    public const CAPABILITIES_ISSUE_CARD_COMMERCIAL = 'issueCardCommercial';
    public const CAPABILITIES_ISSUE_CARD_CONSUMER = 'issueCardConsumer';
    public const CAPABILITIES_LOCAL_ACCEPTANCE = 'localAcceptance';
    public const CAPABILITIES_PAYOUT = 'payout';
    public const CAPABILITIES_PAYOUT_TO_TRANSFER_INSTRUMENT = 'payoutToTransferInstrument';
    public const CAPABILITIES_PROCESSING = 'processing';
    public const CAPABILITIES_RECEIVE_FROM_BALANCE_ACCOUNT = 'receiveFromBalanceAccount';
    public const CAPABILITIES_RECEIVE_FROM_PLATFORM_PAYMENTS = 'receiveFromPlatformPayments';
    public const CAPABILITIES_RECEIVE_FROM_THIRD_PARTY = 'receiveFromThirdParty';
    public const CAPABILITIES_RECEIVE_FROM_TRANSFER_INSTRUMENT = 'receiveFromTransferInstrument';
    public const CAPABILITIES_RECEIVE_GRANTS = 'receiveGrants';
    public const CAPABILITIES_RECEIVE_PAYMENTS = 'receivePayments';
    public const CAPABILITIES_SEND_TO_BALANCE_ACCOUNT = 'sendToBalanceAccount';
    public const CAPABILITIES_SEND_TO_THIRD_PARTY = 'sendToThirdParty';
    public const CAPABILITIES_SEND_TO_TRANSFER_INSTRUMENT = 'sendToTransferInstrument';
    public const CAPABILITIES_THIRD_PARTY_FUNDING = 'thirdPartyFunding';
    public const CAPABILITIES_USE_CARD = 'useCard';
    public const CAPABILITIES_USE_CARD_COMMERCIAL = 'useCardCommercial';
    public const CAPABILITIES_USE_CARD_CONSUMER = 'useCardConsumer';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES = 'useCardInRestrictedCountries';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES_COMMERCIAL = 'useCardInRestrictedCountriesCommercial';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES_CONSUMER = 'useCardInRestrictedCountriesConsumer';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES = 'useCardInRestrictedIndustries';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES_COMMERCIAL = 'useCardInRestrictedIndustriesCommercial';
    public const CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES_CONSUMER = 'useCardInRestrictedIndustriesConsumer';
    public const CAPABILITIES_WITHDRAW_FROM_ATM = 'withdrawFromAtm';
    public const CAPABILITIES_WITHDRAW_FROM_ATM_COMMERCIAL = 'withdrawFromAtmCommercial';
    public const CAPABILITIES_WITHDRAW_FROM_ATM_CONSUMER = 'withdrawFromAtmConsumer';
    public const CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES = 'withdrawFromAtmInRestrictedCountries';
    public const CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES_COMMERCIAL = 'withdrawFromAtmInRestrictedCountriesCommercial';
    public const CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES_CONSUMER = 'withdrawFromAtmInRestrictedCountriesConsumer';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCapabilitiesAllowableValues()
    {
        return [
            self::CAPABILITIES_ACCEPT_EXTERNAL_FUNDING,
            self::CAPABILITIES_ACCEPT_PSP_FUNDING,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES_COMMERCIAL,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_COUNTRIES_CONSUMER,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES_COMMERCIAL,
            self::CAPABILITIES_ACCEPT_TRANSACTION_IN_RESTRICTED_INDUSTRIES_CONSUMER,
            self::CAPABILITIES_ACQUIRING,
            self::CAPABILITIES_ATM_WITHDRAWAL,
            self::CAPABILITIES_ATM_WITHDRAWAL_COMMERCIAL,
            self::CAPABILITIES_ATM_WITHDRAWAL_CONSUMER,
            self::CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES,
            self::CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES_COMMERCIAL,
            self::CAPABILITIES_ATM_WITHDRAWAL_IN_RESTRICTED_COUNTRIES_CONSUMER,
            self::CAPABILITIES_AUTHORISED_PAYMENT_INSTRUMENT_USER,
            self::CAPABILITIES_GET_GRANT_OFFERS,
            self::CAPABILITIES_ISSUE_BANK_ACCOUNT,
            self::CAPABILITIES_ISSUE_CARD,
            self::CAPABILITIES_ISSUE_CARD_COMMERCIAL,
            self::CAPABILITIES_ISSUE_CARD_CONSUMER,
            self::CAPABILITIES_LOCAL_ACCEPTANCE,
            self::CAPABILITIES_PAYOUT,
            self::CAPABILITIES_PAYOUT_TO_TRANSFER_INSTRUMENT,
            self::CAPABILITIES_PROCESSING,
            self::CAPABILITIES_RECEIVE_FROM_BALANCE_ACCOUNT,
            self::CAPABILITIES_RECEIVE_FROM_PLATFORM_PAYMENTS,
            self::CAPABILITIES_RECEIVE_FROM_THIRD_PARTY,
            self::CAPABILITIES_RECEIVE_FROM_TRANSFER_INSTRUMENT,
            self::CAPABILITIES_RECEIVE_GRANTS,
            self::CAPABILITIES_RECEIVE_PAYMENTS,
            self::CAPABILITIES_SEND_TO_BALANCE_ACCOUNT,
            self::CAPABILITIES_SEND_TO_THIRD_PARTY,
            self::CAPABILITIES_SEND_TO_TRANSFER_INSTRUMENT,
            self::CAPABILITIES_THIRD_PARTY_FUNDING,
            self::CAPABILITIES_USE_CARD,
            self::CAPABILITIES_USE_CARD_COMMERCIAL,
            self::CAPABILITIES_USE_CARD_CONSUMER,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES_COMMERCIAL,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_COUNTRIES_CONSUMER,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES_COMMERCIAL,
            self::CAPABILITIES_USE_CARD_IN_RESTRICTED_INDUSTRIES_CONSUMER,
            self::CAPABILITIES_WITHDRAW_FROM_ATM,
            self::CAPABILITIES_WITHDRAW_FROM_ATM_COMMERCIAL,
            self::CAPABILITIES_WITHDRAW_FROM_ATM_CONSUMER,
            self::CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES,
            self::CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES_COMMERCIAL,
            self::CAPABILITIES_WITHDRAW_FROM_ATM_IN_RESTRICTED_COUNTRIES_CONSUMER,
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
        $this->setIfExists('capabilities', $data ?? [], null);
        $this->setIfExists('entityIds', $data ?? [], null);
        $this->setIfExists('expiresAt', $data ?? [], null);
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

        if ($this->container['capabilities'] === null) {
            $invalidProperties[] = "'capabilities' can't be null";
        }
        if ($this->container['expiresAt'] === null) {
            $invalidProperties[] = "'expiresAt' can't be null";
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
     * Gets capabilities
     *
     * @return string[]
     */
    public function getCapabilities()
    {
        return $this->container['capabilities'];
    }

    /**
     * Sets capabilities
     *
     * @param string[] $capabilities The names of the capabilities to be disallowed.
     *
     * @return self
     */
    public function setCapabilities($capabilities)
    {
        if (is_null($capabilities)) {
            throw new \InvalidArgumentException('non-nullable capabilities cannot be null');
        }
        $allowedValues = $this->getCapabilitiesAllowableValues();
        if (array_diff($capabilities, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'capabilities', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['capabilities'] = $capabilities;

        return $this;
    }

    /**
     * Gets entityIds
     *
     * @return string[]|null
     */
    public function getEntityIds()
    {
        return $this->container['entityIds'];
    }

    /**
     * Sets entityIds
     *
     * @param string[]|null $entityIds The unique identifiers of the bank account(s) that the deadline applies to
     *
     * @return self
     */
    public function setEntityIds($entityIds)
    {
        if (is_null($entityIds)) {
            throw new \InvalidArgumentException('non-nullable entityIds cannot be null');
        }
        $this->container['entityIds'] = $entityIds;

        return $this;
    }

    /**
     * Gets expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->container['expiresAt'];
    }

    /**
     * Sets expiresAt
     *
     * @param \DateTime $expiresAt The date that verification is due by before capabilities are disallowed.
     *
     * @return self
     */
    public function setExpiresAt($expiresAt)
    {
        if (is_null($expiresAt)) {
            throw new \InvalidArgumentException('non-nullable expiresAt cannot be null');
        }
        $this->container['expiresAt'] = $expiresAt;

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
