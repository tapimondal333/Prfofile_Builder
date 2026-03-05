{{-- Add Education Modal --}}
<div x-show="addOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak
    @if ($errors->any()) style="display: flex !important;" @endif>

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button @click="addOpen=false"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Add Skills</h2>

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

        <form method="POST" action="{{ route('skill.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- Skill Name --}}
            <input type="text" name="name" class="input {{ $errors->has('name') ? 'border-red-500' : '' }}"
                placeholder="Skill Name" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            {{-- Proficiency Level --}}
            <select name="proficiency" required class="input {{ $errors->has('proficiency') ? 'border-red-500' : '' }}">
                <option value="">Select Level</option>
                <option value="Beginner" {{ old('proficiency') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ old('proficiency') == 'Intermediate' ? 'selected' : '' }}>Intermediate
                </option>
                <option value="Advanced" {{ old('proficiency') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                <option value="Expert" {{ old('proficiency') == 'Expert' ? 'selected' : '' }}>Expert</option>
                Graduation</option>
                <option value="Other" {{ old('proficiency') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('proficiency')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Description --}}
            <textarea name="description" class="input" placeholder="Description">{{ old('description') }}
                </textarea>

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
