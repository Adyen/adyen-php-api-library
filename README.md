# Adyen APIs Library for PHP

[![Build Status](https://api.travis-ci.org/Adyen/adyen-php-api-library.svg?branch=master)](https://travis-ci.org/Adyen/adyen-php-api-library)

## Description ##
The Adyen API Library for PHP enables you to work with Adyen APIs.

## Getting Started ##

Make sure you have an Adyen account. If you don't have this you can request it <a href="https://www.adyen.com/home/discover/test-account-signup#form" target="_blank">here</a>
To make the automatice testing cases working for your account change the credentials in the config/test.ini file.

## DISCLAIMER ##
The ownership of the content of the Adyen API Library remains with Adyen. The content of the Adyen API Library may only be used in connection with the services of Adyen and subject to the applicable license (Apache License, Version 2.0, the “License”), a copy of which is included in the library. 
Unless required by applicable law or agreed to in writing, the library is offered and/or distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. Adyen does not warrant that the library or any content will be available uninterrupted or error free, that defects will be corrected, or that the library or its supporting systems are free of viruses or bugs. Please refer to the License for the specific language governing permissions and limitations under the License.

## Documentation ##
http://adyen.github.io/adyen-php-api-library/

## Installation ##
You can use Composer or simply Download the Release

## Composer ##

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.


Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require adyen/php-api-library
```

## Examples ##

Create Payment Request on Test:
```php

$client = new \Adyen\Client();
$client->setApplicationName("Adyen PHP Api Library Example");
$client->setUsername("YOUR USERNAME");
$client->setPassword("YOUR PASSWORD");
$client->setEnvironment(\Adyen\Environment::TEST);

$service = new Service\Payment($client);

$json = '{
      "card": {
        "number": "4111111111111111",
        "expiryMonth": "6",
        "expiryYear": "2016",
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

```

For CSE use

```php
{
  "amount": {
    "value": 1499,
    "currency": "GBP"
  },
  "reference": "payment-test",
  "merchantAccount": "YOUR MERCHANT ACCOUNT",
  "additionalData": {
    "card.encrypted.json": "THE ENCRYPTED DATA"
  }
}
```

Refund example:

```php

$client = new \Adyen\Client();
$client->setApplicationName("Adyen PHP Api Library Example");
$client->setUsername("YOUR USERNAME");
$client->setPassword("YOUR PASSWORD");
$client->setEnvironment(\Adyen\Environment::TEST);

// intialize modification service
$service = new Service\Modification($client);

// set the amount you want to refund
$modificationAmount = array('currency' => 'CURRENCY', 'value' => 'VALUE');

// required are merchantAccount, ModificationAmount(currency,value), reference and originalReference
$params = array(
    "merchantAccount" => 'YOUR MERCHANT ACCOUNT',
    "modificationAmount" => $modificationAmount,
    "reference" => 'YOUR OWN REFERENCE',
    "originalReference" => 'PSPREFERENCE OF THE PAYMENT YOU WANT TO REFUND'
);

$result = $service->refund($params);

// $result['response'] = [refund-received]

```

## Tests ##
For the test cases you need the PCI permission enabled on you account. There are no test cases for CSE because credit card data is encrypted through our javascript library.
By default the test will then be skipped. If you have these permissions fill in your account details in the config/test.ini file to let the test work.