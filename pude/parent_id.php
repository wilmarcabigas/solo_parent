<?php 
require_once "./util/dbhelper.php";
$dbHelper = new DbHelper();  // Corrected variable name

// Check if ID is provided in the request
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_no = htmlspecialchars(trim($_GET['id']));
} else {
    echo "<p style='color: red;'>Invalid ID provided!</p>";
    exit; // Stop further execution if ID is invalid
}

// Fetch the data using the corrected variable
$gen_id = $dbHelper->Joining_Generate_ID($id_no);  

// Ensure $gen_id is not empty
if (empty($gen_id)) {
    echo "<p style='color: red;'>No records found for the provided ID.</p>";
    exit;
}
?>

<html>
    
<head>
    <title>Solo Parent Identification Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="flex items-center justify-center min-h-screen w-screen bg-gray-100">
    <div class="flex flex-col items-center">
        <!-- ID Card Container -->
        <div class="border border-gray-400 p-4 w-full max-w-md bg-white">
            <div class="flex justify-between items-center mb-2">
                <img alt="Official Seal of Cebu" class="h-12 w-12" height="50" src="img/cityhall_logo.png" width="50"/>
                <div class="text-center">
                    <h1 class="text-sm font-bold">REPUBLIC OF THE PHILIPPINES</h1>
                    <h2 class="text-sm">CITY OF CEBU</h2>
                    <h3 class="text-sm">DEPARTMENT OF SOCIAL WELFARE SERVICES</h3>
                </div>
                <img alt="DSWD Seal" class="h-12 w-12" height="50" src="img/dsws logo.png" width="50"/>
            </div>
            <div class="bg-red-600 text-white text-center py-1 mb-2">
                <h4 class="text-sm font-bold">SOLO PARENT IDENTIFICATION CARD</h4>
            </div>
            <div class="flex mb-2">
            <div class="border border-gray-400 flex items-center justify-center" style="width: 135px; height: 128px;">

                    <span class="text-xs">1x1 ID picture</span>
                </div>
                <div class="ml-4">
                    <p class="text-xs">
                        <span class="font-bold">ID NO:</span>
                        <?php echo isset($gen_id[0]['id_no']) ? htmlspecialchars($gen_id[0]['id_no']) : "N/A"; ?>
                    </p>
                    <br>
                    <p class="text-xs" style="margin-bottom:5px;">
                        <span class="font-bold">NAME:</span>
                        <?php echo isset($gen_id[0]['fullname']) ? htmlspecialchars($gen_id[0]['fullname']) : "N/A"; ?>
                    </p>
                    <p class="text-xs" style="margin-bottom:5px;">
                        <span class="font-bold">Address:</span>
                        <?php echo isset($gen_id[0]['address']) ? htmlspecialchars($gen_id[0]['address']) : "N/A"; ?>
                    </p>
                    <p class="text-xs" style="margin-bottom:5px;">
                        <span class="font-bold">Solo Parent Category:</span>
                        <?php echo !empty($gen_id[0]['solo_parent_category']) ? htmlspecialchars($gen_id[0]['solo_parent_category']) : "N/A"; ?>
                    </p>
                    <p class="text-xs" style="margin-bottom:5px;">
                        <span class="font-bold">Benefit Qualification Code:</span>
                        <?php echo isset($gen_id[0]['beneficiary_code']) ? htmlspecialchars($gen_id[0]['beneficiary_code']) : "N/A"; ?>
                    </p>
                </div>

            </div>
            <div class="text-xs mb-2 flex justify-between items-center" style="margin-top:15px;">
                <p style="margin: 0;">     
                    This card is non-transferable <br>and valid until
                    <span class="font-bold">10-22-2025</span>
                </p>
                <p style="margin: 0;">
                    Signature or thumbprint of solo parent
                </p>
            </div>

<div class="flex justify-end items-center mt-2">
<img alt="Bagong Pilipinas Logo" class="h-15 w-15" height="60" src="img/bagongPilipinas.png" width="60"/>

</div>






      

</div>

     <!-- Print Button Below the Container -->
 <div class="mt-4 w-full max-w-md text-left">
    <a href="back_id.php?id=<?= urlencode($id_no) ?>">
        <button type="submit" class="btn btn-success" name="submit" style="margin-left: 10px;">Next</button>
    </a>
    <button onclick="window.print()" class="btn btn-primary" style="margin-left: 10px;">Print</button>
</div>

</div>
</body>
</html>
