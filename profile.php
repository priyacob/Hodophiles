<?php
include 'navbar.php';
include('connect.php');

if (isset($_SESSION['uid'])) {
    $u_id = $_SESSION['uid'];

    $sql = "SELECT * FROM users WHERE u_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $u_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $profile_pic = !empty($user['image']) ? $user['image'] : 'images/default.jpg';
} else {
    header("Location: login.php");
    exit();
}
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>  -->
<!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">  -->

    <style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

        .profile-img {
            position: relative;
            width: 150px;
            height: 150px;
            margin: auto;
        }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    font-size: 14px;
    padding-top: .9rem;
    padding-bottom: .9rem;
    padding-left: 20px;
    padding-right: 20px;
    color: #000000;
    font-weight: 400;
    opacity: 1 !important;}
    .navbar-dark .navbar-brand {
    color: black;
}



        .profile-img img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
nav{
    background-color:gray;
}
        .upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .upload-btn input {
            display: none;
        }
    </style>
<!-- </head>
<body> -->
<form action="update_profile.php" method="POST" enctype="multipart/form-data" style="margin-top: 100px;">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 text-center">
        <div class="profile-img">
                <img id="profilePreview" src="<?php echo $profile_pic; ?>" alt="Profile Picture" class="rounded-circle">
                <label for="profileImage" class="upload-btn">
                    <i class="fas fa-camera"></i>
                    <input type="file" name="profileImage" id="profileImage" accept="image/*" onchange="previewImage(event)">
                </label>
            </div>
        </div>
        <div class="col-md-8">
            <h3>User Profile</h3>
            
                <input type="hidden" name="u_id" value="<?php echo $user['u_id']; ?>">
                <input type="hidden" name="existing_image" value="<?php echo $user['image']; ?>">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $user['city']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="<?php echo $user['country']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="<?php echo $user['date_of_birth']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Preferred Language</label>
                    <input type="text" name="preferred_language" class="form-control" value="<?php echo $user['preferred_language']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Travel Preferences</label>
                    <textarea name="travel_preferences" class="form-control"><?php echo $user['travel_preferences']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
         
        </div>
    </div>
</div>
</form>
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        document.getElementById('profilePreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

<!-- </body>
</html> -->

  

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
    