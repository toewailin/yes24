<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="EVENT - YES24" />
        <meta property="og:description" content="YOUR EVERY STORY Cultural content platform, YES24" />
        <meta property="og:image" content="https://image.yes24.com/sysimage/renew/og_YES24.png" />

        <title>{{ config('app.name', 'EVENT - YES24') }}</title>

        <link rel="shortcut icon" href="https://image.yes24.com/sysimage/renew/gnb/favicon_n.ico">
        <link rel="apple-touch-icon" href="https://image.yes24.com/sysimage/mobileN/icon/icon_n.png" />
        <link rel="icon" href="https://image.yes24.com/sysimage/mobileN/icon/icon_n.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 dark:text-white">
        <div class="flex flex-col min-h-screen">
            <!-- Navbar -->
            @include('layouts.frontend.navbar')
            
            <!-- Banners Section -->
            @include('layouts.frontend.banner', ['banners' => $banners ?? collect()])

            <!-- Hero Section -->
             @include('layouts.frontend.hero')

            <!-- Best-Selling Products Section -->
            @include('layouts.frontend.best-selling-products', ['items' => $items ?? collect()])

            <!-- Events Section -->
            @include('layouts.frontend.events', ['events' => $events ?? collect()])

            <!-- Featured Suppliers Section -->
            <!-- @include('layouts.frontend.supplier', ['suppliers' => $banners ?? collect()]) -->

            <!-- FAQs Section -->
            @include('layouts.frontend.faqs', ['faqs' => $faqs ?? collect()])

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            <!-- Footer -->
            @include('layouts.frontend.footer')
        </div>
    </body>
</html>
