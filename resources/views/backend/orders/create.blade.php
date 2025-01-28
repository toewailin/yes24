<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">New Order</h3>
                    <form action="{{ route('admin.orders.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="customer_name" class="block text-gray-700">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="w-full mt-1 p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="total_amount" class="block text-gray-700">Total Amount</label>
                            <input type="number" name="total_amount" id="total_amount" class="w-full mt-1 p-2 border rounded" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Create Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
