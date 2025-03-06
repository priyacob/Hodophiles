<?php
include '../connect.php'; // Include database connection

// Check if package ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No package ID provided.");
}

$package_id = $_GET['id'];

// Delete query
$sql = "DELETE FROM packages WHERE package_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $package_id);

if ($stmt->execute()) {
    echo "<script>alert('Package deleted successfully!'); window.location='packages.php';</script>";
} else {
    echo "<script>alert('Error deleting package. Please try again.'); window.location='packages.php';</script>";
}
?>
