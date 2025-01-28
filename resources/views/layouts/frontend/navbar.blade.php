<header class="bg-white shadow dark:bg-gray-800">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <!-- Logo -->
        <a href="{{ route('index') }}" class="flex items-center">
            <img src="{{ asset('images/h1_logo_n.png') }}" alt="Yes24" class="h-8">
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6">
            <a href="{{ route('categories.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Categories</a>
            <a href="{{ route('artists.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Artists</a>
            <a href="{{ route('products.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Products</a>
            <a href="{{ route('faqs.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">FAQs</a>
            <a href="{{ route('events.index') }}" class="hover:text-gray-500 dark:hover:text-gray-300">Events</a>
        </nav>

        <!-- Authentication Links -->
        <div class="space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('profile.index') }}" class="text-sm text-gray-700 dark:text-gray-400">Profile</a>
                    
                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
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
