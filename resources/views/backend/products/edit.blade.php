<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Edit Item Form Section -->
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Edit Item</h3>
                    <form action="{{ route('admin.products.update', $item) }}" method="POST" enctype="multipart/form-data" class="mt-6">
                        @csrf
                        @method('PUT')

                        <!-- Item Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" required
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $item->description }}</textarea>
                        </div>

                        <!-- SKU -->
                        <div class="mb-4">
                            <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ $item->sku }}"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" id="category_id" required
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subcategory -->
                        <div class="mb-4">
                            <label for="subcategory_id" class="block text-sm font-medium text-gray-700">Subcategory</label>
                            <select name="subcategory_id" id="subcategory_id"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected>None</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $item->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Supplier -->
                        <div class="mb-4">
                            <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                            <select name="supplier_id" id="supplier_id"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected>None</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $item->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Artist -->
                        <div class="mb-4">
                            <label for="artist_id" class="block text-sm font-medium text-gray-700">Artist</label>
                            <select name="artist_id" id="artist_id"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected>None</option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}" {{ $item->artist_id == $artist->id ? 'selected' : '' }}>
                                        {{ $artist->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" name="price" id="price" value="{{ $item->price }}" step="0.01" required
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Stock -->
                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ $item->stock }}" required
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="mt-4 rounded-md shadow-md" style="max-height: 150px;">
                            @endif
                        </div>

                        <!-- Discount -->
                        <div class="mb-4">
                            <label for="discount" class="block text-sm font-medium text-gray-700">Discount (%)</label>
                            <input type="number" name="discount" id="discount" value="{{ $item->discount }}" step="0.01"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Tax -->
                        <div class="mb-4">
                            <label for="tax" class="block text-sm font-medium text-gray-700">Tax (%)</label>
                            <input type="number" name="tax" id="tax" value="{{ $item->tax }}" step="0.01"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Is Active -->
                        <div class="mb-4 flex products-center">
                            <input type="checkbox" name="is_active" id="is_active" {{ $item->is_active ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:ring focus:ring-blue-300">
                                Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
