# Adyen APIs Library for PHP

[![Build Status](https://api.travis-ci.org/Adyen/adyen-php-api-library.svg?branch=master)](https://travis-ci.org/Adyen/adyen-php-api-library)

This is the officially supported PHP library for using Adyen's APIs.

## Integration
The library supports all APIs under the following services:

* [Checkout API](https://docs.adyen.com/api-explorer/#/CheckoutService/v67/overview): Our latest integration for accepting online payments. Current supported version: **v67**
* [Payments API](https://docs.adyen.com/api-explorer/#/Payment/v51/overview): Our classic integration for online payments. Current supported version: **v51**
* [Recurring API](https://docs.adyen.com/api-explorer/#/Recurring/v49/overview): Endpoints for managing saved payment details. Current supported version: **v49**
* [Payouts API](https://docs.adyen.com/api-explorer/#/Payout/v51/overview): Endpoints for sending funds to your customers. Current supported version: **v51**
* [Platforms APIs](https://docs.adyen.com/platforms/api): Set of APIs when using Adyen for Platforms. 
  * [Account API](https://docs.adyen.com/api-explorer/#/Account/v5/overview) Current supported version: **v5**
  * [Fund API](https://docs.adyen.com/api-explorer/#/Fund/v5/overview) Current supported version: **v5**
  * [Notification Configuration API](https://docs.adyen.com/api-explorer/#/NotificationConfigurationService/v5/overview) Current supported version: **v5**
* [Cloud-based Terminal API](https://docs.adyen.com/point-of-sale/terminal-api-reference): Our point-of-sale integration.
* [Referrals API](https://docs.adyen.com/risk-management/automate-submitting-referrals/referrals-api-reference): Endpoints to [automate submitting referrals](https://docs.adyen.com/risk-management/automate-submitting-referrals) for Adyen risk rules.


For more information, refer to our [documentation](https://docs.adyen.com/) or the [API Explorer](https://docs.adyen.com/api-explorer/).


## Prerequisites

- [Adyen test account](https://docs.adyen.com/get-started-with-adyen)
- [API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key). For testing, your API credential needs to have the [API PCI Payments role](https://docs.adyen.com/development-resources/api-credentials#roles).
- PHP 5.6 or later for production
- PHP 7.3 or later for development
- cURL with SSL support.
- The JSON PHP extension.
- See [composer require list](https://github.com/Adyen/adyen-php-api-library/blob/develop/composer.json#L10) for the complete list of dependencies

### Legacy version support

If using PHP versions 5.3, 5.4, or 5.5, download our library version [6.3.0](https://github.com/Adyen/adyen-php-api-library/releases/tag/6.3.0).

## Installation

You can use [Composer](https://getcomposer.org/). Follow the [installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have composer installed.

~~~~ bash
composer require adyen/php-api-library
~~~~

In your PHP script, make sure you include the autoloader:

~~~~ php
require __DIR__ . '/vendor/autoload.php';
~~~~

Alternatively, you can download the [release on GitHub](https://github.com/Adyen/adyen-php-api-library/releases).

## Using the library

### General use with API key

Set up the client as a singleton resource; you'll use it for the API calls that you make to Adyen:

~~~~ php
$client = new \Adyen\Client();

$client->setXApiKey("YOUR API KEY");
$client->setEnvironment(\Adyen\Environment::TEST);
$client->setTimeout(30);

$service = new \Adyen\Service\Checkout($client);

$json = '{
      "card": {
        "encryptedCardNumber" => "test_4111111111111111",
        "encryptedExpiryMonth" => "test_03",
        "encryptedExpiryYear" => "test_2030",
        "encryptedSecurityCode" => "test_737"
        "holderName": "John Smith"
      },
      "amount": {
        "value": 1500,
        "currency": "EUR"
      },
      "reference": "payment-test",
      "merchantAccount": "YOUR MERCHANT ACCOUNT"
}';

$params = json_decode($json, true);

$result = $service->payments($params);
~~~~

### General use with API key for live environment
~~~~ php
$client = new \Adyen\Client();
$client->setXApiKey("YOUR API KEY");
$client->setEnvironment(\Adyen\Environment::LIVE);
$client->setTimeout(30);
 
...
~~~~

### General use with basic auth
~~~~ php
$client = new \Adyen\Client();
$client->setUsername("YOUR USERNAME");
$client->setPassword("YOUR PASSWORD");
$client->setEnvironment(\Adyen\Environment::TEST);
$client->setTimeout(30);

$service = new \Adyen\Service\Payment($client);

$json = '{
      "card": {
        "number": "4111111111111111",
        "expiryMonth": "10",
        "expiryYear": "2020",
        "cvc": "737",
        "holderName": "John Smith"
      },
      "amount": {
        "value": 1500,
        "currency": "EUR"
      },
      "reference": "payment-test",
      "merchantAccount": "YOUR MERCHANT ACCOUNT"
}';

$params = json_decode($json, true);

$result = $service->authorise($params);
~~~~

### Example integration

For a closer look at how our PHP library works, clone our [Laravel example integration](https://github.com/adyen-examples/adyen-php-online-payments). This includes commented code, highlighting key features and concepts, and examples of API calls that can be made using the library.

### Running the tests
For the test cases you need the PCI permission enabled on you account. There are no test cases for CSE because credit card data is encrypted through our javascript library.
By default the test will then be skipped. If you have these permissions fill in your account details in the config/test.ini file to let the test work.
To make the automatic testing cases work for your account change the credentials in the config/test.ini file.

## Contributing

We encourage you to contribute to this repository, so everyone can benefit from new features, bug fixes, and any other improvements.
Have a look at our [contributing guidelines](https://github.com/Adyen/adyen-php-api-library/blob/develop/CONTRIBUTING.md) to find out how to raise a pull request.

## Support
If you have a feature request, or spotted a bug or a technical problem, [create an issue here](https://github.com/Adyen/adyen-php-api-library/issues/new/choose).

For other questions, [contact our Support Team](https://www.adyen.help/hc/en-us/requests/new?ticket_form_id=360000705420).

## Licence
This repository is available under the [MIT license](https://github.com/Adyen/adyen-php-api-library/blob/master/LICENSE).

## See also
* [Example integration](https://github.com/adyen-examples/adyen-php-online-payments)
* [Adyen docs](https://docs.adyen.com/)
* [API Explorer](https://docs.adyen.com/api-explorer/)
