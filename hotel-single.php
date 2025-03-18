<?php
include 'navbar.php';
include 'connect.php';

$hotel = null;
$images = [];

if (isset($_GET['hotel_id'])) {
	$hotel_id = intval($_GET['hotel_id']);
	$sql = "SELECT * FROM hotel WHERE hotel_id = ?";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, "i", $hotel_id);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	if ($res->num_rows > 0) {
		$hotel = $res->fetch_assoc();
		$images = explode(',', $hotel['image_url']);
	} else {
		echo "<p>Hotel not found.</p>";
		exit();
	}
	mysqli_stmt_close($stmt);
}
?>

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
					<span class="mr-2"><a href="hotel.html">Hotel</a></span>
					<span>Hotel Single</span>
				</p>
				<h1 class="mb-3 bread">Hotels Details</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			

			<div class="col-lg-9">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<?php if (!empty($images)) { ?>
							<div class="single-slider owl-carousel">
								<?php foreach ($images as $image) { ?>
									<div class="item">
										<div class="hotel-img"
											style="background-image: url('<?php echo trim(htmlspecialchars($image)); ?>');">
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } else { ?>
							<p>No images available.</p>
						<?php } ?>
					</div>

					<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
						<h2><?php echo htmlspecialchars($hotel['hotel_name']); ?></h2>
						<p class="rate mb-5">
							<span class="loc"><a href="#"><i class="icon-map"></i>
									<?php echo htmlspecialchars($hotel['place']); ?></a></span>
							<span class="star">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-o"></i> 8 Rating
							</span>
						</p>
						<p><?php echo nl2br(htmlspecialchars($hotel['description'])); ?></p>
					</div>

					<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
						<h4 class="mb-4">Our Rooms</h4>
						<div class="row">
						<?php
$sql = "SELECT * FROM room WHERE hotel_id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $hotel_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Prepare variables for each room
        $room_id = urlencode($row['room_id']);
        $image = 'images/' . htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8');
        ?>
        <div class="col-md-4">
            <div class="destination">
                <a href="hotel-single.php?room_id=<?= $room_id ?>" class="img img-2"
                   style="background-image: url('<?= $image ?>');"></a>
                <div class="text p-3">
                    <div class="d-flex">
                        <div class="one">
                            <h3>
                                <a href="hotel-single.php?room_id=<?= $room_id ?>">
                                    <?= htmlspecialchars($row['room_name']) ?>
                                </a>
                            </h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i> <span>8 Rating</span>
                            </p>
                        </div>
                        <div class="two">
                            <span class="price per-price">
							₹<?= number_format($row['price'], 2) ?><br>
                                <small>/night</small>
                            </span>
                        </div>
                    </div>
                    <p><?= substr(htmlspecialchars($row['description']), 0, 100) . '...'; ?></p>
                    <hr>
                    <p class="bottom-area d-flex">
                        <span><i class="icon-map-o"></i></span>
                        <span class="ml-auto">
                            <a href="hotel-single.php?room_id=<?= $room_id ?>">Book Now</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No rooms available.</p>";
}
mysqli_stmt_close($stmt);
mysqli_close($con);
?>


						</div>

					</div>

				</div>
			</div>
			<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
				<h4 class="mb-5">Check Availability &amp; Booking</h4>
				<div class="fields">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="checkin_date" class="form-control" placeholder="Date from">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="checkin_date" class="form-control" placeholder="Date to">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="select-wrap one-third">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control" placeholder="Guest">
										<option value="0">Guest</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="select-wrap one-third">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control" placeholder="Children">
										<option value="0">Children</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" value="Check Availability" class="btn btn-primary py-3">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			

		</div>
	</div> <!-- .col-md-8 -->
	</div>
	</div>
</section> <!-- .section -->


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

</body>

</html>