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
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Checkout;

use \ArrayAccess;
use \Adyen\Model\Checkout\ObjectSerializer;

/**
 * ThreeDS2ResponseData Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDS2ResponseData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDS2ResponseData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'acs_challenge_mandated' => 'string',
        'acs_operator_id' => 'string',
        'acs_reference_number' => 'string',
        'acs_signed_content' => 'string',
        'acs_trans_id' => 'string',
        'acs_url' => 'string',
        'authentication_type' => 'string',
        'card_holder_info' => 'string',
        'cavv_algorithm' => 'string',
        'challenge_indicator' => 'string',
        'ds_reference_number' => 'string',
        'ds_trans_id' => 'string',
        'exemption_indicator' => 'string',
        'message_version' => 'string',
        'risk_score' => 'string',
        'sdk_ephem_pub_key' => 'string',
        'three_ds_server_trans_id' => 'string',
        'trans_status' => 'string',
        'trans_status_reason' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'acs_challenge_mandated' => null,
        'acs_operator_id' => null,
        'acs_reference_number' => null,
        'acs_signed_content' => null,
        'acs_trans_id' => null,
        'acs_url' => null,
        'authentication_type' => null,
        'card_holder_info' => null,
        'cavv_algorithm' => null,
        'challenge_indicator' => null,
        'ds_reference_number' => null,
        'ds_trans_id' => null,
        'exemption_indicator' => null,
        'message_version' => null,
        'risk_score' => null,
        'sdk_ephem_pub_key' => null,
        'three_ds_server_trans_id' => null,
        'trans_status' => null,
        'trans_status_reason' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'acs_challenge_mandated' => false,
		'acs_operator_id' => false,
		'acs_reference_number' => false,
		'acs_signed_content' => false,
		'acs_trans_id' => false,
		'acs_url' => false,
		'authentication_type' => false,
		'card_holder_info' => false,
		'cavv_algorithm' => false,
		'challenge_indicator' => false,
		'ds_reference_number' => false,
		'ds_trans_id' => false,
		'exemption_indicator' => false,
		'message_version' => false,
		'risk_score' => false,
		'sdk_ephem_pub_key' => false,
		'three_ds_server_trans_id' => false,
		'trans_status' => false,
		'trans_status_reason' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
        'acs_challenge_mandated' => 'acsChallengeMandated',
        'acs_operator_id' => 'acsOperatorID',
        'acs_reference_number' => 'acsReferenceNumber',
        'acs_signed_content' => 'acsSignedContent',
        'acs_trans_id' => 'acsTransID',
        'acs_url' => 'acsURL',
        'authentication_type' => 'authenticationType',
        'card_holder_info' => 'cardHolderInfo',
        'cavv_algorithm' => 'cavvAlgorithm',
        'challenge_indicator' => 'challengeIndicator',
        'ds_reference_number' => 'dsReferenceNumber',
        'ds_trans_id' => 'dsTransID',
        'exemption_indicator' => 'exemptionIndicator',
        'message_version' => 'messageVersion',
        'risk_score' => 'riskScore',
        'sdk_ephem_pub_key' => 'sdkEphemPubKey',
        'three_ds_server_trans_id' => 'threeDSServerTransID',
        'trans_status' => 'transStatus',
        'trans_status_reason' => 'transStatusReason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'acs_challenge_mandated' => 'setAcsChallengeMandated',
        'acs_operator_id' => 'setAcsOperatorId',
        'acs_reference_number' => 'setAcsReferenceNumber',
        'acs_signed_content' => 'setAcsSignedContent',
        'acs_trans_id' => 'setAcsTransId',
        'acs_url' => 'setAcsUrl',
        'authentication_type' => 'setAuthenticationType',
        'card_holder_info' => 'setCardHolderInfo',
        'cavv_algorithm' => 'setCavvAlgorithm',
        'challenge_indicator' => 'setChallengeIndicator',
        'ds_reference_number' => 'setDsReferenceNumber',
        'ds_trans_id' => 'setDsTransId',
        'exemption_indicator' => 'setExemptionIndicator',
        'message_version' => 'setMessageVersion',
        'risk_score' => 'setRiskScore',
        'sdk_ephem_pub_key' => 'setSdkEphemPubKey',
        'three_ds_server_trans_id' => 'setThreeDsServerTransId',
        'trans_status' => 'setTransStatus',
        'trans_status_reason' => 'setTransStatusReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'acs_challenge_mandated' => 'getAcsChallengeMandated',
        'acs_operator_id' => 'getAcsOperatorId',
        'acs_reference_number' => 'getAcsReferenceNumber',
        'acs_signed_content' => 'getAcsSignedContent',
        'acs_trans_id' => 'getAcsTransId',
        'acs_url' => 'getAcsUrl',
        'authentication_type' => 'getAuthenticationType',
        'card_holder_info' => 'getCardHolderInfo',
        'cavv_algorithm' => 'getCavvAlgorithm',
        'challenge_indicator' => 'getChallengeIndicator',
        'ds_reference_number' => 'getDsReferenceNumber',
        'ds_trans_id' => 'getDsTransId',
        'exemption_indicator' => 'getExemptionIndicator',
        'message_version' => 'getMessageVersion',
        'risk_score' => 'getRiskScore',
        'sdk_ephem_pub_key' => 'getSdkEphemPubKey',
        'three_ds_server_trans_id' => 'getThreeDsServerTransId',
        'trans_status' => 'getTransStatus',
        'trans_status_reason' => 'getTransStatusReason'
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
        $this->setIfExists('acs_challenge_mandated', $data ?? [], null);
        $this->setIfExists('acs_operator_id', $data ?? [], null);
        $this->setIfExists('acs_reference_number', $data ?? [], null);
        $this->setIfExists('acs_signed_content', $data ?? [], null);
        $this->setIfExists('acs_trans_id', $data ?? [], null);
        $this->setIfExists('acs_url', $data ?? [], null);
        $this->setIfExists('authentication_type', $data ?? [], null);
        $this->setIfExists('card_holder_info', $data ?? [], null);
        $this->setIfExists('cavv_algorithm', $data ?? [], null);
        $this->setIfExists('challenge_indicator', $data ?? [], null);
        $this->setIfExists('ds_reference_number', $data ?? [], null);
        $this->setIfExists('ds_trans_id', $data ?? [], null);
        $this->setIfExists('exemption_indicator', $data ?? [], null);
        $this->setIfExists('message_version', $data ?? [], null);
        $this->setIfExists('risk_score', $data ?? [], null);
        $this->setIfExists('sdk_ephem_pub_key', $data ?? [], null);
        $this->setIfExists('three_ds_server_trans_id', $data ?? [], null);
        $this->setIfExists('trans_status', $data ?? [], null);
        $this->setIfExists('trans_status_reason', $data ?? [], null);
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
     * Gets acs_challenge_mandated
     *
     * @return string|null
     */
    public function getAcsChallengeMandated()
    {
        return $this->container['acs_challenge_mandated'];
    }

    /**
     * Sets acs_challenge_mandated
     *
     * @param string|null $acs_challenge_mandated acs_challenge_mandated
     *
     * @return self
     */
    public function setAcsChallengeMandated($acs_challenge_mandated)
    {
        if (is_null($acs_challenge_mandated)) {
            throw new \InvalidArgumentException('non-nullable acs_challenge_mandated cannot be null');
        }
        $this->container['acs_challenge_mandated'] = $acs_challenge_mandated;

        return $this;
    }

    /**
     * Gets acs_operator_id
     *
     * @return string|null
     */
    public function getAcsOperatorId()
    {
        return $this->container['acs_operator_id'];
    }

    /**
     * Sets acs_operator_id
     *
     * @param string|null $acs_operator_id acs_operator_id
     *
     * @return self
     */
    public function setAcsOperatorId($acs_operator_id)
    {
        if (is_null($acs_operator_id)) {
            throw new \InvalidArgumentException('non-nullable acs_operator_id cannot be null');
        }
        $this->container['acs_operator_id'] = $acs_operator_id;

        return $this;
    }

    /**
     * Gets acs_reference_number
     *
     * @return string|null
     */
    public function getAcsReferenceNumber()
    {
        return $this->container['acs_reference_number'];
    }

    /**
     * Sets acs_reference_number
     *
     * @param string|null $acs_reference_number acs_reference_number
     *
     * @return self
     */
    public function setAcsReferenceNumber($acs_reference_number)
    {
        if (is_null($acs_reference_number)) {
            throw new \InvalidArgumentException('non-nullable acs_reference_number cannot be null');
        }
        $this->container['acs_reference_number'] = $acs_reference_number;

        return $this;
    }

    /**
     * Gets acs_signed_content
     *
     * @return string|null
     */
    public function getAcsSignedContent()
    {
        return $this->container['acs_signed_content'];
    }

    /**
     * Sets acs_signed_content
     *
     * @param string|null $acs_signed_content acs_signed_content
     *
     * @return self
     */
    public function setAcsSignedContent($acs_signed_content)
    {
        if (is_null($acs_signed_content)) {
            throw new \InvalidArgumentException('non-nullable acs_signed_content cannot be null');
        }
        $this->container['acs_signed_content'] = $acs_signed_content;

        return $this;
    }

    /**
     * Gets acs_trans_id
     *
     * @return string|null
     */
    public function getAcsTransId()
    {
        return $this->container['acs_trans_id'];
    }

    /**
     * Sets acs_trans_id
     *
     * @param string|null $acs_trans_id acs_trans_id
     *
     * @return self
     */
    public function setAcsTransId($acs_trans_id)
    {
        if (is_null($acs_trans_id)) {
            throw new \InvalidArgumentException('non-nullable acs_trans_id cannot be null');
        }
        $this->container['acs_trans_id'] = $acs_trans_id;

        return $this;
    }

    /**
     * Gets acs_url
     *
     * @return string|null
     */
    public function getAcsUrl()
    {
        return $this->container['acs_url'];
    }

    /**
     * Sets acs_url
     *
     * @param string|null $acs_url acs_url
     *
     * @return self
     */
    public function setAcsUrl($acs_url)
    {
        if (is_null($acs_url)) {
            throw new \InvalidArgumentException('non-nullable acs_url cannot be null');
        }
        $this->container['acs_url'] = $acs_url;

        return $this;
    }

    /**
     * Gets authentication_type
     *
     * @return string|null
     */
    public function getAuthenticationType()
    {
        return $this->container['authentication_type'];
    }

    /**
     * Sets authentication_type
     *
     * @param string|null $authentication_type authentication_type
     *
     * @return self
     */
    public function setAuthenticationType($authentication_type)
    {
        if (is_null($authentication_type)) {
            throw new \InvalidArgumentException('non-nullable authentication_type cannot be null');
        }
        $this->container['authentication_type'] = $authentication_type;

        return $this;
    }

    /**
     * Gets card_holder_info
     *
     * @return string|null
     */
    public function getCardHolderInfo()
    {
        return $this->container['card_holder_info'];
    }

    /**
     * Sets card_holder_info
     *
     * @param string|null $card_holder_info card_holder_info
     *
     * @return self
     */
    public function setCardHolderInfo($card_holder_info)
    {
        if (is_null($card_holder_info)) {
            throw new \InvalidArgumentException('non-nullable card_holder_info cannot be null');
        }
        $this->container['card_holder_info'] = $card_holder_info;

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
     * @param string|null $cavv_algorithm cavv_algorithm
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
     * @param string|null $challenge_indicator challenge_indicator
     *
     * @return self
     */
    public function setChallengeIndicator($challenge_indicator)
    {
        if (is_null($challenge_indicator)) {
            throw new \InvalidArgumentException('non-nullable challenge_indicator cannot be null');
        }
        $this->container['challenge_indicator'] = $challenge_indicator;

        return $this;
    }

    /**
     * Gets ds_reference_number
     *
     * @return string|null
     */
    public function getDsReferenceNumber()
    {
        return $this->container['ds_reference_number'];
    }

    /**
     * Sets ds_reference_number
     *
     * @param string|null $ds_reference_number ds_reference_number
     *
     * @return self
     */
    public function setDsReferenceNumber($ds_reference_number)
    {
        if (is_null($ds_reference_number)) {
            throw new \InvalidArgumentException('non-nullable ds_reference_number cannot be null');
        }
        $this->container['ds_reference_number'] = $ds_reference_number;

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
     * @param string|null $ds_trans_id ds_trans_id
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
     * @param string|null $exemption_indicator exemption_indicator
     *
     * @return self
     */
    public function setExemptionIndicator($exemption_indicator)
    {
        if (is_null($exemption_indicator)) {
            throw new \InvalidArgumentException('non-nullable exemption_indicator cannot be null');
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
     * @param string|null $message_version message_version
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
     * @param string|null $risk_score risk_score
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
     * Gets sdk_ephem_pub_key
     *
     * @return string|null
     */
    public function getSdkEphemPubKey()
    {
        return $this->container['sdk_ephem_pub_key'];
    }

    /**
     * Sets sdk_ephem_pub_key
     *
     * @param string|null $sdk_ephem_pub_key sdk_ephem_pub_key
     *
     * @return self
     */
    public function setSdkEphemPubKey($sdk_ephem_pub_key)
    {
        if (is_null($sdk_ephem_pub_key)) {
            throw new \InvalidArgumentException('non-nullable sdk_ephem_pub_key cannot be null');
        }
        $this->container['sdk_ephem_pub_key'] = $sdk_ephem_pub_key;

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
     * @param string|null $three_ds_server_trans_id three_ds_server_trans_id
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
     * @param string|null $trans_status trans_status
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
     * @param string|null $trans_status_reason trans_status_reason
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


