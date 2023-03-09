# Adyen APIs Library for PHP

This is the officially supported PHP library for using Adyen's APIs.

[![version](https://img.shields.io/badge/version-13.0.5-blue.svg)](https://docs.adyen.com/development-resources/libraries)

## Integration
The library supports all APIs under the following services:

* [Checkout API](https://docs.adyen.com/api-explorer/#/CheckoutService/v69/overview): Our latest integration for accepting online payments. Current supported version: **v69**
* [Payments API](https://docs.adyen.com/api-explorer/#/Payment/v51/overview): Our classic integration for online payments. Current supported version: **v51**
* [Recurring API](https://docs.adyen.com/api-explorer/#/Recurring/v49/overview): Endpoints for managing saved payment details. Current supported version: **v49**
* [Payouts API](https://docs.adyen.com/api-explorer/#/Payout/v51/overview): Endpoints for sending funds to your customers. Current supported version: 
**v51**
* [Management API](https://docs.adyen.com/api-explorer/#/ManagementService/v1/overview): Configure and manage your Adyen company and merchant accounts, stores, and payment terminals. Current supported version: **v1**
  * [My API credentials](https://docs.adyen.com/api-explorer/#/ManagementService/v1/get/me): Returns your API credential details based on the API Key you used in the request. 
  * [Account - Merchant level](https://docs.adyen.com/api-explorer/#/ManagementService/v1/get/merchants): Returns the list of merchant accounts that your API credential has access to. The list is grouped into pages as defined by the query parameters. 
  * [API key - Merchant level](https://docs.adyen.com/api-explorer/#/ManagementService/v1/post/merchants/{merchantId}/apiCredentials/{apiCredentialId}/generateApiKey): Returns a new API key for the API credential. You can use the new API key a few minutes after generating it. The old API key stops working 24 hours after generating a new one. 
  * [Account - Company level](https://docs.adyen.com/api-explorer/#/ManagementService/v1/get/companies) Returns the list of company accounts that your API credential has access to. The list is grouped into pages as defined by the query parameters. 
  * [Webhooks - Merchant level](https://docs.adyen.com/api-explorer/#/ManagementService/v1/post/merchants/{merchantId}/webhooks/{webhookId}/generateHmac) Returns an HMAC key for the webhook identified in the path. This key allows you to check the integrity and the origin of the notifications you receive.By creating an HMAC key, you start receiving HMAC-signed notifications from Adyen. Find out more about how to verify HMAC signatures.
* [Platforms APIs](https://docs.adyen.com/platforms/api): Set of APIs when using Adyen for Platforms. 
  * [Account API](https://docs.adyen.com/api-explorer/#/Account/v6/overview) Current supported version: **v6**
  * [Fund API](https://docs.adyen.com/api-explorer/#/Fund/v6/overview) Current supported version: **v6**
  * [Notification Configuration API](https://docs.adyen.com/api-explorer/#/NotificationConfigurationService/v6/overview) Current supported version: **v6**
  * [Hosted Onboarding API](https://docs.adyen.com/api-explorer/#/Hop/v6/overview) Current supported version: **v6**
* [Cloud-based Terminal API](https://docs.adyen.com/point-of-sale/terminal-api-reference): Our point-of-sale integration.
* [Referrals API](https://docs.adyen.com/risk-management/automate-submitting-referrals/referrals-api-reference): Endpoints to [automate submitting referrals](https://docs.adyen.com/risk-management/automate-submitting-referrals) for Adyen risk rules.
* [Refunds API](https://docs.adyen.com/api-explorer/#/CheckoutService/v68/post/payments/{paymentPspReference}/refunds): Refunds a payment that has been captured, and returns a unique reference for this request. Current supported version: **v68**
* [Reversals API](https://docs.adyen.com/api-explorer/#/CheckoutService/v68/post/payments/{paymentPspReference}/reversals): Refunds a payment if it has already been captured, and cancels a payment if it has not yet been captured. Current supported version: **v68**

For more information, refer to our [documentation](https://docs.adyen.com/) or the [API Explorer](https://docs.adyen.com/api-explorer/).


## Prerequisites

- [Adyen test account](https://docs.adyen.com/get-started-with-adyen)
- [API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key). For testing, your API credential needs to have the [API PCI Payments role](https://docs.adyen.com/development-resources/api-credentials#roles).
- PHP 7.3 or later
- cURL with SSL support.
- The JSON PHP extension.
- See [composer require list](https://github.com/Adyen/adyen-php-api-library/blob/develop/composer.json#L10) for the complete list of dependencies

### Legacy version support

If using PHP versions 7.2 or lower, download our library version [6.3.0](https://github.com/Adyen/adyen-php-api-library/releases/tag/6.3.0).

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
        "encryptedCardNumber": "test_4111111111111111",
        "encryptedExpiryMonth": "test_03",
        "encryptedExpiryYear": "test_2030",
        "encryptedSecurityCode": "test_737",
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
$client->setEnvironment(\Adyen\Environment::LIVE, 'Your live URL prefix');
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
This repository is available under the [MIT license](https://github.com/Adyen/adyen-php-api-library/blob/main/LICENSE).

## See also
* [Example integration](https://github.com/adyen-examples/adyen-php-online-payments)
* [Adyen docs](https://docs.adyen.com/)
* [API Explorer](https://docs.adyen.com/api-explorer/)
