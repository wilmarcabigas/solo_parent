<?php
session_start();

// Hardcoded admin credentials (for demo purposes)
$admin_email = "admin@example.com";
$admin_password = "admin123"; // Use hashed passwords in production

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === $admin_email && $password === $admin_password) {
        // Set session variable
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_email"] = $email;

        // Redirect to admin dashboard
        header("Location: login.html");
        exit(); 
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href='index.html';</script>";
        exit();
    }
}
?>
