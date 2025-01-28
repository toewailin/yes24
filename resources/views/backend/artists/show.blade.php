<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Name -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $artist->name }}</h1>

                    <!-- Slug -->
                    <div class="mb-4">
                        <strong>Slug:</strong> {{ $artist->slug ?? 'N/A' }}
                    </div>

                    <!-- Genre -->
                    <div class="mb-4">
                        <strong>Genre:</strong> {{ $artist->genre ?? 'N/A' }}
                    </div>

                    <!-- Biography -->
                    <div class="mb-4">
                        <strong>Biography:</strong>
                        <p>{{ $artist->bio ?? 'No biography provided.' }}</p>
                    </div>

                    <!-- Image -->
                    @if ($artist->image)
                        <div class="mb-4">
                            <strong>Image:</strong><br>
                            <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="rounded shadow-md" style="max-height: 300px;">
                        </div>
                    @endif

                    <!-- Status -->
                    <div class="mb-4">
                        <strong>Status:</strong>
                        <span class="{{ $artist->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $artist->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.artists.edit', $artist) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.artists.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
