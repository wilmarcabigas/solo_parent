<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection using PDO
try {
    $conn = new PDO('mysql:host=127.0.0.1;dbname=form', 'root', '');
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if 'id' is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user details from the database
    $sql = "SELECT * FROM registrations WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if (!$user) {
        echo "<div class='alert alert-danger'>User  not found.</div>";
        exit;
    }

    // Fetch family members from the family_members table
    $family_sql = "SELECT * FROM family_members WHERE user_id = :user_id";
    $family_stmt = $conn->prepare($family_sql);
    $family_stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $family_stmt->execute();
    $family_members = $family_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch seminars from the seminars_members table
    $seminar_sql = "SELECT * FROM seminars_members WHERE user_id = :user_id";
    $seminar_stmt = $conn->prepare($seminar_sql);
    $seminar_stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    if ($seminar_stmt->execute()) {
        $seminars_members = $seminar_stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "<div class='alert alert-danger'>Error fetching seminars.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>Invalid user ID.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User  Details</h1>

        <div class="card">
            <div class="card-header">User  Information</div>
            <div class="card-body">
                <table class="table table-bordered">
                <tr>
                        <th>ID NUMBER</th>
                        <td><?php echo !empty($user['idno']) ? htmlspecialchars($user['idno']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo !empty($user['name']) ? htmlspecialchars($user['name']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo !empty($user['age']) ? htmlspecialchars($user['age']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Sex</th>
                        <td><?php echo !empty($user['sex']) ? htmlspecialchars($user['sex']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo !empty($user['status']) ? htmlspecialchars($user['status']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo !empty($user['date_of_birth']) ? htmlspecialchars($user['date_of_birth']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Place of Birth</th>
                        <td><?php echo !empty($user['place_of_birth']) ? htmlspecialchars($user['place_of_birth']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Home Address</th> <td><?php echo !empty($user['home_address']) ? htmlspecialchars($user['home_address']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Occupation</th>
                        <td><?php echo !empty($user['occupation']) ? htmlspecialchars($user['occupation']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td><?php echo !empty($user['religion']) ? htmlspecialchars($user['religion']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Contact No</th>
                        <td><?php echo !empty($user['contact_no']) ? htmlspecialchars($user['contact_no']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>In Case Of Emergency</th>
                        <td><?php echo !empty($user['icoe']) ? htmlspecialchars($user['icoe']) : 'N/A'; ?></td>
                    </tr>  
                     <tr>
                        <th>Contact No</th>
                        <td><?php echo !empty($user['icoecontact_no']) ? htmlspecialchars($user['icoecontact_no']) : 'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Pantawid</th>
                        <td><?php echo !empty($user['pantawid']) ? htmlspecialchars($user['pantawid']) : 'N/A'; ?></td>
                    </tr>
                    
                </table>
    </div>
        </div>

        <div class="card">
            <div class="card-header">Family Details</div>
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
                        <?php if (!empty($family_members)): ?>
                            <?php foreach ($family_members as $member): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($member['name'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($member['relationship'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($member['age'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($member['birthday'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($member['occupation'] ?? 'N/A'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No family details available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Educational Attainment</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Elementary</th>
                        <td><?php echo htmlspecialchars($user['elementary'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>High School</th>
                        <td><?php echo htmlspecialchars($user['high_school'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Vocational</th>
                        <td><?php echo htmlspecialchars($user['vocational'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>College</th>
                        <td><?php echo htmlspecialchars($user['college'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Others</th>
                        <td><?php echo htmlspecialchars($user['others'] ?? 'N/A'); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Community Involvement</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>School</th>
                        <td><?php echo htmlspecialchars($user['school'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Civic</th>
                        <td><?php echo htmlspecialchars($user['civic'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Community</th>
                        <td><?php echo htmlspecialchars($user['community'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Workplace</th>
                        <td><?php echo htmlspecialchars($user['workplace'] ?? 'N/A'); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Seminars and Trainings</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th>Date</th>
                            <th>Organizer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($seminars_members)): ?>
                            <?php foreach ($seminars_members as $seminar): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($seminar['title']); ?></td>
                                    <td><?php echo htmlspecialchars($seminar['date']); ?></td>
                                    <td><?php echo htmlspecialchars($seminar['organizer']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No seminars and trainings details available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="update_user.php?id=<?php echo $id; ?>" class="btn btn-primary">Update</a>
            </div>
        </div>
        
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
    
</body>
</html>

<?php
// Close connection
$conn = null; // PDO connection is closed by setting it to null
?>