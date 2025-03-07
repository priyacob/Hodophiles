<?php
include 'navbar.php';
include 'connect.php';
$sql = "select * from packages";
$res = mysqli_query($con, $sql);


$sqls = "SELECT * FROM destinations";
$ress = mysqli_query($con, $sqls);

if (!$ress) {
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
					<form action="" method="post" class="d-block d-flex">
						<div class="fields d-block d-flex">
							<div class="textfield-search one-third">
								<input type="text" class="form-control" placeholder="Ex: food, service, hotel">
							</div>
							<div class="select-wrap one-third">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control" placeholder="Keyword search">
									<option value="">Where</option>
									<option value="">San Francisco USA</option>
									<option value="">Berlin Germany</option>
									<option value="">Lodon United Kingdom</option>
									<option value="">Paris Italy</option>
								</select>
							</div>
						</div>
						<input type="submit" class="search-submit btn btn-primary" value="Search">
					</form>
				</div>
				<p>Or browse the highlights</p>
				<p class="browse d-md-flex">
					<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-fork"></i>Restaurant</a></span>
					<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-hotel"></i>Hotel</a></span>
					<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-meeting-point"></i>Places</a></span>
					<span class="d-flex justify-content-md-center align-items-md-	center"><a href="#"><i class="flaticon-shopping-bag"></i>Shopping</a></span>
				</p>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section services-section bg-light">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon"><span class="flaticon-guarantee"></span></div>
					</div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Best Price Guarantee</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon"><span class="flaticon-like"></span></div>
					</div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Travellers Love Us</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon"><span class="flaticon-detective"></span></div>
					</div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Best Travel Agent</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon"><span class="flaticon-support"></span></div>
					</div>
					<div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">Our Dedicated Support</h3>
						<p>A small river named Duden flows by their place and supplies.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 
<div class="container mt-4 bg-primary" style="  border-radius: 10px;position: relative;
    bottom: 100px;" >
	<h1 class="text-light">Vehicles</h1>
    <div class="icon-container bg-light p-2" >
        <i class="bi bi-car-front"></i> <!-- Car -->
        <i class="bi bi-truck"></i> <!-- Truck -->
        <i class="bi bi-bus-front"></i> <!-- Bus -->
        <i class="bi bi-bicycle"></i> <!-- Bicycle -->
        <i class="bi bi-airplane"></i> <!-- Airplane -->
    </div>
</div>
<style>
	.icon-container {
            height: 40px;
            background: #f8f9fa;
            display: flex;
			justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            padding: 5px 15px;
            border: 1px solid #ddd;
        }

        /* Icon Styling */
        .icon-container i {
            font-size: 28px;
            color: #555;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
        }

        /* Hover Effect */
        .icon-container i:hover {
            background: #007bff;
            color: white;
            transform: scale(1.2);
        }
    </style>
	 

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
                    if (mysqli_num_rows($ress) > 0) {
                        while ($rows = mysqli_fetch_assoc($ress)) {
                    ?>
                            <div class="item" onclick="window.location.href='destination-details.php?id=<?php echo $rows['id']; ?>'">
                                <div class="destination">
                                    <a href="#" class="img d-flex justify-content-center align-items-center" 
                                       style="background-image: url(<?php echo $rows['image_url']; ?>);">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <h3><a href="#"><?php echo $rows['name']; ?></a></h3>
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

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Top</strong> Tour Packages</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-1.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
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
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-2.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
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
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-3.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
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
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-4.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
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
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm col-md-6 col-lg ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-5.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<div class="d-flex">
							<div class="one">
								<h3><a href="#">Paris, Italy</a></h3>
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
								<span class="price">$200</span>
							</div>
						</div>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<p class="days"><span>2 days 3 nights</span></p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
				<h2 class="mb-4">Some fun facts</h2>
				<span class="subheading">More than 100,000 websites hosted</span>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="100000">0</strong>
								<span>Happy Customers</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="40000">0</strong>
								<span>Destination Places</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="87000">0</strong>
								<span>Hotels</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="56400">0</strong>
								<span>Restaurant</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Popular</strong> Hotels &amp; Rooms</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">



			<?php
			while ($row = mysqli_fetch_assoc($res)) { ?>
				<div class="col-sm col-md-6 col-lg ftco-animate">
					<div class="destination">
						<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-1.jpg);">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="icon-search2"></span>
							</div>
						</a>
						<div class="text p-3">
							<div class="d-flex">
								<div class="one">
									<h3><a href="#"><?php echo $row['package_name'] ?></a></h3>
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
									<span class="price per-price"><?php echo $row['price'] ?><br><small>/night</small></span>
								</div>
							</div>
							<p><?php echo $row['description'] ?></p>
							<hr>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> Miami, Fl</span>
								<span class="ml-auto"><a href="#">Book Now</a></span>
							</p>
						</div>
					</div>
				</div>

			<?php } ?>






		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-start">
			<div class="col-md-5 heading-section ftco-animate">
				<span class="subheading">Best Directory Website</span>
				<h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
				<p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6 heading-section ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel">
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from italy</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from London</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap d-flex">
									<div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text ml-md-4">
										<p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Dennis Green</p>
										<span class="position">Guest from Philippines</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Special Offers</span>
				<h2 class="mb-4"><strong>Popular</strong> Restaurants</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-1.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Discover</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-2.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-3.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="destination">
					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-4.jpg);">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="icon-search2"></span>
						</div>
					</a>
					<div class="text p-3">
						<h3><a href="#">Luxury Restaurant</a></h3>
						<p class="rate">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							<span>8 Rating</span>
						</p>
						<p>Far far away, behind the word mountains, far from the countries</p>
						<hr>
						<p class="bottom-area d-flex">
							<span><i class="icon-map-o"></i> San Franciso, CA</span>
							<span class="ml-auto"><a href="#">Book Now</a></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<span class="subheading">Recent Blog</span>
				<h2><strong>Tips</strong> &amp; Articles</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
					</a>
					<div class="text p-4 d-block">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
					</a>
					<div class="text p-4">
						<span class="tag">Culture</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
					</a>
					<div class="text p-4">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
					</a>
					<div class="text p-4">
						<span class="tag">Tips, Travel</span>
						<h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						<div class="meta mb-3">
							<div><a href="#">August 12, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section-parallax">
	<div class="parallax-img d-flex align-items-center">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2>Subcribe to our Newsletter</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
					<div class="row d-flex justify-content-center mt-5">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<div class="form-group d-flex">
									<input type="text" class="form-control" placeholder="Enter email address">
									<input type="submit" value="Subscribe" class="submit px-3">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
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

<?php include 'footer.php'; ?>