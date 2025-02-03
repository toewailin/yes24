<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Item Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Order Item #{{ $orderItem->id }}</h3>
                    <p><strong>Order:</strong> Order #{{ $orderItem->order_id }}</p>
                    <p><strong>Product:</strong> {{ $orderItem->item->name ?? 'N/A' }}</p>
                    <p><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
                    <a href="{{ route('admin.order-products.index') }}" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>