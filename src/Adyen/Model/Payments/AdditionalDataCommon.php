<?php

/**
 * Adyen Payment API
 *
 * The version of the OpenAPI document: 68
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
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
        'requestedTestAcquirerResponseCode' => 'string',
        'requestedTestErrorResponseCode' => 'string',
        'allowPartialAuth' => 'string',
        'authorisationType' => 'string',
        'autoRescue' => 'string',
        'customRoutingFlag' => 'string',
        'industryUsage' => 'string',
        'manualCapture' => 'string',
        'maxDaysToRescue' => 'string',
        'networkTxReference' => 'string',
        'overwriteBrand' => 'string',
        'subMerchantCity' => 'string',
        'subMerchantCountry' => 'string',
        'subMerchantID' => 'string',
        'subMerchantName' => 'string',
        'subMerchantPostalCode' => 'string',
        'subMerchantState' => 'string',
        'subMerchantStreet' => 'string',
        'subMerchantTaxId' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'requestedTestAcquirerResponseCode' => null,
        'requestedTestErrorResponseCode' => null,
        'allowPartialAuth' => null,
        'authorisationType' => null,
        'autoRescue' => null,
        'customRoutingFlag' => null,
        'industryUsage' => null,
        'manualCapture' => null,
        'maxDaysToRescue' => null,
        'networkTxReference' => null,
        'overwriteBrand' => null,
        'subMerchantCity' => null,
        'subMerchantCountry' => null,
        'subMerchantID' => null,
        'subMerchantName' => null,
        'subMerchantPostalCode' => null,
        'subMerchantState' => null,
        'subMerchantStreet' => null,
        'subMerchantTaxId' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'requestedTestAcquirerResponseCode' => false,
        'requestedTestErrorResponseCode' => false,
        'allowPartialAuth' => false,
        'authorisationType' => false,
        'autoRescue' => false,
        'customRoutingFlag' => false,
        'industryUsage' => false,
        'manualCapture' => false,
        'maxDaysToRescue' => false,
        'networkTxReference' => false,
        'overwriteBrand' => false,
        'subMerchantCity' => false,
        'subMerchantCountry' => false,
        'subMerchantID' => false,
        'subMerchantName' => false,
        'subMerchantPostalCode' => false,
        'subMerchantState' => false,
        'subMerchantStreet' => false,
        'subMerchantTaxId' => false
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
        'requestedTestAcquirerResponseCode' => 'RequestedTestAcquirerResponseCode',
        'requestedTestErrorResponseCode' => 'RequestedTestErrorResponseCode',
        'allowPartialAuth' => 'allowPartialAuth',
        'authorisationType' => 'authorisationType',
        'autoRescue' => 'autoRescue',
        'customRoutingFlag' => 'customRoutingFlag',
        'industryUsage' => 'industryUsage',
        'manualCapture' => 'manualCapture',
        'maxDaysToRescue' => 'maxDaysToRescue',
        'networkTxReference' => 'networkTxReference',
        'overwriteBrand' => 'overwriteBrand',
        'subMerchantCity' => 'subMerchantCity',
        'subMerchantCountry' => 'subMerchantCountry',
        'subMerchantID' => 'subMerchantID',
        'subMerchantName' => 'subMerchantName',
        'subMerchantPostalCode' => 'subMerchantPostalCode',
        'subMerchantState' => 'subMerchantState',
        'subMerchantStreet' => 'subMerchantStreet',
        'subMerchantTaxId' => 'subMerchantTaxId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'requestedTestAcquirerResponseCode' => 'setRequestedTestAcquirerResponseCode',
        'requestedTestErrorResponseCode' => 'setRequestedTestErrorResponseCode',
        'allowPartialAuth' => 'setAllowPartialAuth',
        'authorisationType' => 'setAuthorisationType',
        'autoRescue' => 'setAutoRescue',
        'customRoutingFlag' => 'setCustomRoutingFlag',
        'industryUsage' => 'setIndustryUsage',
        'manualCapture' => 'setManualCapture',
        'maxDaysToRescue' => 'setMaxDaysToRescue',
        'networkTxReference' => 'setNetworkTxReference',
        'overwriteBrand' => 'setOverwriteBrand',
        'subMerchantCity' => 'setSubMerchantCity',
        'subMerchantCountry' => 'setSubMerchantCountry',
        'subMerchantID' => 'setSubMerchantID',
        'subMerchantName' => 'setSubMerchantName',
        'subMerchantPostalCode' => 'setSubMerchantPostalCode',
        'subMerchantState' => 'setSubMerchantState',
        'subMerchantStreet' => 'setSubMerchantStreet',
        'subMerchantTaxId' => 'setSubMerchantTaxId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'requestedTestAcquirerResponseCode' => 'getRequestedTestAcquirerResponseCode',
        'requestedTestErrorResponseCode' => 'getRequestedTestErrorResponseCode',
        'allowPartialAuth' => 'getAllowPartialAuth',
        'authorisationType' => 'getAuthorisationType',
        'autoRescue' => 'getAutoRescue',
        'customRoutingFlag' => 'getCustomRoutingFlag',
        'industryUsage' => 'getIndustryUsage',
        'manualCapture' => 'getManualCapture',
        'maxDaysToRescue' => 'getMaxDaysToRescue',
        'networkTxReference' => 'getNetworkTxReference',
        'overwriteBrand' => 'getOverwriteBrand',
        'subMerchantCity' => 'getSubMerchantCity',
        'subMerchantCountry' => 'getSubMerchantCountry',
        'subMerchantID' => 'getSubMerchantID',
        'subMerchantName' => 'getSubMerchantName',
        'subMerchantPostalCode' => 'getSubMerchantPostalCode',
        'subMerchantState' => 'getSubMerchantState',
        'subMerchantStreet' => 'getSubMerchantStreet',
        'subMerchantTaxId' => 'getSubMerchantTaxId'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('requestedTestAcquirerResponseCode', $data ?? [], null);
        $this->setIfExists('requestedTestErrorResponseCode', $data ?? [], null);
        $this->setIfExists('allowPartialAuth', $data ?? [], null);
        $this->setIfExists('authorisationType', $data ?? [], null);
        $this->setIfExists('autoRescue', $data ?? [], null);
        $this->setIfExists('customRoutingFlag', $data ?? [], null);
        $this->setIfExists('industryUsage', $data ?? [], null);
        $this->setIfExists('manualCapture', $data ?? [], null);
        $this->setIfExists('maxDaysToRescue', $data ?? [], null);
        $this->setIfExists('networkTxReference', $data ?? [], null);
        $this->setIfExists('overwriteBrand', $data ?? [], null);
        $this->setIfExists('subMerchantCity', $data ?? [], null);
        $this->setIfExists('subMerchantCountry', $data ?? [], null);
        $this->setIfExists('subMerchantID', $data ?? [], null);
        $this->setIfExists('subMerchantName', $data ?? [], null);
        $this->setIfExists('subMerchantPostalCode', $data ?? [], null);
        $this->setIfExists('subMerchantState', $data ?? [], null);
        $this->setIfExists('subMerchantStreet', $data ?? [], null);
        $this->setIfExists('subMerchantTaxId', $data ?? [], null);
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
        if (!is_null($this->container['industryUsage']) && !in_array($this->container['industryUsage'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'industryUsage', must be one of '%s'",
                $this->container['industryUsage'],
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
     * Gets requestedTestAcquirerResponseCode
     *
     * @return string|null
     */
    public function getRequestedTestAcquirerResponseCode()
    {
        return $this->container['requestedTestAcquirerResponseCode'];
    }

    /**
     * Sets requestedTestAcquirerResponseCode
     *
     * @param string|null $requestedTestAcquirerResponseCode Triggers test scenarios that allow to replicate certain acquirer response codes. See [Testing result codes and refusal reasons](https://docs.adyen.com/development-resources/testing/result-codes/) to learn about the possible values, and the `refusalReason` values you can trigger.
     *
     * @return self
     */
    public function setRequestedTestAcquirerResponseCode($requestedTestAcquirerResponseCode)
    {
        $this->container['requestedTestAcquirerResponseCode'] = $requestedTestAcquirerResponseCode;

        return $this;
    }

    /**
     * Gets requestedTestErrorResponseCode
     *
     * @return string|null
     */
    public function getRequestedTestErrorResponseCode()
    {
        return $this->container['requestedTestErrorResponseCode'];
    }

    /**
     * Sets requestedTestErrorResponseCode
     *
     * @param string|null $requestedTestErrorResponseCode Triggers test scenarios that allow to replicate certain communication errors.  Allowed values: * **NO_CONNECTION_AVAILABLE** – There wasn't a connection available to service the outgoing communication. This is a transient, retriable error since no messaging could be initiated to an issuing system (or third-party acquiring system). Therefore, the header Transient-Error: true is returned in the response. A subsequent request using the same idempotency key will be processed as if it was the first request. * **IOEXCEPTION_RECEIVED** – Something went wrong during transmission of the message or receiving the response. This is a classified as non-transient because the message could have been received by the issuing party and been acted upon. No transient error header is returned. If using idempotency, the (error) response is stored as the final result for the idempotency key. Subsequent messages with the same idempotency key not be processed beyond returning the stored response.
     *
     * @return self
     */
    public function setRequestedTestErrorResponseCode($requestedTestErrorResponseCode)
    {
        $this->container['requestedTestErrorResponseCode'] = $requestedTestErrorResponseCode;

        return $this;
    }

    /**
     * Gets allowPartialAuth
     *
     * @return string|null
     */
    public function getAllowPartialAuth()
    {
        return $this->container['allowPartialAuth'];
    }

    /**
     * Sets allowPartialAuth
     *
     * @param string|null $allowPartialAuth Set to true to authorise a part of the requested amount in case the cardholder does not have enough funds on their account.  If a payment was partially authorised, the response includes resultCode: PartiallyAuthorised and the authorised amount in additionalData.authorisedAmountValue. To enable this functionality, contact our Support Team.
     *
     * @return self
     */
    public function setAllowPartialAuth($allowPartialAuth)
    {
        $this->container['allowPartialAuth'] = $allowPartialAuth;

        return $this;
    }

    /**
     * Gets authorisationType
     *
     * @return string|null
     */
    public function getAuthorisationType()
    {
        return $this->container['authorisationType'];
    }

    /**
     * Sets authorisationType
     *
     * @param string|null $authorisationType Flags a card payment request for either pre-authorisation or final authorisation. For more information, refer to [Authorisation types](https://docs.adyen.com/online-payments/adjust-authorisation#authorisation-types).  Allowed values: * **PreAuth** – flags the payment request to be handled as a pre-authorisation. * **FinalAuth** – flags the payment request to be handled as a final authorisation.
     *
     * @return self
     */
    public function setAuthorisationType($authorisationType)
    {
        $this->container['authorisationType'] = $authorisationType;

        return $this;
    }

    /**
     * Gets autoRescue
     *
     * @return string|null
     */
    public function getAutoRescue()
    {
        return $this->container['autoRescue'];
    }

    /**
     * Sets autoRescue
     *
     * @param string|null $autoRescue Set to **true** to enable [Auto Rescue](https://docs.adyen.com/online-payments/auto-rescue/) for a transaction. Use the `maxDaysToRescue` to specify a rescue window.
     *
     * @return self
     */
    public function setAutoRescue($autoRescue)
    {
        $this->container['autoRescue'] = $autoRescue;

        return $this;
    }

    /**
     * Gets customRoutingFlag
     *
     * @return string|null
     */
    public function getCustomRoutingFlag()
    {
        return $this->container['customRoutingFlag'];
    }

    /**
     * Sets customRoutingFlag
     *
     * @param string|null $customRoutingFlag Allows you to determine or override the acquirer account that should be used for the transaction.  If you need to process a payment with an acquirer different from a default one, you can set up a corresponding configuration on the Adyen payments platform. Then you can pass a custom routing flag in a payment request's additional data to target a specific acquirer.  To enable this functionality, contact [Support](https://www.adyen.help/hc/en-us/requests/new).
     *
     * @return self
     */
    public function setCustomRoutingFlag($customRoutingFlag)
    {
        $this->container['customRoutingFlag'] = $customRoutingFlag;

        return $this;
    }

    /**
     * Gets industryUsage
     *
     * @return string|null
     */
    public function getIndustryUsage()
    {
        return $this->container['industryUsage'];
    }

    /**
     * Sets industryUsage
     *
     * @param string|null $industryUsage In case of [asynchronous authorisation adjustment](https://docs.adyen.com/online-payments/adjust-authorisation#adjust-authorisation), this field denotes why the additional payment is made.  Possible values:   * **NoShow**: An incremental charge is carried out because of a no-show for a guaranteed reservation.   * **DelayedCharge**: An incremental charge is carried out to process an additional payment after the original services have been rendered and the respective payment has been processed.
     *
     * @return self
     */
    public function setIndustryUsage($industryUsage)
    {
        $allowedValues = $this->getIndustryUsageAllowableValues();
        if (!in_array($industryUsage, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'industryUsage', must be one of '%s'",
                    $industryUsage,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['industryUsage'] = $industryUsage;

        return $this;
    }

    /**
     * Gets manualCapture
     *
     * @return string|null
     */
    public function getManualCapture()
    {
        return $this->container['manualCapture'];
    }

    /**
     * Sets manualCapture
     *
     * @param string|null $manualCapture Set to **true** to require [manual capture](https://docs.adyen.com/online-payments/capture) for the transaction.
     *
     * @return self
     */
    public function setManualCapture($manualCapture)
    {
        $this->container['manualCapture'] = $manualCapture;

        return $this;
    }

    /**
     * Gets maxDaysToRescue
     *
     * @return string|null
     */
    public function getMaxDaysToRescue()
    {
        return $this->container['maxDaysToRescue'];
    }

    /**
     * Sets maxDaysToRescue
     *
     * @param string|null $maxDaysToRescue The rescue window for a transaction, in days, when `autoRescue` is set to **true**. You can specify a value between 1 and 48.  * For [cards](https://docs.adyen.com/online-payments/auto-rescue/cards/), the default is one calendar month.  * For [SEPA](https://docs.adyen.com/online-payments/auto-rescue/sepa/), the default is 42 days.
     *
     * @return self
     */
    public function setMaxDaysToRescue($maxDaysToRescue)
    {
        $this->container['maxDaysToRescue'] = $maxDaysToRescue;

        return $this;
    }

    /**
     * Gets networkTxReference
     *
     * @return string|null
     */
    public function getNetworkTxReference()
    {
        return $this->container['networkTxReference'];
    }

    /**
     * Sets networkTxReference
     *
     * @param string|null $networkTxReference Allows you to link the transaction to the original or previous one in a subscription/card-on-file chain. This field is required for token-based transactions where Adyen does not tokenize the card.  Transaction identifier from card schemes, for example, Mastercard Trace ID or the Visa Transaction ID.  Submit the original transaction ID of the contract in your payment request if you are not tokenizing card details with Adyen and are making a merchant-initiated transaction (MIT) for subsequent charges.  Make sure you are sending `shopperInteraction` **ContAuth** and `recurringProcessingModel` **Subscription** or **UnscheduledCardOnFile** to ensure that the transaction is classified as MIT.
     *
     * @return self
     */
    public function setNetworkTxReference($networkTxReference)
    {
        $this->container['networkTxReference'] = $networkTxReference;

        return $this;
    }

    /**
     * Gets overwriteBrand
     *
     * @return string|null
     */
    public function getOverwriteBrand()
    {
        return $this->container['overwriteBrand'];
    }

    /**
     * Sets overwriteBrand
     *
     * @param string|null $overwriteBrand Boolean indicator that can be optionally used for performing debit transactions on combo cards (for example, combo cards in Brazil). This is not mandatory but we recommend that you set this to true if you want to use the `selectedBrand` value to specify how to process the transaction.
     *
     * @return self
     */
    public function setOverwriteBrand($overwriteBrand)
    {
        $this->container['overwriteBrand'] = $overwriteBrand;

        return $this;
    }

    /**
     * Gets subMerchantCity
     *
     * @return string|null
     */
    public function getSubMerchantCity()
    {
        return $this->container['subMerchantCity'];
    }

    /**
     * Sets subMerchantCity
     *
     * @param string|null $subMerchantCity This field is required if the transaction is performed by a registered payment facilitator. This field must contain the city of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 13 characters.
     *
     * @return self
     */
    public function setSubMerchantCity($subMerchantCity)
    {
        $this->container['subMerchantCity'] = $subMerchantCity;

        return $this;
    }

    /**
     * Gets subMerchantCountry
     *
     * @return string|null
     */
    public function getSubMerchantCountry()
    {
        return $this->container['subMerchantCountry'];
    }

    /**
     * Sets subMerchantCountry
     *
     * @param string|null $subMerchantCountry This field is required if the transaction is performed by a registered payment facilitator. This field must contain the three-letter country code of the actual merchant's address. * Format: alpha-numeric. * Fixed length: 3 characters.
     *
     * @return self
     */
    public function setSubMerchantCountry($subMerchantCountry)
    {
        $this->container['subMerchantCountry'] = $subMerchantCountry;

        return $this;
    }

    /**
     * Gets subMerchantID
     *
     * @return string|null
     */
    public function getSubMerchantID()
    {
        return $this->container['subMerchantID'];
    }

    /**
     * Sets subMerchantID
     *
     * @param string|null $subMerchantID This field contains an identifier of the actual merchant when a transaction is submitted via a payment facilitator. The payment facilitator must send in this unique ID.  A unique identifier per submerchant that is required if the transaction is performed by a registered payment facilitator. * Format: alpha-numeric. * Fixed length: 15 characters.
     *
     * @return self
     */
    public function setSubMerchantID($subMerchantID)
    {
        $this->container['subMerchantID'] = $subMerchantID;

        return $this;
    }

    /**
     * Gets subMerchantName
     *
     * @return string|null
     */
    public function getSubMerchantName()
    {
        return $this->container['subMerchantName'];
    }

    /**
     * Sets subMerchantName
     *
     * @param string|null $subMerchantName This field is required if the transaction is performed by a registered payment facilitator. This field must contain the name of the actual merchant. * Format: alpha-numeric. * Maximum length: 22 characters.
     *
     * @return self
     */
    public function setSubMerchantName($subMerchantName)
    {
        $this->container['subMerchantName'] = $subMerchantName;

        return $this;
    }

    /**
     * Gets subMerchantPostalCode
     *
     * @return string|null
     */
    public function getSubMerchantPostalCode()
    {
        return $this->container['subMerchantPostalCode'];
    }

    /**
     * Sets subMerchantPostalCode
     *
     * @param string|null $subMerchantPostalCode This field is required if the transaction is performed by a registered payment facilitator. This field must contain the postal code of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 10 characters.
     *
     * @return self
     */
    public function setSubMerchantPostalCode($subMerchantPostalCode)
    {
        $this->container['subMerchantPostalCode'] = $subMerchantPostalCode;

        return $this;
    }

    /**
     * Gets subMerchantState
     *
     * @return string|null
     */
    public function getSubMerchantState()
    {
        return $this->container['subMerchantState'];
    }

    /**
     * Sets subMerchantState
     *
     * @param string|null $subMerchantState This field is required if the transaction is performed by a registered payment facilitator, and if applicable to the country. This field must contain the state code of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 3 characters.
     *
     * @return self
     */
    public function setSubMerchantState($subMerchantState)
    {
        $this->container['subMerchantState'] = $subMerchantState;

        return $this;
    }

    /**
     * Gets subMerchantStreet
     *
     * @return string|null
     */
    public function getSubMerchantStreet()
    {
        return $this->container['subMerchantStreet'];
    }

    /**
     * Sets subMerchantStreet
     *
     * @param string|null $subMerchantStreet This field is required if the transaction is performed by a registered payment facilitator. This field must contain the street of the actual merchant's address. * Format: alpha-numeric. * Maximum length: 60 characters.
     *
     * @return self
     */
    public function setSubMerchantStreet($subMerchantStreet)
    {
        $this->container['subMerchantStreet'] = $subMerchantStreet;

        return $this;
    }

    /**
     * Gets subMerchantTaxId
     *
     * @return string|null
     */
    public function getSubMerchantTaxId()
    {
        return $this->container['subMerchantTaxId'];
    }

    /**
     * Sets subMerchantTaxId
     *
     * @param string|null $subMerchantTaxId This field is required if the transaction is performed by a registered payment facilitator. This field must contain the tax ID of the actual merchant. * Format: alpha-numeric. * Fixed length: 11 or 14 characters.
     *
     * @return self
     */
    public function setSubMerchantTaxId($subMerchantTaxId)
    {
        $this->container['subMerchantTaxId'] = $subMerchantTaxId;

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
