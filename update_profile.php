<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['u_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $date_of_birth = $_POST['date_of_birth'];
    $preferred_language = $_POST['preferred_language'];
    $travel_preferences = $_POST['travel_preferences'];
    $profile_image = $_POST['existing_image']; // Keep existing image by default

    // Handle profile image upload
    if (!empty($_FILES["profileImage"]["name"])) {
        $target_dir = "images/";
        $file_name = basename($_FILES["profileImage"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
        if ($check !== false) {
            // Allow only certain file formats
            if (in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                // Move file to the target directory
                if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                    $profile_image = $target_file; // Update image path
                } else {
                    $_SESSION['error'] = "File upload failed!";
                    header("Location: profile.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
                header("Location: profile.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "File is not an image!";
            header("Location: profile.php");
            exit();
        }
    }

    // Update user details in the database
    $sql = "UPDATE users SET name=?, email=?, phone=?, city=?, country=?, date_of_birth=?, preferred_language=?, travel_preferences=?, image=? WHERE u_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $email, $phone, $city, $country, $date_of_birth, $preferred_language, $travel_preferences, $profile_image, $u_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: profile.php");
    } else {
        $_SESSION['error'] = "Error updating profile.";
        header("Location: profile.php");
    }
}
?>
