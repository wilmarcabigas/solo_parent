<?php


require_once "./util/dbhelper.php";
$db = new DbHelper();

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$where = [];
if ($filter == 'pending') {
    $where[] = "LOWER(status) = 'pending'";
} elseif ($filter == 'approved') {
    $where[] = "LOWER(status) = 'approved'";
} elseif ($filter == 'dis-approved') {
    $where[] = "LOWER(status) = 'dis-approved'";
}
$whereSql = $where ? implode(' AND ', $where) : '';
$displayAll_Details = $db->getAllRecords("solo_parent", $whereSql);
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
    <style>
        .btn.btn-info.btn-sm {
            background-color: #F3DADF !important;
            border: none;
        }
        .btn.btn-danger.btn-sm {
            background-color:rgb(149, 35, 31)5!important;
            border: none;
        }
        .btn.btn-success {
            background-color:green !important;
            border: none;
        }
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
</head>
<body>
    <a href="/solo_parent/main_menu.php" class="no-print">
        <button type="button" class="btn btn-secondary ml-2">menu</button>
    </a>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Solo Parent Data</h1>
        <form method="post" action="multi_print.php" target="_blank" id="multiPrintForm">
            <div class="mb-3 text-end no-print">
                
                
                <button type="submit" class="btn btn-danger" id="multiPrintBtn" disabled>
                    <i class="fas fa-print" ></i> Multi Print
                </button>
            </div>
            <div class="mb-3 text-center no-print">
                <!-- Instant search form (no submit) -->
                <div class="mb-3 no-print d-flex justify-content-start " id="searchForm">
    <input type="text" id="instantSearch" class="form-control w-auto me-2" placeholder="Search...">
</div>
                <a href="index.php" class="btn btn-secondary btn-sm me-2">Show All</a>
                <a href="index.php?filter=pending" class="btn btn-warning btn-sm me-2">Show Pending</a>
                <a href="index.php?filter=approved" class="btn btn-success btn-sm me-2">Show Approved</a>
                <a href="index.php?filter=dis-approved" class="btn btn-danger btn-sm">Show Dis-Approved</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="no-print">
                                <input type="checkbox" name="ids[]" id="selectAll">
                            </th>
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
        <td class="no-print">
            <input type="checkbox" name="ids[]" value="<?php echo htmlspecialchars($row["id"]); ?>" class="row-checkbox">
        </td>
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
<?php elseif (isset($row["status"]) && strtolower($row["status"]) == "dis-approved"): ?>
    <span class="badge bg-danger">Dis-Approved</span>
<?php else: ?>
    <span class="badge bg-warning text-dark">Pending</span>
<?php endif; ?>
</td>
    </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Enable/disable Multi Print button
    function updateMultiPrintBtn() {
        const anyChecked = Array.from(document.querySelectorAll('.row-checkbox')).some(cb => cb.checked);
        document.getElementById('multiPrintBtn').disabled = !anyChecked;
    }
    document.getElementById('selectAll').addEventListener('change', function() {
        let checked = this.checked;
        document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = checked);
        updateMultiPrintBtn();
    });
    document.querySelectorAll('.row-checkbox').forEach(cb => {
        cb.addEventListener('change', updateMultiPrintBtn);
    });

    // Instant JS search/filter
    document.getElementById('instantSearch').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });
    </script>
</body>
</html>