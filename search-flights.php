<?php
header("Content-Type: application/json");

function getAccessToken() {
    $client_id = "Dy2NVEtAR09VEP4mAFahqXpwUGlMmevH";
    $client_secret = "p0ugPssTug23Q3Uc";

    $url = "https://test.api.amadeus.com/v1/security/oauth2/token";
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
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo json_encode(["error" => "Failed to get access token"]);
        exit;
    }

    $response = json_decode($result, true);
    return $response['access_token'] ?? null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departure_date'];
    $returnDate = $_POST['return_date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];

    $accessToken = getAccessToken();
    if (!$accessToken) {
        echo json_encode(["error" => "Authorization failed"]);
        exit;
    }

    $url = "https://test.api.amadeus.com/v2/shopping/flight-offers?"
         . "originLocationCode=" . strtoupper($origin)
         . "&destinationLocationCode=" . strtoupper($destination)
         . "&departureDate=" . $departureDate
         . "&returnDate=" . $returnDate
         . "&adults=" . $adults
         . "&children=" . $children
         . "&max=5";

    $options = [
        "http" => [
            "header" => "Authorization: Bearer " . $accessToken,
            "method" => "GET"
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo json_encode(["error" => "Failed to fetch flight data"]);
        exit;
    }

    echo $result;
}
?>
