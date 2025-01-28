<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Subcategory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.subcategories.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Optional: Auto-generated if left blank">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                     <!-- Is Active -->
                    <div class="mb-4">
                        <label for="is_active" class="flex items-center">
                            <input
                                type="checkbox"
                                name="is_active"
                                id="is_active"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                {{ old('is_active', $is_active ?? true) ? 'checked' : '' }}
                            >
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                        @error('is_active')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Create Subcategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
