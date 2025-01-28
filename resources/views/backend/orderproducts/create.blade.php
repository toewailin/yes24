<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Order Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.order-products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="order_id" class="block text-sm font-medium text-gray-700">Order</label>
                            <select name="order_id" id="order_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">Order #{{ $order->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="item_id" class="block text-sm font-medium text-gray-700">Item</label>
                            <select name="item_id" id="item_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Add Order Item
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>