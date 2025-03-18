<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Sky High Trip - Tour & Travel Multipurpose Services</title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/logo-black.png" />
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
              <a href="#"><i class="fa fa-envelope-open"></i> info@skyhightrip.com</a>
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
                  <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in-alt"></i> Login</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#register"><i class="fa fa-sign-out-alt"></i> Register</a>
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
                          <i class="fa fa-envelope-open"></i>support@travel.com
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
                  <span class="menu-ham"><i class="fa fa-bars white"></i></span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Navigation Bar -->
    <?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    ?>
    <div class="header_menu affix-top">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-flex">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">
                <img src="images/logo-black.png" alt="Sky High Trip" />
              </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav" id="responsive-menu">
                <li><a href="index.php">Flights</a></li>
                <li><a href="index-hotel.php">Hotel</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="contact.php">Contact Us</a></li>

                <?php if (isset($_SESSION['full_name'])): ?>
                  <li class="submenu dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">
                      <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="dashboard.php">Dashboard</a></li>
                      <li><a href="dashboard-my-profile.php">User Profile</a></li>
                      <li><a href="logout.php">Logout</a></li>
                    </ul>
                  </li>
                <?php else: ?>
                  <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                <?php endif; ?>
                s
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
              <div class="slide-image animation-off" style="
                    background-image: url(images/detail-slider/firstslider.avif);
                  "></div>
              <div class="swiper-content">
                <h1>Make you Free to <span>travel</span> with us</h1>
              </div>
              <div class="overlay"></div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-inner">
              <div class="slide-image animation-off" style="
                    background-image: url(images/detail-slider/2slider.webp);
                  "></div>
              <div class="swiper-content">
                <h1>Hurry up! <span>Book a Ticket</span> & Just Leave</h1>
              </div>
              <div class="overlay"></div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-inner">
              <div class="slide-image animation-off" style="
                    background-image: url(images/detail-slider/3slider.jpg);
                  "></div>
              <div class="swiper-content">
                <h1>
                  Your <span>Adventure</span> Travel Experts In Australia!
                </h1>
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
  </section>
  <!-- banner ends -->

  <!-- form starts -->
  <section class="banner-form form-style2">
    <div class="container">
      <div class="form-content">
        <div class="price-navtab text-center">
          <ul
            class="nav nav-tabs"
            style="
                display: flex;
                justify-content: center;
                position: relative;
                bottom: 60px;
                gap: 30px;
              ">
            <li class="active">
              <a href="index.html" style="border-radius: 0%"><i class="fa fa-plane"></i>Air</a>
            </li>
            <li>
              <a href="index-hotel.html" style="border-radius: 0%"><i class="flaticon-building"></i> Hotel</a>
            </li>
            <li>
              <a href="packages.html" style="border-radius: 0%"><i class="flaticon-global"></i>Packages</a>
            </li>
          </ul>
        </div>
        <div class="price-navtab text-center">
          <ul class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="#roundtrip"><i class="fa fa-check-circle"></i> Round-Trip</a>
            </li>
            <li>
              <a data-toggle="tab" href="#oneway"><i class="fa fa-check-circle"></i> One-Way</a>
            </li>
            <li>
              <a data-toggle="tab" href="#multicity"><i class="fa fa-check-circle"></i> Multi-City</a>
            </li>
          </ul>
        </div>

        <div class="tab-content">
          <div id="roundtrip" class="tab-pane in active">
            <div class="row filter-box">
              <!-- Flying From -->
              <div class="col-lg-3 col-sm-12">
                <div class="form-group">
                  <label>Flying From</label>
                  <div class="input-box">
                    <i class="flaticon-placeholder"></i>
                    <input type="text" id="flyingFrom" placeholder="Enter city or airport" autocomplete="off" />
                    <div id="fromDropdown" class="dropdown-content"></div>
                  </div>
                </div>
              </div>

              <!-- Flying To -->
              <div class="col-lg-3 col-sm-12">
                <div class="form-group">
                  <label>Flying To</label>
                  <div class="input-box">
                    <i class="flaticon-placeholder"></i>
                    <input type="text" id="flyingTo" placeholder="Enter city or airport" autocomplete="off" />
                    <div id="toDropdown" class="dropdown-content"></div>
                  </div>
                </div>
              </div>

              <!-- Depart Date -->
              <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                  <label>Depart Date</label>
                  <div class="input-box">
                    <i class="flaticon-calendar"></i>
                    <input id="departDate" type="text" placeholder="Select Depart Date" readonly />
                  </div>
                </div>
              </div>

              <!-- Return Date -->
              <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                  <label>Return Date</label>
                  <div class="input-box">
                    <i class="flaticon-calendar"></i>
                    <input id="returnDate" type="text" placeholder="Select Return Date" readonly />
                  </div>
                </div>
              </div>

              <!-- Adults -->
              <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                  <label>Adults</label>
                  <div class="input-box">
                    <i class="flaticon-add-user"></i>
                    <select id="numAdults" class="niceSelect">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Children -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Children</label>
                  <div class="input-box">
                    <i class="flaticon-add-user"></i>
                    <select id="numChildren" class="niceSelect">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Search Button -->
              <div class="col-lg-3 col-sm-12">
                <div class="form-group mar-top-30">
                  <button id="searchFlights" class="biz-btn">
                    <i class="fa fa-search"></i> Find Now
                  </button>
                </div>
              </div>
            </div>
          </div>
          <style>
            .flight-results {
              display: flex;
              flex-wrap: wrap;
              justify-content: center;
              gap: 15px;
              margin-top: 20px;
            }

            .flight-card {
              background: #fff;
              border-radius: 10px;
              box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
              padding: 15px;
              width: 320px;
              transition: transform 0.2s ease-in-out;
              border-left: 5px solid #007bff;
            }

            .flight-card:hover {
              transform: scale(1.05);
            }

            .flight-card h4 {
              margin: 10px 0;
              color: #007bff;
            }

            .flight-card p {
              margin: 5px 0;
              font-size: 14px;
              color: #333;
            }

            .price {
              font-size: 18px;
              font-weight: bold;
              color: #28a745;
              margin-top: 10px;
            }

            .book-btn {
              display: block;
              width: 100%;
              background: #007bff;
              color: white;
              border: none;
              padding: 8px;
              text-align: center;
              border-radius: 5px;
              margin-top: 10px;
              cursor: pointer;
              font-weight: bold;
            }

            .book-btn:hover {
              background: #0056b3;
            }
          </style>

          <!-- Flight Results Container -->
          <div id="displayFlights" class="flight-results"></div>

          <!-- Loading Indicator -->
          <div id="loadingIndicator" style="display:none; text-align:center; margin-top:20px;">
            <p style="color: white;">Loading flights...</p>
          </div>

          <style>
            .dropdown-content {
              position: absolute;
              background: white;
              border: 1px solid #ddd;
              max-height: 200px;
              overflow-y: auto;
              width: 100%;
              display: none;
              z-index: 1000;
            }

            .dropdown-content div {
              padding: 10px;
              cursor: pointer;
              border-bottom: 1px solid #eee;
            }

            .dropdown-content div:hover {
              background: #f1f1f1;
            }

            .flight-card {
              border: 1px solid #ddd;
              padding: 15px;
              margin: 10px;
              border-radius: 5px;
              background: #f9f9f9;
            }

            .airline {
              font-weight: bold;
              color: #444;
              margin-top: 5px;
            }
          </style>


          <div id="oneway" class="tab-pane">
            <div class="row filter-box">
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Flying From</label>
                  <div class="input-box">
                    <i class="flaticon-placeholder"></i>
                    <select class="niceSelect">
                      <option value="1">Where are you going?</option>
                      <option value="2">Argentina</option>
                      <option value="3">Belgium</option>
                      <option value="4">Canada</option>
                      <option value="5">Denmark</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                  <label>Depart Date</label>
                  <div class="input-box">
                    <i class="flaticon-calendar"></i>
                    <input type="text" placeholder="yyyy-mm-dd" />
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Adult</label>
                  <div class="input-box">
                    <i class="flaticon-add-user"></i>
                    <select class="niceSelect">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Children</label>
                  <div class="input-box">
                    <i class="flaticon-add-user"></i>
                    <select class="niceSelect">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group mar-top-30">
                  <a href="#" class="biz-btn"><i class="fa fa-search"></i> Find Now</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Multi-City Section -->
          <div id="multicity" class="tab-pane container py-4">
            <div id="flightContainer" class="overflow-auto">
              <!-- Initial Flight Block -->
              <div class="row filter-box mb-4 flight-section">
                <div id="flightForms">
                  <div class="row flight-form">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Flying From</label>
                        <div class="input-box">
                          <i class="flaticon-placeholder"></i>
                          <select class="niceSelect">
                            <option value="1">Where are you going?</option>
                            <option value="2">Argentina</option>
                            <option value="3">Belgium</option>
                            <option value="4">Canada</option>
                            <option value="5">Denmark</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                      <div class="form-group">
                        <label>Depart Date</label>
                        <div class="input-box">
                          <i class="flaticon-calendar"></i>
                          <input type="text" placeholder="yyyy-mm-dd" />
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Adult</label>
                        <div class="input-box">
                          <i class="flaticon-add-user"></i>
                          <select class="niceSelect">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Children</label>
                        <div class="input-box">
                          <i class="flaticon-add-user"></i>
                          <select class="niceSelect">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button onclick="addFlight()" class="btn btn-primary mt-3" style="margin-right: 10px">
              Add Flight
            </button>
            <button onclick="findFlights()" class="btn btn-success mt-3">
              Find Flights
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- form ends -->

  <!-- featured flight starts -->
  <section class="featured-flight">
    <div class="container">
      <div class="section-title">
        <h2>Featured Flight Deals</h2>
      </div>
      <div class="trend-box">
        <div class="row mix tour">
          <div class="col-lg-4 col-sm-6 mar-bottom-30">
            <div class="trend-item">
              <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
              <div class="trend-image">
                <img src="images/trending1.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p class="price">From <span>$350.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Multiway Flight</p>
                <h3><a href="#">Beijing to Dhaka</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                </div>
                <span class="mar-left-5">38 Reviews</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 mar-bottom-30">
            <div class="trend-item">
              <div class="trend-image">
                <img src="images/trending2.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p>Multi-day Tours</p>
                  <p class="price">From <span>$899.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Oneway Flight</p>
                <h3><a href="#">New York to Beijing</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-half checked"></span>
                  <span class="fa fa-star-half checked"></span>
                </div>
                <span class="mar-left-5">48 Reviews</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 mar-bottom-30">
            <div class="trend-item">
              <div class="ribbon ribbon-top-left"><span>Featured</span></div>
              <div class="trend-image">
                <img src="images/trending3.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p>Attraction Tickets</p>
                  <p class="price">From <span>$350.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Oneway Flight</p>
                <h3><a href="#">London to paris</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                </div>
                <span class="mar-left-5">32 Reviews</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="trend-item">
              <div class="trend-image">
                <img src="images/trending4.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p class="price">From <span>$350.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Twoway Flight</p>
                <h3><a href="#">Delhi to Munich</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-half checked"></span>
                </div>
                <span class="mar-left-5">21 Reviews</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="trend-item">
              <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
              <div class="trend-image">
                <img src="images/trending5.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p>Multi-day Tours</p>
                  <p class="price">From <span>$899.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Multi-city Flight</p>
                <h3><a href="#">Tokyo to Kathmandu</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-half checked"></span>
                  <span class="fa fa-star-half checked"></span>
                </div>
                <span class="mar-left-5">48 Reviews</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="trend-item">
              <div class="trend-image">
                <img src="images/trending6.jpg" alt="image" />
                <div class="trend-tags">
                  <a href="#"><i class="flaticon-like"></i></a>
                </div>
                <div class="trend-price">
                  <p>Attraction Tickets</p>
                  <p class="price">From <span>$350.00</span></p>
                </div>
              </div>
              <div class="trend-content">
                <p>Oneway Flight</p>
                <h3><a href="#">London to paris</a></h3>
                <div class="rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                </div>
                <span class="mar-left-5">18 Reviews</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- featured flight Ends -->

  <!-- air-tickets starts -->
  <section class="air-tickets">
    <div class="container">
      <div class="section-title">
        <h2 class="white">Cheap Flights & Air Tickets</h2>
      </div>
      <div class="row ticket-slider">
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/flight1.png" alt="image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">Paris</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/flight2.png" alt="image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">London</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/flight3.png" alt="image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">New York</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/flight4.png" alt=image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">Tokyo</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/flight5.jpg" alt="image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">Beijing</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="ticket-item">
            <div class="ticket-image">
              <img src="images/fligh6.png" alt="image" />
            </div>
            <div class="ticket-content">
              <div class="ticket-title">
                <h3 class="mar-bottom-10">kathmandu</h3>
                <p class="price">From <span>$350.00</span> / oneway</p>
              </div>
              <div class="ticket-btn">
                <a href="#" class="biz-btn biz-btn1">Select</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="overlay"></div>
  </section>
  <!-- air-tickets Ends -->

  <!-- top destination starts -->
  <section class="top-destinations bg-grey">
    <div class="container">
      <div class="section-title">
        <h2>Top <span>Destinations</span></h2>
        <p>
          Lorem Ipsum is simply dummy text the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text
          ever since the 1500s,
        </p>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="td-item mar-bottom-30">
              <div class="td-image">
                <img src="images/destination3.jpg" alt="image" />
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
          <div class="col-lg-4 col-sm-6">
            <div class="td-item mar-bottom-30">
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
                <h3 class="mar-0">
                  <i class="fa fa-map-marker-alt"></i> Mexico
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="td-item mar-bottom-30">
              <div class="td-image">
                <img src="images/destination5.jpg" alt="image" />
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
          <div class="col-lg-4 col-sm-6">
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
                <h3 class="mar-0">
                  <i class="fa fa-map-marker-alt"></i> Ukraine
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="td-item">
              <div class="td-image">
                <img src="images/destination7.jpg" alt="image" />
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
                  <i class="fa fa-map-marker-alt"></i> France
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="td-item">
              <div class="td-image">
                <img src="images/destination8.jpg" alt="image" />
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
                  <i class="fa fa-map-marker-alt"></i> India
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- top destination ends -->

  <!-- blog article starts -->
  <section class="blog-article">
    <div class="container">
      <div class="section-title">
        <h2>Recent Articles</h2>
      </div>
      <div class="row">
        <div class="col-lg-4 col-sm-12">
          <div class="article-item">
            <div class="article-image">
              <img src="images/trending1.jpg" alt="image" />
            </div>
            <div class="article-content">
              <p><i class="flaticon-calendar"></i> June 6, 2019</p>
              <h4 class="mar-0">
                Nations Are Struggling To Save Their Wildlife
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="article-item">
            <div class="article-image">
              <img src="images/trending2.jpg" alt="image" />
            </div>
            <div class="article-content">
              <p><i class="flaticon-calendar"></i> June 6, 2019</p>
              <h4 class="mar-0">
                Cardi B Deletes Instagram Social Media Backlash
              </h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="article-item">
            <div class="article-image">
              <img src="images/trending3.jpg" alt="image" />
            </div>
            <div class="article-content">
              <p><i class="flaticon-calendar"></i> June 6, 2019</p>
              <h4 class="mar-0">
                Tesla’s Cooking Up A New Way To Wire Its Cars
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- blog article ends -->

  <!-- partners starts -->
  <section class="partners bg-grey">
    <div class="container">
      <div class="dest-partner">
        <div class="row attract-slider">
          <div class="col-lg-2">
            <img src="images/flight_grid_5.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_2.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_3.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_4.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_5.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_2.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_3.png" alt="partners" />
          </div>
          <div class="col-lg-2">
            <img src="images/flight_grid_4.png" alt="partners" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- partners ends -->

  <!-- footer starts -->
  <footer>
    <div class="footer-upper pad-bottom-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-12">
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
                  <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
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
          <div class="col-lg-2 col-sm-6">
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
          <div class="col-lg-3 col-sm-12">
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
            <a href="index.html"><img src="images/logo-black.png" alt="image" /></a>
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

  <!-- Search Popup -->
  <div id="search1">
    <button type="button" class="close">×</button>
    <form>
      <input type="search" value="" placeholder="type keyword(s) here" />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm">
            <div class="mb-3">
              <input type="email" id="email" class="form-control" placeholder="Enter email address" required />
            </div>
            <div class="mb-3">
              <input type="password" id="password" class="form-control" placeholder="Enter password" required />
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe" />
              <label class="form-check-label" for="rememberMe">Remember Me</label>
              <a href="#" class="float-end">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">LOGIN</button>
          </form>
          <div id="loginMessage" class="mt-2 text-center"></div>
        </div>
        <div class="modal-footer">
          <p>Do not have an account? <a href="#signupModal" data-bs-toggle="modal">Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Register Modal -->
  <div class="modal fade" id="register" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registerForm" method="post">
            <div class="mb-3">
              <input type="text" id="username" class="form-control" placeholder="User Name" required />
            </div>
            <div class="mb-3">
              <input type="text" id="full_name" class="form-control" placeholder="Full Name" required />
            </div>
            <div class="mb-3">
              <input type="email" id="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-3">
              <input type="password" id="password" class="form-control" placeholder="Password" required />
            </div>
            <button type="button" id="registerBtn" class="btn btn-success w-100 mt-3">
              REGISTER
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <p>
            Already have an account?
            <a href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  <!-- Bootstrap JS (Ensure this is included in your project) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- *Scripts* -->
  <script src="js/jquery-3.3.1.min.js"></script>


  <!-- JavaScript for Add/Remove Functionality -->

  <!-- JavaScript Fix -->

  <script src="js/bootstrap.min.js"></script>
  <script src="js/color-switcher.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/main.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/custom-swiper3.js"></script>
  <script src="js/custom-nav.js"></script>
  <script src="js/custom-date.js"></script>
  <script src="js/custom-accordian.js"></script>
  <script src="js/flights.js"></script>
</body>

</html>