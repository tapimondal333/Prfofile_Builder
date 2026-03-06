<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        
        <?php echo $__env->make('partials.user_sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/layouts/user.blade.php ENDPATH**/ ?>