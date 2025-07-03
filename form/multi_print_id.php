<?php
require_once "dbhelper-form.php";

// Check if IDs are provided
if (!isset($_POST['ids']) || !is_array($_POST['ids']) || count($_POST['ids']) === 0) {
    echo "<p style='color:red;'>No IDs selected for printing.</p>";
    exit();
}

$ids = array_map('intval', $_POST['ids']);
$placeholders = implode(',', array_fill(0, count($ids), '?'));

// Fetch all selected users
$conn = new PDO('mysql:host=127.0.0.1;dbname=solo_parent', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM registrations WHERE id IN ($placeholders)";
$stmt = $conn->prepare($sql);
$stmt->execute($ids);
$results = $stmt->fetchAll(PDO::FETCH_OBJ);

// Helper for back card
function renderBackCard($row) {
    ob_start();
    ?>
    <div class="id-card border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mx-auto my-2">
        <div class="header font-bold text-xs text-center mb-2">Family & Community Welfare Unit</div>
        <div class="contact-info text-xs mb-2">
            <strong>In Case of Emergency</strong><br>
            <?php
            $icoe = htmlspecialchars($row->icoe ?? "No emergency contact available");
            $contact = str_replace(["\r", "\n"], '', htmlspecialchars($row->icoecontact_no ?? ""));
            if ($contact && $icoe !== "No emergency contact available") {
                echo $icoe . "<br>" . $contact;
            } else {
                echo "No emergency contact available";
            }
            ?>
        </div>
        <ul class="text-xs mb-2">
            <li class="bullet">Issued by <strong>FAMILY & COMMUNITY WELFARE UNIT</strong> under Cebu City Government.</li>
            <li class="bullet">This ID card is non-transferable.</li>
            <li class="bullet">Valid until 2025.</li>
        </ul>
        <p class="text-[9px] text-center mb-2">In case of loss, notify The Department of Social Welfare Services.</p>
        <div class="signature text-center text-xs mt-2">
            <span class="block border-t border-black w-32 mx-auto mb-1"></span>
            HON. RAYMOND CALVIN N. GARCIA<br>
            City Mayor
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multi Print ERPAT IDs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print, .no-print * { display: none !important; }
            body { background: #fff !important; }
            .id-card { page-break-inside: avoid; }
            .page-break { page-break-before: always; }
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
        <?php foreach ($results as $row): ?>
            <div class="id-card border border-gray-400 bg-white flex flex-col justify-between p-2 w-[3.5in] h-[2.5in] mx-auto my-2">
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <img alt="Official Seal of Cebu" class="h-[0.5in] w-[0.5in]" src="img/logo3.png"/>
                        <div class="text-center">
                            <h1 class="text-[0.09in] font-bold leading-tight">REPUBLIC OF THE PHILIPPINES</h1>
                            <h2 class="text-[0.09in] leading-tight">CITY OF CEBU</h2>
                            <h3 class="text-[0.09in] leading-tight">DEPARTMENT OF SOCIAL WELFARE SERVICES</h3>
                        </div>
                        <img alt="DSWD Seal" class="h-[0.5in] w-[0.5in]" src="img/logo4.jpg"/>
                    </div>
                    <div class="bg-red-600 text-white text-center py-1 mb-1">
                        <h4 class="text-[0.12in] font-bold tracking-wide">ERPAT IDENTIFICATION CARD</h4>
                    </div>
                    <div class="flex mb-1">
                        <div class="border border-gray-400 flex items-center justify-center w-[2.5cm] h-[2.5cm] bg-gray-50 text-[0.11in] text-gray-600 mr-3">
                            PHOTO
                        </div>
                        <div class="ml-3 text-[0.09in]">
                            <p class="mb-1"><span class="font-bold">ID NO:</span>
                                <?= htmlspecialchars($row->idno); ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">NAME:</span>
                                <?= htmlspecialchars($row->name); ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">AGE:</span>
                                <?= htmlspecialchars($row->age); ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">SEX:</span>
                                <?= htmlspecialchars($row->sex); ?>
                            </p>
                            <p class="mb-1"><span class="font-bold">Status:</span>
                                Active
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
                    <img alt="Bagong Pilipinas Logo" class="h-[0.6in] w-[0.6in] ml-" src="img/logo1.png"/>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <!-- BACK SIDE GRID (next page, same order) -->
        <div class="page-break"></div>
        <div class="grid grid-cols-2 gap-6">
        <?php foreach ($results as $row): ?>
            <?= renderBackCard($row); ?>
        <?php endforeach; ?>
        </div>
    </div>
</body>
</html>