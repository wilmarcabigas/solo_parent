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

// Get filter from query string
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Modify SQL based on filter
if ($filter === 'approved') {
    $sql = "SELECT id,idno,name,age,sex,validate FROM registrations WHERE LOWER(validate) = 'approved'";
} elseif ($filter === 'disapproved') {
    $sql = "SELECT id,idno,name,age,sex,validate FROM registrations WHERE LOWER(validate) = 'disapproved'";
} elseif ($filter === 'pending') {
    $sql = "SELECT id,idno,name,age,sex,validate FROM registrations WHERE LOWER(validate) NOT IN ('approved', 'disapproved') OR validate IS NULL OR validate = ''";
} else {
    $sql = "SELECT id,idno,name,age,sex,validate FROM registrations";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <a href="/solo_parent/main_menu.php">
        <button type="button" class="btn btn-secondary ml-2">menu</button>
    </a>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Entry Table</h1>
        <!-- Filter Buttons -->
        <div class="mb-3 text-center">
            <a href="?filter=all" class="btn btn-outline-primary <?php if($filter=='all') echo 'active'; ?>">All</a>
            <a href="?filter=approved" class="btn btn-outline-success <?php if($filter=='approved') echo 'active'; ?>">Approved</a>
            <a href="?filter=disapproved" class="btn btn-outline-danger <?php if($filter=='disapproved') echo 'active'; ?>">Disapproved</a>
            <a href="?filter=pending" class="btn btn-outline-warning <?php if($filter=='pending') echo 'active'; ?>">Pending</a>
        </div>
        <div class="mb-3 text-end">
            <a href="add.php" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Entry
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Idno</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Validate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($result) > 0): ?>
                    <?php foreach($result as $row): ?>
                        <tr id="user-<?php echo $row['id']; ?>">
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["idno"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["age"] ?></td>
                            <td><?php echo $row["sex"] ?></td>
                            <td>
                                <?php if (isset($row["validate"]) && strtolower($row["validate"]) == "approved"): ?>
                                    <span class="badge bg-success">Approved</span>
                                <?php elseif (isset($row["validate"]) && strtolower($row["validate"]) == "disapproved"): ?>
                                    <span class="badge bg-danger">Disapproved</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="user_details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="generate_id.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-id-card"></i> Generate ID
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No registered users found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.deleteUser').on('click', function() {
                var userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this Registration?')) {
                    $.ajax({
                        url: 'delete_user.php',
                        type: 'POST',
                        data: { delete_id: userId },
                        success: function(response) {
                            $('#user-' + userId).remove();
                            alert(response);
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