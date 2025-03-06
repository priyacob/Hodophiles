<?php
include 'navbar.php'; // Include the updated navbar
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour & Travels - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f9;
            padding-top: 56px;
        }
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .section-title {
            font-weight: 600;
            margin: 20px 0;
        }
        @media (max-width: 768px) {
            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-4">
        <div class="dashboard-stats">
            <div class="card p-3 bg-light">
                <h5><i class="fas fa-calendar-check me-2 text-primary"></i>Total Bookings</h5>
                <p class="fs-4 fw-bold">150</p>
            </div>
            <div class="card p-3 bg-light">
                <h5><i class="fas fa-map-marked-alt me-2 text-success"></i>Active Tours</h5>
                <p class="fs-4 fw-bold">25</p>
            </div>
            <div class="card p-3 bg-light">
                <h5><i class="fas fa-users me-2 text-warning"></i>Registered Users</h5>
                <p class="fs-4 fw-bold">500</p>
            </div>
            <div class="card p-3 bg-light">
                <h5><i class="fas fa-money-bill-wave me-2 text-danger"></i>Total Revenue</h5>
                <p class="fs-4 fw-bold">$50,000</p>
            </div>
        </div>
        
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>