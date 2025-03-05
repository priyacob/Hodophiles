<?php
include '../connect.php'; // Include database connection

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No ID provided.");
}

$id = $_GET['id'];

// Prepare delete query
$sql = "DELETE FROM tour_guides WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Tour guide deleted successfully!'); window.location='tour_guide.php';</script>";
} else {
    echo "<script>alert('Error deleting tour guide.'); window.location='tour_guide.php';</script>";
}

$stmt->close();
$con->close();
?>
