<?php
session_start();
include 'connect.php'; // Ensure database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    die("Error: User not logged in. Please log in first.");
}

// Get the current logged-in user ID
$user_id = $_SESSION['uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $destination_id = isset($_POST['destination_id']) ? (int) $_POST['destination_id'] : 0;
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $travel_date = $_POST['travel_date'];
    $guests = (int) $_POST['guests'];
    $payment_method = $_POST['payment_method'];

    // Fetch the price from the database based on destination_id
    $stmt = $con->prepare("SELECT price FROM destinations WHERE id = ?");
    $stmt->bind_param("i", $destination_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $destination = $result->fetch_assoc();

    if (!$destination) {
        die("Error: Invalid destination selected.");
    }

    // Calculate total price
    $price_per_person = $destination['price'];
    $total_price = $price_per_person * $guests;

    // Insert booking into the database
    $query = "INSERT INTO p_bookings (user_id, destination_id, name, email, phone, address, travel_date, guests, payment_method, total_price) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("iisssssisd", $user_id, $destination_id, $name, $email, $phone, $address, $travel_date, $guests, $payment_method, $total_price);

    if ($stmt->execute()) {
        echo "<script>alert('Booking confirmed successfully!'); window.location.href='confirmation.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $con->close();
} else {
    echo "Invalid request.";
}
?>
