@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center flex-col mb-6">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-md">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Contact Message Details</h1>
            </div>

            <div class="space-y-4">
                <div>
                    <strong>Name:</strong> {{ $contact->name }}
                </div>
                <div>
                    <strong>Email:</strong> {{ $contact->email }}
                </div>
                <div>
                    <strong>Phone:</strong> {{ $contact->phone ?: 'N/A' }}
                </div>
                <div>
                    <strong>Proficiency:</strong> {{ $contact->proficiency ?: 'N/A' }}
                </div>
                <div>
                    <strong>Message:</strong>
                    <p class="mt-2 p-4 bg-gray-100 rounded">{{ $contact->message }}</p>
                </div>
                <div>
                    <strong>Received At:</strong> {{ $contact->created_at->format('Y-m-d H:i') }}
                </div>

                <a href="{{ route('contacts.index') }}"
                    class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Back to List
                </a>
            </div>
        </div>
    </div>
@endsection
