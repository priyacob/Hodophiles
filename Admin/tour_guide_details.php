<?php
include '../connect.php'; // Include database connection
// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No ID provided.");
}

$id = $_GET['id'];

// Fetch tour guide data
$sql = "SELECT * FROM tour_guides WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$guide = $result->fetch_assoc();

// If guide not found
if (!$guide) {
    die("Tour guide not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Guide Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tour Guide Details</h2>
        <div class="card p-3">
            <div class="row">
                <div class="col-md-4">
                    <?php if (!empty($guide['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($guide['image']); ?>" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <img src="uploads/default.png" class="img-thumbnail" width="200">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <p><strong>ID:</strong> <?= htmlspecialchars($guide['id']); ?></p>
                    <p><strong>Name:</strong> <?= htmlspecialchars($guide['name']); ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($guide['email']); ?></p>
                    <p><strong>Phone:</strong> <?= htmlspecialchars($guide['phone']); ?></p>
                    <p><strong>Experience:</strong> <?= htmlspecialchars($guide['experience']); ?> years</p>
                    <p><strong>Languages:</strong> <?= htmlspecialchars($guide['languages']); ?></p>
                    <p><strong>Specialization:</strong> <?= htmlspecialchars($guide['specialization']); ?></p>
                    <p><strong>Availability:</strong> <?= htmlspecialchars($guide['availability']); ?></p>
                    <p><strong>Joined On:</strong> <?= date("d M Y", strtotime($guide['created_at'])); ?></p>
                </div>
            </div>
            <div class="mt-3">
                <a href="edit_tour_guides.php?id=<?= $guide['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="tour_guide.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
