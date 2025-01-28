<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.product-details.update', $itemDetail) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="item_id" class="block text-sm font-medium text-gray-700">Item</label>
                            <select name="item_id" id="item_id" class="form-select mt-1 block w-full">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" {{ $itemDetail->item_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="form-input mt-1 block w-full" rows="3">{{ $itemDetail->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="additional_info" class="block text-sm font-medium text-gray-700">Additional Info</label>
                            <textarea name="additional_info" id="additional_info" class="form-input mt-1 block w-full" rows="3">{{ $itemDetail->additional_info }}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>