@extends('layouts.user')

@section('content')

    <div id="main" x-data="{
        addOpen: false
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
            <h1 class="text-2xl font-bold">Document Details</h1>
            <button @click="addOpen = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                ➕ Add Document
            </button>
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-sm">
                    <tr>
                        <th class="p-2  text-left">Title</th>
                        <th class="p-2 pl-4 text-left">Description</th>
                        <th class="p-2  text-left">Certificate</th>
                        <th class="p-2  text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $doc)
                        <tr class="border-t ">
                            <td class="p-2">{{ strtoupper($doc->title) }}</td>
                            <td class="p-2">{{ $doc->description }}</td>



                            <td class="p-2 pl-4 align-top">
                                @if ($doc->certificate)
                                    <a href="{{ asset('storage/' . $doc->certificate) }}" target="_blank"
                                        class="text-blue-600 underline">
                                        View
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td class="p-2 flex gap-2 align-top">
                                <button onclick="openEditModal({{ $doc->id }})" class="text-blue-600">✏</button>

                                <form method="POST" action="{{ route('documents.destroy', $doc) }}">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600">🗑</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500 align-top">
                                No documents are added
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @include('partials.add-doc-modal')
        @include('partials.edit-doc-modal')

    </div>

    <script>
        window.documents = @json($documents);
    </script>

@endsection
