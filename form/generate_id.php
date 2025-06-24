<?php
require_once "dbhelper-form.php";

// Validate 'id' from GET request
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "No valid ID provided.";
    exit();
}

$id = (int) $_GET["id"];
$results = Joiningtables($id);

// Get the back card HTML (only the .id-card div)
ob_start();
include "back_id.php";
$back_card = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERPAT ID Card</title>
    <style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 100vw;
        min-height: 75vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
    }
    .id-card {
        width: 86mm;        
        height: 54mm;
        border: 2px solid #000;
        border-radius: 8px;
        padding: 6px;
        background-color: white;
        font-size: 10px;
        text-align: center;
        position: relative;
        margin: 20px ;
        box-sizing: border-box;
    }
    .headerclass {
        text-align: center;
        font-size: 8px;
        text-transform: uppercase;
        margin-bottom: 2px;
        line-height: 1.2;
    }
    .erp-title {
        color: red;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
        margin-top: 15px;
    }
    .photo-box {
        width: 25mm;
        height: 20mm;
        border: 2px solid black;
        position: absolute;
        left: 6px;
        top: 80px;
        background-color: #e0e0e0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 10px;
        font-weight: bold;
    }
    .id-info {
        position: absolute;
        left: 35mm;
        top: 40px;
        font-size: 9px;
        text-align: left;
    }
    .id-info p {
        margin: 2px 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .sig_nature {
        position: absolute;
        bottom: 6px;
        left: 10px;
        width: 40mm;
        font-size: 8px;
        text-align: center;
    }
    .sig_nature .line {
        display: block;
        width: 40mm;
        border-top: 1px solid black;
        margin: 0 auto 2px auto;
    }
    .logo {
        position: absolute;
        top: 3px;
        left: 5px;
        width: 15mm;
    }
    .right-logo {
        position: absolute;
        top: 3px;
        right: 5px;
        width: 15mm;
    }
    .bottom-logo {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 18mm;
        height: auto;
    }
    .header {
        font-size: 8px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .contact-info, .bullet {
        font-size: 9px;
        margin: 5px 0;
        text-align: left;
    }
    .signature {
        position: absolute;
        left: 50%;
        bottom: 10px;
        transform: translateX(-50%);
        width: 40mm;
        text-align: center;
        font-size: 9px;
        margin: 0;
    }
    .signature .line {
        display: block;
        width: 40mm;
        border-top: 1px solid black;
        margin: 0 auto 2px auto;
    }
    .btn, .back-btn {
        display: inline-block;
        margin: 10px 5px 0 5px;
        padding: 6px 10px;
        font-size: 12px;
        color: white;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 4px;
        transition: 0.3s;
        cursor: pointer;
        border: none;
    }
    .btn:hover, .back-btn:hover {
        background-color: #0056b3;
    }
    @media print {
        .btn, .back-btn {
            display: none !important;
        }
        body, html {
            background: white !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw;
            height: 100vh;
        }
        .container {
            width: 100vw;
            min-height: 0;
            align-items: flex-start;
            justify-content: flex-start;
        }
        .id-card {
            margin: 0 auto 0 auto !important;
            box-shadow: none !important;
            page-break-after: always;
        }
        .id-card:last-of-type {
            page-break-after: auto;
        }
    }
    </style>
</head>
<body>
    <a href="index.php" class="back-btn">Back</a>
    <div class="container">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $row): ?>
                <div class="id-card" id="idCardFront">
                    <img src="http://localhost/solo_parent/form/img/logo3.png" alt="Left Logo" class="logo">
                    <img src="http://localhost/solo_parent/form/img/logo4.jpg" alt="Right Logo" class="right-logo">
                    <div class="headerclass">
                        <span style="font-weight:bold;">REPUBLIC OF THE PHILIPPINES</span><br>
                        CITY OF CEBU<br>
                        DEPARTMENT OF SOCIAL WELFARE SERVICES
                    </div>
                    <div class="erp-title">ERPAT</div>
                    <div class="photo-box">PHOTO</div>
                    <div class="id-info"><br><br><br><br><br>
                        <p><strong>ID No:</strong> <?php echo htmlspecialchars($row->idno); ?></p>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($row->name); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($row->age); ?></p>
                        <p><strong>Sex:</strong> <?php echo htmlspecialchars($row->sex); ?></p>
                        <p><strong>Status:</strong> Active</p>
                    </div>
                    <div class="sig_nature">
                        <span class="line"></span>
                        SIGNATURE:
                    </div>
                    <div class="card">
                        <img src="http://localhost/solo_parent/form/img/logo1.png" alt="Below Logo" class="bottom-logo">
                    </div>
                </div>
                <?php echo $back_card; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No records found.</p>
        <?php endif; ?>
        <button class="btn" onclick="window.print()">Print ID (Front & Back)</button>
    </div>
</body>
</html>