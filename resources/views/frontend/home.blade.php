<x-user-layout>
    <!-- Featured Categories -->
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Featured Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Example Category -->
            @foreach ($categories as $category)
                <div class="bg-white rounded-lg shadow-md p-4 text-center dark:bg-gray-800">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $category->name }}</h3>
                    <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline dark:text-blue-400">Browse</a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Best-Selling Products -->
    <section class="bg-gray-100 py-16 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Best-Selling Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($items as $item)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded-lg mb-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $item->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">${{ number_format($item->price, 2) }}</p>
                        <a href="{{ route('products.show', $item) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
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
</x-user-layout>
