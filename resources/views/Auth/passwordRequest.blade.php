<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Portfolio Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN (for now) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Forgot Your Password?
        </h2>

         {{-- Success Message --}}
        @if (session('status'))
           <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm font-medium">
                {{ session('status') }}
           </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Send Password Reset Link
            </button>
        </form>

        {{-- Register Link --}}
        <p class="text-center text-sm text-gray-600 mt-6">
            Don’t have an account?
            <a href="{{route('register')}}" class="text-blue-600 hover:underline">
                Sign up
            </a>
        </p>

    </div>

</body>

</html>
