@extends('layouts.user')

@section('content')



    <div id="main" x-data="{
        addOpen: false,
        openDropdown: null
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
            <h1 class="text-2xl font-bold">Skill & Project Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Skill
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach ($skills as $skill)
                <div class="mb-4">
                    <div class="relative overflow-hidden rounded-xl shadow-lg h-full flex flex-col">
                        <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                        {{-- overlay dropdown --}}
                        <div class="absolute top-3 right-3">
                            <div class="relative">
                                <button
                                    @click="openDropdown === {{ $loop->index }} ? openDropdown = null : openDropdown = {{ $loop->index }}"
                                    class="text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full w-9 h-9 flex items-center justify-center text-lg">
                                    ⋮
                                </button>

                                <div x-show="openDropdown === {{ $loop->index }}" @click.away="openDropdown = null"
                                    class="absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-10 w-40">
                                    <button class="block w-full px-4 py-2 hover:bg-gray-100 text-gray-700 text-left"
                                        onclick="openEditModal({{ $skill->id }})">Update</button>
                                    <form action="{{ route('skill.destroy', $skill->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-gradient-to-b from-white/60 to-white/30 flex-grow">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-100 text-indigo-700 font-bold">
                                    {{ strtoupper(substr($skill->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <h5 class="text-lg font-semibold text-gray-800">{{ $skill->name }}</h5>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($skill->description, 120) }}</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700 border">{{ $skill->proficiency ?? '—' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white/80 border-t border-white/30 text-right">
                            <a href="{{ route('skill.show', $skill->id) }}"
                                class="inline-flex items-center gap-2 px-3 py-1 bg-white text-indigo-700 rounded shadow-sm hover:shadow-md">
                                View More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


        @include('partials.add-skill-modal')
        @include('partials.update-skill-modal')
    </div>

    <script>
        window.skills = @json($skills);
    </script>


@endsection
