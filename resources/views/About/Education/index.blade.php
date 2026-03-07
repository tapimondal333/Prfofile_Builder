@extends('layouts.user')

@section('content')

    <div id="main" x-data="{
        addOpen: false,
        editOpen: false,
        editData: {},
        educations: [],
        openEditModal(id) {
            const edu = this.educations.find(e => e.id == id);
            if (edu) {
                this.editData = { ...edu };
                this.editOpen = true;
            }
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

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Education Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Education
            </button>
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-sm">
                    <tr>
                        <th class="p-2  text-left">Level</th>
                        <th class="p-2 pl-4 text-left">Course</th>
                        <th class="p-2 pl-4 text-left">Stream</th>
                        <th class="p-2  text-left">Year</th>
                        <th class="p-2  text-left">Marks</th>
                        <th class="p-2  text-left">Certificate</th>
                        <th class="p-2  text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $edu)
                        <tr class="border-t ">
                            <td class="p-2">{{ strtoupper($edu->level) }}</td>
                            <td class="p-2">{{ $edu->course_name }}</td>
                            <td class="p-2">{{ $edu->stream }}</td>
                            <td class="p-2">{{ $edu->passing_year }}</td>
                            <td class="p-2 pl-4">{{ $edu->marks }}</td>

                            <td class="p-2 pl-4 align-top">
                                @if ($edu->certificate)
                                    <a href="{{ asset('storage/' . $edu->certificate) }}" target="_blank"
                                        class="text-blue-600 underline">
                                        View
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td class="p-2 flex gap-2 align-top">
                                <button onclick="openEditModal({{ $edu->id }})" class="text-blue-600">✏</button>

                                <form method="POST" action="{{ route('education.destroy', $edu) }}">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600">🗑</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500 align-top">
                                No education details added
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @include('partials.add-modal')

        @include('partials.edit-modal')

    </div>

    <script>
        window.educations = @json($educations);

        function openEditModal(id) {
            const edu = window.educations.find(e => e.id == id);
            if (edu) {
                document.getElementById('edit-form').action = '{{ url('portfolio/education') }}/' + id;
                document.getElementById('edit-level').value = edu.level;
                document.getElementById('edit-course_name').value = edu.course_name;
                document.getElementById('edit-stream').value = edu.stream || '';
                document.getElementById('edit-institution').value = edu.institution || '';
                document.getElementById('edit-passing_year').value = edu.passing_year;
                document.getElementById('edit-marks').value = edu.marks || '';
                document.getElementById('edit-modal').classList.remove('hidden');
            }
        }
    </script>

    </div>

@endsection
