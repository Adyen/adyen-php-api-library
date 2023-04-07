<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Payments;

use \ArrayAccess;
use Adyen\Model\Payments\ObjectSerializer;

/**
 * AdditionalDataCommon Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataCommon implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataCommon';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'requested_test_error_response_code' => 'string',
        'allow_partial_auth' => 'string',
        'authorisation_type' => 'string',
        'custom_routing_flag' => 'string',
        'industry_usage' => 'string',
        'manual_capture' => 'string',
        'network_tx_reference' => 'string',
        'overwrite_brand' => 'string',
        'sub_merchant_city' => 'string',
        'sub_merchant_country' => 'string',
        'sub_merchant_id' => 'string',
        'sub_merchant_name' => 'string',
        'sub_merchant_postal_code' => 'string',
        'sub_merchant_state' => 'string',
        'sub_merchant_street' => 'string',
        'sub_merchant_tax_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'requested_test_error_response_code' => null,
        'allow_partial_auth' => null,
        'authorisation_type' => null,
        'custom_routing_flag' => null,
        'industry_usage' => null,
        'manual_capture' => null,
        'network_tx_reference' => null,
        'overwrite_brand' => null,
        'sub_merchant_city' => null,
        'sub_merchant_country' => null,
        'sub_merchant_id' => null,
        'sub_merchant_name' => null,
        'sub_merchant_postal_code' => null,
        'sub_merchant_state' => null,
        'sub_merchant_street' => null,
        'sub_merchant_tax_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'requested_test_error_response_code' => false,
        'allow_partial_auth' => false,
        'authorisation_type' => false,
        'custom_routing_flag' => false,
        'industry_usage' => false,
        'manual_capture' => false,
        'network_tx_reference' => false,
        'overwrite_brand' => false,
        'sub_merchant_city' => false,
        'sub_merchant_country' => false,
        'sub_merchant_id' => false,
        'sub_merchant_name' => false,
        'sub_merchant_postal_code' => false,
        'sub_merchant_state' => false,
        'sub_merchant_street' => false,
        'sub_merchant_tax_id' => false
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
        'requested_test_error_response_code' => 'RequestedTestErrorResponseCode',
        'allow_partial_auth' => 'allowPartialAuth',
        'authorisation_type' => 'authorisationType',
        'custom_routing_flag' => 'customRoutingFlag',
        'industry_usage' => 'industryUsage',
        'manual_capture' => 'manualCapture',
        'network_tx_reference' => 'networkTxReference',
        'overwrite_brand' => 'overwriteBrand',
        'sub_merchant_city' => 'subMerchantCity',
        'sub_merchant_country' => 'subMerchantCountry',
        'sub_merchant_id' => 'subMerchantID',
        'sub_merchant_name' => 'subMerchantName',
        'sub_merchant_postal_code' => 'subMerchantPostalCode',
        'sub_merchant_state' => 'subMerchantState',
        'sub_merchant_street' => 'subMerchantStreet',
        'sub_merchant_tax_id' => 'subMerchantTaxId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'requested_test_error_response_code' => 'setRequestedTestErrorResponseCode',
        'allow_partial_auth' => 'setAllowPartialAuth',
        'authorisation_type' => 'setAuthorisationType',
        'custom_routing_flag' => 'setCustomRoutingFlag',
        'industry_usage' => 'setIndustryUsage',
        'manual_capture' => 'setManualCapture',
        'network_tx_reference' => 'setNetworkTxReference',
        'overwrite_brand' => 'setOverwriteBrand',
        'sub_merchant_city' => 'setSubMerchantCity',
        'sub_merchant_country' => 'setSubMerchantCountry',
        'sub_merchant_id' => 'setSubMerchantId',
        'sub_merchant_name' => 'setSubMerchantName',
        'sub_merchant_postal_code' => 'setSubMerchantPostalCode',
        'sub_merchant_state' => 'setSubMerchantState',
        'sub_merchant_street' => 'setSubMerchantStreet',
        'sub_merchant_tax_id' => 'setSubMerchantTaxId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'requested_test_error_response_code' => 'getRequestedTestErrorResponseCode',
        'allow_partial_auth' => 'getAllowPartialAuth',
        'authorisation_type' => 'getAuthorisationType',
        'custom_routing_flag' => 'getCustomRoutingFlag',
        'industry_usage' => 'getIndustryUsage',
        'manual_capture' => 'getManualCapture',
        'network_tx_reference' => 'getNetworkTxReference',
        'overwrite_brand' => 'getOverwriteBrand',
        'sub_merchant_city' => 'getSubMerchantCity',
        'sub_merchant_country' => 'getSubMerchantCountry',
        'sub_merchant_id' => 'getSubMerchantId',
        'sub_merchant_name' => 'getSubMerchantName',
        'sub_merchant_postal_code' => 'getSubMerchantPostalCode',
        'sub_merchant_state' => 'getSubMerchantState',
        'sub_merchant_street' => 'getSubMerchantStreet',
        'sub_merchant_tax_id' => 'getSubMerchantTaxId'
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

    public const INDUSTRY_USAGE_NO_SHOW = 'NoShow';
    public const INDUSTRY_USAGE_DELAYED_CHARGE = 'DelayedCharge';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIndustryUsageAllowableValues()
    {
        return [
            self::INDUSTRY_USAGE_NO_SHOW,
            self::INDUSTRY_USAGE_DELAYED_CHARGE,
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
        $this->setIfExists('requested_test_error_response_code', $data ?? [], null);
        $this->setIfExists('allow_partial_auth', $data ?? [], null);
        $this->setIfExists('authorisation_type', $data ?? [], null);
        $this->setIfExists('custom_routing_flag', $data ?? [], null);
        $this->setIfExists('industry_usage', $data ?? [], null);
        $this->setIfExists('manual_capture', $data ?? [], null);
        $this->setIfExists('network_tx_reference', $data ?? [], null);
        $this->setIfExists('overwrite_brand', $data ?? [], null);
        $this->setIfExists('sub_merchant_city', $data ?? [], null);
        $this->setIfExists('sub_merchant_country', $data ?? [], null);
        $this->setIfExists('sub_merchant_id', $data ?? [], null);
        $this->setIfExists('sub_merchant_name', $data ?? [], null);
        $this->setIfExists('sub_merchant_postal_code', $data ?? [], null);
        $this->setIfExists('sub_merchant_state', $data ?? [], null);
        $this->setIfExists('sub_merchant_street', $data ?? [], null);
        $this->setIfExists('sub_merchant_tax_id', $data ?? [], null);
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

        $allowedValues = $this->getIndustryUsageAllowableValues();
        if (!is_null($this->container['industry_usage']) && !in_array($this->container['industry_usage'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'industry_usage', must be one of '%s'",
                $this->container['industry_usage'],
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
     * Gets requested_test_error_response_code
     *
     * @return string|null
     */
    public function getRequestedTestErrorResponseCode()
    {
        return $this->container['requested_test_error_response_code'];
    }

    /**
     * Sets requested_test_error_response_code
     *
     * @param string|null $requested_test_error_response_code Triggers test scenarios that allow to replicate certain communication errors.  Allowed values: * **NO_CONNECTION_AVAILABLE** – There wasn't a connection available to service the outgoing communication. This is a transient, retriable error since no messaging could be initiated to an issuing system (or third-party acquiring system). Therefore, the header Transient-Error: true is returned in the response. A subsequent request using the same idempotency key will be processed as if it was the first request. * **IOEXCEPTION_RECEIVED** – Something went wrong during transmission of the message or receiving the response. This is a classified as non-transient because the message could have been received by the issuing party and been acted upon. No transient error header is returned. If using idempotency, the (error) response is stored as the final result for the idempotency key. Subsequent messages with the same idempotency key not be processed beyond returning the stored response.
     *
     * @return self
     */
    public function setRequestedTestErrorResponseCode($requested_test_error_response_code)
    {
        if (is_null($requested_test_error_response_code)) {
            throw new \InvalidArgumentException('non-nullable requested_test_error_response_code cannot be null');
        }
        $this->container['requested_test_error_response_code'] = $requested_test_error_response_code;

        return $this;
    }

    /**
     * Gets allow_partial_auth
     *
     * @return string|null
     */
    public function getAllowPartialAuth()
    {
        return $this->container['allow_partial_auth'];
    }

    /**
     * Sets allow_partial_auth
     *
     * @param string|null $allow_partial_auth Set to true to authorise a part of the requested amount in case the cardholder does not have enough funds on their account.  If a payment was partially authorised, the response includes resultCode: PartiallyAuthorised and the authorised amount in additionalData.authorisedAmountValue. To enable this functionality, contact our Support Team.
     *
     * @return self
     */
    public function setAllowPartialAuth($allow_partial_auth)
    {
        if (is_null($allow_partial_auth)) {
            throw new \InvalidArgumentException('non-nullable allow_partial_auth cannot be null');
        }
        $this->container['allow_partial_auth'] = $allow_partial_auth;

        return $this;
    }

    /**
     * Gets authorisation_type
     *
     * @return string|null
     */
    public function getAuthorisationType()
    {
        return $this->container['authorisation_type'];
    }

    /**
     * Sets authorisation_type
     *
     * @param string|null $authorisation_type Flags a card payment request for either pre-authorisation or final authorisation. For more information, refer to [Authorisation types](https://docs.adyen.com/online-payments/adjust-authorisation#authorisation-types).  Allowed values: * **PreAuth** – flags the payment request to be handled as a pre-authorisation. * **FinalAuth** – flags the payment request to be handled as a final authorisation.
     *
     * @return self
     */
    public function setAuthorisationType($authorisation_type)
    {
        if (is_null($authorisation_type)) {
            throw new \InvalidArgumentException('non-nullable authorisation_type cannot be null');
        }
        $this->container['authorisation_type'] = $authorisation_type;

        return $this;
    }

    /**
     * Gets custom_routing_flag
     *
     * @return string|null
     */
    public function getCustomRoutingFlag()
    {
        return $this->container['custom_routing_flag'];
    }

    /**
     * Sets custom_routing_flag
     *
     * @param string|null $custom_routing_flag Allows you to determine or override the acquirer account that should be used for the transaction.  If you need to process a payment with an acquirer different from a default one, you can set up a corresponding configuration on the Adyen payments platform. Then you can pass a custom routing flag in a payment request's additional data to target a specific acquirer.  To enable this functionality, contact [Support](https://www.adyen.help/hc/en-us/requests/new).
     *
     * @return self
     */
    public function setCustomRoutingFlag($custom_routing_flag)
    {
        if (is_null($custom_routing_flag)) {
            throw new \InvalidArgumentException('non-nullable custom_routing_flag cannot be null');
        }
        $this->container['custom_routing_flag'] = $custom_routing_flag;

        return $this;
    }

    /**
     * Gets industry_usage
     *
     * @return string|null
     */
    public function getIndustryUsage()
    {
        return $this->container['industry_usage'];
    }

    /**
     * Sets industry_usage
     *
     * @param string|null $industry_usage In case of [asynchronous authorisation adjustment](https://docs.adyen.com/online-payments/adjust-authorisation#adjust-authorisation), this field denotes why the additional payment is made.  Possible values:   * **NoShow**: An incremental charge is carried out because of a no-show for a guaranteed reservation.   * **DelayedCharge**: An incremental charge is carried out to process an additional payment after the original services have been rendered and the respective payment has been processed.
     *
     * @return self
     */
    public function setIndustryUsage($industry_usage)
    {
        if (is_null($industry_usage)) {
            throw new \InvalidArgumentException('non-nullable industry_usage cannot be null');
        }
        $allowedValues = $this->getIndustryUsageAllowableValues();
        if (!in_array($industry_usage, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'industry_usage', must be one of '%s'",
                    $industry_usage,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['industry_usage'] = $industry_usage;

        return $this;
    }

    /**
     * Gets manual_capture
     *
     * @return string|null
     */
    public function getManualCapture()
    {
        return $this->container['manual_capture'];
    }

    /**
     * Sets manual_capture
     *
     * @param string|null $manual_capture Set to **true** to require [manual capture](https://docs.adyen.com/online-payments/capture) for the transaction.
     *
     * @return self
     */
    public function setManualCapture($manual_capture)
    {
        if (is_null($manual_capture)) {
            throw new \InvalidArgumentException('non-nullable manual_capture cannot be null');
        }
        $this->container['manual_capture'] = $manual_capture;

        return $this;
    }

    /**
     * Gets network_tx_reference
     *
     * @return string|null
     */
    public function getNetworkTxReference()
    {
        return $this->container['network_tx_reference'];
    }

    /**
     * Sets network_tx_reference
     *
     * @param string|null $network_tx_reference Allows you to link the transaction to the original or previous one in a subscription/card-on-file chain. This field is required for token-based transactions where Adyen does not tokenize the card.  Transaction identifier from card schemes, for example, Mastercard Trace ID or the Visa Transaction ID.  Submit the original transaction ID of the contract in your payment request if you are not tokenizing card details with Adyen and are making a merchant-initiated transaction (MIT) for subsequent charges.  Make sure you are sending `shopperInteraction` **ContAuth** and `recurringProcessingModel` **Subscription** or **UnscheduledCardOnFile** to ensure that the transaction is classified as MIT.
     *
     * @return self
     */
    public function setNetworkTxReference($network_tx_reference)
    {
        if (is_null($network_tx_reference)) {
            throw new \InvalidArgumentException('non-nullable network_tx_reference cannot be null');
        }
        $this->container['network_tx_reference'] = $network_tx_reference;

        return $this;
    }

    /**
     * Gets overwrite_brand
     *
     * @return string|null
     */
    public function getOverwriteBrand()
    {
        return $this->container['overwrite_brand'];
    }

    /**
     * Sets overwrite_brand
     *
     * @param string|null $overwrite_brand Boolean indicator that can be optionally used for performing debit transactions on combo cards (for example, combo cards in Brazil). This is not mandatory but we recommend that you set this to true if you want to use the `selectedBrand` value to specify how to process the transaction.
     *
     * @return self
     */
    public function setOverwriteBrand($overwrite_brand)
    {
        if (is_null($overwrite_brand)) {
            throw new \InvalidArgumentException('non-nullable overwrite_brand cannot be null');
        }
        $this->container['overwrite_brand'] = $overwrite_brand;

        return $this;
    }

    /**
     * Gets sub_merchant_city
     *
     * @return string|null
     */
    public function getSubMerchantCity()
    {
        return $this->container['sub_merchant_city'];
    }

    /**
     * Sets sub_merchant_city
     *
     * @param string|null $sub_merchant_city This field is required if the transaction is performed by a registered payment facilitator. This field must contain the city of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 13 characters.
     *
     * @return self
     */
    public function setSubMerchantCity($sub_merchant_city)
    {
        if (is_null($sub_merchant_city)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_city cannot be null');
        }
        $this->container['sub_merchant_city'] = $sub_merchant_city;

        return $this;
    }

    /**
     * Gets sub_merchant_country
     *
     * @return string|null
     */
    public function getSubMerchantCountry()
    {
        return $this->container['sub_merchant_country'];
    }

    /**
     * Sets sub_merchant_country
     *
     * @param string|null $sub_merchant_country This field is required if the transaction is performed by a registered payment facilitator. This field must contain the three-letter country code of the actual merchant's address. * Format: alpha-numeric. * Fixed length: 3 characters.
     *
     * @return self
     */
    public function setSubMerchantCountry($sub_merchant_country)
    {
        if (is_null($sub_merchant_country)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_country cannot be null');
        }
        $this->container['sub_merchant_country'] = $sub_merchant_country;

        return $this;
    }

    /**
     * Gets sub_merchant_id
     *
     * @return string|null
     */
    public function getSubMerchantId()
    {
        return $this->container['sub_merchant_id'];
    }

    /**
     * Sets sub_merchant_id
     *
     * @param string|null $sub_merchant_id This field contains an identifier of the actual merchant when a transaction is submitted via a payment facilitator. The payment facilitator must send in this unique ID.  A unique identifier per submerchant that is required if the transaction is performed by a registered payment facilitator. * Format: alpha-numeric. * Fixed length: 15 characters.
     *
     * @return self
     */
    public function setSubMerchantId($sub_merchant_id)
    {
        if (is_null($sub_merchant_id)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_id cannot be null');
        }
        $this->container['sub_merchant_id'] = $sub_merchant_id;

        return $this;
    }

    /**
     * Gets sub_merchant_name
     *
     * @return string|null
     */
    public function getSubMerchantName()
    {
        return $this->container['sub_merchant_name'];
    }

    /**
     * Sets sub_merchant_name
     *
     * @param string|null $sub_merchant_name This field is required if the transaction is performed by a registered payment facilitator. This field must contain the name of the actual merchant. * Format: alpha-numeric. * Maximum length: 22 characters.
     *
     * @return self
     */
    public function setSubMerchantName($sub_merchant_name)
    {
        if (is_null($sub_merchant_name)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_name cannot be null');
        }
        $this->container['sub_merchant_name'] = $sub_merchant_name;

        return $this;
    }

    /**
     * Gets sub_merchant_postal_code
     *
     * @return string|null
     */
    public function getSubMerchantPostalCode()
    {
        return $this->container['sub_merchant_postal_code'];
    }

    /**
     * Sets sub_merchant_postal_code
     *
     * @param string|null $sub_merchant_postal_code This field is required if the transaction is performed by a registered payment facilitator. This field must contain the postal code of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 10 characters.
     *
     * @return self
     */
    public function setSubMerchantPostalCode($sub_merchant_postal_code)
    {
        if (is_null($sub_merchant_postal_code)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_postal_code cannot be null');
        }
        $this->container['sub_merchant_postal_code'] = $sub_merchant_postal_code;

        return $this;
    }

    /**
     * Gets sub_merchant_state
     *
     * @return string|null
     */
    public function getSubMerchantState()
    {
        return $this->container['sub_merchant_state'];
    }

    /**
     * Sets sub_merchant_state
     *
     * @param string|null $sub_merchant_state This field is required if the transaction is performed by a registered payment facilitator, and if applicable to the country. This field must contain the state code of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 3 characters.
     *
     * @return self
     */
    public function setSubMerchantState($sub_merchant_state)
    {
        if (is_null($sub_merchant_state)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_state cannot be null');
        }
        $this->container['sub_merchant_state'] = $sub_merchant_state;

        return $this;
    }

    /**
     * Gets sub_merchant_street
     *
     * @return string|null
     */
    public function getSubMerchantStreet()
    {
        return $this->container['sub_merchant_street'];
    }

    /**
     * Sets sub_merchant_street
     *
     * @param string|null $sub_merchant_street This field is required if the transaction is performed by a registered payment facilitator. This field must contain the street of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 60 characters.
     *
     * @return self
     */
    public function setSubMerchantStreet($sub_merchant_street)
    {
        if (is_null($sub_merchant_street)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_street cannot be null');
        }
        $this->container['sub_merchant_street'] = $sub_merchant_street;

        return $this;
    }

    /**
     * Gets sub_merchant_tax_id
     *
     * @return string|null
     */
    public function getSubMerchantTaxId()
    {
        return $this->container['sub_merchant_tax_id'];
    }

    /**
     * Sets sub_merchant_tax_id
     *
     * @param string|null $sub_merchant_tax_id This field is required if the transaction is performed by a registered payment facilitator. This field must contain the tax ID of the actual merchant. * Format: alpha-numeric. * Fixed length: 11 or 14 characters.
     *
     * @return self
     */
    public function setSubMerchantTaxId($sub_merchant_tax_id)
    {
        if (is_null($sub_merchant_tax_id)) {
            throw new \InvalidArgumentException('non-nullable sub_merchant_tax_id cannot be null');
        }
        $this->container['sub_merchant_tax_id'] = $sub_merchant_tax_id;

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