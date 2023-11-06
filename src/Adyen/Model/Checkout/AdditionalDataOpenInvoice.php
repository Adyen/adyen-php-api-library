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
 * AdditionalDataOpenInvoice Class Doc Comment
 *
 * @category Class
 * @package  Adyen
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
        'openinvoicedataMerchantData' => 'string',
        'openinvoicedataNumberOfLines' => 'string',
        'openinvoicedataRecipientFirstName' => 'string',
        'openinvoicedataRecipientLastName' => 'string',
        'openinvoicedataLineItemNrCurrencyCode' => 'string',
        'openinvoicedataLineItemNrDescription' => 'string',
        'openinvoicedataLineItemNrItemAmount' => 'string',
        'openinvoicedataLineItemNrItemId' => 'string',
        'openinvoicedataLineItemNrItemVatAmount' => 'string',
        'openinvoicedataLineItemNrItemVatPercentage' => 'string',
        'openinvoicedataLineItemNrNumberOfItems' => 'string',
        'openinvoicedataLineItemNrReturnShippingCompany' => 'string',
        'openinvoicedataLineItemNrReturnTrackingNumber' => 'string',
        'openinvoicedataLineItemNrReturnTrackingUri' => 'string',
        'openinvoicedataLineItemNrShippingCompany' => 'string',
        'openinvoicedataLineItemNrShippingMethod' => 'string',
        'openinvoicedataLineItemNrTrackingNumber' => 'string',
        'openinvoicedataLineItemNrTrackingUri' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'openinvoicedataMerchantData' => null,
        'openinvoicedataNumberOfLines' => null,
        'openinvoicedataRecipientFirstName' => null,
        'openinvoicedataRecipientLastName' => null,
        'openinvoicedataLineItemNrCurrencyCode' => null,
        'openinvoicedataLineItemNrDescription' => null,
        'openinvoicedataLineItemNrItemAmount' => null,
        'openinvoicedataLineItemNrItemId' => null,
        'openinvoicedataLineItemNrItemVatAmount' => null,
        'openinvoicedataLineItemNrItemVatPercentage' => null,
        'openinvoicedataLineItemNrNumberOfItems' => null,
        'openinvoicedataLineItemNrReturnShippingCompany' => null,
        'openinvoicedataLineItemNrReturnTrackingNumber' => null,
        'openinvoicedataLineItemNrReturnTrackingUri' => null,
        'openinvoicedataLineItemNrShippingCompany' => null,
        'openinvoicedataLineItemNrShippingMethod' => null,
        'openinvoicedataLineItemNrTrackingNumber' => null,
        'openinvoicedataLineItemNrTrackingUri' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'openinvoicedataMerchantData' => false,
        'openinvoicedataNumberOfLines' => false,
        'openinvoicedataRecipientFirstName' => false,
        'openinvoicedataRecipientLastName' => false,
        'openinvoicedataLineItemNrCurrencyCode' => false,
        'openinvoicedataLineItemNrDescription' => false,
        'openinvoicedataLineItemNrItemAmount' => false,
        'openinvoicedataLineItemNrItemId' => false,
        'openinvoicedataLineItemNrItemVatAmount' => false,
        'openinvoicedataLineItemNrItemVatPercentage' => false,
        'openinvoicedataLineItemNrNumberOfItems' => false,
        'openinvoicedataLineItemNrReturnShippingCompany' => false,
        'openinvoicedataLineItemNrReturnTrackingNumber' => false,
        'openinvoicedataLineItemNrReturnTrackingUri' => false,
        'openinvoicedataLineItemNrShippingCompany' => false,
        'openinvoicedataLineItemNrShippingMethod' => false,
        'openinvoicedataLineItemNrTrackingNumber' => false,
        'openinvoicedataLineItemNrTrackingUri' => false
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
        'openinvoicedataMerchantData' => 'openinvoicedata.merchantData',
        'openinvoicedataNumberOfLines' => 'openinvoicedata.numberOfLines',
        'openinvoicedataRecipientFirstName' => 'openinvoicedata.recipientFirstName',
        'openinvoicedataRecipientLastName' => 'openinvoicedata.recipientLastName',
        'openinvoicedataLineItemNrCurrencyCode' => 'openinvoicedataLine[itemNr].currencyCode',
        'openinvoicedataLineItemNrDescription' => 'openinvoicedataLine[itemNr].description',
        'openinvoicedataLineItemNrItemAmount' => 'openinvoicedataLine[itemNr].itemAmount',
        'openinvoicedataLineItemNrItemId' => 'openinvoicedataLine[itemNr].itemId',
        'openinvoicedataLineItemNrItemVatAmount' => 'openinvoicedataLine[itemNr].itemVatAmount',
        'openinvoicedataLineItemNrItemVatPercentage' => 'openinvoicedataLine[itemNr].itemVatPercentage',
        'openinvoicedataLineItemNrNumberOfItems' => 'openinvoicedataLine[itemNr].numberOfItems',
        'openinvoicedataLineItemNrReturnShippingCompany' => 'openinvoicedataLine[itemNr].returnShippingCompany',
        'openinvoicedataLineItemNrReturnTrackingNumber' => 'openinvoicedataLine[itemNr].returnTrackingNumber',
        'openinvoicedataLineItemNrReturnTrackingUri' => 'openinvoicedataLine[itemNr].returnTrackingUri',
        'openinvoicedataLineItemNrShippingCompany' => 'openinvoicedataLine[itemNr].shippingCompany',
        'openinvoicedataLineItemNrShippingMethod' => 'openinvoicedataLine[itemNr].shippingMethod',
        'openinvoicedataLineItemNrTrackingNumber' => 'openinvoicedataLine[itemNr].trackingNumber',
        'openinvoicedataLineItemNrTrackingUri' => 'openinvoicedataLine[itemNr].trackingUri'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'openinvoicedataMerchantData' => 'setOpeninvoicedataMerchantData',
        'openinvoicedataNumberOfLines' => 'setOpeninvoicedataNumberOfLines',
        'openinvoicedataRecipientFirstName' => 'setOpeninvoicedataRecipientFirstName',
        'openinvoicedataRecipientLastName' => 'setOpeninvoicedataRecipientLastName',
        'openinvoicedataLineItemNrCurrencyCode' => 'setOpeninvoicedataLineItemNrCurrencyCode',
        'openinvoicedataLineItemNrDescription' => 'setOpeninvoicedataLineItemNrDescription',
        'openinvoicedataLineItemNrItemAmount' => 'setOpeninvoicedataLineItemNrItemAmount',
        'openinvoicedataLineItemNrItemId' => 'setOpeninvoicedataLineItemNrItemId',
        'openinvoicedataLineItemNrItemVatAmount' => 'setOpeninvoicedataLineItemNrItemVatAmount',
        'openinvoicedataLineItemNrItemVatPercentage' => 'setOpeninvoicedataLineItemNrItemVatPercentage',
        'openinvoicedataLineItemNrNumberOfItems' => 'setOpeninvoicedataLineItemNrNumberOfItems',
        'openinvoicedataLineItemNrReturnShippingCompany' => 'setOpeninvoicedataLineItemNrReturnShippingCompany',
        'openinvoicedataLineItemNrReturnTrackingNumber' => 'setOpeninvoicedataLineItemNrReturnTrackingNumber',
        'openinvoicedataLineItemNrReturnTrackingUri' => 'setOpeninvoicedataLineItemNrReturnTrackingUri',
        'openinvoicedataLineItemNrShippingCompany' => 'setOpeninvoicedataLineItemNrShippingCompany',
        'openinvoicedataLineItemNrShippingMethod' => 'setOpeninvoicedataLineItemNrShippingMethod',
        'openinvoicedataLineItemNrTrackingNumber' => 'setOpeninvoicedataLineItemNrTrackingNumber',
        'openinvoicedataLineItemNrTrackingUri' => 'setOpeninvoicedataLineItemNrTrackingUri'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'openinvoicedataMerchantData' => 'getOpeninvoicedataMerchantData',
        'openinvoicedataNumberOfLines' => 'getOpeninvoicedataNumberOfLines',
        'openinvoicedataRecipientFirstName' => 'getOpeninvoicedataRecipientFirstName',
        'openinvoicedataRecipientLastName' => 'getOpeninvoicedataRecipientLastName',
        'openinvoicedataLineItemNrCurrencyCode' => 'getOpeninvoicedataLineItemNrCurrencyCode',
        'openinvoicedataLineItemNrDescription' => 'getOpeninvoicedataLineItemNrDescription',
        'openinvoicedataLineItemNrItemAmount' => 'getOpeninvoicedataLineItemNrItemAmount',
        'openinvoicedataLineItemNrItemId' => 'getOpeninvoicedataLineItemNrItemId',
        'openinvoicedataLineItemNrItemVatAmount' => 'getOpeninvoicedataLineItemNrItemVatAmount',
        'openinvoicedataLineItemNrItemVatPercentage' => 'getOpeninvoicedataLineItemNrItemVatPercentage',
        'openinvoicedataLineItemNrNumberOfItems' => 'getOpeninvoicedataLineItemNrNumberOfItems',
        'openinvoicedataLineItemNrReturnShippingCompany' => 'getOpeninvoicedataLineItemNrReturnShippingCompany',
        'openinvoicedataLineItemNrReturnTrackingNumber' => 'getOpeninvoicedataLineItemNrReturnTrackingNumber',
        'openinvoicedataLineItemNrReturnTrackingUri' => 'getOpeninvoicedataLineItemNrReturnTrackingUri',
        'openinvoicedataLineItemNrShippingCompany' => 'getOpeninvoicedataLineItemNrShippingCompany',
        'openinvoicedataLineItemNrShippingMethod' => 'getOpeninvoicedataLineItemNrShippingMethod',
        'openinvoicedataLineItemNrTrackingNumber' => 'getOpeninvoicedataLineItemNrTrackingNumber',
        'openinvoicedataLineItemNrTrackingUri' => 'getOpeninvoicedataLineItemNrTrackingUri'
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
        $this->setIfExists('openinvoicedataMerchantData', $data ?? [], null);
        $this->setIfExists('openinvoicedataNumberOfLines', $data ?? [], null);
        $this->setIfExists('openinvoicedataRecipientFirstName', $data ?? [], null);
        $this->setIfExists('openinvoicedataRecipientLastName', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrCurrencyCode', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrDescription', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrItemAmount', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrItemId', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrItemVatAmount', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrItemVatPercentage', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrNumberOfItems', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrReturnShippingCompany', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrReturnTrackingNumber', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrReturnTrackingUri', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrShippingCompany', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrShippingMethod', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrTrackingNumber', $data ?? [], null);
        $this->setIfExists('openinvoicedataLineItemNrTrackingUri', $data ?? [], null);
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
     * Gets openinvoicedataMerchantData
     *
     * @return string|null
     */
    public function getOpeninvoicedataMerchantData()
    {
        return $this->container['openinvoicedataMerchantData'];
    }

    /**
     * Sets openinvoicedataMerchantData
     *
     * @param string|null $openinvoicedataMerchantData Holds different merchant data points like product, purchase, customer, and so on. It takes data in a Base64 encoded string.  The `merchantData` parameter needs to be added to the `openinvoicedata` signature at the end.  Since the field is optional, if it's not included it does not impact computing the merchant signature.  Applies only to Klarna.  You can contact Klarna for the format and structure of the string.
     *
     * @return self
     */
    public function setOpeninvoicedataMerchantData($openinvoicedataMerchantData)
    {
        if (is_null($openinvoicedataMerchantData)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataMerchantData cannot be null');
        }
        $this->container['openinvoicedataMerchantData'] = $openinvoicedataMerchantData;

        return $this;
    }

    /**
     * Gets openinvoicedataNumberOfLines
     *
     * @return string|null
     */
    public function getOpeninvoicedataNumberOfLines()
    {
        return $this->container['openinvoicedataNumberOfLines'];
    }

    /**
     * Sets openinvoicedataNumberOfLines
     *
     * @param string|null $openinvoicedataNumberOfLines The number of invoice lines included in `openinvoicedata`.  There needs to be at least one line, so `numberOfLines` needs to be at least 1.
     *
     * @return self
     */
    public function setOpeninvoicedataNumberOfLines($openinvoicedataNumberOfLines)
    {
        if (is_null($openinvoicedataNumberOfLines)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataNumberOfLines cannot be null');
        }
        $this->container['openinvoicedataNumberOfLines'] = $openinvoicedataNumberOfLines;

        return $this;
    }

    /**
     * Gets openinvoicedataRecipientFirstName
     *
     * @return string|null
     */
    public function getOpeninvoicedataRecipientFirstName()
    {
        return $this->container['openinvoicedataRecipientFirstName'];
    }

    /**
     * Sets openinvoicedataRecipientFirstName
     *
     * @param string|null $openinvoicedataRecipientFirstName First name of the recipient. If the delivery address and the billing address are different, specify the `recipientFirstName` and `recipientLastName` to share the delivery address with Klarna. Otherwise, only the billing address is shared with Klarna.
     *
     * @return self
     */
    public function setOpeninvoicedataRecipientFirstName($openinvoicedataRecipientFirstName)
    {
        if (is_null($openinvoicedataRecipientFirstName)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataRecipientFirstName cannot be null');
        }
        $this->container['openinvoicedataRecipientFirstName'] = $openinvoicedataRecipientFirstName;

        return $this;
    }

    /**
     * Gets openinvoicedataRecipientLastName
     *
     * @return string|null
     */
    public function getOpeninvoicedataRecipientLastName()
    {
        return $this->container['openinvoicedataRecipientLastName'];
    }

    /**
     * Sets openinvoicedataRecipientLastName
     *
     * @param string|null $openinvoicedataRecipientLastName Last name of the recipient. If the delivery address and the billing address are different, specify the `recipientFirstName` and `recipientLastName` to share the delivery address with Klarna. Otherwise, only the billing address is shared with Klarna.
     *
     * @return self
     */
    public function setOpeninvoicedataRecipientLastName($openinvoicedataRecipientLastName)
    {
        if (is_null($openinvoicedataRecipientLastName)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataRecipientLastName cannot be null');
        }
        $this->container['openinvoicedataRecipientLastName'] = $openinvoicedataRecipientLastName;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrCurrencyCode
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrCurrencyCode()
    {
        return $this->container['openinvoicedataLineItemNrCurrencyCode'];
    }

    /**
     * Sets openinvoicedataLineItemNrCurrencyCode
     *
     * @param string|null $openinvoicedataLineItemNrCurrencyCode The three-character ISO currency code.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrCurrencyCode($openinvoicedataLineItemNrCurrencyCode)
    {
        if (is_null($openinvoicedataLineItemNrCurrencyCode)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrCurrencyCode cannot be null');
        }
        $this->container['openinvoicedataLineItemNrCurrencyCode'] = $openinvoicedataLineItemNrCurrencyCode;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrDescription
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrDescription()
    {
        return $this->container['openinvoicedataLineItemNrDescription'];
    }

    /**
     * Sets openinvoicedataLineItemNrDescription
     *
     * @param string|null $openinvoicedataLineItemNrDescription A text description of the product the invoice line refers to.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrDescription($openinvoicedataLineItemNrDescription)
    {
        if (is_null($openinvoicedataLineItemNrDescription)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrDescription cannot be null');
        }
        $this->container['openinvoicedataLineItemNrDescription'] = $openinvoicedataLineItemNrDescription;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrItemAmount
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemAmount()
    {
        return $this->container['openinvoicedataLineItemNrItemAmount'];
    }

    /**
     * Sets openinvoicedataLineItemNrItemAmount
     *
     * @param string|null $openinvoicedataLineItemNrItemAmount The price for one item in the invoice line, represented in minor units.  The due amount for the item, VAT excluded.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemAmount($openinvoicedataLineItemNrItemAmount)
    {
        if (is_null($openinvoicedataLineItemNrItemAmount)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrItemAmount cannot be null');
        }
        $this->container['openinvoicedataLineItemNrItemAmount'] = $openinvoicedataLineItemNrItemAmount;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrItemId
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemId()
    {
        return $this->container['openinvoicedataLineItemNrItemId'];
    }

    /**
     * Sets openinvoicedataLineItemNrItemId
     *
     * @param string|null $openinvoicedataLineItemNrItemId A unique id for this item. Required for RatePay if the description of each item is not unique.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemId($openinvoicedataLineItemNrItemId)
    {
        if (is_null($openinvoicedataLineItemNrItemId)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrItemId cannot be null');
        }
        $this->container['openinvoicedataLineItemNrItemId'] = $openinvoicedataLineItemNrItemId;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrItemVatAmount
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemVatAmount()
    {
        return $this->container['openinvoicedataLineItemNrItemVatAmount'];
    }

    /**
     * Sets openinvoicedataLineItemNrItemVatAmount
     *
     * @param string|null $openinvoicedataLineItemNrItemVatAmount The VAT due for one item in the invoice line, represented in minor units.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemVatAmount($openinvoicedataLineItemNrItemVatAmount)
    {
        if (is_null($openinvoicedataLineItemNrItemVatAmount)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrItemVatAmount cannot be null');
        }
        $this->container['openinvoicedataLineItemNrItemVatAmount'] = $openinvoicedataLineItemNrItemVatAmount;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrItemVatPercentage
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrItemVatPercentage()
    {
        return $this->container['openinvoicedataLineItemNrItemVatPercentage'];
    }

    /**
     * Sets openinvoicedataLineItemNrItemVatPercentage
     *
     * @param string|null $openinvoicedataLineItemNrItemVatPercentage The VAT percentage for one item in the invoice line, represented in minor units.  For example, 19% VAT is specified as 1900.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrItemVatPercentage($openinvoicedataLineItemNrItemVatPercentage)
    {
        if (is_null($openinvoicedataLineItemNrItemVatPercentage)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrItemVatPercentage cannot be null');
        }
        $this->container['openinvoicedataLineItemNrItemVatPercentage'] = $openinvoicedataLineItemNrItemVatPercentage;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrNumberOfItems
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrNumberOfItems()
    {
        return $this->container['openinvoicedataLineItemNrNumberOfItems'];
    }

    /**
     * Sets openinvoicedataLineItemNrNumberOfItems
     *
     * @param string|null $openinvoicedataLineItemNrNumberOfItems The number of units purchased of a specific product.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrNumberOfItems($openinvoicedataLineItemNrNumberOfItems)
    {
        if (is_null($openinvoicedataLineItemNrNumberOfItems)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrNumberOfItems cannot be null');
        }
        $this->container['openinvoicedataLineItemNrNumberOfItems'] = $openinvoicedataLineItemNrNumberOfItems;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrReturnShippingCompany
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnShippingCompany()
    {
        return $this->container['openinvoicedataLineItemNrReturnShippingCompany'];
    }

    /**
     * Sets openinvoicedataLineItemNrReturnShippingCompany
     *
     * @param string|null $openinvoicedataLineItemNrReturnShippingCompany Name of the shipping company handling the the return shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnShippingCompany($openinvoicedataLineItemNrReturnShippingCompany)
    {
        if (is_null($openinvoicedataLineItemNrReturnShippingCompany)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrReturnShippingCompany cannot be null');
        }
        $this->container['openinvoicedataLineItemNrReturnShippingCompany'] = $openinvoicedataLineItemNrReturnShippingCompany;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrReturnTrackingNumber
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnTrackingNumber()
    {
        return $this->container['openinvoicedataLineItemNrReturnTrackingNumber'];
    }

    /**
     * Sets openinvoicedataLineItemNrReturnTrackingNumber
     *
     * @param string|null $openinvoicedataLineItemNrReturnTrackingNumber The tracking number for the return of the shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnTrackingNumber($openinvoicedataLineItemNrReturnTrackingNumber)
    {
        if (is_null($openinvoicedataLineItemNrReturnTrackingNumber)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrReturnTrackingNumber cannot be null');
        }
        $this->container['openinvoicedataLineItemNrReturnTrackingNumber'] = $openinvoicedataLineItemNrReturnTrackingNumber;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrReturnTrackingUri
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrReturnTrackingUri()
    {
        return $this->container['openinvoicedataLineItemNrReturnTrackingUri'];
    }

    /**
     * Sets openinvoicedataLineItemNrReturnTrackingUri
     *
     * @param string|null $openinvoicedataLineItemNrReturnTrackingUri URI where the customer can track the return of their shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrReturnTrackingUri($openinvoicedataLineItemNrReturnTrackingUri)
    {
        if (is_null($openinvoicedataLineItemNrReturnTrackingUri)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrReturnTrackingUri cannot be null');
        }
        $this->container['openinvoicedataLineItemNrReturnTrackingUri'] = $openinvoicedataLineItemNrReturnTrackingUri;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrShippingCompany
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrShippingCompany()
    {
        return $this->container['openinvoicedataLineItemNrShippingCompany'];
    }

    /**
     * Sets openinvoicedataLineItemNrShippingCompany
     *
     * @param string|null $openinvoicedataLineItemNrShippingCompany Name of the shipping company handling the delivery.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrShippingCompany($openinvoicedataLineItemNrShippingCompany)
    {
        if (is_null($openinvoicedataLineItemNrShippingCompany)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrShippingCompany cannot be null');
        }
        $this->container['openinvoicedataLineItemNrShippingCompany'] = $openinvoicedataLineItemNrShippingCompany;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrShippingMethod
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrShippingMethod()
    {
        return $this->container['openinvoicedataLineItemNrShippingMethod'];
    }

    /**
     * Sets openinvoicedataLineItemNrShippingMethod
     *
     * @param string|null $openinvoicedataLineItemNrShippingMethod Shipping method.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrShippingMethod($openinvoicedataLineItemNrShippingMethod)
    {
        if (is_null($openinvoicedataLineItemNrShippingMethod)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrShippingMethod cannot be null');
        }
        $this->container['openinvoicedataLineItemNrShippingMethod'] = $openinvoicedataLineItemNrShippingMethod;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrTrackingNumber
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrTrackingNumber()
    {
        return $this->container['openinvoicedataLineItemNrTrackingNumber'];
    }

    /**
     * Sets openinvoicedataLineItemNrTrackingNumber
     *
     * @param string|null $openinvoicedataLineItemNrTrackingNumber The tracking number for the shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrTrackingNumber($openinvoicedataLineItemNrTrackingNumber)
    {
        if (is_null($openinvoicedataLineItemNrTrackingNumber)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrTrackingNumber cannot be null');
        }
        $this->container['openinvoicedataLineItemNrTrackingNumber'] = $openinvoicedataLineItemNrTrackingNumber;

        return $this;
    }

    /**
     * Gets openinvoicedataLineItemNrTrackingUri
     *
     * @return string|null
     */
    public function getOpeninvoicedataLineItemNrTrackingUri()
    {
        return $this->container['openinvoicedataLineItemNrTrackingUri'];
    }

    /**
     * Sets openinvoicedataLineItemNrTrackingUri
     *
     * @param string|null $openinvoicedataLineItemNrTrackingUri URI where the customer can track their shipment.
     *
     * @return self
     */
    public function setOpeninvoicedataLineItemNrTrackingUri($openinvoicedataLineItemNrTrackingUri)
    {
        if (is_null($openinvoicedataLineItemNrTrackingUri)) {
            throw new \InvalidArgumentException('non-nullable openinvoicedataLineItemNrTrackingUri cannot be null');
        }
        $this->container['openinvoicedataLineItemNrTrackingUri'] = $openinvoicedataLineItemNrTrackingUri;

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
