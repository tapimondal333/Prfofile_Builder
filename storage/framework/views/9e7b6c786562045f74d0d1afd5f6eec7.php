

<?php $__env->startSection('content'); ?>

    <div id="main" x-data="{
        addOpen: false,
        editOpen: false,
        editData: {},
        doccuments: [],
        openEditModal(id) {
            const doc = this.doccuments.find(e => e.id == id);
            if (doc) {
                this.editData = { ...doc };
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
            <h1 class="text-2xl font-bold">Doccument Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Doccument
            </button>
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-sm">
                    <tr>
                        <th class="p-2  text-left">Title</th>
                        <th class="p-2 pl-4 text-left">Description</th>
                        <th class="p-2  text-left">Certificate</th>
                        <th class="p-2  text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $doccuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-t ">
                            <td class="p-2"><?php echo e(strtoupper($doc->title)); ?></td>
                            <td class="p-2"><?php echo e($doc->description); ?></td>



                            <td class="p-2 pl-4 align-top">
                                <?php if($doc->certificate): ?>
                                    <a href="<?php echo e(asset('storage/' . $doc->certificate)); ?>" target="_blank"
                                        class="text-blue-600 underline">
                                        View
                                    </a>
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>

                            <td class="p-2 flex gap-2 align-top">
                                <button onclick="openEditModal(<?php echo e($doc->id); ?>)" class="text-blue-600">✏</button>

                                <form method="POST" action="#">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600">🗑</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500 align-top">
                                No doccuments are added
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php echo $__env->make('partials.add-doc-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



    </div>

    <script>
        window.doccuments = <?php echo json_encode($doccuments, 15, 512) ?>;

        function openEditModal(id) {
            const doc = window.doccuments.find(e => e.id == id);
            if (doc) {
                document.getElementById('edit-form').action = '<?php echo e(url('portfolio/doccument')); ?>/' + id;
                document.getElementById('edit-title').value = doc.title;
                document.getElementById('edit-description').value = doc.description || '';
                document.getElementById('edit-certificate').value = doc.certificate || '';
                document.getElementById('edit-modal').classList.remove('hidden');
            }
        }
    </script>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/About/Doccument/index.blade.php ENDPATH**/ ?>