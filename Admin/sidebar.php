<?php
// Navbar and sidebar structure
?>
<div id="wrapper">
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">Admin Panel</div>
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="bookings.php" class="list-group-item list-group-item-action"><i class="fas fa-calendar-check me-2"></i>Bookings</a>
            <a href="tours.php" class="list-group-item list-group-item-action"><i class="fas fa-map-marked-alt me-2"></i>Tours</a>
            <a href="users.php" class="list-group-item list-group-item-action"><i class="fas fa-users me-2"></i>Users</a>
            <a href="reviews.php" class="list-group-item list-group-item-action"><i class="fas fa-star me-2"></i>Reviews</a>
            <a href="payments.php" class="list-group-item list-group-item-action"><i class="fas fa-money-bill-wave me-2"></i>Payments</a>
            <a href="settings.php" class="list-group-item list-group-item-action"><i class="fas fa-cog me-2"></i>Settings</a>
            <a href="logout.php" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                <h3 class="ms-3">Admin Dashboard</h3>
                <div class="ms-auto d-flex align-items-center">
                    <span class="me-3">Welcome, Admin</span>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </div>
            </div>
        </nav>

        <script>
            document.getElementById("menu-toggle").addEventListener("click", function () {
                document.getElementById("wrapper").classList.toggle("toggled");
            });
        </script>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
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
        .sidebar-heading {
            text-align: center;
            font-size: 1.2rem;
            padding: 1rem;
            font-weight: bold;
        }
        .list-group-item {
            background-color: transparent;
            border: none;
            color: #fff;
            padding: 12px 20px;
        }
        .list-group-item:hover {
            background-color: #495057;
        }
        #page-content-wrapper {
            width: 100%;
            padding-left: 250px;
            transition: all 0.3s ease;
        }
        .toggled #sidebar-wrapper {
            margin-left: -250px;
        }
        .toggled #page-content-wrapper {
            padding-left: 0;
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            #page-content-wrapper {
                padding-left: 0;
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
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#bookings" class="list-group-item list-group-item-action"><i class="fas fa-calendar-check me-2"></i>Bookings</a>
                <a href="#tours" class="list-group-item list-group-item-action"><i class="fas fa-map-marked-alt me-2"></i>Tours</a>
                <a href="users.php" class="list-group-item list-group-item-action"><i class="fas fa-users me-2"></i>Users</a>
                <a href="#reviews" class="list-group-item list-group-item-action"><i class="fas fa-star me-2"></i>Reviews</a>
                <a href="#payments" class="list-group-item list-group-item-action"><i class="fas fa-money-bill-wave me-2"></i>Payments</a>
                <a href="#settings" class="list-group-item list-group-item-action"><i class="fas fa-cog me-2"></i>Settings</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    <h3 class="ms-3">Admin Dashboard</h3>
                    <div class="ms-auto d-flex align-items-center">
                        <span class="me-3">Welcome, Admin</span>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                <h2>Dashboard Content</h2>
                <p>This is where your main content goes.</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>
</html> -->
