# adyen-php-api-library

## Description ##
The Adyen API Library for PHP enables you to work with Adyen APIs.

## Getting Started

Make sure you have an Adyen account. If you don't have this you can request it <a href="https://www.adyen.com/home/discover/test-account-signup#form" target="_blank">here</a>
To make the automatice testing cases working for your account change the credentials in the config/test.ini file.

## Beta ##
This library is in Beta. We're comfortable enough with the stability and features of the library that we want you to build real production applications on it. We are using this Libary in our Magento plugins. We will make an effort to support the public and protected surface of the library and maintain backwards compatibility in the future. While we are still in Beta, we reserve the right to make incompatible changes. If we do remove some functionality (typically because better functionality exists or if the feature proved infeasible), we will release a new version of the application.

Simple usage looks like:

```php
$client = new \Adyen\Client();
$client->setApplicationName("Adyen PHP Api Library Example");
$client->setUsername("YOUR USERNAME");
$client->setPassword("YOUR PASSWORD");
$client->setModus("test");

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

## Tests ##
For the test cases you need the PCI permission enabled on you account. There are no test cases for CSE because credit card data is encrypted through our javascript library.
By default the test will then be skipped. If you have these permissions fill in your account details in the config/test.ini file to let the test work.
