<?php
include 'navbar.php';
include 'connect.php';
if (isset($_SESSION['uid'])) {
    $u_id = $_SESSION['uid'];

// Check if vehicle id is provided in the URL
if (!isset($_GET['v_id']) || empty($_GET['v_id'])) {
    echo "No vehicle selected.";
    exit;
}

$vehicle_id = intval($_GET['v_id']);

// Retrieve the selected vehicle details from the vehicles table
$sql = "SELECT * FROM vehicles WHERE v_id = $vehicle_id AND availability_status='available'";
$result = $con->query($sql);

if ($result->num_rows === 0) {
    echo "Vehicle not found or is not available.";
    exit;
}

$vehicle = $result->fetch_assoc();

// Initialize flag and booking details array
$booking_success = false;
$bookingDetails = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and retrieve booking form data
    $full_name   = $con->real_escape_string($_POST['full_name']);
    $email       = $con->real_escape_string($_POST['email']);
    $phone       = $con->real_escape_string($_POST['phone']);
    $pickup_date = $con->real_escape_string($_POST['pickup_date']);
    $return_date = $con->real_escape_string($_POST['return_date']);
    
    // Retrieve payment details (dummy data)
    $card_number = $con->real_escape_string($_POST['card_number']);
    $expiry_date = $con->real_escape_string($_POST['expiry_date']);
    $cvv         = $con->real_escape_string($_POST['cvv']);

    // Here you would typically integrate with an online payment gateway.
    // For simulation, we'll assume payment is successful if card details are provided.
    if (!empty($card_number) && !empty($expiry_date) && !empty($cvv)) {
        // Simulate payment success and insert booking into booking_vehicle table
        $sql_booking = "INSERT INTO booking_vehicle 
                (v_id, u_id, full_name, email, phone, pickup_date, return_date, status, created_at, updated_at) 
                VALUES 
                ($vehicle_id, $u_id, '$full_name', '$email', '$phone', '$pickup_date', '$return_date', 'pending', NOW(), NOW())";

    
        if ($con->query($sql_booking) === TRUE) {
            $booking_success = true;
            $booking_id = $con->insert_id;
            $bookingDetails = array(
                'booking_id'  => $booking_id,
                'full_name'   => $full_name,
                'email'       => $email,
                'phone'       => $phone,
                'pickup_date' => $pickup_date,
                'return_date' => $return_date,
                'status'      => 'pending'
            );
        } else {
            echo "Error: " . $con->error;
        }
    } else {
        echo "Payment details are required for advance payment.";
    }
}
}
?>

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
          </div>
        </div>
      </div>
    </div> 
</div>
    <style>
        .vehicle-img {
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .booking-form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }
        .payment-section {
            background: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .payment-section h5 {
            margin-bottom: 15px;
        }
    </style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Book <?php echo htmlspecialchars($vehicle['name']); ?> (<?php echo htmlspecialchars($vehicle['type']); ?>)</h2>
    <div class="row">
        <!-- Vehicle Details -->
        <div class="col-md-6 mb-4">
            <img src="<?php echo htmlspecialchars($vehicle['image']); ?>" alt="<?php echo htmlspecialchars($vehicle['name']); ?>" class="img-fluid vehicle-img">
            <div class="mt-3">
                <p><strong>Model Year:</strong> <?php echo htmlspecialchars($vehicle['model_year']); ?></p>
                <p><strong>Registration:</strong> <?php echo htmlspecialchars($vehicle['registration_number']); ?></p>
                <p><strong>Seating Capacity:</strong> <?php echo htmlspecialchars($vehicle['seating_capacity']); ?> persons</p>
                <p><strong>Fuel Type:</strong> <?php echo htmlspecialchars($vehicle['fuel_type']); ?></p>
                <p><strong>Price per Day:</strong> ₹<?php echo number_format($vehicle['price_per_day'], 2); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($vehicle['description']); ?></p>
            </div>
        </div>
        <!-- Booking & Payment Form -->
        <div class="col-md-6">
            <div class="booking-form">
                <?php if (!$booking_success): ?>
                <form action="" method="POST">
                    <!-- Booking Details -->
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pickup_date" class="form-label">Pickup Date</label>
                        <input type="date" name="pickup_date" id="pickup_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" name="return_date" id="return_date" class="form-control" required>
                    </div>
                    
                    <!-- Advance Payment Section -->
                    <div class="payment-section">
                        <h5>Advance Payment</h5>
                        <div class="mb-3">
                            <label for="card_number" class="form-label">Card Number</label>
                            <input type="text" name="card_number" id="card_number" class="form-control" required>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="expiry_date" class="form-label">Expiry Date</label>
                                  <input type="text" name="expiry_date" id="expiry_date" class="form-control" placeholder="MM/YY" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="cvv" class="form-label">CVV</label>
                                  <input type="text" name="cvv" id="cvv" class="form-control" required>
                              </div>
                           </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Pay & Confirm Booking</button>
                </form>
                <?php else: ?>
                <p class="text-center text-success">Your booking has been successfully submitted.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Booking Details -->
<?php if ($booking_success): ?>
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content alt-modal">
      <div class="modal-header alt-modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Booking Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body alt-modal-body">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($bookingDetails['full_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($bookingDetails['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($bookingDetails['phone']); ?></p>
        <p><strong>Pickup Date:</strong> <?php echo htmlspecialchars($bookingDetails['pickup_date']); ?></p>
        <p><strong>Return Date:</strong> <?php echo htmlspecialchars($bookingDetails['return_date']); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($bookingDetails['status']); ?></p>
      </div>
      <div class="modal-footer alt-modal-footer">
        <a href="index.php" class="btn btn-outline-primary alt-btn">OK</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php if ($booking_success): ?>
<script>
    // Automatically display the modal on booking success
    var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
    bookingModal.show();
</script>
<?php endif; ?>

<!-- Alternative Modal Styling -->
<style>
  /* Modal Container */
  .alt-modal {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }
  /* Header */
  .alt-modal-header {
    background-color: #f5f5f5;
    border-bottom: 1px solid #e0e0e0;
    padding: 15px 20px;
  }
  .alt-modal-header .modal-title {
    font-weight: 600;
    color: #333;
  }
  /* Body */
  .alt-modal-body {
    background-color: #fff;
    padding: 20px;
    font-size: 1rem;
    color: #555;
  }
  .alt-modal-body p {
    margin-bottom: 10px;
  }
  /* Footer */
  .alt-modal-footer {
    background-color: #f5f5f5;
    border-top: 1px solid #e0e0e0;
    padding: 15px 20px;
    display: flex;
    justify-content: center;
  }
  /* Button */
  .alt-btn {
    font-size: 1rem;
    border-radius: 4px;
    padding: 8px 20px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
  }
  .alt-btn:hover {
    background-color: #e9ecef;
    border-color: #adb5bd;
  }
</style>

