<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Carts</h1>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">User</th>
                                    <th class="border border-gray-300 px-4 py-2">Item</th>
                                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Total</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $cart->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $cart->user->name ?? 'Guest' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $cart->item->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $cart->quantity }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ number_format($cart->price, 2) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ number_format($cart->total_price, 2) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('carts.show', $cart) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                                    View
                                                </a>
                                                <a href="{{ route('carts.edit', $cart) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('carts.destroy', $cart) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $carts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
