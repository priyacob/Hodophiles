<?php
session_start();
include 'navbar.php'; // Include the navbar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom CSS for fixed sidebar and layout */
        body {
            padding-top: 70px; /* Adjust based on navbar height */
            background-color: #f8f9fa;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            margin-left: -250px;
            transition: margin 0.3s;
            background-color: #343a40; /* Dark background for sidebar */
            color: #fff; /* White text for sidebar */
            position: fixed;
            top: 70px; /* Adjust based on navbar height */
            left: 0;
            z-index: 1000;
        }

        .toggled #sidebar-wrapper {
            margin-left: 0;
        }

        .list-group-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff; /* White text for sidebar links */
            background-color: transparent;
            border: none;
        }

        .list-group-item:hover {
            background-color: #495057; /* Hover effect for sidebar links */
        }

        #page-content-wrapper {
            margin-left: 0;
            transition: margin 0.3s;
            width: 100%;
        }

        .toggled #page-content-wrapper {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }

            .toggled #sidebar-wrapper {
                margin-left: 0;
            }

            .toggled #page-content-wrapper {
                margin-left: 250px;
            }
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
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

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-3">
                            <h5><i class="fas fa-users"></i> Total Users</h5>
                            <p>100</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-3">
                            <h5><i class="fas fa-chart-line"></i> Active Sessions</h5>
                            <p>25</p>
                        </div>
                    </div>
                </div>

                <div id="users" class="mt-5">
                    <h3><i class="fas fa-users"></i> Manage Users</h3>
                    <div class="search-container">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input class="form-control" id="search" type="text" placeholder="Search Users...">
                        </div>
                    </div>

                    <table class="table table-striped mt-3" id="userTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>County</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="userdetails.php">1</a></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>+1234567890</td>
                                <td>Apdj</td>
                                <td>Apd</td>
                                <td>India</td>
                                <td>10/10/2002</td>
                                <td>Male</td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let wrapper = document.getElementById("wrapper");
            let sidebarState = localStorage.getItem("sidebarToggled");
            if (sidebarState === "true") {
                wrapper.classList.add("toggled");
            }
        });

        document.getElementById("menu-toggle").addEventListener("click", function () {
            let wrapper = document.getElementById("wrapper");
            wrapper.classList.toggle("toggled");
            localStorage.setItem("sidebarToggled", wrapper.classList.contains("toggled"));
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>