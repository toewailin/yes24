<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg mb-6">Manage Artists</h3>

                    <!-- Add New Artist Button -->
                    <a href="{{ route('admin.artists.create') }}" class="block w-full sm:w-auto mb-6 px-6 py-3 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-700 shadow-md transition-all">
                        Add New Artist
                    </a>

                    <!-- Artists Table -->
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Slug</th>
                                    <th class="border border-gray-300 px-4 py-2">Bio</th>
                                    <th class="border border-gray-300 px-4 py-2">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Genre</th>
                                    <th class="border border-gray-300 px-4 py-2">Active</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artists as $artist)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $artist->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $artist->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $artist->slug }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ Str::limit($artist->bio, 50, '...') ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if ($artist->image)
                                                <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $artist->genre ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span class="{{ $artist->is_active ? 'text-green-500' : 'text-red-500' }}">
                                                {{ $artist->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.artists.show', $artist) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.artists.edit', $artist) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="border border-gray-300 px-4 py-2 text-center">No artists found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $artists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
