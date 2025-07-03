<?php
session_start();
// Connect to your database
require_once "pude/util/dbhelper.php";
$db = new DbHelper();


if (
    !isset($_SESSION["user_id"]) ||
    !isset($_SESSION["role"]) ||
    $_SESSION["role"] !== "admin"
) {
    header("Location: /solo_parent/pude/log_in/login.php");
    exit();
}
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Parent Dashboard</title>
    <link rel="stylesheet" href="css/styleout.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="sidebar w-60 bg-green-800 text-white h-screen p-5 shadow-lg fixed top-0 left-0 flex flex-col">
        <div class="sidebar-header flex items-center justify-between mb-8">
            <h1 class="text-white text-xl font-bold">Solo Parent</h1>
            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-purple-600 font-bold">
                SP
            </div>
        </div>
        <div class="sidebar-menu flex-1 flex flex-col space-y-2">
            <!-- Keep your original buttons -->
            <a href="/solo_parent/pude/index.php" class="block py-2 px-4 rounded hover:bg-white hover:text-black">
                <i class="fas fa-user mr-2"></i> Solo Parent
            </a>
            <a href="../solo_parent/form/index.php" class="block py-2 px-4 rounded hover:bg-white hover:text-black">
                <i class="fas fa-clipboard-list mr-2"></i> Registration Form
            </a>
            <!-- Add new dashboard menu items -->
            <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded bg-green-900">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-green-900">
                <i class="fas fa-users"></i>
                <span>Members</span>
                </a>
            
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content ml-60 p-10">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Overview</h1>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="fas fa-bell text-gray-600 text-xl cursor-pointer"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full pulse"></span>
                </div>
                <div class="flex items-center space-x-2 relative group">
    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold cursor-pointer">
        SP
    </div>
    <span class="font-medium cursor-pointer">Admin</span>
    <!-- Dropdown on hover -->
    <div class="absolute right-0 mt-12 w-32 bg-white rounded shadow-lg z-50 group-hover:block group-focus:block hidden transition">
        <a href="/solo_parent/pude/log_in/login.php"
           class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-800 font-semibold">
            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
        </a>
        
    </div>
</div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Members</p>
                        <h2 class="text-3xl font-bold text-gray-800"><?= $total_members ?? 0 ?></h2>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
                <!-- Example growth, you can make this dynamic if you want -->
                <div class="mt-4">
                    <span class="text-green-500 font-medium">+12%</span>
                    <span class="text-gray-500 ml-2">from last month</span>
                </div>
            </div>
            
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Male Solo Parents</p>
                        <h2 class="text-3xl font-bold text-gray-800"><?= $total_men ?? 0 ?></h2>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                        <i class="fas fa-male text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-500 font-medium">+8%</span>
                    <span class="text-gray-500 ml-2">from last month</span>
                </div>
            </div>
            
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Female Solo Parents</p>
                        <h2 class="text-3xl font-bold text-gray-800"><?= $total_women ?? 0 ?></h2>
                    </div>
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-pink-600">
                        <i class="fas fa-female text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-500 font-medium">+15%</span>
                    <span class="text-gray-500 ml-2">from last month</span>
                </div>
            </div>
            
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">New This Month</p>
                        <h2 class="text-3xl font-bold text-gray-800"><?= $new_members_month ?? 0 ?></h2>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fas fa-user-plus text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-500 font-medium">+5%</span>
                    <span class="text-gray-500 ml-2">from last month</span>
                </div>
            </div>
        </div>
        
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Members Growth</h2>
                    <select class="bg-gray-100 border border-gray-300 text-gray-700 py-1 px-3 rounded">
                        <option>Last 6 Months</option>
                        <option>Last Year</option>
                        <option>All Time</option>
                    </select>
                </div>
                <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                    <canvas id="monthlyChart" height="120"></canvas>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Gender Distribution</h2>
                    <select class="bg-gray-100 border border-gray-300 text-gray-700 py-1 px-3 rounded">
                        <option>Current Year</option>
                        <option>Last Year</option>
                    </select>
                </div>
                <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                    <canvas id="genderChart" height="120"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Recent Members Table (dynamic) -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Members</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Children</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <?php if ($recent_members && $recent_members->num_rows > 0): ?>
                            <?php while($row = $recent_members->fetch_assoc()): ?>
                                <?php
                                    $name = htmlspecialchars($row['name']);
                                    $email = htmlspecialchars($row['email']);
                                    $sex = htmlspecialchars($row['sex']);
                                    $children = htmlspecialchars($row['children']);
                                    $date_registered = htmlspecialchars($row['date_registered']);
                                    $status = htmlspecialchars($row['status']);
                                    // Initials
                                    $parts = explode(' ', $row['name']);
                                    $initials = strtoupper(substr($parts[0], 0, 1));
                                    if (isset($parts[1])) $initials .= strtoupper(substr($parts[1], 0, 1));
                                    // Badge color
                                    $badge_class = $sex === 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800';
                                    $circle_class = $sex === 'Male' ? 'bg-blue-100 text-blue-600' : 'bg-pink-100 text-pink-600';
                                    // Status color
                                    $status_class = $status === 'Active' ? 'bg-green-100 text-green-800' : ($status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800');
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 <?= $circle_class ?> rounded-full flex items-center justify-center font-bold">
                                                <?= $initials ?>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900"><?= $name ?></div>
                                                <div class="text-sm text-gray-500"><?= $email ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $badge_class ?>"><?= $sex ?></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $children ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $date_registered ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $status_class ?>"><?= $status ?></span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4">No recent members found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
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

        // Sidebar active menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.sidebar-menu a');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('bg-green-900'));
                    this.classList.add('bg-green-900');
                });
            });
        });
    </script>
</body>
</html>