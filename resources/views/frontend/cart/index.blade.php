<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Your Cart</h2>
        @if ($cartItems->isNotEmpty())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left dark:border-gray-600">Product</th>
                            <th class="border border-gray-300 px-4 py-2 text-left dark:border-gray-600">Price</th>
                            <th class="border border-gray-300 px-4 py-2 text-left dark:border-gray-600">Quantity</th>
                            <th class="border border-gray-300 px-4 py-2 text-left dark:border-gray-600">Subtotal</th>
                            <th class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <!-- Product -->
                                <td class="border border-gray-300 px-4 py-2 flex items-center dark:border-gray-600">
                                    <img src="{{ asset('storage/' . $cartItem->item->image) }}" alt="{{ $cartItem->item->name }}"
                                        class="w-16 h-16 rounded-md mr-4">
                                    <span>{{ $cartItem->item->name }}</span>
                                </td>
                                <!-- Price -->
                                <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">
                                    ${{ number_format($cartItem->price, 2) }}
                                </td>
                                <!-- Quantity -->
                                <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">
                                    <form action="{{ route('cart.store') }}" method="POST" class="inline-flex items-center space-x-2">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $cartItem->item->id }}">
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1"
                                            class="w-16 px-2 py-1 border rounded dark:bg-gray-700 dark:border-gray-600">
                                        <button type="submit" class="text-sm bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <!-- Subtotal -->
                                <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">
                                    ${{ number_format($cartItem->quantity * $cartItem->price, 2) }}
                                </td>
                                <!-- Actions -->
                                <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                                    <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-sm bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Total -->
                <div class="mt-6 flex justify-between items-center">
                    <span class="text-lg font-semibold text-gray-800 dark:text-white">
                        Total: ${{ number_format($cartItems->sum(fn($cartItem) => $cartItem->quantity * $cartItem->price), 2) }}
                    </span>
                    <a href="{{ route('frontend.checkout.index') }}"
                        class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        @else
            <div class="text-center bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Your cart is empty!</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Browse our products to add items to your cart.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Start Shopping
                </a>
            </div>
        @endif
    </section>
</x-user-layout>
