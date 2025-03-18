<?php
include 'navbar.php';
include 'connect.php';
// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_GET['room_id'])) {
    echo "<p>Invalid request.</p>";
    exit();
}

$room_id = intval($_GET['room_id']);
$sql = "SELECT * FROM room WHERE room_id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $room_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$room = $result->fetch_assoc();
mysqli_stmt_close($stmt);

if (!$room) {
    echo "<p>Room not found.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['uid']; // Replace with logged-in user ID
    $hotel_id = intval($_POST['hotel_id']);
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = intval($_POST['guests']);
    $total_price = $room['price'] * ((strtotime($check_out) - strtotime($check_in)) / 86400);

    $sql = "INSERT INTO room_booking (user_id, room_id, hotel_id, check_in, check_out, guests, total_price) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "iiissid", $user_id, $room_id, $hotel_id, $check_in, $check_out, $guests, $total_price);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Booking successful!</p>";
    } else {
        echo "<p>Booking failed. Please try again.</p>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
					<span class="mr-2"><a href="hotel.html">Hotel</a></span>
					<span>Hotel Single</span>
				</p>
				<h1 class="mb-3 bread">Hotels Details</h1>
			</div>
		</div>
	</div>
</div>
<style>
        body {
            background: #f8f9fa;
        }
        .booking-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-book {
            background: #28a745;
            color: white;
        }
        .btn-book:hover {
            background: #218838;
        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="booking-container">
        <h2 class="text-center mb-4">Book Room: <?= htmlspecialchars($room['room_name']) ?></h2>
        <form method="post">
            <input type="hidden" name="hotel_id" value="<?= $room['hotel_id'] ?>">
            
            <div class="mb-3">
                <label class="form-label">Check-in Date:</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Check-out Date:</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Guests:</label>
                <input type="number" name="guests" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-book w-100">Book Now</button>
        </form>
    </div>
</div>

