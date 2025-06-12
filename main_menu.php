<?php
// Connect to your database
require_once "pude/util/dbhelper.php";
$db = new DbHelper();

$conn = $db->getConnection();
$total_members = $conn->query("SELECT COUNT(*) FROM solo_parent")->fetch_row()[0];
$total_men = $conn->query("SELECT COUNT(*) FROM solo_parent WHERE sex = 'Male'")->fetch_row()[0];
$total_women = $conn->query("SELECT COUNT(*) FROM solo_parent WHERE sex = 'Female'")->fetch_row()[0];
$new_members_month = $conn->query("SELECT COUNT(*) FROM solo_parent WHERE MONTH(date_registered) = MONTH(CURRENT_DATE()) AND YEAR(date_registered) = YEAR(CURRENT_DATE())")->fetch_row()[0];
$pending_members = $conn->query("SELECT COUNT(*) FROM solo_parent WHERE status = 'pending'")->fetch_row()[0];

// Registrations per month (current year)
$monthly_counts = [];
$months = [];
for ($m = 1; $m <= 12; $m++) {
    $monthName = date('M', mktime(0, 0, 0, $m, 10));
    $months[] = $monthName;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM solo_parent WHERE MONTH(date_registered) = ? AND YEAR(date_registered) = YEAR(CURRENT_DATE())");
    $stmt->bind_param("i", $m);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $monthly_counts[] = $count;
    $stmt->close();
}

// Men vs Women
$men_count = $total_men;
$women_count = $total_women;
?>
<html>
<head>
    <title>Solo Parent Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-60 bg-green-800 text-white h-screen p-5 shadow-lg fixed top-0 left-0">
    <h2 class="text-center text-2xl font-bold mb-8">Menu</h2>
    <a href="/solo_parent/pude/index.php" class="block py-2 px-4 mb-4 rounded hover:bg-white hover:text-black">
        <i class="fas fa-user mr-2"></i> Solo Parent
    </a>
    <a href="../solo_parent/form/index.php" class="block py-2 px-4 mb-4 rounded hover:bg-white hover:text-black">
        <i class="fas fa-clipboard-list mr-2"></i> Registration Form
    </a>
</div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ml-60">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Total Members -->
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-green-700 mb-2"><i class="fas fa-users"></i></div>
                    <div class="text-2xl font-bold"><?= $total_members ?? 0 ?></div>
                    <div class="text-gray-600 mt-1">Total Members</div>
                </div>
                <!-- Men Solo Parents -->
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-2"><i class="fas fa-male"></i></div>
                    <div class="text-2xl font-bold"><?= $total_men ?? 0 ?></div>
                    <div class="text-gray-600 mt-1">Men Solo Parents</div>
                </div>
                <!-- Women Solo Parents -->
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-pink-500 mb-2"><i class="fas fa-female"></i></div>
                    <div class="text-2xl font-bold"><?= $total_women ?? 0 ?></div>
                    <div class="text-gray-600 mt-1">Women Solo Parents</div>
                </div>
                <!-- New Members This Month -->
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-yellow-500 mb-2"><i class="fas fa-user-plus"></i></div>
                    <div class="text-2xl font-bold"><?= $new_members_month ?? 0 ?></div>
                    <div class="text-gray-600 mt-1">New This Month</div>
                </div>
                <!-- Pending Applications -->
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-gray-500 mb-2"><i class="fas fa-hourglass-half"></i></div>
                    <div class="text-2xl font-bold"><?= $pending_members ?? 0 ?></div>
                    <div class="text-gray-600 mt-1">Pending Applications</div>
                </div>
            </div>

            <!-- Graphs Section -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Bar Chart: Registrations per Month -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-4 text-gray-700">Registrations in (<?= date('Y') ?>)</h2>
                    <canvas id="monthlyChart" height="120"></canvas>
                </div>
                <!-- Pie Chart: Men vs Women -->
                <div class="bg-white rounded-lg shadow p-20">
                    <h2 class="text-xl font-bold mb-4 text-gray-700">GENDER PREFERENCES</h2>
                    <canvas id="genderChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Bar Chart: Registrations per Month
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($months) ?>,
                datasets: [{
                    label: 'Registrations',
                    data: <?= json_encode($monthly_counts) ?>,
                    backgroundColor: '#38bdf8'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });

        // Pie Chart: Men vs Women
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: ['Men', 'Women'],
                datasets: [{
                    data: [<?= $men_count ?>, <?= $women_count ?>],
                    backgroundColor: ['#2563eb', '#f472b6']
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</body>
</html>