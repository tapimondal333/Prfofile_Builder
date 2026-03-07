@extends('layouts.admin')

@section('content')
    <div class="space-y-6">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Edit User: {{ $user->name }}</h1>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Users</a>
            </div>

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                        </select>
                        @error('role')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                        User</button>
                </div>
            </form>
        </div>

    </div>
@endsection
