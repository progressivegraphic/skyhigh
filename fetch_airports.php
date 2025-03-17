<?php
// Amadeus API Credentials
$client_id = "Dy2NVEtAR09VEP4mAFahqXpwUGlMmevH";
    $client_secret = "p0ugPssTug23Q3Uc";

// Function to get API token
function getAccessToken($client_id, $client_secret) {
    $token_url = "https://test.api.amadeus.com/v1/security/oauth2/token";

    $data = [
        "grant_type" => "client_credentials",
        "client_id" => $client_id,
        "client_secret" => $client_secret
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "method" => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);

    return json_decode($response, true)['access_token'];
}

// Fetch API token
$token = getAccessToken($client_id, $client_secret);

// API URL for fetching airport codes
$api_url = "https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=AIR";

// Set API headers
$options = [
    "http" => [
        "header" => "Authorization: Bearer " . $token,
        "method" => "GET"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($api_url, false, $context);

$airports = json_decode($response, true);
$airport_list = [];

if (!empty($airports['data'])) {
    foreach ($airports['data'] as $airport) {
        $airport_list[] = [
            "code" => $airport['iataCode'],
            "name" => $airport['name']
        ];
    }
}

echo json_encode($airport_list);
?>
