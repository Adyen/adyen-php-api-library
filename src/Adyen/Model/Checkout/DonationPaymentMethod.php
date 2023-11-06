<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 71
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
 * DonationPaymentMethod Class Doc Comment
 *
 * @category Class
 * @description The type and required details of a payment method to use.
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DonationPaymentMethod implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DonationPaymentMethod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'applePayToken' => 'string',
        'checkoutAttemptId' => 'string',
        'fundingSource' => 'string',
        'recurringDetailReference' => 'string',
        'storedPaymentMethodId' => 'string',
        'type' => 'string',
        'brand' => 'string',
        'cupsecureplusSmscode' => 'string',
        'cvc' => 'string',
        'encryptedCardNumber' => 'string',
        'encryptedExpiryMonth' => 'string',
        'encryptedExpiryYear' => 'string',
        'encryptedSecurityCode' => 'string',
        'expiryMonth' => 'string',
        'expiryYear' => 'string',
        'holderName' => 'string',
        'networkPaymentReference' => 'string',
        'number' => 'string',
        'shopperNotificationReference' => 'string',
        'threeDS2SdkVersion' => 'string',
        'googlePayToken' => 'string',
        'issuer' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'applePayToken' => null,
        'checkoutAttemptId' => null,
        'fundingSource' => null,
        'recurringDetailReference' => null,
        'storedPaymentMethodId' => null,
        'type' => null,
        'brand' => null,
        'cupsecureplusSmscode' => null,
        'cvc' => null,
        'encryptedCardNumber' => null,
        'encryptedExpiryMonth' => null,
        'encryptedExpiryYear' => null,
        'encryptedSecurityCode' => null,
        'expiryMonth' => null,
        'expiryYear' => null,
        'holderName' => null,
        'networkPaymentReference' => null,
        'number' => null,
        'shopperNotificationReference' => null,
        'threeDS2SdkVersion' => null,
        'googlePayToken' => null,
        'issuer' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'applePayToken' => false,
        'checkoutAttemptId' => false,
        'fundingSource' => false,
        'recurringDetailReference' => false,
        'storedPaymentMethodId' => false,
        'type' => false,
        'brand' => false,
        'cupsecureplusSmscode' => false,
        'cvc' => false,
        'encryptedCardNumber' => false,
        'encryptedExpiryMonth' => false,
        'encryptedExpiryYear' => false,
        'encryptedSecurityCode' => false,
        'expiryMonth' => false,
        'expiryYear' => false,
        'holderName' => false,
        'networkPaymentReference' => false,
        'number' => false,
        'shopperNotificationReference' => false,
        'threeDS2SdkVersion' => false,
        'googlePayToken' => false,
        'issuer' => false
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
        'applePayToken' => 'applePayToken',
        'checkoutAttemptId' => 'checkoutAttemptId',
        'fundingSource' => 'fundingSource',
        'recurringDetailReference' => 'recurringDetailReference',
        'storedPaymentMethodId' => 'storedPaymentMethodId',
        'type' => 'type',
        'brand' => 'brand',
        'cupsecureplusSmscode' => 'cupsecureplus.smscode',
        'cvc' => 'cvc',
        'encryptedCardNumber' => 'encryptedCardNumber',
        'encryptedExpiryMonth' => 'encryptedExpiryMonth',
        'encryptedExpiryYear' => 'encryptedExpiryYear',
        'encryptedSecurityCode' => 'encryptedSecurityCode',
        'expiryMonth' => 'expiryMonth',
        'expiryYear' => 'expiryYear',
        'holderName' => 'holderName',
        'networkPaymentReference' => 'networkPaymentReference',
        'number' => 'number',
        'shopperNotificationReference' => 'shopperNotificationReference',
        'threeDS2SdkVersion' => 'threeDS2SdkVersion',
        'googlePayToken' => 'googlePayToken',
        'issuer' => 'issuer'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'applePayToken' => 'setApplePayToken',
        'checkoutAttemptId' => 'setCheckoutAttemptId',
        'fundingSource' => 'setFundingSource',
        'recurringDetailReference' => 'setRecurringDetailReference',
        'storedPaymentMethodId' => 'setStoredPaymentMethodId',
        'type' => 'setType',
        'brand' => 'setBrand',
        'cupsecureplusSmscode' => 'setCupsecureplusSmscode',
        'cvc' => 'setCvc',
        'encryptedCardNumber' => 'setEncryptedCardNumber',
        'encryptedExpiryMonth' => 'setEncryptedExpiryMonth',
        'encryptedExpiryYear' => 'setEncryptedExpiryYear',
        'encryptedSecurityCode' => 'setEncryptedSecurityCode',
        'expiryMonth' => 'setExpiryMonth',
        'expiryYear' => 'setExpiryYear',
        'holderName' => 'setHolderName',
        'networkPaymentReference' => 'setNetworkPaymentReference',
        'number' => 'setNumber',
        'shopperNotificationReference' => 'setShopperNotificationReference',
        'threeDS2SdkVersion' => 'setThreeDS2SdkVersion',
        'googlePayToken' => 'setGooglePayToken',
        'issuer' => 'setIssuer'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'applePayToken' => 'getApplePayToken',
        'checkoutAttemptId' => 'getCheckoutAttemptId',
        'fundingSource' => 'getFundingSource',
        'recurringDetailReference' => 'getRecurringDetailReference',
        'storedPaymentMethodId' => 'getStoredPaymentMethodId',
        'type' => 'getType',
        'brand' => 'getBrand',
        'cupsecureplusSmscode' => 'getCupsecureplusSmscode',
        'cvc' => 'getCvc',
        'encryptedCardNumber' => 'getEncryptedCardNumber',
        'encryptedExpiryMonth' => 'getEncryptedExpiryMonth',
        'encryptedExpiryYear' => 'getEncryptedExpiryYear',
        'encryptedSecurityCode' => 'getEncryptedSecurityCode',
        'expiryMonth' => 'getExpiryMonth',
        'expiryYear' => 'getExpiryYear',
        'holderName' => 'getHolderName',
        'networkPaymentReference' => 'getNetworkPaymentReference',
        'number' => 'getNumber',
        'shopperNotificationReference' => 'getShopperNotificationReference',
        'threeDS2SdkVersion' => 'getThreeDS2SdkVersion',
        'googlePayToken' => 'getGooglePayToken',
        'issuer' => 'getIssuer'
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
        $this->setIfExists('applePayToken', $data ?? [], null);
        $this->setIfExists('checkoutAttemptId', $data ?? [], null);
        $this->setIfExists('fundingSource', $data ?? [], null);
        $this->setIfExists('recurringDetailReference', $data ?? [], null);
        $this->setIfExists('storedPaymentMethodId', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'paywithgoogle');
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('cupsecureplusSmscode', $data ?? [], null);
        $this->setIfExists('cvc', $data ?? [], null);
        $this->setIfExists('encryptedCardNumber', $data ?? [], null);
        $this->setIfExists('encryptedExpiryMonth', $data ?? [], null);
        $this->setIfExists('encryptedExpiryYear', $data ?? [], null);
        $this->setIfExists('encryptedSecurityCode', $data ?? [], null);
        $this->setIfExists('expiryMonth', $data ?? [], null);
        $this->setIfExists('expiryYear', $data ?? [], null);
        $this->setIfExists('holderName', $data ?? [], null);
        $this->setIfExists('networkPaymentReference', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
        $this->setIfExists('shopperNotificationReference', $data ?? [], null);
        $this->setIfExists('threeDS2SdkVersion', $data ?? [], null);
        $this->setIfExists('googlePayToken', $data ?? [], null);
        $this->setIfExists('issuer', $data ?? [], null);
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

        if ($this->container['applePayToken'] === null) {
            $invalidProperties[] = "'applePayToken' can't be null";
        }


        if ($this->container['googlePayToken'] === null) {
            $invalidProperties[] = "'googlePayToken' can't be null";
        }
        if ($this->container['issuer'] === null) {
            $invalidProperties[] = "'issuer' can't be null";
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
     * Gets applePayToken
     *
     * @return string
     */
    public function getApplePayToken()
    {
        return $this->container['applePayToken'];
    }

    /**
     * Sets applePayToken
     *
     * @param string $applePayToken The stringified and base64 encoded `paymentData` you retrieved from the Apple framework.
     *
     * @return self
     */
    public function setApplePayToken($applePayToken)
    {
        if (is_null($applePayToken)) {
            throw new \InvalidArgumentException('non-nullable applePayToken cannot be null');
        }
        $this->container['applePayToken'] = $applePayToken;

        return $this;
    }

    /**
     * Gets checkoutAttemptId
     *
     * @return string|null
     */
    public function getCheckoutAttemptId()
    {
        return $this->container['checkoutAttemptId'];
    }

    /**
     * Sets checkoutAttemptId
     *
     * @param string|null $checkoutAttemptId The checkout attempt identifier.
     *
     * @return self
     */
    public function setCheckoutAttemptId($checkoutAttemptId)
    {
        if (is_null($checkoutAttemptId)) {
            throw new \InvalidArgumentException('non-nullable checkoutAttemptId cannot be null');
        }
        $this->container['checkoutAttemptId'] = $checkoutAttemptId;

        return $this;
    }

    /**
     * Gets fundingSource
     *
     * @return string|null
     */
    public function getFundingSource()
    {
        return $this->container['fundingSource'];
    }

    /**
     * Sets fundingSource
     *
     * @param string|null $fundingSource The funding source that should be used when multiple sources are available. For Brazilian combo cards, by default the funding source is credit. To use debit, set this value to **debit**.
     *
     * @return self
     */
    public function setFundingSource($fundingSource)
    {
        if (is_null($fundingSource)) {
            throw new \InvalidArgumentException('non-nullable fundingSource cannot be null');
        }
        $this->container['fundingSource'] = $fundingSource;

        return $this;
    }

    /**
     * Gets recurringDetailReference
     *
     * @return string|null
     * @deprecated
     */
    public function getRecurringDetailReference()
    {
        return $this->container['recurringDetailReference'];
    }

    /**
     * Sets recurringDetailReference
     *
     * @param string|null $recurringDetailReference This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     * @deprecated
     */
    public function setRecurringDetailReference($recurringDetailReference)
    {
        if (is_null($recurringDetailReference)) {
            throw new \InvalidArgumentException('non-nullable recurringDetailReference cannot be null');
        }
        $this->container['recurringDetailReference'] = $recurringDetailReference;

        return $this;
    }

    /**
     * Gets storedPaymentMethodId
     *
     * @return string|null
     */
    public function getStoredPaymentMethodId()
    {
        return $this->container['storedPaymentMethodId'];
    }

    /**
     * Sets storedPaymentMethodId
     *
     * @param string|null $storedPaymentMethodId This is the `recurringDetailReference` returned in the response when you created the token.
     *
     * @return self
     */
    public function setStoredPaymentMethodId($storedPaymentMethodId)
    {
        if (is_null($storedPaymentMethodId)) {
            throw new \InvalidArgumentException('non-nullable storedPaymentMethodId cannot be null');
        }
        $this->container['storedPaymentMethodId'] = $storedPaymentMethodId;

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
     * @param string|null $type **paywithgoogle**
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets brand
     *
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand Secondary brand of the card. For example: **plastix**, **hmclub**.
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            throw new \InvalidArgumentException('non-nullable brand cannot be null');
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets cupsecureplusSmscode
     *
     * @return string|null
     * @deprecated
     */
    public function getCupsecureplusSmscode()
    {
        return $this->container['cupsecureplusSmscode'];
    }

    /**
     * Sets cupsecureplusSmscode
     *
     * @param string|null $cupsecureplusSmscode cupsecureplusSmscode
     *
     * @return self
     * @deprecated
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
     * Gets cvc
     *
     * @return string|null
     */
    public function getCvc()
    {
        return $this->container['cvc'];
    }

    /**
     * Sets cvc
     *
     * @param string|null $cvc The card verification code. Only collect raw card data if you are [fully PCI compliant](https://docs.adyen.com/development-resources/pci-dss-compliance-guide).
     *
     * @return self
     */
    public function setCvc($cvc)
    {
        if (is_null($cvc)) {
            throw new \InvalidArgumentException('non-nullable cvc cannot be null');
        }
        $this->container['cvc'] = $cvc;

        return $this;
    }

    /**
     * Gets encryptedCardNumber
     *
     * @return string|null
     */
    public function getEncryptedCardNumber()
    {
        return $this->container['encryptedCardNumber'];
    }

    /**
     * Sets encryptedCardNumber
     *
     * @param string|null $encryptedCardNumber The encrypted card number.
     *
     * @return self
     */
    public function setEncryptedCardNumber($encryptedCardNumber)
    {
        if (is_null($encryptedCardNumber)) {
            throw new \InvalidArgumentException('non-nullable encryptedCardNumber cannot be null');
        }
        $this->container['encryptedCardNumber'] = $encryptedCardNumber;

        return $this;
    }

    /**
     * Gets encryptedExpiryMonth
     *
     * @return string|null
     */
    public function getEncryptedExpiryMonth()
    {
        return $this->container['encryptedExpiryMonth'];
    }

    /**
     * Sets encryptedExpiryMonth
     *
     * @param string|null $encryptedExpiryMonth The encrypted card expiry month.
     *
     * @return self
     */
    public function setEncryptedExpiryMonth($encryptedExpiryMonth)
    {
        if (is_null($encryptedExpiryMonth)) {
            throw new \InvalidArgumentException('non-nullable encryptedExpiryMonth cannot be null');
        }
        $this->container['encryptedExpiryMonth'] = $encryptedExpiryMonth;

        return $this;
    }

    /**
     * Gets encryptedExpiryYear
     *
     * @return string|null
     */
    public function getEncryptedExpiryYear()
    {
        return $this->container['encryptedExpiryYear'];
    }

    /**
     * Sets encryptedExpiryYear
     *
     * @param string|null $encryptedExpiryYear The encrypted card expiry year.
     *
     * @return self
     */
    public function setEncryptedExpiryYear($encryptedExpiryYear)
    {
        if (is_null($encryptedExpiryYear)) {
            throw new \InvalidArgumentException('non-nullable encryptedExpiryYear cannot be null');
        }
        $this->container['encryptedExpiryYear'] = $encryptedExpiryYear;

        return $this;
    }

    /**
     * Gets encryptedSecurityCode
     *
     * @return string|null
     */
    public function getEncryptedSecurityCode()
    {
        return $this->container['encryptedSecurityCode'];
    }

    /**
     * Sets encryptedSecurityCode
     *
     * @param string|null $encryptedSecurityCode The encrypted card verification code.
     *
     * @return self
     */
    public function setEncryptedSecurityCode($encryptedSecurityCode)
    {
        if (is_null($encryptedSecurityCode)) {
            throw new \InvalidArgumentException('non-nullable encryptedSecurityCode cannot be null');
        }
        $this->container['encryptedSecurityCode'] = $encryptedSecurityCode;

        return $this;
    }

    /**
     * Gets expiryMonth
     *
     * @return string|null
     */
    public function getExpiryMonth()
    {
        return $this->container['expiryMonth'];
    }

    /**
     * Sets expiryMonth
     *
     * @param string|null $expiryMonth The card expiry month. Only collect raw card data if you are [fully PCI compliant](https://docs.adyen.com/development-resources/pci-dss-compliance-guide).
     *
     * @return self
     */
    public function setExpiryMonth($expiryMonth)
    {
        if (is_null($expiryMonth)) {
            throw new \InvalidArgumentException('non-nullable expiryMonth cannot be null');
        }
        $this->container['expiryMonth'] = $expiryMonth;

        return $this;
    }

    /**
     * Gets expiryYear
     *
     * @return string|null
     */
    public function getExpiryYear()
    {
        return $this->container['expiryYear'];
    }

    /**
     * Sets expiryYear
     *
     * @param string|null $expiryYear The card expiry year. Only collect raw card data if you are [fully PCI compliant](https://docs.adyen.com/development-resources/pci-dss-compliance-guide).
     *
     * @return self
     */
    public function setExpiryYear($expiryYear)
    {
        if (is_null($expiryYear)) {
            throw new \InvalidArgumentException('non-nullable expiryYear cannot be null');
        }
        $this->container['expiryYear'] = $expiryYear;

        return $this;
    }

    /**
     * Gets holderName
     *
     * @return string|null
     */
    public function getHolderName()
    {
        return $this->container['holderName'];
    }

    /**
     * Sets holderName
     *
     * @param string|null $holderName The name of the card holder.
     *
     * @return self
     */
    public function setHolderName($holderName)
    {
        if (is_null($holderName)) {
            throw new \InvalidArgumentException('non-nullable holderName cannot be null');
        }
        $this->container['holderName'] = $holderName;

        return $this;
    }

    /**
     * Gets networkPaymentReference
     *
     * @return string|null
     */
    public function getNetworkPaymentReference()
    {
        return $this->container['networkPaymentReference'];
    }

    /**
     * Sets networkPaymentReference
     *
     * @param string|null $networkPaymentReference The network token reference. This is the [`networkTxReference`](https://docs.adyen.com/api-explorer/#/CheckoutService/latest/post/payments__resParam_additionalData-ResponseAdditionalDataCommon-networkTxReference) from the response to the first payment.
     *
     * @return self
     */
    public function setNetworkPaymentReference($networkPaymentReference)
    {
        if (is_null($networkPaymentReference)) {
            throw new \InvalidArgumentException('non-nullable networkPaymentReference cannot be null');
        }
        $this->container['networkPaymentReference'] = $networkPaymentReference;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string|null $number The card number. Only collect raw card data if you are [fully PCI compliant](https://docs.adyen.com/development-resources/pci-dss-compliance-guide).
     *
     * @return self
     */
    public function setNumber($number)
    {
        if (is_null($number)) {
            throw new \InvalidArgumentException('non-nullable number cannot be null');
        }
        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets shopperNotificationReference
     *
     * @return string|null
     */
    public function getShopperNotificationReference()
    {
        return $this->container['shopperNotificationReference'];
    }

    /**
     * Sets shopperNotificationReference
     *
     * @param string|null $shopperNotificationReference The `shopperNotificationReference` returned in the response when you requested to notify the shopper. Used only for recurring payments in India.
     *
     * @return self
     */
    public function setShopperNotificationReference($shopperNotificationReference)
    {
        if (is_null($shopperNotificationReference)) {
            throw new \InvalidArgumentException('non-nullable shopperNotificationReference cannot be null');
        }
        $this->container['shopperNotificationReference'] = $shopperNotificationReference;

        return $this;
    }

    /**
     * Gets threeDS2SdkVersion
     *
     * @return string|null
     */
    public function getThreeDS2SdkVersion()
    {
        return $this->container['threeDS2SdkVersion'];
    }

    /**
     * Sets threeDS2SdkVersion
     *
     * @param string|null $threeDS2SdkVersion Required for mobile integrations. Version of the 3D Secure 2 mobile SDK.
     *
     * @return self
     */
    public function setThreeDS2SdkVersion($threeDS2SdkVersion)
    {
        if (is_null($threeDS2SdkVersion)) {
            throw new \InvalidArgumentException('non-nullable threeDS2SdkVersion cannot be null');
        }
        $this->container['threeDS2SdkVersion'] = $threeDS2SdkVersion;

        return $this;
    }

    /**
     * Gets googlePayToken
     *
     * @return string
     */
    public function getGooglePayToken()
    {
        return $this->container['googlePayToken'];
    }

    /**
     * Sets googlePayToken
     *
     * @param string $googlePayToken The `token` that you obtained from the [Google Pay API](https://developers.google.com/pay/api/web/reference/response-objects#PaymentData) `PaymentData` response.
     *
     * @return self
     */
    public function setGooglePayToken($googlePayToken)
    {
        if (is_null($googlePayToken)) {
            throw new \InvalidArgumentException('non-nullable googlePayToken cannot be null');
        }
        $this->container['googlePayToken'] = $googlePayToken;

        return $this;
    }

    /**
     * Gets issuer
     *
     * @return string
     */
    public function getIssuer()
    {
        return $this->container['issuer'];
    }

    /**
     * Sets issuer
     *
     * @param string $issuer The iDEAL issuer value of the shopper's selected bank. Set this to an **id** of an iDEAL issuer to preselect it.
     *
     * @return self
     */
    public function setIssuer($issuer)
    {
        if (is_null($issuer)) {
            throw new \InvalidArgumentException('non-nullable issuer cannot be null');
        }
        $this->container['issuer'] = $issuer;

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
