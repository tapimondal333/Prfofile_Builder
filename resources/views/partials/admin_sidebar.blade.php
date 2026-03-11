<aside class="w-64 bg-red-300 min-h-screen">

    {{-- Logo --}}
    <div class="px-6 py-4 border-b border-red-500">
        <h1 class="text-xl font-bold text-white">
            Admin Panel
        </h1>
    </div>

    {{-- Navigation --}}
    <nav class="px-4 py-6 space-y-2 text-white">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.dashboard') ? 'bg-red-700 text-white font-semibold' : 'hover:bg-red-700' }}">
            📊 Dashboard
        </a>

        {{-- Portfolio Section --}}
        <div class="mt-4 text-xs uppercase text-indigo-900 px-4">
            Portfolio
        </div>

        <a href="{{ route('admin.profile.show') }}"
            class="block px-4 py-2 rounded 
           {{ request()->routeIs('admin.portfolio.profile') ? 'bg-red-700 text-white font-semibold' : 'hover:bg-red-700' }}">
            👤 Profile
        </a>

        {{-- Users --}}
        <a href="{{ route('admin.users.index') }}"
            class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.users.*') ? 'bg-red-700 text-white font-semibold' : 'hover:bg-red-700' }}">
            👥 Users
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

                <a href="{{ route('auth.password.request') }}"
                    class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('password.*') ? 'bg-red-700 text-white font-semibold' : 'hover:bg-red-700' }}">
                    🔑 Change Password
                </a>

                <a href="#" id="theme-toggle"
                    class="block px-3 py-2 rounded text-sm flex items-center gap-2
            text-white font-semibold hover:bg-red-700">
                    <span id="theme-icon">🌙</span>
                    <span id="theme-text">Toggle Theme</span>
                </a>

            </div>

            <a href="{{ route('contacts.index') }}"
                class="block px-3 py-2 rounded text-sm
           {{ request()->routeIs('contacts.*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 text-gray-600' }}">
                👤 Contacts
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('admin_logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded text-white hover:bg-red-700">
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
