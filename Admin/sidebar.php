<div id="sidebar-wrapper">
    <div class="sidebar-heading">Admin Panel</div>
    <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="bookings.php" class="list-group-item"><i class="fas fa-calendar-check me-2"></i>Bookings</a>
        <a href="tours.php" class="list-group-item"><i class="fas fa-map-marked-alt me-2"></i>Tours</a>
        <a href="users.php" class="list-group-item"><i class="fas fa-users me-2"></i>Users</a>
        <a href="reviews.php" class="list-group-item"><i class="fas fa-star me-2"></i>Reviews</a>
        <a href="payments.php" class="list-group-item"><i class="fas fa-money-bill-wave me-2"></i>Payments</a>
        <a href="settings.php" class="list-group-item"><i class="fas fa-cog me-2"></i>Settings</a>
        <a href="logout.php" class="list-group-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>
</div>
<style>
     #wrapper {
            display: flex;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            transition: all 0.3s ease;
            position: fixed;
            top: 56px; /* Adjust based on navbar height */
            left: 0;
            z-index: 1000;
        }

        .sidebar-heading {
            padding: 1rem;
            font-weight: bold;
            text-align: center;
            background-color: #212529;
        }

        .list-group a {
            background-color: #343a40;
            color: #fff;
            height: 60px;
            border: none;
        }

        .list-group-item {
            background-color: transparent;
            color: #fff;
        }

        .list-group-item:hover {
            background-color: #495057;
        }

        #page-content-wrapper {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
            flex: 1;
            transition: all 0.3s ease;
        }

        #menu-toggle {
            border: none;
            background: none;
            color: #343a40;
        }

        .toggled #sidebar-wrapper {
            margin-left: -250px;
        }

        .toggled #page-content-wrapper {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
                position: fixed;
                z-index: 1000;
            }

            .toggled #sidebar-wrapper {
                margin-left: 0;
            }

            .toggled #page-content-wrapper {
                padding-left: 0;
            }
        }
</style>