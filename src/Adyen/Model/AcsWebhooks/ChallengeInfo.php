<?php

/**
 * Authentication webhooks
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\AcsWebhooks;

use \ArrayAccess;
use Adyen\Model\AcsWebhooks\ObjectSerializer;

/**
 * ChallengeInfo Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ChallengeInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ChallengeInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'challengeCancel' => 'string',
        'flow' => 'string',
        'lastInteraction' => '\DateTime',
        'phoneNumber' => 'string',
        'resends' => 'int',
        'retries' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'challengeCancel' => null,
        'flow' => null,
        'lastInteraction' => 'date-time',
        'phoneNumber' => null,
        'resends' => 'int32',
        'retries' => 'int32'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'challengeCancel' => false,
        'flow' => false,
        'lastInteraction' => false,
        'phoneNumber' => false,
        'resends' => true,
        'retries' => true
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
        'challengeCancel' => 'challengeCancel',
        'flow' => 'flow',
        'lastInteraction' => 'lastInteraction',
        'phoneNumber' => 'phoneNumber',
        'resends' => 'resends',
        'retries' => 'retries'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'challengeCancel' => 'setChallengeCancel',
        'flow' => 'setFlow',
        'lastInteraction' => 'setLastInteraction',
        'phoneNumber' => 'setPhoneNumber',
        'resends' => 'setResends',
        'retries' => 'setRetries'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'challengeCancel' => 'getChallengeCancel',
        'flow' => 'getFlow',
        'lastInteraction' => 'getLastInteraction',
        'phoneNumber' => 'getPhoneNumber',
        'resends' => 'getResends',
        'retries' => 'getRetries'
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

    public const CHALLENGE_CANCEL__00 = '00';
    public const CHALLENGE_CANCEL__01 = '01';
    public const CHALLENGE_CANCEL__02 = '02';
    public const CHALLENGE_CANCEL__03 = '03';
    public const CHALLENGE_CANCEL__04 = '04';
    public const CHALLENGE_CANCEL__05 = '05';
    public const CHALLENGE_CANCEL__06 = '06';
    public const CHALLENGE_CANCEL__07 = '07';
    public const CHALLENGE_CANCEL__08 = '08';
    public const FLOW_PWD_OTP_PHONE_FL = 'PWD_OTP_PHONE_FL';
    public const FLOW_PWD_OTP_EMAIL_FL = 'PWD_OTP_EMAIL_FL';
    public const FLOW_OOB_TRIGGER_FL = 'OOB_TRIGGER_FL';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getChallengeCancelAllowableValues()
    {
        return [
            self::CHALLENGE_CANCEL__00,
            self::CHALLENGE_CANCEL__01,
            self::CHALLENGE_CANCEL__02,
            self::CHALLENGE_CANCEL__03,
            self::CHALLENGE_CANCEL__04,
            self::CHALLENGE_CANCEL__05,
            self::CHALLENGE_CANCEL__06,
            self::CHALLENGE_CANCEL__07,
            self::CHALLENGE_CANCEL__08,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFlowAllowableValues()
    {
        return [
            self::FLOW_PWD_OTP_PHONE_FL,
            self::FLOW_PWD_OTP_EMAIL_FL,
            self::FLOW_OOB_TRIGGER_FL,
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
        $this->setIfExists('challengeCancel', $data ?? [], null);
        $this->setIfExists('flow', $data ?? [], null);
        $this->setIfExists('lastInteraction', $data ?? [], null);
        $this->setIfExists('phoneNumber', $data ?? [], null);
        $this->setIfExists('resends', $data ?? [], null);
        $this->setIfExists('retries', $data ?? [], null);
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

        if ($this->container['flow'] === null) {
            $invalidProperties[] = "'flow' can't be null";
        }
        $allowedValues = $this->getFlowAllowableValues();
        if (!is_null($this->container['flow']) && !in_array($this->container['flow'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'flow', must be one of '%s'",
                $this->container['flow'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['lastInteraction'] === null) {
            $invalidProperties[] = "'lastInteraction' can't be null";
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
     * @param string|null $challengeCancel Indicator informing the Access Control Server (ACS) and the Directory Server (DS) that the authentication has been cancelled. Possible values: * **00**: Data element is absent or value has been sent back with the key `challengeCancel`. * **01**: Cardholder selected **Cancel**. * **02**: 3DS Requestor cancelled Authentication. * **03**: Transaction abandoned. * **04**: Transaction timed out at ACS — other timeouts. * **05**: Transaction timed out at ACS — first CReq not received by ACS. * **06**: Transaction error. * **07**: Unknown. * **08**: Transaction time out at SDK.
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
     * Gets flow
     *
     * @return string
     */
    public function getFlow()
    {
        return $this->container['flow'];
    }

    /**
     * Sets flow
     *
     * @param string $flow The flow used in the challenge. Possible values:  * **PWD_OTP_PHONE_FL**: one-time password (OTP) flow via SMS * **PWD_OTP_EMAIL_FL**: one-time password (OTP) flow via email * **OOB_TRIGGER_FL**: out-of-band (OOB) flow
     *
     * @return self
     */
    public function setFlow($flow)
    {
        $allowedValues = $this->getFlowAllowableValues();
        if (!in_array($flow, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'flow', must be one of '%s'",
                    $flow,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['flow'] = $flow;

        return $this;
    }

    /**
     * Gets lastInteraction
     *
     * @return \DateTime
     */
    public function getLastInteraction()
    {
        return $this->container['lastInteraction'];
    }

    /**
     * Sets lastInteraction
     *
     * @param \DateTime $lastInteraction The last time of interaction with the challenge.
     *
     * @return self
     */
    public function setLastInteraction($lastInteraction)
    {
        $this->container['lastInteraction'] = $lastInteraction;

        return $this;
    }

    /**
     * Gets phoneNumber
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phoneNumber'];
    }

    /**
     * Sets phoneNumber
     *
     * @param string|null $phoneNumber The last four digits of the phone number used in the challenge.
     *
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->container['phoneNumber'] = $phoneNumber;

        return $this;
    }

    /**
     * Gets resends
     *
     * @return int|null
     */
    public function getResends()
    {
        return $this->container['resends'];
    }

    /**
     * Sets resends
     *
     * @param int|null $resends The number of times the one-time password (OTP) was resent during the challenge.
     *
     * @return self
     */
    public function setResends($resends)
    {
        $this->container['resends'] = $resends;

        return $this;
    }

    /**
     * Gets retries
     *
     * @return int|null
     */
    public function getRetries()
    {
        return $this->container['retries'];
    }

    /**
     * Sets retries
     *
     * @param int|null $retries The number of retries used in the challenge.
     *
     * @return self
     */
    public function setRetries($retries)
    {
        $this->container['retries'] = $retries;

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
