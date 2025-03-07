<?php
include '../connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $languages = $_POST['languages'];
    $specialization = $_POST['specialization'];
    $availability = $_POST['availability'];
    
    // Insert into database
    $query = "INSERT INTO tour_guides (name, email, phone, experience, languages, specialization, availability) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sssssss", $name, $email, $phone, $experience, $languages, $specialization, $availability);
    
    if ($stmt->execute()) {
        echo "<script>alert('Tour Guide added successfully!'); window.location.href='tour_guide.php';</script>";
    } else {
        echo "<script>alert('Error adding Tour Guide.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tour Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Add New Tour Guide</h2>
            <a href="add_tour_guid.php" class="btn btn-primary" style="margin-left: auto;">Add Tour Guide</a>
        </div>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Experience</label>
                <input type="text" name="experience" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Languages</label>
                <input type="text" name="languages" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Specialization</label>
                <input type="text" name="specialization" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Availability</label>
                <input type="text" name="availability" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Tour Guide</button>
            <a href="tour_guide.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
