@extends('layouts.user')

@section('content')

    <div id="main" x-data="{
        addOpen: false,
        editOpen: false,
        openDropdown: null,
        selectedExperience: null,
        formData: {
            company: '',
            location: '',
            position: '',
            start_date: '',
            end_date: '',
            description: '',
            reason_to_leave: ''
        }
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

        {{-- Top Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Work Experience</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Add Experience
            </button>
        </div>

        {{-- Experiences Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @forelse ($experiences as $experience)
                <div class="bg-white rounded-lg shadow-md p-6 relative">

                    {{-- Dropdown Menu --}}
                    <div class="absolute top-4 right-4 relative">
                        <button
                            @click="openDropdown === {{ $loop->index }} ? openDropdown = null : openDropdown = {{ $loop->index }}"
                            class="text-gray-600 hover:text-gray-900 text-xl" type="button">
                            ⋮
                        </button>

                        <div x-show="openDropdown === {{ $loop->index }}" @click.away="openDropdown = null"
                            class="absolute right-0 mt-1 bg-white border border-gray-200 rounded shadow-lg z-10 min-w-max">
                            <button
                                @click="selectedExperience = {{ json_encode($experience) }}; editOpen = true; openDropdown = null"
                                class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700">
                                ✏️ Edit
                            </button>
                            <form action="{{ route('experience.destroy', $experience->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this experience?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Experience Details --}}
                    <div class="pr-10">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $experience->position }}</h3>
                        <p class="text-blue-600 font-semibold mb-1">{{ $experience->company }}</p>
                        <p class="text-gray-600 text-sm mb-3">
                            📍 {{ $experience->location }}
                        </p>

                        {{-- Dates --}}
                        <div class="mb-3 text-sm text-gray-600">
                            <p class="font-semibold text-gray-700">
                                📅 {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                                @if ($experience->end_date)
                                    - {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                                @else
                                    - Present
                                @endif
                            </p>
                        </div>

                        {{-- Description --}}
                        @if ($experience->description)
                            <div class="mb-3">
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    {{ Str::limit($experience->description, 150) }}
                                </p>
                            </div>
                        @endif

                        {{-- Reason to Leave --}}
                        @if ($experience->reason_to_leave)
                            <div class="mb-3 p-3 bg-yellow-50 rounded border-l-4 border-yellow-400">
                                <p class="text-sm text-gray-700">
                                    <span class="font-semibold">Reason to leave:</span>
                                    {{ Str::limit($experience->reason_to_leave, 100) }}
                                </p>
                            </div>
                        @endif

                        {{-- View More Link --}}
                        <a href="{{ route('experience.show', $experience->id) }}"
                            class="text-blue-600 hover:text-blue-800 text-sm font-semibold mt-3 inline-block">
                            View Details →
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-gray-100 rounded-lg p-12 text-center">
                        <p class="text-gray-600 text-lg mb-4">No work experience added yet.</p>
                        <button @click="addOpen = true" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Add Your First Experience
                        </button>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- Add Experience Modal --}}
        <div x-show="addOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
            @keydown.escape="addOpen = false" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96 max-h-96 overflow-y-auto" @click.stop>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Add Experience</h2>
                    <button @click="addOpen = false" class="text-gray-500 hover:text-gray-700 text-2xl">
                        ✕
                    </button>
                </div>

                <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Company Name *</label>
                        <input type="text" name="company"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Position *</label>
                        <input type="text" name="position"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Location</label>
                        <input type="text" name="location"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Start Date *</label>
                        <input type="date" name="start_date"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                        <input type="date" name="end_date"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-gray-500 text-xs mt-1">Leave blank if currently working</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Describe your responsibilities..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Reason to Leave</label>
                        <textarea name="reason_to_leave" rows="2"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Optional..."></textarea>
                    </div>

                    <div class="flex gap-3 justify-end">
                        <button type="button" @click="addOpen = false"
                            class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Add Experience
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Edit Experience Modal --}}
        <div x-show="editOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
            @keydown.escape="editOpen = false" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96 max-h-96 overflow-y-auto" @click.stop>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Edit Experience</h2>
                    <button @click="editOpen = false" class="text-gray-500 hover:text-gray-700 text-2xl">
                        ✕
                    </button>
                </div>

                <form x-show="selectedExperience" :action="`{{ url('experiences') }}/${selectedExperience.id}`"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Company Name *</label>
                        <input type="text" name="company" :value="selectedExperience.company"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Position *</label>
                        <input type="text" name="position" :value="selectedExperience.position"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Location</label>
                        <input type="text" name="location" :value="selectedExperience.location"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Start Date *</label>
                        <input type="date" name="start_date" :value="selectedExperience.start_date"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                        <input type="date" name="end_date" :value="selectedExperience.end_date"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-gray-500 text-xs mt-1">Leave blank if currently working</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Describe your responsibilities..." x-text="selectedExperience.description"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Reason to Leave</label>
                        <textarea name="reason_to_leave" rows="2"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Optional..." x-text="selectedExperience.reason_to_leave"></textarea>
                    </div>

                    <div class="flex gap-3 justify-end">
                        <button type="button" @click="editOpen = false"
                            class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Update Experience
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        window.experiences = @json($experiences);
    </script>

@endsection
