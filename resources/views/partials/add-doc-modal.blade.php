{{-- Add Education Modal --}}
<div x-show="addOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak
    @if ($errors->any()) style="display: flex !important;" @endif>

    <div class="bg-white w-full max-w-lg rounded-lg p-6 relative">

        <button @click="addOpen=false; window.location.reload();"
            class="absolute top-3 right-3 text-gray-500 cursor-pointer hover:text-gray-700">✖</button>

        <h2 class="text-xl font-bold mb-4">Add Doccument</h2>

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

        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <input type="text" name="title" class="input {{ $errors->has('title') ? 'border-red-500' : '' }}"
                placeholder="Title" value="{{ old('title') }}" required>
            @error('title')
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
                <button type="button" @click="addOpen=false;" class="px-4 py-2 border rounded hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
