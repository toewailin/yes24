<x-user-layout>
    <!-- Product Details Section -->
    <section class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg w-full h-auto">
            </div>
            
            <!-- Product Information -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">${{ number_format($product->price, 2) }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">{{ $product->description }}</p>

                <!-- Add to Cart -->
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex products-center space-x-4 mb-4">
                        <label for="quantity" class="text-sm text-gray-700 dark:text-gray-300">Quantity:</label>
                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            value="1"
                            min="1"
                            class="w-16 text-center border border-gray-300 rounded-lg text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700"
                    >
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-user-layout>
