<?php
require_once "./util/dbhelper.php";
$db = new DbHelper();

$displayAll_Details = $db->getAllRecords("solo_parent");

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



    <!-- ...existing head code... -->
    <style>
        .btn.btn-info.btn-sm {
            background-color: #F3DADF !important;
            border: none;
        }
        .btn.btn-danger.btn-sm {
            background-color: #274D60 !important;
            border: none;
        }
        .btn.btn-success {
            background-color: #FDA481 !important;
            border: none;
        }
        /* Hide elements with .no-print when printing */
        @media print {
            .no-print, .no-print * {
                display: none !important;
            }
            .table, .table th, .table td {
                background: #fff !important;
                color: #000 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .table-dark th {
                background: #212529 !important;
                color: #fff !important;
            }
            body {
                background: #fff !important;
            }
        }
    </style>
</>
<body>
    <a href="/solo_parent/main_menu.php" class="no-print">
        <button type="button" class="btn btn-secondary ml-2">menu</button>
    </a>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Solo Parent Data</h1>
        <div class="mb-3 text-end no-print">
            <a href="app_form.php" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Entry
            </a>
            <a href="log_in.php" class="btn btn-primary">
                <i></i>Log Out
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Id No.</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th class="no-print">Action</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($displayAll_Details as $row) : ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["id_no"] ?></td>
                            <td><?php echo $row["fullname"] ?></td>
                            <td><?php echo $row["age"] ?></td>
                            <td><?php echo $row["sex"] ?></td>
                            <td class="text-center no-print">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="delete_info.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="parent_id.php?id=<?php echo urlencode($row['id']); ?>" style='font-size:24px'>
                                        <i class='far fa-id-card'></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                <?php if (isset($row["status"]) && strtolower($row["status"]) == "approved"): ?>
                    <span class="badge bg-success">Approved</span>
                <?php else: ?>
                    <span class="badge bg-warning text-dark">Pending</span>
                <?php endif; ?>
            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>