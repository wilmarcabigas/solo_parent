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
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        font-size: 10px;
        text-align: center;
        position: relative;
    }

    .header {
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

    .signature {
        position: absolute;
        bottom: 6px;
        left: 10px;
        width: 40mm;
        font-size: 8px;
        text-align: center;
    }

    .signature .line {
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

    .btn {
        display: inline-block;
        margin: 5px 5px 0 5px;
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

    @media print {
        .btn, .back-btn {
            display: none !important;
        }

        body {
            background-color: white;
            height: auto;
        }

        .container {
            display: block !important;
        }

        .id-card {
            margin-bottom: 0 !important;
            box-shadow: none;
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
                    
                    <div class="header">
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

                    <div class="signature">
                        <span class="line"></span>
                        SIGNATURE:
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
    const id = <?php echo json_encode($id); ?>;

    fetch('back_id.php?id=' + id + '&print=1')
        .then(response => response.text())
        .then(backHtml => {
            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>ERPAT ID Card Print</title>
                    <style>
                        body {
                            margin: 0;
                            padding: 0;
                            font-family: Arial, sans-serif;
                        }
                        .print-page {
                            height: 100vh;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            align-items: center;
                            page-break-after: always;
                        }
                        .id-card {
                            width: 86mm;
                            height: 54mm;
                            border: 2px solid #000;
                            border-radius: 8px;
                            padding: 6px;
                            background-color: white;
                            position: relative;
                            margin: 10px auto;
                            font-size: 10px;
                        }
                        .front-card {
                            margin-top: 100px;
                        }
                        .back-card {
                            margin-bottom: 20px;
                            margin-top: 10px;
                        }
                        
                        ${document.querySelector('style').innerHTML}
                        
                        @media print {
                            body {
                            height: auto;
                            background: white;
                            margin: 0;
                            padding: 0;
                            }
                            .print-page {
                                page-break-after: always;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="print-page">
                        <div class="front-card">
                            ${document.getElementById('idCardFront').outerHTML}
                        </div>
                            ${backHtml}
                        </div>
                    </div>
                    <script>
                        window.onload = function() {
                            setTimeout(function() {
                                window.print();
                                window.close();
                            }, 200);
                        };
                    <\/script>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.focus();
        })
        .catch(error => {
            console.error('Error fetching back ID:', error);
        });
}
</script>
</body>
</html>
