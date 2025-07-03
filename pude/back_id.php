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
$parent = $dbHelper->getRecord('solo_parent', ['id' => $id_no]);
$parentName = $parent['fullname'] ?? '';
$childCount = is_array($dependents) ? count($dependents) : 0;
$qrData = "ID: $id_no\nName: $parentName\nChildren: $childCount";
$dep = $dependents
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child/Dependent Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
   
</head>

<body class="flex items-center justify-center min-h-screen w-screen bg-gray-100">
    <div class="flex flex-col items-center">
        <!-- Card Container -->
        <div class="border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in]">
            <!-- Table -->
             <div class="flex flex-row items-start flex-row-reverse justify-center h-full gap-3 mt-6">

            <div class="flex flex-col items-center">
                    <div id="qrcode"></div>
                </div>
            <script>
                new QRCode(document.getElementById("qrcode"), {
    text: <?= json_encode("http://localhost/solo_parent/pude/qr_view.php?id=" . $id_no) ?>,
    width: 100,
    height: 100
});
            </script>
            <!-- Emergency Info -->
           <div class="mb-2">
    <p class="mt-2 font-bold text-xs ml-2">IN CASE OF EMERGENCY</p>
    <?php
    $emergency = null;
    if (!empty($dependents)) {
        foreach ($dependents as $d) {
            if (!empty($d['emer_name']) || !empty($d['emer_contact_num']) || !empty($d['emer_address'])) {
                $emergency = $d;
                break;
            }
        }
    }
    ?>
    <?php if ($emergency): ?>
        <div class="flex flex-col justify-between items-left text-xs pt-1.5 ">
            <p class="m-0 mr-2 pt-2"><span class="font-bold">Name:</span> <?= htmlspecialchars($emergency['emer_name'] ?? '') ?></p>
            <p class="m-0 pt-2"><span class="font-bold">Contact Number:</span> <?= htmlspecialchars($emergency['emer_contact_num'] ?? '') ?></p>
        
        <p class=" pt-2"><span class="font-bold">Address:</span> <?= htmlspecialchars($emergency['emer_address'] ?? '') ?></p>
    </div>
    <?php else: ?>
        <p class="text-xs">No emergency info available.</p>
    <?php endif; ?>
</div>
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