<?php
if (!isset($_GET['q'])) {
    echo json_encode([]);
    exit;
}

$query = $_GET['q'];
$apiKey = "seyC8vGzjcD1O2HB4ZfA8SgsEKknZqAS";
$apiSecret = "CoeDOtg5KL2KCgvw";

// Get access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.cclkeaom/v1/security/oauth2/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=$apiKey&client_secret=$apiSecret");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = ["Content-Type: application/x-www-form-urlencoded"];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

$token = $response['access_token'] ?? '';

if (!$token) {
    echo json_encode([]);
    exit;
}

// Fetch locations
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&keyword=$query");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $token"]);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

$locations = [];
foreach ($response['data'] as $location) {
    $locations[] = [
        "name" => $location['name'],
        "code" => $location['iataCode']
    ];
}

echo json_encode($locations);
?>
