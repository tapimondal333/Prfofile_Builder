@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Edit: {{ $user->name }}</h1>
                <a href="{{ route('admin.profile.view', $user) }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-400">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.profile.update-admin', $user) }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-8">
                    <!-- Basic Information Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-blue-600">Basic Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" value="{{ $user->name }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed"
                                    disabled>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" value="{{ $user->email }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed"
                                    disabled>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                                <input type="text" name="position"
                                    value="{{ old('position', $adminProfile?->position) }}"
                                    placeholder="e.g., Senior Administrator"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                <input type="text" name="department"
                                    value="{{ old('department', $adminProfile?->department) }}"
                                    placeholder="e.g., Engineering"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Team</label>
                                <input type="text" name="team" value="{{ old('team', $adminProfile?->team) }}"
                                    placeholder="e.g., Backend"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea name="bio" rows="4" placeholder="Admin biography..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('bio', $adminProfile?->bio) }}</textarea>
                        </div>
                    </div>

                    <!-- Profile Image Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-blue-600">Profile Picture</h2>

                        <div class="flex items-center space-x-6">
                            <div class="w-32 h-32">
                                @if ($adminProfile?->profile_image)
                                    <img id="profilePreview" src="{{ asset('storage/' . $adminProfile->profile_image) }}"
                                        alt="Profile"
                                        class="w-full h-full object-cover rounded-lg border-2 border-gray-300">
                                @else
                                    <div id="profilePreview"
                                        class="w-full h-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50">
                                        <span
                                            class="text-4xl text-gray-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Picture</label>
                                <input type="file" name="profile_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    onchange="previewImage(event)">
                                <p class="text-xs text-gray-500 mt-2">JPG, PNG, GIF up to 5MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-blue-600">Contact Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone', $adminProfile?->phone) }}"
                                    placeholder="e.g., +1 (555) 123-4567"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Office Extension</label>
                                <input type="text" name="extension"
                                    value="{{ old('extension', $adminProfile?->extension) }}" placeholder="e.g., 5234"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Office Location</label>
                            <input type="text" name="office_location"
                                value="{{ old('office_location', $adminProfile?->office_location) }}"
                                placeholder="e.g., Building A, Floor 3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Account Status Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-red-600">Account Status & Control</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Permission Level</label>
                                <select name="permissions_level"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="super_admin"
                                        {{ old('permissions_level', $adminProfile?->permissions_level) === 'super_admin' ? 'selected' : '' }}>
                                        Super Admin</option>
                                    <option value="admin"
                                        {{ old('permissions_level', $adminProfile?->permissions_level) === 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="moderator"
                                        {{ old('permissions_level', $adminProfile?->permissions_level) === 'moderator' ? 'selected' : '' }}>
                                        Moderator</option>
                                    <option value="support"
                                        {{ old('permissions_level', $adminProfile?->permissions_level) === 'support' ? 'selected' : '' }}>
                                        Support</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Account Status</label>
                                <select name="account_status"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="active"
                                        {{ old('account_status', $adminProfile?->account_status) === 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('account_status', $adminProfile?->account_status) === 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                    <option value="pending"
                                        {{ old('account_status', $adminProfile?->account_status) === 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" name="is_suspended"
                                        {{ old('is_suspended', $adminProfile?->is_suspended) ? 'checked' : '' }}
                                        class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                    <span class="text-sm font-medium text-gray-700">Suspend Account</span>
                                </label>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Managed Users Count</label>
                                <input type="number" name="managed_users_count"
                                    value="{{ old('managed_users_count', $adminProfile?->managed_users_count ?? 0) }}"
                                    min="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Suspension Reason</label>
                            <textarea name="suspension_reason" rows="3" placeholder="Reason for suspension (if applicable)..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('suspension_reason', $adminProfile?->suspension_reason) }}</textarea>
                        </div>
                    </div>

                    <!-- Access Permissions Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-green-600">Access Permissions</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="access_dashboard"
                                    {{ old('access_dashboard', $adminProfile?->access_dashboard) ? 'checked' : '' }}
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm font-medium">Dashboard Access</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="access_users"
                                    {{ old('access_users', $adminProfile?->access_users) ? 'checked' : '' }}
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm font-medium">Users Management</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="access_reports"
                                    {{ old('access_reports', $adminProfile?->access_reports) ? 'checked' : '' }}
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm font-medium">Reports Access</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="access_settings"
                                    {{ old('access_settings', $adminProfile?->access_settings) ? 'checked' : '' }}
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm font-medium">System Settings</span>
                            </label>
                        </div>
                    </div>

                    <!-- Action Permissions Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-orange-600">Action Permissions</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="can_modify_permissions"
                                    {{ old('can_modify_permissions', $adminProfile?->can_modify_permissions) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                <span class="text-sm font-medium">Modify Permissions</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="can_approve_content"
                                    {{ old('can_approve_content', $adminProfile?->can_approve_content) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                <span class="text-sm font-medium">Approve Content</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="can_suspend_users"
                                    {{ old('can_suspend_users', $adminProfile?->can_suspend_users) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                <span class="text-sm font-medium">Suspend Users</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="can_delete_data"
                                    {{ old('can_delete_data', $adminProfile?->can_delete_data) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                <span class="text-sm font-medium">Delete Data (Dangerous)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Security Settings Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-purple-600">Security Settings</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="mfa_enabled"
                                    {{ old('mfa_enabled', $adminProfile?->mfa_enabled) ? 'checked' : '' }}
                                    class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <span class="text-sm font-medium">Require MFA</span>
                            </label>

                            <label
                                class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" name="login_notifications_enabled"
                                    {{ old('login_notifications_enabled', $adminProfile?->login_notifications_enabled) ? 'checked' : '' }}
                                    class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <span class="text-sm font-medium">Login Notifications</span>
                            </label>
                        </div>
                    </div>

                    <!-- Internal Notes Section -->
                    <div class="pb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-600">Internal Notes</h2>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                        <textarea name="admin_notes" rows="4" placeholder="Internal notes about this admin account..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('admin_notes', $adminProfile?->admin_notes) }}</textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex gap-3 pt-6 border-t">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                            Save Changes
                        </button>
                        <a href="{{ route('admin.profile.view', $user) }}"
                            class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('profilePreview');
                preview.innerHTML =
                    `<img src="${e.target.result}" alt="Profile" class="w-full h-full object-cover rounded-lg border-2 border-gray-300">`;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
