<?php
// Get the incoming JSON request from Dialogflow
$request = file_get_contents('php://input');
$input = json_decode($request, true);

// Log the request (optional for debugging)
// file_put_contents("log.txt", print_r($input, true));

$intent = $input['queryResult']['intent']['displayName'] ?? '';

// Define response based on intent
$responseText = "Sorry, I didn't understand.";

if ($intent === 'Ask Visa Status') {
    // In the future: look up DB with $clientName
    $clientName = $input['originalDetectIntentRequest']['payload']['data']['ClientName'] ?? '';
    $responseText = "Visa status for $clientName is: Approved.";
} elseif ($intent === 'test') {
    // Respond to the "test" intent
    $responseText = "Test received! This is a test response from webhook.";
}

// Send response back to Dialogflow
$response = [
    'fulfillmentText' => $responseText
];

header('Content-Type: application/json');
echo json_encode($response);
