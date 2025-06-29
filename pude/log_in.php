<?php
include "data_connect.php";
require_once "pude/util/dbhelper.php";
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $log_name = trim($_POST['log_name']);
    $log_pass = trim($_POST['log_pass']);

    // Example: Hardcoded credentials (Replace this with database verification)
    $validLog_name = "user1";
    $validLog_pass = "123";

    // Validate credentials
    if ($log_name === $validLog_name && $Log_pass === $validLogpass) {
        // Successful login
        $_SESSION['log_name'] = $log_name;
        header("Location: main_menu.php"); // Redirect to a dashboard or another page
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color:rgb(107, 187, 124);
        }
        .login-container {
            max-width: 450px;
            margin: 200px auto;
            padding: 20px;
            background-color:rgb(212, 73, 73);
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(54, 30, 121);
        }
        .login-container .form-control {
            margin-bottom: 15px;
        }
        .login-container .btn-primary {
            width: 100%;
        }
        .login-container .forgot-password {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="login-container">
        
        <h1 class="text-center">LOGIN</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="log_name" class="form-label">Username</label>
                <input type="text" class="form-control" name="log_name" id="log_name" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="log_pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="log_pass" id="log_pass" placeholder="Enter your password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="forgot-password mt-3">
            <a href="forgot_password.php" style="color: white;">Forgot password?</a>
            </div>
        </form>
    </div>
</body>
</html>
