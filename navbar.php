<?php 
include 'connect.php';
session_start();

if (isset($_SESSION['uid'])) {
  $u_id = $_SESSION['uid'];

  $sql = "SELECT * FROM users WHERE u_id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $u_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  $profile_pic = !empty($user['image']) ? $user['image'] : 'images/default.jpg';
}

$sql="select * from packages";
$res=mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DirEngine - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <!-- Bootstrap and jQuery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI for Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        Hodophiles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <!-- <li class="nav-item"><a href="about.php" class="nav-link">About</a></li> -->
          <li class="nav-item"><a href="tour.php" class="nav-link">Tour</a></li>
          <li class="nav-item"><a href="hotel.php" class="nav-link">Hotels</a></li>
          <li class="nav-item"><a href="vehicles.php" class="nav-link">Vehicles</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <!-- <li class="nav-item cta"><a href="login.php" class="nav-link"><span>Login</span></a></li> -->
          <li class="nav-item dropdown cta">
    <a class="nav-link  dropdown-toggle" href="#" id="profileMenu" data-bs-toggle="dropdown">
        <?php if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] === 'yes') { ?>
          
            <img src="<?php echo $profile_pic; ?>" alt="User" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
        <?php } else { ?>
          <span>Login</span>
        <?php } ?>
    </a>
    <ul class="dropdown-menu border-0 shadow p-3">
        <?php if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] === 'yes') { ?>
            <li><a class="dropdown-item" href="profile.php">My Account</a></li>
            <li><a class="dropdown-item" href="add-account.php">Add Another Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a class="dropdown-item" href="login.php">Login</a></li>
        <?php } ?>
    </ul>
</li>




        </ul>
      </div>
    </div>
  </nav>




  

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
  <script src="js/range.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  <body>
</html>    
