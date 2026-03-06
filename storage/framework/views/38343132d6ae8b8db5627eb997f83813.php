

<?php $__env->startSection('content'); ?>

    <div id="main" x-data="{
        addOpen: false,
        editOpen: false,
        editData: {},
        educations: [],
        openEditModal(id) {
            const edu = this.educations.find(e => e.id == id);
            if (edu) {
                this.editData = { ...edu };
                this.editOpen = true;
            }
        }
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
            <h1 class="text-2xl font-bold">Education Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Education
            </button>
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-sm">
                    <tr>
                        <th class="p-2  text-left">Level</th>
                        <th class="p-2 pl-4 text-left">Course</th>
                        <th class="p-2 pl-4 text-left">Stream</th>
                        <th class="p-2  text-left">Year</th>
                        <th class="p-2  text-left">Marks</th>
                        <th class="p-2  text-left">Certificate</th>
                        <th class="p-2  text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-t ">
                            <td class="p-2"><?php echo e(strtoupper($edu->level)); ?></td>
                            <td class="p-2"><?php echo e($edu->course_name); ?></td>
                            <td class="p-2"><?php echo e($edu->stream); ?></td>
                            <td class="p-2"><?php echo e($edu->passing_year); ?></td>
                            <td class="p-2 pl-4"><?php echo e($edu->marks); ?></td>

                            <td class="p-2 pl-4 align-top">
                                <?php if($edu->certificate): ?>
                                    <a href="<?php echo e(asset('storage/' . $edu->certificate)); ?>" target="_blank"
                                        class="text-blue-600 underline">
                                        View
                                    </a>
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>

                            <td class="p-2 flex gap-2 align-top">
                                <button onclick="openEditModal(<?php echo e($edu->id); ?>)" class="text-blue-600">✏</button>

                                <form method="POST" action="<?php echo e(route('education.destroy', $edu)); ?>">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600">🗑</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500 align-top">
                                No education details added
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php echo $__env->make('partials.add-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php echo $__env->make('partials.edit-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </div>

    <script>
        window.educations = <?php echo json_encode($educations, 15, 512) ?>;

        function openEditModal(id) {
            const edu = window.educations.find(e => e.id == id);
            if (edu) {
                document.getElementById('edit-form').action = '<?php echo e(url('portfolio/education')); ?>/' + id;
                document.getElementById('edit-level').value = edu.level;
                document.getElementById('edit-course_name').value = edu.course_name;
                document.getElementById('edit-stream').value = edu.stream || '';
                document.getElementById('edit-institution').value = edu.institution || '';
                document.getElementById('edit-passing_year').value = edu.passing_year;
                document.getElementById('edit-marks').value = edu.marks || '';
                document.getElementById('edit-modal').classList.remove('hidden');
            }
        }
    </script>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/UserPortfolio/Education/index.blade.php ENDPATH**/ ?>