<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-700 mb-4">Add New Item</h3>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Item Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <!-- SKU -->
                    <div class="mb-4">
                        <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                        <input type="text" name="sku" id="sku" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategory -->
                    <div class="mb-4">
                        <label for="subcategory_id" class="block text-sm font-medium text-gray-700">Subcategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected>None</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Supplier -->
                    <div class="mb-4">
                        <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected>None</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Artist -->
                    <div class="mb-4">
                        <label for="artist_id" class="block text-sm font-medium text-gray-700">Artist</label>
                        <select name="artist_id" id="artist_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected>None</option>
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Stock -->
                    <div class="mb-4">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Discount -->
                    <div class="mb-4">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount (%)</label>
                        <input type="number" name="discount" id="discount" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Tax -->
                    <div class="mb-4">
                        <label for="tax" class="block text-sm font-medium text-gray-700">Tax (%)</label>
                        <input type="number" name="tax" id="tax" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Is Active -->
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
