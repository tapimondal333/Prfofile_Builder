@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Edit Your Admin Profile</h1>
                <a href="{{ route('admin.profile.show') }}"
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

            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-8">
                    <!-- Basic Information Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4">Basic Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" value="{{ old('name', $user->name) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed"
                                    disabled>
                                <p class="text-xs text-gray-500 mt-1">Name is managed separately</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" value="{{ old('email', $user->email) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed"
                                    disabled>
                                <p class="text-xs text-gray-500 mt-1">Email is managed separately</p>
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
                            <textarea name="bio" rows="4" placeholder="Write a brief bio about yourself..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('bio', $adminProfile?->bio) }}</textarea>
                        </div>
                    </div>

                    <!-- Profile Image Section -->
                    <div class="border-b pb-6">
                        <h2 class="text-xl font-semibold mb-4">Profile Picture</h2>

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
                        <h2 class="text-xl font-semibold mb-4">Contact Information</h2>

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
                                placeholder="e.g., Building A, Floor 3, Room 301"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Internal Notes Section -->
                    <div class="pb-6">
                        <h2 class="text-xl font-semibold mb-4">Internal Notes</h2>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                        <textarea name="admin_notes" rows="4" placeholder="Internal notes about this admin account..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('admin_notes', $adminProfile?->admin_notes) }}</textarea>
                        <p class="text-xs text-gray-500 mt-2">These notes are only visible to super admins</p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex gap-3 pt-6 border-t">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                            Save Changes
                        </button>
                        <a href="{{ route('admin.profile.show') }}"
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
