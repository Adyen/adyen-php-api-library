<?php

/**
 * Adyen Checkout API
 *
 * The version of the OpenAPI document: 70
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

/**
 * PaymentResponseAction Class Doc Comment
 *
 * @category Class
 * @description Action to be taken for completing the payment.
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentResponseAction implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentResponse_action';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'paymentData' => 'string',
        'paymentMethodType' => 'string',
        'type' => 'string',
        'url' => 'string',
        'authorisationToken' => 'string',
        'token' => 'string',
        'data' => 'array<string,string>',
        'method' => 'string',
        'nativeRedirectData' => 'string',
        'expiresAt' => 'string',
        'qrCodeData' => 'string',
        'sdkData' => 'array<string,string>',
        'subtype' => 'string',
        'alternativeReference' => 'string',
        'collectionInstitutionNumber' => 'string',
        'downloadUrl' => 'string',
        'entity' => 'string',
        'initialAmount' => '\Adyen\Model\Checkout\Amount',
        'instructionsUrl' => 'string',
        'issuer' => 'string',
        'maskedTelephoneNumber' => 'string',
        'merchantName' => 'string',
        'merchantReference' => 'string',
        'passCreationToken' => 'string',
        'reference' => 'string',
        'shopperEmail' => 'string',
        'shopperName' => 'string',
        'surcharge' => '\Adyen\Model\Checkout\Amount',
        'totalAmount' => '\Adyen\Model\Checkout\Amount'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'paymentData' => null,
        'paymentMethodType' => null,
        'type' => null,
        'url' => null,
        'authorisationToken' => null,
        'token' => null,
        'data' => null,
        'method' => null,
        'nativeRedirectData' => null,
        'expiresAt' => null,
        'qrCodeData' => null,
        'sdkData' => null,
        'subtype' => null,
        'alternativeReference' => null,
        'collectionInstitutionNumber' => null,
        'downloadUrl' => null,
        'entity' => null,
        'initialAmount' => null,
        'instructionsUrl' => null,
        'issuer' => null,
        'maskedTelephoneNumber' => null,
        'merchantName' => null,
        'merchantReference' => null,
        'passCreationToken' => null,
        'reference' => null,
        'shopperEmail' => null,
        'shopperName' => null,
        'surcharge' => null,
        'totalAmount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'paymentData' => false,
        'paymentMethodType' => false,
        'type' => false,
        'url' => false,
        'authorisationToken' => false,
        'token' => false,
        'data' => false,
        'method' => false,
        'nativeRedirectData' => false,
        'expiresAt' => false,
        'qrCodeData' => false,
        'sdkData' => false,
        'subtype' => false,
        'alternativeReference' => false,
        'collectionInstitutionNumber' => false,
        'downloadUrl' => false,
        'entity' => false,
        'initialAmount' => false,
        'instructionsUrl' => false,
        'issuer' => false,
        'maskedTelephoneNumber' => false,
        'merchantName' => false,
        'merchantReference' => false,
        'passCreationToken' => false,
        'reference' => false,
        'shopperEmail' => false,
        'shopperName' => false,
        'surcharge' => false,
        'totalAmount' => false
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
        'paymentData' => 'paymentData',
        'paymentMethodType' => 'paymentMethodType',
        'type' => 'type',
        'url' => 'url',
        'authorisationToken' => 'authorisationToken',
        'token' => 'token',
        'data' => 'data',
        'method' => 'method',
        'nativeRedirectData' => 'nativeRedirectData',
        'expiresAt' => 'expiresAt',
        'qrCodeData' => 'qrCodeData',
        'sdkData' => 'sdkData',
        'subtype' => 'subtype',
        'alternativeReference' => 'alternativeReference',
        'collectionInstitutionNumber' => 'collectionInstitutionNumber',
        'downloadUrl' => 'downloadUrl',
        'entity' => 'entity',
        'initialAmount' => 'initialAmount',
        'instructionsUrl' => 'instructionsUrl',
        'issuer' => 'issuer',
        'maskedTelephoneNumber' => 'maskedTelephoneNumber',
        'merchantName' => 'merchantName',
        'merchantReference' => 'merchantReference',
        'passCreationToken' => 'passCreationToken',
        'reference' => 'reference',
        'shopperEmail' => 'shopperEmail',
        'shopperName' => 'shopperName',
        'surcharge' => 'surcharge',
        'totalAmount' => 'totalAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'paymentData' => 'setPaymentData',
        'paymentMethodType' => 'setPaymentMethodType',
        'type' => 'setType',
        'url' => 'setUrl',
        'authorisationToken' => 'setAuthorisationToken',
        'token' => 'setToken',
        'data' => 'setData',
        'method' => 'setMethod',
        'nativeRedirectData' => 'setNativeRedirectData',
        'expiresAt' => 'setExpiresAt',
        'qrCodeData' => 'setQrCodeData',
        'sdkData' => 'setSdkData',
        'subtype' => 'setSubtype',
        'alternativeReference' => 'setAlternativeReference',
        'collectionInstitutionNumber' => 'setCollectionInstitutionNumber',
        'downloadUrl' => 'setDownloadUrl',
        'entity' => 'setEntity',
        'initialAmount' => 'setInitialAmount',
        'instructionsUrl' => 'setInstructionsUrl',
        'issuer' => 'setIssuer',
        'maskedTelephoneNumber' => 'setMaskedTelephoneNumber',
        'merchantName' => 'setMerchantName',
        'merchantReference' => 'setMerchantReference',
        'passCreationToken' => 'setPassCreationToken',
        'reference' => 'setReference',
        'shopperEmail' => 'setShopperEmail',
        'shopperName' => 'setShopperName',
        'surcharge' => 'setSurcharge',
        'totalAmount' => 'setTotalAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'paymentData' => 'getPaymentData',
        'paymentMethodType' => 'getPaymentMethodType',
        'type' => 'getType',
        'url' => 'getUrl',
        'authorisationToken' => 'getAuthorisationToken',
        'token' => 'getToken',
        'data' => 'getData',
        'method' => 'getMethod',
        'nativeRedirectData' => 'getNativeRedirectData',
        'expiresAt' => 'getExpiresAt',
        'qrCodeData' => 'getQrCodeData',
        'sdkData' => 'getSdkData',
        'subtype' => 'getSubtype',
        'alternativeReference' => 'getAlternativeReference',
        'collectionInstitutionNumber' => 'getCollectionInstitutionNumber',
        'downloadUrl' => 'getDownloadUrl',
        'entity' => 'getEntity',
        'initialAmount' => 'getInitialAmount',
        'instructionsUrl' => 'getInstructionsUrl',
        'issuer' => 'getIssuer',
        'maskedTelephoneNumber' => 'getMaskedTelephoneNumber',
        'merchantName' => 'getMerchantName',
        'merchantReference' => 'getMerchantReference',
        'passCreationToken' => 'getPassCreationToken',
        'reference' => 'getReference',
        'shopperEmail' => 'getShopperEmail',
        'shopperName' => 'getShopperName',
        'surcharge' => 'getSurcharge',
        'totalAmount' => 'getTotalAmount'
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
        $this->setIfExists('paymentData', $data ?? [], null);
        $this->setIfExists('paymentMethodType', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('authorisationToken', $data ?? [], null);
        $this->setIfExists('token', $data ?? [], null);
        $this->setIfExists('data', $data ?? [], null);
        $this->setIfExists('method', $data ?? [], null);
        $this->setIfExists('nativeRedirectData', $data ?? [], null);
        $this->setIfExists('expiresAt', $data ?? [], null);
        $this->setIfExists('qrCodeData', $data ?? [], null);
        $this->setIfExists('sdkData', $data ?? [], null);
        $this->setIfExists('subtype', $data ?? [], null);
        $this->setIfExists('alternativeReference', $data ?? [], null);
        $this->setIfExists('collectionInstitutionNumber', $data ?? [], null);
        $this->setIfExists('downloadUrl', $data ?? [], null);
        $this->setIfExists('entity', $data ?? [], null);
        $this->setIfExists('initialAmount', $data ?? [], null);
        $this->setIfExists('instructionsUrl', $data ?? [], null);
        $this->setIfExists('issuer', $data ?? [], null);
        $this->setIfExists('maskedTelephoneNumber', $data ?? [], null);
        $this->setIfExists('merchantName', $data ?? [], null);
        $this->setIfExists('merchantReference', $data ?? [], null);
        $this->setIfExists('passCreationToken', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('shopperEmail', $data ?? [], null);
        $this->setIfExists('shopperName', $data ?? [], null);
        $this->setIfExists('surcharge', $data ?? [], null);
        $this->setIfExists('totalAmount', $data ?? [], null);
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
     * Gets authorisationToken
     *
     * @return string|null
     */
    public function getAuthorisationToken()
    {
        return $this->container['authorisationToken'];
    }

    /**
     * Sets authorisationToken
     *
     * @param string|null $authorisationToken A token needed to authorise a payment.
     *
     * @return self
     */
    public function setAuthorisationToken($authorisationToken)
    {
        if (is_null($authorisationToken)) {
            throw new \InvalidArgumentException('non-nullable authorisationToken cannot be null');
        }
        $this->container['authorisationToken'] = $authorisationToken;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string|null $token A token to pass to the 3DS2 Component to get the fingerprint.
     *
     * @return self
     */
    public function setToken($token)
    {
        if (is_null($token)) {
            throw new \InvalidArgumentException('non-nullable token cannot be null');
        }
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets data
     *
     * @return array<string,string>|null
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param array<string,string>|null $data When the redirect URL must be accessed via POST, use this data to post to the redirect URL.
     *
     * @return self
     */
    public function setData($data)
    {
        if (is_null($data)) {
            throw new \InvalidArgumentException('non-nullable data cannot be null');
        }
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets method
     *
     * @return string|null
     */
    public function getMethod()
    {
        return $this->container['method'];
    }

    /**
     * Sets method
     *
     * @param string|null $method Specifies the HTTP method, for example GET or POST.
     *
     * @return self
     */
    public function setMethod($method)
    {
        if (is_null($method)) {
            throw new \InvalidArgumentException('non-nullable method cannot be null');
        }
        $this->container['method'] = $method;

        return $this;
    }

    /**
     * Gets nativeRedirectData
     *
     * @return string|null
     */
    public function getNativeRedirectData()
    {
        return $this->container['nativeRedirectData'];
    }

    /**
     * Sets nativeRedirectData
     *
     * @param string|null $nativeRedirectData Native SDK's redirect data containing the direct issuer link and state data that must be submitted to the /v1/nativeRedirect/redirectResult.
     *
     * @return self
     */
    public function setNativeRedirectData($nativeRedirectData)
    {
        if (is_null($nativeRedirectData)) {
            throw new \InvalidArgumentException('non-nullable nativeRedirectData cannot be null');
        }
        $this->container['nativeRedirectData'] = $nativeRedirectData;

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
     * Gets qrCodeData
     *
     * @return string|null
     */
    public function getQrCodeData()
    {
        return $this->container['qrCodeData'];
    }

    /**
     * Sets qrCodeData
     *
     * @param string|null $qrCodeData The contents of the QR code as a UTF8 string.
     *
     * @return self
     */
    public function setQrCodeData($qrCodeData)
    {
        if (is_null($qrCodeData)) {
            throw new \InvalidArgumentException('non-nullable qrCodeData cannot be null');
        }
        $this->container['qrCodeData'] = $qrCodeData;

        return $this;
    }

    /**
     * Gets sdkData
     *
     * @return array<string,string>|null
     */
    public function getSdkData()
    {
        return $this->container['sdkData'];
    }

    /**
     * Sets sdkData
     *
     * @param array<string,string>|null $sdkData The data to pass to the SDK.
     *
     * @return self
     */
    public function setSdkData($sdkData)
    {
        if (is_null($sdkData)) {
            throw new \InvalidArgumentException('non-nullable sdkData cannot be null');
        }
        $this->container['sdkData'] = $sdkData;

        return $this;
    }

    /**
     * Gets subtype
     *
     * @return string|null
     */
    public function getSubtype()
    {
        return $this->container['subtype'];
    }

    /**
     * Sets subtype
     *
     * @param string|null $subtype A subtype of the token.
     *
     * @return self
     */
    public function setSubtype($subtype)
    {
        if (is_null($subtype)) {
            throw new \InvalidArgumentException('non-nullable subtype cannot be null');
        }
        $this->container['subtype'] = $subtype;

        return $this;
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
