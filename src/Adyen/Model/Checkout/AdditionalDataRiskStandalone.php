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
 * AdditionalDataRiskStandalone Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataRiskStandalone implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataRiskStandalone';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'pay_pal_country_code' => 'string',
        'pay_pal_email_id' => 'string',
        'pay_pal_first_name' => 'string',
        'pay_pal_last_name' => 'string',
        'pay_pal_payer_id' => 'string',
        'pay_pal_phone' => 'string',
        'pay_pal_protection_eligibility' => 'string',
        'pay_pal_transaction_id' => 'string',
        'avs_result_raw' => 'string',
        'bin' => 'string',
        'cvc_result_raw' => 'string',
        'risk_token' => 'string',
        'three_d_authenticated' => 'string',
        'three_d_offered' => 'string',
        'token_data_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'pay_pal_country_code' => null,
        'pay_pal_email_id' => null,
        'pay_pal_first_name' => null,
        'pay_pal_last_name' => null,
        'pay_pal_payer_id' => null,
        'pay_pal_phone' => null,
        'pay_pal_protection_eligibility' => null,
        'pay_pal_transaction_id' => null,
        'avs_result_raw' => null,
        'bin' => null,
        'cvc_result_raw' => null,
        'risk_token' => null,
        'three_d_authenticated' => null,
        'three_d_offered' => null,
        'token_data_type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'pay_pal_country_code' => false,
		'pay_pal_email_id' => false,
		'pay_pal_first_name' => false,
		'pay_pal_last_name' => false,
		'pay_pal_payer_id' => false,
		'pay_pal_phone' => false,
		'pay_pal_protection_eligibility' => false,
		'pay_pal_transaction_id' => false,
		'avs_result_raw' => false,
		'bin' => false,
		'cvc_result_raw' => false,
		'risk_token' => false,
		'three_d_authenticated' => false,
		'three_d_offered' => false,
		'token_data_type' => false
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
        'pay_pal_country_code' => 'PayPal.CountryCode',
        'pay_pal_email_id' => 'PayPal.EmailId',
        'pay_pal_first_name' => 'PayPal.FirstName',
        'pay_pal_last_name' => 'PayPal.LastName',
        'pay_pal_payer_id' => 'PayPal.PayerId',
        'pay_pal_phone' => 'PayPal.Phone',
        'pay_pal_protection_eligibility' => 'PayPal.ProtectionEligibility',
        'pay_pal_transaction_id' => 'PayPal.TransactionId',
        'avs_result_raw' => 'avsResultRaw',
        'bin' => 'bin',
        'cvc_result_raw' => 'cvcResultRaw',
        'risk_token' => 'riskToken',
        'three_d_authenticated' => 'threeDAuthenticated',
        'three_d_offered' => 'threeDOffered',
        'token_data_type' => 'tokenDataType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'pay_pal_country_code' => 'setPayPalCountryCode',
        'pay_pal_email_id' => 'setPayPalEmailId',
        'pay_pal_first_name' => 'setPayPalFirstName',
        'pay_pal_last_name' => 'setPayPalLastName',
        'pay_pal_payer_id' => 'setPayPalPayerId',
        'pay_pal_phone' => 'setPayPalPhone',
        'pay_pal_protection_eligibility' => 'setPayPalProtectionEligibility',
        'pay_pal_transaction_id' => 'setPayPalTransactionId',
        'avs_result_raw' => 'setAvsResultRaw',
        'bin' => 'setBin',
        'cvc_result_raw' => 'setCvcResultRaw',
        'risk_token' => 'setRiskToken',
        'three_d_authenticated' => 'setThreeDAuthenticated',
        'three_d_offered' => 'setThreeDOffered',
        'token_data_type' => 'setTokenDataType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'pay_pal_country_code' => 'getPayPalCountryCode',
        'pay_pal_email_id' => 'getPayPalEmailId',
        'pay_pal_first_name' => 'getPayPalFirstName',
        'pay_pal_last_name' => 'getPayPalLastName',
        'pay_pal_payer_id' => 'getPayPalPayerId',
        'pay_pal_phone' => 'getPayPalPhone',
        'pay_pal_protection_eligibility' => 'getPayPalProtectionEligibility',
        'pay_pal_transaction_id' => 'getPayPalTransactionId',
        'avs_result_raw' => 'getAvsResultRaw',
        'bin' => 'getBin',
        'cvc_result_raw' => 'getCvcResultRaw',
        'risk_token' => 'getRiskToken',
        'three_d_authenticated' => 'getThreeDAuthenticated',
        'three_d_offered' => 'getThreeDOffered',
        'token_data_type' => 'getTokenDataType'
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
        $this->setIfExists('pay_pal_country_code', $data ?? [], null);
        $this->setIfExists('pay_pal_email_id', $data ?? [], null);
        $this->setIfExists('pay_pal_first_name', $data ?? [], null);
        $this->setIfExists('pay_pal_last_name', $data ?? [], null);
        $this->setIfExists('pay_pal_payer_id', $data ?? [], null);
        $this->setIfExists('pay_pal_phone', $data ?? [], null);
        $this->setIfExists('pay_pal_protection_eligibility', $data ?? [], null);
        $this->setIfExists('pay_pal_transaction_id', $data ?? [], null);
        $this->setIfExists('avs_result_raw', $data ?? [], null);
        $this->setIfExists('bin', $data ?? [], null);
        $this->setIfExists('cvc_result_raw', $data ?? [], null);
        $this->setIfExists('risk_token', $data ?? [], null);
        $this->setIfExists('three_d_authenticated', $data ?? [], null);
        $this->setIfExists('three_d_offered', $data ?? [], null);
        $this->setIfExists('token_data_type', $data ?? [], null);
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
     * Gets pay_pal_country_code
     *
     * @return string|null
     */
    public function getPayPalCountryCode()
    {
        return $this->container['pay_pal_country_code'];
    }

    /**
     * Sets pay_pal_country_code
     *
     * @param string|null $pay_pal_country_code Shopper's country of residence in the form of ISO standard 3166 2-character country codes.
     *
     * @return self
     */
    public function setPayPalCountryCode($pay_pal_country_code)
    {
        if (is_null($pay_pal_country_code)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_country_code cannot be null');
        }
        $this->container['pay_pal_country_code'] = $pay_pal_country_code;

        return $this;
    }

    /**
     * Gets pay_pal_email_id
     *
     * @return string|null
     */
    public function getPayPalEmailId()
    {
        return $this->container['pay_pal_email_id'];
    }

    /**
     * Sets pay_pal_email_id
     *
     * @param string|null $pay_pal_email_id Shopper's email.
     *
     * @return self
     */
    public function setPayPalEmailId($pay_pal_email_id)
    {
        if (is_null($pay_pal_email_id)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_email_id cannot be null');
        }
        $this->container['pay_pal_email_id'] = $pay_pal_email_id;

        return $this;
    }

    /**
     * Gets pay_pal_first_name
     *
     * @return string|null
     */
    public function getPayPalFirstName()
    {
        return $this->container['pay_pal_first_name'];
    }

    /**
     * Sets pay_pal_first_name
     *
     * @param string|null $pay_pal_first_name Shopper's first name.
     *
     * @return self
     */
    public function setPayPalFirstName($pay_pal_first_name)
    {
        if (is_null($pay_pal_first_name)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_first_name cannot be null');
        }
        $this->container['pay_pal_first_name'] = $pay_pal_first_name;

        return $this;
    }

    /**
     * Gets pay_pal_last_name
     *
     * @return string|null
     */
    public function getPayPalLastName()
    {
        return $this->container['pay_pal_last_name'];
    }

    /**
     * Sets pay_pal_last_name
     *
     * @param string|null $pay_pal_last_name Shopper's last name.
     *
     * @return self
     */
    public function setPayPalLastName($pay_pal_last_name)
    {
        if (is_null($pay_pal_last_name)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_last_name cannot be null');
        }
        $this->container['pay_pal_last_name'] = $pay_pal_last_name;

        return $this;
    }

    /**
     * Gets pay_pal_payer_id
     *
     * @return string|null
     */
    public function getPayPalPayerId()
    {
        return $this->container['pay_pal_payer_id'];
    }

    /**
     * Sets pay_pal_payer_id
     *
     * @param string|null $pay_pal_payer_id Unique PayPal Customer Account identification number. Character length and limitations: 13 single-byte alphanumeric characters.
     *
     * @return self
     */
    public function setPayPalPayerId($pay_pal_payer_id)
    {
        if (is_null($pay_pal_payer_id)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_payer_id cannot be null');
        }
        $this->container['pay_pal_payer_id'] = $pay_pal_payer_id;

        return $this;
    }

    /**
     * Gets pay_pal_phone
     *
     * @return string|null
     */
    public function getPayPalPhone()
    {
        return $this->container['pay_pal_phone'];
    }

    /**
     * Sets pay_pal_phone
     *
     * @param string|null $pay_pal_phone Shopper's phone number.
     *
     * @return self
     */
    public function setPayPalPhone($pay_pal_phone)
    {
        if (is_null($pay_pal_phone)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_phone cannot be null');
        }
        $this->container['pay_pal_phone'] = $pay_pal_phone;

        return $this;
    }

    /**
     * Gets pay_pal_protection_eligibility
     *
     * @return string|null
     */
    public function getPayPalProtectionEligibility()
    {
        return $this->container['pay_pal_protection_eligibility'];
    }

    /**
     * Sets pay_pal_protection_eligibility
     *
     * @param string|null $pay_pal_protection_eligibility Allowed values: * **Eligible** — Merchant is protected by PayPal's Seller Protection Policy for Unauthorized Payments and Item Not Received.  * **PartiallyEligible** — Merchant is protected by PayPal's Seller Protection Policy for Item Not Received.  * **Ineligible** — Merchant is not protected under the Seller Protection Policy.
     *
     * @return self
     */
    public function setPayPalProtectionEligibility($pay_pal_protection_eligibility)
    {
        if (is_null($pay_pal_protection_eligibility)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_protection_eligibility cannot be null');
        }
        $this->container['pay_pal_protection_eligibility'] = $pay_pal_protection_eligibility;

        return $this;
    }

    /**
     * Gets pay_pal_transaction_id
     *
     * @return string|null
     */
    public function getPayPalTransactionId()
    {
        return $this->container['pay_pal_transaction_id'];
    }

    /**
     * Sets pay_pal_transaction_id
     *
     * @param string|null $pay_pal_transaction_id Unique transaction ID of the payment.
     *
     * @return self
     */
    public function setPayPalTransactionId($pay_pal_transaction_id)
    {
        if (is_null($pay_pal_transaction_id)) {
            throw new \InvalidArgumentException('non-nullable pay_pal_transaction_id cannot be null');
        }
        $this->container['pay_pal_transaction_id'] = $pay_pal_transaction_id;

        return $this;
    }

    /**
     * Gets avs_result_raw
     *
     * @return string|null
     */
    public function getAvsResultRaw()
    {
        return $this->container['avs_result_raw'];
    }

    /**
     * Sets avs_result_raw
     *
     * @param string|null $avs_result_raw Raw AVS result received from the acquirer, where available. Example: D
     *
     * @return self
     */
    public function setAvsResultRaw($avs_result_raw)
    {
        if (is_null($avs_result_raw)) {
            throw new \InvalidArgumentException('non-nullable avs_result_raw cannot be null');
        }
        $this->container['avs_result_raw'] = $avs_result_raw;

        return $this;
    }

    /**
     * Gets bin
     *
     * @return string|null
     */
    public function getBin()
    {
        return $this->container['bin'];
    }

    /**
     * Sets bin
     *
     * @param string|null $bin The Bank Identification Number of a credit card, which is the first six digits of a card number. Required for [tokenized card request](https://docs.adyen.com/risk-management/standalone-risk#tokenised-pan-request).
     *
     * @return self
     */
    public function setBin($bin)
    {
        if (is_null($bin)) {
            throw new \InvalidArgumentException('non-nullable bin cannot be null');
        }
        $this->container['bin'] = $bin;

        return $this;
    }

    /**
     * Gets cvc_result_raw
     *
     * @return string|null
     */
    public function getCvcResultRaw()
    {
        return $this->container['cvc_result_raw'];
    }

    /**
     * Sets cvc_result_raw
     *
     * @param string|null $cvc_result_raw Raw CVC result received from the acquirer, where available. Example: 1
     *
     * @return self
     */
    public function setCvcResultRaw($cvc_result_raw)
    {
        if (is_null($cvc_result_raw)) {
            throw new \InvalidArgumentException('non-nullable cvc_result_raw cannot be null');
        }
        $this->container['cvc_result_raw'] = $cvc_result_raw;

        return $this;
    }

    /**
     * Gets risk_token
     *
     * @return string|null
     */
    public function getRiskToken()
    {
        return $this->container['risk_token'];
    }

    /**
     * Sets risk_token
     *
     * @param string|null $risk_token Unique identifier or token for the shopper's card details.
     *
     * @return self
     */
    public function setRiskToken($risk_token)
    {
        if (is_null($risk_token)) {
            throw new \InvalidArgumentException('non-nullable risk_token cannot be null');
        }
        $this->container['risk_token'] = $risk_token;

        return $this;
    }

    /**
     * Gets three_d_authenticated
     *
     * @return string|null
     */
    public function getThreeDAuthenticated()
    {
        return $this->container['three_d_authenticated'];
    }

    /**
     * Sets three_d_authenticated
     *
     * @param string|null $three_d_authenticated A Boolean value indicating whether 3DS authentication was completed on this payment. Example: true
     *
     * @return self
     */
    public function setThreeDAuthenticated($three_d_authenticated)
    {
        if (is_null($three_d_authenticated)) {
            throw new \InvalidArgumentException('non-nullable three_d_authenticated cannot be null');
        }
        $this->container['three_d_authenticated'] = $three_d_authenticated;

        return $this;
    }

    /**
     * Gets three_d_offered
     *
     * @return string|null
     */
    public function getThreeDOffered()
    {
        return $this->container['three_d_offered'];
    }

    /**
     * Sets three_d_offered
     *
     * @param string|null $three_d_offered A Boolean value indicating whether 3DS was offered for this payment. Example: true
     *
     * @return self
     */
    public function setThreeDOffered($three_d_offered)
    {
        if (is_null($three_d_offered)) {
            throw new \InvalidArgumentException('non-nullable three_d_offered cannot be null');
        }
        $this->container['three_d_offered'] = $three_d_offered;

        return $this;
    }

    /**
     * Gets token_data_type
     *
     * @return string|null
     */
    public function getTokenDataType()
    {
        return $this->container['token_data_type'];
    }

    /**
     * Sets token_data_type
     *
     * @param string|null $token_data_type Required for PayPal payments only. The only supported value is: **paypal**.
     *
     * @return self
     */
    public function setTokenDataType($token_data_type)
    {
        if (is_null($token_data_type)) {
            throw new \InvalidArgumentException('non-nullable token_data_type cannot be null');
        }
        $this->container['token_data_type'] = $token_data_type;

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


