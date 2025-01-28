<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg">{{ $itemDetail->item->name }}</h3>
                    <div class="mt-4">
                        <strong>Description:</strong>
                        <p>{{ $itemDetail->description }}</p>
                    </div>

                    <div class="mt-4">
                        <strong>Additional Info:</strong>
                        <p>{{ $itemDetail->additional_info }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.product-details.edit', $itemDetail) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.product-details.destroy', $itemDetail) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                        </form>
                        <a href="{{ route('admin.product-details.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>