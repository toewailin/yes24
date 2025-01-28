@if ($items->isNotEmpty())
    <section class="bg-gray-100 py-16 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Best-Selling Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($items as $item)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded-lg mb-4 w-full h-40 object-cover">
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
@endif
