<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
            <!-- Sidebar -->
            <!-- Sidebar code remains unchanged -->

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Top Navigation -->
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-6 md:p-12">
                    {{ $slot }}
                </main>

                <!-- Footer -->
                <footer class="bg-gray-800 text-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="py-6 flex flex-col sm:flex-row justify-between items-center">
                            <p class="text-sm text-center sm:text-left">
                                © {{ now()->year }} E-Commerce Admin. All rights reserved.
                            </p>
                            <div class="flex space-x-4 mt-4 sm:mt-0">
                                <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                                <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
                                <a href="#" class="text-gray-400 hover:text-white">Support</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
