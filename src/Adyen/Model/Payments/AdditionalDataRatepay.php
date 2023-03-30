<?php

/**
 * Adyen Payment API
 *
 * A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.  To learn more about the API, visit [Classic integration](https://docs.adyen.com/classic-integration).  ## Authentication You need an [API credential](https://docs.adyen.com/development-resources/api-credentials) to authenticate to the API.  If using an API key, add an `X-API-Key` header with the API key as the value, for example:   ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ```  Alternatively, you can use the username and password to connect to the API using basic authentication, for example:  ``` curl -U \"ws@Company.YOUR_COMPANY_ACCOUNT\":\"YOUR_BASIC_AUTHENTICATION_PASSWORD\" \\ -H \"Content-Type: application/json\" \\ ... ```  ## Versioning Payments API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://pal-test.adyen.com/pal/servlet/Payment/v68/authorise ```  ## Going live  To authenticate to the live endpoints, you need an [API credential](https://docs.adyen.com/development-resources/api-credentials) from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account: ```  https://{PREFIX}-pal-live.adyenpayments.com/pal/servlet/Payment/v68/authorise ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.
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
 * AdditionalDataRatepay Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataRatepay implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataRatepay';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'ratepay_installment_amount' => 'string',
        'ratepay_interest_rate' => 'string',
        'ratepay_last_installment_amount' => 'string',
        'ratepay_payment_firstday' => 'string',
        'ratepaydata_delivery_date' => 'string',
        'ratepaydata_due_date' => 'string',
        'ratepaydata_invoice_date' => 'string',
        'ratepaydata_invoice_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'ratepay_installment_amount' => null,
        'ratepay_interest_rate' => null,
        'ratepay_last_installment_amount' => null,
        'ratepay_payment_firstday' => null,
        'ratepaydata_delivery_date' => null,
        'ratepaydata_due_date' => null,
        'ratepaydata_invoice_date' => null,
        'ratepaydata_invoice_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'ratepay_installment_amount' => false,
        'ratepay_interest_rate' => false,
        'ratepay_last_installment_amount' => false,
        'ratepay_payment_firstday' => false,
        'ratepaydata_delivery_date' => false,
        'ratepaydata_due_date' => false,
        'ratepaydata_invoice_date' => false,
        'ratepaydata_invoice_id' => false
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
        'ratepay_installment_amount' => 'ratepay.installmentAmount',
        'ratepay_interest_rate' => 'ratepay.interestRate',
        'ratepay_last_installment_amount' => 'ratepay.lastInstallmentAmount',
        'ratepay_payment_firstday' => 'ratepay.paymentFirstday',
        'ratepaydata_delivery_date' => 'ratepaydata.deliveryDate',
        'ratepaydata_due_date' => 'ratepaydata.dueDate',
        'ratepaydata_invoice_date' => 'ratepaydata.invoiceDate',
        'ratepaydata_invoice_id' => 'ratepaydata.invoiceId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ratepay_installment_amount' => 'setRatepayInstallmentAmount',
        'ratepay_interest_rate' => 'setRatepayInterestRate',
        'ratepay_last_installment_amount' => 'setRatepayLastInstallmentAmount',
        'ratepay_payment_firstday' => 'setRatepayPaymentFirstday',
        'ratepaydata_delivery_date' => 'setRatepaydataDeliveryDate',
        'ratepaydata_due_date' => 'setRatepaydataDueDate',
        'ratepaydata_invoice_date' => 'setRatepaydataInvoiceDate',
        'ratepaydata_invoice_id' => 'setRatepaydataInvoiceId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ratepay_installment_amount' => 'getRatepayInstallmentAmount',
        'ratepay_interest_rate' => 'getRatepayInterestRate',
        'ratepay_last_installment_amount' => 'getRatepayLastInstallmentAmount',
        'ratepay_payment_firstday' => 'getRatepayPaymentFirstday',
        'ratepaydata_delivery_date' => 'getRatepaydataDeliveryDate',
        'ratepaydata_due_date' => 'getRatepaydataDueDate',
        'ratepaydata_invoice_date' => 'getRatepaydataInvoiceDate',
        'ratepaydata_invoice_id' => 'getRatepaydataInvoiceId'
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
        $this->setIfExists('ratepay_installment_amount', $data ?? [], null);
        $this->setIfExists('ratepay_interest_rate', $data ?? [], null);
        $this->setIfExists('ratepay_last_installment_amount', $data ?? [], null);
        $this->setIfExists('ratepay_payment_firstday', $data ?? [], null);
        $this->setIfExists('ratepaydata_delivery_date', $data ?? [], null);
        $this->setIfExists('ratepaydata_due_date', $data ?? [], null);
        $this->setIfExists('ratepaydata_invoice_date', $data ?? [], null);
        $this->setIfExists('ratepaydata_invoice_id', $data ?? [], null);
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
     * Gets ratepay_installment_amount
     *
     * @return string|null
     */
    public function getRatepayInstallmentAmount()
    {
        return $this->container['ratepay_installment_amount'];
    }

    /**
     * Sets ratepay_installment_amount
     *
     * @param string|null $ratepay_installment_amount Amount the customer has to pay each month.
     *
     * @return self
     */
    public function setRatepayInstallmentAmount($ratepay_installment_amount)
    {
        if (is_null($ratepay_installment_amount)) {
            throw new \InvalidArgumentException('non-nullable ratepay_installment_amount cannot be null');
        }
        $this->container['ratepay_installment_amount'] = $ratepay_installment_amount;

        return $this;
    }

    /**
     * Gets ratepay_interest_rate
     *
     * @return string|null
     */
    public function getRatepayInterestRate()
    {
        return $this->container['ratepay_interest_rate'];
    }

    /**
     * Sets ratepay_interest_rate
     *
     * @param string|null $ratepay_interest_rate Interest rate of this installment.
     *
     * @return self
     */
    public function setRatepayInterestRate($ratepay_interest_rate)
    {
        if (is_null($ratepay_interest_rate)) {
            throw new \InvalidArgumentException('non-nullable ratepay_interest_rate cannot be null');
        }
        $this->container['ratepay_interest_rate'] = $ratepay_interest_rate;

        return $this;
    }

    /**
     * Gets ratepay_last_installment_amount
     *
     * @return string|null
     */
    public function getRatepayLastInstallmentAmount()
    {
        return $this->container['ratepay_last_installment_amount'];
    }

    /**
     * Sets ratepay_last_installment_amount
     *
     * @param string|null $ratepay_last_installment_amount Amount of the last installment.
     *
     * @return self
     */
    public function setRatepayLastInstallmentAmount($ratepay_last_installment_amount)
    {
        if (is_null($ratepay_last_installment_amount)) {
            throw new \InvalidArgumentException('non-nullable ratepay_last_installment_amount cannot be null');
        }
        $this->container['ratepay_last_installment_amount'] = $ratepay_last_installment_amount;

        return $this;
    }

    /**
     * Gets ratepay_payment_firstday
     *
     * @return string|null
     */
    public function getRatepayPaymentFirstday()
    {
        return $this->container['ratepay_payment_firstday'];
    }

    /**
     * Sets ratepay_payment_firstday
     *
     * @param string|null $ratepay_payment_firstday Calendar day of the first payment.
     *
     * @return self
     */
    public function setRatepayPaymentFirstday($ratepay_payment_firstday)
    {
        if (is_null($ratepay_payment_firstday)) {
            throw new \InvalidArgumentException('non-nullable ratepay_payment_firstday cannot be null');
        }
        $this->container['ratepay_payment_firstday'] = $ratepay_payment_firstday;

        return $this;
    }

    /**
     * Gets ratepaydata_delivery_date
     *
     * @return string|null
     */
    public function getRatepaydataDeliveryDate()
    {
        return $this->container['ratepaydata_delivery_date'];
    }

    /**
     * Sets ratepaydata_delivery_date
     *
     * @param string|null $ratepaydata_delivery_date Date the merchant delivered the goods to the customer.
     *
     * @return self
     */
    public function setRatepaydataDeliveryDate($ratepaydata_delivery_date)
    {
        if (is_null($ratepaydata_delivery_date)) {
            throw new \InvalidArgumentException('non-nullable ratepaydata_delivery_date cannot be null');
        }
        $this->container['ratepaydata_delivery_date'] = $ratepaydata_delivery_date;

        return $this;
    }

    /**
     * Gets ratepaydata_due_date
     *
     * @return string|null
     */
    public function getRatepaydataDueDate()
    {
        return $this->container['ratepaydata_due_date'];
    }

    /**
     * Sets ratepaydata_due_date
     *
     * @param string|null $ratepaydata_due_date Date by which the customer must settle the payment.
     *
     * @return self
     */
    public function setRatepaydataDueDate($ratepaydata_due_date)
    {
        if (is_null($ratepaydata_due_date)) {
            throw new \InvalidArgumentException('non-nullable ratepaydata_due_date cannot be null');
        }
        $this->container['ratepaydata_due_date'] = $ratepaydata_due_date;

        return $this;
    }

    /**
     * Gets ratepaydata_invoice_date
     *
     * @return string|null
     */
    public function getRatepaydataInvoiceDate()
    {
        return $this->container['ratepaydata_invoice_date'];
    }

    /**
     * Sets ratepaydata_invoice_date
     *
     * @param string|null $ratepaydata_invoice_date Invoice date, defined by the merchant. If not included, the invoice date is set to the delivery date.
     *
     * @return self
     */
    public function setRatepaydataInvoiceDate($ratepaydata_invoice_date)
    {
        if (is_null($ratepaydata_invoice_date)) {
            throw new \InvalidArgumentException('non-nullable ratepaydata_invoice_date cannot be null');
        }
        $this->container['ratepaydata_invoice_date'] = $ratepaydata_invoice_date;

        return $this;
    }

    /**
     * Gets ratepaydata_invoice_id
     *
     * @return string|null
     */
    public function getRatepaydataInvoiceId()
    {
        return $this->container['ratepaydata_invoice_id'];
    }

    /**
     * Sets ratepaydata_invoice_id
     *
     * @param string|null $ratepaydata_invoice_id Identification name or number for the invoice, defined by the merchant.
     *
     * @return self
     */
    public function setRatepaydataInvoiceId($ratepaydata_invoice_id)
    {
        if (is_null($ratepaydata_invoice_id)) {
            throw new \InvalidArgumentException('non-nullable ratepaydata_invoice_id cannot be null');
        }
        $this->container['ratepaydata_invoice_id'] = $ratepaydata_invoice_id;

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
