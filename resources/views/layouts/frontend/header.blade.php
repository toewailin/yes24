<!-- Navbar -->
<header class="bg-white shadow dark:bg-gray-800 sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
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
