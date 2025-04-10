<?php

// script to calculate the HMAC signature of Banking/Management webhooks (where the signature is calculated over the
// entire webhook payload)
//
// Run with: `php tools/hmac/HMACValidatorBanking.php {hmacKey} {path to JSON file}
// php tools/hmac/HMACValidatorBanking.php 11223344D785FBAE710E7F943F307971BB61B21281C98C9129B3D4018A57B2EB tools/hmac/payload2.json

require_once __DIR__ . '/../../vendor/autoload.php';

use Adyen\Util\HmacSignature;

if ($argc !== 3) {
    echo "‼️Error running the script\n";
    echo "Usage: php HMACValidatorBanking.php <hmacKey> <payloadFile>\n";
    exit(1);
}


$hmacKey = $argv[1];
$payloadFile = $argv[2];

if (!file_exists($payloadFile)) {
    echo "Error: File '$payloadFile' not found.\n";
    exit(1);
}

// load payload
$payload = file_get_contents($payloadFile);

echo "Calculating HMAC signature with payload from '$payloadFile'\n";
echo "********\n";
echo "Payload file: '$payloadFile'\n";
echo "Payload length: " . strlen($payload) . "\n";

$hmacSignature = new HmacSignature();
$signature = $hmacSignature->calculateHmacSignature($hmacKey, $payload);

echo "HMAC Signature-> $signature\n";
exit(0);
