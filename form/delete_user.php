<?php
include "dbhelper-form.php"; // Assuming this file contains the PDO connection

// Check if the ID is set and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        // Prepare the SQL DELETE statement
        $sql = "DELETE FROM registrations WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        // Bind the ID parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Execute the statement
        if ($stmt->execute()) {
            header("Location: index.php?message=Data Deleted Successfully");
            exit; // Ensure no further code is executed after the redirect
        } else {
            echo "Failed to delete record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid ID.";
}
?>