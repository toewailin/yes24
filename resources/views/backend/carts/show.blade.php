<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Cart Details</h1>

                    <div class="mb-6">
                        <strong>Cart ID:</strong> {{ $cart->id }}
                    </div>

                    <div class="mb-6">
                        <strong>User:</strong> {{ $cart->user->name ?? 'Guest' }} (ID: {{ $cart->user_id ?? 'N/A' }})
                    </div>

                    <div class="mb-6">
                        <strong>Item:</strong> {{ $cart->item->name ?? 'N/A' }} (ID: {{ $cart->item_id }})
                    </div>

                    <div class="mb-6">
                        <strong>Quantity:</strong> {{ $cart->quantity }}
                    </div>

                    <div class="mb-6">
                        <strong>Price (per unit):</strong> ${{ number_format($cart->price, 2) }}
                    </div>

                    <div class="mb-6">
                        <strong>Total Price:</strong> ${{ number_format($cart->total_price, 2) }}
                    </div>

                    <div class="mb-6">
                        <strong>Created At:</strong> {{ $cart->created_at->format('M d, Y h:i A') }}
                    </div>

                    <div class="mb-6">
                        <strong>Last Updated:</strong> {{ $cart->updated_at->format('M d, Y h:i A') }}
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.carts.edit', $cart) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('admin.carts.destroy', $cart) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.carts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Back to Cart List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
