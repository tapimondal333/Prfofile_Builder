

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">

        <div class="rounded-lg overflow-hidden shadow-lg"
            style="background: linear-gradient(135deg,#0ea5e9 0%,#7c3aed 100%);">
            <div class="p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">Welcome back, <?php echo e(auth()->user()->name); ?></h1>
                        <p class="mt-2 text-blue-100">Your developer portfolio at a glance</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-blue-100">Member since</p>
                        <p class="font-semibold"><?php echo e(auth()->user()->created_at->format('M d, Y')); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-blue-500">
                <p class="text-sm text-gray-500">Skills</p>
                <p class="text-2xl font-bold"><?php echo e($skills_count ?? '—'); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-green-500">
                <p class="text-sm text-gray-500">Experiences</p>
                <p class="text-2xl font-bold"><?php echo e($experiences_count ?? '—'); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-yellow-500">
                <p class="text-sm text-gray-500">Educations</p>
                <p class="text-2xl font-bold"><?php echo e($educations_count ?? '—'); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 border-t-4 border-pink-500">
                <p class="text-sm text-gray-500">Profile Views</p>
                <p class="text-2xl font-bold"><?php echo e($views_count ?? '—'); ?></p>
            </div>
        </div>

        <!-- Charts and activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">Activity Overview</h3>
                <canvas id="activityChart" height="160"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">Top Skills</h3>
                <ul class="space-y-3">
                    <?php $__currentLoopData = $top_skills ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center justify-between">
                            <div class="text-sm text-gray-700"><?php echo e($skill['name']); ?></div>
                            <div class="text-sm font-semibold text-gray-800"><?php echo e($skill['count']); ?></div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(empty($top_skills ?? [])): ?>
                        <li class="text-gray-600">No skills yet</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Recent activity / timeline -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-semibold mb-3">Recent Activity</h3>
            <div class="space-y-3">
                <?php $__empty_1 = true; $__currentLoopData = $recent_activity ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 rounded-full mt-2" style="background: linear-gradient(180deg,#7c3aed,#0ea5e9);">
                        </div>
                        <div>
                            <div class="text-sm text-gray-700"><?php echo $act['message']; ?></div>
                            <div class="text-xs text-gray-400"><?php echo e($act['time']); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-600">No recent activity</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Chart.js -->
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            (function() {
                const ctx = document.getElementById('activityChart');
                if (!ctx) return;

                const labels = <?php echo json_encode($chart_labels ?? ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']); ?>;
                const data = <?php echo json_encode($chart_data ?? [5, 3, 8, 4, 7, 6, 9]); ?>;

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Profile activity',
                            data: data,
                            fill: true,
                            backgroundColor: 'rgba(124,58,237,0.12)',
                            borderColor: '#7c3aed',
                            tension: 0.3,
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
            })();
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Dashboard/dashboard.blade.php ENDPATH**/ ?>