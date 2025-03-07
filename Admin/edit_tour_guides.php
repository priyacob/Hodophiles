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

// Handle form submission (Update logic)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $languages = $_POST['languages'];
    $specialization = $_POST['specialization'];
    $availability = $_POST['availability'];

    $update_sql = "UPDATE tour_guides SET name=?, email=?, phone=?, experience=?, languages=?, specialization=?, availability=? WHERE id=?";
    $stmt = $con->prepare($update_sql);
    $stmt->bind_param("sssssssi", $name, $email, $phone, $experience, $languages, $specialization, $availability, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Tour guide updated successfully!'); window.location='tour_guide.php';</script>";
    } else {
        echo "<script>alert('Error updating tour guide.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Tour Guide</h2>
    
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $guide['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $guide['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $guide['phone']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Experience (Years)</label>
            <input type="number" name="experience" class="form-control" value="<?php echo $guide['experience']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Languages</label>
            <input type="text" name="languages" class="form-control" value="<?php echo $guide['languages']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" value="<?php echo $guide['specialization']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Availability</label>
            <select name="availability" class="form-control" required>
                <option value="Available" <?php if ($guide['availability'] == 'Available') echo 'selected'; ?>>Available</option>
                <option value="Busy" <?php if ($guide['availability'] == 'Busy') echo 'selected'; ?>>Busy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Guide</button>
        <a href="tour_guide.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
