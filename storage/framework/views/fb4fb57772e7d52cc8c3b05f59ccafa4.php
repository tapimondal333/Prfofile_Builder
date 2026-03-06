

<?php $__env->startSection('content'); ?>
    <div class="max-w-6xl mx-auto py-8">

        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-400">
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-400">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 rounded-lg text-white p-6 shadow-xl mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">Admin Profile</h1>
                    <p class="mt-1 text-blue-100">System Administrator Account & Permissions</p>
                </div>
                <div class="text-right">
                    <button onclick="window.location='<?php echo e(route('admin.profile.edit')); ?>'"
                        class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-32 h-32 rounded-full overflow-hidden border-4 border-gradient-to-br from-blue-500 to-purple-500 mb-4">
                            <?php if($adminProfile?->profile_image): ?>
                                <img src="<?php echo e(asset('storage/' . $adminProfile->profile_image)); ?>" alt="Admin Profile"
                                    class="w-full h-full object-cover">
                            <?php else: ?>
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                    <span
                                        class="text-4xl text-blue-600 font-bold"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h2 class="text-xl font-bold text-center"><?php echo e($user->name); ?></h2>
                        <p class="text-sm text-blue-600 font-semibold"><?php echo e($adminProfile?->position ?? 'Administrator'); ?></p>

                        <div class="mt-4 w-full">
                            <div class="flex flex-wrap gap-2 justify-center">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-semibold">
                                    <?php echo e(ucfirst($adminProfile?->permissions_level ?? 'admin')); ?>

                                </span>
                                <span
                                    class="px-3 py-1 <?php echo e($adminProfile?->account_status === 'active' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700'); ?> rounded-full text-sm">
                                    <?php echo e(ucfirst($adminProfile?->account_status ?? 'active')); ?>

                                </span>
                            </div>
                        </div>

                        <?php if($adminProfile?->is_suspended): ?>
                            <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded w-full text-center">
                                <p class="text-sm text-red-700 font-semibold">⚠️ Account Suspended</p>
                                <?php if($adminProfile->suspension_lifts_at): ?>
                                    <p class="text-xs text-red-600 mt-1">Lifts on:
                                        <?php echo e($adminProfile->suspension_lifts_at->format('M d, Y')); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-4 text-sm text-gray-600 text-center">
                            <div><?php echo e($adminProfile?->department ?? 'Department not set'); ?></div>
                            <div class="mt-1"><?php echo e($adminProfile?->office_location ?? 'Office not set'); ?></div>
                        </div>

                        <div class="mt-4 w-full">
                            <div class="grid grid-cols-2 gap-2 text-center text-xs">
                                <div class="p-2 bg-blue-50 rounded">
                                    <div class="font-semibold text-blue-600">
                                        <?php echo e($adminProfile?->managed_users_count ?? '0'); ?></div>
                                    <div class="text-gray-500">Managed Users</div>
                                </div>
                                <div class="p-2 bg-purple-50 rounded">
                                    <div class="font-semibold text-purple-600">
                                        <?php if($adminProfile?->last_login): ?>
                                            <?php echo e($adminProfile->last_login->diffForHumans()); ?>

                                        <?php else: ?>
                                            Never
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-gray-500">Last Login</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="text-xs text-gray-500">Member since <?php echo e($user->created_at->format('M d, Y')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="lg:col-span-2">
                <!-- About Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-3">About</h3>
                    <p class="text-gray-700"><?php echo e($adminProfile?->bio ?? 'No bio provided.'); ?></p>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Contact Information</h4>
                            <div class="mt-2 text-gray-700 text-sm space-y-1">
                                <div><strong>Phone:</strong> <?php echo e($adminProfile?->phone ?? '—'); ?></div>
                                <div><strong>Extension:</strong> <?php echo e($adminProfile?->extension ?? '—'); ?></div>
                                <div><strong>Email:</strong> <?php echo e($user->email); ?></div>
                                <div><strong>Office:</strong> <?php echo e($adminProfile?->office_location ?? '—'); ?></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Department & Team</h4>
                            <div class="mt-2 text-gray-700 text-sm space-y-1">
                                <div><strong>Department:</strong> <?php echo e($adminProfile?->department ?? '—'); ?></div>
                                <div><strong>Team:</strong> <?php echo e($adminProfile?->team ?? '—'); ?></div>
                                <div><strong>Position:</strong> <?php echo e($adminProfile?->position ?? '—'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security & Access Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Security & Two-Factor Authentication</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-blue-50 rounded border border-blue-200">
                            <div class="flex items-center">
                                <span class="text-xl mr-3"><?php echo e($adminProfile?->mfa_enabled ? '✓' : '✗'); ?></span>
                                <div>
                                    <p class="font-semibold text-sm">Multi-Factor Authentication</p>
                                    <p class="text-xs text-gray-600">
                                        <?php echo e($adminProfile?->mfa_enabled ? 'Enabled' : 'Disabled'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-purple-50 rounded border border-purple-200">
                            <div class="flex items-center">
                                <span
                                    class="text-xl mr-3"><?php echo e($adminProfile?->login_notifications_enabled ? '✓' : '✗'); ?></span>
                                <div>
                                    <p class="font-semibold text-sm">Login Notifications</p>
                                    <p class="text-xs text-gray-600">
                                        <?php echo e($adminProfile?->login_notifications_enabled ? 'Enabled' : 'Disabled'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($adminProfile?->two_factor_method): ?>
                        <div class="mt-4 p-4 bg-gray-50 rounded border border-gray-200">
                            <p class="text-sm"><strong>2FA Method:</strong>
                                <?php echo e(ucfirst(str_replace('_', ' ', $adminProfile->two_factor_method))); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Permissions Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Access Permissions</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Dashboard Access</span>
                            <span class="text-lg"><?php echo e($adminProfile?->access_dashboard ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Users Management</span>
                            <span class="text-lg"><?php echo e($adminProfile?->access_users ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Reports Access</span>
                            <span class="text-lg"><?php echo e($adminProfile?->access_reports ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">System Settings</span>
                            <span class="text-lg"><?php echo e($adminProfile?->access_settings ? '✓' : '✗'); ?></span>
                        </div>
                    </div>

                    <h4 class="text-sm font-semibold text-gray-500 mt-4 mb-3">Action Permissions</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Modify Permissions</span>
                            <span class="text-lg"><?php echo e($adminProfile?->can_modify_permissions ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Approve Content</span>
                            <span class="text-lg"><?php echo e($adminProfile?->can_approve_content ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Suspend Users</span>
                            <span class="text-lg"><?php echo e($adminProfile?->can_suspend_users ? '✓' : '✗'); ?></span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Delete Data</span>
                            <span class="text-lg"><?php echo e($adminProfile?->can_delete_data ? '✓' : '✗'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Activity Section -->
                <?php if($adminProfile?->last_activity || $adminProfile?->last_login): ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Activity</h3>

                        <div class="space-y-3">
                            <?php if($adminProfile?->last_login): ?>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                                    <span class="text-sm font-medium">Last Login</span>
                                    <span
                                        class="text-sm text-gray-600"><?php echo e($adminProfile->last_login->format('M d, Y H:i A')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($adminProfile?->last_activity): ?>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                                    <span class="text-sm font-medium">Last Activity</span>
                                    <span
                                        class="text-sm text-gray-600"><?php echo e($adminProfile->last_activity->format('M d, Y H:i A')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Admin/profile/show.blade.php ENDPATH**/ ?>