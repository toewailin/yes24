<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add New Supplier Button -->
                    <a href="{{ route('admin.suppliers.create') }}" class="inline-flex items-center px-4 py-2 mb-4 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">
                        {{ __('Add New Supplier') }}
                    </a>

                    <!-- Suppliers Table -->
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Contact Email</th>
                                <th class="border border-gray-300 px-4 py-2">Contact Phone</th>
                                <th class="border border-gray-300 px-4 py-2">Address</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->contact_email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->contact_phone ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->address ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->description ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.suppliers.show', $supplier) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                            <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $suppliers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
