<?php
include '../connect.php'; // Include database connection
include 'navbar.php'; // Include database connection
echo "<br>";
// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No package ID provided.");
}

$package_id = $_GET['id'];

// Fetch package details
$sql = "SELECT * FROM packages WHERE package_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $package_id);
$stmt->execute();
$result = $stmt->get_result();
$package = $result->fetch_assoc();

// If package not found
if (!$package) {
    die("Package not found.");
}

// Update package
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $destination = $_POST['destination'];
    $duration = $_POST['duration'];
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

    $update_sql = "UPDATE packages SET 
        package_name=?, description=?, destination=?, `day/night`=?, price=?, 
        availability=?, departure_date=?, return_date=?, transport_mode=?, 
        accommodation=?, inclusions=?, exclusions=?, seat_capacity=?, 
        ride=?, package_type=? WHERE package_id=?";

    $stmt = $con->prepare($update_sql);
    $stmt->bind_param("ssssissssssssisi", $package_name, $description, $destination, 
        $duration, $price, $availability, $departure_date, $return_date, 
        $transport_mode, $accommodation, $inclusions, $exclusions, $seat_capacity, 
        $ride, $package_type, $package_id);

    if ($stmt->execute()) {
        echo "<script>alert('Package updated successfully!'); window.location='packages.php';</script>";
    } else {
        echo "<script>alert('Error updating package. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Package</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Package Name</label>
                <input type="text" class="form-control" name="package_name" value="<?= htmlspecialchars($package['package_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" required><?= htmlspecialchars($package['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <input type="text" class="form-control" name="destination" value="<?= htmlspecialchars($package['destination']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Duration (Day/Night)</label>
                <input type="text" class="form-control" name="duration" value="<?= htmlspecialchars($package['day/night']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($package['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Availability</label>
                <input type="text" class="form-control" name="availability" value="<?= htmlspecialchars($package['availability']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Departure Date</label>
                <input type="date" class="form-control" name="departure_date" value="<?= htmlspecialchars($package['departure_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Return Date</label>
                <input type="date" class="form-control" name="return_date" value="<?= htmlspecialchars($package['return_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Transport Mode</label>
                <input type="text" class="form-control" name="transport_mode" value="<?= htmlspecialchars($package['transport_mode']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Accommodation</label>
                <input type="text" class="form-control" name="accommodation" value="<?= htmlspecialchars($package['accommodation']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Inclusions</label>
                <textarea class="form-control" name="inclusions" required><?= htmlspecialchars($package['inclusions']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Exclusions</label>
                <textarea class="form-control" name="exclusions" required><?= htmlspecialchars($package['exclusions']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Seat Capacity</label>
                <input type="number" class="form-control" name="seat_capacity" value="<?= htmlspecialchars($package['seat_capacity']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ride</label>
                <input type="text" class="form-control" name="ride" value="<?= htmlspecialchars($package['ride']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Package Type</label>
                <input type="text" class="form-control" name="package_type" value="<?= htmlspecialchars($package['package_type']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Package</button>
            <a href="packages.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
