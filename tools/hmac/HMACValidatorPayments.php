<?php

// script to calculate the HMAC signature of Payments webhooks (where the signature is calculated considering
// a subset of the fields in the payload - i.e. NotificationRequestItem object)
//
// Run with: `php tools/hmac/HMACValidatorPayments.php {hmacKey} {path to JSON file}
// php tools/hmac/HMACValidatorPayments.php 51757397D785FBAE710E7F943F307971BB61B21281C98C9129B3D4018A57B2EB tools/hmac/payload.json

require_once __DIR__ . '/../../vendor/autoload.php';

use Adyen\Util\HmacSignature;

if ($argc !== 3) {
    echo "Usage: php calculate_hmac.php <hmacKey> <payloadFile>\n";
    exit(1);
}

$hmacKey = $argv[1];
$payloadFile = $argv[2];

if (!file_exists($payloadFile)) {
    echo "Error: File '$payloadFile' not found.\n";
    exit(1);
}

echo "Calculating HMAC signature with payload from '$payloadFile'\n";

// load payload as JSON
$payload = file_get_contents($payloadFile);
$payload = json_decode($payload, true);

// Fetch the first (and only) NotificationRequestItem
$notificationItems = $payload['notificationItems'];
$notificationRequestItem = array_shift($notificationItems);

$hmacSignature = new HmacSignature();
$signature = $hmacSignature->calculateNotificationHMAC($hmacKey, $notificationRequestItem);

echo "HMAC Signature-> $signature\n";
exit(0);
