<x-user-layout>
    <!-- Category Details Section -->
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">{{ $category->name }}</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">{{ $category->description }}</p>

        @if ($category->children->isNotEmpty())
            <!-- Subcategories -->
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Subcategories</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($category->children as $child)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center dark:bg-gray-800">
                        <img src="{{ asset('storage/' . $child->image) }}" alt="{{ $child->name }}" class="w-24 h-24 mx-auto mb-4 rounded-lg">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $child->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $child->description }}</p>
                        <a href="{{ route('categories.show', $child) }}" class="block mt-4 text-blue-600 hover:underline dark:text-blue-400">View Products</a>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($category->products->isNotEmpty())
            <!-- Products -->
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mt-12 mb-4">Products in {{ $category->name }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($category->products as $product)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h4>
                        <p class="text-gray-600 dark:text-gray-400">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">No products available in this category.</p>
        @endif
    </section>
</x-user-layout>
