<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $category->name }}</h1>

                    <!-- Category Details -->
                    <div class="mb-4">
                        <strong>Description:</strong>
                        <p>{{ $category->description ?? 'No description available.' }}</p>
                    </div>

                    @if ($category->parent)
                        <div class="mb-4">
                            <strong>Parent Category:</strong>
                            <p>{{ $category->parent->name }}</p>
                        </div>
                    @endif

                    @if ($category->children->isNotEmpty())
                        <div class="mb-4">
                            <strong>Subcategories:</strong>
                            <ul class="list-disc list-inside">
                                @foreach ($category->children as $child)
                                    <li>{{ $child->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($category->image)
                        <div class="mb-4">
                            <strong>Image:</strong><br>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="mt-2 rounded-md" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="mb-4">
                        <strong>Status:</strong>
                        <p>{{ $category->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>

                    <div class="mb-4">
                        <strong>Order:</strong>
                        <p>{{ $category->order ?? 'Not specified' }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
