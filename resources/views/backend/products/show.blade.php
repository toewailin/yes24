<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Item Details Section -->
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $item->name }}</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Category -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Category:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->category->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Subcategory -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Subcategory:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->subcategory->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Price -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Price:</strong>
                            <p class="mt-1 text-gray-900">${{ number_format($item->price, 2) }}</p>
                        </div>

                        <!-- Stock -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Stock:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->stock }}</p>
                        </div>

                        <!-- SKU -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">SKU:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->sku }}</p>
                        </div>

                        <!-- Supplier -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Supplier:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->supplier->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Artist -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Artist:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->artist->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Discount -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Discount:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->discount ? $item->discount . '%' : 'N/A' }}</p>
                        </div>

                        <!-- Tax -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Tax:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->tax ? $item->tax . '%' : 'N/A' }}</p>
                        </div>

                        <!-- Image -->
                        @if ($item->image)
                            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg md:col-span-2">
                                <strong class="block text-sm font-medium text-gray-700">Image:</strong>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="mt-4 rounded-md shadow-md" style="max-height: 300px;">
                            </div>
                        @endif

                        <!-- Description -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg md:col-span-2">
                            <strong class="block text-sm font-medium text-gray-700">Description:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->description }}</p>
                        </div>

                        <!-- Active Status -->
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <strong class="block text-sm font-medium text-gray-700">Active:</strong>
                            <p class="mt-1 text-gray-900">{{ $item->is_active ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.products.edit', $item) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.products.destroy', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                        </form>
                        <a href="{{ route('admin.products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
