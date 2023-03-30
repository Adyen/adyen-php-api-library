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
 * ResponseAdditionalDataInstallments Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ResponseAdditionalDataInstallments implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ResponseAdditionalDataInstallments';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'installment_payment_data_installment_type' => 'string',
        'installment_payment_data_option_item_nr_annual_percentage_rate' => 'string',
        'installment_payment_data_option_item_nr_first_installment_amount' => 'string',
        'installment_payment_data_option_item_nr_installment_fee' => 'string',
        'installment_payment_data_option_item_nr_interest_rate' => 'string',
        'installment_payment_data_option_item_nr_maximum_number_of_installments' => 'string',
        'installment_payment_data_option_item_nr_minimum_number_of_installments' => 'string',
        'installment_payment_data_option_item_nr_number_of_installments' => 'string',
        'installment_payment_data_option_item_nr_subsequent_installment_amount' => 'string',
        'installment_payment_data_option_item_nr_total_amount_due' => 'string',
        'installment_payment_data_payment_options' => 'string',
        'installments_value' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'installment_payment_data_installment_type' => null,
        'installment_payment_data_option_item_nr_annual_percentage_rate' => null,
        'installment_payment_data_option_item_nr_first_installment_amount' => null,
        'installment_payment_data_option_item_nr_installment_fee' => null,
        'installment_payment_data_option_item_nr_interest_rate' => null,
        'installment_payment_data_option_item_nr_maximum_number_of_installments' => null,
        'installment_payment_data_option_item_nr_minimum_number_of_installments' => null,
        'installment_payment_data_option_item_nr_number_of_installments' => null,
        'installment_payment_data_option_item_nr_subsequent_installment_amount' => null,
        'installment_payment_data_option_item_nr_total_amount_due' => null,
        'installment_payment_data_payment_options' => null,
        'installments_value' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'installment_payment_data_installment_type' => false,
		'installment_payment_data_option_item_nr_annual_percentage_rate' => false,
		'installment_payment_data_option_item_nr_first_installment_amount' => false,
		'installment_payment_data_option_item_nr_installment_fee' => false,
		'installment_payment_data_option_item_nr_interest_rate' => false,
		'installment_payment_data_option_item_nr_maximum_number_of_installments' => false,
		'installment_payment_data_option_item_nr_minimum_number_of_installments' => false,
		'installment_payment_data_option_item_nr_number_of_installments' => false,
		'installment_payment_data_option_item_nr_subsequent_installment_amount' => false,
		'installment_payment_data_option_item_nr_total_amount_due' => false,
		'installment_payment_data_payment_options' => false,
		'installments_value' => false
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
        'installment_payment_data_installment_type' => 'installmentPaymentData.installmentType',
        'installment_payment_data_option_item_nr_annual_percentage_rate' => 'installmentPaymentData.option[itemNr].annualPercentageRate',
        'installment_payment_data_option_item_nr_first_installment_amount' => 'installmentPaymentData.option[itemNr].firstInstallmentAmount',
        'installment_payment_data_option_item_nr_installment_fee' => 'installmentPaymentData.option[itemNr].installmentFee',
        'installment_payment_data_option_item_nr_interest_rate' => 'installmentPaymentData.option[itemNr].interestRate',
        'installment_payment_data_option_item_nr_maximum_number_of_installments' => 'installmentPaymentData.option[itemNr].maximumNumberOfInstallments',
        'installment_payment_data_option_item_nr_minimum_number_of_installments' => 'installmentPaymentData.option[itemNr].minimumNumberOfInstallments',
        'installment_payment_data_option_item_nr_number_of_installments' => 'installmentPaymentData.option[itemNr].numberOfInstallments',
        'installment_payment_data_option_item_nr_subsequent_installment_amount' => 'installmentPaymentData.option[itemNr].subsequentInstallmentAmount',
        'installment_payment_data_option_item_nr_total_amount_due' => 'installmentPaymentData.option[itemNr].totalAmountDue',
        'installment_payment_data_payment_options' => 'installmentPaymentData.paymentOptions',
        'installments_value' => 'installments.value'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'installment_payment_data_installment_type' => 'setInstallmentPaymentDataInstallmentType',
        'installment_payment_data_option_item_nr_annual_percentage_rate' => 'setInstallmentPaymentDataOptionItemNrAnnualPercentageRate',
        'installment_payment_data_option_item_nr_first_installment_amount' => 'setInstallmentPaymentDataOptionItemNrFirstInstallmentAmount',
        'installment_payment_data_option_item_nr_installment_fee' => 'setInstallmentPaymentDataOptionItemNrInstallmentFee',
        'installment_payment_data_option_item_nr_interest_rate' => 'setInstallmentPaymentDataOptionItemNrInterestRate',
        'installment_payment_data_option_item_nr_maximum_number_of_installments' => 'setInstallmentPaymentDataOptionItemNrMaximumNumberOfInstallments',
        'installment_payment_data_option_item_nr_minimum_number_of_installments' => 'setInstallmentPaymentDataOptionItemNrMinimumNumberOfInstallments',
        'installment_payment_data_option_item_nr_number_of_installments' => 'setInstallmentPaymentDataOptionItemNrNumberOfInstallments',
        'installment_payment_data_option_item_nr_subsequent_installment_amount' => 'setInstallmentPaymentDataOptionItemNrSubsequentInstallmentAmount',
        'installment_payment_data_option_item_nr_total_amount_due' => 'setInstallmentPaymentDataOptionItemNrTotalAmountDue',
        'installment_payment_data_payment_options' => 'setInstallmentPaymentDataPaymentOptions',
        'installments_value' => 'setInstallmentsValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'installment_payment_data_installment_type' => 'getInstallmentPaymentDataInstallmentType',
        'installment_payment_data_option_item_nr_annual_percentage_rate' => 'getInstallmentPaymentDataOptionItemNrAnnualPercentageRate',
        'installment_payment_data_option_item_nr_first_installment_amount' => 'getInstallmentPaymentDataOptionItemNrFirstInstallmentAmount',
        'installment_payment_data_option_item_nr_installment_fee' => 'getInstallmentPaymentDataOptionItemNrInstallmentFee',
        'installment_payment_data_option_item_nr_interest_rate' => 'getInstallmentPaymentDataOptionItemNrInterestRate',
        'installment_payment_data_option_item_nr_maximum_number_of_installments' => 'getInstallmentPaymentDataOptionItemNrMaximumNumberOfInstallments',
        'installment_payment_data_option_item_nr_minimum_number_of_installments' => 'getInstallmentPaymentDataOptionItemNrMinimumNumberOfInstallments',
        'installment_payment_data_option_item_nr_number_of_installments' => 'getInstallmentPaymentDataOptionItemNrNumberOfInstallments',
        'installment_payment_data_option_item_nr_subsequent_installment_amount' => 'getInstallmentPaymentDataOptionItemNrSubsequentInstallmentAmount',
        'installment_payment_data_option_item_nr_total_amount_due' => 'getInstallmentPaymentDataOptionItemNrTotalAmountDue',
        'installment_payment_data_payment_options' => 'getInstallmentPaymentDataPaymentOptions',
        'installments_value' => 'getInstallmentsValue'
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
        $this->setIfExists('installment_payment_data_installment_type', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_annual_percentage_rate', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_first_installment_amount', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_installment_fee', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_interest_rate', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_maximum_number_of_installments', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_minimum_number_of_installments', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_number_of_installments', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_subsequent_installment_amount', $data ?? [], null);
        $this->setIfExists('installment_payment_data_option_item_nr_total_amount_due', $data ?? [], null);
        $this->setIfExists('installment_payment_data_payment_options', $data ?? [], null);
        $this->setIfExists('installments_value', $data ?? [], null);
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
     * Gets installment_payment_data_installment_type
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataInstallmentType()
    {
        return $this->container['installment_payment_data_installment_type'];
    }

    /**
     * Sets installment_payment_data_installment_type
     *
     * @param string|null $installment_payment_data_installment_type Type of installment. The value of `installmentType` should be **IssuerFinanced**.
     *
     * @return self
     */
    public function setInstallmentPaymentDataInstallmentType($installment_payment_data_installment_type)
    {
        if (is_null($installment_payment_data_installment_type)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_installment_type cannot be null');
        }
        $this->container['installment_payment_data_installment_type'] = $installment_payment_data_installment_type;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_annual_percentage_rate
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrAnnualPercentageRate()
    {
        return $this->container['installment_payment_data_option_item_nr_annual_percentage_rate'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_annual_percentage_rate
     *
     * @param string|null $installment_payment_data_option_item_nr_annual_percentage_rate Annual interest rate.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrAnnualPercentageRate($installment_payment_data_option_item_nr_annual_percentage_rate)
    {
        if (is_null($installment_payment_data_option_item_nr_annual_percentage_rate)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_annual_percentage_rate cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_annual_percentage_rate'] = $installment_payment_data_option_item_nr_annual_percentage_rate;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_first_installment_amount
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrFirstInstallmentAmount()
    {
        return $this->container['installment_payment_data_option_item_nr_first_installment_amount'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_first_installment_amount
     *
     * @param string|null $installment_payment_data_option_item_nr_first_installment_amount First Installment Amount in minor units.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrFirstInstallmentAmount($installment_payment_data_option_item_nr_first_installment_amount)
    {
        if (is_null($installment_payment_data_option_item_nr_first_installment_amount)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_first_installment_amount cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_first_installment_amount'] = $installment_payment_data_option_item_nr_first_installment_amount;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_installment_fee
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrInstallmentFee()
    {
        return $this->container['installment_payment_data_option_item_nr_installment_fee'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_installment_fee
     *
     * @param string|null $installment_payment_data_option_item_nr_installment_fee Installment fee amount in minor units.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrInstallmentFee($installment_payment_data_option_item_nr_installment_fee)
    {
        if (is_null($installment_payment_data_option_item_nr_installment_fee)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_installment_fee cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_installment_fee'] = $installment_payment_data_option_item_nr_installment_fee;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_interest_rate
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrInterestRate()
    {
        return $this->container['installment_payment_data_option_item_nr_interest_rate'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_interest_rate
     *
     * @param string|null $installment_payment_data_option_item_nr_interest_rate Interest rate for the installment period.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrInterestRate($installment_payment_data_option_item_nr_interest_rate)
    {
        if (is_null($installment_payment_data_option_item_nr_interest_rate)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_interest_rate cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_interest_rate'] = $installment_payment_data_option_item_nr_interest_rate;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_maximum_number_of_installments
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrMaximumNumberOfInstallments()
    {
        return $this->container['installment_payment_data_option_item_nr_maximum_number_of_installments'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_maximum_number_of_installments
     *
     * @param string|null $installment_payment_data_option_item_nr_maximum_number_of_installments Maximum number of installments possible for this payment.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrMaximumNumberOfInstallments($installment_payment_data_option_item_nr_maximum_number_of_installments)
    {
        if (is_null($installment_payment_data_option_item_nr_maximum_number_of_installments)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_maximum_number_of_installments cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_maximum_number_of_installments'] = $installment_payment_data_option_item_nr_maximum_number_of_installments;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_minimum_number_of_installments
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrMinimumNumberOfInstallments()
    {
        return $this->container['installment_payment_data_option_item_nr_minimum_number_of_installments'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_minimum_number_of_installments
     *
     * @param string|null $installment_payment_data_option_item_nr_minimum_number_of_installments Minimum number of installments possible for this payment.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrMinimumNumberOfInstallments($installment_payment_data_option_item_nr_minimum_number_of_installments)
    {
        if (is_null($installment_payment_data_option_item_nr_minimum_number_of_installments)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_minimum_number_of_installments cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_minimum_number_of_installments'] = $installment_payment_data_option_item_nr_minimum_number_of_installments;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_number_of_installments
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrNumberOfInstallments()
    {
        return $this->container['installment_payment_data_option_item_nr_number_of_installments'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_number_of_installments
     *
     * @param string|null $installment_payment_data_option_item_nr_number_of_installments Total number of installments possible for this payment.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrNumberOfInstallments($installment_payment_data_option_item_nr_number_of_installments)
    {
        if (is_null($installment_payment_data_option_item_nr_number_of_installments)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_number_of_installments cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_number_of_installments'] = $installment_payment_data_option_item_nr_number_of_installments;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_subsequent_installment_amount
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrSubsequentInstallmentAmount()
    {
        return $this->container['installment_payment_data_option_item_nr_subsequent_installment_amount'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_subsequent_installment_amount
     *
     * @param string|null $installment_payment_data_option_item_nr_subsequent_installment_amount Subsequent Installment Amount in minor units.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrSubsequentInstallmentAmount($installment_payment_data_option_item_nr_subsequent_installment_amount)
    {
        if (is_null($installment_payment_data_option_item_nr_subsequent_installment_amount)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_subsequent_installment_amount cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_subsequent_installment_amount'] = $installment_payment_data_option_item_nr_subsequent_installment_amount;

        return $this;
    }

    /**
     * Gets installment_payment_data_option_item_nr_total_amount_due
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataOptionItemNrTotalAmountDue()
    {
        return $this->container['installment_payment_data_option_item_nr_total_amount_due'];
    }

    /**
     * Sets installment_payment_data_option_item_nr_total_amount_due
     *
     * @param string|null $installment_payment_data_option_item_nr_total_amount_due Total amount in minor units.
     *
     * @return self
     */
    public function setInstallmentPaymentDataOptionItemNrTotalAmountDue($installment_payment_data_option_item_nr_total_amount_due)
    {
        if (is_null($installment_payment_data_option_item_nr_total_amount_due)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_option_item_nr_total_amount_due cannot be null');
        }
        $this->container['installment_payment_data_option_item_nr_total_amount_due'] = $installment_payment_data_option_item_nr_total_amount_due;

        return $this;
    }

    /**
     * Gets installment_payment_data_payment_options
     *
     * @return string|null
     */
    public function getInstallmentPaymentDataPaymentOptions()
    {
        return $this->container['installment_payment_data_payment_options'];
    }

    /**
     * Sets installment_payment_data_payment_options
     *
     * @param string|null $installment_payment_data_payment_options Possible values: * PayInInstallmentsOnly * PayInFullOnly * PayInFullOrInstallments
     *
     * @return self
     */
    public function setInstallmentPaymentDataPaymentOptions($installment_payment_data_payment_options)
    {
        if (is_null($installment_payment_data_payment_options)) {
            throw new \InvalidArgumentException('non-nullable installment_payment_data_payment_options cannot be null');
        }
        $this->container['installment_payment_data_payment_options'] = $installment_payment_data_payment_options;

        return $this;
    }

    /**
     * Gets installments_value
     *
     * @return string|null
     */
    public function getInstallmentsValue()
    {
        return $this->container['installments_value'];
    }

    /**
     * Sets installments_value
     *
     * @param string|null $installments_value The number of installments that the payment amount should be charged with.  Example: 5 > Only relevant for card payments in countries that support installments.
     *
     * @return self
     */
    public function setInstallmentsValue($installments_value)
    {
        if (is_null($installments_value)) {
            throw new \InvalidArgumentException('non-nullable installments_value cannot be null');
        }
        $this->container['installments_value'] = $installments_value;

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
