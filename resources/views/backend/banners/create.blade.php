<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.banners.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="w-full p-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Status</label>
                            <select name="status" id="status" class="w-full p-2 border rounded-lg">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="order" class="block text-gray-700">Order</label>
                            <input type="number" name="order" id="order" class="w-full p-2 border rounded-lg" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
