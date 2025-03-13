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
 * AdditionalDataLevel23 Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataLevel23 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataLevel23';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'enhancedSchemeDataCustomerReference' => 'string',
        'enhancedSchemeDataDestinationCountryCode' => 'string',
        'enhancedSchemeDataDestinationPostalCode' => 'string',
        'enhancedSchemeDataDestinationStateProvinceCode' => 'string',
        'enhancedSchemeDataDutyAmount' => 'string',
        'enhancedSchemeDataFreightAmount' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrDescription' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => 'string',
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => 'string',
        'enhancedSchemeDataOrderDate' => 'string',
        'enhancedSchemeDataShipFromPostalCode' => 'string',
        'enhancedSchemeDataTotalTaxAmount' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'enhancedSchemeDataCustomerReference' => null,
        'enhancedSchemeDataDestinationCountryCode' => null,
        'enhancedSchemeDataDestinationPostalCode' => null,
        'enhancedSchemeDataDestinationStateProvinceCode' => null,
        'enhancedSchemeDataDutyAmount' => null,
        'enhancedSchemeDataFreightAmount' => null,
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => null,
        'enhancedSchemeDataItemDetailLineItemNrDescription' => null,
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => null,
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => null,
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => null,
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => null,
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => null,
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => null,
        'enhancedSchemeDataOrderDate' => null,
        'enhancedSchemeDataShipFromPostalCode' => null,
        'enhancedSchemeDataTotalTaxAmount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'enhancedSchemeDataCustomerReference' => false,
        'enhancedSchemeDataDestinationCountryCode' => false,
        'enhancedSchemeDataDestinationPostalCode' => false,
        'enhancedSchemeDataDestinationStateProvinceCode' => false,
        'enhancedSchemeDataDutyAmount' => false,
        'enhancedSchemeDataFreightAmount' => false,
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => false,
        'enhancedSchemeDataItemDetailLineItemNrDescription' => false,
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => false,
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => false,
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => false,
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => false,
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => false,
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => false,
        'enhancedSchemeDataOrderDate' => false,
        'enhancedSchemeDataShipFromPostalCode' => false,
        'enhancedSchemeDataTotalTaxAmount' => false
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
        'enhancedSchemeDataCustomerReference' => 'enhancedSchemeData.customerReference',
        'enhancedSchemeDataDestinationCountryCode' => 'enhancedSchemeData.destinationCountryCode',
        'enhancedSchemeDataDestinationPostalCode' => 'enhancedSchemeData.destinationPostalCode',
        'enhancedSchemeDataDestinationStateProvinceCode' => 'enhancedSchemeData.destinationStateProvinceCode',
        'enhancedSchemeDataDutyAmount' => 'enhancedSchemeData.dutyAmount',
        'enhancedSchemeDataFreightAmount' => 'enhancedSchemeData.freightAmount',
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => 'enhancedSchemeData.itemDetailLine[itemNr].commodityCode',
        'enhancedSchemeDataItemDetailLineItemNrDescription' => 'enhancedSchemeData.itemDetailLine[itemNr].description',
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => 'enhancedSchemeData.itemDetailLine[itemNr].discountAmount',
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => 'enhancedSchemeData.itemDetailLine[itemNr].productCode',
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => 'enhancedSchemeData.itemDetailLine[itemNr].quantity',
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => 'enhancedSchemeData.itemDetailLine[itemNr].totalAmount',
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => 'enhancedSchemeData.itemDetailLine[itemNr].unitOfMeasure',
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => 'enhancedSchemeData.itemDetailLine[itemNr].unitPrice',
        'enhancedSchemeDataOrderDate' => 'enhancedSchemeData.orderDate',
        'enhancedSchemeDataShipFromPostalCode' => 'enhancedSchemeData.shipFromPostalCode',
        'enhancedSchemeDataTotalTaxAmount' => 'enhancedSchemeData.totalTaxAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enhancedSchemeDataCustomerReference' => 'setEnhancedSchemeDataCustomerReference',
        'enhancedSchemeDataDestinationCountryCode' => 'setEnhancedSchemeDataDestinationCountryCode',
        'enhancedSchemeDataDestinationPostalCode' => 'setEnhancedSchemeDataDestinationPostalCode',
        'enhancedSchemeDataDestinationStateProvinceCode' => 'setEnhancedSchemeDataDestinationStateProvinceCode',
        'enhancedSchemeDataDutyAmount' => 'setEnhancedSchemeDataDutyAmount',
        'enhancedSchemeDataFreightAmount' => 'setEnhancedSchemeDataFreightAmount',
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => 'setEnhancedSchemeDataItemDetailLineItemNrCommodityCode',
        'enhancedSchemeDataItemDetailLineItemNrDescription' => 'setEnhancedSchemeDataItemDetailLineItemNrDescription',
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => 'setEnhancedSchemeDataItemDetailLineItemNrDiscountAmount',
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => 'setEnhancedSchemeDataItemDetailLineItemNrProductCode',
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => 'setEnhancedSchemeDataItemDetailLineItemNrQuantity',
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => 'setEnhancedSchemeDataItemDetailLineItemNrTotalAmount',
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => 'setEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure',
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => 'setEnhancedSchemeDataItemDetailLineItemNrUnitPrice',
        'enhancedSchemeDataOrderDate' => 'setEnhancedSchemeDataOrderDate',
        'enhancedSchemeDataShipFromPostalCode' => 'setEnhancedSchemeDataShipFromPostalCode',
        'enhancedSchemeDataTotalTaxAmount' => 'setEnhancedSchemeDataTotalTaxAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enhancedSchemeDataCustomerReference' => 'getEnhancedSchemeDataCustomerReference',
        'enhancedSchemeDataDestinationCountryCode' => 'getEnhancedSchemeDataDestinationCountryCode',
        'enhancedSchemeDataDestinationPostalCode' => 'getEnhancedSchemeDataDestinationPostalCode',
        'enhancedSchemeDataDestinationStateProvinceCode' => 'getEnhancedSchemeDataDestinationStateProvinceCode',
        'enhancedSchemeDataDutyAmount' => 'getEnhancedSchemeDataDutyAmount',
        'enhancedSchemeDataFreightAmount' => 'getEnhancedSchemeDataFreightAmount',
        'enhancedSchemeDataItemDetailLineItemNrCommodityCode' => 'getEnhancedSchemeDataItemDetailLineItemNrCommodityCode',
        'enhancedSchemeDataItemDetailLineItemNrDescription' => 'getEnhancedSchemeDataItemDetailLineItemNrDescription',
        'enhancedSchemeDataItemDetailLineItemNrDiscountAmount' => 'getEnhancedSchemeDataItemDetailLineItemNrDiscountAmount',
        'enhancedSchemeDataItemDetailLineItemNrProductCode' => 'getEnhancedSchemeDataItemDetailLineItemNrProductCode',
        'enhancedSchemeDataItemDetailLineItemNrQuantity' => 'getEnhancedSchemeDataItemDetailLineItemNrQuantity',
        'enhancedSchemeDataItemDetailLineItemNrTotalAmount' => 'getEnhancedSchemeDataItemDetailLineItemNrTotalAmount',
        'enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure' => 'getEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure',
        'enhancedSchemeDataItemDetailLineItemNrUnitPrice' => 'getEnhancedSchemeDataItemDetailLineItemNrUnitPrice',
        'enhancedSchemeDataOrderDate' => 'getEnhancedSchemeDataOrderDate',
        'enhancedSchemeDataShipFromPostalCode' => 'getEnhancedSchemeDataShipFromPostalCode',
        'enhancedSchemeDataTotalTaxAmount' => 'getEnhancedSchemeDataTotalTaxAmount'
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
    public function __construct(?array $data = null)
    {
        $this->setIfExists('enhancedSchemeDataCustomerReference', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataDestinationCountryCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataDestinationPostalCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataDestinationStateProvinceCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataDutyAmount', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataFreightAmount', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrCommodityCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrDescription', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrDiscountAmount', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrProductCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrQuantity', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrTotalAmount', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataItemDetailLineItemNrUnitPrice', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataOrderDate', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataShipFromPostalCode', $data ?? [], null);
        $this->setIfExists('enhancedSchemeDataTotalTaxAmount', $data ?? [], null);
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
     * Gets enhancedSchemeDataCustomerReference
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataCustomerReference()
    {
        return $this->container['enhancedSchemeDataCustomerReference'];
    }

    /**
     * Sets enhancedSchemeDataCustomerReference
     *
     * @param string|null $enhancedSchemeDataCustomerReference The reference number to identify the customer and their order.  * Encoding: ASCII * Max length: 25 characters * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataCustomerReference($enhancedSchemeDataCustomerReference)
    {
        $this->container['enhancedSchemeDataCustomerReference'] = $enhancedSchemeDataCustomerReference;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataDestinationCountryCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationCountryCode()
    {
        return $this->container['enhancedSchemeDataDestinationCountryCode'];
    }

    /**
     * Sets enhancedSchemeDataDestinationCountryCode
     *
     * @param string|null $enhancedSchemeDataDestinationCountryCode The three-letter [ISO 3166-1 alpha-3 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3) for the destination address. * Encoding: ASCII * Fixed length: 3 characters
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationCountryCode($enhancedSchemeDataDestinationCountryCode)
    {
        $this->container['enhancedSchemeDataDestinationCountryCode'] = $enhancedSchemeDataDestinationCountryCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataDestinationPostalCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationPostalCode()
    {
        return $this->container['enhancedSchemeDataDestinationPostalCode'];
    }

    /**
     * Sets enhancedSchemeDataDestinationPostalCode
     *
     * @param string|null $enhancedSchemeDataDestinationPostalCode The postal code of the destination address. * Encoding: ASCII * Max length: 10 characters * Must not start with a space. * For the US, it must be in five or nine digits format. For example, 10001 or 10001-0000. * For Canada, it must be in 6 digits format. For example, M4B 1G5.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationPostalCode($enhancedSchemeDataDestinationPostalCode)
    {
        $this->container['enhancedSchemeDataDestinationPostalCode'] = $enhancedSchemeDataDestinationPostalCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataDestinationStateProvinceCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationStateProvinceCode()
    {
        return $this->container['enhancedSchemeDataDestinationStateProvinceCode'];
    }

    /**
     * Sets enhancedSchemeDataDestinationStateProvinceCode
     *
     * @param string|null $enhancedSchemeDataDestinationStateProvinceCode The state or province code of the destination address. * Encoding: ASCII * Max length: 3 characters * Must not start with a space.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationStateProvinceCode($enhancedSchemeDataDestinationStateProvinceCode)
    {
        $this->container['enhancedSchemeDataDestinationStateProvinceCode'] = $enhancedSchemeDataDestinationStateProvinceCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataDutyAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDutyAmount()
    {
        return $this->container['enhancedSchemeDataDutyAmount'];
    }

    /**
     * Sets enhancedSchemeDataDutyAmount
     *
     * @param string|null $enhancedSchemeDataDutyAmount The duty tax amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * For example, 2000 means USD 20.00. * Encoding: Numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setEnhancedSchemeDataDutyAmount($enhancedSchemeDataDutyAmount)
    {
        $this->container['enhancedSchemeDataDutyAmount'] = $enhancedSchemeDataDutyAmount;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataFreightAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataFreightAmount()
    {
        return $this->container['enhancedSchemeDataFreightAmount'];
    }

    /**
     * Sets enhancedSchemeDataFreightAmount
     *
     * @param string|null $enhancedSchemeDataFreightAmount The shipping amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * For example, 2000 means USD 20.00. * Encoding: Numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setEnhancedSchemeDataFreightAmount($enhancedSchemeDataFreightAmount)
    {
        $this->container['enhancedSchemeDataFreightAmount'] = $enhancedSchemeDataFreightAmount;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrCommodityCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrCommodityCode()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrCommodityCode'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrCommodityCode
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrCommodityCode The code that identifies the item in a standardized commodity coding scheme. There are different commodity coding schemes: * [UNSPSC commodity codes](https://www.unspsc.org/) * [HS commodity codes](https://www.wcoomd.org/en/topics/nomenclature/overview.aspx) * [NAICS commodity codes](https://www.census.gov/naics/) * [NAPCS commodity codes](https://www.census.gov/naics/napcs/)   * Encoding: ASCII * Max length: 12 characters * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrCommodityCode($enhancedSchemeDataItemDetailLineItemNrCommodityCode)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrCommodityCode'] = $enhancedSchemeDataItemDetailLineItemNrCommodityCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrDescription
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrDescription()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrDescription'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrDescription
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrDescription A description of the item. * Encoding: ASCII * Max length: 26 characters * Must not be a single character. * Must not be blank. * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrDescription($enhancedSchemeDataItemDetailLineItemNrDescription)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrDescription'] = $enhancedSchemeDataItemDetailLineItemNrDescription;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrDiscountAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrDiscountAmount()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrDiscountAmount'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrDiscountAmount
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrDiscountAmount The discount amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * For example, 2000 means USD 20.00. * Encoding: Numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrDiscountAmount($enhancedSchemeDataItemDetailLineItemNrDiscountAmount)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrDiscountAmount'] = $enhancedSchemeDataItemDetailLineItemNrDiscountAmount;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrProductCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrProductCode()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrProductCode'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrProductCode
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrProductCode The product code. Must be a unique product code associated with the item or service. This can be your unique code for the item, or the manufacturer's product code.  * Encoding: ASCII. * Max length: 12 characters * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrProductCode($enhancedSchemeDataItemDetailLineItemNrProductCode)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrProductCode'] = $enhancedSchemeDataItemDetailLineItemNrProductCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrQuantity
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrQuantity()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrQuantity'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrQuantity
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrQuantity The number of items. Must be an integer greater than zero. * Encoding: Numeric * Max length: 12 characters * Must not start with a space or be all spaces.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrQuantity($enhancedSchemeDataItemDetailLineItemNrQuantity)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrQuantity'] = $enhancedSchemeDataItemDetailLineItemNrQuantity;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrTotalAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrTotalAmount()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrTotalAmount'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrTotalAmount
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrTotalAmount The total amount for the line item, in [minor units](https://docs.adyen.com/development-resources/currency-codes). See [Amount requirements for level 2/3 ESD](https://docs.adyen.com//payment-methods/cards/enhanced-scheme-data/l2-l3#amount-requirements) to learn more about how to calculate the line item total. * For example, 2000 means USD 20.00. * Max length: 12 characters * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrTotalAmount($enhancedSchemeDataItemDetailLineItemNrTotalAmount)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrTotalAmount'] = $enhancedSchemeDataItemDetailLineItemNrTotalAmount;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure The unit of measurement for an item. * Encoding: ASCII * Max length: 3 characters * Must not start with a space or be all spaces. * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure($enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure'] = $enhancedSchemeDataItemDetailLineItemNrUnitOfMeasure;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataItemDetailLineItemNrUnitPrice
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrUnitPrice()
    {
        return $this->container['enhancedSchemeDataItemDetailLineItemNrUnitPrice'];
    }

    /**
     * Sets enhancedSchemeDataItemDetailLineItemNrUnitPrice
     *
     * @param string|null $enhancedSchemeDataItemDetailLineItemNrUnitPrice The unit price in [minor units](https://docs.adyen.com/development-resources/currency-codes). * For example, 2000 means USD 20.00. * Encoding: Numeric * Max length: 12 characters * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrUnitPrice($enhancedSchemeDataItemDetailLineItemNrUnitPrice)
    {
        $this->container['enhancedSchemeDataItemDetailLineItemNrUnitPrice'] = $enhancedSchemeDataItemDetailLineItemNrUnitPrice;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataOrderDate
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataOrderDate()
    {
        return $this->container['enhancedSchemeDataOrderDate'];
    }

    /**
     * Sets enhancedSchemeDataOrderDate
     *
     * @param string|null $enhancedSchemeDataOrderDate The order date. * Format: `ddMMyy` * Encoding: ASCII * Max length: 6 characters
     *
     * @return self
     */
    public function setEnhancedSchemeDataOrderDate($enhancedSchemeDataOrderDate)
    {
        $this->container['enhancedSchemeDataOrderDate'] = $enhancedSchemeDataOrderDate;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataShipFromPostalCode
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataShipFromPostalCode()
    {
        return $this->container['enhancedSchemeDataShipFromPostalCode'];
    }

    /**
     * Sets enhancedSchemeDataShipFromPostalCode
     *
     * @param string|null $enhancedSchemeDataShipFromPostalCode The postal code of the address where the item is shipped from. * Encoding: ASCII * Max length: 10 characters * Must not start with a space or be all spaces. * Must not be all zeros.For the US, it must be in five or nine digits format. For example, 10001 or 10001-0000. * For Canada, it must be in 6 digits format. For example, M4B 1G5.
     *
     * @return self
     */
    public function setEnhancedSchemeDataShipFromPostalCode($enhancedSchemeDataShipFromPostalCode)
    {
        $this->container['enhancedSchemeDataShipFromPostalCode'] = $enhancedSchemeDataShipFromPostalCode;

        return $this;
    }

    /**
     * Gets enhancedSchemeDataTotalTaxAmount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTotalTaxAmount()
    {
        return $this->container['enhancedSchemeDataTotalTaxAmount'];
    }

    /**
     * Sets enhancedSchemeDataTotalTaxAmount
     *
     * @param string|null $enhancedSchemeDataTotalTaxAmount The amount of state or provincial [tax included in the total transaction amount](https://docs.adyen.com/payment-methods/cards/enhanced-scheme-data/l2-l3#requirements-to-send-level-2-3-esd), in [minor units](https://docs.adyen.com/development-resources/currency-codes).  * For example, 2000 means USD 20.00. * Encoding: Numeric  * Max length: 12 characters * Must not be all zeros.
     *
     * @return self
     */
    public function setEnhancedSchemeDataTotalTaxAmount($enhancedSchemeDataTotalTaxAmount)
    {
        $this->container['enhancedSchemeDataTotalTaxAmount'] = $enhancedSchemeDataTotalTaxAmount;

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
