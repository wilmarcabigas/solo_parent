<?php
include "data_connect.php";
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash(trim($_POST['new_password']), PASSWORD_BCRYPT);

    // Validate the token
    $query = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $query->bind_param("s", $token);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Token valid: Update the password
        $update_query = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
        $update_query->bind_param("ss", $new_password, $token);
        $update_query->execute();

        $success = "Your password has been reset. You can now <a href='login.php'>login</a>.";
    } else {
        $error = "Invalid or expired token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Reset Password</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
        <?php else: ?>
            <form method="POST" action="">
                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter your new password" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
