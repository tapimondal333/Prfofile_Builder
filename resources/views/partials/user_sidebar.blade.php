<aside class="w-64 bg-white border-r min-h-screen">

    {{-- Logo --}}
    <div class="px-6 py-4 border-b">
        <h1 class="text-xl font-bold text-blue-600">
            Portfolio Builder
        </h1>
    </div>

    {{-- Navigation --}}
    <nav class="px-4 py-6 space-y-2 text-gray-700">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="block px-4 py-2 rounded 
           {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            🏠 Dashboard
        </a>

        {{-- Portfolio Section --}}
        <div class="mt-4 text-xs uppercase text-gray-400 px-4">
            Portfolio
        </div>

        <a href="{{ route('portfolio.profile') }}"
            class="block px-4 py-2 rounded 
           {{ request()->routeIs('portfolio.profile') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            👤 Profile
        </a>

        {{-- About Dropdown --}}
        <div x-data="{ open: {{ request()->routeIs('education.*', 'documents.*') ? 'true' : 'false' }} }">

            {{-- Parent About --}}
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 rounded
        {{ request()->routeIs('education.*', 'documents.*')
            ? 'bg-blue-100 text-blue-600 font-semibold'
            : 'hover:bg-gray-100 text-gray-700' }}">

                <span class="flex items-center gap-2">
                    📝 <span>About</span>
                </span>

                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- Dropdown items --}}
            <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">

                <a href="{{ route('education.index') }}"
                    class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('education.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600' }}">
                    🎓 Education
                </a>

                <a href="{{ route('documents.index') }}"
                    class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('documents.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600' }}">
                    📎 Documents
                </a>

            </div>
        </div>

        <a href="{{ route('skill.index') }}"
            class="block px-4 py-2 rounded 
           {{ request()->routeIs('portfolio.skills') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            💡 Skills & Projects
        </a>

        <a href="{{ route('portfolio.experience') }}"
            class="block px-4 py-2 rounded 
           {{ request()->routeIs('portfolio.experience') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            📂 Experience
        </a>

        {{-- Preview --}}
        <div class="mt-4 text-xs uppercase text-gray-400 px-4">
            Actions
        </div>

        <a href="{{ route('portfolio.preview') }}" target="_blank" class="block px-4 py-2 rounded hover:bg-gray-100">
            👁 Preview Portfolio
        </a>


        {{-- Settings Dropdown --}}
        <div x-data="{ open: {{ request()->routeIs('education.*', 'documents.*') ? 'true' : 'false' }} }">

            {{-- Parent Settings --}}
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 rounded
        {{ request()->routeIs('education.*', 'documents.*')
            ? 'bg-blue-100 text-blue-600 font-semibold'
            : 'hover:bg-gray-100 text-gray-700' }}">

                <span class="flex items-center gap-2">
                    ⚙️ <span>Settings</span>
                </span>

                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- settings items --}}
            <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">

                <a href="{{ route('password.request') }}"
                    class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('password.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600' }}">
                    🔑 Change Password
                </a>

                <a href="{{ route('contact_us.index') }}"
                    class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('contact_us.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600' }}">
                    👤 Contact Us
                </a>


                <a href="#" id="theme-toggle"
                    class="block px-3 py-2 rounded text-sm flex items-center gap-2
           hover:bg-gray-100 text-gray-600">
                    <span id="theme-icon">🌙</span>
                    <span id="theme-text">Toggle Theme</span>
                </a>

            </div>


            {{-- Logout --}}
            <form method="POST" action="{{ route('user_logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded text-red-600 hover:bg-red-50">
                    🚪 Logout
                </button>
            </form>

            {{-- Minimal theme styles & script for toggle persistence --}}
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
