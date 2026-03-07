@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center flex-col mb-6">
        <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-md">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Contact Messages</h1>
            </div>
            {{-- success message --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success! </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Date Range Filters -->
            <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date From</label>
                    <input type="date" name="date_from" value="{{ request('date_from') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date To</label>
                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Apply Date
                        Filter</button>
                </div>
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full
                    bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Phone</th>
                            <th class="px-4 py-2 border-b">Proficiency</th>
                            <th class="px-4 py-2 border-b">Message</th>
                            <th class="px-4 py-2 border-b">Received At</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b">{{ $contact->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $contact->email }}</td>
                                <td class="px-4 py-2 border-b">{{ $contact->phone ?: 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">{{ $contact->proficiency ?: 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">{{ Str::limit($contact->message, 50) }}</td>
                                <td class="px-4 py-2 border-b">{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('contacts.show', $contact) }}"
                                        class="text-blue-500 hover:underline">View</a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this contact message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center px-4 py-6 text-gray-500">
                                    No contact messages found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
