<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Item Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.product-details.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Item</label>
                            <select name="product_id" id="product_id" class="form-select mt-1 block w-full">
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="form-input mt-1 block w-full" rows="3"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="additional_info" class="block text-sm font-medium text-gray-700">Additional Info</label>
                            <textarea name="additional_info" id="additional_info" class="form-input mt-1 block w-full" rows="3"></textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>