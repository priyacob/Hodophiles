<?php
session_start();
include '../connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin_data = mysqli_fetch_assoc($result);
        $_SESSION['a_id'] = $admin_data['admin_id'];
        $_SESSION['a_name'] = $admin_data['admin_name'];
        
        // Redirect to index page
        header('Location: index.php');
        exit;
    } else {
        $error_message = 'Invalid Email or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .login-card .card-header {
            background: transparent;
            border: none;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .login-card .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .login-card .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }

        .login-card .input-group-text {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px 0 0 10px;
        }

        .login-card .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .login-card .btn-primary:hover {
            background: #5a6fd1;
        }

        .login-card .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .login-card .forgot-password {
            text-align: center;
            margin-top: 1rem;
            color: #667eea;
            text-decoration: none;
            display: block;
        }

        .login-card .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card-header">Admin Login</div>
        <div class="card-body">
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>