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
    <title>QR View - Solo Parent Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100">
    <div class="max-w-4xl mx-auto my-10 p-6 bg-white rounded-2xl shadow-2xl ring-1 ring-blue-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-700 tracking-tight mb-1">Solo Parent Application</h1>

        </div>

        <!-- Personal Details -->
        <div class="mb-10">
            <h2 class="text-xl font-bold text-purple-700 mb-4 border-b-2 border-purple-200 pb-2">Personal Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                <?php foreach ($displayAll_Details as $row) : ?>
                    <div>
                        <span class="font-semibold text-gray-700">ID NO:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->id_no); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Name:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->fullname); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Date of Birth:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->date_of_birth); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Philsys Card Number:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->philsys_card_number); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Age:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->age); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Sex:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->sex); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Religion:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->religion); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Place of Birth:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->place_of_birth); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Civil Status:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->civil_status); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Educational Attainment:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->educational_attainment); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Occupation:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->occupation); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Monthly Income:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->monthly_income); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Contact Number:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->contact_number); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Email Address:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->email_address); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Pantawid Beneficiary:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->pantawid_beneficiary); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Indigenous Person:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->indigenous_person); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Migrant Worker:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->are_you_a_migrant_worker); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">LGBTQ+:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->lgbtq); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Date Registered:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->date_registered ?? ''); ?></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Approved/Disapproved By:</span>
                        <span class="ml-2 text-gray-900"><?= htmlspecialchars($row->approved_by ?? ''); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
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
    </div>
</body>
</html>