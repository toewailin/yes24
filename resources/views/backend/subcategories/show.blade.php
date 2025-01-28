<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subcategory Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Subcategory Details -->
                    <h3 class="text-2xl font-bold mb-4">{{ $subcategory->name }}</h3>

                    <!-- Parent Category -->
                    <p><strong>Category:</strong> {{ $subcategory->category->name ?? 'N/A' }}</p>

                    <!-- Slug -->
                    <p class="mt-2"><strong>Slug:</strong> {{ $subcategory->slug }}</p>

                    <!-- Description -->
                    <p class="mt-2"><strong>Description:</strong> {{ $subcategory->description ?? 'No description provided.' }}</p>

                    <!-- Is Active -->
                    <p class="mt-2">
                        <strong>Status:</strong>
                        <span class="{{ $subcategory->is_active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $subcategory->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>

                    <!-- Actions -->
                    <div class="mt-6">
                        <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                        </form>
                        <a href="{{ route('admin.subcategories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
