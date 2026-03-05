@extends('layouts.admin')

@section('content')
    <div class="space-y-6">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">User Details: {{ $user->name }}</h1>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Users</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Basic Information</h3>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                        <p><strong>Registered:</strong> {{ $user->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Last Updated:</strong> {{ $user->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <!-- Portfolio Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Portfolio Information</h3>
                    @if ($user->portfolio)
                        <div class="space-y-2">
                            <p><strong>Title:</strong> {{ $user->portfolio->title }}</p>
                            <p><strong>Bio:</strong> {{ $user->portfolio->bio }}</p>
                            <p><strong>Location:</strong> {{ $user->portfolio->location }}</p>
                            <p><strong>Skills:</strong> {{ $user->skills->count() }}</p>
                            <p><strong>Experiences:</strong> {{ $user->experiences->count() }}</p>
                            <p><strong>Educations:</strong> {{ $user->educations->count() }}</p>
                        </div>
                    @else
                        <p class="text-gray-500">No portfolio created yet.</p>
                    @endif
                </div>
            </div>

            <!-- Skills -->
            @if ($user->skills->count() > 0)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-3">Skills</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($user->skills as $skill)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Recent Activity -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-3">Recent Activity</h3>
                <div class="space-y-2">
                    <p>Portfolio created: {{ $user->portfolio ? $user->portfolio->created_at->format('M d, Y') : 'N/A' }}
                    </p>
                    <p>Last education added:
                        {{ $user->educations->max('created_at') ? $user->educations->max('created_at')->format('M d, Y') : 'N/A' }}
                    </p>
                    <p>Last experience added:
                        {{ $user->experiences->max('created_at') ? $user->experiences->max('created_at')->format('M d, Y') : 'N/A' }}
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
