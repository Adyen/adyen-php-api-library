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
 * CheckoutVoucherAction Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CheckoutVoucherAction implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CheckoutVoucherAction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'alternative_reference' => 'string',
        'collection_institution_number' => 'string',
        'download_url' => 'string',
        'entity' => 'string',
        'expires_at' => 'string',
        'initial_amount' => '\Adyen\Model\Checkout\Amount',
        'instructions_url' => 'string',
        'issuer' => 'string',
        'masked_telephone_number' => 'string',
        'merchant_name' => 'string',
        'merchant_reference' => 'string',
        'payment_data' => 'string',
        'payment_method_type' => 'string',
        'reference' => 'string',
        'shopper_email' => 'string',
        'shopper_name' => 'string',
        'surcharge' => '\Adyen\Model\Checkout\Amount',
        'total_amount' => '\Adyen\Model\Checkout\Amount',
        'type' => 'string',
        'url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'alternative_reference' => null,
        'collection_institution_number' => null,
        'download_url' => null,
        'entity' => null,
        'expires_at' => null,
        'initial_amount' => null,
        'instructions_url' => null,
        'issuer' => null,
        'masked_telephone_number' => null,
        'merchant_name' => null,
        'merchant_reference' => null,
        'payment_data' => null,
        'payment_method_type' => null,
        'reference' => null,
        'shopper_email' => null,
        'shopper_name' => null,
        'surcharge' => null,
        'total_amount' => null,
        'type' => null,
        'url' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'alternative_reference' => false,
        'collection_institution_number' => false,
        'download_url' => false,
        'entity' => false,
        'expires_at' => false,
        'initial_amount' => false,
        'instructions_url' => false,
        'issuer' => false,
        'masked_telephone_number' => false,
        'merchant_name' => false,
        'merchant_reference' => false,
        'payment_data' => false,
        'payment_method_type' => false,
        'reference' => false,
        'shopper_email' => false,
        'shopper_name' => false,
        'surcharge' => false,
        'total_amount' => false,
        'type' => false,
        'url' => false
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
        'alternative_reference' => 'alternativeReference',
        'collection_institution_number' => 'collectionInstitutionNumber',
        'download_url' => 'downloadUrl',
        'entity' => 'entity',
        'expires_at' => 'expiresAt',
        'initial_amount' => 'initialAmount',
        'instructions_url' => 'instructionsUrl',
        'issuer' => 'issuer',
        'masked_telephone_number' => 'maskedTelephoneNumber',
        'merchant_name' => 'merchantName',
        'merchant_reference' => 'merchantReference',
        'payment_data' => 'paymentData',
        'payment_method_type' => 'paymentMethodType',
        'reference' => 'reference',
        'shopper_email' => 'shopperEmail',
        'shopper_name' => 'shopperName',
        'surcharge' => 'surcharge',
        'total_amount' => 'totalAmount',
        'type' => 'type',
        'url' => 'url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'alternative_reference' => 'setAlternativeReference',
        'collection_institution_number' => 'setCollectionInstitutionNumber',
        'download_url' => 'setDownloadUrl',
        'entity' => 'setEntity',
        'expires_at' => 'setExpiresAt',
        'initial_amount' => 'setInitialAmount',
        'instructions_url' => 'setInstructionsUrl',
        'issuer' => 'setIssuer',
        'masked_telephone_number' => 'setMaskedTelephoneNumber',
        'merchant_name' => 'setMerchantName',
        'merchant_reference' => 'setMerchantReference',
        'payment_data' => 'setPaymentData',
        'payment_method_type' => 'setPaymentMethodType',
        'reference' => 'setReference',
        'shopper_email' => 'setShopperEmail',
        'shopper_name' => 'setShopperName',
        'surcharge' => 'setSurcharge',
        'total_amount' => 'setTotalAmount',
        'type' => 'setType',
        'url' => 'setUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'alternative_reference' => 'getAlternativeReference',
        'collection_institution_number' => 'getCollectionInstitutionNumber',
        'download_url' => 'getDownloadUrl',
        'entity' => 'getEntity',
        'expires_at' => 'getExpiresAt',
        'initial_amount' => 'getInitialAmount',
        'instructions_url' => 'getInstructionsUrl',
        'issuer' => 'getIssuer',
        'masked_telephone_number' => 'getMaskedTelephoneNumber',
        'merchant_name' => 'getMerchantName',
        'merchant_reference' => 'getMerchantReference',
        'payment_data' => 'getPaymentData',
        'payment_method_type' => 'getPaymentMethodType',
        'reference' => 'getReference',
        'shopper_email' => 'getShopperEmail',
        'shopper_name' => 'getShopperName',
        'surcharge' => 'getSurcharge',
        'total_amount' => 'getTotalAmount',
        'type' => 'getType',
        'url' => 'getUrl'
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

    public const TYPE_VOUCHER = 'voucher';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_VOUCHER,
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
        $this->setIfExists('alternative_reference', $data ?? [], null);
        $this->setIfExists('collection_institution_number', $data ?? [], null);
        $this->setIfExists('download_url', $data ?? [], null);
        $this->setIfExists('entity', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('initial_amount', $data ?? [], null);
        $this->setIfExists('instructions_url', $data ?? [], null);
        $this->setIfExists('issuer', $data ?? [], null);
        $this->setIfExists('masked_telephone_number', $data ?? [], null);
        $this->setIfExists('merchant_name', $data ?? [], null);
        $this->setIfExists('merchant_reference', $data ?? [], null);
        $this->setIfExists('payment_data', $data ?? [], null);
        $this->setIfExists('payment_method_type', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopper_email', $data ?? [], null);
        $this->setIfExists('shopper_name', $data ?? [], null);
        $this->setIfExists('surcharge', $data ?? [], null);
        $this->setIfExists('total_amount', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
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
     * Gets alternative_reference
     *
     * @return string|null
     */
    public function getAlternativeReference()
    {
        return $this->container['alternative_reference'];
    }

    /**
     * Sets alternative_reference
     *
     * @param string|null $alternative_reference The voucher alternative reference code.
     *
     * @return self
     */
    public function setAlternativeReference($alternative_reference)
    {
        if (is_null($alternative_reference)) {
            throw new \InvalidArgumentException('non-nullable alternative_reference cannot be null');
        }
        $this->container['alternative_reference'] = $alternative_reference;

        return $this;
    }

    /**
     * Gets collection_institution_number
     *
     * @return string|null
     */
    public function getCollectionInstitutionNumber()
    {
        return $this->container['collection_institution_number'];
    }

    /**
     * Sets collection_institution_number
     *
     * @param string|null $collection_institution_number A collection institution number (store number) for Econtext Pay-Easy ATM.
     *
     * @return self
     */
    public function setCollectionInstitutionNumber($collection_institution_number)
    {
        if (is_null($collection_institution_number)) {
            throw new \InvalidArgumentException('non-nullable collection_institution_number cannot be null');
        }
        $this->container['collection_institution_number'] = $collection_institution_number;

        return $this;
    }

    /**
     * Gets download_url
     *
     * @return string|null
     */
    public function getDownloadUrl()
    {
        return $this->container['download_url'];
    }

    /**
     * Sets download_url
     *
     * @param string|null $download_url The URL to download the voucher.
     *
     * @return self
     */
    public function setDownloadUrl($download_url)
    {
        if (is_null($download_url)) {
            throw new \InvalidArgumentException('non-nullable download_url cannot be null');
        }
        $this->container['download_url'] = $download_url;

        return $this;
    }

    /**
     * Gets entity
     *
     * @return string|null
     */
    public function getEntity()
    {
        return $this->container['entity'];
    }

    /**
     * Sets entity
     *
     * @param string|null $entity An entity number of Multibanco.
     *
     * @return self
     */
    public function setEntity($entity)
    {
        if (is_null($entity)) {
            throw new \InvalidArgumentException('non-nullable entity cannot be null');
        }
        $this->container['entity'] = $entity;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return string|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param string|null $expires_at The date time of the voucher expiry.
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            throw new \InvalidArgumentException('non-nullable expires_at cannot be null');
        }
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets initial_amount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getInitialAmount()
    {
        return $this->container['initial_amount'];
    }

    /**
     * Sets initial_amount
     *
     * @param \Adyen\Model\Checkout\Amount|null $initial_amount initial_amount
     *
     * @return self
     */
    public function setInitialAmount($initial_amount)
    {
        if (is_null($initial_amount)) {
            throw new \InvalidArgumentException('non-nullable initial_amount cannot be null');
        }
        $this->container['initial_amount'] = $initial_amount;

        return $this;
    }

    /**
     * Gets instructions_url
     *
     * @return string|null
     */
    public function getInstructionsUrl()
    {
        return $this->container['instructions_url'];
    }

    /**
     * Sets instructions_url
     *
     * @param string|null $instructions_url The URL to the detailed instructions to make payment using the voucher.
     *
     * @return self
     */
    public function setInstructionsUrl($instructions_url)
    {
        if (is_null($instructions_url)) {
            throw new \InvalidArgumentException('non-nullable instructions_url cannot be null');
        }
        $this->container['instructions_url'] = $instructions_url;

        return $this;
    }

    /**
     * Gets issuer
     *
     * @return string|null
     */
    public function getIssuer()
    {
        return $this->container['issuer'];
    }

    /**
     * Sets issuer
     *
     * @param string|null $issuer The issuer of the voucher.
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
     * Gets masked_telephone_number
     *
     * @return string|null
     */
    public function getMaskedTelephoneNumber()
    {
        return $this->container['masked_telephone_number'];
    }

    /**
     * Sets masked_telephone_number
     *
     * @param string|null $masked_telephone_number The shopper telephone number (partially masked).
     *
     * @return self
     */
    public function setMaskedTelephoneNumber($masked_telephone_number)
    {
        if (is_null($masked_telephone_number)) {
            throw new \InvalidArgumentException('non-nullable masked_telephone_number cannot be null');
        }
        $this->container['masked_telephone_number'] = $masked_telephone_number;

        return $this;
    }

    /**
     * Gets merchant_name
     *
     * @return string|null
     */
    public function getMerchantName()
    {
        return $this->container['merchant_name'];
    }

    /**
     * Sets merchant_name
     *
     * @param string|null $merchant_name The merchant name.
     *
     * @return self
     */
    public function setMerchantName($merchant_name)
    {
        if (is_null($merchant_name)) {
            throw new \InvalidArgumentException('non-nullable merchant_name cannot be null');
        }
        $this->container['merchant_name'] = $merchant_name;

        return $this;
    }

    /**
     * Gets merchant_reference
     *
     * @return string|null
     */
    public function getMerchantReference()
    {
        return $this->container['merchant_reference'];
    }

    /**
     * Sets merchant_reference
     *
     * @param string|null $merchant_reference The merchant reference.
     *
     * @return self
     */
    public function setMerchantReference($merchant_reference)
    {
        if (is_null($merchant_reference)) {
            throw new \InvalidArgumentException('non-nullable merchant_reference cannot be null');
        }
        $this->container['merchant_reference'] = $merchant_reference;

        return $this;
    }

    /**
     * Gets payment_data
     *
     * @return string|null
     */
    public function getPaymentData()
    {
        return $this->container['payment_data'];
    }

    /**
     * Sets payment_data
     *
     * @param string|null $payment_data A value that must be submitted to the `/payments/details` endpoint to verify this payment.
     *
     * @return self
     */
    public function setPaymentData($payment_data)
    {
        if (is_null($payment_data)) {
            throw new \InvalidArgumentException('non-nullable payment_data cannot be null');
        }
        $this->container['payment_data'] = $payment_data;

        return $this;
    }

    /**
     * Gets payment_method_type
     *
     * @return string|null
     */
    public function getPaymentMethodType()
    {
        return $this->container['payment_method_type'];
    }

    /**
     * Sets payment_method_type
     *
     * @param string|null $payment_method_type Specifies the payment method.
     *
     * @return self
     */
    public function setPaymentMethodType($payment_method_type)
    {
        if (is_null($payment_method_type)) {
            throw new \InvalidArgumentException('non-nullable payment_method_type cannot be null');
        }
        $this->container['payment_method_type'] = $payment_method_type;

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
     * @param string|null $reference The voucher reference code.
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
     * Gets shopper_email
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopper_email'];
    }

    /**
     * Sets shopper_email
     *
     * @param string|null $shopper_email The shopper email.
     *
     * @return self
     */
    public function setShopperEmail($shopper_email)
    {
        if (is_null($shopper_email)) {
            throw new \InvalidArgumentException('non-nullable shopper_email cannot be null');
        }
        $this->container['shopper_email'] = $shopper_email;

        return $this;
    }

    /**
     * Gets shopper_name
     *
     * @return string|null
     */
    public function getShopperName()
    {
        return $this->container['shopper_name'];
    }

    /**
     * Sets shopper_name
     *
     * @param string|null $shopper_name The shopper name.
     *
     * @return self
     */
    public function setShopperName($shopper_name)
    {
        if (is_null($shopper_name)) {
            throw new \InvalidArgumentException('non-nullable shopper_name cannot be null');
        }
        $this->container['shopper_name'] = $shopper_name;

        return $this;
    }

    /**
     * Gets surcharge
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getSurcharge()
    {
        return $this->container['surcharge'];
    }

    /**
     * Sets surcharge
     *
     * @param \Adyen\Model\Checkout\Amount|null $surcharge surcharge
     *
     * @return self
     */
    public function setSurcharge($surcharge)
    {
        if (is_null($surcharge)) {
            throw new \InvalidArgumentException('non-nullable surcharge cannot be null');
        }
        $this->container['surcharge'] = $surcharge;

        return $this;
    }

    /**
     * Gets total_amount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getTotalAmount()
    {
        return $this->container['total_amount'];
    }

    /**
     * Sets total_amount
     *
     * @param \Adyen\Model\Checkout\Amount|null $total_amount total_amount
     *
     * @return self
     */
    public function setTotalAmount($total_amount)
    {
        if (is_null($total_amount)) {
            throw new \InvalidArgumentException('non-nullable total_amount cannot be null');
        }
        $this->container['total_amount'] = $total_amount;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type **voucher**
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
     * Gets url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string|null $url Specifies the URL to redirect to.
     *
     * @return self
     */
    public function setUrl($url)
    {
        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }
        $this->container['url'] = $url;

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