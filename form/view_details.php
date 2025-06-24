<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Database connection using PDO
    $conn = new PDO('mysql:host=127.0.0.1;dbname=solo_parent', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch all registered users
$sql = "SELECT id, name FROM registrations";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            background-color: #FFFFFF;
        }
        .header-logos {
            max-height: 120px;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            margin: 0 10px;
        }
        h6 {
            text-align: center;
            margin: 10px 0;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="logo-container">
            <img src="http://localhost/form/img/logo1.png" class="header-logos img-fluid">
            <img src="http://localhost/form/img/logo2.jpg" class="header-logos img-fluid">
            <h6>REPUBLIC OF THE PHILIPPINES<br>CITY OF CEBU<br>DEPARTMENT OF SOCIAL WELFARE AND SERVICES</h6>
            <img src="http://localhost/form/img/logo3.png" class="header-logos img-fluid">
            <img src="http://localhost/form/img/logo4.jpg" class="header-logos img-fluid">
        </div>

        <center><h1 class="mb-4">Registered Users</h1></center>
        <a href="add.php" class="btn btn-primary mb-3">Add New User</a>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="userTable">
                    <thead class="thead-blue">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($result) > 0): ?>
                            <?php foreach($result as $row): ?>
                                <tr id="user-<?php echo $row['id']; ?>">
                                    <td>
                                        <a href="user_details.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                            <?php echo htmlspecialchars($row['name']); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="update_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                        <button class="btn btn-danger btn-sm deleteUser " data-id="<?php echo $row['id']; ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                 <td colspan="2" class="text-center">No registered users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.deleteUser  ').on('click', function() {
                var userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this Registration?')) {
                    $.ajax({
                        url: 'delete_user.php', // The PHP file that handles the deletion
                        type: 'POST',
                        data: { delete_id: userId },
                        success: function(response) {
                            $('#user-' + userId).remove(); // Remove the user row from the table
                            alert(response); // Show success message
                        },
                        error: function() {
                            alert('An error occurred while deleting the user. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

<?php
// Close connection
$conn = null;
?>