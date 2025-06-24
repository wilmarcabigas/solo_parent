<?php

require_once "./util/dbhelper.php";
$dbHelper = new DbHelper();
$all_ids = $dbHelper->getAllRecords("solo_parent"); // Adjust as needed
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select IDs to Print</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <form action="multi_print.php" method="post" class="bg-white p-8 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Select IDs to Print</h2>
        <div class="mb-4 max-h-64 overflow-y-auto">
            <?php foreach ($all_ids as $row): ?>
                <label class="block mb-2">
                    <input type="checkbox" name="ids[]" value="<?= htmlspecialchars($row['id']) ?>" class="mr-2">
                    <?= htmlspecialchars($row['fullname']) ?> (<?= htmlspecialchars($row['id']) ?>)
                </label>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Print Selected</button>
    </form>
</body>
</html>