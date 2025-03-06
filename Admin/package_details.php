<?php
include '../connect.php'; // Include database connection


// Check if package ID is provided
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

if ($result->num_rows == 0) {
    die("Package not found.");
}

$package = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Package Details</h2>
        <div class="card p-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="uploads/package_default.png" class="img-thumbnail" width="200">
                </div>
                <div class="col-md-8">
                    <p><strong>ID:</strong> <?= htmlspecialchars($package['package_id']); ?></p>
                    <p><strong>Name:</strong> <?= htmlspecialchars($package['package_name']); ?></p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($package['description']); ?></p>
                    <p><strong>Destination:</strong> <?= htmlspecialchars($package['destination']); ?></p>
                    <p><strong>Day/Night:</strong> <?= htmlspecialchars($package['day/night']); ?></p>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($package['price']); ?></p>
                    <p><strong>Availability:</strong> <?= htmlspecialchars($package['availability']); ?></p>
                    <p><strong>Departure Date:</strong> <?= htmlspecialchars($package['departure_date']); ?></p>
                    <p><strong>Return Date:</strong> <?= htmlspecialchars($package['return_date']); ?></p>
                    <p><strong>Transport Mode:</strong> <?= htmlspecialchars($package['transport_mode']); ?></p>
                    <p><strong>Accommodation:</strong> <?= htmlspecialchars($package['accommodation']); ?></p>
                    <p><strong>Seat Capacity:</strong> <?= htmlspecialchars($package['seat_capacity']); ?></p>
                    <p><strong>Ride:</strong> <?= htmlspecialchars($package['ride']); ?></p>
                    <p><strong>Package Type:</strong> <?= htmlspecialchars($package['package_type']); ?></p>
                </div>
            </div>
            <div class="mt-3">
                <a href="edit_packages.php?id=<?= $package['package_id']; ?>" class="btn btn-warning">Edit</a>
                <a href="packages.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
