<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Yes24</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 dark:text-white">
        <!-- Navbar -->
        <header class="bg-white shadow dark:bg-gray-800 sticky top-0 z-50">
            <div class="container mx-auto flex products-center justify-between py-4 px-6">
                <!-- Logo -->
                <a href="/" class="text-2xl font-bold text-gray-800 dark:text-white">Yes24</a>
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('frontend.categories.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Categories</a>
                    <a href="{{ route('frontend.products.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Products</a>
                    <a href="{{ route('frontend.faqs.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">FAQs</a>
                    <a href="{{ route('frontend.events.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Events</a>
                </nav>
                <!-- Authentication Links -->
                <div class="space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-400">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-400">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-400">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white text-center py-20">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-extrabold mb-4">Welcome to Yes24 from Frontend</h1>
                <p class="text-lg mb-6">Discover a world of products at unbeatable prices!</p>
                <!-- Search Bar -->
                <form action="{{ route('frontend.products.search') }}" method="GET" class="flex justify-center mb-6">
                    <input
                        type="text"
                        name="query"
                        placeholder="Search for products..."
                        class="px-4 py-2 w-2/3 rounded-l-lg text-gray-800 focus:outline-none"
                    />
                    <button
                        type="submit"
                        class="bg-white text-blue-600 px-4 py-2 rounded-r-lg hover:bg-gray-100"
                    >
                        Search
                    </button>
                </form>

                <a href="{{ route('frontend.products.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow-md hover:bg-gray-100">
                    Start Shopping
                </a>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="container mx-auto px-6 py-16">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Featured Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Example Category -->
                @foreach ($categories as $category)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center dark:bg-gray-800">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $category->name }}</h3>
                        <a href="{{ route('frontend.categories.index') }}" class="text-blue-600 hover:underline dark:text-blue-400">Browse</a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Best-Selling Products -->
        <section class="bg-gray-100 py-16 dark:bg-gray-800">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Best-Selling Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @foreach ($products as $item)
                        <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded-lg mb-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $item->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">${{ number_format($item->price, 2) }}</p>
                            <a href="{{ route('frontend.products.show', $item) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                                View Details
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="container mx-auto px-6 py-16">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ $event->description }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Date: {{ $event->start_date->format('M d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- FAQs Section -->
        <section class="bg-gray-100 py-16 dark:bg-gray-800">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">FAQs</h2>
                <div class="space-y-4">
                    @foreach ($faqs as $faq)
                        <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $faq->question }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $faq->answer }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; {{ now()->year }} Yes24. All Rights Reserved.</p>
                <p class="text-sm mt-2">Powered by Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </div>
        </footer>
    </body>
</html>
