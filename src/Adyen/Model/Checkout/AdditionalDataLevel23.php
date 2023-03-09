<?php

/**
 * Adyen Checkout API
 *
 * Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).  This API reference provides information on available endpoints and how to interact with them. To learn more about the API, visit [online payments documentation](https://docs.adyen.com/online-payments).  ## Authentication Each request to Checkout API must be signed with an API key. For this, [get your API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key) from your Customer Area, and set this key to the `X-API-Key` header value, for example:  ``` curl -H \"Content-Type: application/json\" \\ -H \"X-API-Key: YOUR_API_KEY\" \\ ... ``` ## Versioning Checkout API supports [versioning](https://docs.adyen.com/development-resources/versioning) using a version suffix in the endpoint URL. This suffix has the following format: \"vXX\", where XX is the version number.  For example: ``` https://checkout-test.adyen.com/v70/payments ```  ## Going live  To access the live endpoints, you need an API key from your live Customer Area.  The live endpoint URLs contain a prefix which is unique to your company account, for example: ``` https://{PREFIX}-checkout-live.adyenpayments.com/checkout/v70/payments ```  Get your `{PREFIX}` from your live Customer Area under **Developers** > **API URLs** > **Prefix**.  When preparing to do live transactions with Checkout API, follow the [go-live checklist](https://docs.adyen.com/online-payments/go-live-checklist) to make sure you've got all the required configuration in place.  ## Release notes Have a look at the [release notes](https://docs.adyen.com/online-payments/release-notes?integration_type=api&version=70) to find out what changed in this version!
 *
 * The version of the OpenAPI document: 70
 * Contact: developer-experience@adyen.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Adyen\Model\Checkout;

use \ArrayAccess;
use Adyen\Model\Checkout\ObjectSerializer;

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
        'enhanced_scheme_data_customer_reference' => 'string',
        'enhanced_scheme_data_destination_country_code' => 'string',
        'enhanced_scheme_data_destination_postal_code' => 'string',
        'enhanced_scheme_data_destination_state_province_code' => 'string',
        'enhanced_scheme_data_duty_amount' => 'string',
        'enhanced_scheme_data_freight_amount' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_description' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => 'string',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => 'string',
        'enhanced_scheme_data_order_date' => 'string',
        'enhanced_scheme_data_ship_from_postal_code' => 'string',
        'enhanced_scheme_data_total_tax_amount' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'enhanced_scheme_data_customer_reference' => null,
        'enhanced_scheme_data_destination_country_code' => null,
        'enhanced_scheme_data_destination_postal_code' => null,
        'enhanced_scheme_data_destination_state_province_code' => null,
        'enhanced_scheme_data_duty_amount' => null,
        'enhanced_scheme_data_freight_amount' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_description' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => null,
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => null,
        'enhanced_scheme_data_order_date' => null,
        'enhanced_scheme_data_ship_from_postal_code' => null,
        'enhanced_scheme_data_total_tax_amount' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'enhanced_scheme_data_customer_reference' => false,
        'enhanced_scheme_data_destination_country_code' => false,
        'enhanced_scheme_data_destination_postal_code' => false,
        'enhanced_scheme_data_destination_state_province_code' => false,
        'enhanced_scheme_data_duty_amount' => false,
        'enhanced_scheme_data_freight_amount' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_description' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => false,
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => false,
        'enhanced_scheme_data_order_date' => false,
        'enhanced_scheme_data_ship_from_postal_code' => false,
        'enhanced_scheme_data_total_tax_amount' => false
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
        'enhanced_scheme_data_customer_reference' => 'enhancedSchemeData.customerReference',
        'enhanced_scheme_data_destination_country_code' => 'enhancedSchemeData.destinationCountryCode',
        'enhanced_scheme_data_destination_postal_code' => 'enhancedSchemeData.destinationPostalCode',
        'enhanced_scheme_data_destination_state_province_code' => 'enhancedSchemeData.destinationStateProvinceCode',
        'enhanced_scheme_data_duty_amount' => 'enhancedSchemeData.dutyAmount',
        'enhanced_scheme_data_freight_amount' => 'enhancedSchemeData.freightAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => 'enhancedSchemeData.itemDetailLine[itemNr].commodityCode',
        'enhanced_scheme_data_item_detail_line_item_nr_description' => 'enhancedSchemeData.itemDetailLine[itemNr].description',
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => 'enhancedSchemeData.itemDetailLine[itemNr].discountAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => 'enhancedSchemeData.itemDetailLine[itemNr].productCode',
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => 'enhancedSchemeData.itemDetailLine[itemNr].quantity',
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => 'enhancedSchemeData.itemDetailLine[itemNr].totalAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => 'enhancedSchemeData.itemDetailLine[itemNr].unitOfMeasure',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => 'enhancedSchemeData.itemDetailLine[itemNr].unitPrice',
        'enhanced_scheme_data_order_date' => 'enhancedSchemeData.orderDate',
        'enhanced_scheme_data_ship_from_postal_code' => 'enhancedSchemeData.shipFromPostalCode',
        'enhanced_scheme_data_total_tax_amount' => 'enhancedSchemeData.totalTaxAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enhanced_scheme_data_customer_reference' => 'setEnhancedSchemeDataCustomerReference',
        'enhanced_scheme_data_destination_country_code' => 'setEnhancedSchemeDataDestinationCountryCode',
        'enhanced_scheme_data_destination_postal_code' => 'setEnhancedSchemeDataDestinationPostalCode',
        'enhanced_scheme_data_destination_state_province_code' => 'setEnhancedSchemeDataDestinationStateProvinceCode',
        'enhanced_scheme_data_duty_amount' => 'setEnhancedSchemeDataDutyAmount',
        'enhanced_scheme_data_freight_amount' => 'setEnhancedSchemeDataFreightAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => 'setEnhancedSchemeDataItemDetailLineItemNrCommodityCode',
        'enhanced_scheme_data_item_detail_line_item_nr_description' => 'setEnhancedSchemeDataItemDetailLineItemNrDescription',
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => 'setEnhancedSchemeDataItemDetailLineItemNrDiscountAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => 'setEnhancedSchemeDataItemDetailLineItemNrProductCode',
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => 'setEnhancedSchemeDataItemDetailLineItemNrQuantity',
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => 'setEnhancedSchemeDataItemDetailLineItemNrTotalAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => 'setEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => 'setEnhancedSchemeDataItemDetailLineItemNrUnitPrice',
        'enhanced_scheme_data_order_date' => 'setEnhancedSchemeDataOrderDate',
        'enhanced_scheme_data_ship_from_postal_code' => 'setEnhancedSchemeDataShipFromPostalCode',
        'enhanced_scheme_data_total_tax_amount' => 'setEnhancedSchemeDataTotalTaxAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enhanced_scheme_data_customer_reference' => 'getEnhancedSchemeDataCustomerReference',
        'enhanced_scheme_data_destination_country_code' => 'getEnhancedSchemeDataDestinationCountryCode',
        'enhanced_scheme_data_destination_postal_code' => 'getEnhancedSchemeDataDestinationPostalCode',
        'enhanced_scheme_data_destination_state_province_code' => 'getEnhancedSchemeDataDestinationStateProvinceCode',
        'enhanced_scheme_data_duty_amount' => 'getEnhancedSchemeDataDutyAmount',
        'enhanced_scheme_data_freight_amount' => 'getEnhancedSchemeDataFreightAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_commodity_code' => 'getEnhancedSchemeDataItemDetailLineItemNrCommodityCode',
        'enhanced_scheme_data_item_detail_line_item_nr_description' => 'getEnhancedSchemeDataItemDetailLineItemNrDescription',
        'enhanced_scheme_data_item_detail_line_item_nr_discount_amount' => 'getEnhancedSchemeDataItemDetailLineItemNrDiscountAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_product_code' => 'getEnhancedSchemeDataItemDetailLineItemNrProductCode',
        'enhanced_scheme_data_item_detail_line_item_nr_quantity' => 'getEnhancedSchemeDataItemDetailLineItemNrQuantity',
        'enhanced_scheme_data_item_detail_line_item_nr_total_amount' => 'getEnhancedSchemeDataItemDetailLineItemNrTotalAmount',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure' => 'getEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure',
        'enhanced_scheme_data_item_detail_line_item_nr_unit_price' => 'getEnhancedSchemeDataItemDetailLineItemNrUnitPrice',
        'enhanced_scheme_data_order_date' => 'getEnhancedSchemeDataOrderDate',
        'enhanced_scheme_data_ship_from_postal_code' => 'getEnhancedSchemeDataShipFromPostalCode',
        'enhanced_scheme_data_total_tax_amount' => 'getEnhancedSchemeDataTotalTaxAmount'
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
        $this->setIfExists('enhanced_scheme_data_customer_reference', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_destination_country_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_destination_postal_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_destination_state_province_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_duty_amount', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_freight_amount', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_commodity_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_description', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_discount_amount', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_product_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_quantity', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_total_amount', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_item_detail_line_item_nr_unit_price', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_order_date', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_ship_from_postal_code', $data ?? [], null);
        $this->setIfExists('enhanced_scheme_data_total_tax_amount', $data ?? [], null);
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
     * Gets enhanced_scheme_data_customer_reference
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataCustomerReference()
    {
        return $this->container['enhanced_scheme_data_customer_reference'];
    }

    /**
     * Sets enhanced_scheme_data_customer_reference
     *
     * @param string|null $enhanced_scheme_data_customer_reference Customer code, if supplied by a customer.  Encoding: ASCII.  Max length: 25 characters.  > Required for Level 2 and Level 3 data.
     *
     * @return self
     */
    public function setEnhancedSchemeDataCustomerReference($enhanced_scheme_data_customer_reference)
    {
        if (is_null($enhanced_scheme_data_customer_reference)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_customer_reference cannot be null');
        }
        $this->container['enhanced_scheme_data_customer_reference'] = $enhanced_scheme_data_customer_reference;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_destination_country_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationCountryCode()
    {
        return $this->container['enhanced_scheme_data_destination_country_code'];
    }

    /**
     * Sets enhanced_scheme_data_destination_country_code
     *
     * @param string|null $enhanced_scheme_data_destination_country_code Destination country code.  Encoding: ASCII.  Max length: 3 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationCountryCode($enhanced_scheme_data_destination_country_code)
    {
        if (is_null($enhanced_scheme_data_destination_country_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_destination_country_code cannot be null');
        }
        $this->container['enhanced_scheme_data_destination_country_code'] = $enhanced_scheme_data_destination_country_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_destination_postal_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationPostalCode()
    {
        return $this->container['enhanced_scheme_data_destination_postal_code'];
    }

    /**
     * Sets enhanced_scheme_data_destination_postal_code
     *
     * @param string|null $enhanced_scheme_data_destination_postal_code The postal code of a destination address.  Encoding: ASCII.  Max length: 10 characters.  > Required for American Express.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationPostalCode($enhanced_scheme_data_destination_postal_code)
    {
        if (is_null($enhanced_scheme_data_destination_postal_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_destination_postal_code cannot be null');
        }
        $this->container['enhanced_scheme_data_destination_postal_code'] = $enhanced_scheme_data_destination_postal_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_destination_state_province_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDestinationStateProvinceCode()
    {
        return $this->container['enhanced_scheme_data_destination_state_province_code'];
    }

    /**
     * Sets enhanced_scheme_data_destination_state_province_code
     *
     * @param string|null $enhanced_scheme_data_destination_state_province_code Destination state or province code.  Encoding: ASCII.Max length: 3 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDestinationStateProvinceCode($enhanced_scheme_data_destination_state_province_code)
    {
        if (is_null($enhanced_scheme_data_destination_state_province_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_destination_state_province_code cannot be null');
        }
        $this->container['enhanced_scheme_data_destination_state_province_code'] = $enhanced_scheme_data_destination_state_province_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_duty_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataDutyAmount()
    {
        return $this->container['enhanced_scheme_data_duty_amount'];
    }

    /**
     * Sets enhanced_scheme_data_duty_amount
     *
     * @param string|null $enhanced_scheme_data_duty_amount Duty amount, in minor units.  For example, 2000 means USD 20.00.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataDutyAmount($enhanced_scheme_data_duty_amount)
    {
        if (is_null($enhanced_scheme_data_duty_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_duty_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_duty_amount'] = $enhanced_scheme_data_duty_amount;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_freight_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataFreightAmount()
    {
        return $this->container['enhanced_scheme_data_freight_amount'];
    }

    /**
     * Sets enhanced_scheme_data_freight_amount
     *
     * @param string|null $enhanced_scheme_data_freight_amount Shipping amount, in minor units.  For example, 2000 means USD 20.00.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataFreightAmount($enhanced_scheme_data_freight_amount)
    {
        if (is_null($enhanced_scheme_data_freight_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_freight_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_freight_amount'] = $enhanced_scheme_data_freight_amount;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_commodity_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrCommodityCode()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_commodity_code'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_commodity_code
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_commodity_code Item commodity code.  Encoding: ASCII.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrCommodityCode($enhanced_scheme_data_item_detail_line_item_nr_commodity_code)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_commodity_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_commodity_code cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_commodity_code'] = $enhanced_scheme_data_item_detail_line_item_nr_commodity_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_description
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrDescription()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_description'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_description
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_description Item description.  Encoding: ASCII.  Max length: 26 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrDescription($enhanced_scheme_data_item_detail_line_item_nr_description)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_description)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_description cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_description'] = $enhanced_scheme_data_item_detail_line_item_nr_description;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_discount_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrDiscountAmount()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_discount_amount'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_discount_amount
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_discount_amount Discount amount, in minor units.  For example, 2000 means USD 20.00.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrDiscountAmount($enhanced_scheme_data_item_detail_line_item_nr_discount_amount)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_discount_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_discount_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_discount_amount'] = $enhanced_scheme_data_item_detail_line_item_nr_discount_amount;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_product_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrProductCode()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_product_code'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_product_code
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_product_code Product code.  Encoding: ASCII.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrProductCode($enhanced_scheme_data_item_detail_line_item_nr_product_code)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_product_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_product_code cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_product_code'] = $enhanced_scheme_data_item_detail_line_item_nr_product_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_quantity
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrQuantity()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_quantity'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_quantity
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_quantity Quantity, specified as an integer value.  Value must be greater than 0.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrQuantity($enhanced_scheme_data_item_detail_line_item_nr_quantity)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_quantity)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_quantity cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_quantity'] = $enhanced_scheme_data_item_detail_line_item_nr_quantity;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_total_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrTotalAmount()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_total_amount'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_total_amount
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_total_amount Total amount, in minor units.  For example, 2000 means USD 20.00.  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrTotalAmount($enhanced_scheme_data_item_detail_line_item_nr_total_amount)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_total_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_total_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_total_amount'] = $enhanced_scheme_data_item_detail_line_item_nr_total_amount;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure Item unit of measurement.  Encoding: ASCII.  Max length: 3 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrUnitOfMeasure($enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure'] = $enhanced_scheme_data_item_detail_line_item_nr_unit_of_measure;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_item_detail_line_item_nr_unit_price
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataItemDetailLineItemNrUnitPrice()
    {
        return $this->container['enhanced_scheme_data_item_detail_line_item_nr_unit_price'];
    }

    /**
     * Sets enhanced_scheme_data_item_detail_line_item_nr_unit_price
     *
     * @param string|null $enhanced_scheme_data_item_detail_line_item_nr_unit_price Unit price, specified in [minor units](https://docs.adyen.com/development-resources/currency-codes).  Max length: 12 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataItemDetailLineItemNrUnitPrice($enhanced_scheme_data_item_detail_line_item_nr_unit_price)
    {
        if (is_null($enhanced_scheme_data_item_detail_line_item_nr_unit_price)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_item_detail_line_item_nr_unit_price cannot be null');
        }
        $this->container['enhanced_scheme_data_item_detail_line_item_nr_unit_price'] = $enhanced_scheme_data_item_detail_line_item_nr_unit_price;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_order_date
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataOrderDate()
    {
        return $this->container['enhanced_scheme_data_order_date'];
    }

    /**
     * Sets enhanced_scheme_data_order_date
     *
     * @param string|null $enhanced_scheme_data_order_date Order date. * Format: `ddMMyy`  Encoding: ASCII.  Max length: 6 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataOrderDate($enhanced_scheme_data_order_date)
    {
        if (is_null($enhanced_scheme_data_order_date)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_order_date cannot be null');
        }
        $this->container['enhanced_scheme_data_order_date'] = $enhanced_scheme_data_order_date;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_ship_from_postal_code
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataShipFromPostalCode()
    {
        return $this->container['enhanced_scheme_data_ship_from_postal_code'];
    }

    /**
     * Sets enhanced_scheme_data_ship_from_postal_code
     *
     * @param string|null $enhanced_scheme_data_ship_from_postal_code The postal code of a \"ship-from\" address.  Encoding: ASCII.  Max length: 10 characters.
     *
     * @return self
     */
    public function setEnhancedSchemeDataShipFromPostalCode($enhanced_scheme_data_ship_from_postal_code)
    {
        if (is_null($enhanced_scheme_data_ship_from_postal_code)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_ship_from_postal_code cannot be null');
        }
        $this->container['enhanced_scheme_data_ship_from_postal_code'] = $enhanced_scheme_data_ship_from_postal_code;

        return $this;
    }

    /**
     * Gets enhanced_scheme_data_total_tax_amount
     *
     * @return string|null
     */
    public function getEnhancedSchemeDataTotalTaxAmount()
    {
        return $this->container['enhanced_scheme_data_total_tax_amount'];
    }

    /**
     * Sets enhanced_scheme_data_total_tax_amount
     *
     * @param string|null $enhanced_scheme_data_total_tax_amount Total tax amount, in minor units.  For example, 2000 means USD 20.00.  Max length: 12 characters.  > Required for Level 2 and Level 3 data.
     *
     * @return self
     */
    public function setEnhancedSchemeDataTotalTaxAmount($enhanced_scheme_data_total_tax_amount)
    {
        if (is_null($enhanced_scheme_data_total_tax_amount)) {
            throw new \InvalidArgumentException('non-nullable enhanced_scheme_data_total_tax_amount cannot be null');
        }
        $this->container['enhanced_scheme_data_total_tax_amount'] = $enhanced_scheme_data_total_tax_amount;

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
