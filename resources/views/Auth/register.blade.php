<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up | Portfolio Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Create Your Account
        </h2>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Register Form --}}
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Role</label>
                <select name="role" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300 mb-6">
                    <option value="" disabled selected>Select your role</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <div>
                {{-- Terms and Conditions --}}
                <label class="flex items-center mb-6">
                    <input type="checkbox" name="terms" class="mr-2" required>
                    <span class="text-sm text-gray-600">I agree to the <a href="#"
                            class="text-blue-600 hover:underline">Terms and Conditions</a></span>
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Sign Up
            </button>
        </form>

        {{-- Login Link --}}
        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Sign in
            </a>
        </p>

    </div>

</body>

</html>
