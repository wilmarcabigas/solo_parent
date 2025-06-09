<?php

// Include the database connection file
include "data_connect.php";

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the record
    $sql = "DELETE FROM `solo_parent` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to a confirmation or listing page
        header("Location: index.php?message=Record deleted successfully");
        exit();
    } else {
        // Display an error message if the query fails
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If the 'id' parameter is missing, redirect to the list page
    header("Location: list.php?message=Invalid request");
    exit();
}

?>
