<?php
session_start();
include "data_connect.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in/login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

// Validate and get the parent entry ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID is not provided in the URL.");
}
$parent_id = intval($_GET['id']);

// Fetch the solo_parent record (for ownership/admin check)
$sql = "SELECT * FROM `solo_parent` WHERE id = $parent_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$parent = mysqli_fetch_assoc($result);

if (!$parent || ($parent['user_id'] != $user_id && (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'))) {
    die("You are not authorized to edit this entry.");
}

// Fetch all family members for this solo parent
$sql = "SELECT * FROM familymembers WHERE user_id = $parent_id";
$result = mysqli_query($conn, $sql);
$family_members = [];
while ($row = mysqli_fetch_assoc($result)) {
    $family_members[] = $row;
}

// Fetch extra fields from the first family member (if exists)
$extra = [
    'solo_parent_reason' => '',
    'solo_parent_needs' => '',
    'emer_name' => '',
    'emer_relationship' => '',
    'emer_address' => '',
    'emer_contact_num' => '',
    'solo_parent_card_number' => '',
    'date_issuances' => '',
    'solo_parent_category' => '',
    'beneficiary_code' => ''
];
if (count($family_members) > 0) {
    foreach ($extra as $key => $val) {
        if (isset($family_members[0][$key])) {
            $extra[$key] = $family_members[0][$key];
        }
    }
}

// Handle update (all in one form)
if (isset($_POST['update'])) {
    // Update family members
    $member_ids = $_POST['member_id'] ?? [];
    $names = $_POST['name'] ?? [];
    $sexes = $_POST['sex'] ?? [];
    $relationships = $_POST['relationship'] ?? [];
    $ages = $_POST['age'] ?? [];
    $birthdates = $_POST['birthdate'] ?? [];
    $civil_statuses = $_POST['civil_status'] ?? [];
    $educational_attainments = $_POST['educational_attainment'] ?? [];
    $occupations = $_POST['occupation'] ?? [];
    $monthly_incomes = $_POST['monthly_income'] ?? [];

    $solo_parent_reason = mysqli_real_escape_string($conn, $_POST['solo_parent_reason']);
    $solo_parent_needs = mysqli_real_escape_string($conn, $_POST['solo_parent_needs']);
    $emer_name = mysqli_real_escape_string($conn, $_POST['emer_name']);
    $emer_relationship = mysqli_real_escape_string($conn, $_POST['emer_relationship']);
    $emer_address = mysqli_real_escape_string($conn, $_POST['emer_address']);
    $emer_contact_num = mysqli_real_escape_string($conn, $_POST['emer_contact_num']);
    $date_issuances = mysqli_real_escape_string($conn, $_POST['date_issuances']);
    $solo_parent_category = mysqli_real_escape_string($conn, $_POST['solo_parent_category']);
    $beneficiary_code = mysqli_real_escape_string($conn, $_POST['beneficiary_code']);
    $solo_parent_card_number = mysqli_real_escape_string($conn, $_POST['solo_parent_card_number']);

    for ($i = 0; $i < count($member_ids); $i++) {
        $member_id = intval($member_ids[$i]);
        $name = mysqli_real_escape_string($conn, $names[$i]);
        $sex = mysqli_real_escape_string($conn, $sexes[$i]);
        $relationship = mysqli_real_escape_string($conn, $relationships[$i]);
        $age = (int)($ages[$i]);
        $birthdate = mysqli_real_escape_string($conn, $birthdates[$i]);
        $civil_status = mysqli_real_escape_string($conn, $civil_statuses[$i]);
        $educational_attainment = mysqli_real_escape_string($conn, $educational_attainments[$i]);
        $occupation = mysqli_real_escape_string($conn, $occupations[$i]);
        $monthly_income = (float)($monthly_incomes[$i]);

        $sql = "UPDATE familymembers SET 
            name='$name', sex='$sex', relationship='$relationship', age='$age', birthdate='$birthdate',
            civil_status='$civil_status', educational_attainment='$educational_attainment',
            occupation='$occupation', monthly_income='$monthly_income',
            solo_parent_reason='$solo_parent_reason', solo_parent_needs='$solo_parent_needs',
            emer_name='$emer_name', emer_relationship='$emer_relationship', emer_address='$emer_address',
            emer_contact_num='$emer_contact_num', solo_parent_card_number='$solo_parent_card_number',
            date_issuances='$date_issuances', solo_parent_category='$solo_parent_category',
            beneficiary_code='$beneficiary_code'
            WHERE id=$member_id AND user_id=$parent_id";
        mysqli_query($conn, $sql);
    }
    header("Location: edit_form2.php?id=$parent_id&msg=Updated successfully");
    exit();
}

// Handle delete family member
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM familymembers WHERE id = $delete_id AND user_id = $parent_id");
    header("Location: edit_form2.php?id=$parent_id");
    exit();
}

// Handle add new family member
if (isset($_POST['add_member'])) {
    $name = mysqli_real_escape_string($conn, $_POST['add_name']);
    $sex = mysqli_real_escape_string($conn, $_POST['add_sex']);
    $relationship = mysqli_real_escape_string($conn, $_POST['add_relationship']);
    $age = mysqli_real_escape_string($conn, $_POST['add_age']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['add_birthdate']);
    $civil_status = mysqli_real_escape_string($conn, $_POST['add_civil_status']);
    $educational_attainment = mysqli_real_escape_string($conn, $_POST['add_educational_attainment']);
    $occupation = mysqli_real_escape_string($conn, $_POST['add_occupation']);
    $monthly_income = mysqli_real_escape_string($conn, $_POST['add_monthly_income']);

    // Use the latest extra fields
    $sql = "INSERT INTO familymembers 
        (user_id, name, sex, relationship, age, birthdate, civil_status, educational_attainment, occupation, monthly_income,
        solo_parent_reason, solo_parent_needs, emer_name, emer_relationship, emer_address, emer_contact_num,
        solo_parent_card_number, date_issuances, solo_parent_category, beneficiary_code)
        VALUES
        ($parent_id, '$name', '$sex', '$relationship', '$age', '$birthdate', '$civil_status', '$educational_attainment', '$occupation', '$monthly_income',
        '{$extra['solo_parent_reason']}', '{$extra['solo_parent_needs']}', '{$extra['emer_name']}', '{$extra['emer_relationship']}', '{$extra['emer_address']}', '{$extra['emer_contact_num']}',
        '{$extra['solo_parent_card_number']}', '{$extra['date_issuances']}', '{$extra['solo_parent_category']}', '{$extra['beneficiary_code']}')";
    mysqli_query($conn, $sql);
    header("Location: edit_form2.php?id=$parent_id");
    exit();
}

// Dashboard link logic
$dashboard = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
    ? 'index.php'
    : 'user_dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Family Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container { max-width: 1300px; margin: 0 auto; padding: 20px; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; }
    </style>
</head>
<body>
<div class="container">
    <h3>II. Household Composition (Edit Family Members)</h3>
    <form action="" method="POST">
        <table id="formTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Relationship</th>
                    <th>Age</th>
                    <th>Birthdate</th>
                    <th>Civil Status</th>
                    <th>Educational Attainment</th>
                    <th>Occupation</th>
                    <th>Monthly Income</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($family_members) > 0): ?>
                <?php foreach ($family_members as $i => $member): ?>
                <tr>
                    <td>
                        <input type="hidden" name="member_id[]" value="<?= $member['id'] ?>">
                        <input type="text" class="form-control" name="name[]" value="<?= htmlspecialchars($member['name']) ?>" required>
                    </td>
                    <td>
                        <select name="sex[]" class="form-select" required>
                            <option value="Male" <?= $member['sex']=='Male'?'selected':'' ?>>Male</option>
                            <option value="Female" <?= $member['sex']=='Female'?'selected':'' ?>>Female</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="relationship[]" value="<?= htmlspecialchars($member['relationship']) ?>" required></td>
                    <td><input type="number" class="form-control" name="age[]" value="<?= htmlspecialchars($member['age']) ?>" min="0" required></td>
                    <td><input type="date" class="form-control" name="birthdate[]" value="<?= htmlspecialchars($member['birthdate']) ?>" required></td>
                    <td>
                        <select name="civil_status[]" class="form-select" required>
                            <option value="Single" <?= $member['civil_status']=='Single'?'selected':'' ?>>Single</option>
                            <option value="Married" <?= $member['civil_status']=='Married'?'selected':'' ?>>Married</option>
                            <option value="Widowed" <?= $member['civil_status']=='Widowed'?'selected':'' ?>>Widowed</option>
                            <option value="Divorced" <?= $member['civil_status']=='Divorced'?'selected':'' ?>>Divorced</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="educational_attainment[]" value="<?= htmlspecialchars($member['educational_attainment']) ?>" required></td>
                    <td><input type="text" class="form-control" name="occupation[]" value="<?= htmlspecialchars($member['occupation']) ?>" required></td>
                    <td><input type="number" class="form-control" name="monthly_income[]" value="<?= htmlspecialchars($member['monthly_income']) ?>" min="0" step="0.01" required></td>
                    <td>
                        <a href="edit_form2.php?id=<?= $parent_id ?>&delete=<?= $member['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this member?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="10" class="text-center">No family members found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- Add New Family Member Inline -->
        <div class="row g-3 mb-4 align-items-end">
            <div class="col-md-3">
                <input type="text" name="add_name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-2">
                <select name="add_sex" class="form-select">
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="add_relationship" class="form-control" placeholder="Relationship">
            </div>
            <div class="col-md-1">
                <input type="number" name="add_age" class="form-control" placeholder="Age">
            </div>
            <div class="col-md-2">
                <input type="date" name="add_birthdate" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="add_civil_status" class="form-control" placeholder="Civil Status">
            </div>
            <div class="col-md-2">
                <input type="text" name="add_educational_attainment" class="form-control" placeholder="Education">
            </div>
            <div class="col-md-2">
                <input type="text" name="add_occupation" class="form-control" placeholder="Occupation">
            </div>
            <div class="col-md-2">
                <input type="number" name="add_monthly_income" class="form-control" placeholder="Income">
            </div>
            <div class="col-md-2">
                <button type="submit" name="add_member" class="btn btn-success">Add</button>
            </div>
        </div>

        <h5>III. Classification/Circumstances of being a solo parent</h5>
        <textarea id="solo_parent_reason" name="solo_parent_reason" rows="4" class="form-control mb-3" placeholder="Type here..."><?= htmlspecialchars($extra['solo_parent_reason']) ?></textarea>
        <h5>IV. Needs/Problems of being a solo parent</h5>
        <textarea id="solo_parent_needs" name="solo_parent_needs" rows="4" class="form-control mb-3" placeholder="Type here..."><?= htmlspecialchars($extra['solo_parent_needs']) ?></textarea>
        <h5>V. IN CASE OF EMERGENCY</h5>
        <div class="row">
            <div class="col-sm-6 mb-2">
                <label class="form-label">Name:</label>
                <input type="text" class="form-control" name="emer_name" value="<?= htmlspecialchars($extra['emer_name']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Relationship:</label>
                <input type="text" class="form-control" name="emer_relationship" value="<?= htmlspecialchars($extra['emer_relationship']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Address:</label>
                <input type="text" class="form-control" name="emer_address" value="<?= htmlspecialchars($extra['emer_address']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Contact Number/s:</label>
                <input type="text" class="form-control" name="emer_contact_num" value="<?= htmlspecialchars($extra['emer_contact_num']) ?>">
            </div>
        </div>
        <h5 class="mt-4 text-center">FOR SPD/SPO USE ONLY</h5>
        <div class="row">
            <div class="col-sm-6 mb-2">
                <label class="form-label">Solo Parent Identification Card Number:</label>
                <input type="number" class="form-control" name="solo_parent_card_number" value="<?= htmlspecialchars($extra['solo_parent_card_number']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Date Issuances:</label>
                <input type="date" class="form-control" name="date_issuances" value="<?= htmlspecialchars($extra['date_issuances']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Solo Parent Category:</label>
                <input type="text" class="form-control" name="solo_parent_category" value="<?= htmlspecialchars($extra['solo_parent_category']) ?>">
            </div>
            <div class="col-sm-6 mb-2">
                <label class="form-label">Beneficiary Code:</label>
                <input type="text" class="form-control" name="beneficiary_code" value="<?= htmlspecialchars($extra['beneficiary_code']) ?>">
            </div>
        </div>
        <div class="d-flex justify-content-start mt-3">
            <a href="edit_form.php?id=<?= $parent_id ?>" class="btn btn-secondary me-2">Back</a>
            <button type="submit" name="update" class="btn btn-primary">Update All</button>
        </div>
    </form>
    <a href="<?= $dashboard ?>" class="btn btn-success mt-3">Dashboard</a>
</div>
</body>
</html>