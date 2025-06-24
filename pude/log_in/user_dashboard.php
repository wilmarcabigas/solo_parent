<?php
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "user") {
    header("Location: log_in/login_Admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION["email"]) ?></h1>
    <a href="log_in/logout.php">Logout</a>
    <h2>Input Your Data</h2>
    <form action="save_user_data.php" method="post">
        <!-- Add your user data fields here -->
        <input type="text" name="address" placeholder="Address" required>
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="form/generate_id.php?id=<?= $_SESSION["user_id"] ?>">Print My ID</a>
</body>
</html>