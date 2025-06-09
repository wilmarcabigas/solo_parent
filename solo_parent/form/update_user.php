<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('127.0.0.1', 'root', '', 'form');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user details from the database
    $sql = "SELECT * FROM registrations WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // Check if user exists
    if (!$user) {
        echo "<div class='alert alert-danger'>User  not found.</div>";
        exit;
    }

    // Handle form submission for updating user details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Prepare the update statement
        $stmt = $conn->prepare("UPDATE registrations SET idno=?, name=?, age=?, sex=?, status=?, date_of_birth=?, place_of_birth=?, home_address=?, occupation=?, religion=?, contact_no=?,icoe=?,icoecontact_no=?, pantawid=?, elementary=?, high_school=?, vocational=?, college=?, others=?, school=?, civic=?, community=?, workplace=? WHERE id=?");

        // Bind parameters
        $stmt->bind_param("ssisssssssssisssssssssss", 
            $_POST['idno'], 
            $_POST['name'], 
            $_POST['age'], 
            $_POST['sex'], 
            $_POST['status'], 
            $_POST['date_of_birth'], 
            $_POST['place_of_birth'], 
            $_POST['home_address'], 
            $_POST['occupation'], 
            $_POST['religion'], 
            $_POST['contact_no'], 
            $_POST['icoe'], 
            $_POST['icoecontact_no'], 

            $_POST['pantawid'],  
            $_POST['elementary'],
            $_POST['high_school'],
            $_POST['vocational'],
            $_POST['college'],
            $_POST['others'],
            $_POST['school'],
            $_POST['civic'],
            $_POST['community'],
            $_POST['workplace'],
            $id // Add the user ID for the WHERE clause
        );

        // Execute the update
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>User  updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating user: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
} else {
    echo "<div class='alert alert-danger'>Invalid user ID.</div>";
    exit;
}

// Fetch family members and seminars for display
$family_sql = "SELECT * FROM family_members WHERE user_id = ?";
$family_stmt = $conn->prepare($family_sql);
$family_stmt->bind_param("i", $id);
$family_stmt->execute();
$family_members = $family_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$family_stmt->close();

$seminar_sql = "SELECT * FROM seminars_members WHERE user_id = ?";
$seminar_stmt = $conn->prepare($seminar_sql);
$seminar_stmt->bind_param("i", $id);
$seminar_stmt->execute();
$seminars_members = $seminar_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$seminar_stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Update User Details</h1>

        <!-- Form starts here -->
        <form action="" method="POST">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Identifying Data</div>
                <div class="card-body">
                    <table class="table table-bordered">
                    <tr><th>ID Number</th><td><input type="text" name="idno" value="<?php echo htmlspecialchars($user['idno']); ?>" class="form-control"></td></tr>

                        <tr><th>Name</th><td><input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="form-control"></td></tr>
                        <tr><th>Age</th><td><input type="number" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" class="form-control"></td></tr>
                        <tr><th>Sex</th><td><input type="text" name="sex" value="<?php echo htmlspecialchars($user['sex']); ?>" class="form-control"></td></tr>
                        <tr><th>Status</th><td><input type="text" name="status" value="<?php echo htmlspecialchars($user['status']); ?>" class="form-control"></td></tr>
                        <tr><th>Date of Birth</th><td><input type="date" name="date_of_birth" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>" class="form-control"></td></tr>
                        <tr><th>Place of Birth</th><td><input type="text" name="place_of_birth" value="<?php echo htmlspecialchars($user['place_of_birth']); ?>" class="form-control"></td></tr>
                        <tr><th>Home Address</th><td><input type="text" name="home_address" value="<?php echo htmlspecialchars($user['home_address']); ?>" class="form-control"></td></tr>
                        <tr><th>Occupation</th><td><input type="text" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>" class="form-control"></td></tr>
                        <tr><th>Religion</th><td><input type="text" name="religion" value="<?php echo htmlspecialchars($user['religion']); ?>" class="form-control"></td></tr>
                        <tr><th>Contact No</th><td><input type="text" name="contact_no" value="<?php echo htmlspecialchars($user['contact_no']); ?>" class="form-control"></td></tr>
                        <tr><th>In Case Of Emergency</th><td><input type="text" name="icoe" value="<?php echo htmlspecialchars($user['icoe']); ?>" class="form-control"></td></tr>
                        <tr><th>Contact No</th><td><input type="text" name="icoecontact_no" value="<?php echo htmlspecialchars($user['icoecontact_no']); ?>" class="form-control"></td></tr>

                        <tr><th>Pantawid</th><td><input type="text" name="pantawid" value="<?php echo htmlspecialchars($user['pantawid']); ?>" class="form-control"></td></tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">Family Composition</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relationship</th>
                                <th>Age</th>
                                <th>Birthday</th>
                                <th>Occupation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($family_members as $member): ?>
                                <tr>
                                    <td><input type="text" name="family_name[]" value="<?php echo htmlspecialchars($member['name']); ?>" class="form-control" /></td>
                                    <td><input type="text" name="family_relationship[]" value="<?php echo htmlspecialchars($member['relationship']); ?>" class="form-control" /></td>
                                    <td><input type="number" name="family_age[]" value="<?php echo htmlspecialchars($member['age']); ?>" class="form-control" /></td>
                                    <td><input type="date" name="family_birthday[]" value="<?php echo htmlspecialchars($member['birthday']); ?>" class="form-control" /></td>
                                    <td><input type="text" name="family_occupation[]" value="<?php echo htmlspecialchars($member['occupation']); ?>" class="form-control" /></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">Educational Attainment</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>Elementary</th><td><input type="text" name="elementary" value="<?php echo htmlspecialchars($user['elementary']); ?>" class="form-control" /></td></tr>
                        <tr><th>High School</th><td><input type="text" name="high_school" value="<?php echo htmlspecialchars($user['high_school']); ?>" class="form-control" /></td></tr>
                        <tr><th>Vocational</th><td><input type="text" name="vocational" value="<?php echo htmlspecialchars($user['vocational']); ?>" class="form-control" /></td></tr>
                        <tr><th>College</th><td><input type="text" name="college" value="<?php echo htmlspecialchars($user['college']); ?>" class="form-control" /></td></tr>
                        <tr><th>Others</th><td><input type="text" name="others" value="<?php echo htmlspecialchars($user['others']); ?>" class="form-control" /></td></tr>
                    </table>
                </div>
            ```php
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">Community Involvement</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>School</th><td><input type="text" name="school" value="<?php echo htmlspecialchars($user['school']); ?>" class="form-control" /></td></tr>
                        <tr><th>Civic</th><td><input type="text" name="civic" value="<?php echo htmlspecialchars($user['civic']); ?>" class="form-control" /></td></tr>
                        <tr><th>Community</th><td><input type="text" name="community" value="<?php echo htmlspecialchars($user['community']); ?>" class="form-control" /></td></tr>
                        <tr><th>Workplace</th><td><input type="text" name="workplace" value="<?php echo htmlspecialchars($user['workplace']); ?>" class="form-control" /></td></tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">Seminars and Trainings</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Organizer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($seminars_members as $seminar): ?>
                                <tr>
                                    <td><input type="text" name="seminar_title[]" value="<?php echo htmlspecialchars($seminar['title']); ?>" class="form-control" /></td>
                                    <td><input type="date" name="seminar_date[]" value="<?php echo htmlspecialchars($seminar['date']); ?>" class="form-control" /></td>
                                    <td><input type="text" name="seminar_organizer[]" value="<?php echo htmlspecialchars($seminar['organizer']); ?>" class="form-control" /></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Submit button to save updated data to the database -->
            <button type="submit" class="btn btn-primary">Update User Details</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back</a>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>