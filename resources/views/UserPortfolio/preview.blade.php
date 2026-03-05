@extends('layouts.user')

@section('content')

    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">{{ $user->name }} — Portfolio Preview</h1>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">← Back to Dashboard</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-6 border-b">
                <div class="flex items-center gap-6">
                    <div class="w-28 h-28 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                        @if (optional($portfolio)->profile_image)
                            <img src="{{ asset('storage/' . $portfolio->profile_image) }}" alt="Profile"
                                class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400 text-4xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        @endif
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold">{{ $portfolio->title ?? $user->name }}</h2>
                        <p class="text-gray-600">{{ $portfolio->headline ?? ($user->email ?? '') }}</p>
                        <div class="mt-2 text-sm text-gray-600">
                            @if ($portfolio->location)
                                <span>{{ $portfolio->location }}</span> ·
                            @endif
                            @if ($portfolio->experience_years)
                                <span>{{ $portfolio->experience_years }} yrs</span> ·
                            @endif
                            @if ($portfolio->availability)
                                <span>{{ $portfolio->availability }}</span>
                            @endif
                        </div>

                        <div class="mt-3 space-x-3">
                            @if ($portfolio->website)
                                <a href="{{ $portfolio->website }}"
                                    class="text-sm text-blue-600 hover:underline">Website</a>
                            @endif
                            @if ($portfolio->github)
                                <a href="{{ $portfolio->github }}" class="text-sm text-blue-600 hover:underline">GitHub</a>
                            @endif
                            @if ($portfolio->linkedin)
                                <a href="{{ $portfolio->linkedin }}"
                                    class="text-sm text-blue-600 hover:underline">LinkedIn</a>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($portfolio->bio)
                    <div class="mt-6 text-gray-700">{{ $portfolio->bio }}</div>
                @endif
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 space-y-6">
                    {{-- Experience Section --}}
                    <section>
                        <h3 class="text-xl font-semibold mb-3">Experience</h3>

                        @forelse($experiences as $exp)
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold">{{ $exp->position }} <span
                                                class="text-gray-600 font-normal">@ {{ $exp->company }}</span></h4>
                                        <p class="text-sm text-gray-600">{{ $exp->location }}</p>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <span>{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }}</span>
                                        -
                                        <span>{{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}</span>
                                    </div>
                                </div>
                                @if ($exp->description)
                                    <p class="mt-2 text-gray-700 text-sm">{{ $exp->description }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-600">No experience added.</p>
                        @endforelse
                    </section>

                    {{-- Education Section --}}
                    <section class="mt-6">
                        <h3 class="text-xl font-semibold mb-3">Education</h3>
                        @forelse($educations as $edu)
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold">{{ $edu->level }}</h4>
                                        <p class="text-sm text-gray-600">{{ $edu->institution }} ·
                                            {{ $edu->passing_year ?? '' }}</p>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <span>{{ $edu->marks }}</span>

                                    </div>
                                </div>
                                @if ($edu->description)
                                    <p class="mt-2 text-gray-700 text-sm">{{ $edu->description }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-600">No education added.</p>
                        @endforelse
                    </section>

                    {{-- Skills Section --}}
                    <section class="mt-6">
                        <h3 class="text-xl font-semibold mb-3">Skills</h3>
                        @if ($skills->count())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($skills as $skill)
                                    <span
                                        class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">{{ $skill->name }}
                                        @if ($skill->proficiency)
                                            · {{ $skill->proficiency }}
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">No skills added.</p>
                        @endif
                    </section>

                </div>

                {{-- Sidebar --}}
                <aside class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Contact</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            @if ($portfolio->phone)
                                <div>Phone: {{ $portfolio->phone }}</div>
                            @endif
                            @if ($portfolio->email_public)
                                <div>Email: {{ $portfolio->email_public }}</div>
                            @endif
                            @if ($portfolio->country)
                                <div>Country: {{ $portfolio->country }}</div>
                            @endif
                            @if ($portfolio->city)
                                <div>City: {{ $portfolio->city }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Primary Skills</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            @if ($portfolio->primary_skill)
                                <div>{{ $portfolio->primary_skill }}</div>
                            @endif
                            @if ($portfolio->secondary_skill)
                                <div class="text-gray-500">{{ $portfolio->secondary_skill }}</div>
                            @endif
                            @if ($portfolio->tools)
                                <div class="mt-2 text-sm text-gray-600">Tools: {{ $portfolio->tools }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Availability</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            {{ $portfolio->availability ?? 'Not specified' }}
                        </div>
                    </div>
                </aside>

            </div>
        </div>

    </div>

@endsection
