<?php

/**
 * Management API
 *
 * The version of the OpenAPI document: 3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Management;

use \ArrayAccess;
use Adyen\Model\Management\ObjectSerializer;

/**
 * CreateCompanyWebhookRequest Class Doc Comment
 *
 * @package  Adyen
 * @implements \ArrayAccess<string, mixed>
 */
class CreateCompanyWebhookRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateCompanyWebhookRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'acceptsExpiredCertificate' => 'bool',
        'acceptsSelfSignedCertificate' => 'bool',
        'acceptsUntrustedRootCertificate' => 'bool',
        'active' => 'bool',
        'additionalSettings' => '\Adyen\Model\Management\AdditionalSettings',
        'communicationFormat' => 'string',
        'description' => 'string',
        'encryptionProtocol' => 'string',
        'filterMerchantAccountType' => 'string',
        'filterMerchantAccounts' => 'string[]',
        'networkType' => 'string',
        'password' => 'string',
        'populateSoapActionHeader' => 'bool',
        'type' => 'string',
        'url' => 'string',
        'username' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'acceptsExpiredCertificate' => null,
        'acceptsSelfSignedCertificate' => null,
        'acceptsUntrustedRootCertificate' => null,
        'active' => null,
        'additionalSettings' => null,
        'communicationFormat' => null,
        'description' => null,
        'encryptionProtocol' => null,
        'filterMerchantAccountType' => null,
        'filterMerchantAccounts' => null,
        'networkType' => null,
        'password' => null,
        'populateSoapActionHeader' => null,
        'type' => null,
        'url' => null,
        'username' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'acceptsExpiredCertificate' => false,
        'acceptsSelfSignedCertificate' => false,
        'acceptsUntrustedRootCertificate' => false,
        'active' => false,
        'additionalSettings' => false,
        'communicationFormat' => false,
        'description' => false,
        'encryptionProtocol' => false,
        'filterMerchantAccountType' => false,
        'filterMerchantAccounts' => false,
        'networkType' => false,
        'password' => false,
        'populateSoapActionHeader' => false,
        'type' => false,
        'url' => false,
        'username' => false
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
        'acceptsExpiredCertificate' => 'acceptsExpiredCertificate',
        'acceptsSelfSignedCertificate' => 'acceptsSelfSignedCertificate',
        'acceptsUntrustedRootCertificate' => 'acceptsUntrustedRootCertificate',
        'active' => 'active',
        'additionalSettings' => 'additionalSettings',
        'communicationFormat' => 'communicationFormat',
        'description' => 'description',
        'encryptionProtocol' => 'encryptionProtocol',
        'filterMerchantAccountType' => 'filterMerchantAccountType',
        'filterMerchantAccounts' => 'filterMerchantAccounts',
        'networkType' => 'networkType',
        'password' => 'password',
        'populateSoapActionHeader' => 'populateSoapActionHeader',
        'type' => 'type',
        'url' => 'url',
        'username' => 'username'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'acceptsExpiredCertificate' => 'setAcceptsExpiredCertificate',
        'acceptsSelfSignedCertificate' => 'setAcceptsSelfSignedCertificate',
        'acceptsUntrustedRootCertificate' => 'setAcceptsUntrustedRootCertificate',
        'active' => 'setActive',
        'additionalSettings' => 'setAdditionalSettings',
        'communicationFormat' => 'setCommunicationFormat',
        'description' => 'setDescription',
        'encryptionProtocol' => 'setEncryptionProtocol',
        'filterMerchantAccountType' => 'setFilterMerchantAccountType',
        'filterMerchantAccounts' => 'setFilterMerchantAccounts',
        'networkType' => 'setNetworkType',
        'password' => 'setPassword',
        'populateSoapActionHeader' => 'setPopulateSoapActionHeader',
        'type' => 'setType',
        'url' => 'setUrl',
        'username' => 'setUsername'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'acceptsExpiredCertificate' => 'getAcceptsExpiredCertificate',
        'acceptsSelfSignedCertificate' => 'getAcceptsSelfSignedCertificate',
        'acceptsUntrustedRootCertificate' => 'getAcceptsUntrustedRootCertificate',
        'active' => 'getActive',
        'additionalSettings' => 'getAdditionalSettings',
        'communicationFormat' => 'getCommunicationFormat',
        'description' => 'getDescription',
        'encryptionProtocol' => 'getEncryptionProtocol',
        'filterMerchantAccountType' => 'getFilterMerchantAccountType',
        'filterMerchantAccounts' => 'getFilterMerchantAccounts',
        'networkType' => 'getNetworkType',
        'password' => 'getPassword',
        'populateSoapActionHeader' => 'getPopulateSoapActionHeader',
        'type' => 'getType',
        'url' => 'getUrl',
        'username' => 'getUsername'
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

    public const COMMUNICATION_FORMAT_HTTP = 'http';
    public const COMMUNICATION_FORMAT_JSON = 'json';
    public const COMMUNICATION_FORMAT_SOAP = 'soap';
    public const ENCRYPTION_PROTOCOL_HTTP = 'HTTP';
    public const ENCRYPTION_PROTOCOL_TLSV1_2 = 'TLSv1.2';
    public const ENCRYPTION_PROTOCOL_TLSV1_3 = 'TLSv1.3';
    public const FILTER_MERCHANT_ACCOUNT_TYPE_ALL_ACCOUNTS = 'allAccounts';
    public const FILTER_MERCHANT_ACCOUNT_TYPE_EXCLUDE_ACCOUNTS = 'excludeAccounts';
    public const FILTER_MERCHANT_ACCOUNT_TYPE_INCLUDE_ACCOUNTS = 'includeAccounts';
    public const NETWORK_TYPE_LOCAL = 'local';
    public const NETWORK_TYPE__PUBLIC = 'public';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCommunicationFormatAllowableValues()
    {
        return [
            self::COMMUNICATION_FORMAT_HTTP,
            self::COMMUNICATION_FORMAT_JSON,
            self::COMMUNICATION_FORMAT_SOAP,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEncryptionProtocolAllowableValues()
    {
        return [
            self::ENCRYPTION_PROTOCOL_HTTP,
            self::ENCRYPTION_PROTOCOL_TLSV1_2,
            self::ENCRYPTION_PROTOCOL_TLSV1_3,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFilterMerchantAccountTypeAllowableValues()
    {
        return [
            self::FILTER_MERCHANT_ACCOUNT_TYPE_ALL_ACCOUNTS,
            self::FILTER_MERCHANT_ACCOUNT_TYPE_EXCLUDE_ACCOUNTS,
            self::FILTER_MERCHANT_ACCOUNT_TYPE_INCLUDE_ACCOUNTS,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNetworkTypeAllowableValues()
    {
        return [
            self::NETWORK_TYPE_LOCAL,
            self::NETWORK_TYPE__PUBLIC,
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('acceptsExpiredCertificate', $data ?? [], null);
        $this->setIfExists('acceptsSelfSignedCertificate', $data ?? [], null);
        $this->setIfExists('acceptsUntrustedRootCertificate', $data ?? [], null);
        $this->setIfExists('active', $data ?? [], null);
        $this->setIfExists('additionalSettings', $data ?? [], null);
        $this->setIfExists('communicationFormat', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('encryptionProtocol', $data ?? [], null);
        $this->setIfExists('filterMerchantAccountType', $data ?? [], null);
        $this->setIfExists('filterMerchantAccounts', $data ?? [], null);
        $this->setIfExists('networkType', $data ?? [], null);
        $this->setIfExists('password', $data ?? [], null);
        $this->setIfExists('populateSoapActionHeader', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('username', $data ?? [], null);
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

        if ($this->container['active'] === null) {
            $invalidProperties[] = "'active' can't be null";
        }
        if ($this->container['communicationFormat'] === null) {
            $invalidProperties[] = "'communicationFormat' can't be null";
        }
        $allowedValues = $this->getCommunicationFormatAllowableValues();
        if (!is_null($this->container['communicationFormat']) && !in_array($this->container['communicationFormat'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'communicationFormat', must be one of '%s'",
                $this->container['communicationFormat'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEncryptionProtocolAllowableValues();
        if (!is_null($this->container['encryptionProtocol']) && !in_array($this->container['encryptionProtocol'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'encryptionProtocol', must be one of '%s'",
                $this->container['encryptionProtocol'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['filterMerchantAccountType'] === null) {
            $invalidProperties[] = "'filterMerchantAccountType' can't be null";
        }
        $allowedValues = $this->getFilterMerchantAccountTypeAllowableValues();
        if (!is_null($this->container['filterMerchantAccountType']) && !in_array($this->container['filterMerchantAccountType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'filterMerchantAccountType', must be one of '%s'",
                $this->container['filterMerchantAccountType'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['filterMerchantAccounts'] === null) {
            $invalidProperties[] = "'filterMerchantAccounts' can't be null";
        }
        $allowedValues = $this->getNetworkTypeAllowableValues();
        if (!is_null($this->container['networkType']) && !in_array($this->container['networkType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'networkType', must be one of '%s'",
                $this->container['networkType'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
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
     * Gets acceptsExpiredCertificate
     *
     * @return bool|null
     */
    public function getAcceptsExpiredCertificate()
    {
        return $this->container['acceptsExpiredCertificate'];
    }

    /**
     * Sets acceptsExpiredCertificate
     *
     * @param bool|null $acceptsExpiredCertificate Indicates if expired SSL certificates are accepted. Default value: **false**.
     *
     * @return self
     */
    public function setAcceptsExpiredCertificate($acceptsExpiredCertificate)
    {
        $this->container['acceptsExpiredCertificate'] = $acceptsExpiredCertificate;

        return $this;
    }

    /**
     * Gets acceptsSelfSignedCertificate
     *
     * @return bool|null
     */
    public function getAcceptsSelfSignedCertificate()
    {
        return $this->container['acceptsSelfSignedCertificate'];
    }

    /**
     * Sets acceptsSelfSignedCertificate
     *
     * @param bool|null $acceptsSelfSignedCertificate Indicates if self-signed SSL certificates are accepted. Default value: **false**.
     *
     * @return self
     */
    public function setAcceptsSelfSignedCertificate($acceptsSelfSignedCertificate)
    {
        $this->container['acceptsSelfSignedCertificate'] = $acceptsSelfSignedCertificate;

        return $this;
    }

    /**
     * Gets acceptsUntrustedRootCertificate
     *
     * @return bool|null
     */
    public function getAcceptsUntrustedRootCertificate()
    {
        return $this->container['acceptsUntrustedRootCertificate'];
    }

    /**
     * Sets acceptsUntrustedRootCertificate
     *
     * @param bool|null $acceptsUntrustedRootCertificate Indicates if untrusted SSL certificates are accepted. Default value: **false**.
     *
     * @return self
     */
    public function setAcceptsUntrustedRootCertificate($acceptsUntrustedRootCertificate)
    {
        $this->container['acceptsUntrustedRootCertificate'] = $acceptsUntrustedRootCertificate;

        return $this;
    }

    /**
     * Gets active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->container['active'];
    }

    /**
     * Sets active
     *
     * @param bool $active Indicates if the webhook configuration is active. The field must be **true** for us to send webhooks about events related an account.
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->container['active'] = $active;

        return $this;
    }

    /**
     * Gets additionalSettings
     *
     * @return \Adyen\Model\Management\AdditionalSettings|null
     */
    public function getAdditionalSettings()
    {
        return $this->container['additionalSettings'];
    }

    /**
     * Sets additionalSettings
     *
     * @param \Adyen\Model\Management\AdditionalSettings|null $additionalSettings additionalSettings
     *
     * @return self
     */
    public function setAdditionalSettings($additionalSettings)
    {
        $this->container['additionalSettings'] = $additionalSettings;

        return $this;
    }

    /**
     * Gets communicationFormat
     *
     * @return string
     */
    public function getCommunicationFormat()
    {
        return $this->container['communicationFormat'];
    }

    /**
     * Sets communicationFormat
     *
     * @param string $communicationFormat Format or protocol for receiving webhooks. Possible values: * **soap** * **http** * **json**
     *
     * @return self
     */
    public function setCommunicationFormat($communicationFormat)
    {
        $allowedValues = $this->getCommunicationFormatAllowableValues();
        if (!in_array($communicationFormat, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'communicationFormat', must be one of '%s'",
                    $communicationFormat,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['communicationFormat'] = $communicationFormat;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Your description for this webhook configuration.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets encryptionProtocol
     *
     * @return string|null
     */
    public function getEncryptionProtocol()
    {
        return $this->container['encryptionProtocol'];
    }

    /**
     * Sets encryptionProtocol
     *
     * @param string|null $encryptionProtocol SSL version to access the public webhook URL specified in the `url` field. Possible values: * **TLSv1.3** * **TLSv1.2** * **HTTP** - Only allowed on Test environment.  If not specified, the webhook will use `sslVersion`: **TLSv1.2**.
     *
     * @return self
     */
    public function setEncryptionProtocol($encryptionProtocol)
    {
        $allowedValues = $this->getEncryptionProtocolAllowableValues();
        if (!in_array($encryptionProtocol, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'encryptionProtocol', must be one of '%s'",
                    $encryptionProtocol,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['encryptionProtocol'] = $encryptionProtocol;

        return $this;
    }

    /**
     * Gets filterMerchantAccountType
     *
     * @return string
     */
    public function getFilterMerchantAccountType()
    {
        return $this->container['filterMerchantAccountType'];
    }

    /**
     * Sets filterMerchantAccountType
     *
     * @param string $filterMerchantAccountType Shows how merchant accounts are filtered when configuring the webhook.   Possible values: *  **allAccounts** : Includes all merchant accounts, and does not require specifying `filterMerchantAccounts`. *  **includeAccounts** : The webhook is configured for the merchant accounts listed in `filterMerchantAccounts`. *  **excludeAccounts** : The webhook is not configured for the merchant accounts listed in `filterMerchantAccounts`.
     *
     * @return self
     */
    public function setFilterMerchantAccountType($filterMerchantAccountType)
    {
        $allowedValues = $this->getFilterMerchantAccountTypeAllowableValues();
        if (!in_array($filterMerchantAccountType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'filterMerchantAccountType', must be one of '%s'",
                    $filterMerchantAccountType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['filterMerchantAccountType'] = $filterMerchantAccountType;

        return $this;
    }

    /**
     * Gets filterMerchantAccounts
     *
     * @return string[]
     */
    public function getFilterMerchantAccounts()
    {
        return $this->container['filterMerchantAccounts'];
    }

    /**
     * Sets filterMerchantAccounts
     *
     * @param string[] $filterMerchantAccounts A list of merchant account names that are included or excluded from receiving the webhook. Inclusion or exclusion is based on the value defined for `filterMerchantAccountType`.  Required if `filterMerchantAccountType` is either: * **includeAccounts** * **excludeAccounts**  Not needed for `filterMerchantAccountType`: **allAccounts**.
     *
     * @return self
     */
    public function setFilterMerchantAccounts($filterMerchantAccounts)
    {
        $this->container['filterMerchantAccounts'] = $filterMerchantAccounts;

        return $this;
    }

    /**
     * Gets networkType
     *
     * @return string|null
     */
    public function getNetworkType()
    {
        return $this->container['networkType'];
    }

    /**
     * Sets networkType
     *
     * @param string|null $networkType Network type for Terminal API notification webhooks. Possible values: * **public** * **local**  Default Value: **public**.
     *
     * @return self
     */
    public function setNetworkType($networkType)
    {
        $allowedValues = $this->getNetworkTypeAllowableValues();
        if (!in_array($networkType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'networkType', must be one of '%s'",
                    $networkType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['networkType'] = $networkType;

        return $this;
    }

    /**
     * Gets password
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     *
     * @param string|null $password Password to access the webhook URL.
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->container['password'] = $password;

        return $this;
    }

    /**
     * Gets populateSoapActionHeader
     *
     * @return bool|null
     */
    public function getPopulateSoapActionHeader()
    {
        return $this->container['populateSoapActionHeader'];
    }

    /**
     * Sets populateSoapActionHeader
     *
     * @param bool|null $populateSoapActionHeader Indicates if the SOAP action header needs to be populated. Default value: **false**.  Only applies if `communicationFormat`: **soap**.
     *
     * @return self
     */
    public function setPopulateSoapActionHeader($populateSoapActionHeader)
    {
        $this->container['populateSoapActionHeader'] = $populateSoapActionHeader;

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
     * @param string $type The type of webhook that is being created. Possible values are:  - **standard** - **account-settings-notification** - **banktransfer-notification** - **boletobancario-notification** - **directdebit-notification** - **ach-notification-of-change-notification** - **direct-debit-notice-of-change-notification** - **pending-notification** - **ideal-notification** - **ideal-pending-notification** - **report-notification** - **rreq-notification** - **terminal-settings** - **terminal-boarding**  Find out more about [standard notification webhooks](https://docs.adyen.com/development-resources/webhooks/understand-notifications#event-codes) and [other types of notifications](https://docs.adyen.com/development-resources/webhooks/understand-notifications#other-notifications).
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url Public URL where webhooks will be sent, for example **https://www.domain.com/webhook-endpoint**.
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets username
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->container['username'];
    }

    /**
     * Sets username
     *
     * @param string|null $username Username to access the webhook URL.
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->container['username'] = $username;

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
