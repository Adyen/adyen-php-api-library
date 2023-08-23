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
 * PaymentCompletionDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentCompletionDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentCompletionDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'mD' => 'string',
        'paReq' => 'string',
        'paRes' => 'string',
        'authorizationToken' => 'string',
        'billingToken' => 'string',
        'cupsecureplusSmscode' => 'string',
        'facilitatorAccessToken' => 'string',
        'oneTimePasscode' => 'string',
        'orderID' => 'string',
        'payerID' => 'string',
        'payload' => 'string',
        'paymentID' => 'string',
        'paymentStatus' => 'string',
        'redirectResult' => 'string',
        'resultCode' => 'string',
        'threeDSResult' => 'string',
        'threeds2ChallengeResult' => 'string',
        'threeds2Fingerprint' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'mD' => null,
        'paReq' => null,
        'paRes' => null,
        'authorizationToken' => null,
        'billingToken' => null,
        'cupsecureplusSmscode' => null,
        'facilitatorAccessToken' => null,
        'oneTimePasscode' => null,
        'orderID' => null,
        'payerID' => null,
        'payload' => null,
        'paymentID' => null,
        'paymentStatus' => null,
        'redirectResult' => null,
        'resultCode' => null,
        'threeDSResult' => null,
        'threeds2ChallengeResult' => null,
        'threeds2Fingerprint' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'mD' => false,
        'paReq' => false,
        'paRes' => false,
        'authorizationToken' => false,
        'billingToken' => false,
        'cupsecureplusSmscode' => false,
        'facilitatorAccessToken' => false,
        'oneTimePasscode' => false,
        'orderID' => false,
        'payerID' => false,
        'payload' => false,
        'paymentID' => false,
        'paymentStatus' => false,
        'redirectResult' => false,
        'resultCode' => false,
        'threeDSResult' => false,
        'threeds2ChallengeResult' => false,
        'threeds2Fingerprint' => false
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
        'mD' => 'MD',
        'paReq' => 'PaReq',
        'paRes' => 'PaRes',
        'authorizationToken' => 'authorization_token',
        'billingToken' => 'billingToken',
        'cupsecureplusSmscode' => 'cupsecureplus.smscode',
        'facilitatorAccessToken' => 'facilitatorAccessToken',
        'oneTimePasscode' => 'oneTimePasscode',
        'orderID' => 'orderID',
        'payerID' => 'payerID',
        'payload' => 'payload',
        'paymentID' => 'paymentID',
        'paymentStatus' => 'paymentStatus',
        'redirectResult' => 'redirectResult',
        'resultCode' => 'resultCode',
        'threeDSResult' => 'threeDSResult',
        'threeds2ChallengeResult' => 'threeds2.challengeResult',
        'threeds2Fingerprint' => 'threeds2.fingerprint'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'mD' => 'setMD',
        'paReq' => 'setPaReq',
        'paRes' => 'setPaRes',
        'authorizationToken' => 'setAuthorizationToken',
        'billingToken' => 'setBillingToken',
        'cupsecureplusSmscode' => 'setCupsecureplusSmscode',
        'facilitatorAccessToken' => 'setFacilitatorAccessToken',
        'oneTimePasscode' => 'setOneTimePasscode',
        'orderID' => 'setOrderID',
        'payerID' => 'setPayerID',
        'payload' => 'setPayload',
        'paymentID' => 'setPaymentID',
        'paymentStatus' => 'setPaymentStatus',
        'redirectResult' => 'setRedirectResult',
        'resultCode' => 'setResultCode',
        'threeDSResult' => 'setThreeDSResult',
        'threeds2ChallengeResult' => 'setThreeds2ChallengeResult',
        'threeds2Fingerprint' => 'setThreeds2Fingerprint'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'mD' => 'getMD',
        'paReq' => 'getPaReq',
        'paRes' => 'getPaRes',
        'authorizationToken' => 'getAuthorizationToken',
        'billingToken' => 'getBillingToken',
        'cupsecureplusSmscode' => 'getCupsecureplusSmscode',
        'facilitatorAccessToken' => 'getFacilitatorAccessToken',
        'oneTimePasscode' => 'getOneTimePasscode',
        'orderID' => 'getOrderID',
        'payerID' => 'getPayerID',
        'payload' => 'getPayload',
        'paymentID' => 'getPaymentID',
        'paymentStatus' => 'getPaymentStatus',
        'redirectResult' => 'getRedirectResult',
        'resultCode' => 'getResultCode',
        'threeDSResult' => 'getThreeDSResult',
        'threeds2ChallengeResult' => 'getThreeds2ChallengeResult',
        'threeds2Fingerprint' => 'getThreeds2Fingerprint'
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
        $this->setIfExists('mD', $data ?? [], null);
        $this->setIfExists('paReq', $data ?? [], null);
        $this->setIfExists('paRes', $data ?? [], null);
        $this->setIfExists('authorizationToken', $data ?? [], null);
        $this->setIfExists('billingToken', $data ?? [], null);
        $this->setIfExists('cupsecureplusSmscode', $data ?? [], null);
        $this->setIfExists('facilitatorAccessToken', $data ?? [], null);
        $this->setIfExists('oneTimePasscode', $data ?? [], null);
        $this->setIfExists('orderID', $data ?? [], null);
        $this->setIfExists('payerID', $data ?? [], null);
        $this->setIfExists('payload', $data ?? [], null);
        $this->setIfExists('paymentID', $data ?? [], null);
        $this->setIfExists('paymentStatus', $data ?? [], null);
        $this->setIfExists('redirectResult', $data ?? [], null);
        $this->setIfExists('resultCode', $data ?? [], null);
        $this->setIfExists('threeDSResult', $data ?? [], null);
        $this->setIfExists('threeds2ChallengeResult', $data ?? [], null);
        $this->setIfExists('threeds2Fingerprint', $data ?? [], null);
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
     * Gets mD
     *
     * @return string|null
     */
    public function getMD()
    {
        return $this->container['mD'];
    }

    /**
     * Sets mD
     *
     * @param string|null $mD A payment session identifier returned by the card issuer.
     *
     * @return self
     */
    public function setMD($mD)
    {
        if (is_null($mD)) {
            throw new \InvalidArgumentException('non-nullable mD cannot be null');
        }
        $this->container['mD'] = $mD;

        return $this;
    }

    /**
     * Gets paReq
     *
     * @return string|null
     */
    public function getPaReq()
    {
        return $this->container['paReq'];
    }

    /**
     * Sets paReq
     *
     * @param string|null $paReq (3D) Payment Authentication Request data for the card issuer.
     *
     * @return self
     */
    public function setPaReq($paReq)
    {
        if (is_null($paReq)) {
            throw new \InvalidArgumentException('non-nullable paReq cannot be null');
        }
        $this->container['paReq'] = $paReq;

        return $this;
    }

    /**
     * Gets paRes
     *
     * @return string|null
     */
    public function getPaRes()
    {
        return $this->container['paRes'];
    }

    /**
     * Sets paRes
     *
     * @param string|null $paRes (3D) Payment Authentication Response data by the card issuer.
     *
     * @return self
     */
    public function setPaRes($paRes)
    {
        if (is_null($paRes)) {
            throw new \InvalidArgumentException('non-nullable paRes cannot be null');
        }
        $this->container['paRes'] = $paRes;

        return $this;
    }

    /**
     * Gets authorizationToken
     *
     * @return string|null
     */
    public function getAuthorizationToken()
    {
        return $this->container['authorizationToken'];
    }

    /**
     * Sets authorizationToken
     *
     * @param string|null $authorizationToken authorizationToken
     *
     * @return self
     */
    public function setAuthorizationToken($authorizationToken)
    {
        if (is_null($authorizationToken)) {
            throw new \InvalidArgumentException('non-nullable authorizationToken cannot be null');
        }
        $this->container['authorizationToken'] = $authorizationToken;

        return $this;
    }

    /**
     * Gets billingToken
     *
     * @return string|null
     */
    public function getBillingToken()
    {
        return $this->container['billingToken'];
    }

    /**
     * Sets billingToken
     *
     * @param string|null $billingToken PayPal-generated token for recurring payments.
     *
     * @return self
     */
    public function setBillingToken($billingToken)
    {
        if (is_null($billingToken)) {
            throw new \InvalidArgumentException('non-nullable billingToken cannot be null');
        }
        $this->container['billingToken'] = $billingToken;

        return $this;
    }

    /**
     * Gets cupsecureplusSmscode
     *
     * @return string|null
     */
    public function getCupsecureplusSmscode()
    {
        return $this->container['cupsecureplusSmscode'];
    }

    /**
     * Sets cupsecureplusSmscode
     *
     * @param string|null $cupsecureplusSmscode The SMS verification code collected from the shopper.
     *
     * @return self
     */
    public function setCupsecureplusSmscode($cupsecureplusSmscode)
    {
        if (is_null($cupsecureplusSmscode)) {
            throw new \InvalidArgumentException('non-nullable cupsecureplusSmscode cannot be null');
        }
        $this->container['cupsecureplusSmscode'] = $cupsecureplusSmscode;

        return $this;
    }

    /**
     * Gets facilitatorAccessToken
     *
     * @return string|null
     */
    public function getFacilitatorAccessToken()
    {
        return $this->container['facilitatorAccessToken'];
    }

    /**
     * Sets facilitatorAccessToken
     *
     * @param string|null $facilitatorAccessToken PayPal-generated third party access token.
     *
     * @return self
     */
    public function setFacilitatorAccessToken($facilitatorAccessToken)
    {
        if (is_null($facilitatorAccessToken)) {
            throw new \InvalidArgumentException('non-nullable facilitatorAccessToken cannot be null');
        }
        $this->container['facilitatorAccessToken'] = $facilitatorAccessToken;

        return $this;
    }

    /**
     * Gets oneTimePasscode
     *
     * @return string|null
     */
    public function getOneTimePasscode()
    {
        return $this->container['oneTimePasscode'];
    }

    /**
     * Sets oneTimePasscode
     *
     * @param string|null $oneTimePasscode A random number sent to the mobile phone number of the shopper to verify the payment.
     *
     * @return self
     */
    public function setOneTimePasscode($oneTimePasscode)
    {
        if (is_null($oneTimePasscode)) {
            throw new \InvalidArgumentException('non-nullable oneTimePasscode cannot be null');
        }
        $this->container['oneTimePasscode'] = $oneTimePasscode;

        return $this;
    }

    /**
     * Gets orderID
     *
     * @return string|null
     */
    public function getOrderID()
    {
        return $this->container['orderID'];
    }

    /**
     * Sets orderID
     *
     * @param string|null $orderID PayPal-assigned ID for the order.
     *
     * @return self
     */
    public function setOrderID($orderID)
    {
        if (is_null($orderID)) {
            throw new \InvalidArgumentException('non-nullable orderID cannot be null');
        }
        $this->container['orderID'] = $orderID;

        return $this;
    }

    /**
     * Gets payerID
     *
     * @return string|null
     */
    public function getPayerID()
    {
        return $this->container['payerID'];
    }

    /**
     * Sets payerID
     *
     * @param string|null $payerID PayPal-assigned ID for the payer (shopper).
     *
     * @return self
     */
    public function setPayerID($payerID)
    {
        if (is_null($payerID)) {
            throw new \InvalidArgumentException('non-nullable payerID cannot be null');
        }
        $this->container['payerID'] = $payerID;

        return $this;
    }

    /**
     * Gets payload
     *
     * @return string|null
     */
    public function getPayload()
    {
        return $this->container['payload'];
    }

    /**
     * Sets payload
     *
     * @param string|null $payload Payload appended to the `returnURL` as a result of the redirect.
     *
     * @return self
     */
    public function setPayload($payload)
    {
        if (is_null($payload)) {
            throw new \InvalidArgumentException('non-nullable payload cannot be null');
        }
        $this->container['payload'] = $payload;

        return $this;
    }

    /**
     * Gets paymentID
     *
     * @return string|null
     */
    public function getPaymentID()
    {
        return $this->container['paymentID'];
    }

    /**
     * Sets paymentID
     *
     * @param string|null $paymentID PayPal-generated ID for the payment.
     *
     * @return self
     */
    public function setPaymentID($paymentID)
    {
        if (is_null($paymentID)) {
            throw new \InvalidArgumentException('non-nullable paymentID cannot be null');
        }
        $this->container['paymentID'] = $paymentID;

        return $this;
    }

    /**
     * Gets paymentStatus
     *
     * @return string|null
     */
    public function getPaymentStatus()
    {
        return $this->container['paymentStatus'];
    }

    /**
     * Sets paymentStatus
     *
     * @param string|null $paymentStatus Value passed from the WeChat MiniProgram `wx.requestPayment` **complete** callback. Possible values: any value starting with `requestPayment:`.
     *
     * @return self
     */
    public function setPaymentStatus($paymentStatus)
    {
        if (is_null($paymentStatus)) {
            throw new \InvalidArgumentException('non-nullable paymentStatus cannot be null');
        }
        $this->container['paymentStatus'] = $paymentStatus;

        return $this;
    }

    /**
     * Gets redirectResult
     *
     * @return string|null
     */
    public function getRedirectResult()
    {
        return $this->container['redirectResult'];
    }

    /**
     * Sets redirectResult
     *
     * @param string|null $redirectResult The result of the redirect as appended to the `returnURL`.
     *
     * @return self
     */
    public function setRedirectResult($redirectResult)
    {
        if (is_null($redirectResult)) {
            throw new \InvalidArgumentException('non-nullable redirectResult cannot be null');
        }
        $this->container['redirectResult'] = $redirectResult;

        return $this;
    }

    /**
     * Gets resultCode
     *
     * @return string|null
     */
    public function getResultCode()
    {
        return $this->container['resultCode'];
    }

    /**
     * Sets resultCode
     *
     * @param string|null $resultCode Value you received from the WeChat Pay SDK.
     *
     * @return self
     */
    public function setResultCode($resultCode)
    {
        if (is_null($resultCode)) {
            throw new \InvalidArgumentException('non-nullable resultCode cannot be null');
        }
        $this->container['resultCode'] = $resultCode;

        return $this;
    }

    /**
     * Gets threeDSResult
     *
     * @return string|null
     */
    public function getThreeDSResult()
    {
        return $this->container['threeDSResult'];
    }

    /**
     * Sets threeDSResult
     *
     * @param string|null $threeDSResult Base64-encoded string returned by the Component after the challenge flow. It contains the following parameters: `transStatus`, `authorisationToken`.
     *
     * @return self
     */
    public function setThreeDSResult($threeDSResult)
    {
        if (is_null($threeDSResult)) {
            throw new \InvalidArgumentException('non-nullable threeDSResult cannot be null');
        }
        $this->container['threeDSResult'] = $threeDSResult;

        return $this;
    }

    /**
     * Gets threeds2ChallengeResult
     *
     * @return string|null
     */
    public function getThreeds2ChallengeResult()
    {
        return $this->container['threeds2ChallengeResult'];
    }

    /**
     * Sets threeds2ChallengeResult
     *
     * @param string|null $threeds2ChallengeResult Base64-encoded string returned by the Component after the challenge flow. It contains the following parameter: `transStatus`.
     *
     * @return self
     */
    public function setThreeds2ChallengeResult($threeds2ChallengeResult)
    {
        if (is_null($threeds2ChallengeResult)) {
            throw new \InvalidArgumentException('non-nullable threeds2ChallengeResult cannot be null');
        }
        $this->container['threeds2ChallengeResult'] = $threeds2ChallengeResult;

        return $this;
    }

    /**
     * Gets threeds2Fingerprint
     *
     * @return string|null
     */
    public function getThreeds2Fingerprint()
    {
        return $this->container['threeds2Fingerprint'];
    }

    /**
     * Sets threeds2Fingerprint
     *
     * @param string|null $threeds2Fingerprint Base64-encoded string returned by the Component after the challenge flow. It contains the following parameter: `threeDSCompInd`.
     *
     * @return self
     */
    public function setThreeds2Fingerprint($threeds2Fingerprint)
    {
        if (is_null($threeds2Fingerprint)) {
            throw new \InvalidArgumentException('non-nullable threeds2Fingerprint cannot be null');
        }
        $this->container['threeds2Fingerprint'] = $threeds2Fingerprint;

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
