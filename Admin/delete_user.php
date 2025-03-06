<?php
include '../connect.php';
// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user data to get the image filename
    $sql = "SELECT image FROM users WHERE u_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Delete the image file if it exists
        if (!empty($user['image']) && file_exists("uploads/" . $user['image'])) {
            unlink("uploads/" . $user['image']);
        }

        // Delete the user from the database
        $sql = "DELETE FROM users WHERE u_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            echo "<script>alert('User deleted successfully!'); window.location='users.php';</script>";
        } else {
            echo "<script>alert('Error deleting user!'); window.location='users.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location='users.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location='users.php';</script>";
}

// Close connection
$con->close();
?>
