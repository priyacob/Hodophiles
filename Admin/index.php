<?php
include 'navbar.php'; // Include the updated navbar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toor & Travels - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f9;
        }
        #wrapper {
            display: flex;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            transition: all 0.3s ease;
        }
        .toggled #sidebar-wrapper {
            margin-left: -250px;
        }
        .toggled #page-content-wrapper {
            padding-left: 0;
        }
        #page-content-wrapper {
            width: 100%;
            padding-left: 250px;
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            .toggled #sidebar-wrapper {
                margin-left: 0;
            }
            .toggled #page-content-wrapper {
                padding-left: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-4">
        <div class="dashboard-stats">
            <div class="card p-3">
                <h5><i class="fas fa-calendar-check me-2"></i>Total Bookings</h5>
                <p>150</p>
            </div>
            <div class="card p-3">
                <h5><i class="fas fa-map-marked-alt me-2"></i>Active Tours</h5>
                <p>25</p>
            </div>
            <div class="card p-3">
                <h5><i class="fas fa-users me-2"></i>Registered Users</h5>
                <p>500</p>
            </div>
            <div class="card p-3">
                <h5><i class="fas fa-money-bill-wave me-2"></i>Total Revenue</h5>
                <p>$50,000</p>
            </div>
        </div>
        
        <div id="bookings">
            <h2 class="section-title">Bookings</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
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
                            <td>Confirmed</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
