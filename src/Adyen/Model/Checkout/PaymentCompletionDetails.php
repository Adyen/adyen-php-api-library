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
        'md' => 'string',
        'pa_req' => 'string',
        'pa_res' => 'string',
        'billing_token' => 'string',
        'cupsecureplus_smscode' => 'string',
        'facilitator_access_token' => 'string',
        'one_time_passcode' => 'string',
        'order_id' => 'string',
        'payer_id' => 'string',
        'payload' => 'string',
        'payment_id' => 'string',
        'payment_status' => 'string',
        'redirect_result' => 'string',
        'result_code' => 'string',
        'three_ds_result' => 'string',
        'threeds2_challenge_result' => 'string',
        'threeds2_fingerprint' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'md' => null,
        'pa_req' => null,
        'pa_res' => null,
        'billing_token' => null,
        'cupsecureplus_smscode' => null,
        'facilitator_access_token' => null,
        'one_time_passcode' => null,
        'order_id' => null,
        'payer_id' => null,
        'payload' => null,
        'payment_id' => null,
        'payment_status' => null,
        'redirect_result' => null,
        'result_code' => null,
        'three_ds_result' => null,
        'threeds2_challenge_result' => null,
        'threeds2_fingerprint' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'md' => false,
        'pa_req' => false,
        'pa_res' => false,
        'billing_token' => false,
        'cupsecureplus_smscode' => false,
        'facilitator_access_token' => false,
        'one_time_passcode' => false,
        'order_id' => false,
        'payer_id' => false,
        'payload' => false,
        'payment_id' => false,
        'payment_status' => false,
        'redirect_result' => false,
        'result_code' => false,
        'three_ds_result' => false,
        'threeds2_challenge_result' => false,
        'threeds2_fingerprint' => false
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
        'md' => 'MD',
        'pa_req' => 'PaReq',
        'pa_res' => 'PaRes',
        'billing_token' => 'billingToken',
        'cupsecureplus_smscode' => 'cupsecureplus.smscode',
        'facilitator_access_token' => 'facilitatorAccessToken',
        'one_time_passcode' => 'oneTimePasscode',
        'order_id' => 'orderID',
        'payer_id' => 'payerID',
        'payload' => 'payload',
        'payment_id' => 'paymentID',
        'payment_status' => 'paymentStatus',
        'redirect_result' => 'redirectResult',
        'result_code' => 'resultCode',
        'three_ds_result' => 'threeDSResult',
        'threeds2_challenge_result' => 'threeds2.challengeResult',
        'threeds2_fingerprint' => 'threeds2.fingerprint'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'md' => 'setMd',
        'pa_req' => 'setPaReq',
        'pa_res' => 'setPaRes',
        'billing_token' => 'setBillingToken',
        'cupsecureplus_smscode' => 'setCupsecureplusSmscode',
        'facilitator_access_token' => 'setFacilitatorAccessToken',
        'one_time_passcode' => 'setOneTimePasscode',
        'order_id' => 'setOrderId',
        'payer_id' => 'setPayerId',
        'payload' => 'setPayload',
        'payment_id' => 'setPaymentId',
        'payment_status' => 'setPaymentStatus',
        'redirect_result' => 'setRedirectResult',
        'result_code' => 'setResultCode',
        'three_ds_result' => 'setThreeDsResult',
        'threeds2_challenge_result' => 'setThreeds2ChallengeResult',
        'threeds2_fingerprint' => 'setThreeds2Fingerprint'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'md' => 'getMd',
        'pa_req' => 'getPaReq',
        'pa_res' => 'getPaRes',
        'billing_token' => 'getBillingToken',
        'cupsecureplus_smscode' => 'getCupsecureplusSmscode',
        'facilitator_access_token' => 'getFacilitatorAccessToken',
        'one_time_passcode' => 'getOneTimePasscode',
        'order_id' => 'getOrderId',
        'payer_id' => 'getPayerId',
        'payload' => 'getPayload',
        'payment_id' => 'getPaymentId',
        'payment_status' => 'getPaymentStatus',
        'redirect_result' => 'getRedirectResult',
        'result_code' => 'getResultCode',
        'three_ds_result' => 'getThreeDsResult',
        'threeds2_challenge_result' => 'getThreeds2ChallengeResult',
        'threeds2_fingerprint' => 'getThreeds2Fingerprint'
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
        $this->setIfExists('md', $data ?? [], null);
        $this->setIfExists('pa_req', $data ?? [], null);
        $this->setIfExists('pa_res', $data ?? [], null);
        $this->setIfExists('billing_token', $data ?? [], null);
        $this->setIfExists('cupsecureplus_smscode', $data ?? [], null);
        $this->setIfExists('facilitator_access_token', $data ?? [], null);
        $this->setIfExists('one_time_passcode', $data ?? [], null);
        $this->setIfExists('order_id', $data ?? [], null);
        $this->setIfExists('payer_id', $data ?? [], null);
        $this->setIfExists('payload', $data ?? [], null);
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('payment_status', $data ?? [], null);
        $this->setIfExists('redirect_result', $data ?? [], null);
        $this->setIfExists('result_code', $data ?? [], null);
        $this->setIfExists('three_ds_result', $data ?? [], null);
        $this->setIfExists('threeds2_challenge_result', $data ?? [], null);
        $this->setIfExists('threeds2_fingerprint', $data ?? [], null);
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
     * Gets md
     *
     * @return string|null
     */
    public function getMd()
    {
        return $this->container['md'];
    }

    /**
     * Sets md
     *
     * @param string|null $md A payment session identifier returned by the card issuer.
     *
     * @return self
     */
    public function setMd($md)
    {
        if (is_null($md)) {
            throw new \InvalidArgumentException('non-nullable md cannot be null');
        }
        $this->container['md'] = $md;

        return $this;
    }

    /**
     * Gets pa_req
     *
     * @return string|null
     */
    public function getPaReq()
    {
        return $this->container['pa_req'];
    }

    /**
     * Sets pa_req
     *
     * @param string|null $pa_req (3D) Payment Authentication Request data for the card issuer.
     *
     * @return self
     */
    public function setPaReq($pa_req)
    {
        if (is_null($pa_req)) {
            throw new \InvalidArgumentException('non-nullable pa_req cannot be null');
        }
        $this->container['pa_req'] = $pa_req;

        return $this;
    }

    /**
     * Gets pa_res
     *
     * @return string|null
     */
    public function getPaRes()
    {
        return $this->container['pa_res'];
    }

    /**
     * Sets pa_res
     *
     * @param string|null $pa_res (3D) Payment Authentication Response data by the card issuer.
     *
     * @return self
     */
    public function setPaRes($pa_res)
    {
        if (is_null($pa_res)) {
            throw new \InvalidArgumentException('non-nullable pa_res cannot be null');
        }
        $this->container['pa_res'] = $pa_res;

        return $this;
    }

    /**
     * Gets billing_token
     *
     * @return string|null
     */
    public function getBillingToken()
    {
        return $this->container['billing_token'];
    }

    /**
     * Sets billing_token
     *
     * @param string|null $billing_token PayPal-generated token for recurring payments.
     *
     * @return self
     */
    public function setBillingToken($billing_token)
    {
        if (is_null($billing_token)) {
            throw new \InvalidArgumentException('non-nullable billing_token cannot be null');
        }
        $this->container['billing_token'] = $billing_token;

        return $this;
    }

    /**
     * Gets cupsecureplus_smscode
     *
     * @return string|null
     */
    public function getCupsecureplusSmscode()
    {
        return $this->container['cupsecureplus_smscode'];
    }

    /**
     * Sets cupsecureplus_smscode
     *
     * @param string|null $cupsecureplus_smscode The SMS verification code collected from the shopper.
     *
     * @return self
     */
    public function setCupsecureplusSmscode($cupsecureplus_smscode)
    {
        if (is_null($cupsecureplus_smscode)) {
            throw new \InvalidArgumentException('non-nullable cupsecureplus_smscode cannot be null');
        }
        $this->container['cupsecureplus_smscode'] = $cupsecureplus_smscode;

        return $this;
    }

    /**
     * Gets facilitator_access_token
     *
     * @return string|null
     */
    public function getFacilitatorAccessToken()
    {
        return $this->container['facilitator_access_token'];
    }

    /**
     * Sets facilitator_access_token
     *
     * @param string|null $facilitator_access_token PayPal-generated third party access token.
     *
     * @return self
     */
    public function setFacilitatorAccessToken($facilitator_access_token)
    {
        if (is_null($facilitator_access_token)) {
            throw new \InvalidArgumentException('non-nullable facilitator_access_token cannot be null');
        }
        $this->container['facilitator_access_token'] = $facilitator_access_token;

        return $this;
    }

    /**
     * Gets one_time_passcode
     *
     * @return string|null
     */
    public function getOneTimePasscode()
    {
        return $this->container['one_time_passcode'];
    }

    /**
     * Sets one_time_passcode
     *
     * @param string|null $one_time_passcode A random number sent to the mobile phone number of the shopper to verify the payment.
     *
     * @return self
     */
    public function setOneTimePasscode($one_time_passcode)
    {
        if (is_null($one_time_passcode)) {
            throw new \InvalidArgumentException('non-nullable one_time_passcode cannot be null');
        }
        $this->container['one_time_passcode'] = $one_time_passcode;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string|null $order_id PayPal-assigned ID for the order.
     *
     * @return self
     */
    public function setOrderId($order_id)
    {
        if (is_null($order_id)) {
            throw new \InvalidArgumentException('non-nullable order_id cannot be null');
        }
        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets payer_id
     *
     * @return string|null
     */
    public function getPayerId()
    {
        return $this->container['payer_id'];
    }

    /**
     * Sets payer_id
     *
     * @param string|null $payer_id PayPal-assigned ID for the payer (shopper).
     *
     * @return self
     */
    public function setPayerId($payer_id)
    {
        if (is_null($payer_id)) {
            throw new \InvalidArgumentException('non-nullable payer_id cannot be null');
        }
        $this->container['payer_id'] = $payer_id;

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
     * Gets payment_id
     *
     * @return string|null
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string|null $payment_id PayPal-generated ID for the payment.
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        if (is_null($payment_id)) {
            throw new \InvalidArgumentException('non-nullable payment_id cannot be null');
        }
        $this->container['payment_id'] = $payment_id;

        return $this;
    }

    /**
     * Gets payment_status
     *
     * @return string|null
     */
    public function getPaymentStatus()
    {
        return $this->container['payment_status'];
    }

    /**
     * Sets payment_status
     *
     * @param string|null $payment_status Value passed from the WeChat MiniProgram `wx.requestPayment` **complete** callback. Possible values: any value starting with `requestPayment:`.
     *
     * @return self
     */
    public function setPaymentStatus($payment_status)
    {
        if (is_null($payment_status)) {
            throw new \InvalidArgumentException('non-nullable payment_status cannot be null');
        }
        $this->container['payment_status'] = $payment_status;

        return $this;
    }

    /**
     * Gets redirect_result
     *
     * @return string|null
     */
    public function getRedirectResult()
    {
        return $this->container['redirect_result'];
    }

    /**
     * Sets redirect_result
     *
     * @param string|null $redirect_result The result of the redirect as appended to the `returnURL`.
     *
     * @return self
     */
    public function setRedirectResult($redirect_result)
    {
        if (is_null($redirect_result)) {
            throw new \InvalidArgumentException('non-nullable redirect_result cannot be null');
        }
        $this->container['redirect_result'] = $redirect_result;

        return $this;
    }

    /**
     * Gets result_code
     *
     * @return string|null
     */
    public function getResultCode()
    {
        return $this->container['result_code'];
    }

    /**
     * Sets result_code
     *
     * @param string|null $result_code Value you received from the WeChat Pay SDK.
     *
     * @return self
     */
    public function setResultCode($result_code)
    {
        if (is_null($result_code)) {
            throw new \InvalidArgumentException('non-nullable result_code cannot be null');
        }
        $this->container['result_code'] = $result_code;

        return $this;
    }

    /**
     * Gets three_ds_result
     *
     * @return string|null
     */
    public function getThreeDsResult()
    {
        return $this->container['three_ds_result'];
    }

    /**
     * Sets three_ds_result
     *
     * @param string|null $three_ds_result Base64-encoded string returned by the Component after the challenge flow. It contains the following parameters: `transStatus`, `authorisationToken`.
     *
     * @return self
     */
    public function setThreeDsResult($three_ds_result)
    {
        if (is_null($three_ds_result)) {
            throw new \InvalidArgumentException('non-nullable three_ds_result cannot be null');
        }
        $this->container['three_ds_result'] = $three_ds_result;

        return $this;
    }

    /**
     * Gets threeds2_challenge_result
     *
     * @return string|null
     */
    public function getThreeds2ChallengeResult()
    {
        return $this->container['threeds2_challenge_result'];
    }

    /**
     * Sets threeds2_challenge_result
     *
     * @param string|null $threeds2_challenge_result Base64-encoded string returned by the Component after the challenge flow. It contains the following parameter: `transStatus`.
     *
     * @return self
     */
    public function setThreeds2ChallengeResult($threeds2_challenge_result)
    {
        if (is_null($threeds2_challenge_result)) {
            throw new \InvalidArgumentException('non-nullable threeds2_challenge_result cannot be null');
        }
        $this->container['threeds2_challenge_result'] = $threeds2_challenge_result;

        return $this;
    }

    /**
     * Gets threeds2_fingerprint
     *
     * @return string|null
     */
    public function getThreeds2Fingerprint()
    {
        return $this->container['threeds2_fingerprint'];
    }

    /**
     * Sets threeds2_fingerprint
     *
     * @param string|null $threeds2_fingerprint Base64-encoded string returned by the Component after the challenge flow. It contains the following parameter: `threeDSCompInd`.
     *
     * @return self
     */
    public function setThreeds2Fingerprint($threeds2_fingerprint)
    {
        if (is_null($threeds2_fingerprint)) {
            throw new \InvalidArgumentException('non-nullable threeds2_fingerprint cannot be null');
        }
        $this->container['threeds2_fingerprint'] = $threeds2_fingerprint;

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
