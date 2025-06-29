<?php
require_once "./util/dbhelper.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $allowed_statuses = ['approved', 'pending', 'dis-approved'];
$status = in_array($_GET['status'], $allowed_statuses) ? $_GET['status'] : 'pending';   

    $db = new DbHelper();
    $db->updateStatus($id, $status);

    header("Location: view.php?id=$id");
    exit;
} else {
    echo "Invalid request.";
}
?>