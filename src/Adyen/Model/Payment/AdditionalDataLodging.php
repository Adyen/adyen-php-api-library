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


namespace Adyen\Model\Payment;

use \ArrayAccess;
use Adyen\Model\Payment\ObjectSerializer;

/**
 * AdditionalDataLodging Class Doc Comment
 *
 * @category Class
 * @package  Adyen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdditionalDataLodging implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdditionalDataLodging';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'lodgingCheckInDate' => 'string',
        'lodgingCheckOutDate' => 'string',
        'lodgingCustomerServiceTollFreeNumber' => 'string',
        'lodgingFireSafetyActIndicator' => 'string',
        'lodgingFolioCashAdvances' => 'string',
        'lodgingFolioNumber' => 'string',
        'lodgingFoodBeverageCharges' => 'string',
        'lodgingNoShowIndicator' => 'string',
        'lodgingPrepaidExpenses' => 'string',
        'lodgingPropertyPhoneNumber' => 'string',
        'lodgingRoom1NumberOfNights' => 'string',
        'lodgingRoom1Rate' => 'string',
        'lodgingTotalRoomTax' => 'string',
        'lodgingTotalTax' => 'string',
        'travelEntertainmentAuthDataDuration' => 'string',
        'travelEntertainmentAuthDataMarket' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'lodgingCheckInDate' => null,
        'lodgingCheckOutDate' => null,
        'lodgingCustomerServiceTollFreeNumber' => null,
        'lodgingFireSafetyActIndicator' => null,
        'lodgingFolioCashAdvances' => null,
        'lodgingFolioNumber' => null,
        'lodgingFoodBeverageCharges' => null,
        'lodgingNoShowIndicator' => null,
        'lodgingPrepaidExpenses' => null,
        'lodgingPropertyPhoneNumber' => null,
        'lodgingRoom1NumberOfNights' => null,
        'lodgingRoom1Rate' => null,
        'lodgingTotalRoomTax' => null,
        'lodgingTotalTax' => null,
        'travelEntertainmentAuthDataDuration' => null,
        'travelEntertainmentAuthDataMarket' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'lodgingCheckInDate' => false,
        'lodgingCheckOutDate' => false,
        'lodgingCustomerServiceTollFreeNumber' => false,
        'lodgingFireSafetyActIndicator' => false,
        'lodgingFolioCashAdvances' => false,
        'lodgingFolioNumber' => false,
        'lodgingFoodBeverageCharges' => false,
        'lodgingNoShowIndicator' => false,
        'lodgingPrepaidExpenses' => false,
        'lodgingPropertyPhoneNumber' => false,
        'lodgingRoom1NumberOfNights' => false,
        'lodgingRoom1Rate' => false,
        'lodgingTotalRoomTax' => false,
        'lodgingTotalTax' => false,
        'travelEntertainmentAuthDataDuration' => false,
        'travelEntertainmentAuthDataMarket' => false
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
        'lodgingCheckInDate' => 'lodging.checkInDate',
        'lodgingCheckOutDate' => 'lodging.checkOutDate',
        'lodgingCustomerServiceTollFreeNumber' => 'lodging.customerServiceTollFreeNumber',
        'lodgingFireSafetyActIndicator' => 'lodging.fireSafetyActIndicator',
        'lodgingFolioCashAdvances' => 'lodging.folioCashAdvances',
        'lodgingFolioNumber' => 'lodging.folioNumber',
        'lodgingFoodBeverageCharges' => 'lodging.foodBeverageCharges',
        'lodgingNoShowIndicator' => 'lodging.noShowIndicator',
        'lodgingPrepaidExpenses' => 'lodging.prepaidExpenses',
        'lodgingPropertyPhoneNumber' => 'lodging.propertyPhoneNumber',
        'lodgingRoom1NumberOfNights' => 'lodging.room1.numberOfNights',
        'lodgingRoom1Rate' => 'lodging.room1.rate',
        'lodgingTotalRoomTax' => 'lodging.totalRoomTax',
        'lodgingTotalTax' => 'lodging.totalTax',
        'travelEntertainmentAuthDataDuration' => 'travelEntertainmentAuthData.duration',
        'travelEntertainmentAuthDataMarket' => 'travelEntertainmentAuthData.market'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'lodgingCheckInDate' => 'setLodgingCheckInDate',
        'lodgingCheckOutDate' => 'setLodgingCheckOutDate',
        'lodgingCustomerServiceTollFreeNumber' => 'setLodgingCustomerServiceTollFreeNumber',
        'lodgingFireSafetyActIndicator' => 'setLodgingFireSafetyActIndicator',
        'lodgingFolioCashAdvances' => 'setLodgingFolioCashAdvances',
        'lodgingFolioNumber' => 'setLodgingFolioNumber',
        'lodgingFoodBeverageCharges' => 'setLodgingFoodBeverageCharges',
        'lodgingNoShowIndicator' => 'setLodgingNoShowIndicator',
        'lodgingPrepaidExpenses' => 'setLodgingPrepaidExpenses',
        'lodgingPropertyPhoneNumber' => 'setLodgingPropertyPhoneNumber',
        'lodgingRoom1NumberOfNights' => 'setLodgingRoom1NumberOfNights',
        'lodgingRoom1Rate' => 'setLodgingRoom1Rate',
        'lodgingTotalRoomTax' => 'setLodgingTotalRoomTax',
        'lodgingTotalTax' => 'setLodgingTotalTax',
        'travelEntertainmentAuthDataDuration' => 'setTravelEntertainmentAuthDataDuration',
        'travelEntertainmentAuthDataMarket' => 'setTravelEntertainmentAuthDataMarket'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'lodgingCheckInDate' => 'getLodgingCheckInDate',
        'lodgingCheckOutDate' => 'getLodgingCheckOutDate',
        'lodgingCustomerServiceTollFreeNumber' => 'getLodgingCustomerServiceTollFreeNumber',
        'lodgingFireSafetyActIndicator' => 'getLodgingFireSafetyActIndicator',
        'lodgingFolioCashAdvances' => 'getLodgingFolioCashAdvances',
        'lodgingFolioNumber' => 'getLodgingFolioNumber',
        'lodgingFoodBeverageCharges' => 'getLodgingFoodBeverageCharges',
        'lodgingNoShowIndicator' => 'getLodgingNoShowIndicator',
        'lodgingPrepaidExpenses' => 'getLodgingPrepaidExpenses',
        'lodgingPropertyPhoneNumber' => 'getLodgingPropertyPhoneNumber',
        'lodgingRoom1NumberOfNights' => 'getLodgingRoom1NumberOfNights',
        'lodgingRoom1Rate' => 'getLodgingRoom1Rate',
        'lodgingTotalRoomTax' => 'getLodgingTotalRoomTax',
        'lodgingTotalTax' => 'getLodgingTotalTax',
        'travelEntertainmentAuthDataDuration' => 'getTravelEntertainmentAuthDataDuration',
        'travelEntertainmentAuthDataMarket' => 'getTravelEntertainmentAuthDataMarket'
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
        $this->setIfExists('lodgingCheckInDate', $data ?? [], null);
        $this->setIfExists('lodgingCheckOutDate', $data ?? [], null);
        $this->setIfExists('lodgingCustomerServiceTollFreeNumber', $data ?? [], null);
        $this->setIfExists('lodgingFireSafetyActIndicator', $data ?? [], null);
        $this->setIfExists('lodgingFolioCashAdvances', $data ?? [], null);
        $this->setIfExists('lodgingFolioNumber', $data ?? [], null);
        $this->setIfExists('lodgingFoodBeverageCharges', $data ?? [], null);
        $this->setIfExists('lodgingNoShowIndicator', $data ?? [], null);
        $this->setIfExists('lodgingPrepaidExpenses', $data ?? [], null);
        $this->setIfExists('lodgingPropertyPhoneNumber', $data ?? [], null);
        $this->setIfExists('lodgingRoom1NumberOfNights', $data ?? [], null);
        $this->setIfExists('lodgingRoom1Rate', $data ?? [], null);
        $this->setIfExists('lodgingTotalRoomTax', $data ?? [], null);
        $this->setIfExists('lodgingTotalTax', $data ?? [], null);
        $this->setIfExists('travelEntertainmentAuthDataDuration', $data ?? [], null);
        $this->setIfExists('travelEntertainmentAuthDataMarket', $data ?? [], null);
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
     * Gets lodgingCheckInDate
     *
     * @return string|null
     */
    public function getLodgingCheckInDate()
    {
        return $this->container['lodgingCheckInDate'];
    }

    /**
     * Sets lodgingCheckInDate
     *
     * @param string|null $lodgingCheckInDate The arrival date. * Date format: **yyyyMmDd**. For example, for 2023 April 22, **20230422**.
     *
     * @return self
     */
    public function setLodgingCheckInDate($lodgingCheckInDate)
    {
        if (is_null($lodgingCheckInDate)) {
            throw new \InvalidArgumentException('non-nullable lodgingCheckInDate cannot be null');
        }
        $this->container['lodgingCheckInDate'] = $lodgingCheckInDate;

        return $this;
    }

    /**
     * Gets lodgingCheckOutDate
     *
     * @return string|null
     */
    public function getLodgingCheckOutDate()
    {
        return $this->container['lodgingCheckOutDate'];
    }

    /**
     * Sets lodgingCheckOutDate
     *
     * @param string|null $lodgingCheckOutDate The departure date. * Date format: **yyyyMmDd**. For example, for 2023 April 22, **20230422**.
     *
     * @return self
     */
    public function setLodgingCheckOutDate($lodgingCheckOutDate)
    {
        if (is_null($lodgingCheckOutDate)) {
            throw new \InvalidArgumentException('non-nullable lodgingCheckOutDate cannot be null');
        }
        $this->container['lodgingCheckOutDate'] = $lodgingCheckOutDate;

        return $this;
    }

    /**
     * Gets lodgingCustomerServiceTollFreeNumber
     *
     * @return string|null
     */
    public function getLodgingCustomerServiceTollFreeNumber()
    {
        return $this->container['lodgingCustomerServiceTollFreeNumber'];
    }

    /**
     * Sets lodgingCustomerServiceTollFreeNumber
     *
     * @param string|null $lodgingCustomerServiceTollFreeNumber The toll-free phone number for the lodging. * Format: numeric * Max length: 17 characters. * For US and CA numbers must be 10 characters in length * Must not start with a space * Must not contain any special characters such as + or - *Must not be all zeros.
     *
     * @return self
     */
    public function setLodgingCustomerServiceTollFreeNumber($lodgingCustomerServiceTollFreeNumber)
    {
        if (is_null($lodgingCustomerServiceTollFreeNumber)) {
            throw new \InvalidArgumentException('non-nullable lodgingCustomerServiceTollFreeNumber cannot be null');
        }
        $this->container['lodgingCustomerServiceTollFreeNumber'] = $lodgingCustomerServiceTollFreeNumber;

        return $this;
    }

    /**
     * Gets lodgingFireSafetyActIndicator
     *
     * @return string|null
     */
    public function getLodgingFireSafetyActIndicator()
    {
        return $this->container['lodgingFireSafetyActIndicator'];
    }

    /**
     * Sets lodgingFireSafetyActIndicator
     *
     * @param string|null $lodgingFireSafetyActIndicator Identifies that the facility complies with the Hotel and Motel Fire Safety Act of 1990. Must be 'Y' or 'N'. * Format: alphabetic * Max length: 1 character
     *
     * @return self
     */
    public function setLodgingFireSafetyActIndicator($lodgingFireSafetyActIndicator)
    {
        if (is_null($lodgingFireSafetyActIndicator)) {
            throw new \InvalidArgumentException('non-nullable lodgingFireSafetyActIndicator cannot be null');
        }
        $this->container['lodgingFireSafetyActIndicator'] = $lodgingFireSafetyActIndicator;

        return $this;
    }

    /**
     * Gets lodgingFolioCashAdvances
     *
     * @return string|null
     */
    public function getLodgingFolioCashAdvances()
    {
        return $this->container['lodgingFolioCashAdvances'];
    }

    /**
     * Sets lodgingFolioCashAdvances
     *
     * @param string|null $lodgingFolioCashAdvances The folio cash advances, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * Format: numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setLodgingFolioCashAdvances($lodgingFolioCashAdvances)
    {
        if (is_null($lodgingFolioCashAdvances)) {
            throw new \InvalidArgumentException('non-nullable lodgingFolioCashAdvances cannot be null');
        }
        $this->container['lodgingFolioCashAdvances'] = $lodgingFolioCashAdvances;

        return $this;
    }

    /**
     * Gets lodgingFolioNumber
     *
     * @return string|null
     */
    public function getLodgingFolioNumber()
    {
        return $this->container['lodgingFolioNumber'];
    }

    /**
     * Sets lodgingFolioNumber
     *
     * @param string|null $lodgingFolioNumber The card acceptor’s internal invoice or billing ID reference number. * Max length: 25 characters. * Must not start with a space *Must not be all zeros.
     *
     * @return self
     */
    public function setLodgingFolioNumber($lodgingFolioNumber)
    {
        if (is_null($lodgingFolioNumber)) {
            throw new \InvalidArgumentException('non-nullable lodgingFolioNumber cannot be null');
        }
        $this->container['lodgingFolioNumber'] = $lodgingFolioNumber;

        return $this;
    }

    /**
     * Gets lodgingFoodBeverageCharges
     *
     * @return string|null
     */
    public function getLodgingFoodBeverageCharges()
    {
        return $this->container['lodgingFoodBeverageCharges'];
    }

    /**
     * Sets lodgingFoodBeverageCharges
     *
     * @param string|null $lodgingFoodBeverageCharges Any charges for food and beverages associated with the booking, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * Format: numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setLodgingFoodBeverageCharges($lodgingFoodBeverageCharges)
    {
        if (is_null($lodgingFoodBeverageCharges)) {
            throw new \InvalidArgumentException('non-nullable lodgingFoodBeverageCharges cannot be null');
        }
        $this->container['lodgingFoodBeverageCharges'] = $lodgingFoodBeverageCharges;

        return $this;
    }

    /**
     * Gets lodgingNoShowIndicator
     *
     * @return string|null
     */
    public function getLodgingNoShowIndicator()
    {
        return $this->container['lodgingNoShowIndicator'];
    }

    /**
     * Sets lodgingNoShowIndicator
     *
     * @param string|null $lodgingNoShowIndicator Indicates if the customer didn't check in for their booking.  Possible values:  * **Y**: the customer didn't check in  * **N**: the customer checked in
     *
     * @return self
     */
    public function setLodgingNoShowIndicator($lodgingNoShowIndicator)
    {
        if (is_null($lodgingNoShowIndicator)) {
            throw new \InvalidArgumentException('non-nullable lodgingNoShowIndicator cannot be null');
        }
        $this->container['lodgingNoShowIndicator'] = $lodgingNoShowIndicator;

        return $this;
    }

    /**
     * Gets lodgingPrepaidExpenses
     *
     * @return string|null
     */
    public function getLodgingPrepaidExpenses()
    {
        return $this->container['lodgingPrepaidExpenses'];
    }

    /**
     * Sets lodgingPrepaidExpenses
     *
     * @param string|null $lodgingPrepaidExpenses The prepaid expenses for the booking. * Format: numeric * Max length: 12 characters
     *
     * @return self
     */
    public function setLodgingPrepaidExpenses($lodgingPrepaidExpenses)
    {
        if (is_null($lodgingPrepaidExpenses)) {
            throw new \InvalidArgumentException('non-nullable lodgingPrepaidExpenses cannot be null');
        }
        $this->container['lodgingPrepaidExpenses'] = $lodgingPrepaidExpenses;

        return $this;
    }

    /**
     * Gets lodgingPropertyPhoneNumber
     *
     * @return string|null
     */
    public function getLodgingPropertyPhoneNumber()
    {
        return $this->container['lodgingPropertyPhoneNumber'];
    }

    /**
     * Sets lodgingPropertyPhoneNumber
     *
     * @param string|null $lodgingPropertyPhoneNumber The lodging property location's phone number. * Format: numeric. * Min length: 10 characters * Max length: 17 characters * For US and CA numbers must be 10 characters in length * Must not start with a space * Must not contain any special characters such as + or - *Must not be all zeros.
     *
     * @return self
     */
    public function setLodgingPropertyPhoneNumber($lodgingPropertyPhoneNumber)
    {
        if (is_null($lodgingPropertyPhoneNumber)) {
            throw new \InvalidArgumentException('non-nullable lodgingPropertyPhoneNumber cannot be null');
        }
        $this->container['lodgingPropertyPhoneNumber'] = $lodgingPropertyPhoneNumber;

        return $this;
    }

    /**
     * Gets lodgingRoom1NumberOfNights
     *
     * @return string|null
     */
    public function getLodgingRoom1NumberOfNights()
    {
        return $this->container['lodgingRoom1NumberOfNights'];
    }

    /**
     * Sets lodgingRoom1NumberOfNights
     *
     * @param string|null $lodgingRoom1NumberOfNights The total number of nights the room is booked for. * Format: numeric * Must be a number between 0 and 99 * Max length: 4 characters
     *
     * @return self
     */
    public function setLodgingRoom1NumberOfNights($lodgingRoom1NumberOfNights)
    {
        if (is_null($lodgingRoom1NumberOfNights)) {
            throw new \InvalidArgumentException('non-nullable lodgingRoom1NumberOfNights cannot be null');
        }
        $this->container['lodgingRoom1NumberOfNights'] = $lodgingRoom1NumberOfNights;

        return $this;
    }

    /**
     * Gets lodgingRoom1Rate
     *
     * @return string|null
     */
    public function getLodgingRoom1Rate()
    {
        return $this->container['lodgingRoom1Rate'];
    }

    /**
     * Sets lodgingRoom1Rate
     *
     * @param string|null $lodgingRoom1Rate The rate for the room, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * Format: numeric * Max length: 12 characters * Must not be a negative number
     *
     * @return self
     */
    public function setLodgingRoom1Rate($lodgingRoom1Rate)
    {
        if (is_null($lodgingRoom1Rate)) {
            throw new \InvalidArgumentException('non-nullable lodgingRoom1Rate cannot be null');
        }
        $this->container['lodgingRoom1Rate'] = $lodgingRoom1Rate;

        return $this;
    }

    /**
     * Gets lodgingTotalRoomTax
     *
     * @return string|null
     */
    public function getLodgingTotalRoomTax()
    {
        return $this->container['lodgingTotalRoomTax'];
    }

    /**
     * Sets lodgingTotalRoomTax
     *
     * @param string|null $lodgingTotalRoomTax The total room tax amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * Format: numeric * Max length: 12 characters * Must not be a negative number
     *
     * @return self
     */
    public function setLodgingTotalRoomTax($lodgingTotalRoomTax)
    {
        if (is_null($lodgingTotalRoomTax)) {
            throw new \InvalidArgumentException('non-nullable lodgingTotalRoomTax cannot be null');
        }
        $this->container['lodgingTotalRoomTax'] = $lodgingTotalRoomTax;

        return $this;
    }

    /**
     * Gets lodgingTotalTax
     *
     * @return string|null
     */
    public function getLodgingTotalTax()
    {
        return $this->container['lodgingTotalTax'];
    }

    /**
     * Sets lodgingTotalTax
     *
     * @param string|null $lodgingTotalTax The total tax amount, in [minor units](https://docs.adyen.com/development-resources/currency-codes). * Format: numeric * Max length: 12 characters * Must not be a negative number
     *
     * @return self
     */
    public function setLodgingTotalTax($lodgingTotalTax)
    {
        if (is_null($lodgingTotalTax)) {
            throw new \InvalidArgumentException('non-nullable lodgingTotalTax cannot be null');
        }
        $this->container['lodgingTotalTax'] = $lodgingTotalTax;

        return $this;
    }

    /**
     * Gets travelEntertainmentAuthDataDuration
     *
     * @return string|null
     */
    public function getTravelEntertainmentAuthDataDuration()
    {
        return $this->container['travelEntertainmentAuthDataDuration'];
    }

    /**
     * Sets travelEntertainmentAuthDataDuration
     *
     * @param string|null $travelEntertainmentAuthDataDuration The number of nights. This should be included in the auth message. * Format: numeric * Max length: 4 characters
     *
     * @return self
     */
    public function setTravelEntertainmentAuthDataDuration($travelEntertainmentAuthDataDuration)
    {
        if (is_null($travelEntertainmentAuthDataDuration)) {
            throw new \InvalidArgumentException('non-nullable travelEntertainmentAuthDataDuration cannot be null');
        }
        $this->container['travelEntertainmentAuthDataDuration'] = $travelEntertainmentAuthDataDuration;

        return $this;
    }

    /**
     * Gets travelEntertainmentAuthDataMarket
     *
     * @return string|null
     */
    public function getTravelEntertainmentAuthDataMarket()
    {
        return $this->container['travelEntertainmentAuthDataMarket'];
    }

    /**
     * Sets travelEntertainmentAuthDataMarket
     *
     * @param string|null $travelEntertainmentAuthDataMarket Indicates what market-specific dataset will be submitted. Must be 'H' for Hotel. This should be included in the auth message.  * Format: alphanumeric * Max length: 1 character
     *
     * @return self
     */
    public function setTravelEntertainmentAuthDataMarket($travelEntertainmentAuthDataMarket)
    {
        if (is_null($travelEntertainmentAuthDataMarket)) {
            throw new \InvalidArgumentException('non-nullable travelEntertainmentAuthDataMarket cannot be null');
        }
        $this->container['travelEntertainmentAuthDataMarket'] = $travelEntertainmentAuthDataMarket;

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
