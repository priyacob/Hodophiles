<?php
include 'navbar.php';
include 'connect.php';

// Fetch destinations
$sql_destinations = "SELECT * FROM destinations";
$result_destinations = mysqli_query($con, $sql_destinations);

// Fetch packages
$sql_packages = "SELECT * FROM packages";
$result_packages = mysqli_query($con, $sql_packages);

// Fetch hotels
$sql_hotels = "SELECT * FROM hotel";
$result_hotels = mysqli_query($con, $sql_hotels);

// Fetch rooms
$sql_rooms = "SELECT * FROM room";
$result_rooms = mysqli_query($con, $sql_rooms);

// Fetch restaurants
$sql_restaurants = "SELECT * FROM restaurants";
$result_restaurants = mysqli_query($con, $sql_restaurants);

if (!$result_destinations || !$result_packages || !$result_hotels || !$result_rooms || !$result_restaurants) {
    die("Query Failed: " . mysqli_error($con));
}
?>
<!-- END nav -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Explore <br></strong> your amazing city</h1>
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>
                <div class="block-17 my-4">
                    <form action="search_result.php" method="post" class="search-form d-block d-flex">
                        <div class="fields d-block d-flex">
                            <div class="textfield-search one-third">
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Ex: food, service, hotel">
                            </div>
                        </div>
                        <input type="submit" class="search-submit btn btn-primary" value="Search">
                    </form>
                </div>
                <p>Or browse the highlights</p>
                <p class="browse d-md-flex">
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="resturent.php"><i class="flaticon-fork"></i>Restaurant</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="hotel.php"><i class="flaticon-hotel"></i>Hotel</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="places.php"><i class="flaticon-meeting-point"></i>Places</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="shopping.php"><i class="flaticon-shopping-bag"></i>Shopping</a></span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Featured Destinations -->
<section class="ftco-section ftco-destination">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Featured</span>
                <h2 class="mb-4"><strong>Featured</strong> Destination</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="destination-slider owl-carousel ftco-animate">
                    <?php
                    if (mysqli_num_rows($result_destinations) > 0) {
                        while ($row = mysqli_fetch_assoc($result_destinations)) {
                    ?>
                            <div class="item">
                                <div class="destination">
                                    <a href="destination-details.php?id=<?php echo $row['id']; ?>" class="img d-flex justify-content-center align-items-center"
                                        style="background-image: url(<?php echo $row['image_url']; ?>);">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <h3><a href="destination-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h3>
                                        <span class="listing">15 Listing</span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>No destinations found!</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Hotels & Rooms -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Popular</strong> Hotels &amp; Rooms</h2>
            </div>
        </div>
        <div class="row">
            <?php
            // Fetch and display hotels
            if (mysqli_num_rows($result_hotels) > 0) {
                while ($row = mysqli_fetch_assoc($result_hotels)) {
            ?>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="hotel-details.php?id=<?php echo $row['hotel_id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $row['image_url']; ?>);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="hotel-details.php?id=<?php echo $row['hotel_id']; ?>"><?php echo $row['hotel_name']; ?></a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price"><?php echo $row['price']; ?><br><small>/night</small></span>
                                    </div>
                                </div>
                                <p><?php echo $row['description']; ?></p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> <?php echo $row['place']; ?></span>
                                    <span class="ml-auto"><a href="hotel-details.php?id=<?php echo $row['hotel_id']; ?>">Book Now</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No hotels found!</p>";
            }

            
            ?>
        </div>
    </div>
</section>

<!-- Popular Restaurants -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Popular</strong> Restaurants</h2>
            </div>
        </div>
        <div class="row">
            <?php
            if (mysqli_num_rows($result_restaurants) > 0) {
                while ($row = mysqli_fetch_assoc($result_restaurants)) {
            ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="destination">
                            <a href="restaurant_details.php?id=<?php echo $row['r_id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/<?php echo $row['image']; ?>);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="restaurant_details.php?id=<?php echo $row['r_id']; ?>"><?php echo $row['name']; ?></a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                                <p><?php echo $row['cuisine_type']; ?></p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> <?php echo $row['city']; ?></span>
                                    <span class="ml-auto"><a href="restaurant_details.php?id=<?php echo $row['r_id']; ?>">Discover</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No restaurants found!</p>";
            }
            ?>
        </div>
    </div>
</section>

<!-- JavaScript Links -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

<?php include 'footer.php'; ?>