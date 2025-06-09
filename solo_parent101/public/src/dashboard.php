<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Parent Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
</head>
<body class="bg-gray-100">
    <div class="sidebar">
        <div class="sidebar-header">
            <h1 class="text-white text-xl font-bold">Solo Parent</h1>
            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-purple-600 font-bold">
                SP
            </div>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
                <span>Members</span>
            </a>
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Overview</h1>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="fas fa-bell text-gray-600 text-xl cursor-pointer"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full pulse"></span>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                        SP
                    </div>
                    <span class="font-medium">Admin</span>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Members</p>
                        <h2 class="text-3xl font-bold text-gray-800">1,248</h2>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-500 font-medium">+12%</span>
                    <span class="text-gray-500 ml-2">from last month</span>
                </div>
            </div>
            
            <div class="stats-card bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Male Solo Parents</p>
                        <h2 class="text-3xl font-bold text-gray-800">328</h2>
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
                        <h2 class="text-3xl font-bold text-gray-800">920</h2>
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
                        <h2 class="text-3xl font-bold text-gray-800">42</h2>
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
                    <p class="text-gray-500">Chart would be displayed here</p>
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
                    <p class="text-gray-500">Pie chart would be displayed here</p>
                </div>
            </div>
        </div>
        
        <!-- Recent Members Table -->
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
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold">
                                            CR
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">clint rofer</div>
                                            <div class="text-sm text-gray-500">rebusit@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Male</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-15</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 font-bold">
                                            JS
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                            <div class="text-sm text-gray-500">jane@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">Female</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-22</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">
                                            RB
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Robert Brown</div>
                                            <div class="text-sm text-gray-500">robert@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Male</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-07-10</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript to handle active menu item
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.sidebar-menu a');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Simulate data loading (in a real app, this would be an API call)
            setTimeout(() => {
                const loadingElements = document.querySelectorAll('.bg-gray-50 p.text-gray-500');
                loadingElements.forEach(el => {
                    el.textContent = 'Data loaded successfully!';
                    el.classList.remove('text-gray-500');
                    el.classList.add('text-green-500');
                });
            }, 2000);
        });
    </script>
</body>
</html>