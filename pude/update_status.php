<?php
require_once "./util/dbhelper.php";
session_start();

if (isset($_GET['id']) && isset($_GET['status']) && isset($_SESSION['user_id'])) {
    $id = intval($_GET['id']);
    $allowed_statuses = ['approved', 'pending', 'dis-approved'];
    $status = in_array($_GET['status'], $allowed_statuses) ? $_GET['status'] : 'pending';

    $db = new DbHelper();

    // Get admin name or ID from session (adjust as needed)
    $admin = $_SESSION['fullname'] ?? $_SESSION['user_id'] ?? 'Unknown';

    // Update status and approved_by
    $conn = $db->getConnection();
    $stmt = $conn->prepare("UPDATE solo_parent SET status = ?, approved_by = ? WHERE id = ?");
    $stmt->bind_param("ssi", $status, $admin, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: view.php?id=$id");
    exit;
} else {
    echo "Invalid request.";
}
?>