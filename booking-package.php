<?php
include 'connect.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $destination_id = $_GET['id'];

    // Fetch the destination details
    $query = "SELECT * FROM destinations WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $destination_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $destination = $result->fetch_assoc();

    if (!$destination) {
        echo "Destination not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Tour Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        / General Styles /
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e3e6f3);
            color: #333;
        }

        / Header /
        header {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            padding: 20px 0;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 1.8rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        / Hero Slider /
        .carousel img {
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }

        / Package Details /
        .package-details {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        / Booking Form /
        .booking-form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .booking-form:hover {
            transform: scale(1.02);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #4facfe;
            box-shadow: 0px 0px 10px rgba(79, 172, 254, 0.5);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            border: none;
            padding: 12px;
            border-radius: 30px;
            transition: 0.3s;
            font-size: 1.2rem;
        }

        .btn-primary:hover {
            transform: scale(1.05);
        }

        / Footer /
        footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
        }
        .package-details {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.package-img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    object-fit: cover;
}

.btn-outline-primary {
    border-radius: 20px;
    font-weight: bold;
}
.confidence-section {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.rating-img {
    height: 20px;
    vertical-align: middle;
    margin-left: 5px;
}

    </style>
</head>
<body>
    <header>Book Your Luxury Tour</header>

    <section class="container mt-4">
        <div class="row">
        <div class="col-md-8 mx-auto">
        <div class="package-details card p-3 shadow-sm">
            <div class="d-flex align-items-center">
                <img src="<?php echo htmlspecialchars($destination['image_url']); ?>" alt="<?php echo htmlspecialchars($destination['name']); ?>" class="package-img me-3" width="150">
                <div>
                    <h5 class="fw-bold"><?php echo htmlspecialchars($destination['name']); ?></h5>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i> Duration: <?php echo htmlspecialchars($destination['duration']); ?></p>
                    <p class="mb-1 text-success"><i class="bi bi-check-circle-fill"></i> Free cancellation + Unlimited rescheduling</p>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0"><strong>Price:</strong> <del>₹<?php echo number_format($destination['old_price']); ?></del> <span class="text-danger fw-bold">₹<?php echo number_format($destination['price']); ?></span> Per Person</p>
                <button class="btn btn-outline-primary btn-sm">Enter Promo Code</button>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <strong>Total Price (INR):</strong>
                <span class="fw-bold text-success fs-5">₹<?php echo number_format($destination['price'] ); ?></span> <!-- Assuming 2 travelers -->
            </div>
        </div>

        <div class="confidence-section p-4 mt-1">
            <h5 class="fw-bold">Book with confidence</h5>
            <div class="mb-3">
                <p class="fw-bold mb-1">Excellent <img src="images/trustpilot.png" alt="Trustpilot" class="rating-img"></p>
                <p class="text-muted">Based on 249,052 traveler reviews</p>
            </div>
            <div class="mb-3">
                <p class="fw-bold mb-1">Exceptional flexibility</p>
                <p class="text-muted">Free cancellation and lowest price guarantee</p>
            </div>
            <div>
                <p class="fw-bold mb-1">24/7 global support</p>
                <p class="text-muted">Our award-winning customer service team is here to help</p>
                <p><i class="bi bi-telephone-fill"></i> +65 6670 9750</p>
                <p><i class="bi bi-chat-dots-fill"></i> Chat now</p>
            </div>
        </div>
    </div>

            <div class="col-md-4">
                <div class="booking-form">
                    <h3 class="text-center">Book Now</h3> 
                    <form action="book_package.php" method="POST" id="booking-form">
    <h2 class="text-center">Booking Details</h2>
    
    <!-- Hidden field for destination ID -->
    <input type="hidden" name="destination_id" value="<?php echo $destination_id; ?>">

    <div class="mb-3">
        <label for="name" class="form-label">Full Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number:</label>
        <input type="tel" id="phone" name="phone" class="form-control" required pattern="[0-9]{10}">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" id="address" name="address" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="travel-date" class="form-label">Travel Date:</label>
        <input type="date" id="travel-date" name="travel_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="guests" class="form-label">Number of Guests:</label>
        <input type="number" id="guests" name="guests" min="1" value="1" class="form-control" required>
    </div>

    <h3 class="text-center">Payment Details</h3>

    <div class="mb-3">
        <label for="payment-method" class="form-label">Payment Method:</label>
        <select id="payment-method" name="payment_method" class="form-control" required>
            <option value="credit_card">Credit Card</option>
            <option value="paypal">PayPal</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Total Price:</label>
        <p id="total-price">₹<?php echo number_format($destination['price']); ?></p>
    </div>

    <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
</form>



                </div>
                <div class="col-md-8">
 
</div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const guestsInput = document.getElementById("guests");
            const totalPrice = document.getElementById("total-price");
            const basePrice =₹<?php echo number_format($destination['price'] ); ?>;

            guestsInput.addEventListener("input", function () {
                const guestCount = parseInt(guestsInput.value);
                totalPrice.textContent = `₹${(guestCount * basePrice).toLocaleString()}`;
            });
        });
    </script>

    <footer>
        <p>&copy; 2025 Luxury Tours. All Rights Reserved.</p>
    </footer>
</body>
</html>