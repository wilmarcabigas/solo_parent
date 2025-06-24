<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/solo_parent/pude/util/dbhelper.php');
session_start();

$db = new DbHelper();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();
    if ($check->num_rows > 0) {
        $error = "Registration failed. Email is already used.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $fullname, $email, $password);
        if ($stmt->execute()) {
            $_SESSION["user_id"] = $conn->insert_id;
            $_SESSION["role"] = "user";
            $_SESSION["email"] = $email;
            header("Location: /solo_parent/main_menu.php");
            exit();
        } else {
            $error = "Registration failed. Please try again.";
        }
        $stmt->close();
    }
    $check->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Register</h2>
    <?php if (!empty($error)) echo "<div class='bg-red-100 text-red-700 p-2 rounded mb-4 text-center'>$error</div>"; ?>
    <form method="post" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Full Name</label>
            <input type="text" name="fullname" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Email address</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Register</button>
    </form>
    <div class="text-center mt-4">
        <a href="login.php" class="text-blue-600 hover:underline">Already have an account? Login</a>
    </div>
</div>
</body>
</html>