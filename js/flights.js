
  const apiKey = "seyC8vGzjcD1O2HB4ZfA8SgsEKknZqAS";
  const apiSecret = "CoeDOtg5KL2KCgvw";
  let accessToken = null;

  async function getAccessToken() {
    if (accessToken) return accessToken;
    
    try {
      const response = await fetch("https://test.api.amadeus.com/v1/security/oauth2/token", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          grant_type: "client_credentials",
          client_id: apiKey,
          client_secret: apiSecret,
        }),
      });

      const data = await response.json();
      accessToken = data.access_token;
      return accessToken;
    } catch (error) {
      console.error("Error fetching token:", error);
    }
  }

  async function fetchAirports(query, dropdownId, inputId) {
    if (query.length < 3) {
      document.getElementById(dropdownId).style.display = "none";
      return;
    }

    const token = await getAccessToken();
    if (!token) return;

    try {
      const response = await fetch(
        `https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT,CITY&keyword=${query}`,
        {
          headers: { Authorization: `Bearer ${token}` },
        }
      );

      const data = await response.json();
      displayDropdown(data.data, dropdownId, inputId);
    } catch (error) {
      console.error("Error fetching airports:", error);
    }
  }

  function displayDropdown(options, dropdownId, inputId) { 
    const dropdown = document.getElementById(dropdownId);
    dropdown.innerHTML = "";
    dropdown.style.display = options.length ? "block" : "none";

    options.forEach((item) => {
      const option = document.createElement("div");
      option.textContent = `${item.name} (${item.iataCode})`;
      option.onclick = function () {
        document.getElementById(inputId).value = item.iataCode;
        dropdown.style.display = "none";
      };
      dropdown.appendChild(option);
    });
  }

  document.getElementById("flyingFrom").addEventListener("input", (event) => {
    fetchAirports(event.target.value, "fromDropdown", "flyingFrom");
  });

  document.getElementById("flyingTo").addEventListener("input", (event) => {
    fetchAirports(event.target.value, "toDropdown", "flyingTo");
  });
  document.addEventListener("DOMContentLoaded", function () {
    let departPicker, returnPicker;

    // Initialize Depart Date Picker
    departPicker = flatpickr("#departDate", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disableMobile: "true",
        onChange: function (selectedDates) {
            if (selectedDates.length > 0) {
                returnPicker.set("minDate", selectedDates[0]);
                returnPicker.open(); // Automatically open return date picker
            }
        },
    });

    // Initialize Return Date Picker
    returnPicker = flatpickr("#returnDate", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disableMobile: "true",
    });

    // Ensure dates are selected only after choosing departure & arrival
    document.getElementById("flyingFrom").addEventListener("change", validateAirportSelection);
    document.getElementById("flyingTo").addEventListener("change", validateAirportSelection);

    function validateAirportSelection() {
        const origin = document.getElementById("flyingFrom").value;
        const destination = document.getElementById("flyingTo").value;

        if (origin && destination) {
            document.getElementById("departDate").disabled = false;
            document.getElementById("returnDate").disabled = false;
        } else {
            document.getElementById("departDate").disabled = true;
            document.getElementById("returnDate").disabled = true;
        }
    }
});

document.getElementById("searchFlights").addEventListener("click", async function (event) {
  event.preventDefault();

  const origin = document.getElementById("flyingFrom").value;
  const destination = document.getElementById("flyingTo").value;
  const departureDate = document.getElementById("departDate").value;
  const returnDate = document.getElementById("returnDate").value;
  const adults = document.getElementById("numAdults").value;
  const children = document.getElementById("numChildren").value;

  if (!origin || !destination || !departureDate) {
      alert("Please fill in all required fields.");
      return;
  }

  document.getElementById("loadingIndicator").style.display = "block";

  const token = await getAccessToken();
  if (!token) return;

  const apiUrl = `https://test.api.amadeus.com/v2/shopping/flight-offers?originLocationCode=${origin}&destinationLocationCode=${destination}&departureDate=${departureDate}&returnDate=${returnDate}&adults=${adults}&children=${children}&currencyCode=USD`;

  try {
      const response = await fetch(apiUrl, { headers: { Authorization: `Bearer ${token}` } });
      const data = await response.json();
      document.getElementById("loadingIndicator").style.display = "none";

      if (!data.data || data.data.length === 0) {
          alert("No flights found.");
          return;
      }

      localStorage.setItem("flightResults", JSON.stringify(data.data));
      window.location.href = "flight-result.php"; // Redirect to PHP page

  } catch (error) {
      console.error("Error fetching flights:", error);
  }
});

  function displayFlights(flights) {
    const displayContainer = document.getElementById("displayFlights");
    displayContainer.innerHTML = ""; // Clear previous results

    if (!flights || flights.length === 0) {
        displayContainer.innerHTML = "<p style='text-align:center;color:white;'>No flights available.</p>";
        return;
    }

    flights.forEach((flight) => {
        const itinerary = flight.itineraries[0]; // First itinerary
        const departure = itinerary.segments[0].departure;
        const arrival = itinerary.segments[itinerary.segments.length - 1].arrival;
        const price = flight.price.total;
        const currency = flight.price.currency;
        const airlineCode = itinerary.segments[0].carrierCode; // Getting airline code
        const airlineName = getAirlineName(airlineCode); // Fetching airline name
        const airlineLogo = getAirlineLogo(airlineCode); // Fetching airline logo
        const stops = itinerary.segments.length - 1; // Number of stops
        const duration = itinerary.duration.replace("PT", "").toLowerCase(); // Format duration

        const flightCard = document.createElement("div");
        flightCard.classList.add("flight-card");
        flightCard.innerHTML = `
            <form action="results.php" method="post">
                <input type="hidden" name="flightData" value='${JSON.stringify(flight)}' />
                <img src="${airlineLogo}" alt="${airlineName}" class="airline-logo" />
                <p class="airline">✈️ ${airlineName} (${airlineCode})</p>
                <p class="flight-route">${departure.iataCode} ✈️ ${arrival.iataCode}</p>
                <div class="flight-details">
                    <p><strong>Departure:</strong> ${departure.at.replace("T", " ")}</p>
                    <p><strong>Arrival:</strong> ${arrival.at.replace("T", " ")}</p>
                    <p><strong>Duration:</strong> ${duration}</p>
                    <p><strong>Stops:</strong> ${stops === 0 ? "Direct Flight" : `${stops} Stop(s)`}</p>
                </div>
                <p class="price">$${price} ${currency}</p>
                <button type="submit" class="book-btn">View Details</button>
            </form>
        `;

        displayContainer.appendChild(flightCard);
    });
}


// Function to map airline codes to airline names


$(document).ready(function () {
  $("#registerBtn").click(function () {
    let username = $("#username").val();
    let fullName = $("#full_name").val();
    let email = $("#email").val();
    let password = $("#password").val();

    if (username == "" || fullName == "" || email == "" || password == "") {
      alert("All fields are required!");
      return;
    }

    $.ajax({
      url: "register.php",
      type: "POST",
      data: { username, full_name: fullName, email, password },
      success: function (response) {
        alert(response);
        if (response.includes("success")) {
          $("#registerForm")[0].reset();
          $("#register").modal("hide");
        }
      }
    });
  });
});
$(document).ready(function () {
    $(".nav-tabs li a").click(function () {
      $(".nav-tabs li").removeClass("active");
      $(this).parent().addClass("active");
    });
  });
  let flightCount = 1;

  function addFlight() {
    if (flightCount >= 5) {
      alert("You can only add up to 5 flights.");
      return;
    }

    const flightForms = document.getElementById("flightForms");
    const flightForm = document.querySelector(".flight-form");

    // Clone the flight form and remove labels
    const newFlight = flightForm.cloneNode(true);
    newFlight.querySelectorAll("label").forEach((label) => label.remove());

    flightForms.appendChild(newFlight);
    flightCount++;
  }


  document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent page reload

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);

    fetch("login.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        if (data.includes("success")) {
          window.location.reload(); // Reload the page on successful login
        } else {
          document.getElementById("loginMessage").innerHTML = '<div class="alert alert-danger">' + data + '</div>';
        }
      })
      .catch(error => console.error("Error:", error));
  });  