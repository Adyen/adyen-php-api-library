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
        'alternativeReference' => 'string',
        'collectionInstitutionNumber' => 'string',
        'downloadUrl' => 'string',
        'entity' => 'string',
        'expiresAt' => 'string',
        'initialAmount' => '\Adyen\Model\Checkout\Amount',
        'instructionsUrl' => 'string',
        'issuer' => 'string',
        'maskedTelephoneNumber' => 'string',
        'merchantName' => 'string',
        'merchantReference' => 'string',
        'passCreationToken' => 'string',
        'paymentData' => 'string',
        'paymentMethodType' => 'string',
        'reference' => 'string',
        'shopperEmail' => 'string',
        'shopperName' => 'string',
        'surcharge' => '\Adyen\Model\Checkout\Amount',
        'totalAmount' => '\Adyen\Model\Checkout\Amount',
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
        'alternativeReference' => null,
        'collectionInstitutionNumber' => null,
        'downloadUrl' => null,
        'entity' => null,
        'expiresAt' => null,
        'initialAmount' => null,
        'instructionsUrl' => null,
        'issuer' => null,
        'maskedTelephoneNumber' => null,
        'merchantName' => null,
        'merchantReference' => null,
        'passCreationToken' => null,
        'paymentData' => null,
        'paymentMethodType' => null,
        'reference' => null,
        'shopperEmail' => null,
        'shopperName' => null,
        'surcharge' => null,
        'totalAmount' => null,
        'type' => null,
        'url' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'alternativeReference' => false,
        'collectionInstitutionNumber' => false,
        'downloadUrl' => false,
        'entity' => false,
        'expiresAt' => false,
        'initialAmount' => false,
        'instructionsUrl' => false,
        'issuer' => false,
        'maskedTelephoneNumber' => false,
        'merchantName' => false,
        'merchantReference' => false,
        'passCreationToken' => false,
        'paymentData' => false,
        'paymentMethodType' => false,
        'reference' => false,
        'shopperEmail' => false,
        'shopperName' => false,
        'surcharge' => false,
        'totalAmount' => false,
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
        'alternativeReference' => 'alternativeReference',
        'collectionInstitutionNumber' => 'collectionInstitutionNumber',
        'downloadUrl' => 'downloadUrl',
        'entity' => 'entity',
        'expiresAt' => 'expiresAt',
        'initialAmount' => 'initialAmount',
        'instructionsUrl' => 'instructionsUrl',
        'issuer' => 'issuer',
        'maskedTelephoneNumber' => 'maskedTelephoneNumber',
        'merchantName' => 'merchantName',
        'merchantReference' => 'merchantReference',
        'passCreationToken' => 'passCreationToken',
        'paymentData' => 'paymentData',
        'paymentMethodType' => 'paymentMethodType',
        'reference' => 'reference',
        'shopperEmail' => 'shopperEmail',
        'shopperName' => 'shopperName',
        'surcharge' => 'surcharge',
        'totalAmount' => 'totalAmount',
        'type' => 'type',
        'url' => 'url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'alternativeReference' => 'setAlternativeReference',
        'collectionInstitutionNumber' => 'setCollectionInstitutionNumber',
        'downloadUrl' => 'setDownloadUrl',
        'entity' => 'setEntity',
        'expiresAt' => 'setExpiresAt',
        'initialAmount' => 'setInitialAmount',
        'instructionsUrl' => 'setInstructionsUrl',
        'issuer' => 'setIssuer',
        'maskedTelephoneNumber' => 'setMaskedTelephoneNumber',
        'merchantName' => 'setMerchantName',
        'merchantReference' => 'setMerchantReference',
        'passCreationToken' => 'setPassCreationToken',
        'paymentData' => 'setPaymentData',
        'paymentMethodType' => 'setPaymentMethodType',
        'reference' => 'setReference',
        'shopperEmail' => 'setShopperEmail',
        'shopperName' => 'setShopperName',
        'surcharge' => 'setSurcharge',
        'totalAmount' => 'setTotalAmount',
        'type' => 'setType',
        'url' => 'setUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'alternativeReference' => 'getAlternativeReference',
        'collectionInstitutionNumber' => 'getCollectionInstitutionNumber',
        'downloadUrl' => 'getDownloadUrl',
        'entity' => 'getEntity',
        'expiresAt' => 'getExpiresAt',
        'initialAmount' => 'getInitialAmount',
        'instructionsUrl' => 'getInstructionsUrl',
        'issuer' => 'getIssuer',
        'maskedTelephoneNumber' => 'getMaskedTelephoneNumber',
        'merchantName' => 'getMerchantName',
        'merchantReference' => 'getMerchantReference',
        'passCreationToken' => 'getPassCreationToken',
        'paymentData' => 'getPaymentData',
        'paymentMethodType' => 'getPaymentMethodType',
        'reference' => 'getReference',
        'shopperEmail' => 'getShopperEmail',
        'shopperName' => 'getShopperName',
        'surcharge' => 'getSurcharge',
        'totalAmount' => 'getTotalAmount',
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
        $this->setIfExists('alternativeReference', $data ?? [], null);
        $this->setIfExists('collectionInstitutionNumber', $data ?? [], null);
        $this->setIfExists('downloadUrl', $data ?? [], null);
        $this->setIfExists('entity', $data ?? [], null);
        $this->setIfExists('expiresAt', $data ?? [], null);
        $this->setIfExists('initialAmount', $data ?? [], null);
        $this->setIfExists('instructionsUrl', $data ?? [], null);
        $this->setIfExists('issuer', $data ?? [], null);
        $this->setIfExists('maskedTelephoneNumber', $data ?? [], null);
        $this->setIfExists('merchantName', $data ?? [], null);
        $this->setIfExists('merchantReference', $data ?? [], null);
        $this->setIfExists('passCreationToken', $data ?? [], null);
        $this->setIfExists('paymentData', $data ?? [], null);
        $this->setIfExists('paymentMethodType', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('shopperName', $data ?? [], null);
        $this->setIfExists('surcharge', $data ?? [], null);
        $this->setIfExists('totalAmount', $data ?? [], null);
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
     * Gets alternativeReference
     *
     * @return string|null
     */
    public function getAlternativeReference()
    {
        return $this->container['alternativeReference'];
    }

    /**
     * Sets alternativeReference
     *
     * @param string|null $alternativeReference The voucher alternative reference code.
     *
     * @return self
     */
    public function setAlternativeReference($alternativeReference)
    {
        if (is_null($alternativeReference)) {
            throw new \InvalidArgumentException('non-nullable alternativeReference cannot be null');
        }
        $this->container['alternativeReference'] = $alternativeReference;

        return $this;
    }

    /**
     * Gets collectionInstitutionNumber
     *
     * @return string|null
     */
    public function getCollectionInstitutionNumber()
    {
        return $this->container['collectionInstitutionNumber'];
    }

    /**
     * Sets collectionInstitutionNumber
     *
     * @param string|null $collectionInstitutionNumber A collection institution number (store number) for Econtext Pay-Easy ATM.
     *
     * @return self
     */
    public function setCollectionInstitutionNumber($collectionInstitutionNumber)
    {
        if (is_null($collectionInstitutionNumber)) {
            throw new \InvalidArgumentException('non-nullable collectionInstitutionNumber cannot be null');
        }
        $this->container['collectionInstitutionNumber'] = $collectionInstitutionNumber;

        return $this;
    }

    /**
     * Gets downloadUrl
     *
     * @return string|null
     */
    public function getDownloadUrl()
    {
        return $this->container['downloadUrl'];
    }

    /**
     * Sets downloadUrl
     *
     * @param string|null $downloadUrl The URL to download the voucher.
     *
     * @return self
     */
    public function setDownloadUrl($downloadUrl)
    {
        if (is_null($downloadUrl)) {
            throw new \InvalidArgumentException('non-nullable downloadUrl cannot be null');
        }
        $this->container['downloadUrl'] = $downloadUrl;

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
     * Gets expiresAt
     *
     * @return string|null
     */
    public function getExpiresAt()
    {
        return $this->container['expiresAt'];
    }

    /**
     * Sets expiresAt
     *
     * @param string|null $expiresAt The date time of the voucher expiry.
     *
     * @return self
     */
    public function setExpiresAt($expiresAt)
    {
        if (is_null($expiresAt)) {
            throw new \InvalidArgumentException('non-nullable expiresAt cannot be null');
        }
        $this->container['expiresAt'] = $expiresAt;

        return $this;
    }

    /**
     * Gets initialAmount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getInitialAmount()
    {
        return $this->container['initialAmount'];
    }

    /**
     * Sets initialAmount
     *
     * @param \Adyen\Model\Checkout\Amount|null $initialAmount initialAmount
     *
     * @return self
     */
    public function setInitialAmount($initialAmount)
    {
        if (is_null($initialAmount)) {
            throw new \InvalidArgumentException('non-nullable initialAmount cannot be null');
        }
        $this->container['initialAmount'] = $initialAmount;

        return $this;
    }

    /**
     * Gets instructionsUrl
     *
     * @return string|null
     */
    public function getInstructionsUrl()
    {
        return $this->container['instructionsUrl'];
    }

    /**
     * Sets instructionsUrl
     *
     * @param string|null $instructionsUrl The URL to the detailed instructions to make payment using the voucher.
     *
     * @return self
     */
    public function setInstructionsUrl($instructionsUrl)
    {
        if (is_null($instructionsUrl)) {
            throw new \InvalidArgumentException('non-nullable instructionsUrl cannot be null');
        }
        $this->container['instructionsUrl'] = $instructionsUrl;

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
     * Gets maskedTelephoneNumber
     *
     * @return string|null
     */
    public function getMaskedTelephoneNumber()
    {
        return $this->container['maskedTelephoneNumber'];
    }

    /**
     * Sets maskedTelephoneNumber
     *
     * @param string|null $maskedTelephoneNumber The shopper telephone number (partially masked).
     *
     * @return self
     */
    public function setMaskedTelephoneNumber($maskedTelephoneNumber)
    {
        if (is_null($maskedTelephoneNumber)) {
            throw new \InvalidArgumentException('non-nullable maskedTelephoneNumber cannot be null');
        }
        $this->container['maskedTelephoneNumber'] = $maskedTelephoneNumber;

        return $this;
    }

    /**
     * Gets merchantName
     *
     * @return string|null
     */
    public function getMerchantName()
    {
        return $this->container['merchantName'];
    }

    /**
     * Sets merchantName
     *
     * @param string|null $merchantName The merchant name.
     *
     * @return self
     */
    public function setMerchantName($merchantName)
    {
        if (is_null($merchantName)) {
            throw new \InvalidArgumentException('non-nullable merchantName cannot be null');
        }
        $this->container['merchantName'] = $merchantName;

        return $this;
    }

    /**
     * Gets merchantReference
     *
     * @return string|null
     */
    public function getMerchantReference()
    {
        return $this->container['merchantReference'];
    }

    /**
     * Sets merchantReference
     *
     * @param string|null $merchantReference The merchant reference.
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (is_null($merchantReference)) {
            throw new \InvalidArgumentException('non-nullable merchantReference cannot be null');
        }
        $this->container['merchantReference'] = $merchantReference;

        return $this;
    }

    /**
     * Gets passCreationToken
     *
     * @return string|null
     */
    public function getPassCreationToken()
    {
        return $this->container['passCreationToken'];
    }

    /**
     * Sets passCreationToken
     *
     * @param string|null $passCreationToken A base64 encoded signature of all properties
     *
     * @return self
     */
    public function setPassCreationToken($passCreationToken)
    {
        if (is_null($passCreationToken)) {
            throw new \InvalidArgumentException('non-nullable passCreationToken cannot be null');
        }
        $this->container['passCreationToken'] = $passCreationToken;

        return $this;
    }

    /**
     * Gets paymentData
     *
     * @return string|null
     */
    public function getPaymentData()
    {
        return $this->container['paymentData'];
    }

    /**
     * Sets paymentData
     *
     * @param string|null $paymentData A value that must be submitted to the `/payments/details` endpoint to verify this payment.
     *
     * @return self
     */
    public function setPaymentData($paymentData)
    {
        if (is_null($paymentData)) {
            throw new \InvalidArgumentException('non-nullable paymentData cannot be null');
        }
        $this->container['paymentData'] = $paymentData;

        return $this;
    }

    /**
     * Gets paymentMethodType
     *
     * @return string|null
     */
    public function getPaymentMethodType()
    {
        return $this->container['paymentMethodType'];
    }

    /**
     * Sets paymentMethodType
     *
     * @param string|null $paymentMethodType Specifies the payment method.
     *
     * @return self
     */
    public function setPaymentMethodType($paymentMethodType)
    {
        if (is_null($paymentMethodType)) {
            throw new \InvalidArgumentException('non-nullable paymentMethodType cannot be null');
        }
        $this->container['paymentMethodType'] = $paymentMethodType;

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
     * Gets shopperEmail
     *
     * @return string|null
     */
    public function getShopperEmail()
    {
        return $this->container['shopperEmail'];
    }

    /**
     * Sets shopperEmail
     *
     * @param string|null $shopperEmail The shopper email.
     *
     * @return self
     */
    public function setShopperEmail($shopperEmail)
    {
        if (is_null($shopperEmail)) {
            throw new \InvalidArgumentException('non-nullable shopperEmail cannot be null');
        }
        $this->container['shopperEmail'] = $shopperEmail;

        return $this;
    }

    /**
     * Gets shopperName
     *
     * @return string|null
     */
    public function getShopperName()
    {
        return $this->container['shopperName'];
    }

    /**
     * Sets shopperName
     *
     * @param string|null $shopperName The shopper name.
     *
     * @return self
     */
    public function setShopperName($shopperName)
    {
        if (is_null($shopperName)) {
            throw new \InvalidArgumentException('non-nullable shopperName cannot be null');
        }
        $this->container['shopperName'] = $shopperName;

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
     * Gets totalAmount
     *
     * @return \Adyen\Model\Checkout\Amount|null
     */
    public function getTotalAmount()
    {
        return $this->container['totalAmount'];
    }

    /**
     * Sets totalAmount
     *
     * @param \Adyen\Model\Checkout\Amount|null $totalAmount totalAmount
     *
     * @return self
     */
    public function setTotalAmount($totalAmount)
    {
        if (is_null($totalAmount)) {
            throw new \InvalidArgumentException('non-nullable totalAmount cannot be null');
        }
        $this->container['totalAmount'] = $totalAmount;

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
