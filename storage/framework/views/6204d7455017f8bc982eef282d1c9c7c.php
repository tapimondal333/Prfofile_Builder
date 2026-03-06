
<div id="edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button onclick="closeEditModal()"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Edit Document</h2>

        <form id="edit-form" method="POST" action="" enctype="multipart/form-data">

            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>


            
            <input id="edit-title" type="text" name="title" class="input" placeholder="Title" required>


            
            <input id="edit-description" type="text" name="description" class="input" placeholder="Description">


            
            <input type="file" name="certificate" class="input" placeholder="Certificate"
                accept=".pdf,.jpg,.jpeg,.png">

            
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 border rounded hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id) {
        const doc = window.documents.find(e => e.id == id);
        if (doc) {
            document.getElementById('edit-form').action = '<?php echo e(url('documents')); ?>/' + id;
            document.getElementById('edit-title').value = doc.title;
            document.getElementById('edit-description').value = doc.description || '';
            document.getElementById('edit-modal').classList.remove('hidden');
        }
    }

    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
    }
</script>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/partials/edit-doc-modal.blade.php ENDPATH**/ ?>