<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
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
 * PaymentDetails Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'checkout_attempt_id' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'checkout_attempt_id' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'checkout_attempt_id' => false,
		'type' => false
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
        'checkout_attempt_id' => 'checkoutAttemptId',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'checkout_attempt_id' => 'setCheckoutAttemptId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'checkout_attempt_id' => 'getCheckoutAttemptId',
        'type' => 'getType'
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

    public const TYPE_ALIPAY = 'alipay';
    public const TYPE_MULTIBANCO = 'multibanco';
    public const TYPE_BANK_TRANSFER_IBAN = 'bankTransfer_IBAN';
    public const TYPE_PAYBRIGHT = 'paybright';
    public const TYPE_PAYNOW = 'paynow';
    public const TYPE_AFFIRM = 'affirm';
    public const TYPE_AFFIRM_POS = 'affirm_pos';
    public const TYPE_TRUSTLY = 'trustly';
    public const TYPE_TRUSTLYVECTOR = 'trustlyvector';
    public const TYPE_ONEY = 'oney';
    public const TYPE_FACILYPAY = 'facilypay';
    public const TYPE_FACILYPAY_3X = 'facilypay_3x';
    public const TYPE_FACILYPAY_4X = 'facilypay_4x';
    public const TYPE_FACILYPAY_6X = 'facilypay_6x';
    public const TYPE_FACILYPAY_10X = 'facilypay_10x';
    public const TYPE_FACILYPAY_12X = 'facilypay_12x';
    public const TYPE_UNIONPAY = 'unionpay';
    public const TYPE_KCP_BANKTRANSFER = 'kcp_banktransfer';
    public const TYPE_KCP_PAYCO = 'kcp_payco';
    public const TYPE_KCP_CREDITCARD = 'kcp_creditcard';
    public const TYPE_WECHATPAY_SDK = 'wechatpaySDK';
    public const TYPE_WECHATPAY_QR = 'wechatpayQR';
    public const TYPE_WECHATPAY_WEB = 'wechatpayWeb';
    public const TYPE_MOLPAY_BOOST = 'molpay_boost';
    public const TYPE_WALLET_IN = 'wallet_IN';
    public const TYPE_PAYU_IN_CASHCARD = 'payu_IN_cashcard';
    public const TYPE_PAYU_IN_NB = 'payu_IN_nb';
    public const TYPE_UPI_QR = 'upi_qr';
    public const TYPE_PAYTM = 'paytm';
    public const TYPE_MOLPAY_EBANKING_VN = 'molpay_ebanking_VN';
    public const TYPE_OPENBANKING_UK = 'openbanking_UK';
    public const TYPE_PAYBYBANK = 'paybybank';
    public const TYPE_EBANKING_FI = 'ebanking_FI';
    public const TYPE_MOLPAY_EBANKING_MY = 'molpay_ebanking_MY';
    public const TYPE_MOLPAY_EBANKING_DIRECT_MY = 'molpay_ebanking_direct_MY';
    public const TYPE_SWISH = 'swish';
    public const TYPE_TWINT = 'twint';
    public const TYPE_WALLEY = 'walley';
    public const TYPE_WALLEY_B2B = 'walley_b2b';
    public const TYPE_PIX = 'pix';
    public const TYPE_BIZUM = 'bizum';
    public const TYPE_ALMA = 'alma';
    public const TYPE_MOLPAY_FPX = 'molpay_fpx';
    public const TYPE_KONBINI = 'konbini';
    public const TYPE_DIRECT_EBANKING = 'directEbanking';
    public const TYPE_BOLETOBANCARIO = 'boletobancario';
    public const TYPE_NETELLER = 'neteller';
    public const TYPE_DANA = 'dana';
    public const TYPE_PAYSAFECARD = 'paysafecard';
    public const TYPE_CASHTICKET = 'cashticket';
    public const TYPE_IKANO = 'ikano';
    public const TYPE_KARENMILLEN = 'karenmillen';
    public const TYPE_OASIS = 'oasis';
    public const TYPE_WAREHOUSE = 'warehouse';
    public const TYPE_PRIMEIROPAY_BOLETO = 'primeiropay_boleto';
    public const TYPE_MADA = 'mada';
    public const TYPE_BENEFIT = 'benefit';
    public const TYPE_KNET = 'knet';
    public const TYPE_OMANNET = 'omannet';
    public const TYPE_GOPAY_WALLET = 'gopay_wallet';
    public const TYPE_POLI = 'poli';
    public const TYPE_KCP_NAVERPAY = 'kcp_naverpay';
    public const TYPE_ONLINEBANKING_IN = 'onlinebanking_IN';
    public const TYPE_FAWRY = 'fawry';
    public const TYPE_ATOME = 'atome';
    public const TYPE_MONEYBOOKERS = 'moneybookers';
    public const TYPE_NAPS = 'naps';
    public const TYPE_NORDEA = 'nordea';
    public const TYPE_BOLETOBANCARIO_BRADESCO = 'boletobancario_bradesco';
    public const TYPE_BOLETOBANCARIO_ITAU = 'boletobancario_itau';
    public const TYPE_BOLETOBANCARIO_SANTANDER = 'boletobancario_santander';
    public const TYPE_BOLETOBANCARIO_BANCODOBRASIL = 'boletobancario_bancodobrasil';
    public const TYPE_BOLETOBANCARIO_HSBC = 'boletobancario_hsbc';
    public const TYPE_MOLPAY_MAYBANK2U = 'molpay_maybank2u';
    public const TYPE_MOLPAY_CIMB = 'molpay_cimb';
    public const TYPE_MOLPAY_RHB = 'molpay_rhb';
    public const TYPE_MOLPAY_AMB = 'molpay_amb';
    public const TYPE_MOLPAY_HLB = 'molpay_hlb';
    public const TYPE_MOLPAY_AFFIN_EPG = 'molpay_affin_epg';
    public const TYPE_MOLPAY_BANKISLAM = 'molpay_bankislam';
    public const TYPE_MOLPAY_PUBLICBANK = 'molpay_publicbank';
    public const TYPE_FPX_AGROBANK = 'fpx_agrobank';
    public const TYPE_TOUCHNGO = 'touchngo';
    public const TYPE_MAYBANK2U_MAE = 'maybank2u_mae';
    public const TYPE_DUITNOW = 'duitnow';
    public const TYPE_PROMPTPAY = 'promptpay';
    public const TYPE_TWINT_POS = 'twint_pos';
    public const TYPE_ALIPAY_HK = 'alipay_hk';
    public const TYPE_ALIPAY_HK_WEB = 'alipay_hk_web';
    public const TYPE_ALIPAY_HK_WAP = 'alipay_hk_wap';
    public const TYPE_ALIPAY_WAP = 'alipay_wap';
    public const TYPE_BALANCEPLATFORM = 'balanceplatform';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ALIPAY,
            self::TYPE_MULTIBANCO,
            self::TYPE_BANK_TRANSFER_IBAN,
            self::TYPE_PAYBRIGHT,
            self::TYPE_PAYNOW,
            self::TYPE_AFFIRM,
            self::TYPE_AFFIRM_POS,
            self::TYPE_TRUSTLY,
            self::TYPE_TRUSTLYVECTOR,
            self::TYPE_ONEY,
            self::TYPE_FACILYPAY,
            self::TYPE_FACILYPAY_3X,
            self::TYPE_FACILYPAY_4X,
            self::TYPE_FACILYPAY_6X,
            self::TYPE_FACILYPAY_10X,
            self::TYPE_FACILYPAY_12X,
            self::TYPE_UNIONPAY,
            self::TYPE_KCP_BANKTRANSFER,
            self::TYPE_KCP_PAYCO,
            self::TYPE_KCP_CREDITCARD,
            self::TYPE_WECHATPAY_SDK,
            self::TYPE_WECHATPAY_QR,
            self::TYPE_WECHATPAY_WEB,
            self::TYPE_MOLPAY_BOOST,
            self::TYPE_WALLET_IN,
            self::TYPE_PAYU_IN_CASHCARD,
            self::TYPE_PAYU_IN_NB,
            self::TYPE_UPI_QR,
            self::TYPE_PAYTM,
            self::TYPE_MOLPAY_EBANKING_VN,
            self::TYPE_OPENBANKING_UK,
            self::TYPE_PAYBYBANK,
            self::TYPE_EBANKING_FI,
            self::TYPE_MOLPAY_EBANKING_MY,
            self::TYPE_MOLPAY_EBANKING_DIRECT_MY,
            self::TYPE_SWISH,
            self::TYPE_TWINT,
            self::TYPE_WALLEY,
            self::TYPE_WALLEY_B2B,
            self::TYPE_PIX,
            self::TYPE_BIZUM,
            self::TYPE_ALMA,
            self::TYPE_MOLPAY_FPX,
            self::TYPE_KONBINI,
            self::TYPE_DIRECT_EBANKING,
            self::TYPE_BOLETOBANCARIO,
            self::TYPE_NETELLER,
            self::TYPE_DANA,
            self::TYPE_PAYSAFECARD,
            self::TYPE_CASHTICKET,
            self::TYPE_IKANO,
            self::TYPE_KARENMILLEN,
            self::TYPE_OASIS,
            self::TYPE_WAREHOUSE,
            self::TYPE_PRIMEIROPAY_BOLETO,
            self::TYPE_MADA,
            self::TYPE_BENEFIT,
            self::TYPE_KNET,
            self::TYPE_OMANNET,
            self::TYPE_GOPAY_WALLET,
            self::TYPE_POLI,
            self::TYPE_KCP_NAVERPAY,
            self::TYPE_ONLINEBANKING_IN,
            self::TYPE_FAWRY,
            self::TYPE_ATOME,
            self::TYPE_MONEYBOOKERS,
            self::TYPE_NAPS,
            self::TYPE_NORDEA,
            self::TYPE_BOLETOBANCARIO_BRADESCO,
            self::TYPE_BOLETOBANCARIO_ITAU,
            self::TYPE_BOLETOBANCARIO_SANTANDER,
            self::TYPE_BOLETOBANCARIO_BANCODOBRASIL,
            self::TYPE_BOLETOBANCARIO_HSBC,
            self::TYPE_MOLPAY_MAYBANK2U,
            self::TYPE_MOLPAY_CIMB,
            self::TYPE_MOLPAY_RHB,
            self::TYPE_MOLPAY_AMB,
            self::TYPE_MOLPAY_HLB,
            self::TYPE_MOLPAY_AFFIN_EPG,
            self::TYPE_MOLPAY_BANKISLAM,
            self::TYPE_MOLPAY_PUBLICBANK,
            self::TYPE_FPX_AGROBANK,
            self::TYPE_TOUCHNGO,
            self::TYPE_MAYBANK2U_MAE,
            self::TYPE_DUITNOW,
            self::TYPE_PROMPTPAY,
            self::TYPE_TWINT_POS,
            self::TYPE_ALIPAY_HK,
            self::TYPE_ALIPAY_HK_WEB,
            self::TYPE_ALIPAY_HK_WAP,
            self::TYPE_ALIPAY_WAP,
            self::TYPE_BALANCEPLATFORM,
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
        $this->setIfExists('checkout_attempt_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
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
     * Gets checkout_attempt_id
     *
     * @return string|null
     */
    public function getCheckoutAttemptId()
    {
        return $this->container['checkout_attempt_id'];
    }

    /**
     * Sets checkout_attempt_id
     *
     * @param string|null $checkout_attempt_id The checkout attempt identifier.
     *
     * @return self
     */
    public function setCheckoutAttemptId($checkout_attempt_id)
    {
        if (is_null($checkout_attempt_id)) {
            throw new \InvalidArgumentException('non-nullable checkout_attempt_id cannot be null');
        }
        $this->container['checkout_attempt_id'] = $checkout_attempt_id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type The payment method type.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
