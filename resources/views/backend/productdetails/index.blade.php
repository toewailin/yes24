<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('item-details.create') }}" class="block mb-6 px-4 py-2 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700">Add New Item Detail</a>

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Item</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Additional Info</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemDetails as $itemDetail)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $itemDetail->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $itemDetail->item->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $itemDetail->description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $itemDetail->additional_info }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('item-details.show', $itemDetail) }}" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">View</a>
                                            <a href="{{ route('item-details.edit', $itemDetail) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('item-details.destroy', $itemDetail) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $itemDetails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>