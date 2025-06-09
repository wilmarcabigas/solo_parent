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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child/Dependent Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
            
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            border: 1px solid black;
            padding: 20px;
            background-color: white;
            width: 420px;
            height: 320px;
            overflow: auto;
            border: gray;
        }

        .child {
            border: none;
            padding: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: white;
        }

        .emergency-info {
            margin-bottom: 5px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .signature-section div {
            text-align: center;
        }

        .signature {
            height: 50px;
            margin-bottom: 10px;
        }

        .case_emer {
            margin-top: 25px;
        }

        .button-container {
            width: 100%;
            max-width: 450px;
            text-align: left;
            margin-top: 20px;
            
        }

        button {
            height: 35px;
            width: 70px;
            border-radius: 6px;
            background-color: green;
            color: white;
            border: none;
            margin-right: px;
        }
        .hon{
            margin-top: 20px;
            font-size: medium;
            font-family: arial, bold;
            margin-bottom: none;
        }
        .portia{
            margin-top: 20px;
            font-size: medium;
            font-family: arial, bold;
            margin-bottom: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Container -->
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th class="child" colspan="4">CHILD/REN/DEPENDENT/S</th>
                    </tr>
                    <tr>
                        <th>NAME</th>
                        <th>DATE OF BIRTH</th>
                        <th>AGE</th>
                        <th>RELATIONSHIP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dependents)): ?>
                        <?php foreach ($dependents as $dependent): ?>
                            <tr>
                                <td style="text-align: center;"><?php echo htmlspecialchars($dependent['name']); ?></td>
                                <td style="text-align: center;"><?php echo htmlspecialchars($dependent['birthdate']); ?></td>
                                <td style="text-align: center;"><?php echo htmlspecialchars($dependent['age']); ?></td>
                                <td style="text-align: center;"><?php echo htmlspecialchars($dependent['relationship']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">No dependents found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="emergency-info">
                <p class="case_emer"><strong>IN CASE OF EMERGENCY:</strong></p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <p style="margin: 0; margin-right: 10px;"><strong>Name:</strong> <?php echo htmlspecialchars($dependent['emer_name']); ?></p>
                    <p style="margin: 0;"><strong>Contact Number:</strong> <?php echo htmlspecialchars($dependent['emer_contact_num']); ?></p>
                </div>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($dependent['emer_address']); ?></p>
            </div>

            <div class="signature-section">
                <div>
                    <p class="hon"><u>HON. RAYMOND ALVIN N. GARCIA</u></p>
                    <p>CITY MAYOR</p>
                </div>
                <div>
                    <p class="portia"><u>PORTIA C. BASMAYOR, RSW</u></p>
                    <p>OIC-DSWS</p>
                </div>
            </div>
        </div>

        <!-- Button Below Container -->
        <div class="button-container">
            <a href="index.php">
                <button type="submit" class="btn btn-success" name="submit">
                    Back
                </button>
            </a>
            <button onclick="window.print()" class="btn btn-primary" style="margin-left: 10px;">Print</button>

        </div>
    </div>
</body>

</html>
