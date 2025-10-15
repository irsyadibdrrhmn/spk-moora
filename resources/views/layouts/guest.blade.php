<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK MOORA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Poppins] text-gray-900 antialiased bg-gradient-to-br from-gray-100 via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <!-- Judul Aplikasi -->
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-blue-600 dark:text-blue-400 tracking-wide">
                SPK MOORA
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                Sistem Pendukung Keputusan Penilaian Siswa
            </p>
        </div>

        <!-- Card Login -->
        <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-gray-200 dark:border-gray-700">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="mt-6 text-xs text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} SPK MOORA. All rights reserved.
        </footer>
    </div>
</body>
</html>
