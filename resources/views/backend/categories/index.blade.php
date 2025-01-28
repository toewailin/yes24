<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Categories</h1>

                    <!-- Add New Category Button -->
                    <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Add New Category
                    </a>

                    <!-- Categories Table -->
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Parent Category</th>
                                    <th class="border border-gray-300 px-4 py-2">Order</th>
                                    <th class="border border-gray-300 px-4 py-2">Active</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $category->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $category->parent->name ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $category->order ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span class="{{ $category->is_active ? 'text-green-500' : 'text-red-500' }}">
                                                {{ $category->is_active ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.categories.show', $category) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                            No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
