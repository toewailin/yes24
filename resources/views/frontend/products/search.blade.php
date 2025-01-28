<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Search Results for "{{ $query }}"</h2>

        @if ($products->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg mb-4 w-full h-48 object-cover">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">No products found for your search query.</p>
        @endif

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </section>
</x-user-layout>
