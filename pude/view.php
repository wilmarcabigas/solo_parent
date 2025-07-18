<?php 
require_once "./util/dbhelper.php";
session_start(); // Start the session to access user role

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID is missing.";
    exit;
}

$db = new DbHelper();
$displayAll_Details = $db->Joiningtables($id);

// Fetch admin name if approved_by is set
$admin_name = '';
if (!empty($displayAll_Details) && !empty($displayAll_Details[0]->approved_by)) {
    $admin_id = $displayAll_Details[0]->approved_by;
    $conn = $db->getConnection();
    $stmt = $conn->prepare("SELECT fullname FROM users WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->bind_result($admin_name);
    $stmt->fetch();
    $stmt->close();
}

// Determine back button destination
$back_url = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ? 'index.php' : 'user_dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details - Solo Parent Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100">
    <div class="max-w-4xl mx-auto my-10 p-6 bg-white rounded-2xl shadow-2xl ring-1 ring-blue-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-700 tracking-tight mb-1">Solo Parent Application</h1>
            <p class="text-gray-500">Full Information</p>
        </div>

        <!-- Personal Details -->
        <div class="mb-10">
            <h2 class="text-xl font-bold text-purple-700 mb-4 border-b-2 border-purple-200 pb-2">Personal Details</h2>
            <table class="w-full mb-8 border border-gray-200 rounded">
                <tbody>
                    <?php foreach ($displayAll_Details as $row) : ?>
                        <tr class="even:bg-gray-50">
                            <th class="text-left py-2 px-4 font-medium w-1/3">ID NO</th>
                            <td class="py-2 px-4"><?= htmlspecialchars($row->id_no); ?></td>
                        </tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Name</th><td class="py-2 px-4"><?= htmlspecialchars($row->fullname); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Date of Birth</th><td class="py-2 px-4"><?= htmlspecialchars($row->date_of_birth); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Philsys Card Number</th><td class="py-2 px-4"><?= htmlspecialchars($row->philsys_card_number); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Age</th><td class="py-2 px-4"><?= htmlspecialchars($row->age); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Sex</th><td class="py-2 px-4"><?= htmlspecialchars($row->sex); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Religion</th><td class="py-2 px-4"><?= htmlspecialchars($row->religion); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Place of Birth</th><td class="py-2 px-4"><?= htmlspecialchars($row->place_of_birth); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Civil Status</th><td class="py-2 px-4"><?= htmlspecialchars($row->civil_status); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Educational Attainment</th><td class="py-2 px-4"><?= htmlspecialchars($row->educational_attainment); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Occupation</th><td class="py-2 px-4"><?= htmlspecialchars($row->occupation); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Monthly Income</th><td class="py-2 px-4"><?= htmlspecialchars($row->monthly_income); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Contact Number</th><td class="py-2 px-4"><?= htmlspecialchars($row->contact_number); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Email Address</th><td class="py-2 px-4"><?= htmlspecialchars($row->email_address); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Pantawid Beneficiary</th><td class="py-2 px-4"><?= htmlspecialchars($row->pantawid_beneficiary); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Indigenous Person</th><td class="py-2 px-4"><?= htmlspecialchars($row->indigenous_person); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Are you a Migrant Worker?</th><td class="py-2 px-4"><?= htmlspecialchars($row->are_you_a_migrant_worker); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">LGBTQ+</th><td class="py-2 px-4"><?= htmlspecialchars($row->lgbtq); ?></td></tr>
                        <tr class="even:bg-gray-50"><th class="text-left py-2 px-4 font-medium">Date Registered</th><td class="py-2 px-4"><?= htmlspecialchars($row->date_registered ?? ''); ?></td></tr>
                        <tr class="even:bg-gray-50">
                            <th class="text-left py-2 px-4 font-medium">Approved/Disapproved By</th>
                            <td class="py-2 px-4"><?= htmlspecialchars($admin_name ?: ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Family Members -->
        <div class="mb-10">
            <h2 class="text-xl font-bold text-purple-700 mb-4 border-b-2 border-purple-200 pb-2">Family Members</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded shadow-sm">
                    <thead>
                        <tr class="bg-blue-100 text-blue-900">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Age</th>
                            <th class="py-2 px-4">Relationship</th>
                            <th class="py-2 px-4">Sex</th>
                            <th class="py-2 px-4">Birthdate</th>
                            <th class="py-2 px-4">Civil Status</th>
                            <th class="py-2 px-4">Education</th>
                            <th class="py-2 px-4">Occupation</th>
                            <th class="py-2 px-4">Monthly Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($row->family_members)) : ?>
                            <?php foreach ($row->family_members as $family_member) : ?>
                                <tr class="even:bg-purple-50 hover:bg-purple-100 transition">
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['name']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['age']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['relationship']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['sex']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['birthdate']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['civil_status']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['educational_attainment']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['occupation']); ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($family_member['monthly_income']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="9" class="text-center py-4 text-gray-500">No family members found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-10">
            <p class="text-sm text-gray-600 mb-4 italic">NOTE: Include Family Member and other members of the household especially minor children. Use back side for additional members.</p>
            <h4 class="text-base font-semibold text-purple-700 mb-2">III. Classification/Circumstances of being a solo parent</h4>
            <?php if (!empty($row->family_members)): ?>
                <?php foreach ($row->family_members as $family_member): ?>
                    <div class="mb-6 p-4 border border-purple-200 rounded-lg bg-purple-50 shadow-sm">
                        <p><span class="font-semibold">Solo Parent Reason:</span> <span class="text-gray-700"><?= htmlspecialchars($family_member['solo_parent_reason']); ?></span></p>
                        <h4 class="mt-4 font-semibold text-purple-700">IV. Needs/Problems of being a solo parent</h4>
                        <p><span class="font-semibold">Solo Parent Needs:</span> <span class="text-gray-700"><?= htmlspecialchars($family_member['solo_parent_needs']); ?></span></p>
                        <h5 class="mt-4 font-semibold text-blue-700">V. IN CASE OF EMERGENCY</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <p><span class="font-semibold">Name:</span> <?= htmlspecialchars($family_member['emer_name']); ?></p>
                            <p><span class="font-semibold">Relationship:</span> <?= htmlspecialchars($family_member['emer_relationship']); ?></p>
                            <p><span class="font-semibold">Address:</span> <?= htmlspecialchars($family_member['emer_address']); ?></p>
                            <p><span class="font-semibold">Contact Number:</span> <?= htmlspecialchars($family_member['emer_contact_num']); ?></p>
                        </div>
                        <h5 class="mt-4 text-center font-semibold text-blue-700">FOR SPD/SPO USE ONLY</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <p><span class="font-semibold">Solo Parent Card Number:</span> <?= htmlspecialchars($family_member['solo_parent_card_number']); ?></p>
                            <p><span class="font-semibold">Date Issuance:</span> <?= htmlspecialchars($family_member['date_issuances']); ?></p>
                            <p><span class="font-semibold">Solo Parent Category:</span> <?= htmlspecialchars($family_member['solo_parent_category']); ?></p>
                            <p><span class="font-semibold">Beneficiary Code:</span> <?= htmlspecialchars($family_member['beneficiary_code']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">No family members found.</p>
            <?php endif; ?>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 justify-center mt-8">
            <a href="edit_form.php?id=<?= $row->id ?>" class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">Update</a>
            <a href="<?= $back_url ?>" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">Back</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="update_status.php?id=<?= $row->id ?>&status=approved" class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow"
                   onclick="return confirm('Approve this application?');">Approve</a>
                <a href="update_status.php?id=<?= $row->id ?>&status=dis-approved" class="btn btn-warning bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded shadow"
                   onclick="return confirm('Disapprove this application?');">Disapprove</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>