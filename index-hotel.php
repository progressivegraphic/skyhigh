<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sky High Trip - Tour & Travel Multipurpose Services</title>
    <!-- Favicon -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="images/logo-black.png"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--Default CSS-->
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <!--Custom CSS-->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!--Color Switcher CSS-->
    <link rel="stylesheet" href="css/color/color-default.css" />
    <!--Plugin CSS-->
    <link href="css/plugin.css" rel="stylesheet" type="text/css" />
    <!--Flaticons CSS-->
    <link href="fonts/flaticon.css" rel="stylesheet" type="text/css" />
    <!--Font Awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <script src="hotels.js"></script>
    <style>

.user-profile:hover .dropdown-menu {
    display: block;
}
.suggestions {
  position: absolute;
  background: #fff;
  list-style: none;
  padding: 0;
  margin: 5px 0 0;
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  max-height: 200px;
  overflow-y: auto;
  z-index: 1000;
}

.suggestions li {
  padding: 10px;
  cursor: pointer;
}

.suggestions li:hover {
  background: #f0f0f0;
}
    </style>
    <script>
      function fetchLocations() {
    let query = document.getElementById("destination").value;
    if (query.length < 3) return; // Avoid unnecessary API calls

    fetch("fetch_locations.php?q=" + query)
    .then(response => response.json())
    .then(data => {
        let suggestionBox = document.getElementById("destination-suggestions");
        suggestionBox.innerHTML = "";
        data.forEach(location => {
            let item = document.createElement("li");
            item.textContent = location.name;
            item.setAttribute("data-code", location.code);
            item.onclick = function() {
                document.getElementById("destination").value = location.name;
                document.getElementById("destination").setAttribute("data-code", location.code);
                suggestionBox.innerHTML = "";
            };
            suggestionBox.appendChild(item);
        });
    });
}
function fetchHotels() {
    let destinationCode = document.getElementById("destination").getAttribute("data-code");
    let checkIn = document.getElementById("checkIn").value;
    let checkOut = document.getElementById("checkOut").value;
    let guests = document.getElementById("guests").value;

    if (!destinationCode || !checkIn || !checkOut) {
        alert("Please fill all fields.");
        return;
    }

    window.location.href = `hotels.php?destination=${destinationCode}&checkIn=${checkIn}&checkOut=${checkOut}&guests=${guests}`;
}


    </script>
  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
      <div class="header-content">
        <div class="container">
          <div class="links links-left">
            <ul>
              <li>
                <a href="#"><i class="fa fa-phone-alt"></i> 04 892 400 02 </a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa fa-envelope-open"></i> info@skyhightrip.com</a
                >
              </li>
              <li>
                <select>
                  <option>EUR</option>
                  <option>FRA</option>
                  <option>ESP</option>
                </select>
              </li>
            </ul>
          </div>
          <div class="links links-right pull-right">
            <ul>
              <li>
                <ul class="social-links">
                  <li>
                    <a href="#"
                      ><i class="fab fa-facebook" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-twitter" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-instagram" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-linkedin" aria-hidden="true"></i
                    ></a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#login"
                  ><i class="fa fa-sign-in-alt"></i> Login</a
                >
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#register"
                  ><i class="fa fa-sign-out-alt"></i> Register</a
                >
              </li>
              <li>
                <div class="header_sidemenu">
                  <div class="menu">
                    <div class="close-menu">
                      <i class="fa fa-times white"></i>
                    </div>
                    <div class="m-contentmain">
                      <div class="m-logo mar-bottom-30">
                        <img src="images/logo-black.png" alt="m-logo" />
                      </div>

                      <div class="content-box mar-bottom-30">
                        <h3 class="white">Get In Touch</h3>
                        <p class="white">
                          We must explain to you how all seds this mistakens
                          idea off denouncing pleasures and praising pain was
                          born and I will give you a completed accounts..
                        </p>
                        <a href="#" class="biz-btn biz-btn1">Consultation</a>
                      </div>

                      <div class="contact-info">
                        <h4 class="white">Contact Info</h4>
                        <ul>
                          <li>
                            <i class="fa fa-map-marker-alt"></i> Travel 26, Old
                            Brozon Mall, Newyrok NY 10005
                          </li>
                          <li><i class="fa fa-phone-alt"></i>04 892 400 02</li>
                          <li>
                            <i class="fa fa-envelope-open"></i
                            >support@travel.com
                          </li>
                          <li>
                            <i class="fa fa-clock"></i> Week Days: 09.00 to
                            18.00 Sunday: Closed
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="mhead">
                    <span class="menu-ham"
                      ><i class="fa fa-bars white"></i
                    ></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Navigation Bar -->
      <div class="header_menu affix-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex">
                    <!-- Brand Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo-black.png" alt="image" />
                        </a>
                    </div>
    
                    <!-- Navigation Links -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="dropdown submenu active">
                                <a href="index.html">
                                    <i class="fa fa-plane"></i> Flights
                                </a>
                            </li>
                            <li>
                                <a href="index-hotel.html">
                                    <i class="fa fa-bed"></i> Hotel
                                </a>
                            </li>
                            <li>
                                <a href="packages.html">
                                    <i class="fa fa-gift"></i> Packages
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    <i class="fa fa-envelope"></i> Contact Us
                                </a>
                            </li>
    
                            <!-- User Profile with Hover Dropdown -->
                            <li class="dropdown user-profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i> Account <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="login.html"><i class="fa fa-sign-in"></i> Login</a></li>
                                    <li><a href="register.html"><i class="fa fa-user-plus"></i> Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    

      <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->
    <!-- banner starts -->
    <section class="banner ver-banner">
      <div class="slider">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-inner">
                <div
                  class="slide-image"
                  style="background-image: url(images/slider/slider17.jpg)"
                ></div>
                <div class="swiper-content">
                  <h1>Welcome to <span>Sky High Trip Hotel</span></h1>
                  <p class="mar-bottom-30">
                    Foresee the pain and trouble that are bound to ensue and
                    equal fail in their duty through weakness.
                  </p>
                </div>
                <div class="overlay"></div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-inner">
                <div
                  class="slide-image"
                  style="background-image: url(images/slider/slider18.jpg)"
                ></div>
                <div class="swiper-content">
                  <h1><span>Book your dream </span> With us</h1>
                  <p class="mar-bottom-30">
                    Find awesome hotel, tour, car and activities in London
                  </p>
                </div>
                <div class="overlay"></div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-inner">
                <div
                  class="slide-image"
                  style="background-image: url(images/slider/slider19.jpg)"
                ></div>
                <div class="swiper-content">
                  <h1>Your <span>Adventure</span> Travel Experts In Europe!</h1>
                  <p class="mar-bottom-30">
                    Find awesome hotel, tour, car and activities in London
                  </p>
                </div>
                <div class="overlay"></div>
              </div>
            </div>
          </div>
          <!-- Add Arrows -->
          <!-- <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div> -->
        </div>
      </div>
      <div
        class="border-line"
        style="background-image: url(images/border-line.png)"
      ></div>
    </section>
    <!-- banner ends -->

    <!-- form starts -->
    <section class="banner-form hotel-form">
    <div class="container">
        <div class="form-outer">
            <div class="form-content">
                <form action="hotels.php" method="GET">
                    <div class="row filter-box">
                        <div class="col-lg-3 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Your Destination</label>
                                <div class="input-box">
                                    <i class="flaticon-placeholder"></i>
                                    <input type="text" id="destination" name="destination" placeholder="Where are you going?" onkeyup="fetchLocations()" autocomplete="off">
                                    <ul id="destination-suggestions" class="suggestions"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Check In</label>
                                <div class="input-box">
                                    <i class="flaticon-calendar"></i>
                                    <input id="checkIn" name="checkIn" type="date" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Check Out</label>
                                <div class="input-box">
                                    <i class="flaticon-calendar"></i>
                                    <input id="checkOut" name="checkOut" type="date" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Guests</label>
                                <div class="input-box">
                                    <i class="flaticon-add-user"></i>
                                    <select id="guests" name="guests" class="niceSelect">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-12 col-12">
                            <div class="form-group mar-top-30">
                                <button type="submit" class="biz-btn" onclick="fetchHotels()">
                                    <i class="fa fa-search"></i> Find Now
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- form ends -->

    <!-- partners starts -->
    <section class="partners bg-grey">
      <div class="container">
        <div class="dest-partner">
          <div class="row partner-slider">
            <div class="col-lg-2">
              <img src="images/cl-1.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-2.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-3.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-4.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-5.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-2.png" alt="partners" />
            </div>
            <div class="col-lg-2">
              <img src="images/cl-3.png" alt="partners" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- partners ends -->

    <!-- why us starts -->
    <section class="why-us hotel-why-us">
      <div class="container">
        <div class="why-us-box">
          <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="why-us-item why-us-item1 text-center">
                <div class="why-us-icon">
                  <i class="flaticon-call"></i>
                </div>
                <div class="why-us-content">
                  <h4>Advice & Support</h4>
                  <p class="mar-0">
                    Travel worry free knowing that we're here if you need us, 24
                    hours a day
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="why-us-item why-us-item1 text-center">
                <div class="why-us-icon">
                  <i class="flaticon-global"></i>
                </div>
                <div class="why-us-content">
                  <h4>Air Ticketing</h4>
                  <p class="mar-0">
                    Travel worry free knowing that we're here if you need us, 24
                    hours a day
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="why-us-item why-us-item1 text-center">
                <div class="why-us-icon">
                  <i class="flaticon-building"></i>
                </div>
                <div class="why-us-content">
                  <h4>Hotel Accomodation</h4>
                  <p class="mar-0">
                    Travel worry free knowing that we're here if you need us, 24
                    hours a day
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="why-us-item why-us-item1 text-center">
                <div class="why-us-icon">
                  <i class="flaticon-location-pin"></i>
                </div>
                <div class="why-us-content">
                  <h4>Tour Peckages</h4>
                  <p class="mar-0">
                    Travel worry free knowing that we're here if you need us, 24
                    hours a day
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- why us ends -->

    <!-- top destination starts -->
    <section class="top-destinations hotel-desti bg-grey pad-bottom-0">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Top <span>Hotel Destinations</span></h2>
          <p>
            Lorem Ipsum is simply dummy text the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s,
          </p>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="td-item">
                <div class="td-image">
                  <img src="images/destination1.jpg" alt="image" />
                </div>
                <div class="td-content">
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <h3 class="mar-0">
                    <i class="fa fa-map-marker-alt"></i> United Kingdom
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="td-item">
                <div class="td-image">
                  <img src="images/destination2.jpg" alt="image" />
                </div>
                <div class="td-content">
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <h3 class="mar-0">
                    <i class="fa fa-map-marker-alt"></i> Turkey
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="td-item">
                <div class="td-image">
                  <img src="images/destination4.jpg" alt="image" />
                </div>
                <div class="td-content">
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <h3><i class="fa fa-map-marker-alt"></i> Ukraine</h3>
                  <p class="white">
                    Amet mauris commodo quis. Magna iaculis eu non diam
                    phasellus vestibulum lorem
                  </p>
                  <a href="#" class="biz-btn">Book Now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="td-item">
                <div class="td-image">
                  <img src="images/destination9.jpg" alt="image" />
                </div>
                <div class="td-content">
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <h3><i class="fa fa-map-marker-alt"></i> France</h3>
                  <p class="white">
                    Amet mauris commodo quis. Magna iaculis eu non diam
                    phasellus vestibulum lorem
                  </p>
                  <a href="#" class="biz-btn">Book Now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="td-item">
                <div class="td-image">
                  <img src="images/destination6.jpg" alt="image" />
                </div>
                <div class="td-content">
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <h3><i class="fa fa-map-marker-alt"></i> India</h3>
                  <p class="white">
                    Amet mauris commodo quis. Magna iaculis eu non diam
                    phasellus vestibulum lorem
                  </p>
                  <a href="#" class="biz-btn">Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- top destination ends -->

    <!-- Rooms starts -->
    <section class="rooms">
      <div class="container">
        <div class="section-title">
          <h2>Explore <span>Rooms</span></h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex
            neque, sodales accumsan sapien et, auctor vulputate quam donec vitae
            consectetur turpis
          </p>
        </div>
        <div class="room-outer">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
              <div class="room-item">
                <div class="room-image">
                  <img src="images/room1.jpg" alt="image" />
                </div>
                <div class="room-content1">
                  <div class="room-title">
                    <h3>Super Deluxe</h3>
                    <p>$1200/Night</p>
                    <div class="deal-rating">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                    </div>
                  </div>
                  <div class="room-services mar-bottom-15">
                    <ul>
                      <li>
                        <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                      </li>
                      <li>
                        <i class="fa fa-wifi" aria-hidden="true"></i> Wifi
                      </li>
                    </ul>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum orci nulla
                  </p>
                  <div class="room-btns mar-top-20">
                    <a href="#" class="biz-btn biz-btn1 mar-right-10"
                      >VIEW DETAILS</a
                    >
                    <a href="#" class="biz-btn-black">BOOK NOW</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="room-item">
                <div class="room-image">
                  <img src="images/room2.jpg" alt="image" />
                </div>
                <div class="room-content1">
                  <div class="room-title">
                    <h3>Junior Suite</h3>
                    <p>$1200/Night</p>
                    <div class="deal-rating">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                    </div>
                  </div>
                  <div class="room-services mar-bottom-15">
                    <ul>
                      <li>
                        <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                      </li>
                      <li>
                        <i class="fa fa-wifi" aria-hidden="true"></i> Wifi
                      </li>
                    </ul>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum orci nulla
                  </p>
                  <div class="room-btns mar-top-20">
                    <a href="#" class="biz-btn biz-btn1 mar-right-10"
                      >VIEW DETAILS</a
                    >
                    <a href="#" class="biz-btn-black">BOOK NOW</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="room-item">
                <div class="room-image">
                  <img src="images/room3.jpg" alt="image" />
                </div>
                <div class="room-content1">
                  <div class="room-title">
                    <h3>Executive Suite</h3>
                    <p>$1200/Night</p>
                    <div class="deal-rating">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                    </div>
                  </div>
                  <div class="room-services mar-bottom-15">
                    <ul>
                      <li>
                        <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                      </li>
                      <li>
                        <i class="fa fa-wifi" aria-hidden="true"></i> Wifi
                      </li>
                    </ul>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum orci nulla
                  </p>
                  <div class="room-btns mar-top-20">
                    <a href="#" class="biz-btn biz-btn1 mar-right-10"
                      >VIEW DETAILS</a
                    >
                    <a href="#" class="biz-btn-black">BOOK NOW</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Room Ends -->

    <!-- Call to action starts -->
    <section class="call-to-action">
      <div class="container">
        <div class="row display-flex">
          <div class="col-lg-6 col-12">
            <div class="action-content">
              <h3 class="white package-name">SUMMER SPECIAL</h3>
              <h2 class="discounted"><span>25%</span> off</h2>
              <h2 class="white">
                SPEND THE BEST VACTION WITH US <br /><span
                  >The nights of Thailand</span
                >
              </h2>
              <p class="mar-bottom-20">4days / 5nights</p>
              <a href="#" class="biz-btn">View Details</a>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="video-click">
              <div class="video-image">
                <img src="images/hometype1.jpg" alt="vide" />
              </div>
              <div class="call-button">
                <button
                  type="button"
                  class="play-btn js-video-button"
                  data-video-id="152879427"
                  data-channel="vimeo"
                >
                  <i class="fa fa-play"></i>
                </button>
              </div>
              <div class="video-figure"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- call to action Ends -->

    <!-- why us about starts -->
    <section class="why-us pad-top-80 bg-grey">
      <div class="container">
        <div class="why-us-about">
          <div class="row display-flex">
            <div class="col-lg-6 col-12">
              <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                  <div class="why-about-image">
                    <img src="images/list3.jpg" alt="about" />
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                  <div class="why-about-image">
                    <img src="images/list1.jpg" alt="about" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="why-about-inner hotel-why-inner text-right">
                <h4>Amazing Places To Enjony Your Travel</h4>
                <h2>We Provide <span>Best Services</span></h2>
                <p class="mar-bottom-25">
                  Aliquam erat volutpat. Curabitur tempor nibh quis arcu
                  convallis, sed viverra quam sollicitudin. Proin sed augue sed
                  neque ultricies condimentum. In ac ultrices lectus.<br />
                  Nullam ex elit, vestibulum ut urna non, tincidunt condimentum
                  sem. Sed enim tortor, accumsan at consequat et, tempus sit ame
                </p>
                <a href="#" class="biz-btn biz-btn1">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- why us about ends -->

    <!-- tour agents starts -->
    <section class="tour-agent">
      <div class="container">
        <div class="section-title">
          <h2>Travel <span>Agents</span></h2>
          <p>
            Lorem Ipsum is simply dummy text the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s,
          </p>
        </div>
        <div class="agent-main">
          <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="agent-list">
                <div class="agent-image">
                  <img src="images/inbox5.jpg" alt="agent" />
                  <div class="agent-content">
                    <h3 class="white mar-bottom-5">Salmon Thuir</h3>
                    <p class="white mar-0">Tourist Advisor</p>
                  </div>
                </div>
                <div class="agent-social">
                  <ul class="social-links">
                    <li>
                      <a href="#"
                        ><i class="fab fa-facebook" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-twitter" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-instagram" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-linkedin" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="agent-list">
                <div class="agent-image">
                  <img src="images/inbox6.jpg" alt="agent" />
                  <div class="agent-content">
                    <h3 class="white mar-bottom-5">Salmon Thuir</h3>
                    <p class="white mar-0">Tourist Advisor</p>
                  </div>
                </div>
                <div class="agent-social">
                  <ul class="social-links">
                    <li>
                      <a href="#"
                        ><i class="fab fa-facebook" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-twitter" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-instagram" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-linkedin" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="agent-list">
                <div class="agent-image">
                  <img src="images/inbox7.jpg" alt="agent" />
                  <div class="agent-content">
                    <h3 class="white mar-bottom-5">Salmon Thuir</h3>
                    <p class="white mar-0">Tourist Advisor</p>
                  </div>
                </div>
                <div class="agent-social">
                  <ul class="social-links">
                    <li>
                      <a href="#"
                        ><i class="fab fa-facebook" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-twitter" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-instagram" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-linkedin" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="agent-list">
                <div class="agent-image">
                  <img src="images/inbox8.jpg" alt="agent" />
                  <div class="agent-content">
                    <h3 class="white mar-bottom-5">Salmon Thuir</h3>
                    <p class="white mar-0">Tourist Advisor</p>
                  </div>
                </div>
                <div class="agent-social">
                  <ul class="social-links">
                    <li>
                      <a href="#"
                        ><i class="fab fa-facebook" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-twitter" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-instagram" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-linkedin" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- tour agents Ends -->

    <!-- Trending Starts -->
    <section class="trending bg-grey">
      <div class="container">
        <div class="section-title">
          <h2><span>Recommended</span> Hotels</h2>
          <p>
            Lorem Ipsum is simply dummy text the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s,
          </p>
        </div>
        <div class="trend-box">
          <div class="row mix tour">
            <div class="col-lg-4 col-md-6 col-12 mar-bottom-30">
              <div class="trend-item">
                <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                <div class="trend-image">
                  <img src="images/blog1.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p class="price">From <span>$350.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> United Kingdom</p>
                  <h4>
                    <a href="#"
                      >Stonehenge, Windsor Castle, and Bath from London</a
                    >
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <span class="mar-left-5">38 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mar-bottom-30">
              <div class="trend-item">
                <div class="trend-image">
                  <img src="images/blog2.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p>Multi-day Tours</p>
                    <p class="price">From <span>$899.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> Germany</p>
                  <h4>
                    <a href="#">Strait and Black Sea Cruise from Istanbul</a>
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                    <span class="fa fa-star-half checked"></span>
                  </div>
                  <span class="mar-left-5">48 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mar-bottom-30">
              <div class="trend-item">
                <div class="ribbon ribbon-top-left"><span>Featured</span></div>
                <div class="trend-image">
                  <img src="images/blog3.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p>Attraction Tickets</p>
                    <p class="price">From <span>$350.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> Denmark</p>
                  <h4>
                    <a href="#"
                      >NYC One World Observatory Skip-the-Line Ticket</a
                    >
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <span class="mar-left-5">32 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="trend-item">
                <div class="trend-image">
                  <img src="images/blog4.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p class="price">From <span>$350.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> Japan</p>
                  <h4>
                    <a href="#"
                      >Stonehenge, Windsor Castle, and Bath from London</a
                    >
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                  </div>
                  <span class="mar-left-5">21 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="trend-item">
                <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                <div class="trend-image">
                  <img src="images/blog5.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p>Multi-day Tours</p>
                    <p class="price">From <span>$899.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> Italy</p>
                  <h4>
                    <a href="#">Strait and Black Sea Cruise from Istanbul</a>
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star-half checked"></span>
                    <span class="fa fa-star-half checked"></span>
                  </div>
                  <span class="mar-left-5">48 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="trend-item">
                <div class="trend-image">
                  <img src="images/blog6.jpg" alt="image" />
                  <div class="trend-tags">
                    <a href="#"><i class="flaticon-like"></i></a>
                  </div>
                  <div class="trend-price">
                    <p>Attraction Tickets</p>
                    <p class="price">From <span>$350.00</span></p>
                  </div>
                </div>
                <div class="trend-content">
                  <p><i class="flaticon-location-pin"></i> Turkey</p>
                  <h4>
                    <a href="#"
                      >NYC One World Observatory Skip-the-Line Ticket</a
                    >
                  </h4>
                  <div class="rating mar-bottom-15">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                  </div>
                  <span class="mar-left-5">18 Reviews</span>
                  <p class="mar-0">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2
                    night
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Trending Ends -->

    <!-- blog starts -->
    <section class="blog">
      <div class="container">
        <div class="section-title">
          <h2>Recent <span>Activities</span></h2>
          <p>
            Lorem Ipsum is simply dummy text the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s,
          </p>
        </div>
        <div class="blog-home-main">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
              <div class="grid">
                <div class="grid-item">
                  <div class="grid-image">
                    <img src="images/trending8.jpg" alt="blog" />
                  </div>
                  <div class="gridblog-content">
                    <div class="date mar-bottom-15">
                      <i class="flaticon flaticon-calendar"></i> Mar 15, 2017
                    </div>
                    <h3>
                      <a href="blog-single.html"
                        >Raising say express had chiefly detract</a
                      >
                    </h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nam finibus, velit nec luctus dictum Nam finibus.
                    </p>
                    <a href="blog-single.html" class="biz-btn biz-btn1"
                      >Read More</a
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
              <div class="grid">
                <div class="grid-item">
                  <div class="grid-image">
                    <img src="images/trending9.jpg" alt="blog" />
                  </div>
                  <div class="gridblog-content">
                    <div class="date mar-bottom-15">
                      <i class="flaticon flaticon-calendar"></i> Mar 15, 2017
                    </div>
                    <h3>
                      <a href="blog-single.html"
                        >Raising say express had chiefly detract</a
                      >
                    </h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nam finibus, velit nec luctus dictum Nam finibus.
                    </p>
                    <a href="blog-single.html" class="biz-btn biz-btn1"
                      >Read More</a
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
              <div class="grid">
                <div class="grid-item">
                  <div class="grid-image">
                    <img src="images/trending10.jpg" alt="blog" />
                  </div>
                  <div class="gridblog-content">
                    <div class="date mar-bottom-15">
                      <i class="flaticon flaticon-calendar"></i> Mar 15, 2017
                    </div>
                    <h3>
                      <a href="blog-single.html"
                        >Raising say express had chiefly detract</a
                      >
                    </h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nam finibus, velit nec luctus dictum Nam finibus.
                    </p>
                    <a href="blog-single.html" class="biz-btn biz-btn1"
                      >Read More</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- blog Ends -->

    <!-- Instagram starts -->
    <section class="insta-main pad-0">
      <div class="insta-inner">
        <div class="row">
          <div class="col-lg-2 col-md-3 col-12">
            <div class="insta-title">
              <div class="insta-title-inner text-center">
                <h4 class="white mar-bottom-5">Follow@instagram</h4>
                <h3 class="white bold">Sky High Trip</h3>
                <a href="#" class="biz-btn-white">Follow Us</a>
              </div>
            </div>
          </div>

          <div class="col-lg-10 col-md-9 col-12">
            <div class="row attract-slider">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination3.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination4.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination5.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination6.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination7.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination8.jpg" alt="insta"
                  /></a>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="insta-image">
                  <a href="#"
                    ><img src="images/destination9.jpg" alt="insta"
                  /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Instagram ends -->

    <!-- footer starts -->
    <footer>
      <div class="footer-upper pad-bottom-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-sm-12 col-12">
              <div class="footer-about">
                <div class="footer-about-in mar-bottom-30">
                  <h3 class="white">Need Sky High Trip Help?</h3>
                  <div class="footer-phone">
                    <div class="cont-icon"><i class="flaticon-call"></i></div>
                    <div class="cont-content mar-left-20">
                      <p class="mar-0">Got Questions? Call us 24/7!</p>
                      <p class="bold mar-0">
                        <span>Call Us:</span> (888) 1234 56789
                      </p>
                    </div>
                  </div>
                </div>
                <h3 class="white">Contact Info</h3>
                <p>
                  PO Box: +47-252-254-2542<br />
                  Location: Collins Stree, Vicotria 80, Australia
                </p>
                <ul class="social-links">
                  <li>
                    <a href="#"
                      ><i class="fab fa-facebook" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-twitter" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-instagram" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fab fa-linkedin" aria-hidden="true"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="footer-links">
                <h3 class="white">Company</h3>
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Terms of Use</a></li>
                  <li><a href="#">Privacy Statement</a></li>
                  <li><a href="#">Feedbacks</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12">
              <div class="footer-links">
                <h3 class="white">Support</h3>
                <ul>
                  <li><a href="#">Account</a></li>
                  <li><a href="#">Legal</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Affiliate Program</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-12">
              <div class="footer-subscribe">
                <h3 class="white">Mailing List</h3>
                <p class="white">
                  Sign up for our mailing list to get latest updates and offers
                </p>
                <form>
                  <input type="email" placeholder="Your Email" />
                  <a href="#" class="biz-btn mar-top-15">Subscribe</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-payment pad-top-30 pad-bottom-30 bg-white">
        <div class="container">
          <div class="pay-main display-flex space-between">
            <div class="footer-logo pull-left">
              <a href="index.html"
                ><img src="images/logo-black.png" alt="image"
              /></a>
            </div>
            <div class="footer-payment-nav pull-right">
              <ul>
                <li><img src="images/payment/mastercard.png" alt="image" /></li>
                <li><img src="images/payment/paypal.png" alt="image" /></li>
                <li><img src="images/payment/skrill.png" alt="image" /></li>
                <li><img src="images/payment/visa.png" alt="image" /></li>
                <li>
                  <select>
                    <option>English (United States)</option>
                    <option>English (United States)</option>
                    <option>English (United States)</option>
                    <option>English (United States)</option>
                    <option>English (United States)</option>
                  </select>
                </li>
                <li>
                  <select>
                    <option>$ USD</option>
                    <option>$ USD</option>
                    <option>$ USD</option>
                    <option>$ USD</option>
                    <option>$ USD</option>
                  </select>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="copyright-text pull-left">
            <p class="mar-0">2020 Sky High Trip. All rights reserved.</p>
          </div>
          <div class="footer-nav pull-right">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
      <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
      <button type="button" class="close">×</button>
      <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </div>

    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog">
        <div class="login-content">
          <div class="login-title section-border">
            <h3>Login</h3>
          </div>
          <div class="login-form section-border">
            <form>
              <div class="form-group">
                <input type="email" placeholder="Enter email address" />
              </div>
              <div class="form-group">
                <input type="password" placeholder="Enter password" />
              </div>
            </form>
            <div class="form-btn">
              <a href="#" class="biz-btn biz-btn1">LOGIN</a>
            </div>
            <div class="form-group form-checkbox">
              <input type="checkbox" /> Remember Me
              <a href="#">Forgot password?</a>
            </div>
          </div>
          <div class="login-social section-border">
            <p>or continue with</p>
            <a href="#" class="btn-facebook"
              ><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a
            >
            <a href="#" class="btn-twitter"
              ><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a
            >
          </div>
          <div class="sign-up">
            <p>Do not have an account?<a href="#">Sign Up</a></p>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
      </div>
    </div>

    <div class="modal fade" id="register" role="dialog">
      <div class="modal-dialog">
        <div class="login-content">
          <div class="login-title section-border">
            <h3>Register</h3>
          </div>
          <div class="login-form section-border">
            <form>
              <div class="form-group">
                <input type="text" placeholder="User Name" />
              </div>
              <div class="form-group">
                <input type="text" placeholder="Full Name" />
              </div>
              <div class="form-group">
                <input type="email" placeholder="Email" />
              </div>
              <div class="form-group">
                <input type="password" placeholder="Password" />
              </div>
            </form>
            <div class="form-btn">
              <a href="#" class="biz-btn biz-btn1">REGISTER</a>
            </div>
            <div class="form-group form-checkbox">
              <input type="checkbox" /> Remember Me
              <a href="#">Forgot password?</a>
            </div>
          </div>
          <div class="login-social section-border">
            <p>or continue with</p>
            <a href="#" class="btn-facebook"
              ><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a
            >
            <a href="#" class="btn-twitter"
              ><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a
            >
          </div>
          <div class="sign-up">
            <p>Do not have an account?<a href="#">Sign Up</a></p>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
      </div>
    </div>

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-swiper3.js"></script>
    <script src="js/custom-nav.js"></script>
    <script src="js/custom-date.js"></script>
  </body>
</html>
