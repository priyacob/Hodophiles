<?php
include 'navbar.php';
include 'connect.php';

// Default SQL query to fetch all hotels
$sql = "SELECT * FROM hotel";

// Handle the price filter
if (isset($_POST['min_price']) && isset($_POST['max_price'])) {
    $min_price = (int)$_POST['min_price'];
    $max_price = (int)$_POST['max_price'];

    // Validate the price range
    if ($min_price >= 0 && $max_price > $min_price) {
        $sql = "SELECT * FROM hotel WHERE price BETWEEN $min_price AND $max_price";
    }
}

$res = mysqli_query($con, $sql);
?>

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Find City</h3>
                    <form action="" method="POST">
                        <div class="fields">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Destination, City">
                            </div>
                            <div class="form-group">
                                <label>Min Price</label>
                                <input type="number" name="min_price" class="form-control" value="1000" min="0">
                            </div>
                            <div class="form-group">
                                <label>Max Price</label>
                                <input type="number" name="max_price" class="form-control" value="5000" min="0">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                <?php
// Database Connection
$host = "localhost"; // Change if needed
$user = "root"; // Your database username
$password = ""; // Your database password
$database = "soundarja"; // Your database name

$conn = mysqli_connect($host, $user, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch Data from Database
$sql = "SELECT * FROM hotel";
$res = mysqli_query($conn, $sql);
?>

<div class="row">
    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <div class="col-md-4 ftco-animate">
            <div class="destination">
                <a href="hotel-single.php?id=<?php echo $row['hotel_id']; ?>" 
                   class="img img-2 d-flex justify-content-center align-items-center"
                   style="background-image: url('<?php echo $row['image_url']; ?>');">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-search2"></span>
                    </div>
                </a>
                <div class="text p-3">
                    <div class="d-flex">
                        <div class="one">
                            <h3><a href="hotel-single.php?id=<?php echo $row['hotel_id']; ?>">
                                <?php echo $row['hotel_name']; ?>
                            </a></h3>
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
                            <span class="price per-price">₹<?php echo $row['price']; ?><br><small>/night</small></span>
                        </div>
                    </div>
                    <p><?php echo $row['description']; ?></p>
                    <hr>
                    <p class="bottom-area d-flex">
                        <span><i class="icon-map-o"></i> <?php echo $row['place']; ?></span>
                        <span class="ml-auto"><a href="booking.php?hotel_id=<?php echo $row['hotel_id']; ?>">Book Now</a></span>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
// Close connection
mysqli_close($conn);
?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- .section -->




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" />
	</svg></div>


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