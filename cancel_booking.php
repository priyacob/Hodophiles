<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
    $user_id = $_SESSION['uid'];

    $sql = "DELETE FROM p_bookings WHERE id = ? AND user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $booking_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking Cancelled'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error! Try again.');</script>";
    }
}
?>
