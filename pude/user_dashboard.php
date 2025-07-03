<?php
session_start();
require_once "./util/dbhelper.php";
$db = new DbHelper();

if (!isset($_SESSION["user_id"])) {
    header("Location: log_in/login.php");
    exit();
}
$user_id = $_SESSION["user_id"];
$entries = $db->getAllRecords("solo_parent", "user_id = '$user_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - Solo Parent</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100">
    <div class="max-w-5xl mx-auto my-10 p-6 bg-white rounded-2xl shadow-2xl ring-1 ring-blue-100">
        <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-blue-700">My Solo Parent Entries</h1>
    <div class="flex gap-2">
        <a href="app_form.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">Add New Entry</a>
        <a href="log_in/login.php" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded shadow">Logout</a>
    </div>
</div>
        <?php if (count($entries) > 0): ?>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded shadow-sm">
                <thead>
                    <tr class="bg-blue-100 text-blue-900">
                        <th class="py-2 px-4">ID No</th>
                        <th class="py-2 px-4">Full Name</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Date Registered</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entries as $row): ?>
                        <tr class="even:bg-purple-50 hover:bg-purple-100 transition">
                            <td class="py-2 px-4"><?= htmlspecialchars($row['id_no']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($row['fullname']); ?></td>
                            <td class="py-2 px-4">
                                <?php
                                    $status = strtolower($row['status'] ?? '');
                                    if ($status == "approved") {
                                        echo '<span class="bg-green-200 text-green-800 px-2 py-1 rounded text-xs">Approved</span>';
                                    } elseif ($status == "dis-approved") {
                                        echo '<span class="bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Disapproved</span>';
                                    } else {
                                        echo '<span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span>';
                                    }
                                ?>
                            </td>
                            <td class="py-2 px-4"><?= htmlspecialchars($row['date_registered'] ?? ''); ?></td>
                            <td class="py-2 px-4 flex flex-wrap gap-2">
                                <a href="view.php?id=<?= $row['id'] ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded shadow text-xs">View</a>
                                <a href="edit_form.php?id=<?= $row['id'] ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded shadow text-xs">Update</a>
                                <a href="print_id.php?id=<?= $row['id'] ?>" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded shadow text-xs">Print</a>
                                <a href="delete_info.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow text-xs">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-center text-gray-500 mt-8">You have no solo parent entries yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>