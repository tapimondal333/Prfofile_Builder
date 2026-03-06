

<?php $__env->startSection('content'); ?>

    <div id="main" x-data="{
        editMode: false,
        name: '<?php echo e($skill->name); ?>',
        description: '<?php echo e($skill->description); ?>',
        proficiency: '<?php echo e($skill->proficiency); ?>'
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
                <a href="<?php echo e(route('skill.index')); ?>" class="text-blue-600 hover:text-blue-800 text-2xl">
                    ← Back to Skills
                </a>
                <h1 class="text-3xl font-bold" x-show="!editMode"><?php echo e($skill->name); ?></h1>
            </div>
            <div class="flex gap-2" x-show="!editMode">
                <button @click="editMode = true" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ✏️ Edit
                </button>
                <form action="<?php echo e(route('skill.destroy', $skill->id)); ?>" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this skill?');" style="display: inline;">
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
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Skill Name</h2>
                    <p class="text-2xl font-bold text-gray-800"><?php echo e($skill->name); ?></p>
                </div>

                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Description</h2>
                    <p class="text-gray-700 leading-relaxed">
                        <?php echo e($skill->description ?? 'No description provided'); ?>

                    </p>
                </div>

                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Proficiency Level</h2>
                    <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full font-semibold">
                        <?php echo e($skill->proficiency ?? 'Not specified'); ?>

                    </span>
                </div>

                <?php if($skill->certificate): ?>
                    <div class="mb-6">
                        <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Certificate</h2>
                        <a href="<?php echo e(asset('storage/' . $skill->certificate)); ?>" target="_blank"
                            class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded hover:bg-green-200">
                            📄 View Certificate
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="bg-white rounded-lg shadow-md p-6 h-fit">
                <h3 class="text-lg font-bold mb-4">Information</h3>
                <div class="space-y-4 text-sm text-gray-600">
                    <div>
                        <p class="font-semibold text-gray-800">Created</p>
                        <p><?php echo e($skill->created_at->format('M d, Y')); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Last Updated</p>
                        <p><?php echo e($skill->updated_at->format('M d, Y')); ?></p>
                    </div>
                </div>
            </div>
        </div>

        
        <form action="<?php echo e(route('skill.update', $skill->id)); ?>" method="POST" enctype="multipart/form-data"
            x-show="editMode">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold mb-6">Edit Skill Details</h2>

                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Skill Name *</label>
                    <input type="text" name="name" x-model="name" value="<?php echo e($skill->name); ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <?php $__errorArgs = ['name'];
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
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e($skill->description); ?></textarea>
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
                    <label class="block text-gray-700 font-semibold mb-2">Proficiency Level</label>
                    <select name="proficiency" x-model="proficiency"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Level</option>
                        <option value="Beginner" <?php echo e($skill->proficiency === 'Beginner' ? 'selected' : ''); ?>>Beginner
                        </option>
                        <option value="Intermediate" <?php echo e($skill->proficiency === 'Intermediate' ? 'selected' : ''); ?>>
                            Intermediate</option>
                        <option value="Advanced" <?php echo e($skill->proficiency === 'Advanced' ? 'selected' : ''); ?>>Advanced
                        </option>
                        <option value="Expert" <?php echo e($skill->proficiency === 'Expert' ? 'selected' : ''); ?>>Expert</option>
                    </select>
                    <?php $__errorArgs = ['proficiency'];
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
                    <label class="block text-gray-700 font-semibold mb-2">Certificate</label>
                    <input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">PDF, JPG, JPEG, PNG (Max 2MB)</p>
                    <?php if($skill->certificate): ?>
                        <p class="text-blue-600 text-sm mt-2">Current:
                            <a href="<?php echo e(asset('storage/' . $skill->certificate)); ?>" target="_blank"
                                class="underline">View</a>
                        </p>
                    <?php endif; ?>
                    <?php $__errorArgs = ['certificate'];
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

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Tech/show_skill.blade.php ENDPATH**/ ?>