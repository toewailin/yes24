<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg mb-4">Manage Banners</h3>
                    <a href="{{ route('admin.banners.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg mb-6 hover:bg-blue-600">
                        Add New Banner
                    </a>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Title</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Order</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $banner->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $banner->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $banner->status }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $banner->order }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.banners.show', $banner) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                            <a href="{{ route('admin.banners.edit', $banner) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="inline">
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
                    <div class="mt-4">
                        {{ $banners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
