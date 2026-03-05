<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        {{-- Sidebar --}}
        @include('partials.user_sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>

</html>
