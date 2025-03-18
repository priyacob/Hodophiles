<?php
include 'connect.php'; 
// Check if ID is passed in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch destination details
    $destination_sql = "SELECT * FROM destinations WHERE id = $id";
    $destination_result = $con->query($destination_sql);
    if ($destination_result->num_rows > 0) {
        $destination = $destination_result->fetch_assoc();
    } else {
        echo "Destination not found.";
        exit();
    }

    // Fetch all images for the destination
    $images_sql = "SELECT image_url FROM destination_images WHERE destination_id = $id";
    $images_result = $con->query($images_sql);
} else {
    echo "Invalid request.";
    exit();
}

// Tour ID (Can be dynamically passed)
$tour_id = 1;

// Fetch Inclusions
$inclusions_sql = "SELECT details FROM tour_details WHERE tour_id = $tour_id AND type = 'inclusion'";
$inclusions_result = $con->query($inclusions_sql);

$inclusions = [];
while ($row = $inclusions_result->fetch_assoc()) {
    $inclusions[] = $row['details'];
}

// Fetch Exclusions
$exclusions_sql = "SELECT details FROM tour_details WHERE tour_id = $tour_id AND type = 'exclusion'";
$exclusions_result = $con->query($exclusions_sql);

$exclusions = [];
while ($row = $exclusions_result->fetch_assoc()) {
    $exclusions[] = $row['details'];
}

// Fetch Additional Information
$info_sql = "SELECT info_title, info_details FROM tour_additional_info WHERE tour_id = $tour_id";
$info_result = $con->query($info_sql);

$additional_info = [];
while ($row = $info_result->fetch_assoc()) {
    $additional_info[] = $row;
}
$con->close();
?> 
 
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS  -->
 <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/css/sribash.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
    <style>
        .overview-box {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.overview-box h3, 
.overview-box h5 {
    color: #333;
    margin-bottom: 10px;
}

.overview-box ul {
    padding-left: 0;
}

.overview-box ul li {
    list-style: none;
    font-size: 16px;
    margin-bottom: 5px;
}

.overview-box p {
    font-size: 16px;
    line-height: 1.6;
}

    </style>
    <style>
       
    </style>
</head>
<body>

<div class="containers mt-4">
    <!-- Left Content -->
    <div class="left-content">
        <!-- Banner -->
    <!-- Swiper Container -->
<div class="banner-slider swiper">
    <div class="swiper-wrapper">
        <?php while ($row = $images_result->fetch_assoc()) { ?>
            <div class="swiper-slide">
                <img src="<?php echo $row['image_url']; ?>" alt="Destination Image">
            </div>
        <?php } ?>
    </div>

    <!-- Navigation Buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
</div>


        <!-- Title -->
        <h1 class="title"><?php echo $destination['name']; ?> <span style="font-size: 16px; color: gray;"><?php echo $destination['duration']; ?></span></h1>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab-btn active" data-target="overview">Overview</button>
            <button class="tab-btn" data-target="itinerary">Day-wise Itinerary</button>
            <button class="tab-btn" data-target="inclusions">Inclusions/Exclusions</button>
            <button class="tab-btn" data-target="info">Additional Info</button>
        </div> 

        <div class="tab-content" id="itinerary">
  
    <style>
        :root {
            --primary-color: #ff385c;
            --secondary-color: #f8f9fa;
            --text-color: #333;
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
        .carousel-control-prev, .carousel-control-next {
            filter: invert(100%);
        }
        ul {
            padding-left: 20px;
        }
        ul li {
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-color);
            position: relative;
            padding-left: 25px;
        }
        ul li::before {
            content: '\2022';
            color: var(--primary-color);
            font-weight: bold;
            font-size: 20px;
            position: absolute;
            left: 0;
            top: 3px;
        }
        .accordion-header button {
            background-color: var(--secondary-color);
            font-size: 18px;
            font-weight: bold;
            color: var(--primary-color);
            border: none;
            padding: 12px 20px;
        }
        .accordion-button:not(.collapsed) {
            background-color: var(--primary-color);
            color: white;
        }
        .container-fluid {
            max-width: 100%;
            padding: 20px;
        }
    </style>
        <div class="container-fluid mt-4">
        <h2 class="mb-4">Detailed Itinerary</h2>
        <div class="row">
            <div class="col-md-0">
                <div class="accordion" id="itineraryAccordion">
                    <!-- Day 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="day1-heading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#day1">
                                Day 1 - Arrival in Goa
                            </button>
                        </h2>
                        <div id="day1" class="accordion-collapse collapse show" data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <div id="carouselDay1" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="images/bg_1.jpg" class="d-block w-100" alt="Arrival in Goa">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/bg_2.jpg" class="d-block w-100" alt="Beach View">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/bg_3.jpg" class="d-block w-100" alt="Sunset in Goa">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDay1" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDay1" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                <ul>
                                    <li>Arrive at Goa and transfer to the hotel.</li>
                                    <li>Check-in at the hotel by 12:00 noon.</li>
                                    <li>Spend the day at leisure.</li>
                                    <li>Overnight stay at the hotel.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Day 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="day2-heading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#day2">
                                Day 2 - North Goa Sightseeing
                            </button>
                        </h2>
                        <div id="day2" class="accordion-collapse collapse" data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <div id="carouselDay2" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="images/goa_1.jpg" class="d-block w-100" alt="Calangute Beach">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/goa_2.jpg" class="d-block w-100" alt="Fort Aguada">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDay2" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDay2" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                <ul>
                                    <li>Visit Calangute, Baga, and Anjuna Beach.</li>
                                    <li>Explore Fort Aguada and Chapora Fort.</li>
                                    <li>Enjoy beach activities.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>

        <div class="tab-content" id="overview">
            <h1>dfebf</h1>
    </div>
        <div class="tab-content" id="inclusions">
  
<style>
    :root {
        --primary-color: #ff385c;
        --secondary-color: #f8f9fa;
        --text-color: #333;
    }

    body {
        background-color: #f8f9fa;
    }

    .nav-tabs {
        border-bottom: 2px solid #ddd;
    }

    .nav-tabs .nav-link {
        font-size: 18px;
        font-weight: 500;
        color: var(--text-color);
        padding: 12px 20px;
    }

    .nav-tabs .nav-link.active {
        border-bottom: 3px solid var(--primary-color);
        color: var(--primary-color);
        font-weight: bold;
    }

    .tab-contentt {
        background: white;
        padding: 20px;
        /* border-radius: 10px; */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 15px;
    }

    ul {
        padding-left: 20px;
        list-style-type: none;
        margin: 0; /* Remove extra spacing */
    }

    ul li {
        font-size: 16px;
        line-height: 1.8;
        color: var(--text-color);
        position: relative;
        padding-left: 25px;
    }

    ul li::before {
        content: '\2022';
        color: var(--primary-color);
        font-weight: bold;
        font-size: 20px;
        position: absolute;
        left: 0;
        top: 3px;
    }

    .package-card {
        background-color: #fdeef0;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin-top: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .package-card h5 {
        font-size: 18px;
        font-weight: bold;
        color: var(--text-color);
    }

    .package-card p {
        font-size: 14px;
        color: #666;
    }

    .btn-custom {
        background-color: var(--primary-color);
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .btn-custom:hover {
        background-color: #e62e50;
    }

    /* Ensure tab content takes up the same space to prevent layout shifts */
    .tab-pane {
        display: none; /* Hide all tabs initially */
    }

    .tab-pane.active {
        display: block; /* Show only active tab */
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>Inclusions & Exclusions</h3>

            <!-- Tabs for Inclusions & Exclusions -->
            <ul class="nav nav-tabs" id="packageTabs">
                <li class="nav-item">
                    <a class="nav-link active" id="inclusions-tab" href="#">Inclusions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="exclusions-tab" href="#">Exclusions</a>
                </li>
            </ul>

            <!-- Tab Content -->
           <!-- HTML to Display Data -->
<div class="tab-contentt mt-3">
    <!-- Inclusions Section -->
    <div class="tab-pane active" id="inclusionss">
        <ul>
            <?php
            if (!empty($inclusions)) {
                foreach ($inclusions as $inclusion) {
                    echo "<li>$inclusion</li>";
                }
            } else {
                echo "<li>No inclusions available</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Exclusions Section -->
    <div class="tab-pane" id="exclusionss">
        <ul>
            <?php
            if (!empty($exclusions)) {
                foreach ($exclusions as $exclusion) {
                    echo "<li>$exclusion</li>";
                }
            } else {
                echo "<li>No exclusions available</li>";
            }
            ?>
        </ul>
    </div>
</div>

            <!-- Package Customization Section -->
            <div class="package-card">
                <h5>Get this package customised</h5>
                <p>You can get a customised offer for your trip duration, dates, and group size.</p>
                <button class="btn btn-custom">Connect With Expert</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Tab Switching -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inclusionsTab = document.getElementById("inclusions-tab");
        const exclusionsTab = document.getElementById("exclusions-tab");
        const inclusionsContent = document.getElementById("inclusionss");
        const exclusionsContent = document.getElementById("exclusionss");

        inclusionsTab.addEventListener("click", function (e) {
            e.preventDefault();
            inclusionsTab.classList.add("active");
            exclusionsTab.classList.remove("active");

            inclusionsContent.classList.add("active");
            exclusionsContent.classList.remove("active");
        });

        exclusionsTab.addEventListener("click", function (e) {
            e.preventDefault();
            exclusionsTab.classList.add("active");
            inclusionsTab.classList.remove("active");

            exclusionsContent.classList.add("active");
            inclusionsContent.classList.remove("active");
        });
    });
</script>

        </div>

        <div class="tab-content" id="info">
        <div class="container">
    <div class="info-section">
        <h3 class="info-header">Additional Information</h3>
        <ul class="list-group info-list">
            <li class="list-group-item"><strong>Tour Duration:</strong> 5 Days and 4 Nights</li>
            <li class="list-group-item"><strong>Best Time to Visit:</strong> November to February</li>
            <li class="list-group-item"><strong>Departure City:</strong> Delhi, Mumbai, Bangalore</li>
            <li class="list-group-item"><strong>Accommodation Type:</strong> 3-Star and 5-Star Hotels Available</li>
            <li class="list-group-item"><strong>Meal Plan:</strong> Breakfast included, Lunch & Dinner on request</li>
            <li class="list-group-item"><strong>Transport:</strong> Private AC Car for all transfers and sightseeing</li>
            <li class="list-group-item"><strong>Tour Guide:</strong> Professional English-speaking guide available</li>
            <li class="list-group-item"><strong>Special Offers:</strong> Book before March and get 10% off</li>
            <li class="list-group-item"><strong>Cancellation Policy:</strong> Free cancellation up to 7 days before departure</li>
        </ul>
    </div>
</div>
        </div>
    </div>
    <style>
        /* Custom Styling */
        body {
            background-color: #f8f9fa;
        }
        .info-section {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .info-header {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .info-list li {
            font-size: 16px;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
        .info-list li:last-child {
            border-bottom: none;
        }
    </style>


    
    <!-- Right Sidebar -->
    <div class="right-sidebar">
    <div class="price-box">
    <p>Starting from <del>₹<?php echo $destination['old_price']; ?></del></p>
    <p class="price">₹<?php echo $destination['price']; ?> Per Person</p>
    <button onclick="redirectToBooking(<?php echo $destination['id']; ?>)">BOOK NOW</button>

<script>
function redirectToBooking(destinationId) {
    window.location.href = "booking-package.php?id=" + destinationId;
}
</script>

</div>




        <div class="package-details card p-4 shadow-sm">
    <h5 class="mb-3 fw-bold">Package Details</h5>
    
    <p><strong><i class="bi bi-clock"></i> Duration:</strong> <?php echo $destination['duration']; ?></p>
    <p><strong><i class="bi bi-geo-alt"></i> Places to Visit:</strong> <?php echo $destination['places_to_visit']; ?></p>

    <p class="fw-bold"><i class="bi bi-box-seam"></i> Package Includes:</p>
    <ul class="list-unstyled row g-2">
        <li class="col-6"><i class="bi bi-airplane"></i> Flight</li>
        <li class="col-6"><i class="bi bi-building"></i> Hotel</li>
        <li class="col-6"><i class="bi bi-binoculars"></i> Sightseeing</li>
        <li class="col-6"><i class="bi bi-car-front"></i> Transfer</li>
        <li class="col-6"><i class="bi bi-cup"></i> Meal</li>
    </ul>
</div>


        <div class="contact-box">
            <p><strong>Need Help?</strong></p>
            <p>Call us: 011-43030303 | 43131313</p>
            <p>Email us: Holidays@easemytrip.com</p>
        </div>
    </div>
</div>

<!-- Fixed Icons -->
<div class="fixed-icons">
    <!-- <a href="https://wa.me/911234567890" target="_blank"><i class="fab fa-whatsapp"></i></a> -->
    <a href="mailto:info@easemytrip.com" style="background:#ff9800;"><i class="fas fa-envelope"></i></a>
</div>

<script>
$(document).ready(function() {
    $(".tab-btn").click(function() {
        $(".tab-btn").removeClass("active");
        $(this).addClass("active");
        $(".tab-content").removeClass("active");
        $("#" + $(this).attr("data-target")).addClass("active");
    });
});
</script>

<style>
    
</style>
<script>
  var swiper = new Swiper(".swiper", {
    loop: true,  // Infinite scrolling
    autoplay: {
      delay: 3000, // Auto-slide every 3 seconds
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>







<style>
    a{
        color:black;
    }
</style>