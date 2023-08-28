![php](https://user-images.githubusercontent.com/93914435/232437001-0f773227-f5ad-4495-9e5b-cad819a04fff.png)

# Adyen PHP API Library

This is the officially supported PHP library for using Adyen's APIs.

[![version](https://img.shields.io/badge/version-14.0.1-blue.svg)](https://docs.adyen.com/development-resources/libraries)

## Supported API versions
The library supports all APIs under the following services:

| API                                                                                                        | Description                                                                                                                                                                                                                                                                                                                  | Service Name                                                            | Supported version        |
|------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------|--------------------------|
| [BIN Lookup API](https://docs.adyen.com/api-explorer/BinLookup/54/overview)                                          | The BIN Lookup API provides endpoints for retrieving information based on a given BIN.                                                                                                                                                                                                                            | [Binlookup](src/Adyen/Service/BinLookupApi.php)                                | **v54**           |
| [Capital API](https://docs.adyen.com/api-explorer/capital/3/overview)                                                | Adyen Capital allows you to build an embedded financing offering for your users to serve their operational needs.                                                                                                                                                                                                 | [Capital](src/Adyen/Service/CapitalApi.php)                                  | **v3**            |
| [Checkout API](https://docs.adyen.com/api-explorer/Checkout/70/overview)                                   | Adyen Checkout API provides a simple and flexible way to initiate and authorise online payments. You can use the same integration for payments made with cards (including 3D Secure), mobile wallets, and local payment methods (for example, iDEAL and Sofort).                                                             | [Checkout](src/Adyen/Service/Checkout)                                  | **v70**                  |
| [Configuration API](https://docs.adyen.com/api-explorer/balanceplatform/2/overview)                               | The Configuration API enables you to create a platform where you can onboard your users as account holders and create balance accounts, cards, and business accounts.                                                                                                                                             | [BalancePlatform](src/Adyen/Service/BalancePlatform/)       | **v2**            |
| [DataProtection API](https://docs.adyen.com/development-resources/data-protection-api)                               | Adyen Data Protection API provides a way for you to process [Subject Erasure Requests](https://gdpr-info.eu/art-17-gdpr/) as mandated in GDPR. Use our API to submit a request to delete shopper's data, including payment details and other related information (for example, delivery address or shopper email) | [DataProtection](src/Adyen/Service/DataProtectionApi.php)                           | **v1**            |
| [Management API](https://docs.adyen.com/api-explorer/Management/1/overview)                                | Configure and manage your Adyen company and merchant accounts, stores, and payment terminals.                                                                                                                                                                                                                     | [Management](src/Adyen/Service/Management/)           | **v1**            |
| [Payments API](https://docs.adyen.com/api-explorer/Payment/68/overview)                                    | A set of API endpoints that allow you to initiate, settle, and modify payments on the Adyen payments platform. You can use the API to accept card payments (including One-Click and 3D Secure), bank transfers, ewallets, and many other payment methods.                                                                    | [Payments](src/Adyen/Service/Payments)                                  | **v68**                  |
| [Recurring API](https://docs.adyen.com/api-explorer/Recurring/68/overview)                                 | The Recurring APIs allow you to manage and remove your tokens or saved payment details. Tokens should be created with validation during a payment request.                                                                                                                                                                   | [Recurring](src/Adyen/Service/RecurringApi.php)                         | **v68**                  |
| [Payouts API](https://docs.adyen.com/api-explorer/Payout/68/overview)                                      | A set of API endpoints that allow you to store payout details, confirm, or decline a payout.                                                                                                                                                                                                                                 | [Payout](src/Adyen/Service/Payout)                                      | **v68**                  |
| [BinLookup API](https://docs.adyen.com/api-explorer/BinLookup/54/overview)                           | Endpoints for retrieving information, such as cost estimates, and 3D Secure supported version based on a given BIN. Current supported version                                                                                                                                                                                | [BinLookup](src/Adyen/Service/BinLookupApi.php)                         | **v54**                  |
| [Stored Value API](https://docs.adyen.com/payment-methods/gift-cards/stored-value-api)                     | Manage both online and point-of-sale gift cards and other stored-value cards.                                                                                                                                                                                                                                                | [StoredValue](src/Adyen/Service/StoredValueApi.php)                     | **v46**                  |
| [Legal Entity Management API](https://docs.adyen.com/api-explorer/legalentity/3/overview)                  | The Legal Entity Management API enables you to manage legal entities that contain information required for verification                                                                                                                                                                                                      | [LegalEntityManagement](src/Adyen/Service/LegalEntityManagement)        | **v3**                   |
| [Transfers API](https://docs.adyen.com/api-explorer/transfers/3/overview)                                  | The Transfers API provides endpoints that you can use to get information about all your transactions, move funds within your balance platform or send funds from your balance platform to a transfer instrument.                                                                                                             | [Transfers](src/Adyen/Service/Transfers)                                | **v3**                   |
| [Balance Control API](https://docs.adyen.com/api-explorer/BalanceControl/1/overview)                       | The Balance Control API lets you transfer funds between merchant accounts that belong to the same legal entity and are under the same company account.                                                                                                                                                                       | [BalanceControl](src/Adyen/Service/BalanceControlApi.php)               | **v1**                   |
| [Hosted Onboarding API](https://docs.adyen.com/api-explorer/Hop/1/overview)                                | The Hosted onboarding API provides endpoints that you can use to generate links to Adyen-hosted pages, such as an onboarding page or a PCI compliance questionnaire. You can provide these links to your account holders so that they can complete their onboarding.                                                         | [HostedOnboardingPages](src/Adyen/Service/Hop.php)                      | **v1**                   |
| [Account API](https://docs.adyen.com/api-explorer/Account/5/overview)                                      | The Account API provides endpoints for managing account-related entities on your platform. These related entities include account holders, accounts, bank accounts, shareholders, and verification-related documents. The management operations include actions such as creation, retrieval, updating, and deletion of them. | [Account](src/Adyen/Service/Account.php)                                | **v5**                   |
| [Fund API](https://docs.adyen.com/api-explorer/Fund/5/overview)                                            | The Fund API provides endpoints for managing the funds in the accounts on your platform. These management operations include, for example, the transfer of funds from one account to another, the payout of funds to an account holder, and the retrieval of balances in an account.                                         | [Fund](src/Adyen/Service/Fund.php)                                      | **v5**                   |
| [Terminal API (Cloud communications)](https://docs.adyen.com/point-of-sale/choose-your-architecture/cloud) | Our point-of-sale integration.                                                                                                                                                                                                                                                                                               | [Cloud-based Terminal API](src/Adyen/Service/PosPayment.php)            | Cloud-based Terminal API |      |
| [Terminal API (Local communications)](https://docs.adyen.com/point-of-sale/choose-your-architecture/local) | Our point-of-sale integration.                                                                                                                                                                                                                                                                                               | [Local-based Terminal API](src/Adyen/Service/PosPayment.php)            | Local-based Terminal API |      |
| [POS Terminal Management API](https://docs.adyen.com/api-explorer/postfmapi/1/overview)                    | This API provides endpoints for managing your point-of-sale (POS) payment terminals. You can use the API to obtain information about a specific terminal, retrieve overviews of your terminals and stores, and assign terminals to a merchant account or store.                                                              | [POSTerminalManagement](src/Adyen/Service/POSTerminalManagementApi.php) | **v1**                   |

## Supported Webhook versions
The library supports all webhooks under the following model directories:

| Webhooks                                                                                          | Description                                                                                                                                                                             | Model Name                                                         | Supported Version |
|---------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------|-------------------|
| [Authentication Webhooks](https://docs.adyen.com/api-explorer/acs-webhook/1/overview) | Adyen sends this webhook when the process of cardholder authentication is finalized, whether it is completed successfully, fails, or expires.              | [AcsWebhooks](src/Adyen/Model/AcsWebhooks) | **v1**            |
| [Configuration Webhooks](https://docs.adyen.com/api-explorer/balanceplatform-webhooks/1/overview) | You can use these webhooks to build your implementation. For example, you can use this information to update internal statuses when the status of a capability is changed.              | [ConfigurationWebhooks](src/Adyen/Model/ConfigurationWebhooks) | **v1**            |
| [Transfer Webhooks](https://docs.adyen.com/api-explorer/transfer-webhooks/3/overview)             | You can use these webhooks to build your implementation. For example, you can use this information to update balances in your own dashboards or to keep track of incoming funds.        | [TransferWebhooks](src/Adyen/Model/TransferWebhooks)           | **v3**            |
| [Report Webhooks](https://docs.adyen.com/api-explorer/report-webhooks/1/overview)                 | You can download reports programmatically by making an HTTP GET request, or manually from your Balance Platform Customer Area                                                           | [ReportWebhooks](src/Adyen/Model/ReportWebhooks)               | **v1**            |
| [Management Webhooks](https://docs.adyen.com/api-explorer/ManagementNotification/1/overview)                 | Adyen uses webhooks to inform your system about events that happen with your Adyen company and merchant accounts, stores, payment terminals, and payment methods when using Management API.                                                           | [ManagementWebhooks](src/Adyen/Model/ManagementWebhooks)               | **v1**            |
| [Notification Webhooks](https://docs.adyen.com/api-explorer/Webhooks/1/overview)                  | We use webhooks to send you updates about payment status updates, newly available reports, and other events that you can subscribe to. For more information, refer to our documentation | [Notification](src/Adyen/Service/Notification.php)                 | **v1**            |

For more information, refer to our [documentation](https://docs.adyen.com/) or the [API Explorer](https://docs.adyen.com/api-explorer/).


## Prerequisites

- [Adyen test account](https://docs.adyen.com/get-started-with-adyen)
- [API key](https://docs.adyen.com/development-resources/api-credentials#generate-api-key). For testing, your API credential needs to have the [API PCI Payments role](https://docs.adyen.com/development-resources/api-credentials#roles).
- PHP 7.3 or later
- cURL with SSL support.
- The PHP extensions: ctype, curl, json, mbstring and openssl.
- See [composer require list](https://github.com/Adyen/adyen-php-api-library/blob/develop/composer.json#L10) for the complete list of dependencies.

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

$service = new \Adyen\Service\Checkout\PaymentsApi($client);

// Create PaymentMethod object
$paymentMethod = new CheckoutPaymentMethod();
$paymentMethod
    ->setType("scheme")
    ->setEncryptedBankAccountNumber("test_4111111111111111")
    ->setEncryptedExpiryMonth("test_03")
    ->setEncryptedExpiryYear("test_2030")
    ->setEncryptedSecurityCode("test_737");
// Creating Amount Object
$amount = new Amount();
$amount
    ->setValue(1500)
    ->setCurrency("EUR");
// Create the actual Payments Request
$paymentRequest = new PaymentRequest();
$paymentRequest
    ->setMerchantAccount("YOUR MERCHANT ACCOUNT")
    ->setPaymentMethod($paymentMethod)
    ->setAmount($amount)
    ->setReference("payment-test")
    ->setReturnUrl("https://your-company.com/...");

$result = $service->payments($paymentRequest);
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

...
~~~~

### Instantiating the request objects through the arrayAccess implementation (for easy migration)
~~~~ php
...

$service = new \Adyen\Service\Checkout\PaymentsApi($client);

$params = array(
    'merchantAccount' => "YourMerchantAccount",
    'reference' => '12345',
    'amount' => array('currency' => "BRL", 'value' => 1250),
    'countryCode' => "BR",
    'shopperReference' => "YourUniqueShopperId",
    'shopperEmail' => "test@email.com",
    'shopperLocale' => "pt_BR",
    'billingAddress' => array(...),
    'deliveryAddress' => array(...),
);
$createPaymentLinkRequest = new CreatePaymentLinkRequest($params);

$result = $service->paymentLinks($createPaymentLinkRequest);

$paymentLink = $result->getUrl(); // or use $result['url'] if you want to use arrayAccess
~~~~
### Using Banking Webhooks
~~~~ php
...

$jsonString = 'webhook_payload';
$isValid = $hmac->validateHMAC("YOUR_HMAC_KEY", "YOUR_HMAC_SIGN", $jsonString);

if ($isValid) {
    $webhookParser = new BankingWebhookParser($jsonString);
    $result = $webhookParser->getGenericWebhook();
}
~~~~
### Using Management Webhooks
~~~~ php
...

$jsonString = 'webhook_payload';
$isValid = $hmac->validateHMAC("YOUR_HMAC_KEY", "YOUR_HMAC_SIGN", $jsonString);

if ($isValid) {
    $webhookParser = new ManagementWebhookParser($jsonString);
    $result = $webhookParser->getGenericWebhook();
}
~~~~

### Example integration

For a closer look at how our PHP library works, clone our [Laravel example integration](https://github.com/adyen-examples/adyen-php-online-payments). This includes commented code, highlighting key features and concepts, and examples of API calls that can be made using the library.

### Running the tests
For the test cases you need the PCI permission enabled on you account. There are no test cases for CSE because credit card data is encrypted through our javascript library.
By default the test will then be skipped. If you have these permissions fill in your account details in the config/test.ini file to let the test work.
To make the automatic testing cases work for your account change the credentials in the config/test.ini file.

## Feedback
We value your input! Help us enhance our API Libraries and improve the integration experience by providing your feedback. Please take a moment to fill out [our feedback form](https://forms.gle/A4EERrR6CWgKWe5r9) to share your thoughts, suggestions or ideas.

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
