@extends('layouts.user')

@section('content')
    <div class="min-h-screen flex items-center justify-center flex-col mb-6">
        <div class="w-full max-w-md bg-purple-100 p-6 rounded-lg shadow-md">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Contact Us</h1>
            </div>
            {{-- success message --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact_us.submit') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                {{-- Name --}}
                <div>
                    <input type="text" name="name"
                        class="input {{ $errors->has('name') ? 'border-red-500' : '' }}  border-1 rounded w-full px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300"
                        placeholder="Name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Email --}}
                <div>
                    <input type="email" name="email"
                        class="input {{ $errors->has('email') ? 'border-red-500' : '' }}  border-1 rounded w-full px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300"
                        placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Phone --}}
                <div>
                    <input type="text" name="phone"
                        class="input {{ $errors->has('phone') ? 'border-red-500' : '' }}  border-1 rounded w-full px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300"
                        placeholder="Phone" value="{{ old('phone') }}"> {{-- Removed 'required' for consistency --}}
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Message (renamed from description) --}}
                <div>
                    <textarea name="message" {{-- Changed from 'description' to 'message' --}}
                        class="input border-1 rounded w-full px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300"
                        placeholder="Message" required>{{ old('message') }}</textarea> {{-- Changed old() key and added required --}}
                    @error('message')
                        {{-- Changed error key --}}
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Proficiency Level --}}
                <div>
                    <select name="proficiency" required
                        class="input {{ $errors->has('proficiency') ? 'border-red-500' : '' }}">
                        <option value="">Select Level</option>
                        <option value="Beginner" {{ old('proficiency') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="Intermediate" {{ old('proficiency') == 'Intermediate' ? 'selected' : '' }}>
                            Intermediate
                        </option>
                        <option value="Advanced" {{ old('proficiency') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        <option value="Expert" {{ old('proficiency') == 'Expert' ? 'selected' : '' }}>Expert</option>
                        <option value="Other" {{ old('proficiency') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('proficiency')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- File --}}
                <div>
                    <input type="file" name="file" class="input {{ $errors->has('file') ? 'border-red-500' : '' }}"
                        placeholder="File" accept=".pdf,.jpg,.jpeg,.png">
                    @error('file')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

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
@endsection
