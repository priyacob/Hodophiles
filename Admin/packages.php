<?php
include '../connect.php'; // Include database connection
include 'navbar.php'; // Include database connection
echo "<br>";
// Fetch all packages
$sql = "SELECT * FROM packages ORDER BY created_at DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h2><i class="fas fa-suitcase"></i> Travel Packages</h2>
    <div class="d-flex flex-row"><a href="add_packages.php"><button type="btn" class="btn btn-success d-flex-row">Add Packages</button></a></div>
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Package Name</th>
                <th>Destination</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Seats</th>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['package_id']); ?></td>
                    <td><?= htmlspecialchars($row['package_name']); ?></td>
                    <td><?= htmlspecialchars($row['destination']); ?></td>
                    <td><?= htmlspecialchars($row['day/night']); ?></td>
                    <td>$<?= number_format($row['price'], 2); ?></td>
                    <td><?= htmlspecialchars($row['seat_capacity']); ?></td>
                    <td><?= date("d M Y", strtotime($row['departure_date'])); ?></td>
                    <td><?= date("d M Y", strtotime($row['return_date'])); ?></td>
                    <td>
                        <a href="package_details.php?id=<?= $row['package_id']; ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-info-circle"></i> Details
                        </a>
                        <a href="edit_packages.php?id=<?= $row['package_id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="delete_packages.php?id=<?= $row['package_id']; ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this package?');">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
