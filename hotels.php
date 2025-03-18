<?php
if (!isset($_GET['destination'])) {
    die("Missing required parameters.");
}

set_time_limit(300); // Increase script execution time

$destination = urlencode($_GET['destination']);
$apiKey = "seyC8vGzjcD1O2HB4ZfA8SgsEKknZqAS"; // Amadeus API Key
$apiSecret = "CoeDOtg5KL2KCgvw";
$googleApiKey = "YOUR_GOOGLE_API_KEY"; // Replace with your Google Places API Key

// Step 1: Get Access Token from Amadeus API
$authUrl = "https://test.api.amadeus.com/v1/security/oauth2/token";
$authData = http_build_query([
    "grant_type" => "client_credentials",
    "client_id" => $apiKey,
    "client_secret" => $apiSecret
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $authData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);

$authResponse = json_decode(curl_exec($ch), true);
curl_close($ch);

if (!isset($authResponse['access_token'])) {
    die("Error: Failed to retrieve access token.");
}

$token = $authResponse['access_token'];

// Step 2: Get All Hotels in the City
$hotelSearchUrl = "https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=$destination";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hotelSearchUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/json"
]);

$hotelSearchResponse = json_decode(curl_exec($ch), true);
curl_close($ch);

// Check if valid hotels are found
if (!isset($hotelSearchResponse['data']) || empty($hotelSearchResponse['data'])) {
    die("<p>No hotels found for city: " . htmlspecialchars($_GET['destination']) . "</p>");
}

// Step 3: Extract Hotel Data
$allHotels = [];
foreach ($hotelSearchResponse['data'] as $hotel) {
    $allHotels[] = [
        'hotelId' => $hotel['hotelId'] ?? '',
        'name' => $hotel['name'] ?? 'Unknown Hotel',
        'latitude' => $hotel['geoCode']['latitude'] ?? '',
        'longitude' => $hotel['geoCode']['longitude'] ?? ''
    ];
}

// Step 4: Fetch Hotel Offers with Images
$allHotelOffers = [];
foreach ($allHotels as $hotel) {
    $hotelOffersUrl = "https://test.api.amadeus.com/v3/shopping/hotel-offers?hotelIds=" . $hotel['hotelId'] . "&include=hotel.images";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $hotelOffersUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $token",
        "Content-Type: application/json"
    ]);

    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    if (isset($response['data'][0])) {
        $offer = $response['data'][0];
        $hotel['rating'] = $offer["hotel"]["rating"] ?? "Not Rated";
        $hotel['price'] = $offer["offers"][0]["price"]["total"] ?? "N/A";
        $hotel['currency'] = $offer["offers"][0]["price"]["currency"] ?? "";
        $hotel['services'] = implode(", ", $offer["hotel"]["amenities"] ?? ["Not Available"]);
        $hotel['bookingUrl'] = $offer["offers"][0]["url"] ?? "#";

        // Fetch Amadeus Image
        $hotel['image'] = $offer["hotel"]["media"][0]["uri"] ?? '';

        $allHotelOffers[] = $hotel;
    }
}

// Step 5: Fetch Google Place Images if Amadeus Images are Missing
foreach ($allHotelOffers as &$hotel) {
    if (empty($hotel['image'])) {
        $googleSearchUrl = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=" . urlencode($hotel['name']) . "&inputtype=textquery&fields=photos&key=$googleApiKey";
        $googleResponse = json_decode(file_get_contents($googleSearchUrl), true);

        if (!empty($googleResponse['candidates'][0]['photos'][0]['photo_reference'])) {
            $photoReference = $googleResponse['candidates'][0]['photos'][0]['photo_reference'];
            $hotel['image'] = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=$googleApiKey";
        } else {
            $hotel['image'] = "https://via.placeholder.com/300x200"; // Default placeholder
        }
    }
}

// HTML Output
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome -->
</head>
<body class="bg-light">

<div class="container my-4">
    <h2 class="text-center text-primary"><i class="fas fa-hotel"></i> Hotels in ' . htmlspecialchars($_GET["destination"]) . '</h2>
    
    <div class="row justify-content-center mt-4">';

    // Display Hotels with Offers
    foreach ($allHotelOffers as $offer) {
        echo '<div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="' . htmlspecialchars($offer['image']) . '" class="card-img-top" alt="' . htmlspecialchars($offer['name']) . '" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><i class="fas fa-bed"></i> ' . htmlspecialchars($offer['name']) . '</h5>
                        <p class="card-text"><i class="fas fa-star"></i> <b>Rating:</b> ' . htmlspecialchars($offer['rating']) . '</p>
                        <p class="card-text text-success"><i class="fas fa-dollar-sign"></i> <b>Price:</b> ' . htmlspecialchars($offer['price']) . ' ' . htmlspecialchars($offer['currency']) . '</p>
                        <p class="card-text"><i class="fas fa-concierge-bell"></i> <b>Services:</b> ' . htmlspecialchars($offer['services']) . '</p>
                        <a href="' . $offer['bookingUrl'] . '" class="btn btn-primary w-100"><i class="fas fa-link"></i> View Details</a>
                    </div>
                </div>
            </div>';
    }

echo '</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
?>
