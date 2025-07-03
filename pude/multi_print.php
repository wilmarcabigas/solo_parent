<?php

require_once "./util/dbhelper.php";
$dbHelper = new DbHelper();

$ids = isset($_POST['ids']) ? $_POST['ids'] : [];
if (empty($ids)) {
    echo "<p style='color:red;'>No IDs selected.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print Multiple Solo Parent IDs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print, .no-print * { display: none !important; }
            body { background: #fff !important; }
            .id-card { page-break-inside: avoid; }
            .page-break { page-break-before: always; }
            .bg-red-600 { background: #dc2626 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .bg-white { background: #fff !important; }
            .border-gray-400 { border-color: #888 !important; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen w-screen font-sans">
    <div class="no-print mt-4 flex justify-center">
        <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">Print All</button>
        <a href="index.php">
            <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200 ml-2">Back</button>
        </a>
    </div>
    <div class="p-8">
        <!-- FRONT SIDE GRID -->
        <div class="grid grid-cols-2 gap-6">
        <?php foreach ($ids as $id):
            $gen_id = $dbHelper->Joining_Generate_ID($id);
            if (empty($gen_id)) continue;
        ?>
            <div class="id-card border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mx-auto my-2">
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
                                <?= isset($gen_id[0]['id_no']) ? htmlspecialchars($gen_id[0]['id_no']) : "N/A"; ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">NAME:</span>
                                <?= isset($gen_id[0]['fullname']) ? htmlspecialchars($gen_id[0]['fullname']) : "N/A"; ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">Address:</span>
                                <?= isset($gen_id[0]['address']) ? htmlspecialchars($gen_id[0]['address']) : "N/A"; ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">Solo Parent Category:</span>
                                <?= !empty($gen_id[0]['solo_parent_category']) ? htmlspecialchars($gen_id[0]['solo_parent_category']) : "N/A"; ?>
                            </p>
                            <p class="mb-0.1"><span class="font-bold">Benefit Qualification Code:</span>
                                <?= isset($gen_id[0]['beneficiary_code']) ? htmlspecialchars($gen_id[0]['beneficiary_code']) : "N/A"; ?>
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
        <?php endforeach; ?>
        </div>
        <!-- BACK SIDE GRID (next page, same order) -->
<div class="page-break"></div>
<div class="grid grid-cols-2 gap-6">
<?php foreach ($ids as $id):
    $dependents = $dbHelper->Joining_Generate_ID($id);
    if (empty($dependents)) $dependents = [];
?>
    <div class="id-card border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mx-auto my-2">
        <div class="flex flex-row items-start flex-row-reverse justify-center h-full gap-3 mt-6">
            <!-- QR Code Section -->
            <div class="flex flex-col items-center">
                <div id="qrcode-<?= htmlspecialchars($id) ?>"></div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
            <script>
                new QRCode(document.getElementById("qrcode-<?= htmlspecialchars($id) ?>"), {
                    text: <?= json_encode("http://localhost/solo_parent/pude/qr_view.php?id=" . $id) ?>,
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
                        <p class="pt-2"><span class="font-bold">Address:</span> <?= htmlspecialchars($emergency['emer_address'] ?? '') ?></p>
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
<?php endforeach; ?>
</div>
    </div>
</body>
</html>