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
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Adyen\Model\Checkout;

use \ArrayAccess;
use \Adyen\Model\Checkout\ObjectSerializer;

/**
 * AdditionalDataOpenInvoice Class Doc Comment
 *
 * @category Class
 * @package  Adyen\Model\Checkout
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataOpenInvoice implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataOpenInvoice';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'openinvoicedata_merchant_data' => 'string',
        'openinvoicedata_number_of_lines' => 'string',
        'openinvoicedata_recipient_first_name' => 'string',
        'openinvoicedata_recipient_last_name' => 'string',
        'openinvoicedata_line_item_nr_currency_code' => 'string',
        'openinvoicedata_line_item_nr_description' => 'string',
        'openinvoicedata_line_item_nr_item_amount' => 'string',
        'openinvoicedata_line_item_nr_item_id' => 'string',
        'openinvoicedata_line_item_nr_item_vat_amount' => 'string',
        'openinvoicedata_line_item_nr_item_vat_percentage' => 'string',
        'openinvoicedata_line_item_nr_number_of_items' => 'string',
        'openinvoicedata_line_item_nr_return_shipping_company' => 'string',
        'openinvoicedata_line_item_nr_return_tracking_number' => 'string',
        'openinvoicedata_line_item_nr_return_tracking_uri' => 'string',
        'openinvoicedata_line_item_nr_shipping_company' => 'string',
        'openinvoicedata_line_item_nr_shipping_method' => 'string',
        'openinvoicedata_line_item_nr_tracking_number' => 'string',
        'openinvoicedata_line_item_nr_tracking_uri' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'openinvoicedata_merchant_data' => null,
        'openinvoicedata_number_of_lines' => null,
        'openinvoicedata_recipient_first_name' => null,
        'openinvoicedata_recipient_last_name' => null,
        'openinvoicedata_line_item_nr_currency_code' => null,
        'openinvoicedata_line_item_nr_description' => null,
        'openinvoicedata_line_item_nr_item_amount' => null,
        'openinvoicedata_line_item_nr_item_id' => null,
        'openinvoicedata_line_item_nr_item_vat_amount' => null,
        'openinvoicedata_line_item_nr_item_vat_percentage' => null,
        'openinvoicedata_line_item_nr_number_of_items' => null,
        'openinvoicedata_line_item_nr_return_shipping_company' => null,
        'openinvoicedata_line_item_nr_return_tracking_number' => null,
        'openinvoicedata_line_item_nr_return_tracking_uri' => null,
        'openinvoicedata_line_item_nr_shipping_company' => null,
        'openinvoicedata_line_item_nr_shipping_method' => null,
        'openinvoicedata_line_item_nr_tracking_number' => null,
        'openinvoicedata_line_item_nr_tracking_uri' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'openinvoicedata_merchant_data' => false,
		'openinvoicedata_number_of_lines' => false,
		'openinvoicedata_recipient_first_name' => false,
		'openinvoicedata_recipient_last_name' => false,
		'openinvoicedata_line_item_nr_currency_code' => false,
		'openinvoicedata_line_item_nr_description' => false,
		'openinvoicedata_line_item_nr_item_amount' => false,
		'openinvoicedata_line_item_nr_item_id' => false,
		'openinvoicedata_line_item_nr_item_vat_amount' => false,
		'openinvoicedata_line_item_nr_item_vat_percentage' => false,
		'openinvoicedata_line_item_nr_number_of_items' => false,
		'openinvoicedata_line_item_nr_return_shipping_company' => false,
		'openinvoicedata_line_item_nr_return_tracking_number' => false,
		'openinvoicedata_line_item_nr_return_tracking_uri' => false,
		'openinvoicedata_line_item_nr_shipping_company' => false,
		'openinvoicedata_line_item_nr_shipping_method' => false,
		'openinvoicedata_line_item_nr_tracking_number' => false,
		'openinvoicedata_line_item_nr_tracking_uri' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
        'openinvoicedata_merchant_data' => 'openinvoicedata.merchantData',
        'openinvoicedata_number_of_lines' => 'openinvoicedata.numberOfLines',
        'openinvoicedata_recipient_first_name' => 'openinvoicedata.recipientFirstName',
        'openinvoicedata_recipient_last_name' => 'openinvoicedata.recipientLastName',
        'openinvoicedata_line_item_nr_currency_code' => 'openinvoicedataLine[itemNr].currencyCode',
        'openinvoicedata_line_item_nr_description' => 'openinvoicedataLine[itemNr].description',
        'openinvoicedata_line_item_nr_item_amount' => 'openinvoicedataLine[itemNr].itemAmount',
        'openinvoicedata_line_item_nr_item_id' => 'openinvoicedataLine[itemNr].itemId',
        'openinvoicedata_line_item_nr_item_vat_amount' => 'openinvoicedataLine[itemNr].itemVatAmount',
        'openinvoicedata_line_item_nr_item_vat_percentage' => 'openinvoicedataLine[itemNr].itemVatPercentage',
        'openinvoicedata_line_item_nr_number_of_items' => 'openinvoicedataLine[itemNr].numberOfItems',
        'openinvoicedata_line_item_nr_return_shipping_company' => 'openinvoicedataLine[itemNr].returnShippingCompany',
        'openinvoicedata_line_item_nr_return_tracking_number' => 'openinvoicedataLine[itemNr].returnTrackingNumber',
        'openinvoicedata_line_item_nr_return_tracking_uri' => 'openinvoicedataLine[itemNr].returnTrackingUri',
        'openinvoicedata_line_item_nr_shipping_company' => 'openinvoicedataLine[itemNr].shippingCompany',
        'openinvoicedata_line_item_nr_shipping_method' => 'openinvoicedataLine[itemNr].shippingMethod',
        'openinvoicedata_line_item_nr_tracking_number' => 'openinvoicedataLine[itemNr].trackingNumber',
        'openinvoicedata_line_item_nr_tracking_uri' => 'openinvoicedataLine[itemNr].trackingUri'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'openinvoicedata_merchant_data' => 'setOpeninvoicedataMerchantData',
        'openinvoicedata_number_of_lines' => 'setOpeninvoicedataNumberOfLines',
        'openinvoicedata_recipient_first_name' => 'setOpeninvoicedataRecipientFirstName',
        'openinvoicedata_recipient_last_name' => 'setOpeninvoicedataRecipientLastName',
        'openinvoicedata_line_item_nr_currency_code' => 'setOpeninvoicedataLineItemNrCurrencyCode',
        'openinvoicedata_line_item_nr_description' => 'setOpeninvoicedataLineItemNrDescription',
        'openinvoicedata_line_item_nr_item_amount' => 'setOpeninvoicedataLineItemNrItemAmount',
        'openinvoicedata_line_item_nr_item_id' => 'setOpeninvoicedataLineItemNrItemId',
        'openinvoicedata_line_item_nr_item_vat_amount' => 'setOpeninvoicedataLineItemNrItemVatAmount',
        'openinvoicedata_line_item_nr_item_vat_percentage' => 'setOpeninvoicedataLineItemNrItemVatPercentage',
        'openinvoicedata_line_item_nr_number_of_items' => 'setOpeninvoicedataLineItemNrNumberOfItems',
        'openinvoicedata_line_item_nr_return_shipping_company' => 'setOpeninvoicedataLineItemNrReturnShippingCompany',
        'openinvoicedata_line_item_nr_return_tracking_number' => 'setOpeninvoicedataLineItemNrReturnTrackingNumber',
        'openinvoicedata_line_item_nr_return_tracking_uri' => 'setOpeninvoicedataLineItemNrReturnTrackingUri',
        'openinvoicedata_line_item_nr_shipping_company' => 'setOpeninvoicedataLineItemNrShippingCompany',
        'openinvoicedata_line_item_nr_shipping_method' => 'setOpeninvoicedataLineItemNrShippingMethod',
        'openinvoicedata_line_item_nr_tracking_number' => 'setOpeninvoicedataLineItemNrTrackingNumber',
        'openinvoicedata_line_item_nr_tracking_uri' => 'setOpeninvoicedataLineItemNrTrackingUri'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'openinvoicedata_merchant_data' => 'getOpeninvoicedataMerchantData',
        'openinvoicedata_number_of_lines' => 'getOpeninvoicedataNumberOfLines',
        'openinvoicedata_recipient_first_name' => 'getOpeninvoicedataRecipientFirstName',
        'openinvoicedata_recipient_last_name' => 'getOpeninvoicedataRecipientLastName',
        'openinvoicedata_line_item_nr_currency_code' => 'getOpeninvoicedataLineItemNrCurrencyCode',
        'openinvoicedata_line_item_nr_description' => 'getOpeninvoicedataLineItemNrDescription',
        'openinvoicedata_line_item_nr_item_amount' => 'getOpeninvoicedataLineItemNrItemAmount',
        'openinvoicedata_line_item_nr_item_id' => 'getOpeninvoicedataLineItemNrItemId',
        'openinvoicedata_line_item_nr_item_vat_amount' => 'getOpeninvoicedataLineItemNrItemVatAmount',
        'openinvoicedata_line_item_nr_item_vat_percentage' => 'getOpeninvoicedataLineItemNrItemVatPercentage',
        'openinvoicedata_line_item_nr_number_of_items' => 'getOpeninvoicedataLineItemNrNumberOfItems',
        'openinvoicedata_line_item_nr_return_shipping_company' => 'getOpeninvoicedataLineItemNrReturnShippingCompany',
        'openinvoicedata_line_item_nr_return_tracking_number' => 'getOpeninvoicedataLineItemNrReturnTrackingNumber',
        'openinvoicedata_line_item_nr_return_tracking_uri' => 'getOpeninvoicedataLineItemNrReturnTrackingUri',
        'openinvoicedata_line_item_nr_shipping_company' => 'getOpeninvoicedataLineItemNrShippingCompany',
        'openinvoicedata_line_item_nr_shipping_method' => 'getOpeninvoicedataLineItemNrShippingMethod',
        'openinvoicedata_line_item_nr_tracking_number' => 'getOpeninvoicedataLineItemNrTrackingNumber',
        'openinvoicedata_line_item_nr_tracking_uri' => 'getOpeninvoicedataLineItemNrTrackingUri'
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
        $this->setIfExists('openinvoicedata_merchant_data', $data ?? [], null);
        $this->setIfExists('openinvoicedata_number_of_lines', $data ?? [], null);
        $this->setIfExists('openinvoicedata_recipient_first_name', $data ?? [], null);
        $this->setIfExists('openinvoicedata_recipient_last_name', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_currency_code', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_description', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_item_amount', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_item_id', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_item_vat_amount', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_item_vat_percentage', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_number_of_items', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_return_shipping_company', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_return_tracking_number', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_return_tracking_uri', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_shipping_company', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_shipping_method', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_tracking_number', $data ?? [], null);
        $this->setIfExists('openinvoicedata_line_item_nr_tracking_uri', $data ?? [], null);
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
     * Gets openinvoicedata_merchant_data
     *
     * @return string|null
     */
    public function getOpeninvoicedataMerchantData()
    {
        return $this->container['openinvoicedata_merchant_data'];
    }

    /**
     * Sets openinvoicedata_merchant_data
     *
     * @param string|null $openinvoicedata_merchant_data Holds different merchant data points like product, purchase, customer, and so on. It takes data in a Base64 encoded string.  The `merchantData` parameter needs to be added to the `openinvoicedata` signature at the end.  Since the field is optional, if it's not included it does not impact computing the merchant signature.  Applies only to Klarna.  You can contact Klarna for the format and structure of the string.
     *
     * @return self
     */
    public function setOpeninvoicedataMerchantData($openinvoicedata_merchant_data)
    {
        if (is_null($openinvoicedata_merchant_data)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_merchant_data cannot be null');
        }
        $this->container['openinvoicedata_merchant_data'] = $openinvoicedata_merchant_data;

        return $this;
    }

    /**
     * Gets openinvoicedata_number_of_lines
     *
     * @return string|null
     */
    public function getOpeninvoicedataNumberOfLines()
    {
        return $this->container['openinvoicedata_number_of_lines'];
    }

    /**
     * Sets openinvoicedata_number_of_lines
     *
     * @param string|null $openinvoicedata_number_of_lines The number of invoice lines included in `openinvoicedata`.  There needs to be at least one line, so `numberOfLines` needs to be at least 1.
     *
     * @return self
     */
    public function setOpeninvoicedataNumberOfLines($openinvoicedata_number_of_lines)
    {
        if (is_null($openinvoicedata_number_of_lines)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_number_of_lines cannot be null');
        }
        $this->container['openinvoicedata_number_of_lines'] = $openinvoicedata_number_of_lines;

        return $this;
    }

    /**
     * Gets openinvoicedata_recipient_first_name
     *
     * @return string|null
     */
    public function getOpeninvoicedataRecipientFirstName()
    {
        return $this->container['openinvoicedata_recipient_first_name'];
    }

    /**
     * Sets openinvoicedata_recipient_first_name
     *
     * @param string|null $openinvoicedata_recipient_first_name First name of the recipient. If the delivery address and the billing address are different, specify the `recipientFirstName` and `recipientLastName` to share the delivery address with Klarna. Otherwise, only the billing address is shared with Klarna.
     *
     * @return self
     */
    public function setOpeninvoicedataRecipientFirstName($openinvoicedata_recipient_first_name)
    {
        if (is_null($openinvoicedata_recipient_first_name)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_recipient_first_name cannot be null');
        }
        $this->container['openinvoicedata_recipient_first_name'] = $openinvoicedata_recipient_first_name;

        return $this;
    }

    /**
     * Gets openinvoicedata_recipient_last_name
     *
     * @return string|null
     */
    public function getOpeninvoicedataRecipientLastName()
    {
        return $this->container['openinvoicedata_recipient_last_name'];
    }

    /**
     * Sets openinvoicedata_recipient_last_name
     *
     * @param string|null $openinvoicedata_recipient_last_name Last name of the recipient. If the delivery address and the billing address are different, specify the `recipientFirstName` and `recipientLastName` to share the delivery address with Klarna. Otherwise, only the billing address is shared with Klarna.
     *
     * @return self
     */
    public function setOpeninvoicedataRecipientLastName($openinvoicedata_recipient_last_name)
    {
        if (is_null($openinvoicedata_recipient_last_name)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_recipient_last_name cannot be null');
        }
        $this->container['openinvoicedata_recipient_last_name'] = $openinvoicedata_recipient_last_name;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_currency_code
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrCurrencyCode()
    {
        return $this->container['openinvoicedata_line_item_nr_currency_code'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_currency_code
     *
     * @param string|null $openinvoicedata_line_item_nr_currency_code The three-character ISO currency code.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrCurrencyCode($openinvoicedata_line_item_nr_currency_code)
    {
        if (is_null($openinvoicedata_line_item_nr_currency_code)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_currency_code cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_currency_code'] = $openinvoicedata_line_item_nr_currency_code;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_description
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrDescription()
    {
        return $this->container['openinvoicedata_line_item_nr_description'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_description
     *
     * @param string|null $openinvoicedata_line_item_nr_description A text description of the product the invoice line refers to.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrDescription($openinvoicedata_line_item_nr_description)
    {
        if (is_null($openinvoicedata_line_item_nr_description)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_description cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_description'] = $openinvoicedata_line_item_nr_description;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_item_amount
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemAmount()
    {
        return $this->container['openinvoicedata_line_item_nr_item_amount'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_item_amount
     *
     * @param string|null $openinvoicedata_line_item_nr_item_amount The price for one item in the invoice line, represented in minor units.  The due amount for the item, VAT excluded.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemAmount($openinvoicedata_line_item_nr_item_amount)
    {
        if (is_null($openinvoicedata_line_item_nr_item_amount)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_item_amount cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_item_amount'] = $openinvoicedata_line_item_nr_item_amount;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_item_id
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemId()
    {
        return $this->container['openinvoicedata_line_item_nr_item_id'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_item_id
     *
     * @param string|null $openinvoicedata_line_item_nr_item_id A unique id for this item. Required for RatePay if the description of each item is not unique.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemId($openinvoicedata_line_item_nr_item_id)
    {
        if (is_null($openinvoicedata_line_item_nr_item_id)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_item_id cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_item_id'] = $openinvoicedata_line_item_nr_item_id;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_item_vat_amount
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemVatAmount()
    {
        return $this->container['openinvoicedata_line_item_nr_item_vat_amount'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_item_vat_amount
     *
     * @param string|null $openinvoicedata_line_item_nr_item_vat_amount The VAT due for one item in the invoice line, represented in minor units.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemVatAmount($openinvoicedata_line_item_nr_item_vat_amount)
    {
        if (is_null($openinvoicedata_line_item_nr_item_vat_amount)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_item_vat_amount cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_item_vat_amount'] = $openinvoicedata_line_item_nr_item_vat_amount;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_item_vat_percentage
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemVatPercentage()
    {
        return $this->container['openinvoicedata_line_item_nr_item_vat_percentage'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_item_vat_percentage
     *
     * @param string|null $openinvoicedata_line_item_nr_item_vat_percentage The VAT percentage for one item in the invoice line, represented in minor units.  For example, 19% VAT is specified as 1900.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemVatPercentage($openinvoicedata_line_item_nr_item_vat_percentage)
    {
        if (is_null($openinvoicedata_line_item_nr_item_vat_percentage)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_item_vat_percentage cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_item_vat_percentage'] = $openinvoicedata_line_item_nr_item_vat_percentage;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_number_of_items
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrNumberOfItems()
    {
        return $this->container['openinvoicedata_line_item_nr_number_of_items'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_number_of_items
     *
     * @param string|null $openinvoicedata_line_item_nr_number_of_items The number of units purchased of a specific product.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrNumberOfItems($openinvoicedata_line_item_nr_number_of_items)
    {
        if (is_null($openinvoicedata_line_item_nr_number_of_items)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_number_of_items cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_number_of_items'] = $openinvoicedata_line_item_nr_number_of_items;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_return_shipping_company
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnShippingCompany()
    {
        return $this->container['openinvoicedata_line_item_nr_return_shipping_company'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_return_shipping_company
     *
     * @param string|null $openinvoicedata_line_item_nr_return_shipping_company Name of the shipping company handling the the return shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnShippingCompany($openinvoicedata_line_item_nr_return_shipping_company)
    {
        if (is_null($openinvoicedata_line_item_nr_return_shipping_company)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_return_shipping_company cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_return_shipping_company'] = $openinvoicedata_line_item_nr_return_shipping_company;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_return_tracking_number
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnTrackingNumber()
    {
        return $this->container['openinvoicedata_line_item_nr_return_tracking_number'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_return_tracking_number
     *
     * @param string|null $openinvoicedata_line_item_nr_return_tracking_number The tracking number for the return of the shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnTrackingNumber($openinvoicedata_line_item_nr_return_tracking_number)
    {
        if (is_null($openinvoicedata_line_item_nr_return_tracking_number)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_return_tracking_number cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_return_tracking_number'] = $openinvoicedata_line_item_nr_return_tracking_number;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_return_tracking_uri
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnTrackingUri()
    {
        return $this->container['openinvoicedata_line_item_nr_return_tracking_uri'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_return_tracking_uri
     *
     * @param string|null $openinvoicedata_line_item_nr_return_tracking_uri URI where the customer can track the return of their shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnTrackingUri($openinvoicedata_line_item_nr_return_tracking_uri)
    {
        if (is_null($openinvoicedata_line_item_nr_return_tracking_uri)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_return_tracking_uri cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_return_tracking_uri'] = $openinvoicedata_line_item_nr_return_tracking_uri;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_shipping_company
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrShippingCompany()
    {
        return $this->container['openinvoicedata_line_item_nr_shipping_company'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_shipping_company
     *
     * @param string|null $openinvoicedata_line_item_nr_shipping_company Name of the shipping company handling the delivery.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrShippingCompany($openinvoicedata_line_item_nr_shipping_company)
    {
        if (is_null($openinvoicedata_line_item_nr_shipping_company)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_shipping_company cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_shipping_company'] = $openinvoicedata_line_item_nr_shipping_company;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_shipping_method
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrShippingMethod()
    {
        return $this->container['openinvoicedata_line_item_nr_shipping_method'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_shipping_method
     *
     * @param string|null $openinvoicedata_line_item_nr_shipping_method Shipping method.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrShippingMethod($openinvoicedata_line_item_nr_shipping_method)
    {
        if (is_null($openinvoicedata_line_item_nr_shipping_method)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_shipping_method cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_shipping_method'] = $openinvoicedata_line_item_nr_shipping_method;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_tracking_number
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrTrackingNumber()
    {
        return $this->container['openinvoicedata_line_item_nr_tracking_number'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_tracking_number
     *
     * @param string|null $openinvoicedata_line_item_nr_tracking_number The tracking number for the shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrTrackingNumber($openinvoicedata_line_item_nr_tracking_number)
    {
        if (is_null($openinvoicedata_line_item_nr_tracking_number)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_tracking_number cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_tracking_number'] = $openinvoicedata_line_item_nr_tracking_number;

        return $this;
    }

    /**
     * Gets openinvoicedata_line_item_nr_tracking_uri
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrTrackingUri()
    {
        return $this->container['openinvoicedata_line_item_nr_tracking_uri'];
    }

    /**
     * Sets openinvoicedata_line_item_nr_tracking_uri
     *
     * @param string|null $openinvoicedata_line_item_nr_tracking_uri URI where the customer can track their shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrTrackingUri($openinvoicedata_line_item_nr_tracking_uri)
    {
        if (is_null($openinvoicedata_line_item_nr_tracking_uri)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedata_line_item_nr_tracking_uri cannot be null');
        }
        $this->container['openinvoicedata_line_item_nr_tracking_uri'] = $openinvoicedata_line_item_nr_tracking_uri;

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

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


