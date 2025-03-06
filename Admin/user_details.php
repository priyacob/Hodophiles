<?php
include '../connect.php';
// Check if the user ID is provided
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details
    $sql = "SELECT * FROM users WHERE u_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "<script>alert('User not found!'); window.location='users.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location='users.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Details</h2>
        <div class="card p-3">
            <div class="row">
                <div class="col-md-4">
                    <?php if (!empty($user['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($user['image']); ?>" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <img src="uploads/default.png" class="img-thumbnail" width="200">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <p><strong>ID:</strong> <?= htmlspecialchars($user['u_id']); ?></p>
                    <p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                    <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']); ?></p>
                    <p><strong>Address:</strong> <?= htmlspecialchars($user['address']); ?></p>
                    <p><strong>City:</strong> <?= htmlspecialchars($user['city']); ?></p>
                    <p><strong>Country:</strong> <?= htmlspecialchars($user['country']); ?></p>
                    <p><strong>Date of Birth:</strong> <?= htmlspecialchars($user['date_of_birth']); ?></p>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']); ?></p>
                </div>
            </div>
            <div class="mt-3">
                <a href="edit_user.php?id=<?= $user['u_id']; ?>" class="btn btn-warning">Edit</a>
                <a href="users.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
