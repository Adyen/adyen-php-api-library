<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * ThreeDS2Result Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDS2Result implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDS2Result';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'authenticationValue' => 'string',
        'cavvAlgorithm' => 'string',
        'challengeCancel' => 'string',
        'dsTransID' => 'string',
        'eci' => 'string',
        'exemptionIndicator' => 'string',
        'messageVersion' => 'string',
        'riskScore' => 'string',
        'threeDSRequestorChallengeInd' => 'string',
        'threeDSServerTransID' => 'string',
        'timestamp' => 'string',
        'transStatus' => 'string',
        'transStatusReason' => 'string',
        'whiteListStatus' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'authenticationValue' => null,
        'cavvAlgorithm' => null,
        'challengeCancel' => null,
        'dsTransID' => null,
        'eci' => null,
        'exemptionIndicator' => null,
        'messageVersion' => null,
        'riskScore' => null,
        'threeDSRequestorChallengeInd' => null,
        'threeDSServerTransID' => null,
        'timestamp' => null,
        'transStatus' => null,
        'transStatusReason' => null,
        'whiteListStatus' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'authenticationValue' => false,
        'cavvAlgorithm' => false,
        'challengeCancel' => false,
        'dsTransID' => false,
        'eci' => false,
        'exemptionIndicator' => false,
        'messageVersion' => false,
        'riskScore' => false,
        'threeDSRequestorChallengeInd' => false,
        'threeDSServerTransID' => false,
        'timestamp' => false,
        'transStatus' => false,
        'transStatusReason' => false,
        'whiteListStatus' => false
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
        'authenticationValue' => 'authenticationValue',
        'cavvAlgorithm' => 'cavvAlgorithm',
        'challengeCancel' => 'challengeCancel',
        'dsTransID' => 'dsTransID',
        'eci' => 'eci',
        'exemptionIndicator' => 'exemptionIndicator',
        'messageVersion' => 'messageVersion',
        'riskScore' => 'riskScore',
        'threeDSRequestorChallengeInd' => 'threeDSRequestorChallengeInd',
        'threeDSServerTransID' => 'threeDSServerTransID',
        'timestamp' => 'timestamp',
        'transStatus' => 'transStatus',
        'transStatusReason' => 'transStatusReason',
        'whiteListStatus' => 'whiteListStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'authenticationValue' => 'setAuthenticationValue',
        'cavvAlgorithm' => 'setCavvAlgorithm',
        'challengeCancel' => 'setChallengeCancel',
        'dsTransID' => 'setDsTransID',
        'eci' => 'setEci',
        'exemptionIndicator' => 'setExemptionIndicator',
        'messageVersion' => 'setMessageVersion',
        'riskScore' => 'setRiskScore',
        'threeDSRequestorChallengeInd' => 'setThreeDSRequestorChallengeInd',
        'threeDSServerTransID' => 'setThreeDSServerTransID',
        'timestamp' => 'setTimestamp',
        'transStatus' => 'setTransStatus',
        'transStatusReason' => 'setTransStatusReason',
        'whiteListStatus' => 'setWhiteListStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'authenticationValue' => 'getAuthenticationValue',
        'cavvAlgorithm' => 'getCavvAlgorithm',
        'challengeCancel' => 'getChallengeCancel',
        'dsTransID' => 'getDsTransID',
        'eci' => 'getEci',
        'exemptionIndicator' => 'getExemptionIndicator',
        'messageVersion' => 'getMessageVersion',
        'riskScore' => 'getRiskScore',
        'threeDSRequestorChallengeInd' => 'getThreeDSRequestorChallengeInd',
        'threeDSServerTransID' => 'getThreeDSServerTransID',
        'timestamp' => 'getTimestamp',
        'transStatus' => 'getTransStatus',
        'transStatusReason' => 'getTransStatusReason',
        'whiteListStatus' => 'getWhiteListStatus'
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

    public const CHALLENGE_CANCEL__01 = '01';
    public const CHALLENGE_CANCEL__02 = '02';
    public const CHALLENGE_CANCEL__03 = '03';
    public const CHALLENGE_CANCEL__04 = '04';
    public const CHALLENGE_CANCEL__05 = '05';
    public const CHALLENGE_CANCEL__06 = '06';
    public const CHALLENGE_CANCEL__07 = '07';
    public const EXEMPTION_INDICATOR_LOW_VALUE = 'lowValue';
    public const EXEMPTION_INDICATOR_SECURE_CORPORATE = 'secureCorporate';
    public const EXEMPTION_INDICATOR_TRUSTED_BENEFICIARY = 'trustedBeneficiary';
    public const EXEMPTION_INDICATOR_TRANSACTION_RISK_ANALYSIS = 'transactionRiskAnalysis';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__01 = '01';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__02 = '02';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__03 = '03';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__04 = '04';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__05 = '05';
    public const THREE_DS_REQUESTOR_CHALLENGE_IND__06 = '06';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChallengeCancelAllowableValues()
    {
        return [
            self::CHALLENGE_CANCEL__01,
            self::CHALLENGE_CANCEL__02,
            self::CHALLENGE_CANCEL__03,
            self::CHALLENGE_CANCEL__04,
            self::CHALLENGE_CANCEL__05,
            self::CHALLENGE_CANCEL__06,
            self::CHALLENGE_CANCEL__07,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getExemptionIndicatorAllowableValues()
    {
        return [
            self::EXEMPTION_INDICATOR_LOW_VALUE,
            self::EXEMPTION_INDICATOR_SECURE_CORPORATE,
            self::EXEMPTION_INDICATOR_TRUSTED_BENEFICIARY,
            self::EXEMPTION_INDICATOR_TRANSACTION_RISK_ANALYSIS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getThreeDSRequestorChallengeIndAllowableValues()
    {
        return [
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__01,
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__02,
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__03,
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__04,
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__05,
            self::THREE_DS_REQUESTOR_CHALLENGE_IND__06,
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
        $this->setIfExists('authenticationValue', $data ?? [], null);
        $this->setIfExists('cavvAlgorithm', $data ?? [], null);
        $this->setIfExists('challengeCancel', $data ?? [], null);
        $this->setIfExists('dsTransID', $data ?? [], null);
        $this->setIfExists('eci', $data ?? [], null);
        $this->setIfExists('exemptionIndicator', $data ?? [], null);
        $this->setIfExists('messageVersion', $data ?? [], null);
        $this->setIfExists('riskScore', $data ?? [], null);
        $this->setIfExists('threeDSRequestorChallengeInd', $data ?? [], null);
        $this->setIfExists('threeDSServerTransID', $data ?? [], null);
        $this->setIfExists('timestamp', $data ?? [], null);
        $this->setIfExists('transStatus', $data ?? [], null);
        $this->setIfExists('transStatusReason', $data ?? [], null);
        $this->setIfExists('whiteListStatus', $data ?? [], null);
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

        $allowedValues = $this->getChallengeCancelAllowableValues();
        if (!is_null($this->container['challengeCancel']) && !in_array($this->container['challengeCancel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challengeCancel', must be one of '%s'",
                $this->container['challengeCancel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getExemptionIndicatorAllowableValues();
        if (!is_null($this->container['exemptionIndicator']) && !in_array($this->container['exemptionIndicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'exemptionIndicator', must be one of '%s'",
                $this->container['exemptionIndicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getThreeDSRequestorChallengeIndAllowableValues();
        if (!is_null($this->container['threeDSRequestorChallengeInd']) && !in_array($this->container['threeDSRequestorChallengeInd'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'threeDSRequestorChallengeInd', must be one of '%s'",
                $this->container['threeDSRequestorChallengeInd'],
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
     * Gets authenticationValue
     *
     * @return string|null
     */
    public function getAuthenticationValue()
    {
        return $this->container['authenticationValue'];
    }

    /**
     * Sets authenticationValue
     *
     * @param string|null $authenticationValue The `authenticationValue` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setAuthenticationValue($authenticationValue)
    {
        $this->container['authenticationValue'] = $authenticationValue;

        return $this;
    }

    /**
     * Gets cavvAlgorithm
     *
     * @return string|null
     */
    public function getCavvAlgorithm()
    {
        return $this->container['cavvAlgorithm'];
    }

    /**
     * Sets cavvAlgorithm
     *
     * @param string|null $cavvAlgorithm The algorithm used by the ACS to calculate the authentication value, only for Cartes Bancaires integrations.
     *
     * @return self
     */
    public function setCavvAlgorithm($cavvAlgorithm)
    {
        $this->container['cavvAlgorithm'] = $cavvAlgorithm;

        return $this;
    }

    /**
     * Gets challengeCancel
     *
     * @return string|null
     */
    public function getChallengeCancel()
    {
        return $this->container['challengeCancel'];
    }

    /**
     * Sets challengeCancel
     *
     * @param string|null $challengeCancel Indicator informing the Access Control Server (ACS) and the Directory Server (DS) that the authentication has been cancelled. For possible values, refer to [3D Secure API reference](https://docs.adyen.com/online-payments/3d-secure/api-reference#mpidata).
     *
     * @return self
     */
    public function setChallengeCancel($challengeCancel)
    {
        $allowedValues = $this->getChallengeCancelAllowableValues();
        if (!in_array($challengeCancel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'challengeCancel', must be one of '%s'",
                    $challengeCancel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['challengeCancel'] = $challengeCancel;

        return $this;
    }

    /**
     * Gets dsTransID
     *
     * @return string|null
     */
    public function getDsTransID()
    {
        return $this->container['dsTransID'];
    }

    /**
     * Sets dsTransID
     *
     * @param string|null $dsTransID The `dsTransID` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setDsTransID($dsTransID)
    {
        $this->container['dsTransID'] = $dsTransID;

        return $this;
    }

    /**
     * Gets eci
     *
     * @return string|null
     */
    public function getEci()
    {
        return $this->container['eci'];
    }

    /**
     * Sets eci
     *
     * @param string|null $eci The `eci` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setEci($eci)
    {
        $this->container['eci'] = $eci;

        return $this;
    }

    /**
     * Gets exemptionIndicator
     *
     * @return string|null
     */
    public function getExemptionIndicator()
    {
        return $this->container['exemptionIndicator'];
    }

    /**
     * Sets exemptionIndicator
     *
     * @param string|null $exemptionIndicator Indicates the exemption type that was applied by the issuer to the authentication, if exemption applied. Allowed values: * `lowValue` * `secureCorporate` * `trustedBeneficiary` * `transactionRiskAnalysis`
     *
     * @return self
     */
    public function setExemptionIndicator($exemptionIndicator)
    {
        $allowedValues = $this->getExemptionIndicatorAllowableValues();
        if (!in_array($exemptionIndicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'exemptionIndicator', must be one of '%s'",
                    $exemptionIndicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['exemptionIndicator'] = $exemptionIndicator;

        return $this;
    }

    /**
     * Gets messageVersion
     *
     * @return string|null
     */
    public function getMessageVersion()
    {
        return $this->container['messageVersion'];
    }

    /**
     * Sets messageVersion
     *
     * @param string|null $messageVersion The `messageVersion` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setMessageVersion($messageVersion)
    {
        $this->container['messageVersion'] = $messageVersion;

        return $this;
    }

    /**
     * Gets riskScore
     *
     * @return string|null
     */
    public function getRiskScore()
    {
        return $this->container['riskScore'];
    }

    /**
     * Sets riskScore
     *
     * @param string|null $riskScore Risk score calculated by Cartes Bancaires Directory Server (DS).
     *
     * @return self
     */
    public function setRiskScore($riskScore)
    {
        $this->container['riskScore'] = $riskScore;

        return $this;
    }

    /**
     * Gets threeDSRequestorChallengeInd
     *
     * @return string|null
     */
    public function getThreeDSRequestorChallengeInd()
    {
        return $this->container['threeDSRequestorChallengeInd'];
    }

    /**
     * Sets threeDSRequestorChallengeInd
     *
     * @param string|null $threeDSRequestorChallengeInd Indicates whether a challenge is requested for this transaction. Possible values: * **01** — No preference * **02** — No challenge requested * **03** — Challenge requested (3DS Requestor preference) * **04** — Challenge requested (Mandate) * **05** — No challenge (transactional risk analysis is already performed) * **06** — Data Only
     *
     * @return self
     */
    public function setThreeDSRequestorChallengeInd($threeDSRequestorChallengeInd)
    {
        $allowedValues = $this->getThreeDSRequestorChallengeIndAllowableValues();
        if (!in_array($threeDSRequestorChallengeInd, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'threeDSRequestorChallengeInd', must be one of '%s'",
                    $threeDSRequestorChallengeInd,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['threeDSRequestorChallengeInd'] = $threeDSRequestorChallengeInd;

        return $this;
    }

    /**
     * Gets threeDSServerTransID
     *
     * @return string|null
     */
    public function getThreeDSServerTransID()
    {
        return $this->container['threeDSServerTransID'];
    }

    /**
     * Sets threeDSServerTransID
     *
     * @param string|null $threeDSServerTransID The `threeDSServerTransID` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setThreeDSServerTransID($threeDSServerTransID)
    {
        $this->container['threeDSServerTransID'] = $threeDSServerTransID;

        return $this;
    }

    /**
     * Gets timestamp
     *
     * @return string|null
     */
    public function getTimestamp()
    {
        return $this->container['timestamp'];
    }

    /**
     * Sets timestamp
     *
     * @param string|null $timestamp The `timestamp` value of the 3D Secure 2 authentication.
     *
     * @return self
     */
    public function setTimestamp($timestamp)
    {
        $this->container['timestamp'] = $timestamp;

        return $this;
    }

    /**
     * Gets transStatus
     *
     * @return string|null
     */
    public function getTransStatus()
    {
        return $this->container['transStatus'];
    }

    /**
     * Sets transStatus
     *
     * @param string|null $transStatus The `transStatus` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setTransStatus($transStatus)
    {
        $this->container['transStatus'] = $transStatus;

        return $this;
    }

    /**
     * Gets transStatusReason
     *
     * @return string|null
     */
    public function getTransStatusReason()
    {
        return $this->container['transStatusReason'];
    }

    /**
     * Sets transStatusReason
     *
     * @param string|null $transStatusReason Provides information on why the `transStatus` field has the specified value. For possible values, refer to [our docs](https://docs.adyen.com/online-payments/3d-secure/api-reference#possible-transstatusreason-values).
     *
     * @return self
     */
    public function setTransStatusReason($transStatusReason)
    {
        $this->container['transStatusReason'] = $transStatusReason;

        return $this;
    }

    /**
     * Gets whiteListStatus
     *
     * @return string|null
     */
    public function getWhiteListStatus()
    {
        return $this->container['whiteListStatus'];
    }

    /**
     * Sets whiteListStatus
     *
     * @param string|null $whiteListStatus The `whiteListStatus` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setWhiteListStatus($whiteListStatus)
    {
        $this->container['whiteListStatus'] = $whiteListStatus;

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
