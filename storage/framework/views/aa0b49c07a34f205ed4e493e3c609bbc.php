

<?php $__env->startSection('content'); ?>



    <div id="main" x-data="{
        addOpen: false,
        openDropdown: null
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

        

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Skill & Project Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Skill
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-4">
                    <div class="relative overflow-hidden rounded-xl shadow-lg h-full flex flex-col">
                        <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                        
                        <div class="absolute top-3 right-3">
                            <div class="relative">
                                <button
                                    @click="openDropdown === <?php echo e($loop->index); ?> ? openDropdown = null : openDropdown = <?php echo e($loop->index); ?>"
                                    class="text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full w-9 h-9 flex items-center justify-center text-lg">
                                    ⋮
                                </button>

                                <div x-show="openDropdown === <?php echo e($loop->index); ?>" @click.away="openDropdown = null"
                                    class="absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-10 w-40">
                                    <button class="block w-full px-4 py-2 hover:bg-gray-100 text-gray-700 text-left"
                                        onclick="openEditModal(<?php echo e($skill->id); ?>)">Update</button>
                                    <form action="<?php echo e(route('skill.destroy', $skill->id)); ?>" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-gradient-to-b from-white/60 to-white/30 flex-grow">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-100 text-indigo-700 font-bold">
                                    <?php echo e(strtoupper(substr($skill->name, 0, 1))); ?>

                                </div>
                                <div class="flex-1">
                                    <h5 class="text-lg font-semibold text-gray-800"><?php echo e($skill->name); ?></h5>
                                    <p class="text-gray-600 text-sm mt-1"><?php echo e(Str::limit($skill->description, 120)); ?></p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700 border"><?php echo e($skill->proficiency ?? '—'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white/80 border-t border-white/30 text-right">
                            <a href="<?php echo e(route('skill.show', $skill->id)); ?>"
                                class="inline-flex items-center gap-2 px-3 py-1 bg-white text-indigo-700 rounded shadow-sm hover:shadow-md">
                                View More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


        <?php echo $__env->make('partials.add-skill-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('partials.update-skill-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <script>
        window.skills = <?php echo json_encode($skills, 15, 512) ?>;
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Tech/skills.blade.php ENDPATH**/ ?>