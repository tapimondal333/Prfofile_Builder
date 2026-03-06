

<?php $__env->startSection('content'); ?>

    <div id="main" x-data="{
        editMode: false,
        company: '<?php echo e($experience->company); ?>',
        position: '<?php echo e($experience->position); ?>',
        location: '<?php echo e($experience->location); ?>',
        start_date: '<?php echo e($experience->start_date); ?>',
        end_date: '<?php echo e($experience->end_date); ?>',
        description: '<?php echo e($experience->description); ?>',
        reason_to_leave: '<?php echo e($experience->reason_to_leave); ?>'
    }">

        
        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-400">
                <?php echo e(session('success')); ?>

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

        
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-4">
                <a href="<?php echo e(route('portfolio.experience')); ?>" class="text-blue-600 hover:text-blue-800 text-2xl">
                    ← Back to Experiences
                </a>
                <h1 class="text-3xl font-bold" x-show="!editMode"><?php echo e($experience->position); ?></h1>
            </div>
            <div class="flex gap-2" x-show="!editMode">
                <button @click="editMode = true" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ✏️ Edit
                </button>
                <form action="<?php echo e(route('experience.destroy', $experience->id)); ?>" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this experience?');" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        🗑️ Delete
                    </button>
                </form>
            </div>
        </div>

        
        <div x-show="!editMode" class="grid grid-cols-1 md:grid-cols-3 gap-6">

            
            <div class="md:col-span-2 bg-white rounded-lg shadow-md p-6">

                
                <div class="mb-6 pb-6 border-b">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Position</h2>
                    <p class="text-3xl font-bold text-gray-800 mb-3"><?php echo e($experience->position); ?></p>
                    <p class="text-xl text-blue-600 font-semibold"><?php echo e($experience->company); ?></p>
                </div>

                
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Location</h2>
                    <p class="text-lg text-gray-700">
                        📍 <?php echo e($experience->location ?? 'Not specified'); ?>

                    </p>
                </div>

                
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Employment Period</h2>
                    <div class="flex items-center gap-3 text-lg text-gray-700">
                        <span
                            class="font-semibold"><?php echo e(\Carbon\Carbon::parse($experience->start_date)->format('M d, Y')); ?></span>
                        <span class="text-gray-400">→</span>
                        <span class="font-semibold">
                            <?php if($experience->end_date): ?>
                                <?php echo e(\Carbon\Carbon::parse($experience->end_date)->format('M d, Y')); ?>

                            <?php else: ?>
                                <span class="text-green-600 bg-green-100 px-3 py-1 rounded-full text-sm">Currently
                                    Working</span>
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php if($experience->end_date): ?>
                        <p class="text-sm text-gray-600 mt-2">
                            Duration:
                            <?php echo e(\Carbon\Carbon::parse($experience->start_date)->diffInMonths(\Carbon\Carbon::parse($experience->end_date))); ?>

                            months
                        </p>
                    <?php endif; ?>
                </div>

                
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-3">About This Role</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                        <?php echo e($experience->description ?? 'No description provided'); ?>

                    </p>
                </div>

                
                <?php if($experience->reason_to_leave): ?>
                    <div class="mb-6 p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                        <h2 class="text-sm font-semibold text-gray-700 mb-2">Reason to Leave</h2>
                        <p class="text-gray-700 whitespace-pre-wrap">
                            <?php echo e($experience->reason_to_leave); ?>

                        </p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="bg-white rounded-lg shadow-md p-6 h-fit">
                <h3 class="text-lg font-bold mb-4">Information</h3>
                <div class="space-y-4 text-sm text-gray-600">
                    <div>
                        <p class="font-semibold text-gray-800">Start Date</p>
                        <p><?php echo e(\Carbon\Carbon::parse($experience->start_date)->format('M d, Y')); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">End Date</p>
                        <p><?php echo e($experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M d, Y') : 'Still working'); ?>

                        </p>
                    </div>
                    <?php if($experience->end_date): ?>
                        <div>
                            <p class="font-semibold text-gray-800">Total Duration</p>
                            <p><?php echo e(\Carbon\Carbon::parse($experience->start_date)->diffInMonths(\Carbon\Carbon::parse($experience->end_date))); ?>

                                months</p>
                        </div>
                    <?php endif; ?>
                    <hr class="my-2">
                    <div>
                        <p class="font-semibold text-gray-800">Added</p>
                        <p><?php echo e($experience->created_at->format('M d, Y')); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Last Updated</p>
                        <p><?php echo e($experience->updated_at->format('M d, Y')); ?></p>
                    </div>
                </div>
            </div>
        </div>

        
        <form action="<?php echo e(route('experience.update', $experience->id)); ?>" method="POST" x-show="editMode">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold mb-6">Edit Experience Details</h2>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Company Name *</label>
                    <input type="text" name="company" x-model="company" value="<?php echo e($experience->company); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Position *</label>
                    <input type="text" name="position" x-model="position" value="<?php echo e($experience->position); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Location</label>
                    <input type="text" name="location" x-model="location" value="<?php echo e($experience->location); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Start Date *</label>
                    <input type="date" name="start_date" x-model="start_date" value="<?php echo e($experience->start_date); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                    <input type="date" name="end_date" x-model="end_date" value="<?php echo e($experience->end_date); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">Leave blank if currently working here</p>
                    <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" x-model="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Describe your responsibilities and achievements..."><?php echo e($experience->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Reason to Leave</label>
                    <textarea name="reason_to_leave" x-model="reason_to_leave" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Why did you leave this job?"><?php echo e($experience->reason_to_leave); ?></textarea>
                    <?php $__errorArgs = ['reason_to_leave'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="flex gap-3 justify-end">
                    <button type="button" @click="editMode = false"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Tech/show_experience.blade.php ENDPATH**/ ?>