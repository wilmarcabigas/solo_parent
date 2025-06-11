<?php
require_once "./util/dbhelper.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'] === 'approved' ? 'approved' : 'pending'; // or 'disapproved' if you want

    $db = new DbHelper();
    $db->updateStatus($id, $status); // You need to implement this method in your DbHelper class

    header("Location: view.php?id=$id");
    exit;
} else {
    echo "Invalid request.";
}
?>