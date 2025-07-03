<?php
session_start();
include "data_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in/login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `solo_parent` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && ($row['user_id'] == $user_id || (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'))) {
        $delete = mysqli_query($conn, "DELETE FROM `solo_parent` WHERE id = $id");
        if ($delete) {
            header("Location: user_dashboard.php?msg=Deleted successfully");
            exit();
        } else {
            echo "Delete failed: " . mysqli_error($conn);
        }
    } else {
        echo "You are not authorized to delete this entry.";
    }
} else {
    echo "No ID provided.";
}
?>