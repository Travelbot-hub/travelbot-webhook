<?php
$request = file_get_contents('php://input');
$input = json_decode($request, true);

$intent = $input['queryResult']['intent']['displayName'] ?? '';
$clientName = $input['originalDetectIntentRequest']['payload']['data']['ClientName'] ?? '';

$responseText = "Sorry, I didn't understand.";

if ($intent === 'Ask Visa Status') {
    $responseText = "Visa status for $clientName is: Approved."; // Modify as needed
} elseif ($intent === 'Ask Airport Name') {
    $iata = $input['queryResult']['parameters']['iata-code'] ?? '';
    $responseText = "You asked about airport code: $iata.";
}

$response = ['fulfillmentText' => $responseText];

header('Content-Type: application/json');
echo json_encode($response);
