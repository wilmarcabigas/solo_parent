<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$dsn = 'mysql:host=localhost;dbname=solo_parent;charset=utf8'; // Correct DSN format
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create a PDO instance
    $conn = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate a CSRF token for form security
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

/**
 * Fetch user details from the registrations table.
 * 
 * @param int $id The ID of the user.
 * @return array An array of objects containing the user data.
 */
function Joiningtables($id) {
    global $conn; // Use the global connection variable

    $sql = "
        SELECT 
            registrations.id,
            registrations.idno,
            registrations.name,
            registrations.age,
            registrations.sex,
            registrations.icoe,
            registrations.icoecontact_no
        FROM registrations
        WHERE registrations.id = :id
    ";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch results as objects
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
}

?>
