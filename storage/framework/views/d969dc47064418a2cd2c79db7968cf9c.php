
<div x-show="addOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak
    <?php if($errors->any()): ?> style="display: flex !important;" <?php endif; ?>>

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button @click="addOpen=false"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Add Education</h2>

        
        <?php if($errors->any()): ?>
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded border border-red-400">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('education.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            
            <select name="level" required class="input <?php echo e($errors->has('level') ? 'border-red-500' : ''); ?>">
                <option value="">Select Level</option>
                <option value="SSC" <?php echo e(old('level') == 'SSC' ? 'selected' : ''); ?>>SSC</option>
                <option value="HSC" <?php echo e(old('level') == 'HSC' ? 'selected' : ''); ?>>HSC</option>
                <option value="Graduation" <?php echo e(old('level') == 'Graduation' ? 'selected' : ''); ?>>Graduation</option>
                <option value="Post Graduation" <?php echo e(old('level') == 'Post Graduation' ? 'selected' : ''); ?>>Post
                    Graduation</option>
                <option value="Other" <?php echo e(old('level') == 'Other' ? 'selected' : ''); ?>>Other</option>
            </select>
            <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            
            <input type="text" name="course_name"
                class="input <?php echo e($errors->has('course_name') ? 'border-red-500' : ''); ?>" placeholder="Course / Degree"
                value="<?php echo e(old('course_name')); ?>" required>
            <?php $__errorArgs = ['course_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            
            <input type="text" name="stream" class="input" placeholder="Stream" value="<?php echo e(old('stream')); ?>">

            
            <input type="text" name="institution" class="input" placeholder="Institution Name"
                value="<?php echo e(old('institution')); ?>">

            
            <input type="number" name="passing_year"
                class="input <?php echo e($errors->has('passing_year') ? 'border-red-500' : ''); ?>" placeholder="Passing Year"
                value="<?php echo e(old('passing_year')); ?>" required>
            <?php $__errorArgs = ['passing_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            
            <input type="text" name="marks" class="input" placeholder="Marks / Grade"
                value="<?php echo e(old('marks')); ?>">
            
            <input type="file" name="certificate"
                class="input <?php echo e($errors->has('certificate') ? 'border-red-500' : ''); ?>" placeholder="Certificate"
                accept=".pdf,.jpg,.jpeg,.png">
            <?php $__errorArgs = ['certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="addOpen=false" class="px-4 py-2 border rounded hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/partials/add-modal.blade.php ENDPATH**/ ?>