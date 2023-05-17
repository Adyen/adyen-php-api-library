<?php

require __DIR__ . '/vendor/autoload.php';


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