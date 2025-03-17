<?php
include('connect.php');
include('navbar.php');

// Retrieve search parameters from POST
$keyword = "";
$package_id = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $keyword = $con->real_escape_string(trim($_POST['keyword']));
    $package_id = $con->real_escape_string(trim($_POST['package_id']));
}
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

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <!-- Ionicons (for dropdown arrow, if needed) -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <style>

    .section-title {
      margin: 40px 0 20px;
      padding-bottom: 5px;
      border-bottom: 2px solid #ddd;
      color: #333;
      font-weight: 600;
    }
    .result-section {
      margin-bottom: 40px;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 20px;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .card-img-top {
      height: 150px;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .card-title {
      font-size: 1.1rem;
      margin-bottom: 0;
      font-weight: 600;
    }
    .card-text {
      font-size: 0.9rem;
      color: #666;
    }
  </style>

  <div class="container">

    
    <!-- 1. Restaurants -->
    <?php
      $sql_restaurants = "SELECT r_id, name, image FROM restaurants 
                          WHERE name LIKE '%$keyword%' OR address LIKE '%$keyword%'";
      $res_restaurants = $con->query($sql_restaurants);
      if ($res_restaurants && $res_restaurants->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Restaurants</h3>
      <div class="row g-3">
        <?php while ($row = $res_restaurants->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <?php if (!empty($row['image'])): ?>
                <img src="images/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
              <?php else: ?>
                <img src="images/default_restaurant.jpg" class="card-img-top" alt="Default Restaurant">
              <?php endif; ?>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- 2. Vehicles -->
    <?php
      $sql_vehicles = "SELECT v_id, name, image FROM vehicles WHERE name LIKE '%$keyword%'";
      if (!empty($package_id)) {
          $sql_vehicles .= " AND package_id = $package_id";
      }
      $res_vehicles = $con->query($sql_vehicles);
      if ($res_vehicles && $res_vehicles->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Vehicles</h3>
      <div class="row g-3">
        <?php while ($row = $res_vehicles->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <?php if (!empty($row['image'])): ?>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
              <?php else: ?>
                <img src="images/default_vehicle.jpg" class="card-img-top" alt="Default Vehicle">
              <?php endif; ?>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    
    <?php
      $sql_packages = "SELECT package_id, package_name FROM packages WHERE package_name LIKE '%$keyword%'";
      if (!empty($package_id)) {
          $sql_packages .= " AND package_id = $package_id";
      }
      $res_packages = $con->query($sql_packages);
      if ($res_packages && $res_packages->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Packages</h3>
      <div class="row g-3">
        <?php while ($row = $res_packages->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <!-- Optionally add an image or icon here -->
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['package_name']); ?></h5>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- 4. Hotels -->
    <?php
      $sql_hotels = "SELECT hotel_id, hotel_name, image_url FROM hotel WHERE hotel_name LIKE '%$keyword%'";
      $res_hotels = $con->query($sql_hotels);
      if ($res_hotels && $res_hotels->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Hotels</h3>
      <div class="row g-3">
        <?php while ($row = $res_hotels->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <?php if (!empty($row['image_url'])): ?>
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['hotel_name']); ?>">
              <?php else: ?>
                <img src="images/default_hotel.jpg" class="card-img-top" alt="Default Hotel">
              <?php endif; ?>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['hotel_name']); ?></h5>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- 5. Tour Guides -->
    <?php
      $sql_guides = "SELECT id, name, specialization FROM tour_guides 
                     WHERE name LIKE '%$keyword%' OR specialization LIKE '%$keyword%'";
      $res_guides = $con->query($sql_guides);
      if ($res_guides && $res_guides->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Tour Guides</h3>
      <div class="row g-3">
        <?php while ($row = $res_guides->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row['specialization']); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- 6. Destinations / Tours -->
    <?php
      $sql_destinations = "SELECT id, name, image_url FROM destinations 
                           WHERE name LIKE '%$keyword%' OR overview LIKE '%$keyword%'";
      $res_destinations = $con->query($sql_destinations);
      if ($res_destinations && $res_destinations->num_rows > 0):
    ?>
    <div class="result-section">
      <h3 class="section-title">Destinations / Tours</h3>
      <div class="row g-3">
        <?php while ($row = $res_destinations->fetch_assoc()): ?>
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <?php if (!empty($row['image_url'])): ?>
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
              <?php else: ?>
                <img src="images/default_destination.jpg" class="card-img-top" alt="Default Destination">
              <?php endif; ?>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

