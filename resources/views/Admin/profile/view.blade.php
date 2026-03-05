@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto py-8">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-400">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 rounded-lg text-white p-6 shadow-xl mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                    <p class="mt-1 text-blue-100">Administrator Profile</p>
                </div>
                <div class="text-right space-x-3">
                    @if (auth()->user()->role === 'super_admin')
                        <button onclick="window.location='{{ route('admin.profile.edit-admin', $user) }}'"
                            class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Admin
                        </button>
                    @endif
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-md">
                        Back
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-32 h-32 rounded-full overflow-hidden border-4 border-gradient-to-br from-blue-500 to-purple-500 mb-4">
                            @if ($adminProfile?->profile_image)
                                <img src="{{ asset('storage/' . $adminProfile->profile_image) }}" alt="Admin Profile"
                                    class="w-full h-full object-cover">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                    <span
                                        class="text-4xl text-blue-600 font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                </div>
                            @endif
                        </div>

                        <h2 class="text-xl font-bold text-center">{{ $user->name }}</h2>
                        <p class="text-sm text-blue-600 font-semibold">{{ $adminProfile?->position ?? 'Administrator' }}</p>

                        <div class="mt-4 w-full">
                            <div class="flex flex-wrap gap-2 justify-center">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-semibold">
                                    {{ ucfirst($adminProfile?->permissions_level ?? 'admin') }}
                                </span>
                                <span
                                    class="px-3 py-1 {{ $adminProfile?->account_status === 'active' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700' }} rounded-full text-sm">
                                    {{ ucfirst($adminProfile?->account_status ?? 'active') }}
                                </span>
                            </div>
                        </div>

                        @if ($adminProfile?->is_suspended)
                            <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded w-full text-center">
                                <p class="text-sm text-red-700 font-semibold">⚠️ Account Suspended</p>
                                @if ($adminProfile->suspension_reason)
                                    <p class="text-xs text-red-600 mt-1">{{ $adminProfile->suspension_reason }}</p>
                                @endif
                            </div>
                        @endif

                        <div class="mt-4 text-sm text-gray-600 text-center">
                            <div>{{ $adminProfile?->department ?? 'Department not set' }}</div>
                            <div class="mt-1">{{ $adminProfile?->team ?? 'Team not set' }} Team</div>
                        </div>

                        <div class="mt-4 w-full">
                            <div class="grid grid-cols-2 gap-2 text-center text-xs">
                                <div class="p-2 bg-blue-50 rounded">
                                    <div class="font-semibold text-blue-600">
                                        {{ $adminProfile?->managed_users_count ?? '0' }}</div>
                                    <div class="text-gray-500">Managed Users</div>
                                </div>
                                <div class="p-2 bg-purple-50 rounded">
                                    <div class="font-semibold text-purple-600 text-xs">
                                        @if ($adminProfile?->last_login)
                                            {{ $adminProfile->last_login->format('M d') }}
                                        @else
                                            Never
                                        @endif
                                    </div>
                                    <div class="text-gray-500">Last Login</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="text-xs text-gray-500">Joined {{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="lg:col-span-2">
                <!-- About Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-3">About</h3>
                    <p class="text-gray-700">{{ $adminProfile?->bio ?? 'No bio provided.' }}</p>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Contact Information</h4>
                            <div class="mt-2 text-gray-700 text-sm space-y-1">
                                <div><strong>Phone:</strong> {{ $adminProfile?->phone ?? '—' }}</div>
                                <div><strong>Extension:</strong> {{ $adminProfile?->extension ?? '—' }}</div>
                                <div><strong>Email:</strong> {{ $user->email }}</div>
                                <div><strong>Office:</strong> {{ $adminProfile?->office_location ?? '—' }}</div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Department & Team</h4>
                            <div class="mt-2 text-gray-700 text-sm space-y-1">
                                <div><strong>Department:</strong> {{ $adminProfile?->department ?? '—' }}</div>
                                <div><strong>Team:</strong> {{ $adminProfile?->team ?? '—' }}</div>
                                <div><strong>Position:</strong> {{ $adminProfile?->position ?? '—' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security & Access Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Security Settings</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-blue-50 rounded border border-blue-200">
                            <div class="flex items-center">
                                <span class="text-xl mr-3">{{ $adminProfile?->mfa_enabled ? '✓' : '✗' }}</span>
                                <div>
                                    <p class="font-semibold text-sm">Multi-Factor Authentication</p>
                                    <p class="text-xs text-gray-600">
                                        {{ $adminProfile?->mfa_enabled ? 'Enabled' : 'Disabled' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-purple-50 rounded border border-purple-200">
                            <div class="flex items-center">
                                <span
                                    class="text-xl mr-3">{{ $adminProfile?->login_notifications_enabled ? '✓' : '✗' }}</span>
                                <div>
                                    <p class="font-semibold text-sm">Login Notifications</p>
                                    <p class="text-xs text-gray-600">
                                        {{ $adminProfile?->login_notifications_enabled ? 'Enabled' : 'Disabled' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permissions Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Access Permissions</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Dashboard Access</span>
                            <span class="text-lg">{{ $adminProfile?->access_dashboard ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Users Management</span>
                            <span class="text-lg">{{ $adminProfile?->access_users ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Reports Access</span>
                            <span class="text-lg">{{ $adminProfile?->access_reports ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">System Settings</span>
                            <span class="text-lg">{{ $adminProfile?->access_settings ? '✓' : '✗' }}</span>
                        </div>
                    </div>

                    <h4 class="text-sm font-semibold text-gray-500 mt-4 mb-3">Action Permissions</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Modify Permissions</span>
                            <span class="text-lg">{{ $adminProfile?->can_modify_permissions ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Approve Content</span>
                            <span class="text-lg">{{ $adminProfile?->can_approve_content ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Suspend Users</span>
                            <span class="text-lg">{{ $adminProfile?->can_suspend_users ? '✓' : '✗' }}</span>
                        </div>
                        <div class="p-3 bg-gray-50 rounded border border-gray-200 flex items-center justify-between">
                            <span class="text-sm font-medium">Delete Data</span>
                            <span class="text-lg">{{ $adminProfile?->can_delete_data ? '✓' : '✗' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Activity Section -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Activity</h3>

                    <div class="space-y-3">
                        @if ($adminProfile?->last_login)
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                                <span class="text-sm font-medium">Last Login</span>
                                <span
                                    class="text-sm text-gray-600">{{ $adminProfile->last_login->format('M d, Y H:i A') }}</span>
                            </div>
                        @else
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                                <span class="text-sm font-medium">Last Login</span>
                                <span class="text-sm text-gray-600">Never</span>
                            </div>
                        @endif

                        @if ($adminProfile?->last_activity)
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                                <span class="text-sm font-medium">Last Activity</span>
                                <span
                                    class="text-sm text-gray-600">{{ $adminProfile->last_activity->format('M d, Y H:i A') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
