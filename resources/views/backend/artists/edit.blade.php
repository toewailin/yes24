<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Artist</h1>
                    <form action="{{ route('admin.artists.update', $artist) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $artist->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-6">
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $artist->slug }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <!-- Biography -->
                        <div class="mb-6">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                            <textarea name="bio" id="bio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ $artist->bio }}</textarea>
                        </div>

                        <!-- Genre -->
                        <div class="mb-6">
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ $artist->genre }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @if ($artist->image)
                                <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="mt-4 rounded-md shadow-md" style="max-height: 150px;">
                            @endif
                        </div>

                        <!-- Active Checkbox -->
                        <div class="mb-6 flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ $artist->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Artist
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
