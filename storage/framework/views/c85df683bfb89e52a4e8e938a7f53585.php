

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">

        <div class="rounded-lg overflow-hidden shadow-lg"
            style="background: linear-gradient(135deg,#dc2626 0%,#7c3aed 100%);">
            <div class="p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
                        <p class="mt-2 text-red-100">Manage users and monitor platform activity</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-red-100">Last login</p>
                        <p class="font-semibold"><?php echo e(now()->format('M d, Y H:i')); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-blue-500">
                <p class="text-sm text-gray-500">Total Users</p>
                <p class="text-2xl font-bold"><?php echo e($total_users); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-green-500">
                <p class="text-sm text-gray-500">Active Portfolios</p>
                <p class="text-2xl font-bold"><?php echo e($active_portfolios); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-yellow-500">
                <p class="text-sm text-gray-500">Total Skills</p>
                <p class="text-2xl font-bold"><?php echo e($total_skills); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-pink-500">
                <p class="text-sm text-gray-500">Total Experiences</p>
                <p class="text-2xl font-bold"><?php echo e($total_experiences); ?></p>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">User Registrations (Last 7 Days)</h3>
                <canvas id="userChart" height="200"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">User Roles Distribution</h3>
                <canvas id="roleChart" height="200"></canvas>
            </div>
        </div>

        <!-- Recent users -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-semibold mb-3">Recent User Registrations</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Registered</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $recent_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900"><?php echo e($user->name); ?></td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500"><?php echo e($user->email); ?></td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500"><?php echo e(ucfirst($user->role)); ?>

                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo e($user->created_at->format('M d, Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Chart.js -->
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            (function() {
                // User registrations chart
                const ctx1 = document.getElementById('userChart');
                if (ctx1) {
                    const labels = <?php echo json_encode($chart_labels); ?>;
                    const data = <?php echo json_encode($user_registrations); ?>;

                    new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Registrations',
                                data: data,
                                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                                borderColor: '#3b82f6',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }

                // Role distribution chart
                const ctx2 = document.getElementById('roleChart');
                if (ctx2) {
                    new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['Admin', 'User'],
                            datasets: [{
                                data: [<?php echo e($admin_count); ?>, <?php echo e($user_count); ?>],
                                backgroundColor: ['#dc2626', '#3b82f6'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                }
            })();
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Dashboard/adminDashboard.blade.php ENDPATH**/ ?>