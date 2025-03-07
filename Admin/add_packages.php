<?php
include '../connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $destination = $_POST['destination'];
    $day_night = $_POST['day_night'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $transport_mode = $_POST['transport_mode'];
    $accommodation = $_POST['accommodation'];
    $inclusions = $_POST['inclusions'];
    $exclusions = $_POST['exclusions'];
    $seat_capacity = $_POST['seat_capacity'];
    $ride = $_POST['ride'];
    $package_type = $_POST['package_type'];
    $created_at = date('Y-m-d H:i:s');
    
    // Insert into database
    $query = "INSERT INTO packages (package_name, description, destination, `day/night`, price, availability, departure_date, return_date, transport_mode, accommodation, inclusions, exclusions, seat_capacity, ride, package_type, created_at) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssssssssssssss", $package_name, $description, $destination, $day_night, $price, $availability, $departure_date, $return_date, $transport_mode, $accommodation, $inclusions, $exclusions, $seat_capacity, $ride, $package_type, $created_at);
    
    if ($stmt->execute()) {
        echo "<script>alert('Package added successfully!'); window.location.href='packages.php';</script>";
    } else {
        echo "<script>alert('Error adding package.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Package</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Package Name</label>
                <input type="text" name="package_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <input type="text" name="destination" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Days/Nights</label>
                <input type="text" name="day_night" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Availability</label>
                <input type="text" name="availability" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Departure Date</label>
                <input type="date" name="departure_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Return Date</label>
                <input type="date" name="return_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Transport Mode</label>
                <input type="text" name="transport_mode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Accommodation</label>
                <input type="text" name="accommodation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Inclusions</label>
                <textarea name="inclusions" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Exclusions</label>
                <textarea name="exclusions" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Seat Capacity</label>
                <input type="number" name="seat_capacity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ride</label>
                <input type="text" name="ride" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Package Type</label>
                <input type="text" name="package_type" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Package</button>
            <a href="packages.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
