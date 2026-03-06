<aside class="w-64 bg-white border-r min-h-screen">

    
    <div class="px-6 py-4 border-b">
        <h1 class="text-xl font-bold text-blue-600">
            Portfolio Builder
        </h1>
    </div>

    
    <nav class="px-4 py-6 space-y-2 text-gray-700">

        
        <a href="<?php echo e(route('dashboard')); ?>"
            class="block px-4 py-2 rounded 
           <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            🏠 Dashboard
        </a>

        
        <div class="mt-4 text-xs uppercase text-gray-400 px-4">
            Portfolio
        </div>

        <a href="<?php echo e(route('portfolio.profile')); ?>"
            class="block px-4 py-2 rounded 
           <?php echo e(request()->routeIs('portfolio.profile') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            👤 Profile
        </a>

        
        <div x-data="{ open: <?php echo e(request()->routeIs('education.*', 'documents.*') ? 'true' : 'false'); ?> }">

            
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 rounded
        <?php echo e(request()->routeIs('education.*', 'documents.*')
            ? 'bg-blue-100 text-blue-600 font-semibold'
            : 'hover:bg-gray-100 text-gray-700'); ?>">

                <span class="flex items-center gap-2">
                    📝 <span>About</span>
                </span>

                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            
            <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">

                <a href="<?php echo e(route('education.index')); ?>"
                    class="block px-3 py-2 rounded text-sm
           <?php echo e(request()->routeIs('education.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600'); ?>">
                    🎓 Education
                </a>

                <a href="<?php echo e(route('documents.index')); ?>"
                    class="block px-3 py-2 rounded text-sm
           <?php echo e(request()->routeIs('documents.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600'); ?>">
                    📎 Documents
                </a>

            </div>
        </div>

        <a href="<?php echo e(route('skill.index')); ?>"
            class="block px-4 py-2 rounded 
           <?php echo e(request()->routeIs('portfolio.skills') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            💡 Skills & Projects
        </a>

        <a href="<?php echo e(route('portfolio.experience')); ?>"
            class="block px-4 py-2 rounded 
           <?php echo e(request()->routeIs('portfolio.experience') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            📂 Experience
        </a>

        
        <div class="mt-4 text-xs uppercase text-gray-400 px-4">
            Actions
        </div>

        <a href="<?php echo e(route('portfolio.preview')); ?>" target="_blank" class="block px-4 py-2 rounded hover:bg-gray-100">
            👁 Preview Portfolio
        </a>


        
        <div x-data="{ open: <?php echo e(request()->routeIs('education.*', 'documents.*') ? 'true' : 'false'); ?> }">

            
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 rounded
        <?php echo e(request()->routeIs('education.*', 'documents.*')
            ? 'bg-blue-100 text-blue-600 font-semibold'
            : 'hover:bg-gray-100 text-gray-700'); ?>">

                <span class="flex items-center gap-2">
                    ⚙️ <span>Settings</span>
                </span>

                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            
            <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">

                <a href="<?php echo e(route('password.request')); ?>"
                    class="block px-3 py-2 rounded text-sm
           <?php echo e(request()->routeIs('password.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600'); ?>">
                    🔑 Change Password
                </a>

                <a href="#" id="theme-toggle"
                    class="block px-3 py-2 rounded text-sm flex items-center gap-2
           hover:bg-gray-100 text-gray-600">
                    <span id="theme-icon">🌙</span>
                    <span id="theme-text">Toggle Theme</span>
                </a>

            </div>


            
            <form method="POST" action="<?php echo e(route('user_logout')); ?>" class="mt-4">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full text-left px-4 py-2 rounded text-red-600 hover:bg-red-50">
                    🚪 Logout
                </button>
            </form>

            
            <style>
                .dark-mode {
                    background-color: #0f172a !important;
                    color: #f8fafc !important;
                }

                .dark-mode .bg-white {
                    background-color: #0b1220 !important;
                }

                .dark-mode .text-gray-700 {
                    color: #e5e7eb !important;
                }

                .dark-mode .text-gray-600 {
                    color: #d1d5db !important;
                }

                .dark-mode .hover\:bg-gray-100:hover {
                    background-color: rgba(255, 255, 255, 0.03) !important;
                }
            </style>

            <script>
                (function() {
                    const toggle = document.getElementById('theme-toggle');
                    const icon = document.getElementById('theme-icon');
                    const text = document.getElementById('theme-text');
                    const storageKey = 'theme';

                    function applyTheme(theme) {
                        if (theme === 'dark') {
                            document.documentElement.classList.add('dark');
                            document.body.classList.add('dark-mode');
                            if (icon) icon.textContent = '☀️';
                            if (text) text.textContent = 'Light Mode';
                        } else {
                            document.documentElement.classList.remove('dark');
                            document.body.classList.remove('dark-mode');
                            if (icon) icon.textContent = '🌙';
                            if (text) text.textContent = 'Dark Mode';
                        }
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        let stored = localStorage.getItem(storageKey);
                        if (!stored) {
                            stored = (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) ?
                                'dark' : 'light';
                        }
                        applyTheme(stored);

                        if (toggle) {
                            toggle.addEventListener('click', function(e) {
                                e.preventDefault();
                                const isDark = document.body.classList.contains('dark-mode');
                                const next = isDark ? 'light' : 'dark';
                                localStorage.setItem(storageKey, next);
                                applyTheme(next);
                            });
                        }
                    });
                })();
            </script>

    </nav>
</aside>
<?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/partials/user_sidebar.blade.php ENDPATH**/ ?>