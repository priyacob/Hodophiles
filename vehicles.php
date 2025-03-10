<?php
include 'navbar.php';
include 'connect.php';

// Check if package_id is provided in the URL
if (isset($_GET['package_id']) && !empty($_GET['package_id'])) {
    $package_id = intval($_GET['package_id']);
    $sql = "SELECT * FROM vehicles WHERE availability_status='available' AND package_id = $package_id";
    $is_package = true;
} else {
    $sql = "SELECT * FROM vehicles WHERE availability_status='available'";
    $is_package = false;
}

$result = $con->query($sql);
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
          </div>
        </div>
      </div>
    </div> 
</div>



<!-- Custom Styles for Vehicle Cards -->


<!-- Main Content -->
<section class="container mt-5">
    <h1 class="text-center mb-4">Available Vehicles</h1>

    <?php if ($result->num_rows > 0) { ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm vehicle-card">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?> (<?php echo htmlspecialchars($row['type']); ?>)</h5>
                        <p class="card-text"><strong>Model:</strong> <?php echo htmlspecialchars($row['model_year']); ?></p>
                        <p class="card-text"><strong>Seats:</strong> <?php echo htmlspecialchars($row['seating_capacity']); ?> persons</p>
                        <p class="card-text"><strong>Fuel:</strong> <?php echo htmlspecialchars($row['fuel_type']); ?></p>
                        <p class="card-text"><strong>Price:</strong> ₹<?php echo number_format($row['price_per_day'], 2); ?> per day</p>
                        <div class="d-flex justify-content-between">
                            <a href="vehicle_details.php?v_id=<?php echo $row['v_id']; ?>" class="btn btn-outline-primary btn-custom">View Details</a>
                            <?php if ($is_package) { ?>
                                <a href="add_to_package.php?vehicle_id=<?php echo $row['v_id']; ?>&package_id=<?php echo $package_id; ?>" class="btn btn-outline-success btn-custom">Add</a>
                            <?php } else { ?>
                                <a href="book_vehicle.php?v_id=<?php echo $row['v_id']; ?>" class="btn btn-outline-warning btn-custom">Book Now</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } // end while ?>
        </div>
    <?php } else { ?>
        <p class="text-center text-danger">No vehicles available.</p>
    <?php } ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
        /* Vehicle Card Hover Effect */
        .vehicle-card {
            overflow: hidden;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Scale up & shadow effect on hover */
        .vehicle-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Image inside the card */
        .vehicle-card img {
            transition: transform 0.3s ease-in-out;
        }

        /* Image zoom effect */
        .vehicle-card:hover img {
            transform: scale(1.1);
        }

        /* Button hover effect */
        .btn-custom {
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            transform: scale(1.1);
        }
    </style><style>
    /* Vehicle Card Hover Effect */
    .vehicle-card {
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    /* Scale up & shadow effect on hover */
    .vehicle-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    /* Image inside the card */
    .vehicle-card img {
        transition: transform 0.3s ease-in-out;
    }
    /* Image zoom effect */
    .vehicle-card:hover img {
        transform: scale(1.1);
    }
    /* Button hover effect */
    .btn-custom {
        transition: all 0.3s ease-in-out;
    }
    .btn-custom:hover {
        transform: scale(1.1);
    }
</style>