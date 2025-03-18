<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h2 class="text-center mb-4">Flight Search Results</h2>
    <div id="flightsContainer" class="row g-3"></div>
</div>

<script>
    function getAirlineName(code) {
        const airlines = {
            "AA": "American Airlines", "DL": "Delta Airlines", "UA": "United Airlines",
            "BA": "British Airways", "LH": "Lufthansa", "EK": "Emirates",
            "QR": "Qatar Airways", "SQ": "Singapore Airlines", "AI": "Air India"
        };
        return airlines[code] || "Unknown Airline";
    }

    function getAirlineLogo(code) {
        const logos = {
            "AA": "https://upload.wikimedia.org/wikipedia/commons/a/a0/American_Airlines_logo_2013.svg",
            "DL": "https://upload.wikimedia.org/wikipedia/commons/7/78/Delta_Air_Lines_Logo.svg",
            "UA": "https://upload.wikimedia.org/wikipedia/commons/7/7d/United_Airlines_Logo.svg",
            "EK": "https://upload.wikimedia.org/wikipedia/commons/6/6d/Emirates_logo.svg",
            "QR": "https://upload.wikimedia.org/wikipedia/en/5/53/Qatar_Airways_Logo.svg",
            "AI": "https://upload.wikimedia.org/wikipedia/commons/b/bf/Air_India_2023.svg"
        };
        return logos[code] || "https://via.placeholder.com/60";
    }

    document.addEventListener("DOMContentLoaded", function () {
        const flightsContainer = document.getElementById("flightsContainer");
        const flights = JSON.parse(localStorage.getItem("flightResults")) || [];

        if (flights.length === 0) {
            flightsContainer.innerHTML = "<p class='text-center'>No flights available.</p>";
            return;
        }

        flights.forEach((flight) => {
            const itinerary = flight.itineraries[0];
            const departure = itinerary.segments[0].departure;
            const arrival = itinerary.segments[itinerary.segments.length - 1].arrival;
            const price = flight.price.total;
            const currency = flight.price.currency;
            const airlineCode = itinerary.segments[0].carrierCode;
            const airlineName = getAirlineName(airlineCode);
            const airlineLogo = getAirlineLogo(airlineCode);
            const stops = itinerary.segments.length - 1;
            const duration = itinerary.duration.replace("PT", "").toLowerCase();

            const flightCard = `
                <div class="col-md-6">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <img src="${airlineLogo}" alt="${airlineName}" class="me-3" width="50">
                            <h5 class="mb-0">${airlineName}</h5>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col">
                                <p class="mb-1">Departure</p>
                                <h6>${departure.iataCode} - ${departure.at.replace("T", " ")}</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1">Arrival</p>
                                <h6>${arrival.iataCode} - ${arrival.at.replace("T", " ")}</h6>
                            </div>
                        </div>
                        <div class="row text-center mt-2">
                            <div class="col">
                                <p class="mb-1">Duration</p>
                                <h6>${duration}</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1">Stops</p>
                                <h6>${stops === 0 ? "Non-stop" : `${stops} Stop(s)`}</h6>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <h5 class="text-primary">$${price} ${currency}</h5>
                        </div>
                        <div class="text-center">
                            <form action="booking.php" method="post">
                                <input type="hidden" name="flightData" value='${JSON.stringify(flight)}' />
                                <button type="submit" class="btn btn-primary w-100">View Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            `;

            flightsContainer.innerHTML += flightCard;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
