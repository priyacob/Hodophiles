<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Variation 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #e9ecef;
        }

        .profile-card {
            max-width: 700px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            margin-bottom: 15px;
        }

        .profile-body {
            padding: 25px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        .detail-row strong {
            color: #495057;
        }

        .detail-row span {
            color: #6c757d;
        }

        .action-buttons {
            text-align: center;
            margin-top: 25px;
        }

        .action-buttons button {
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <div class="profile-header">
            <img src="https://via.placeholder.com/120" alt="User Avatar" id="userAvatar">
            <h2 id="userName">User Name</h2>
        </div>
        <div class="profile-body">
            <div class="detail-row">
                <strong>User ID:</strong>
                <span id="userId">123</span>
            </div>
            <div class="detail-row">
                <strong>Email:</strong>
                <span id="userEmail">john.doe@example.com</span>
            </div>
            <div class="detail-row">
                <strong>Phone:</strong>
                <span id="userPhone">+1 123-456-7890</span>
            </div>
            <div class="detail-row">
                <strong>Address:</strong>
                <span id="userAddress">123 Main St, Anytown, CA 12345</span>
            </div>
            <div class="detail-row">
                <strong>Role:</strong>
                <span id="userRole">Admin</span>
            </div>
            <div class="detail-row">
                <strong>Registration Date:</strong>
                <span id="userRegDate">2023-10-27</span>
            </div>
            <div class="detail-row">
                <strong>Last Login:</strong>
                <span id="userLastLogin">2023-10-28 10:00 AM</span>
            </div>
        </div>
        <div class="action-buttons">
            <button class="btn btn-primary">Edit Profile</button>
            <button class="btn btn-danger">Delete User</button>
            <button class="btn btn-secondary" onclick="window.history.back()">Back</button>
        </div>
    </div>

    <script>
        function populateProfile(profileData) {
            document.getElementById('userAvatar').src = profileData.avatar;
            document.getElementById('userName').textContent = profileData.name;
            document.getElementById('userId').textContent = profileData.id;
            document.getElementById('userEmail').textContent = profileData.email;
            document.getElementById('userPhone').textContent = profileData.phone;
            document.getElementById('userAddress').textContent = profileData.address;
            document.getElementById('userRole').textContent = profileData.role;
            document.getElementById('userRegDate').textContent = profileData.regDate;
            document.getElementById('userLastLogin').textContent = profileData.lastLogin;
        }

        const profileData = {
            id: 123,
            name: "John Doe",
            email: "john.doe@example.com",
            phone: "+1 123-456-7890",
            address: "123 Main St, Anytown, CA 12345",
            role: "Admin",
            regDate: "2023-10-27",
            lastLogin: "2023-10-28 10:00 AM",
            avatar: "https://via.placeholder.com/120"
        };
        populateProfile(profileData);
    </script>
</body>
</html>