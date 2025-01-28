<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="EVENT - YES24" />
        <meta property="og:description" content="YOUR EVERY STORY Cultural content platform, YES24" />
        <meta property="og:image" content="https://image.yes24.com/sysimage/renew/og_YES24.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">

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
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.admin.sidebar')

            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.admin.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
