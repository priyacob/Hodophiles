<?php 
include 'navbar.php';
include 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$u_id = $_SESSION['uid'];

// Fetch user profile details
$sql = "SELECT * FROM users WHERE u_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $u_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$profile_pic = !empty($user['image']) ? $user['image'] : 'images/default.jpg';

// Fetch user bookings
$sql = "SELECT pb.*, d.name AS destination_name, d.image_url 
        FROM p_bookings pb
        INNER JOIN destinations d ON pb.destination_id = d.id 
        WHERE pb.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $u_id);
$stmt->execute();
$bookings = $stmt->get_result();
?>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Hero Section -->
  <div class="hero-wrap">
    <div class="overlay"></div>
    <div class="hero-content">
      <h4>User Profile</h4>
    </div>
  </div>

  <!-- Tabs -->
  <div class="container">
  <div class="tabs bg-info">
  <button class="tab-btn active" data-target="userProfile">
    <i class="fas fa-user"></i> Profile
  </button>
  <button class="tab-btn" data-target="itinerary">
  <i class="fas fa-car"></i>Your Vehicle
  </button>
  <button class="tab-btn" data-target="inclusions">
    <i class="fas fa-check-circle"></i> Inclusions
  </button>
  <button class="tab-btn" data-target="info">
    <i class="fas fa-info-circle"></i> Additional Info
  </button>
</div>


    <!-- Tab Content: Profile -->
    <div class="tab-content active" id="userProfile">
      <div class="container my-5">
        <div class="row">
          <div class="col-md-4 text-center mb-4">
            <div class="profile-img">
              <img id="profilePreview" src="<?php echo $profile_pic; ?>" alt="Profile Picture">
              <label for="profileImage" class="upload-btn">
                <i class="fas fa-camera"></i>
                <input type="file" name="profileImage" id="profileImage" accept="image/*" onchange="previewImage(event)">
              </label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="profile-form">
              <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="u_id" value="<?php echo $user['u_id']; ?>">
                <input type="hidden" name="existing_image" value="<?php echo $user['image']; ?>">

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $user['city']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="<?php echo $user['country']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="<?php echo $user['date_of_birth']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Preferred Language</label>
                    <input type="text" name="preferred_language" class="form-control" value="<?php echo $user['preferred_language']; ?>">
                  </div>
                  <div class="col-md-6">
                    <!-- Optional: Additional input can be added here -->
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Travel Preferences</label>
                  <textarea name="travel_preferences" class="form-control" rows="3"><?php echo $user['travel_preferences']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab Content: Itinerary -->
    <div class="tab-content" id="itinerary">
 
    <h2>My Booked Vehicles</h2>
  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Pickup Date</th>
        <th>Return Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td class="img-cell">
          <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        </td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['pickup_date']); ?></td>
        <td><?php echo htmlspecialchars($row['return_date']); ?></td>
        <td><?php echo ucfirst(htmlspecialchars($row['status'])); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>



    </div>

    <!-- Tab Content: Inclusions -->
    <div class="tab-content" id="inclusions">
      <h3>Inclusions/Exclusions</h3>
      <p>Inclusions and exclusions details coming soon.</p>
    </div>

    <!-- Tab Content: Additional Info -->
    <div class="tab-content" id="info">
      <h3>Additional Information</h3>
      <h2 class="text-center">My Bookings</h2> 
        <?php if ($bookings->num_rows > 0) { ?>
            <div class="row">
                <?php while ($row = $bookings->fetch_assoc()) { ?>
                    <div class="col-md-6">
                        <div class="card mb-3 p-3 shadow-sm">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo $row['image_url']; ?>" alt="Destination" class="img-fluid rounded" style="width: 100px; height: 100px;">
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php echo $row['destination_name']; ?></h5>
                                    <p class="mb-1"><i class="bi bi-calendar-event"></i> Travel Date: <?php echo $row['travel_date']; ?></p>
                                    <p class="mb-1"><i class="bi bi-people"></i> Guests: <?php echo $row['guests']; ?></p>
                                    <p class="mb-1"><i class="bi bi-credit-card"></i> Payment: <?php echo ucfirst($row['payment_method']); ?></p>
                                    <p class="mb-1"><strong>Total Price:</strong> ₹<?php echo number_format($row['total_price']); ?></p>
                                    <p class="text-muted">Booked on: <?php echo date("d M, Y", strtotime($row['booking_date'])); ?></p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-danger btn-sm" onclick="cancelBooking(<?php echo $row['id']; ?>)">Cancel</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-center">No bookings found.</p>
        <?php } ?> 
    </div>
  </div>
  <script>
function cancelBooking(bookingId) {
    if (confirm("Are you sure you want to cancel this booking?")) {
        window.location.href = "cancel_booking.php?id=" + bookingId;
    }
}
</script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Tab switching functionality
    document.querySelectorAll('.tab-btn').forEach(button => {
      button.addEventListener('click', () => {
        // Remove active class from all buttons and contents
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

        // Add active class to the clicked button and corresponding content
        button.classList.add('active');
        const target = button.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
      });
    });
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f1f1f1;
    }
    /* Hero Section */
    .hero-wrap {
      position: relative;
      height: 200px;
      background: url('images/bg_3.jpg') center center/cover no-repeat;
    }
    .hero-wrap .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
    }
    .hero-content {
      position: relative;
      z-index: 2;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }
    .hero-content h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    /* Tabs */
   /* Tabs Container */
 /* Tabs Container */
 .tabs {
      display: flex;
      justify-content: center;
      gap: 10px;
      background-color: #17a2b8; /* Bootstrap info color */
      padding: 10px;
      border-radius: 5px;
      margin-top: 20px;
    }
    /* Individual Tab Buttons */
    .tab-btn {
      background: transparent;
      border: none;
      color: #fff;
      font-size: 1rem;
      padding: 10px 20px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.3s ease;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .tab-btn:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }
    .tab-btn.active {
      background: rgba(255, 255, 255, 0.4);
      transform: scale(1.05);
      font-weight: 600;
    }
    /* Tab Content */
    .tab-content {
      display: none;
      padding: 20px;
      background: #fff;
      margin-top: 20px;
      border-radius: 5px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: fadeIn 0.4s ease-in-out;
    }
    .tab-content.active {
      display: block;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Profile Form Styles */
    .profile-form {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .profile-img {
      position: relative;
      width: 150px;
      height: 150px;
      margin: auto;
    }
    .profile-img img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .upload-btn {
      position: absolute;
      bottom: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.7);
      color: #fff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }
    .upload-btn input {
      display: none;
    }
    @media (max-width: 767px) {
      .hero-content h1 {
        font-size: 2rem;
      }
    }
  </style>
 <style>
   
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      margin-top: 20px;
    }
    table th, table td {
      padding: 12px 15px;
      text-align: center;
      border: 1px solid #ddd;
    }
    table th {
      background-color: #f2f2f2;
      font-weight: 600;
    }
    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .img-cell {
      width: 100px;
    }
    .img-cell img {
      width: 80px;
      height: auto;
      border-radius: 5px;
    }
  </style>