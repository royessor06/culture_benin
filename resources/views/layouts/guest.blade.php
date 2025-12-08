<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel – Connexion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

    <div class="min-h-screen flex flex-col justify-center items-center">

        <!-- Logo -->
        <div class="mb-4 text-center">
            <div class="flex items-center justify-center w-20 h-20 bg-indigo-600 text-white rounded-full text-xl font-bold shadow">
                ADMIN
            </div>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md px-6 py-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
