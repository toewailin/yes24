<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('admin.order-products.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Add New Order Item
                    </a>

                    <table class="mt-6 w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Order ID</th>
                                <th class="border border-gray-300 px-4 py-2">Item Name</th>
                                <th class="border border-gray-300 px-4 py-2">Quantity</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderproducts as $orderItem)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $orderItem->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">Order #{{ $orderItem->order_id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $orderItem->item->name ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $orderItem->quantity }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.order-products.show', $orderItem) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                            <a href="{{ route('admin.order-products.edit', $orderItem) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('admin.order-products.destroy', $orderItem) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $orderproducts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>