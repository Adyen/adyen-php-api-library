<?php

// script to calculate the HMAC signature of Payments webhooks (where the signature is calculated considering
// a subset of the fields in the payload - i.e. NotificationRequestItem object)
//
// Run with: `php tools/hmac/HMACValidatorPayments.php {hmacKey} {path to JSON file}
// php tools/hmac/HMACValidatorPayments.php 11223344D785FBAE710E7F943F307971BB61B21281C98C9129B3D4018A57B2EB tools/hmac/payload.json

require_once __DIR__ . '/../../vendor/autoload.php';

use Adyen\Util\HmacSignature;

if ($argc !== 3) {
    echo "‼️Error running the script\n";
    echo "Usage: php HMACValidatorPayments.php <hmacKey> <payloadFile>\n";
    exit(1);
}

$hmacKey = $argv[1];
$payloadFile = $argv[2];

if (!file_exists($payloadFile)) {
    echo "Error: File '$payloadFile' not found.\n";
    exit(1);
}

// load payload as JSON
$payload = file_get_contents($payloadFile);
$jsonData = json_decode($payload, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error: Invalid JSON in payload file.\n";
    exit(1);
}

if (!isset($jsonData['notificationItems']) || !is_array($jsonData['notificationItems'])) {
    echo "Error: 'notificationItems' key is missing or not an array.\n";
    exit(1);
}

// Fetch the first (and only) NotificationRequestItem
$notificationRequestItem = $jsonData['notificationItems'][0]['NotificationRequestItem'] ?? null;

if ($notificationRequestItem === null) {
    echo "Error: 'NotificationRequestItem' is not found.\n";
    exit(1);
}

echo "Calculating HMAC signature with payload from '$payloadFile'\n";
echo "********\n";
echo "Payload file: '$payloadFile'\n";
echo "Payload length: " . strlen($payload) . "\n";


// Log notificationRequestItem
//print_r($notificationRequestItem);

$hmacSignature = new HmacSignature();
$signature = $hmacSignature->calculateNotificationHMAC($hmacKey, $notificationRequestItem);

echo "HMAC Signature-> $signature\n";
exit(0);
