<?php

/**
 * Management API
 *
 * Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. ## Authentication Each request to the Management API must be signed with an API key. [Generate your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) in the Customer Area and then set this key to the `X-API-Key` header value.  To access the live endpoints, you need to generate a new API key in your live Customer Area. ## Versioning  Management API handles versioning as part of the endpoint URL. For example, to send a request to version 1 of the `/companies/{companyId}/webhooks` endpoint, use:  ```text https://management-test.adyen.com/v1/companies/{companyId}/webhooks ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area. Use this API key to make requests to:  ```text https://management-live.adyen.com/v1 ```
 *
 * The version of the OpenAPI document: 1
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * PaymentMethod Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentMethod implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentMethod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed' => 'bool',
        'apple_pay' => '\Adyen\Model\Management\ApplePayInfo',
        'bcmc' => '\Adyen\Model\Management\BcmcInfo',
        'business_line_id' => 'string',
        'cartes_bancaires' => '\Adyen\Model\Management\CartesBancairesInfo',
        'countries' => 'string[]',
        'currencies' => 'string[]',
        'custom_routing_flags' => 'string[]',
        'enabled' => 'bool',
        'giro_pay' => '\Adyen\Model\Management\GiroPayInfo',
        'google_pay' => '\Adyen\Model\Management\GooglePayInfo',
        'id' => 'string',
        'klarna' => '\Adyen\Model\Management\KlarnaInfo',
        'meal_voucher_fr' => '\Adyen\Model\Management\MealVoucherFRInfo',
        'paypal' => '\Adyen\Model\Management\PayPalInfo',
        'reference' => 'string',
        'shopper_interaction' => 'string',
        'sofort' => '\Adyen\Model\Management\SofortInfo',
        'store_id' => 'string',
        'swish' => '\Adyen\Model\Management\SwishInfo',
        'type' => 'string',
        'verification_status' => 'string',
        'vipps' => '\Adyen\Model\Management\VippsInfo'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allowed' => null,
        'apple_pay' => null,
        'bcmc' => null,
        'business_line_id' => null,
        'cartes_bancaires' => null,
        'countries' => null,
        'currencies' => null,
        'custom_routing_flags' => null,
        'enabled' => null,
        'giro_pay' => null,
        'google_pay' => null,
        'id' => null,
        'klarna' => null,
        'meal_voucher_fr' => null,
        'paypal' => null,
        'reference' => null,
        'shopper_interaction' => null,
        'sofort' => null,
        'store_id' => null,
        'swish' => null,
        'type' => null,
        'verification_status' => null,
        'vipps' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'allowed' => false,
		'apple_pay' => false,
		'bcmc' => false,
		'business_line_id' => false,
		'cartes_bancaires' => false,
		'countries' => false,
		'currencies' => false,
		'custom_routing_flags' => false,
		'enabled' => false,
		'giro_pay' => false,
		'google_pay' => false,
		'id' => false,
		'klarna' => false,
		'meal_voucher_fr' => false,
		'paypal' => false,
		'reference' => false,
		'shopper_interaction' => false,
		'sofort' => false,
		'store_id' => false,
		'swish' => false,
		'type' => false,
		'verification_status' => false,
		'vipps' => false
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
        'allowed' => 'allowed',
        'apple_pay' => 'applePay',
        'bcmc' => 'bcmc',
        'business_line_id' => 'businessLineId',
        'cartes_bancaires' => 'cartesBancaires',
        'countries' => 'countries',
        'currencies' => 'currencies',
        'custom_routing_flags' => 'customRoutingFlags',
        'enabled' => 'enabled',
        'giro_pay' => 'giroPay',
        'google_pay' => 'googlePay',
        'id' => 'id',
        'klarna' => 'klarna',
        'meal_voucher_fr' => 'mealVoucher_FR',
        'paypal' => 'paypal',
        'reference' => 'reference',
        'shopper_interaction' => 'shopperInteraction',
        'sofort' => 'sofort',
        'store_id' => 'storeId',
        'swish' => 'swish',
        'type' => 'type',
        'verification_status' => 'verificationStatus',
        'vipps' => 'vipps'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed' => 'setAllowed',
        'apple_pay' => 'setApplePay',
        'bcmc' => 'setBcmc',
        'business_line_id' => 'setBusinessLineId',
        'cartes_bancaires' => 'setCartesBancaires',
        'countries' => 'setCountries',
        'currencies' => 'setCurrencies',
        'custom_routing_flags' => 'setCustomRoutingFlags',
        'enabled' => 'setEnabled',
        'giro_pay' => 'setGiroPay',
        'google_pay' => 'setGooglePay',
        'id' => 'setId',
        'klarna' => 'setKlarna',
        'meal_voucher_fr' => 'setMealVoucherFr',
        'paypal' => 'setPaypal',
        'reference' => 'setReference',
        'shopper_interaction' => 'setShopperInteraction',
        'sofort' => 'setSofort',
        'store_id' => 'setStoreId',
        'swish' => 'setSwish',
        'type' => 'setType',
        'verification_status' => 'setVerificationStatus',
        'vipps' => 'setVipps'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed' => 'getAllowed',
        'apple_pay' => 'getApplePay',
        'bcmc' => 'getBcmc',
        'business_line_id' => 'getBusinessLineId',
        'cartes_bancaires' => 'getCartesBancaires',
        'countries' => 'getCountries',
        'currencies' => 'getCurrencies',
        'custom_routing_flags' => 'getCustomRoutingFlags',
        'enabled' => 'getEnabled',
        'giro_pay' => 'getGiroPay',
        'google_pay' => 'getGooglePay',
        'id' => 'getId',
        'klarna' => 'getKlarna',
        'meal_voucher_fr' => 'getMealVoucherFr',
        'paypal' => 'getPaypal',
        'reference' => 'getReference',
        'shopper_interaction' => 'getShopperInteraction',
        'sofort' => 'getSofort',
        'store_id' => 'getStoreId',
        'swish' => 'getSwish',
        'type' => 'getType',
        'verification_status' => 'getVerificationStatus',
        'vipps' => 'getVipps'
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

    public const VERIFICATION_STATUS_VALID = 'valid';
    public const VERIFICATION_STATUS_PENDING = 'pending';
    public const VERIFICATION_STATUS_INVALID = 'invalid';
    public const VERIFICATION_STATUS_REJECTED = 'rejected';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getVerificationStatusAllowableValues()
    {
        return [
            self::VERIFICATION_STATUS_VALID,
            self::VERIFICATION_STATUS_PENDING,
            self::VERIFICATION_STATUS_INVALID,
            self::VERIFICATION_STATUS_REJECTED,
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
        $this->setIfExists('allowed', $data ?? [], null);
        $this->setIfExists('apple_pay', $data ?? [], null);
        $this->setIfExists('bcmc', $data ?? [], null);
        $this->setIfExists('business_line_id', $data ?? [], null);
        $this->setIfExists('cartes_bancaires', $data ?? [], null);
        $this->setIfExists('countries', $data ?? [], null);
        $this->setIfExists('currencies', $data ?? [], null);
        $this->setIfExists('custom_routing_flags', $data ?? [], null);
        $this->setIfExists('enabled', $data ?? [], null);
        $this->setIfExists('giro_pay', $data ?? [], null);
        $this->setIfExists('google_pay', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('klarna', $data ?? [], null);
        $this->setIfExists('meal_voucher_fr', $data ?? [], null);
        $this->setIfExists('paypal', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopper_interaction', $data ?? [], null);
        $this->setIfExists('sofort', $data ?? [], null);
        $this->setIfExists('store_id', $data ?? [], null);
        $this->setIfExists('swish', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('verification_status', $data ?? [], null);
        $this->setIfExists('vipps', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!is_null($this->container['verification_status']) && !in_array($this->container['verification_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'verification_status', must be one of '%s'",
                $this->container['verification_status'],
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
     * Gets allowed
     *
     * @return bool|null
     */
    public function getAllowed()
    {
        return $this->container['allowed'];
    }

    /**
     * Sets allowed
     *
     * @param bool|null $allowed Indicates whether receiving payments is allowed. This value is set to **true** by Adyen after screening your merchant account.
     *
     * @return self
     */
    public function setAllowed($allowed)
    {
        if (is_null($allowed)) {
            throw new \InvalidArgumentException('non-nullable allowed cannot be null');
        }
        $this->container['allowed'] = $allowed;

        return $this;
    }

    /**
     * Gets apple_pay
     *
     * @return \Adyen\Model\Management\ApplePayInfo|null
     */
    public function getApplePay()
    {
        return $this->container['apple_pay'];
    }

    /**
     * Sets apple_pay
     *
     * @param \Adyen\Model\Management\ApplePayInfo|null $apple_pay apple_pay
     *
     * @return self
     */
    public function setApplePay($apple_pay)
    {
        if (is_null($apple_pay)) {
            throw new \InvalidArgumentException('non-nullable apple_pay cannot be null');
        }
        $this->container['apple_pay'] = $apple_pay;

        return $this;
    }

    /**
     * Gets bcmc
     *
     * @return \Adyen\Model\Management\BcmcInfo|null
     */
    public function getBcmc()
    {
        return $this->container['bcmc'];
    }

    /**
     * Sets bcmc
     *
     * @param \Adyen\Model\Management\BcmcInfo|null $bcmc bcmc
     *
     * @return self
     */
    public function setBcmc($bcmc)
    {
        if (is_null($bcmc)) {
            throw new \InvalidArgumentException('non-nullable bcmc cannot be null');
        }
        $this->container['bcmc'] = $bcmc;

        return $this;
    }

    /**
     * Gets business_line_id
     *
     * @return string|null
     */
    public function getBusinessLineId()
    {
        return $this->container['business_line_id'];
    }

    /**
     * Sets business_line_id
     *
     * @param string|null $business_line_id The unique identifier of the business line.
     *
     * @return self
     */
    public function setBusinessLineId($business_line_id)
    {
        if (is_null($business_line_id)) {
            throw new \InvalidArgumentException('non-nullable business_line_id cannot be null');
        }
        $this->container['business_line_id'] = $business_line_id;

        return $this;
    }

    /**
     * Gets cartes_bancaires
     *
     * @return \Adyen\Model\Management\CartesBancairesInfo|null
     */
    public function getCartesBancaires()
    {
        return $this->container['cartes_bancaires'];
    }

    /**
     * Sets cartes_bancaires
     *
     * @param \Adyen\Model\Management\CartesBancairesInfo|null $cartes_bancaires cartes_bancaires
     *
     * @return self
     */
    public function setCartesBancaires($cartes_bancaires)
    {
        if (is_null($cartes_bancaires)) {
            throw new \InvalidArgumentException('non-nullable cartes_bancaires cannot be null');
        }
        $this->container['cartes_bancaires'] = $cartes_bancaires;

        return $this;
    }

    /**
     * Gets countries
     *
     * @return string[]|null
     */
    public function getCountries()
    {
        return $this->container['countries'];
    }

    /**
     * Sets countries
     *
     * @param string[]|null $countries The list of countries where a payment method is available. By default, all countries supported by the payment method.
     *
     * @return self
     */
    public function setCountries($countries)
    {
        if (is_null($countries)) {
            throw new \InvalidArgumentException('non-nullable countries cannot be null');
        }
        $this->container['countries'] = $countries;

        return $this;
    }

    /**
     * Gets currencies
     *
     * @return string[]|null
     */
    public function getCurrencies()
    {
        return $this->container['currencies'];
    }

    /**
     * Sets currencies
     *
     * @param string[]|null $currencies The list of currencies that a payment method supports. By default, all currencies supported by the payment method.
     *
     * @return self
     */
    public function setCurrencies($currencies)
    {
        if (is_null($currencies)) {
            throw new \InvalidArgumentException('non-nullable currencies cannot be null');
        }
        $this->container['currencies'] = $currencies;

        return $this;
    }

    /**
     * Gets custom_routing_flags
     *
     * @return string[]|null
     */
    public function getCustomRoutingFlags()
    {
        return $this->container['custom_routing_flags'];
    }

    /**
     * Sets custom_routing_flags
     *
     * @param string[]|null $custom_routing_flags The list of custom routing flags to route payment to the intended acquirer.
     *
     * @return self
     */
    public function setCustomRoutingFlags($custom_routing_flags)
    {
        if (is_null($custom_routing_flags)) {
            throw new \InvalidArgumentException('non-nullable custom_routing_flags cannot be null');
        }
        $this->container['custom_routing_flags'] = $custom_routing_flags;

        return $this;
    }

    /**
     * Gets enabled
     *
     * @return bool|null
     */
    public function getEnabled()
    {
        return $this->container['enabled'];
    }

    /**
     * Sets enabled
     *
     * @param bool|null $enabled Indicates whether the payment method is enabled (**true**) or disabled (**false**).
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        if (is_null($enabled)) {
            throw new \InvalidArgumentException('non-nullable enabled cannot be null');
        }
        $this->container['enabled'] = $enabled;

        return $this;
    }

    /**
     * Gets giro_pay
     *
     * @return \Adyen\Model\Management\GiroPayInfo|null
     */
    public function getGiroPay()
    {
        return $this->container['giro_pay'];
    }

    /**
     * Sets giro_pay
     *
     * @param \Adyen\Model\Management\GiroPayInfo|null $giro_pay giro_pay
     *
     * @return self
     */
    public function setGiroPay($giro_pay)
    {
        if (is_null($giro_pay)) {
            throw new \InvalidArgumentException('non-nullable giro_pay cannot be null');
        }
        $this->container['giro_pay'] = $giro_pay;

        return $this;
    }

    /**
     * Gets google_pay
     *
     * @return \Adyen\Model\Management\GooglePayInfo|null
     */
    public function getGooglePay()
    {
        return $this->container['google_pay'];
    }

    /**
     * Sets google_pay
     *
     * @param \Adyen\Model\Management\GooglePayInfo|null $google_pay google_pay
     *
     * @return self
     */
    public function setGooglePay($google_pay)
    {
        if (is_null($google_pay)) {
            throw new \InvalidArgumentException('non-nullable google_pay cannot be null');
        }
        $this->container['google_pay'] = $google_pay;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The identifier of the resource.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets klarna
     *
     * @return \Adyen\Model\Management\KlarnaInfo|null
     */
    public function getKlarna()
    {
        return $this->container['klarna'];
    }

    /**
     * Sets klarna
     *
     * @param \Adyen\Model\Management\KlarnaInfo|null $klarna klarna
     *
     * @return self
     */
    public function setKlarna($klarna)
    {
        if (is_null($klarna)) {
            throw new \InvalidArgumentException('non-nullable klarna cannot be null');
        }
        $this->container['klarna'] = $klarna;

        return $this;
    }

    /**
     * Gets meal_voucher_fr
     *
     * @return \Adyen\Model\Management\MealVoucherFRInfo|null
     */
    public function getMealVoucherFr()
    {
        return $this->container['meal_voucher_fr'];
    }

    /**
     * Sets meal_voucher_fr
     *
     * @param \Adyen\Model\Management\MealVoucherFRInfo|null $meal_voucher_fr meal_voucher_fr
     *
     * @return self
     */
    public function setMealVoucherFr($meal_voucher_fr)
    {
        if (is_null($meal_voucher_fr)) {
            throw new \InvalidArgumentException('non-nullable meal_voucher_fr cannot be null');
        }
        $this->container['meal_voucher_fr'] = $meal_voucher_fr;

        return $this;
    }

    /**
     * Gets paypal
     *
     * @return \Adyen\Model\Management\PayPalInfo|null
     */
    public function getPaypal()
    {
        return $this->container['paypal'];
    }

    /**
     * Sets paypal
     *
     * @param \Adyen\Model\Management\PayPalInfo|null $paypal paypal
     *
     * @return self
     */
    public function setPaypal($paypal)
    {
        if (is_null($paypal)) {
            throw new \InvalidArgumentException('non-nullable paypal cannot be null');
        }
        $this->container['paypal'] = $paypal;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Your reference for the payment method. Supported characters a-z, A-Z, 0-9.
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            throw new \InvalidArgumentException('non-nullable reference cannot be null');
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets shopper_interaction
     *
     * @return string|null
     */
    public function getShopperInteraction()
    {
        return $this->container['shopper_interaction'];
    }

    /**
     * Sets shopper_interaction
     *
     * @param string|null $shopper_interaction The sales channel.
     *
     * @return self
     */
    public function setShopperInteraction($shopper_interaction)
    {
        if (is_null($shopper_interaction)) {
            throw new \InvalidArgumentException('non-nullable shopper_interaction cannot be null');
        }
        $this->container['shopper_interaction'] = $shopper_interaction;

        return $this;
    }

    /**
     * Gets sofort
     *
     * @return \Adyen\Model\Management\SofortInfo|null
     */
    public function getSofort()
    {
        return $this->container['sofort'];
    }

    /**
     * Sets sofort
     *
     * @param \Adyen\Model\Management\SofortInfo|null $sofort sofort
     *
     * @return self
     */
    public function setSofort($sofort)
    {
        if (is_null($sofort)) {
            throw new \InvalidArgumentException('non-nullable sofort cannot be null');
        }
        $this->container['sofort'] = $sofort;

        return $this;
    }

    /**
     * Gets store_id
     *
     * @return string|null
     */
    public function getStoreId()
    {
        return $this->container['store_id'];
    }

    /**
     * Sets store_id
     *
     * @param string|null $store_id The ID of the [store](https://docs.adyen.com/api-explorer/#/ManagementService/latest/post/stores__resParam_id), if any.
     *
     * @return self
     */
    public function setStoreId($store_id)
    {
        if (is_null($store_id)) {
            throw new \InvalidArgumentException('non-nullable store_id cannot be null');
        }
        $this->container['store_id'] = $store_id;

        return $this;
    }

    /**
     * Gets swish
     *
     * @return \Adyen\Model\Management\SwishInfo|null
     */
    public function getSwish()
    {
        return $this->container['swish'];
    }

    /**
     * Sets swish
     *
     * @param \Adyen\Model\Management\SwishInfo|null $swish swish
     *
     * @return self
     */
    public function setSwish($swish)
    {
        if (is_null($swish)) {
            throw new \InvalidArgumentException('non-nullable swish cannot be null');
        }
        $this->container['swish'] = $swish;

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
     * @param string|null $type Payment method [variant](https://docs.adyen.com/development-resources/paymentmethodvariant#management-api).
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
     * Gets verification_status
     *
     * @return string|null
     */
    public function getVerificationStatus()
    {
        return $this->container['verification_status'];
    }

    /**
     * Sets verification_status
     *
     * @param string|null $verification_status Payment method status. Possible values: * **valid** * **pending** * **invalid** * **rejected**
     *
     * @return self
     */
    public function setVerificationStatus($verification_status)
    {
        if (is_null($verification_status)) {
            throw new \InvalidArgumentException('non-nullable verification_status cannot be null');
        }
        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!in_array($verification_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'verification_status', must be one of '%s'",
                    $verification_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['verification_status'] = $verification_status;

        return $this;
    }

    /**
     * Gets vipps
     *
     * @return \Adyen\Model\Management\VippsInfo|null
     */
    public function getVipps()
    {
        return $this->container['vipps'];
    }

    /**
     * Sets vipps
     *
     * @param \Adyen\Model\Management\VippsInfo|null $vipps vipps
     *
     * @return self
     */
    public function setVipps($vipps)
    {
        if (is_null($vipps)) {
            throw new \InvalidArgumentException('non-nullable vipps cannot be null');
        }
        $this->container['vipps'] = $vipps;

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
