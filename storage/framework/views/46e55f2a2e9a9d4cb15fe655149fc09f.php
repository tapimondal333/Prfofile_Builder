

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">User Details: <?php echo e($user->name); ?></h1>
                <a href="<?php echo e(route('admin.users.index')); ?>"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Users</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Basic Information</h3>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
                        <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                        <p><strong>Role:</strong> <?php echo e(ucfirst($user->role)); ?></p>
                        <p><strong>Registered:</strong> <?php echo e($user->created_at->format('M d, Y H:i')); ?></p>
                        <p><strong>Last Updated:</strong> <?php echo e($user->updated_at->format('M d, Y H:i')); ?></p>
                    </div>
                </div>

                <!-- Portfolio Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Portfolio Information</h3>
                    <?php if($user->portfolio): ?>
                        <div class="space-y-2">
                            <p><strong>Title:</strong> <?php echo e($user->portfolio->title); ?></p>
                            <p><strong>Bio:</strong> <?php echo e($user->portfolio->bio); ?></p>
                            <p><strong>Location:</strong> <?php echo e($user->portfolio->location); ?></p>
                            <p><strong>Skills:</strong> <?php echo e($user->skills->count()); ?></p>
                            <p><strong>Experiences:</strong> <?php echo e($user->experiences->count()); ?></p>
                            <p><strong>Educations:</strong> <?php echo e($user->educations->count()); ?></p>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500">No portfolio created yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Skills -->
            <?php if($user->skills->count() > 0): ?>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-3">Skills</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm"><?php echo e($skill->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Recent Activity -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-3">Recent Activity</h3>
                <div class="space-y-2">
                    <p>Portfolio created: <?php echo e($user->portfolio ? $user->portfolio->created_at->format('M d, Y') : 'N/A'); ?>

                    </p>
                    <p>Last education added:
                        <?php echo e($user->educations->max('created_at') ? $user->educations->max('created_at')->format('M d, Y') : 'N/A'); ?>

                    </p>
                    <p>Last experience added:
                        <?php echo e($user->experiences->max('created_at') ? $user->experiences->max('created_at')->format('M d, Y') : 'N/A'); ?>

                    </p>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Admin/users/show.blade.php ENDPATH**/ ?>