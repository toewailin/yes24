<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Products Table Section -->
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg mb-6">Manage Products</h3>
                    
                   <!-- Add New Product Button -->
                    <a href="{{ route('admin.products.create') }}" class="block w-full sm:w-auto mb-6 px-6 py-3 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-700 shadow-lg transform transition-all duration-300 ease-in-out hover:scale-105">
                        Add New Product
                    </a>

                    <!-- Product Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Stock</th>
                                    <th class="border border-gray-300 px-4 py-2">SKU</th>
                                    <th class="border border-gray-300 px-4 py-2">Category</th>
                                    <th class="border border-gray-300 px-4 py-2">Subcategory</th>
                                    <th class="border border-gray-300 px-4 py-2">Supplier</th>
                                    <th class="border border-gray-300 px-4 py-2">Artist</th>
                                    <th class="border border-gray-300 px-4 py-2">Discount (%)</th>
                                    <th class="border border-gray-300 px-4 py-2">Tax</th>
                                    <th class="border border-gray-300 px-4 py-2">Active</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ Str::limit($item->description, 50, '...') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ number_format($item->price, 2) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->stock }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->sku }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->category->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->subcategory->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->supplier->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->artist->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->discount ?? '0' }}%</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->tax ?? '0' }}%</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span class="{{ $item->is_active ? 'text-green-500' : 'text-red-500' }}">
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.products.show', $item) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                                <a href="{{ route('admin.products.edit', $item) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $item) }}" method="POST" class="inline">
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
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
