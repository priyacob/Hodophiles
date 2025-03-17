<?php
include 'connect.php'; 
include 'navbar.php';

if (isset($_GET['r_id'])) {
    $r_id = intval($_GET['r_id']); // Get restaurant ID and sanitize it

    // Fetch restaurant details
    $query = "SELECT * FROM restaurants WHERE r_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $r_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $restaurant = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger text-center'>Restaurant not found!</div>";
        exit;
    }

    // Fetch food items for this restaurant
    $foodQuery = "SELECT * FROM food WHERE r_id = ?";
    $stmt = $con->prepare($foodQuery);
    $stmt->bind_param("i", $r_id);
    $stmt->execute();
    $foodResult = $stmt->get_result();
} else {
    echo "<div class='alert alert-warning text-center'>Invalid request!</div>";
    exit;
}
?>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .restaurant-card {
            max-width: 900px;
            margin: auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .restaurant-card img {
            height: 400px;
            object-fit: cover;
        }
        .card-body {
            padding: 30px;
        }
        .btn-custom {
            background-color: #ff6600;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #cc5200;
        }
        .icon {
            color: #ff6600;
            font-size: 1.2rem;
            margin-right: 5px;
        }
        .food-item img {
            height: 180px;
            object-fit: cover;
        }
    </style>
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


<div class="container mt-5">
    <!-- Restaurant Details -->
    <div class="card restaurant-card">
        <img src="images/<?php echo $restaurant['image']; ?>" class="card-img-top" alt="<?php echo $restaurant['name']; ?>">
        <div class="card-body">
            <h2 class="text-center"><?php echo $restaurant['name']; ?></h2>
            <hr>
            <p><i class="icon fas fa-map-marker-alt"></i><strong> Address:</strong> <?php echo $restaurant['address']; ?>, <?php echo $restaurant['city']; ?>, <?php echo $restaurant['state']; ?>, <?php echo $restaurant['country']; ?> - <?php echo $restaurant['pincode']; ?></p>
            <p><i class="icon fas fa-phone"></i><strong> Contact:</strong> <?php echo $restaurant['contact_number']; ?> | <a href="mailto:<?php echo $restaurant['email']; ?>"><?php echo $restaurant['email']; ?></a></p>
            <p><i class="icon fas fa-globe"></i><strong> Website:</strong> <a href="<?php echo $restaurant['website']; ?>" target="_blank"><?php echo $restaurant['website']; ?></a></p>
            <p><i class="icon fas fa-clock"></i><strong> Opening Hours:</strong> <?php echo $restaurant['opening_hours']; ?></p>
            <p><i class="icon fas fa-utensils"></i><strong> Cuisine:</strong> <?php echo $restaurant['cuisine_type']; ?></p>
            <p><i class="icon fas fa-money-bill-wave"></i><strong> Average Cost:</strong> $<?php echo $restaurant['average_cost']; ?> for two</p>
            <p><i class="icon fas fa-star"></i><strong> Rating:</strong> ⭐ <?php echo $restaurant['rating']; ?>/5</p>
            <div class="text-center">
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
                <a href="<?php echo $restaurant['website']; ?>" target="_blank" class="btn btn-custom">Visit Website</a>
            </div>
        </div>
    </div>

    <!-- Food Items -->
    <h3 class="text-center mt-5">Available Food Items</h3>
    <div class="row">
        <?php if ($foodResult->num_rows > 0) {
            while ($food = $foodResult->fetch_assoc()) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card food-item">
                        <img src="images/<?php echo $food['image']; ?>" class="card-img-top" alt="<?php echo $food['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food['name']; ?></h5>
                            <p class="card-text"><?php echo $food['description']; ?></p>
                            <p><strong>Price:</strong> ₹<?php echo $food['price']; ?></p>
                            <p><strong>Status:</strong> 
                                <span class="badge badge-<?php echo ($food['status'] == 'Available') ? 'success' : 'danger'; ?>">
                                    <?php echo $food['status']; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <p class="text-center text-muted w-100">No food items available for this restaurant.</p>
        <?php } ?>
    </div>
</div>

