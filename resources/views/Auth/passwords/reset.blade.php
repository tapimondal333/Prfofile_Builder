<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password | Portfolio Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Reset Your Password
        </h2>

         {{-- Error Message --}}
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif


        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ request()->email ?? old('email') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">New Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirm New Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Reset Password
            </button>
        </form>

    </div>

</body>

</html>
