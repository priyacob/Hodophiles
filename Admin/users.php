<?php
include '../connect.php';
include 'navbar.php';
echo "<br>";
echo "<br>";
// Fetch users from the database
$sql = "SELECT * FROM users";
$stmt = $con->prepare($sql);
$stmt -> execute();
$result = $stmt ->get_result(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container mt-5">
        <h3><i class="fas fa-users"></i> Manage Users</h3>
      <div class="d-flex flex-row"><a href="add_user.php"><button type="btn" class="btn btn-success d-flex-row">Add User</button></a></div>
            <a href="users.php" class="btn btn-secondary">Cancel</a>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td><a href='user_details.php?id=" . $row['u_id'] . "'>" . $row['u_id'] . "</a></td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>" . $row['country'] . "</td>
                            <td>" . $row['date_of_birth'] . "</td>
                            <td>" . ucfirst($row['gender']) . "</td>
                            <td><img src='uploads/" . $row['image'] . "' alt='User Image' width='50'></td>
                            <td>
                                <a href='edit_user.php?id=" . $row['u_id'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
                                <a href='delete_user.php?id=" . $row['u_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'><i class='fas fa-trash'></i> Delete</a>                                
                                <a href='user_details.php?id=" . $row['u_id'] . "' class='btn btn-success btn-sm''><i class='fa-user-circle'></i> About user</a>                                
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>No users found</td></tr>";
                }
                $con->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>