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


namespace Adyen\Model\Payment;

use \ArrayAccess;
use Adyen\Model\Payment\ObjectSerializer;

/**
 * ThreeDSecureData Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ThreeDSecureData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ThreeDSecureData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'authenticationResponse' => 'string',
        'cavv' => 'string',
        'cavvAlgorithm' => 'string',
        'challengeCancel' => 'string',
        'directoryResponse' => 'string',
        'dsTransID' => 'string',
        'eci' => 'string',
        'riskScore' => 'string',
        'threeDSVersion' => 'string',
        'tokenAuthenticationVerificationValue' => 'string',
        'transStatusReason' => 'string',
        'xid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'authenticationResponse' => null,
        'cavv' => 'byte',
        'cavvAlgorithm' => null,
        'challengeCancel' => null,
        'directoryResponse' => null,
        'dsTransID' => null,
        'eci' => null,
        'riskScore' => null,
        'threeDSVersion' => null,
        'tokenAuthenticationVerificationValue' => 'byte',
        'transStatusReason' => null,
        'xid' => 'byte'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'authenticationResponse' => false,
        'cavv' => false,
        'cavvAlgorithm' => false,
        'challengeCancel' => false,
        'directoryResponse' => false,
        'dsTransID' => false,
        'eci' => false,
        'riskScore' => false,
        'threeDSVersion' => false,
        'tokenAuthenticationVerificationValue' => false,
        'transStatusReason' => false,
        'xid' => false
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
        'authenticationResponse' => 'authenticationResponse',
        'cavv' => 'cavv',
        'cavvAlgorithm' => 'cavvAlgorithm',
        'challengeCancel' => 'challengeCancel',
        'directoryResponse' => 'directoryResponse',
        'dsTransID' => 'dsTransID',
        'eci' => 'eci',
        'riskScore' => 'riskScore',
        'threeDSVersion' => 'threeDSVersion',
        'tokenAuthenticationVerificationValue' => 'tokenAuthenticationVerificationValue',
        'transStatusReason' => 'transStatusReason',
        'xid' => 'xid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'authenticationResponse' => 'setAuthenticationResponse',
        'cavv' => 'setCavv',
        'cavvAlgorithm' => 'setCavvAlgorithm',
        'challengeCancel' => 'setChallengeCancel',
        'directoryResponse' => 'setDirectoryResponse',
        'dsTransID' => 'setDsTransID',
        'eci' => 'setEci',
        'riskScore' => 'setRiskScore',
        'threeDSVersion' => 'setThreeDSVersion',
        'tokenAuthenticationVerificationValue' => 'setTokenAuthenticationVerificationValue',
        'transStatusReason' => 'setTransStatusReason',
        'xid' => 'setXid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'authenticationResponse' => 'getAuthenticationResponse',
        'cavv' => 'getCavv',
        'cavvAlgorithm' => 'getCavvAlgorithm',
        'challengeCancel' => 'getChallengeCancel',
        'directoryResponse' => 'getDirectoryResponse',
        'dsTransID' => 'getDsTransID',
        'eci' => 'getEci',
        'riskScore' => 'getRiskScore',
        'threeDSVersion' => 'getThreeDSVersion',
        'tokenAuthenticationVerificationValue' => 'getTokenAuthenticationVerificationValue',
        'transStatusReason' => 'getTransStatusReason',
        'xid' => 'getXid'
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

    public const AUTHENTICATION_RESPONSE_Y = 'Y';
    public const AUTHENTICATION_RESPONSE_N = 'N';
    public const AUTHENTICATION_RESPONSE_U = 'U';
    public const AUTHENTICATION_RESPONSE_A = 'A';
    public const CHALLENGE_CANCEL__01 = '01';
    public const CHALLENGE_CANCEL__02 = '02';
    public const CHALLENGE_CANCEL__03 = '03';
    public const CHALLENGE_CANCEL__04 = '04';
    public const CHALLENGE_CANCEL__05 = '05';
    public const CHALLENGE_CANCEL__06 = '06';
    public const CHALLENGE_CANCEL__07 = '07';
    public const DIRECTORY_RESPONSE_A = 'A';
    public const DIRECTORY_RESPONSE_C = 'C';
    public const DIRECTORY_RESPONSE_D = 'D';
    public const DIRECTORY_RESPONSE_I = 'I';
    public const DIRECTORY_RESPONSE_N = 'N';
    public const DIRECTORY_RESPONSE_R = 'R';
    public const DIRECTORY_RESPONSE_U = 'U';
    public const DIRECTORY_RESPONSE_Y = 'Y';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAuthenticationResponseAllowableValues()
    {
        return [
            self::AUTHENTICATION_RESPONSE_Y,
            self::AUTHENTICATION_RESPONSE_N,
            self::AUTHENTICATION_RESPONSE_U,
            self::AUTHENTICATION_RESPONSE_A,
        ];
    }
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
    public function getDirectoryResponseAllowableValues()
    {
        return [
            self::DIRECTORY_RESPONSE_A,
            self::DIRECTORY_RESPONSE_C,
            self::DIRECTORY_RESPONSE_D,
            self::DIRECTORY_RESPONSE_I,
            self::DIRECTORY_RESPONSE_N,
            self::DIRECTORY_RESPONSE_R,
            self::DIRECTORY_RESPONSE_U,
            self::DIRECTORY_RESPONSE_Y,
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
        $this->setIfExists('authenticationResponse', $data ?? [], null);
        $this->setIfExists('cavv', $data ?? [], null);
        $this->setIfExists('cavvAlgorithm', $data ?? [], null);
        $this->setIfExists('challengeCancel', $data ?? [], null);
        $this->setIfExists('directoryResponse', $data ?? [], null);
        $this->setIfExists('dsTransID', $data ?? [], null);
        $this->setIfExists('eci', $data ?? [], null);
        $this->setIfExists('riskScore', $data ?? [], null);
        $this->setIfExists('threeDSVersion', $data ?? [], null);
        $this->setIfExists('tokenAuthenticationVerificationValue', $data ?? [], null);
        $this->setIfExists('transStatusReason', $data ?? [], null);
        $this->setIfExists('xid', $data ?? [], null);
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

        $allowedValues = $this->getAuthenticationResponseAllowableValues();
        if (!is_null($this->container['authenticationResponse']) && !in_array($this->container['authenticationResponse'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'authenticationResponse', must be one of '%s'",
                $this->container['authenticationResponse'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getChallengeCancelAllowableValues();
        if (!is_null($this->container['challengeCancel']) && !in_array($this->container['challengeCancel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'challengeCancel', must be one of '%s'",
                $this->container['challengeCancel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDirectoryResponseAllowableValues();
        if (!is_null($this->container['directoryResponse']) && !in_array($this->container['directoryResponse'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'directoryResponse', must be one of '%s'",
                $this->container['directoryResponse'],
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
     * Gets authenticationResponse
     *
     * @return string|null
     */
    public function getAuthenticationResponse()
    {
        return $this->container['authenticationResponse'];
    }

    /**
     * Sets authenticationResponse
     *
     * @param string|null $authenticationResponse In 3D Secure 1, the authentication response if the shopper was redirected.  In 3D Secure 2, this is the `transStatus` from the challenge result. If the transaction was frictionless, omit this parameter.
     *
     * @return self
     */
    public function setAuthenticationResponse($authenticationResponse)
    {
        if (is_null($authenticationResponse)) {
            throw new \InvalidArgumentException('non-nullable authenticationResponse cannot be null');
        }
        $allowedValues = $this->getAuthenticationResponseAllowableValues();
        if (!in_array($authenticationResponse, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'authenticationResponse', must be one of '%s'",
                    $authenticationResponse,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['authenticationResponse'] = $authenticationResponse;

        return $this;
    }

    /**
     * Gets cavv
     *
     * @return string|null
     */
    public function getCavv()
    {
        return $this->container['cavv'];
    }

    /**
     * Sets cavv
     *
     * @param string|null $cavv The cardholder authentication value (base64 encoded, 20 bytes in a decoded form).
     *
     * @return self
     */
    public function setCavv($cavv)
    {
        if (is_null($cavv)) {
            throw new \InvalidArgumentException('non-nullable cavv cannot be null');
        }
        $this->container['cavv'] = $cavv;

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
     * @param string|null $cavvAlgorithm The CAVV algorithm used. Include this only for 3D Secure 1.
     *
     * @return self
     */
    public function setCavvAlgorithm($cavvAlgorithm)
    {
        if (is_null($cavvAlgorithm)) {
            throw new \InvalidArgumentException('non-nullable cavvAlgorithm cannot be null');
        }
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
        if (is_null($challengeCancel)) {
            throw new \InvalidArgumentException('non-nullable challengeCancel cannot be null');
        }
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
     * Gets directoryResponse
     *
     * @return string|null
     */
    public function getDirectoryResponse()
    {
        return $this->container['directoryResponse'];
    }

    /**
     * Sets directoryResponse
     *
     * @param string|null $directoryResponse In 3D Secure 1, this is the enrollment response from the 3D directory server.  In 3D Secure 2, this is the `transStatus` from the `ARes`.
     *
     * @return self
     */
    public function setDirectoryResponse($directoryResponse)
    {
        if (is_null($directoryResponse)) {
            throw new \InvalidArgumentException('non-nullable directoryResponse cannot be null');
        }
        $allowedValues = $this->getDirectoryResponseAllowableValues();
        if (!in_array($directoryResponse, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'directoryResponse', must be one of '%s'",
                    $directoryResponse,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['directoryResponse'] = $directoryResponse;

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
     * @param string|null $dsTransID Supported for 3D Secure 2. The unique transaction identifier assigned by the Directory Server (DS) to identify a single transaction.
     *
     * @return self
     */
    public function setDsTransID($dsTransID)
    {
        if (is_null($dsTransID)) {
            throw new \InvalidArgumentException('non-nullable dsTransID cannot be null');
        }
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
     * @param string|null $eci The electronic commerce indicator.
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
     * @param string|null $riskScore Risk score calculated by Directory Server (DS). Required for Cartes Bancaires integrations.
     *
     * @return self
     */
    public function setRiskScore($riskScore)
    {
        if (is_null($riskScore)) {
            throw new \InvalidArgumentException('non-nullable riskScore cannot be null');
        }
        $this->container['riskScore'] = $riskScore;

        return $this;
    }

    /**
     * Gets threeDSVersion
     *
     * @return string|null
     */
    public function getThreeDSVersion()
    {
        return $this->container['threeDSVersion'];
    }

    /**
     * Sets threeDSVersion
     *
     * @param string|null $threeDSVersion The version of the 3D Secure protocol.
     *
     * @return self
     */
    public function setThreeDSVersion($threeDSVersion)
    {
        if (is_null($threeDSVersion)) {
            throw new \InvalidArgumentException('non-nullable threeDSVersion cannot be null');
        }
        $this->container['threeDSVersion'] = $threeDSVersion;

        return $this;
    }

    /**
     * Gets tokenAuthenticationVerificationValue
     *
     * @return string|null
     */
    public function getTokenAuthenticationVerificationValue()
    {
        return $this->container['tokenAuthenticationVerificationValue'];
    }

    /**
     * Sets tokenAuthenticationVerificationValue
     *
     * @param string|null $tokenAuthenticationVerificationValue Network token authentication verification value (TAVV). The network token cryptogram.
     *
     * @return self
     */
    public function setTokenAuthenticationVerificationValue($tokenAuthenticationVerificationValue)
    {
        if (is_null($tokenAuthenticationVerificationValue)) {
            throw new \InvalidArgumentException('non-nullable tokenAuthenticationVerificationValue cannot be null');
        }
        $this->container['tokenAuthenticationVerificationValue'] = $tokenAuthenticationVerificationValue;

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
        if (is_null($transStatusReason)) {
            throw new \InvalidArgumentException('non-nullable transStatusReason cannot be null');
        }
        $this->container['transStatusReason'] = $transStatusReason;

        return $this;
    }

    /**
     * Gets xid
     *
     * @return string|null
     */
    public function getXid()
    {
        return $this->container['xid'];
    }

    /**
     * Sets xid
     *
     * @param string|null $xid Supported for 3D Secure 1. The transaction identifier (Base64-encoded, 20 bytes in a decoded form).
     *
     * @return self
     */
    public function setXid($xid)
    {
        if (is_null($xid)) {
            throw new \InvalidArgumentException('non-nullable xid cannot be null');
        }
        $this->container['xid'] = $xid;

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
