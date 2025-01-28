<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subcategories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Subcategories</h1>

                    <!-- Add New Subcategory Button -->
                    <a href="{{ route('admin.subcategories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6">
                        Add New Subcategory
                    </a>

                    <!-- Subcategories Table -->
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Slug</th>
                                    <th class="border border-gray-300 px-4 py-2">Category</th>
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $subcategory)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $subcategory->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $subcategory->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $subcategory->slug }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $subcategory->category->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ $subcategory->is_active ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.subcategories.show', $subcategory) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" class="inline">
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
                        {{ $subCategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
