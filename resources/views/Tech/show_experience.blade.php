@extends('layouts.user')

@section('content')

    <div id="main" x-data="{
        editMode: false,
        company: '{{ $experience->company }}',
        position: '{{ $experience->position }}',
        location: '{{ $experience->location }}',
        start_date: '{{ $experience->start_date }}',
        end_date: '{{ $experience->end_date }}',
        description: '{{ $experience->description }}',
        reason_to_leave: '{{ $experience->reason_to_leave }}'
    }">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-400">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-400">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Header with Back Button --}}
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('portfolio.experience') }}" class="text-blue-600 hover:text-blue-800 text-2xl">
                    ← Back to Experiences
                </a>
                <h1 class="text-3xl font-bold" x-show="!editMode">{{ $experience->position }}</h1>
            </div>
            <div class="flex gap-2" x-show="!editMode">
                <button @click="editMode = true" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ✏️ Edit
                </button>
                <form action="{{ route('experience.destroy', $experience->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this experience?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        🗑️ Delete
                    </button>
                </form>
            </div>
        </div>

        {{-- View Mode --}}
        <div x-show="!editMode" class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Main Details Card --}}
            <div class="md:col-span-2 bg-white rounded-lg shadow-md p-6">

                {{-- Position & Company --}}
                <div class="mb-6 pb-6 border-b">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Position</h2>
                    <p class="text-3xl font-bold text-gray-800 mb-3">{{ $experience->position }}</p>
                    <p class="text-xl text-blue-600 font-semibold">{{ $experience->company }}</p>
                </div>

                {{-- Location --}}
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Location</h2>
                    <p class="text-lg text-gray-700">
                        📍 {{ $experience->location ?? 'Not specified' }}
                    </p>
                </div>

                {{-- Date Range --}}
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Employment Period</h2>
                    <div class="flex items-center gap-3 text-lg text-gray-700">
                        <span
                            class="font-semibold">{{ \Carbon\Carbon::parse($experience->start_date)->format('M d, Y') }}</span>
                        <span class="text-gray-400">→</span>
                        <span class="font-semibold">
                            @if ($experience->end_date)
                                {{ \Carbon\Carbon::parse($experience->end_date)->format('M d, Y') }}
                            @else
                                <span class="text-green-600 bg-green-100 px-3 py-1 rounded-full text-sm">Currently
                                    Working</span>
                            @endif
                        </span>
                    </div>
                    @if ($experience->end_date)
                        <p class="text-sm text-gray-600 mt-2">
                            Duration:
                            {{ \Carbon\Carbon::parse($experience->start_date)->diffInMonths(\Carbon\Carbon::parse($experience->end_date)) }}
                            months
                        </p>
                    @endif
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase mb-3">About This Role</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $experience->description ?? 'No description provided' }}
                    </p>
                </div>

                {{-- Reason to Leave --}}
                @if ($experience->reason_to_leave)
                    <div class="mb-6 p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                        <h2 class="text-sm font-semibold text-gray-700 mb-2">Reason to Leave</h2>
                        <p class="text-gray-700 whitespace-pre-wrap">
                            {{ $experience->reason_to_leave }}
                        </p>
                    </div>
                @endif
            </div>

            {{-- Info Card --}}
            <div class="bg-white rounded-lg shadow-md p-6 h-fit">
                <h3 class="text-lg font-bold mb-4">Information</h3>
                <div class="space-y-4 text-sm text-gray-600">
                    <div>
                        <p class="font-semibold text-gray-800">Start Date</p>
                        <p>{{ \Carbon\Carbon::parse($experience->start_date)->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">End Date</p>
                        <p>{{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M d, Y') : 'Still working' }}
                        </p>
                    </div>
                    @if ($experience->end_date)
                        <div>
                            <p class="font-semibold text-gray-800">Total Duration</p>
                            <p>{{ \Carbon\Carbon::parse($experience->start_date)->diffInMonths(\Carbon\Carbon::parse($experience->end_date)) }}
                                months</p>
                        </div>
                    @endif
                    <hr class="my-2">
                    <div>
                        <p class="font-semibold text-gray-800">Added</p>
                        <p>{{ $experience->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Last Updated</p>
                        <p>{{ $experience->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Mode --}}
        <form action="{{ route('experience.update', $experience->id) }}" method="POST" x-show="editMode">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold mb-6">Edit Experience Details</h2>

                {{-- Company Name --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Company Name *</label>
                    <input type="text" name="company" x-model="company" value="{{ $experience->company }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('company')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Position --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Position *</label>
                    <input type="text" name="position" x-model="position" value="{{ $experience->position }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('position')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Location</label>
                    <input type="text" name="location" x-model="location" value="{{ $experience->location }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('location')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Start Date --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Start Date *</label>
                    <input type="date" name="start_date" x-model="start_date" value="{{ $experience->start_date }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('start_date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- End Date --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                    <input type="date" name="end_date" x-model="end_date" value="{{ $experience->end_date }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">Leave blank if currently working here</p>
                    @error('end_date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" x-model="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Describe your responsibilities and achievements...">{{ $experience->description }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Reason to Leave --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Reason to Leave</label>
                    <textarea name="reason_to_leave" x-model="reason_to_leave" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Why did you leave this job?">{{ $experience->reason_to_leave }}</textarea>
                    @error('reason_to_leave')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex gap-3 justify-end">
                    <button type="button" @click="editMode = false"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
