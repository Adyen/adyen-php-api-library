<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

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
        'authentication_value' => 'string',
        'cavv_algorithm' => 'string',
        'challenge_cancel' => 'string',
        'challenge_indicator' => 'string',
        'ds_trans_id' => 'string',
        'eci' => 'string',
        'exemption_indicator' => 'string',
        'message_version' => 'string',
        'risk_score' => 'string',
        'three_ds_server_trans_id' => 'string',
        'timestamp' => 'string',
        'trans_status' => 'string',
        'trans_status_reason' => 'string',
        'white_list_status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'authentication_value' => null,
        'cavv_algorithm' => null,
        'challenge_cancel' => null,
        'challenge_indicator' => null,
        'ds_trans_id' => null,
        'eci' => null,
        'exemption_indicator' => null,
        'message_version' => null,
        'risk_score' => null,
        'three_ds_server_trans_id' => null,
        'timestamp' => null,
        'trans_status' => null,
        'trans_status_reason' => null,
        'white_list_status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'authentication_value' => false,
		'cavv_algorithm' => false,
		'challenge_cancel' => false,
		'challenge_indicator' => false,
		'ds_trans_id' => false,
		'eci' => false,
		'exemption_indicator' => false,
		'message_version' => false,
		'risk_score' => false,
		'three_ds_server_trans_id' => false,
		'timestamp' => false,
		'trans_status' => false,
		'trans_status_reason' => false,
		'white_list_status' => false
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
        'authentication_value' => 'authenticationValue',
        'cavv_algorithm' => 'cavvAlgorithm',
        'challenge_cancel' => 'challengeCancel',
        'challenge_indicator' => 'challengeIndicator',
        'ds_trans_id' => 'dsTransID',
        'eci' => 'eci',
        'exemption_indicator' => 'exemptionIndicator',
        'message_version' => 'messageVersion',
        'risk_score' => 'riskScore',
        'three_ds_server_trans_id' => 'threeDSServerTransID',
        'timestamp' => 'timestamp',
        'trans_status' => 'transStatus',
        'trans_status_reason' => 'transStatusReason',
        'white_list_status' => 'whiteListStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'authentication_value' => 'setAuthenticationValue',
        'cavv_algorithm' => 'setCavvAlgorithm',
        'challenge_cancel' => 'setChallengeCancel',
        'challenge_indicator' => 'setChallengeIndicator',
        'ds_trans_id' => 'setDsTransId',
        'eci' => 'setEci',
        'exemption_indicator' => 'setExemptionIndicator',
        'message_version' => 'setMessageVersion',
        'risk_score' => 'setRiskScore',
        'three_ds_server_trans_id' => 'setThreeDsServerTransId',
        'timestamp' => 'setTimestamp',
        'trans_status' => 'setTransStatus',
        'trans_status_reason' => 'setTransStatusReason',
        'white_list_status' => 'setWhiteListStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'authentication_value' => 'getAuthenticationValue',
        'cavv_algorithm' => 'getCavvAlgorithm',
        'challenge_cancel' => 'getChallengeCancel',
        'challenge_indicator' => 'getChallengeIndicator',
        'ds_trans_id' => 'getDsTransId',
        'eci' => 'getEci',
        'exemption_indicator' => 'getExemptionIndicator',
        'message_version' => 'getMessageVersion',
        'risk_score' => 'getRiskScore',
        'three_ds_server_trans_id' => 'getThreeDsServerTransId',
        'timestamp' => 'getTimestamp',
        'trans_status' => 'getTransStatus',
        'trans_status_reason' => 'getTransStatusReason',
        'white_list_status' => 'getWhiteListStatus'
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
    public const CHALLENGE_INDICATOR_NO_PREFERENCE = 'noPreference';
    public const CHALLENGE_INDICATOR_REQUEST_NO_CHALLENGE = 'requestNoChallenge';
    public const CHALLENGE_INDICATOR_REQUEST_CHALLENGE = 'requestChallenge';
    public const CHALLENGE_INDICATOR_REQUEST_CHALLENGE_AS_MANDATE = 'requestChallengeAsMandate';
    public const EXEMPTION_INDICATOR_LOW_VALUE = 'lowValue';
    public const EXEMPTION_INDICATOR_SECURE_CORPORATE = 'secureCorporate';
    public const EXEMPTION_INDICATOR_TRUSTED_BENEFICIARY = 'trustedBeneficiary';
    public const EXEMPTION_INDICATOR_TRANSACTION_RISK_ANALYSIS = 'transactionRiskAnalysis';

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
    public function getChallengeIndicatorAllowableValues()
    {
        return [
            self::CHALLENGE_INDICATOR_NO_PREFERENCE,
            self::CHALLENGE_INDICATOR_REQUEST_NO_CHALLENGE,
            self::CHALLENGE_INDICATOR_REQUEST_CHALLENGE,
            self::CHALLENGE_INDICATOR_REQUEST_CHALLENGE_AS_MANDATE,
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
        $this->setIfExists('authentication_value', $data ?? [], null);
        $this->setIfExists('cavv_algorithm', $data ?? [], null);
        $this->setIfExists('challenge_cancel', $data ?? [], null);
        $this->setIfExists('challenge_indicator', $data ?? [], null);
        $this->setIfExists('ds_trans_id', $data ?? [], null);
        $this->setIfExists('eci', $data ?? [], null);
        $this->setIfExists('exemption_indicator', $data ?? [], null);
        $this->setIfExists('message_version', $data ?? [], null);
        $this->setIfExists('risk_score', $data ?? [], null);
        $this->setIfExists('three_ds_server_trans_id', $data ?? [], null);
        $this->setIfExists('timestamp', $data ?? [], null);
        $this->setIfExists('trans_status', $data ?? [], null);
        $this->setIfExists('trans_status_reason', $data ?? [], null);
        $this->setIfExists('white_list_status', $data ?? [], null);
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
        if (!is_null($this->container['challenge_cancel']) && !in_array($this->container['challenge_cancel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challenge_cancel', must be one of '%s'",
                $this->container['challenge_cancel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getChallengeIndicatorAllowableValues();
        if (!is_null($this->container['challenge_indicator']) && !in_array($this->container['challenge_indicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challenge_indicator', must be one of '%s'",
                $this->container['challenge_indicator'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getExemptionIndicatorAllowableValues();
        if (!is_null($this->container['exemption_indicator']) && !in_array($this->container['exemption_indicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'exemption_indicator', must be one of '%s'",
                $this->container['exemption_indicator'],
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
     * Gets authentication_value
     *
     * @return string|null
     */
    public function getAuthenticationValue()
    {
        return $this->container['authentication_value'];
    }

    /**
     * Sets authentication_value
     *
     * @param string|null $authentication_value The `authenticationValue` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setAuthenticationValue($authentication_value)
    {
        if (is_null($authentication_value)) {
            throw new \InvalidArgumentException('non-nullable authentication_value cannot be null');
        }
        $this->container['authentication_value'] = $authentication_value;

        return $this;
    }

    /**
     * Gets cavv_algorithm
     *
     * @return string|null
     */
    public function getCavvAlgorithm()
    {
        return $this->container['cavv_algorithm'];
    }

    /**
     * Sets cavv_algorithm
     *
     * @param string|null $cavv_algorithm The algorithm used by the ACS to calculate the authentication value, only for Cartes Bancaires integrations.
     *
     * @return self
     */
    public function setCavvAlgorithm($cavv_algorithm)
    {
        if (is_null($cavv_algorithm)) {
            throw new \InvalidArgumentException('non-nullable cavv_algorithm cannot be null');
        }
        $this->container['cavv_algorithm'] = $cavv_algorithm;

        return $this;
    }

    /**
     * Gets challenge_cancel
     *
     * @return string|null
     */
    public function getChallengeCancel()
    {
        return $this->container['challenge_cancel'];
    }

    /**
     * Sets challenge_cancel
     *
     * @param string|null $challenge_cancel Indicator informing the Access Control Server (ACS) and the Directory Server (DS) that the authentication has been cancelled. For possible values, refer to [3D Secure API reference](https://docs.adyen.com/online-payments/3d-secure/api-reference#mpidata).
     *
     * @return self
     */
    public function setChallengeCancel($challenge_cancel)
    {
        if (is_null($challenge_cancel)) {
            throw new \InvalidArgumentException('non-nullable challenge_cancel cannot be null');
        }
        $allowedValues = $this->getChallengeCancelAllowableValues();
        if (!in_array($challenge_cancel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'challenge_cancel', must be one of '%s'",
                    $challenge_cancel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['challenge_cancel'] = $challenge_cancel;

        return $this;
    }

    /**
     * Gets challenge_indicator
     *
     * @return string|null
     */
    public function getChallengeIndicator()
    {
        return $this->container['challenge_indicator'];
    }

    /**
     * Sets challenge_indicator
     *
     * @param string|null $challenge_indicator Specifies a preference for receiving a challenge from the issuer. Allowed values: * `noPreference` * `requestNoChallenge` * `requestChallenge` * `requestChallengeAsMandate`
     *
     * @return self
     */
    public function setChallengeIndicator($challenge_indicator)
    {
        if (is_null($challenge_indicator)) {
            throw new \InvalidArgumentException('non-nullable challenge_indicator cannot be null');
        }
        $allowedValues = $this->getChallengeIndicatorAllowableValues();
        if (!in_array($challenge_indicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'challenge_indicator', must be one of '%s'",
                    $challenge_indicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['challenge_indicator'] = $challenge_indicator;

        return $this;
    }

    /**
     * Gets ds_trans_id
     *
     * @return string|null
     */
    public function getDsTransId()
    {
        return $this->container['ds_trans_id'];
    }

    /**
     * Sets ds_trans_id
     *
     * @param string|null $ds_trans_id The `dsTransID` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setDsTransId($ds_trans_id)
    {
        if (is_null($ds_trans_id)) {
            throw new \InvalidArgumentException('non-nullable ds_trans_id cannot be null');
        }
        $this->container['ds_trans_id'] = $ds_trans_id;

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
        if (is_null($eci)) {
            throw new \InvalidArgumentException('non-nullable eci cannot be null');
        }
        $this->container['eci'] = $eci;

        return $this;
    }

    /**
     * Gets exemption_indicator
     *
     * @return string|null
     */
    public function getExemptionIndicator()
    {
        return $this->container['exemption_indicator'];
    }

    /**
     * Sets exemption_indicator
     *
     * @param string|null $exemption_indicator Indicates the exemption type that was applied by the issuer to the authentication, if exemption applied. Allowed values: * `lowValue` * `secureCorporate` * `trustedBeneficiary` * `transactionRiskAnalysis`
     *
     * @return self
     */
    public function setExemptionIndicator($exemption_indicator)
    {
        if (is_null($exemption_indicator)) {
            throw new \InvalidArgumentException('non-nullable exemption_indicator cannot be null');
        }
        $allowedValues = $this->getExemptionIndicatorAllowableValues();
        if (!in_array($exemption_indicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'exemption_indicator', must be one of '%s'",
                    $exemption_indicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['exemption_indicator'] = $exemption_indicator;

        return $this;
    }

    /**
     * Gets message_version
     *
     * @return string|null
     */
    public function getMessageVersion()
    {
        return $this->container['message_version'];
    }

    /**
     * Sets message_version
     *
     * @param string|null $message_version The `messageVersion` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setMessageVersion($message_version)
    {
        if (is_null($message_version)) {
            throw new \InvalidArgumentException('non-nullable message_version cannot be null');
        }
        $this->container['message_version'] = $message_version;

        return $this;
    }

    /**
     * Gets risk_score
     *
     * @return string|null
     */
    public function getRiskScore()
    {
        return $this->container['risk_score'];
    }

    /**
     * Sets risk_score
     *
     * @param string|null $risk_score Risk score calculated by Cartes Bancaires Directory Server (DS).
     *
     * @return self
     */
    public function setRiskScore($risk_score)
    {
        if (is_null($risk_score)) {
            throw new \InvalidArgumentException('non-nullable risk_score cannot be null');
        }
        $this->container['risk_score'] = $risk_score;

        return $this;
    }

    /**
     * Gets three_ds_server_trans_id
     *
     * @return string|null
     */
    public function getThreeDsServerTransId()
    {
        return $this->container['three_ds_server_trans_id'];
    }

    /**
     * Sets three_ds_server_trans_id
     *
     * @param string|null $three_ds_server_trans_id The `threeDSServerTransID` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setThreeDsServerTransId($three_ds_server_trans_id)
    {
        if (is_null($three_ds_server_trans_id)) {
            throw new \InvalidArgumentException('non-nullable three_ds_server_trans_id cannot be null');
        }
        $this->container['three_ds_server_trans_id'] = $three_ds_server_trans_id;

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
        if (is_null($timestamp)) {
            throw new \InvalidArgumentException('non-nullable timestamp cannot be null');
        }
        $this->container['timestamp'] = $timestamp;

        return $this;
    }

    /**
     * Gets trans_status
     *
     * @return string|null
     */
    public function getTransStatus()
    {
        return $this->container['trans_status'];
    }

    /**
     * Sets trans_status
     *
     * @param string|null $trans_status The `transStatus` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setTransStatus($trans_status)
    {
        if (is_null($trans_status)) {
            throw new \InvalidArgumentException('non-nullable trans_status cannot be null');
        }
        $this->container['trans_status'] = $trans_status;

        return $this;
    }

    /**
     * Gets trans_status_reason
     *
     * @return string|null
     */
    public function getTransStatusReason()
    {
        return $this->container['trans_status_reason'];
    }

    /**
     * Sets trans_status_reason
     *
     * @param string|null $trans_status_reason Provides information on why the `transStatus` field has the specified value. For possible values, refer to [our docs](https://docs.adyen.com/online-payments/3d-secure/api-reference#possible-transstatusreason-values).
     *
     * @return self
     */
    public function setTransStatusReason($trans_status_reason)
    {
        if (is_null($trans_status_reason)) {
            throw new \InvalidArgumentException('non-nullable trans_status_reason cannot be null');
        }
        $this->container['trans_status_reason'] = $trans_status_reason;

        return $this;
    }

    /**
     * Gets white_list_status
     *
     * @return string|null
     */
    public function getWhiteListStatus()
    {
        return $this->container['white_list_status'];
    }

    /**
     * Sets white_list_status
     *
     * @param string|null $white_list_status The `whiteListStatus` value as defined in the 3D Secure 2 specification.
     *
     * @return self
     */
    public function setWhiteListStatus($white_list_status)
    {
        if (is_null($white_list_status)) {
            throw new \InvalidArgumentException('non-nullable white_list_status cannot be null');
        }
        $this->container['white_list_status'] = $white_list_status;

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

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


