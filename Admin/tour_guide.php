<?php
include '../connect.php';
include 'navbar.php';
echo '<br>';
echo '<br>';
?>
<?php
// Fetch tour guides data
$sql = "SELECT * FROM tour_guides";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Guides</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h2><i class="fas fa-users"></i> Tour Guides</h2>
    
    <table class="table table-striped mt-3">
    <div class="d-flex flex-row"><a href="add_tour_guide.php"><button type="btn" class="btn btn-success d-flex-row">Add Tour Guide</button></a></div>
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Experience (Years)</th>
                <th>Languages</th>
                <th>Specialization</th>
                <th>Availability</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['experience']}</td>
                        <td>{$row['languages']}</td>
                        <td>{$row['specialization']}</td>
                        <td>{$row['availability']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='tour_guide_details.php?id={$row['id']}' class='btn btn-success btn-sm'>
                                <i class='fas fa-user'></i> About
                            </a>
                            <a href='edit_tour_guides.php?id={$row['id']}' class='btn btn-warning btn-sm'>
                                <i class='fas fa-edit'></i> Edit
                            </a>
                            <a href='delet_tour_guides.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'>
                                <i class='fas fa-trash'></i> Delete
                            </a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>No tour guides found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
