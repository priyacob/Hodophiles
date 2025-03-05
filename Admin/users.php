<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            margin-left: -250px;
            transition: margin 0.3s;
        }
        .toggled #sidebar-wrapper {
            margin-left: 0;
        }
        .list-group-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 1000;
                background-color: #343a40;
            }
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#users" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-users"></i> Users
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <!-- Include Navbar -->
            
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
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="userdetails.php">1</a></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>+1234567890</td>
                                <td>Admin</td>
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

</body>
</html>
