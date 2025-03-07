<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['a_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour & Travels - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom CSS for fixed sidebar and layout */
        body {
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
            padding-top: 56px; /* Adjust based on navbar height */
        }

       

        .dashboard-stats .card {
            transition: transform 0.2s;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dashboard-stats .card:hover {
            transform: translateY(-5px);
        }

        .table-responsive {
            margin-top: 20px;
        }

        .section-title {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
        }

        .badge {
            font-size: 14px;
            padding: 8px 12px;
        }

        .btn-outline-primary {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Sidebar -->
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div id="page-content-wrapper">
            <div class="main-content">
                <h1 class="mb-4">Welcome, <?php echo $_SESSION['a_name']; ?>!</h1>
                
                <!-- Dashboard Stats -->
                <div class="dashboard-stats row">
                    <div class="col-md-3 mb-4">
                        <div class="card bg-light p-3">
                            <h5><i class="fas fa-calendar-check me-2 text-primary"></i>Total Bookings</h5>
                            <p class="fs-4 fw-bold">150</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-light p-3">
                            <h5><i class="fas fa-map-marked-alt me-2 text-success"></i>Active Tours</h5>
                            <p class="fs-4 fw-bold">25</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-light p-3">
                            <h5><i class="fas fa-users me-2 text-warning"></i>Registered Users</h5>
                            <p class="fs-4 fw-bold">500</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-light p-3">
                            <h5><i class="fas fa-money-bill-wave me-2 text-danger"></i>Total Revenue</h5>
                            <p class="fs-4 fw-bold">$50,000</p>
                        </div>
                    </div>
                </div>

                <!-- Bookings Table -->
                <div id="bookings">
                    <h2 class="section-title">Bookings</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Booking ID</th>
                                    <th>User</th>
                                    <th>Tour</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Mountain Adventure</td>
                                    <td>2023-11-10</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                                </tr>
                                <!-- Add more rows dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>
</html>