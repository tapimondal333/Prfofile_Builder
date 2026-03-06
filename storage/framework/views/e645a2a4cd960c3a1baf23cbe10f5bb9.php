
<div id="edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button onclick="document.getElementById('edit-modal').classList.add('hidden');"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Edit Education</h2>

        <form id="edit-form" method="POST" action="<?php echo e(route('education.update', ['education' => $edu->id])); ?>"
            enctype="multipart/form-data">

            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

            
            <select id="edit-level" name="level" required class="input">
                <option value="">Select Level</option>
                <option value="SSC">SSC</option>
                <option value="HSC">HSC</option>
                <option value="Graduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
                <option value="Other">Other</option>
            </select>

            
            <input id="edit-course_name" type="text" name="course_name" class="input" placeholder="Course / Degree"
                required>

            
            <input id="edit-stream" type="text" name="stream" class="input" placeholder="Stream">

            
            <input id="edit-institution" type="text" name="institution" class="input"
                placeholder="Institution Name">

            
            <input id="edit-passing_year" type="number" name="passing_year" class="input" placeholder="Passing Year"
                required>

            
            <input id="edit-marks" type="text" name="marks" class="input" placeholder="Marks / Grade">

            
            <input type="file" name="certificate" class="input" placeholder="Certificate"
                accept=".pdf,.jpg,.jpeg,.png">

            
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" onclick="document.getElementById('edit-modal').classList.add('hidden');"
                    class="px-4 py-2 border rounded hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/partials/edit-modal.blade.php ENDPATH**/ ?>