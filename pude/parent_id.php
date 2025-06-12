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

   
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="flex items-center justify-center min-h-screen w-screen bg-gray-100">
    <div class="flex flex-col items-center">
        <!-- ID Card Container -->
        <div class="border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in]">
            <div>
                <div class="flex justify-between items-center mb-1">
                    <img alt="Official Seal of Cebu" class="h-[0.5in] w-[0.5in]" src="img/cityhall_logo.png"/>
                    <div class="text-center">
                        <h1 class="text-[0.09in] font-bold leading-tight">REPUBLIC OF THE PHILIPPINES</h1>
                        <h2 class="text-[0.09in] leading-tight">CITY OF CEBU</h2>
                        <h3 class="text-[0.09in] leading-tight">DEPARTMENT OF SOCIAL WELFARE SERVICES</h3>
                    </div>
                    <img alt="DSWD Seal" class="h-[0.5in] w-[0.5in]" src="img/dsws logo.png"/>
                </div>
                <div class="bg-red-600 text-white text-center py-1 mb-1">
                    <h4 class="text-[0.12in] font-bold tracking-wide">SOLO PARENT IDENTIFICATION CARD</h4>
                </div>
                <div class="flex mb-1">
                    <div class="border border-gray-400 flex items-center justify-center w-[2.5cm] h-[2.5cm] bg-gray-50 text-[0.11in] text-gray-600 mr-3">
                        1x1 ID picture
                    </div>
                    <div class="ml-3 text-[0.09in]">
                        <p class="mb-1"><span class="font-bold">ID NO:</span>
                            <?php echo isset($gen_id[0]['id_no']) ? htmlspecialchars($gen_id[0]['id_no']) : "N/A"; ?>
                        </p>
                        <p class="mb-1"><span class="font-bold">NAME:</span>
                            <?php echo isset($gen_id[0]['fullname']) ? htmlspecialchars($gen_id[0]['fullname']) : "N/A"; ?>
                        </p>
                        <p class="mb-1"><span class="font-bold">Address:</span>
                            <?php echo isset($gen_id[0]['address']) ? htmlspecialchars($gen_id[0]['address']) : "N/A"; ?>
                        </p>
                        <p class="mb-1"><span class="font-bold">Solo Parent Category:</span>
                            <?php echo !empty($gen_id[0]['solo_parent_category']) ? htmlspecialchars($gen_id[0]['solo_parent_category']) : "N/A"; ?>
                        </p>
                        <p class="mb-0.1"><span class="font-bold">Benefit Qualification Code:</span>
                            <?php echo isset($gen_id[0]['beneficiary_code']) ? htmlspecialchars($gen_id[0]['beneficiary_code']) : "N/A"; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex absolute left-70 justify-between items-end text-[0.10in] mt-[1px]">
                    <p class="m-1 text-left ">
                       <br> Signature or thumbprint of solo parent
                    </p>
                </div>
                <div class="flex justify-between items-center text-[0.10in] mt-[1px]">
                    <p class="m-1">
                        <br><br>This card is non-transferable and valid until
                        <span class="font-bold">10-22-2025</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-center mt-[-65px] mr-[-250px]">
            <img alt="Bagong Pilipinas Logo" class="h-[0.6in] w-[0.6in] ml-" src="img/bagongPilipinas.png"/>
        </div>
        <!-- Print Button Below the Container -->
        <div class="mt-4 w-full max-w-md text-left">
            <a href="back_id.php?id=<?= urlencode($id_no) ?>">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200" name="submit" >Back</button>
            </a>
            <a href="print_id.php?id=<?= urlencode($id_no) ?>" target="_blank" onclick="window.open(this.href, '_blank'); return false;">
            <button   type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200" >Print</button>
            </a>
            <a href="index.php">
                <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">Go to Solo Parent</button>
            </a>
        </div>
    </div>
</body>
</html>
