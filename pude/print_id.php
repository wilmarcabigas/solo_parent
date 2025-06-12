<?php
require_once "./util/dbhelper.php";
$dbHelper = new DbHelper();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_no = htmlspecialchars(trim($_GET['id']));
    $gen_id = $dbHelper->Joining_Generate_ID($id_no);
    $dependents = $dbHelper->Joining_Generate_ID($id_no);
} else {
    echo "<p style='color: red;'>Invalid ID provided!</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print Solo Parent ID</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print, .no-print * { display: none !important; }
            body { background: #fff !important; }
            .border-gray-400 { border-color: #888 !important; }
            .bg-white { background: #fff !important; }
            .bg-red-600 { background: #dc2626 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .text-white { color: #fff !important; }
            html, body {
                width: 100%;
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
            }
            .card-print {
                margin: 0 auto !important;
                position: relative;
                top: 0; left: 0;
            }
        }
        .page-break { page-break-before: always; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen w-screen font-sans">

    <!-- FRONT SIDE -->
    <div class="card-print flex flex-col justify-between items-center w-full h-screen">
        <div class="border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mt-20">
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
            <div class="flex justify-end items-center mt-[-65px]">
                <img alt="Bagong Pilipinas Logo" class="h-[0.6in] w-[0.6in] ml-" src="img/bagongPilipinas.png"/>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <!-- BACK SIDE -->
    <div class="card-print flex flex-col justify-between items-center w-full h-screen">
        <div class="border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mt-20">
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
            <div class="mb-2">
                <p class="mt-0 font-bold text-xs">IN CASE OF EMERGENCY:</p>
                <div class="flex justify-between items-center text-xs">
                    <p class="m-0 mr-2"><span class="font-bold">Name:</span> <?php echo htmlspecialchars($dependent['emer_name'] ?? ''); ?></p>
                    <p class="m-0"><span class="font-bold">Contact Number:</span> <?php echo htmlspecialchars($dependent['emer_contact_num'] ?? ''); ?></p>
                </div>
                <p class="text-xs"><span class="font-bold">Address:</span> <?php echo htmlspecialchars($dependent['emer_address'] ?? ''); ?></p>
            </div>
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
    </div>

    <!-- Print Button -->
    <div class="mt-4 no-print flex justify-center">
        <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">Print</button>
        <a href="index.php">
            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200 ml-2">Go to Solo Parent</button>
        </a>
    </div>
</body>
<script>
  window.onload = function() { window.print(); }
</script>
</html>