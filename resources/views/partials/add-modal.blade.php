{{-- Add Education Modal --}}
<div x-show="addOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak
    @if ($errors->any()) style="display: flex !important;" @endif>

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button @click="addOpen=false"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Add Education</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded border border-red-400">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('education.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Level --}}
            <select name="level" required class="input {{ $errors->has('level') ? 'border-red-500' : '' }}">
                <option value="">Select Level</option>
                <option value="SSC" {{ old('level') == 'SSC' ? 'selected' : '' }}>SSC</option>
                <option value="HSC" {{ old('level') == 'HSC' ? 'selected' : '' }}>HSC</option>
                <option value="Graduation" {{ old('level') == 'Graduation' ? 'selected' : '' }}>Graduation</option>
                <option value="Post Graduation" {{ old('level') == 'Post Graduation' ? 'selected' : '' }}>Post
                    Graduation</option>
                <option value="Other" {{ old('level') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('level')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Course / Degree --}}
            <input type="text" name="course_name"
                class="input {{ $errors->has('course_name') ? 'border-red-500' : '' }}" placeholder="Course / Degree"
                value="{{ old('course_name') }}" required>
            @error('course_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Stream --}}
            <input type="text" name="stream" class="input" placeholder="Stream" value="{{ old('stream') }}">

            {{-- Institution --}}
            <input type="text" name="institution" class="input" placeholder="Institution Name"
                value="{{ old('institution') }}">

            {{-- Passing Year --}}
            <input type="number" name="passing_year"
                class="input {{ $errors->has('passing_year') ? 'border-red-500' : '' }}" placeholder="Passing Year"
                value="{{ old('passing_year') }}" required>
            @error('passing_year')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Marks --}}
            <input type="text" name="marks" class="input" placeholder="Marks / Grade"
                value="{{ old('marks') }}">
            {{-- Certificate --}}
            <input type="file" name="certificate"
                class="input {{ $errors->has('certificate') ? 'border-red-500' : '' }}" placeholder="Certificate"
                accept=".pdf,.jpg,.jpeg,.png">
            @error('certificate')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Actions --}}
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="addOpen=false" class="px-4 py-2 border rounded hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
