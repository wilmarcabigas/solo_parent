<?php
require_once "dbhelper.php";

// Validate 'id' from GET request
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "No valid ID provided.";
    exit();
}

$id = (int) $_GET["id"]; // Ensure it's an integer
$results = Joiningtables($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERPAT ID Card</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        position: relative;
    }

    .back-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 6px 10px;
        font-size: 12px;
        color: white;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 4px;
        transition: 0.3s;
    }
    .back-btn:hover {
        background-color: #0056b3;
    }

    .container {
        text-align: center;
    }

    .id-card {
        width: 86mm;
        height: 54mm;
        border: 2px solid #000;
        border-radius: 8px;
        padding: 6px;
        background-color: white;
        position: relative;
        display: inline-block;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        font-size: 10px;
    }

    .header {
        text-align: center;
        font-size: 8px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .erp-title {
        text-align: center;
        color: red;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
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

    .signature {
        position: absolute;
        bottom: 6px;
        left: 6px;
        font-size: 8px;
    }

    .signature .line {
        display: block;
        width: 50mm;
        border-top: 1px solid black;
        margin-top: 2px;
    }

    .logo {
        position: absolute;
        top: 3px;
        left: 5px;
        width: 18mm;
    }

    .right-logo {
        position: absolute;
        top: 3px;
        right: 5px;
        width: 18mm;
    }
    .bottom-logo {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 18mm; 
        height: auto;
    }

    .btn {
        display: inline-block;
        margin-top: 10px;
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

    .btn:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
    <a href="index.php" class="back-btn">Back</a>
    <div class="container">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $row): ?>
                <div class="id-card" id="idCard">
                    <img src="http://localhost/solo_parent/form/img/logo3.png" alt="Left Logo" class="logo">
                    <img src="http://localhost/solo_parent/form/img/logo4.jpg" alt="Right Logo" class="right-logo">
                    
                    <div class="header">
                        REPUBLIC OF THE PHILIPPINES<br>
                        CITY OF CEBU<br>
                        DEPARTMENT OF SOCIAL WELFARE SERVICES
                    </div><br><br>
                    <div class="erp-title">ERPAT</div>

                    <div class="photo-box">PHOTO</div>

                    <div class="id-info"><br><br><br><br><br>
                        <p><strong>ID No:</strong> <?php echo htmlspecialchars($row->idno); ?></p>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($row->name); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($row->age); ?></p>
                        <p><strong>Sex:</strong> <?php echo htmlspecialchars($row->sex); ?></p>
                        <p><strong>Status:</strong> Active</p>
                    </div>

                    <div class="signature">
                        SIGNATURE:<br><span class="line"></span>
                    </div>
                    <div class="card">
                        <img src="http://localhost/solo_parent/form/img/logo1.png" alt="Below Logo" class="bottom-logo">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No records found.</p>
        <?php endif; ?>

        <br>
        <a href="back_id.php?id=<?php echo $id; ?>" class="btn">View Back of ID</a>
        <button class="btn" onclick="printID()">Print ID</button>
    </div>

    <script>
    function printID() {
        var printContents = document.getElementById("idCard").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
</body>
</html>
