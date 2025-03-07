<?php
include 'connect.php';
include 'navbar.php';
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

$con->close();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?> - Details</title>
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/css/sribash.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <style>
        
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

        <!-- Tab Content -->
        <div class="tab-content active" id="overview">
            <h3>Package Overview</h3>
            <p><?php echo $destination['overview']; ?></p>
        </div>

        <div class="tab-content" id="itinerary">
            <h3>Day-wise Itinerary</h3>
            <p><?php echo $destination['itinerary']; ?></p>
        </div>

        <div class="tab-content" id="inclusions">
            <h3>Inclusions & Exclusions</h3>
            <p><?php echo $destination['inclusions']; ?></p>
        </div>

        <div class="tab-content" id="info">
            <h3>Additional Information</h3>
            <p><?php echo $destination['additional_info']; ?></p>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="right-sidebar">
        <div class="price-box">
            <p>Starting from <del>₹<?php echo $destination['old_price']; ?></del></p>
            <p class="price">₹<?php echo $destination['price']; ?> Per Person</p>
            <button>ENQUIRE NOW</button>
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

</body>
</html>





