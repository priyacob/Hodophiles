<?php
ob_start();
include 'navbar.php';
include 'connect.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure database connection is established
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch active restaurants for selection
$restaurant_query = "SELECT r_id, name FROM restaurants";
$restaurants = $con->query($restaurant_query);

if (!$restaurants) {
    die("Error fetching restaurants: " . $con->error);
}

// Handle form submission
$success_message = $error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['restaurant']) && !empty($_POST['customer_name']) && !empty($_POST['contact_number']) && !empty($_POST['dishes']) && isset($_POST['total_price'])) {
        $r_id = intval($_POST['restaurant']);
        $customer_name = trim(htmlspecialchars($_POST['customer_name']));
        $contact_number = trim(htmlspecialchars($_POST['contact_number']));
        $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : "";
        $dishes = trim(htmlspecialchars($_POST['dishes']));
        $total_price = floatval($_POST['total_price']);

        if ($total_price <= 0) {
            $error_message = "Total price must be greater than 0.";
        } else {
            // Insert order into database
            $stmt = $con->prepare("INSERT INTO orders (r_id, customer_name, contact_number, email, dishes, total_price) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssd", $r_id, $customer_name, $contact_number, $email, $dishes, $total_price);
            
            if ($stmt->execute()) {
                // Redirect to success page with a success message
                header("Location: success.html");
                exit();
            } else {
                $error_message = "❌ Failed to place order. Error: " . $stmt->error;
            }
            
            $stmt->close();
        }
    } else {
        $error_message = "❌ Please fill in all required fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place an Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section class="mt-5">
    <h1 class="text-center">Place Your Order</h1>

    <?php if (!empty($error_message)) { ?>
        <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
    <?php } ?>

    <div class="container shadow-lg w-75">
        <form action="orders.php" method="POST" class="mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="restaurant" class="form-label">Select Restaurant</label>
                        <select name="restaurant" id="restaurant" class="form-control" required>
                            <option value="">Choose Restaurant</option>
                            <?php 
                            if ($restaurants->num_rows > 0) {
                                while ($row = $restaurants->fetch_assoc()) { 
                                    echo '<option value="' . $row['r_id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                }
                            } else {
                                echo '<option value="">No restaurants found</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Full Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="dishes" class="form-label">Dishes Ordered</label>
                        <textarea name="dishes" id="dishes" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price ($)</label>
                        <input type="number" name="total_price" id="total_price" class="form-control" step="0.01" min="0.01" required>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-sm mb-3">Place Order</button>
            </div>
        </form>
    </div>
</section>

<?php ob_end_flush(); ?>
</body>
</html>
