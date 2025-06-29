<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('127.0.0.1', 'root', '', 'solo_parent');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'disapprove') {
        $validate = 'disapproved';
    } elseif ($action === 'approve') {
        $validate = 'approved';
    } else {
        $validate = '';
    }

    $stmt = $conn->prepare("UPDATE registrations SET validate=? WHERE id=?");
    $stmt->bind_param("si", $validate, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: index.php");
exit;
?>