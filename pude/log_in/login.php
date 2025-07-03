<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/solo_parent/pude/util/dbhelper.php');
session_start();
$db = new DbHelper();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["email"] = $user["email"];
        if ($user["role"] === "admin") {
            header( "Location: /solo_parent/main_menu.php");
        } else {
            header("Location: /solo_parent/pude/user_dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Login</h2>
    <?php if (!empty($error)) echo "<div class='bg-red-100 text-red-700 p-2 rounded mb-4 text-center'>$error</div>"; ?>
    <form method="post" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Email address</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
    </form>
    <div class="text-center mt-4">
        <a href="register.php" class="text-blue-600 hover:underline">Don't have an account? Register</a>
    </div>
</div>
</body>
</html>