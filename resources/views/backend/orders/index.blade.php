<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Manage Orders</h3>
                    <a href="{{ route('admin.orders.create') }}" class="block mt-4 mb-6 p-3 bg-blue-500 text-white rounded-lg text-center hover:bg-blue-600">
                        Add New Order
                    </a>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Customer</th>
                                <th class="border border-gray-300 px-4 py-2">Total Amount</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->customer_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">${{ number_format($order->total_amount, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.orders.show', $order) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                            <a href="{{ route('admin.orders.edit', $order) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
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
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
