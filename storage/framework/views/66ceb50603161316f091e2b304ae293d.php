<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up | Portfolio Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Create Your Account
        </h2>

        
        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="text-sm list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form method="POST" action="<?php echo e(route('register.post')); ?>">
            <?php echo csrf_field(); ?>

            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Full Name</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Role</label>
                <select name="role" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300 mb-6">
                    <option value="" disabled selected>Select your role</option>
                    <option value="user" <?php echo e(old('role') == 'user' ? 'selected' : ''); ?>>User</option>
                    <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                </select>
            </div>
            <div>
                
                <label class="flex items-center mb-6">
                    <input type="checkbox" name="terms" class="mr-2" required>
                    <span class="text-sm text-gray-600">I agree to the <a href="#"
                            class="text-blue-600 hover:underline">Terms and Conditions</a></span>
            </div>

            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Sign Up
            </button>
        </form>

        
        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">
                Sign in
            </a>
        </p>

    </div>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/Auth/register.blade.php ENDPATH**/ ?>