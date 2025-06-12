<?php

require_once "./util/dbhelper.php";

// Create an instance of the DbHelper class
$dbHelper = new DbHelper();

// Check if 'id' parameter is set in the GET request and if it's a numeric value
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    // Sanitize and trim the input ID
    $id_no = htmlspecialchars(trim($_GET['id']));

    // Fetch child/dependent information from the database
    $dependents = $dbHelper->Joining_Generate_ID($id_no); // Assuming a function exists
} else {
    // Display an error message if the ID is invalid
    echo "<p style='color: red;'>Invalid ID provided!</p>";

    // Stop further script execution if the ID is invalid
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child/Dependent Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>

<body class="flex items-center justify-center min-h-screen w-screen bg-gray-100">
    <div class="flex flex-col items-center">
        <!-- Card Container -->
        <div class="border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in]">
            <!-- Table -->
            <table class="w-full border-collapse mb-2 text-xs">
                <thead>
                    <tr>
                        <th class="border-b-2 border-black py-1 text-center font-bold bg-white" colspan="4">CHILD/REN/DEPENDENT/S</th>
                    </tr>
                    <tr>
                        <th class="border border-black py-1 px-2 bg-white">NAME</th>
                        <th class="border border-black py-1 px-2 bg-white">DATE OF BIRTH</th>
                        <th class="border border-black py-1 px-2 bg-white">AGE</th>
                        <th class="border border-black py-1 px-2 bg-white">RELATIONSHIP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dependents)): ?>
                        <?php foreach ($dependents as $dependent): ?>
                            <tr>
                                <td class="border border-black py-1 px-2 text-center"><?php echo htmlspecialchars($dependent['name']); ?></td>
                                <td class="border border-black py-1 px-2 text-center"><?php echo htmlspecialchars($dependent['birthdate']); ?></td>
                                <td class="border border-black py-1 px-2 text-center"><?php echo htmlspecialchars($dependent['age']); ?></td>
                                <td class="border border-black py-1 px-2 text-center"><?php echo htmlspecialchars($dependent['relationship']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="border border-black py-1 px-2 text-center">No dependents found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Emergency Info -->
            <div class="mb-2">
                <p class="mt-0 font-bold text-xs">IN CASE OF EMERGENCY:</p>
                <div class="flex justify-between items-center text-xs">
                    <p class="m-0 mr-2"><span class="font-bold">Name:</span> <?php echo htmlspecialchars($dependent['emer_name'] ?? ''); ?></p>
                    <p class="m-0"><span class="font-bold">Contact Number:</span> <?php echo htmlspecialchars($dependent['emer_contact_num'] ?? ''); ?></p>
                </div>
                <p class="text-xs"><span class="font-bold">Address:</span> <?php echo htmlspecialchars($dependent['emer_address'] ?? ''); ?></p>
            </div>

            <!-- Signature Section -->
            <div class="flex justify-between items-end mt-0">
                <div class="text-center">
                    <p class="mt-4 text-xs font-bold"><u>HON. RAYMOND ALVIN N. GARCIA</u></p>
                    <p class="text-xs">CITY MAYOR</p>
                </div>
                <div class="text-center">
                    <p class="mt-4 text-xs font-bold"><u>PORTIA C. BASMAYOR, RSW</u></p>
                    <p class="text-xs">OIC-DSWS</p>
                </div>
            </div>
        </div>

        <!-- Button Below Container -->
<div class="w-full max-w-md text-left mt-4 flex flex-wrap gap-2 no-print">
    <a href="parent_id.php?id=<?= urlencode($id_no) ?>">
        <button type="button"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
            Front
        </button>
    </a>
    <a href="print_id.php?id=<?= urlencode($id_no) ?>" target="_blank" onclick="window.open(this.href, '_blank'); return false;">
        <button type="button"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
            Print
        </button>
    </a>
    <a href="/solo_parent/pude/index.php">
        <button type="button"
            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
            Go to Solo Parent
        </button>
    </a>
</div>
</body>

</html>