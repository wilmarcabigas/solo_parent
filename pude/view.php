<?php 
require_once "./util/dbhelper.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

} else {
    echo "ID is missing.";
    exit;
}



$db = new DbHelper();
$displayAll_Details = $db->Joiningtables($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details - Solo Parent Application</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            margin: 0;
            color: #007BFF;
        }

        .header h4 {
            font-weight: normal;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f4f7;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-container {
            text-align: center;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color:rgb(149, 35, 31)5;
        }

        .btn:hover {
            opacity: 0.9;
        }
         .btn-container {
        text-align: center;
        margin-top: 2rem;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    .btn {
        display: inline-block;
        padding: 10px 24px;
        text-decoration: none;
        color: #fff;
        border-radius: 5px;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 6px rgba(0,0,0,0.07);
    }
    .btn-primary {
        background-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #a71d2a;
    }
    .btn-success {
        background-color: #28a745;
    }
    .btn-success:hover {
        background-color: #1e7e34;
    }
    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        color: #212529;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            
            <h1>Application Form for Solo Parent</h1>
        </div>

        <!-- Personal Details -->
        <h2>Personal Details</h2>
        <table>
            <tbody>
                <?php foreach ($displayAll_Details as $row) : ?>
                    <tr><th>ID NO</th><td><?= htmlspecialchars($row->id_no); ?></td></tr>
                    <tr><th>Name</th><td><?= htmlspecialchars($row->fullname); ?></td></tr>
                    <tr><th>Date of Birth</th><td><?= htmlspecialchars($row->date_of_birth); ?></td></tr>
                    <tr><th>Philsys Card Number</th><td><?= htmlspecialchars($row->philsys_card_number); ?></td></tr>
                    <tr><th>Age</th><td><?= htmlspecialchars($row->age); ?></td></tr>
                    <tr><th>Sex</th><td><?= htmlspecialchars($row->sex); ?></td></tr>
                    <tr><th>Religion</th><td><?= htmlspecialchars($row->religion); ?></td></tr>
                    <tr><th>Place of Birth</th><td><?= htmlspecialchars($row->place_of_birth); ?></td></tr>
                    <tr><th>Civil Status</th><td><?= htmlspecialchars($row->civil_status); ?></td></tr>
                    <tr><th>Educational Attainment</th><td><?= htmlspecialchars($row->educational_attainment); ?></td></tr>
                    <tr><th>Occupation</th><td><?= htmlspecialchars($row->occupation); ?></td></tr>
                    <tr><th>Monthly Income</th><td><?= htmlspecialchars($row->monthly_income); ?></td></tr>
                    <tr><th>Contact Number</th><td><?= htmlspecialchars($row->contact_number); ?></td></tr>
                    <tr><th>Email Address</th><td><?= htmlspecialchars($row->email_address); ?></td></tr>
                    <tr><th>Pantawid Beneficiary</th><td><?= htmlspecialchars($row->pantawid_beneficiary); ?></td></tr>
                    <tr><th>Indigenous Person</th><td><?= htmlspecialchars($row->indigenous_person); ?></td></tr>
                    <tr><th>Are you a Migrant Worker?</th><td><?= htmlspecialchars($row->are_you_a_migrant_worker); ?></td></tr>
                    <tr><th>LGBTQ+</th><td><?= htmlspecialchars($row->lgbtq); ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Family Members -->
        <h2>Family Members</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Relationship</th>
                    <th>Sex</th>
                    <th>Birthdate</th>
                    <th>Civil Status</th>
                    <th>Education</th>
                    <th>Occupation</th>
                    <th>Monthly Income</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($row->family_members)) : ?>
                    <?php foreach ($row->family_members as $family_member) : ?>
                        <tr>
                            <td><?= htmlspecialchars($family_member['name']); ?></td>
                            <td><?= htmlspecialchars($family_member['age']); ?></td>
                            <td><?= htmlspecialchars($family_member['relationship']); ?></td>
                            <td><?= htmlspecialchars($family_member['sex']); ?></td>
                            <td><?= htmlspecialchars($family_member['birthdate']); ?></td>
                            <td><?= htmlspecialchars($family_member['civil_status']); ?></td>
                            <td><?= htmlspecialchars($family_member['educational_attainment']); ?></td>
                            <td><?= htmlspecialchars($family_member['occupation']); ?></td>
                            <td><?= htmlspecialchars($family_member['monthly_income']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="9" style="text-align: center;">No family members found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <p>NOTE: Include Family Member and other members of the household especially minor children. Use back side for additional members.</p>
<br>
        <h4>III. Classification/Circumstances of being a solo parent(Dahilan bakit solo parent)?</h4>

        
        
        <!-- First Table: Personal Details -->
        <table>
           
        <?php if (!empty($row->family_members)): ?>
    <?php foreach ($row->family_members as $family_member): ?>
        <div class="family-member">
            <p><strong>Solo Parent Reason:</strong> <?= htmlspecialchars($family_member['solo_parent_reason']); ?></p><br><br>
            <h4>IV. Needs/Problems of being a solo parent(Kinakailangan/Problema ng isang solo parent)?</h4>
            <p><strong>Solo Parent Needs:</strong> <?= htmlspecialchars($family_member['solo_parent_needs']); ?></p><br><br>
            <h5>V. IN CASE OF EMERGENCY</h5>
            <p><strong> Name:</strong> <?= htmlspecialchars($family_member['emer_name']); ?></p>
            <p><strong> Relationship:</strong> <?= htmlspecialchars($family_member['emer_relationship']); ?></p>
            <p><strong> Address:</strong> <?= htmlspecialchars($family_member['emer_address']); ?></p>
            <p><strong> Contact Number:</strong> <?= htmlspecialchars($family_member['emer_contact_num']); ?></p><br><br>
            <h5 style="text-align:center;">FOR SPD/SPO USE ONLY</h5>
            <p><strong>Solo Parent Card Number:</strong> <?= htmlspecialchars($family_member['solo_parent_card_number']); ?></p>
            <p><strong>Date Issuance:</strong> <?= htmlspecialchars($family_member['date_issuances']); ?></p>
            <p><strong>Solo Parent Category:</strong> <?= htmlspecialchars($family_member['solo_parent_category']); ?></p>
            <p><strong>Beneficiary Code:</strong> <?= htmlspecialchars($family_member['beneficiary_code']); ?></p>
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="4">No family members found.</td></tr>
<?php endif; ?>

            
        </table>



        <!-- Action Buttons -->
        <div class="btn-container">
    <a href="edit_form.php?id=<?= $row->id ?>" class="btn btn-primary">Update</a>
    <a href="index.php" class="btn btn-danger">Back</a>
    <a href="update_status.php?id=<?= $row->id ?>&status=approved" class="btn btn-success"
       onclick="return confirm('Approve this application?');">Approve</a>
    <a href="update_status.php?id=<?= $row->id ?>&status=dis-approved" class="btn btn-warning"
       onclick="return confirm('Disapprove this application?');">Disapprove</a>
</div>
    </div>
</body>
</html>
