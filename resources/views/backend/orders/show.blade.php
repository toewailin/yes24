<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Order #{{ $order->id }}</h3>
                    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                    <p><strong>Status:</strong> {{ $order->status ?? 'Pending' }}</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.orders.edit', $order) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout
