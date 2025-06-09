
<?php
// registration_form.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: Validate input and save new user to the database
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        // Dummy success (replace with DB insert)
        $success = "Registration successful! You can now <a href='login.php'>login</a>.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body1>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color:green;"><?= $success ?></p>
        <?php endif; ?>
        <form method="post" action="registration_form.php">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Confirm Password:</label>
            <input type="password" name="confirm" required><br>
            <button type="submit">Register</button>
        </form>
        <p>
            <a href="login.php">Back to Login</a>
        </p>
    </div>
</body1>
</html>
